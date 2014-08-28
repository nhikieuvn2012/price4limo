<?php
function mytheme_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
<div class="com-wrapper <?php if (1 == $comment->user_id) echo "admin"; ?>">
<div id="comment-<?php comment_ID(); ?>" class="com-header">
<?php /*echo get_avatar($comment, 60);*/
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
?>
<div class="gravatars" style="background: url(<?php echo $grav_url ?>)"></div>

<div class="tp">
<?php if($comment->user_id ==1): ?>
<div class="author_name"><?php comment_author_link(); ?></div>
<?php else : ?>
<?php if(st_author_links_show()==1 && $comment->comment_author_url != "") : ?>
<form class="formlink" method="post" action="<?php comment_author_url() ?>"><div><button class="bnofollow" title="<?php comment_author() ?>"><?php comment_author() ?></button></div></form>
<?php else : ?>
<div class="authorname"><?php comment_author() ?></div>
<?php endif; ?>
<?php endif; ?>

<?php if ($comment->comment_approved == '0') : ?>
<em><?php _e('Your comment is awaiting moderation', 'Stallion'); ?>.</em>
<?php endif; ?>
<small class="comment-meta"><a href="#comment-<?php comment_ID() ?>">Comment on <?php the_title(); ?></a> <?php if(st_commentst_post_dates_hide()==1){ ?>(<?php printf( __('%1$s at %2$s', 'Stallion'), get_comment_time(__('F jS, Y', 'Stallion')), get_comment_time(__('H:i', 'Stallion')) ); ?>)<?php } ?> <?php edit_comment_link(__('Edit', 'Stallion'),'&nbsp;&nbsp;',''); ?></small>
</div>
</div>

<?php if(function_exists('hkTC_comment_title'))
	hkTC_comment_title($comment->comment_ID,'<p class="comment-title">','</p>');
?>
<?php comment_text() ?>

<div class="reply">
<p><small><?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply to Comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></small></p>
</div>

<?php if(function_exists('SEOSCStallion')): ?>
<?php
if (strlen(strip_tags($comment->comment_content)) > st_super_comments_wds()) : ?>
<p class="align-right"><a href="<?php the_permalink() ?>?cid=<?php comment_ID() ?>"><small><?php the_title(); ?></small></a></p>
<?php endif; ?>
<?php endif; ?>
</div>
<?php }

function mytheme_ping($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
      
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
<div class="com-wrapper">
<div id="comment-<?php comment_ID(); ?>" class="com-header">
<img height="48" width="48" class="avatar avatar-48 photo" src="<?php bloginfo('stylesheet_directory'); ?>/images/ico/link.png" alt="<?php the_title(); ?> Link"/>

<p class="tp">
<span><?php comment_author() ?></span>
<?php if ($comment->comment_approved == '0') : ?>
<em><?php _e('Your comment is awaiting moderation', 'Stallion'); ?>.</em>
<?php endif; ?>
<small class="comment-meta"><a href="#comment-<?php comment_ID() ?>">Comment on <?php the_title(); ?></a> <?php if(st_commentst_post_dates_hide()==1){ ?>(<?php printf( __('%1$s at %2$s', 'Stallion'), get_comment_time(__('F jS, Y', 'Stallion')), get_comment_time(__('H:i', 'Stallion')) ); ?>)<?php } ?> <?php edit_comment_link(__('Edit', 'Stallion'),'&nbsp;&nbsp;',''); ?></small>
</p>
</div>

<?php comment_text() ?>
</div>
<?php } ?>