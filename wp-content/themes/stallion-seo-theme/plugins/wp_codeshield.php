<?php
/*
Plugin Name: WP_CodeShield
Version: 0.4
Plugin URI: http://scott.sherrillmix.com/blog/blogger/wp_codeshield/
Description: This plugin protects html code (&lt;em&gt;,&lt;img&gt;...)inside &lt;code&gt; tags in the comments and posts.
Author: Scott Sherrill-Mix
Author URI: http://scott.sherrillmix.com/blog/
*/
/*
Usage notes:
	This plugin will apply htmlspecialchars to everything inside <code></code>. Nested codes are ok, e.g. <code><code></code></code> is ok (inner code pair will be converted to html) but <code><code></code> will cause the plugin to leave the entire post alone. If the string inside the <code></code> tags, e.g. <code>&amp;</code>, already contains special characters then the plugin will assume you know what you are doing and leave the contents alone. It will also mark the contents with a <!--formatted--> comment so it can keep track of it. This version only looks for <code> (not <code > or <code class="fancy>). 
*/


add_filter('pre_comment_content','wp_codeshield');
add_filter('comment_edit_pre','wp_codeshield_anti');
add_filter('the_editor_content','wp_codeshield_anti');
add_filter('content_save_pre','wp_codeshield');

function wp_codeshield($content){
	return(wp_codeshield_encode($content,false));
}

function wp_codeshield_anti($content){
	return(wp_codeshield_encode($content,true));
}

function wp_codeshield_encode( $content, $anti=false ) {
	if ($anti){
		$startcode='&lt;code&gt;';
		$endcode='&lt;/code&gt;';
	}else{
		$startcode="<code>";
		$endcode="</code>";
	}
	$starts=substr_count($content,$startcode);
	$ends=substr_count($content,$endcode);
	//Can only deal with balanced numbers of <code> and </code>
	if ($starts>0&$starts==$ends){
		$startoffset=strlen($startcode);
		$endoffset=strlen($endcode);
		$specialregex="/(".implode(get_html_translation_table(HTML_SPECIALCHARS,ENT_QUOTES),"|").")/";
		for ($i=0;$i<$ends;$i++){
			if ($i>0) $offset=$positions["end".($i-1)]+$endoffset;
			else $offset=0;
			$positions["end".$i]=strpos($content,$endcode,$offset);
			if ($i>0) $offset=$positions["start".($i-1)]+$startoffset;
			else $offset=0;
			$positions["start".$i]=strpos($content,$startcode,$offset);
		}
		arsort($positions);
		$nest=0;
		$counter=0;
		foreach($positions as $key => $position){
			if(substr($key,0,3)=="end"){
				if ($endpos==0){
					$endpos=$position;
				}
				$nest++;
			}else {
				if ($nest==1){
					$convertcode=substr($content,$position+$startoffset,$endpos-$position-$endoffset+1);
					if ($anti){
						if (strpos($convertcode,"&lt;!--formatted--&gt;")===false){
							$content=substr($content,0,$position+$startoffset). htmlspecialchars_decode($convertcode,ENT_QUOTES). substr($content,$endpos);
						}
					} else {
						//Don't mess with anything already formatted and mark it with a comment
						if (preg_match($specialregex,$convertcode)){
							if (strpos($convertcode,"<!--formatted-->")===false){
								$content=substr($content,0,$position+$startoffset). $convertcode."<!--formatted-->". substr($content,$endpos);
							}
						} else {
							$content=substr($content,0,$position+$startoffset). htmlspecialchars($convertcode,ENT_QUOTES). substr($content,$endpos);
						}
					}
					$nest=0;
					$endpos=0;
				} else $nest --;
			}
		}
	}
	return $content;
}


//htmlspecialchars_decode for php4 from http://php.net/function.htmlspecialchars_decode#68962
if ( !function_exists('htmlspecialchars_decode') ){
    function htmlspecialchars_decode($text,$quotes=ENT_COMPAT){
        return strtr($text, array_flip(get_html_translation_table(HTML_SPECIALCHARS,$quotes)));
    }
}

?>