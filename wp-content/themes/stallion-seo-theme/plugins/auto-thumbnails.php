<?php
function vp_get_thumb_url($text) {
global $post;
$imageurl="";
$img_src[0]="";
$allimages =&get_children('post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
foreach ($allimages as $img){
$img_src = wp_get_attachment_image_src($img->ID);
break;
}
$featuredimg = get_post_thumbnail_id($post->ID);
$img_src1 = wp_get_attachment_image_src($featuredimg, 'thumbnail');
$imageurl=$img_src1[0];

if (!$imageurl) {
$imageurl=$img_src[0];
}

if (!$imageurl) {
preg_match('/<\s*img [^\>]*src\s*=\s*[\""\']?([^\""\'>]*)/i' ,  $text, $matches);
$imageurl=$matches[1];
}

if (!$imageurl) {
preg_match("/([a-zA-Z0-9\-\_]+\.|)youtube\.com\/watch(\?v\=|\/v\/)([a-zA-Z0-9\-\_]{11})([^<\s]*)/", $text, $matches2);
$youtubeurl = $matches2[0];

if ($youtubeurl)
$imageurl = "http://img.youtube.com/vi/{$matches2[3]}/1.jpg";

else
preg_match("/([a-zA-Z0-9\-\_]+\.|)youtube\.com\/(embed\/|v\/)([a-zA-Z0-9\-\_]{11})([^<\s]*)/", $text, $matches2);
$youtubeurl = $matches2[0];

if ($youtubeurl)
$imageurl = "http://img.youtube.com/vi/{$matches2[3]}/1.jpg"; 
}
return $imageurl;
}
?>