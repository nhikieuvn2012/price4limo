<?php
/*
Theme Plugin Name: Stallion SEO Super Comments
Version: 6.1
Author: David Law
Author URI: http://www.stallion-theme.com/
credits 
Vladimir Prelovac  http://www.prelovac.com/vladimir/wordpress-plugins/seo-super-comments
*/
function SEOSCStallion() {
echo '';
}

if ( !class_exists('SEOSuperComments') ) :
class SEOSuperComments {
function SEOSuperComments() {
add_filter('single_post_title',  array(&$this, 'SEOSuperComments_post_title'), 10);						
add_action('parse_query', array(&$this, 'parse'));			
}

function SEOSuperComments_process_text($text)
{
global $comment, $post;
$cid=$comment->comment_ID;
$anchor=$this->GetExcerpt($text, 4);
return ( $text );
}
function SEOSuperComments_post_title($title)
{
if ($_REQUEST['cid'])
{
$mycomment=get_comment($_REQUEST['cid']);
$mypost=get_post($mycomment->comment_post_ID);

return $this->GetExcerpt($mycomment->comment_content, 8);
}
else return $title;
}

function parse()
{
global $wp_query;
if (isset($_REQUEST['cid']) > 0) {
add_action('template_redirect', array(&$this, 'TemplateRedirect'));
}
}

function get_options() {
$options = array(
'template'=>'single2.php'
);
return $options;
}

function GetExcerpt($text, $length = 20 )
{
$text = strip_tags($text);
$words = explode(' ', $text, $length + 1);
if (count($words) > $length) {
array_pop($words);
$text = implode(' ', $words);
}	
return ucfirst($text);
}

function get_author_comments($pid, $author, $cid, $email)
{
global $wpdb;

$result='';
$author=addslashes($author);
$stcommentsnum = st_super_comments_more();
$comments = $wpdb->get_results($wpdb->prepare("SELECT comment_author, comment_author_url, comment_content, comment_post_ID, comment_ID, comment_author_email FROM $wpdb->comments WHERE comment_approved = '1' AND comment_author_email ='$email' AND NOT comment_post_ID = '$pid' ORDER BY comment_date_gmt DESC LIMIT $stcommentsnum"));

if ( $comments )
{
$result.='</p>';
$result.='<strong class="commenthead com-wrapper aligncenter">More comments by '.$author.'</strong>';
$result.="<div>";
foreach ($comments as $comment) {
	
$result.="<div class=\"commenthead com-wrapper\">";

$email = $comment->comment_author_email;
$size = 60;
$rating = get_option('avatar_rating');
$gravtype = get_option('avatar_default');
$default = urlencode( 'http://www.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=' . $size );
if ($gravtype=='mystery')
$grav_url = 'http://www.gravatar.com/avatar/'. md5( strtolower( trim( $email ) ) ). '?s=' . $size . '&r=' . $rating . '&d=' . $default;
elseif ($gravtype=='blank')
$grav_url = "/wp-includes/images/blank.gif";
else 
$grav_url = "http://0.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?s=" . $size ."&amp;d=" . $gravtype ."&amp;r=". $rating;
if(function_exists('hkTC_comment_title')):
$result.='<div class="gravatars" style="background: url('.$grav_url.')"></div>
<div><a href="'. clean_url( get_comment_link($comment->comment_ID),null,'display' ) . '">' . get_the_title($comment->comment_post_ID) . '</a> '. hkTC_get_comment_title($comment->comment_ID) .' '.$this->GetExcerpt($comment->comment_content, st_super_comments_excerpt_length()).' ...</div>';
else :
$result.='<div class="gravatars" style="background: url('.$grav_url.')"></div>
<div><a href="'. clean_url( get_comment_link($comment->comment_ID),null,'display' ) . '">' . get_the_title($comment->comment_post_ID) . '</a> '.$this->GetExcerpt($comment->comment_content, st_super_comments_excerpt_length).' ...</div>';
endif;
$result.='<div class="align-right"><p>Continue Reading <a href="'. clean_url( get_comment_link($comment->comment_ID),null,'display' ) . '">' . get_the_title($comment->comment_post_ID) . '</a></div>';
$result.="</div>";
$result.="<div class=\"divpadding\"></div>
";
}
$result.="</div>";
}
return $result.' ';
}
function CreatePost()
{
$mycomment=get_comment($_REQUEST['cid']);
$mypost=get_post($mycomment->comment_post_ID);
$options = $this->get_options();

$post = new stdClass;
$post->post_author = 1;

global $post;
if(function_exists('hkTC_comment_title'))
$commenhktitle=hkTC_get_comment_title($mycomment->comment_ID);
if($commenhktitle !='') 
$post->post_title = $commenhktitle.' : '.$this->GetExcerpt($mycomment->comment_content, st_super_comments_title()).'';
if($commenhktitle =='')
$post->post_title = $this->GetExcerpt($mycomment->comment_content, st_super_comments_title()).'';
$post->post_title= str_replace("\r", " ", str_replace("\n"," ",$post->post_title));
$post->post_title = str_replace(array('   ', '  '), ' ', $post->post_title);
$author_link='<p><small>Comment posted to <a href="'.get_permalink($mypost->ID).'#comment-'.$mycomment->comment_ID.'">'.$mypost->post_title.'</a> by '.$mycomment->comment_author.'.</small></p>';
if(st_auto_thumbs()!=0){
$thumbnail = get_image_path(get_post_meta( $mypost->ID, 'thumb', true ));
if($thumbnail!=''):
$st_template_url= get_bloginfo('template_url');
$author_link.='<a href="'.get_permalink($mypost->ID).'#comment-'.$mycomment->comment_ID.'"><img src="'.$st_template_url.'/timthumb.php?src='.$thumbnail.'&amp;w='.st_auto_thumb_wid().'&amp;h='.st_auto_thumb_hei().'&amp;zc=1&amp;q=75" class="'.st_auto_thumb_align().'" alt="'.$mypost->post_title.'" width="'.st_auto_thumb_wid().'" height="'.st_auto_thumb_hei().'" /></a>';
else:
if(st_auto_thumbs()!=0 && st_auto_thumbs()!=2){
$thumb=get_image_path(vp_get_thumb_url($post->post_content));
if ($thumb!=''){
$author_link.='<a href="'.get_permalink($mypost->ID).'#comment-'.$mycomment->comment_ID.'"><img src="'.$thumb.'" class="'.st_auto_thumb_align().'" width="'.st_auto_thumb_wid().'" alt="'.$mypost->post_title.'" /></a>';}}
endif;
}
$author_comments=$this->get_author_comments($mypost->ID,$mycomment->comment_author,$mycomment->comment_ID, $mycomment->comment_author_email);
$replycom='<div class="reply"><p><small><a href="'.get_permalink($mypost->ID).'?replytocom='.$mycomment->comment_ID.'#respond">Reply to Comment : '.$mypost->post_title.'</a></small></p></div>';
$post->post_content ="$author_link".$mycomment->comment_content."$replycom $author_comments";
return $post;
}	

function TemplateRedirect()
{
global $wp_query;	
$options = $this->get_options();
$page=$options['template'];

if (!file_exists(get_template_directory() . '/' . $page))
$page='index.php';

$post=$this->CreatePost();
$wp_query->posts = array();
$wp_query->post_count = 0;
$wp_query->posts[] = $post;
$wp_query->post_count = 1;
load_template(get_template_directory() . '/' . $page);
die();
}

function detectPost($posts){
global $wp;
global $wp_query;

if (
$_REQUEST['cid'] > 0			
){
$posts=NULL;
$posts[]=$this->CreatePost();
$wp_query->is_page = true;
$wp_query->is_singular = true;
$wp_query->is_home = false;
$wp_query->is_archive = false;
$wp_query->is_category = false;
$wp_query->query_vars["error"]="";
$wp_query->is_404=false;
}
return $posts;
}
}

endif;

if ( class_exists('SEOSuperComments') ) :

$SEOSuperComments = new SEOSuperComments();
if (isset($SEOSuperComments)) {
register_activation_hook( __FILE__, array(&$SEOSuperComments, 'install') );
}
endif;
?>