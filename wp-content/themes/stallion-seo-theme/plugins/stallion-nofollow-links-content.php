<?php if (function_exists('st_seo_chck')){ ?>
<?php
add_filter( 'the_content', 'st_nofollow_content' , 99 );
function st_nofollow_content( $content )
{
$content = preg_replace('/<a(.*?)href=http(.*?)>/i', '<a$1href="http$2">', $content);

$content = preg_replace('/<a href="(.*?)" rel="nofollow">(.*?)<\/a>/i', '<span class="affst" title="tests" id="$1">$2</span>', $content);
$content = preg_replace('/<a href=\'(.*?)\' rel=\'nofollow\'>(.*?)<\/a>/i', '<span class="affst" title="tests" id="$1">$2</span>', $content);

$content = preg_replace('/<a rel="nofollow" href="(.*?)">(.*?)<\/a>/i', '<span class="affst" title="tests" id="$1">$2</span>', $content);
$content = preg_replace('/<a rel=\'nofollow\' href=\'(.*?)\'>(.*?)<\/a>/i', '<span class="affst" title="tests" id="$1">$2</span>', $content);

#$content = preg_replace('/<a(.*?)rel="(.*?)nofollow(.*?)"(.*?)href="(.*?)">(.*?)<\/a>/si', '<span class="affst" title="tests" id="$5">$6</span>', $content);
#$content = preg_replace('/<a(.*?)href="(.*?)"(.*?)rel="(.*?)nofollow(.*?)">(.*?)<\/a>/si', '<span class="affst" title="tests" id="$2">$6</span>', $content);

#$content = preg_replace('/<a(.*?)rel="(.*?)nofollow(.*?)"(.*?)href="(.*?)"(.*?)>(.*?)<\/a>/si', '<span class="affst" title="tests" id="$5">$7</span>', $content);
#$content = preg_replace('/<a(.*?)href="(.*?)"(.*?)rel="(.*?)nofollow(.*?)"(.*?)>(.*?)<\/a>/si', '<span class="affst" title="tests" id="$2">$7</span>', $content);

#$content = preg_replace('/<a(.*?)rel=\'(.*?)nofollow(.*?)\'(.*?)href=\'(.*?)\'(.*?)>(.*?)<\/a>/si', '<span class="affst" title="tests" id="$5">$7</span>', $content);
#$content = preg_replace('/<a(.*?)href=\'(.*?)\'(.*?)rel=\'(.*?)nofollow(.*?)\'(.*?)>(.*?)<\/a>/si', '<span class="affst" title="tests" id="$2">$7</span>', $content);
return $content; 
}
?><?php } ?>