<div class="comment-stallion">
<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');

if (!empty($post->post_password)) { // if there's a password
if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>
<h3><?php _e('This post is password protected. Enter the password to view comments', 'Stallion'); ?>.</h3>
<?php
return;
} }

if (function_exists('wp_list_comments')):
//WP 2.7 Comment Loop
if ( have_comments() ) : ?>

<?php if ( ! empty($comments_by_type['comment']) ) :
$count = count($comments_by_type['comment']); ?>

<div class="commenthead">
<h3 id="comments">&nbsp;&nbsp;<?php printf(__('%s responses to', 'Stallion'), $count); ?> <?php the_title(); ?></h3>
</div>

<div class="divpadding"></div>
<div class="wp-pagenavi"><?php paginate_comments_links(); ?></div>
<?php if(st_kontera_on()==1){echo('<div class="KonaBody">');} ?><?php if(st_linkwords_on()==1){echo('<div id="lw_context_ads">');} ?><?php if(st_infolinks_on()==1){echo('<!--INFOLINKS_ON-->');} ?>
<ul class="list-4">
<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
</ul>
<?php if(st_linkwords_on()==1){echo('</div>');} ?><?php if(st_kontera_on()==1){echo('</div>');} ?><?php if(st_infolinks_on()==1){echo('<!--INFOLINKS_OFF-->');} ?>
<?php endif; ?>

<div class="wp-pagenavi"><?php paginate_comments_links(); ?></div>

<?php if ( ! empty($comments_by_type['pings']) ) :
$countp = count($comments_by_type['pings']); ?>
<div class="commenthead">
<h3 class="trackbacks" class="block">&nbsp;&nbsp;<?php the_title(); ?> <?php printf(__('%s Trackbacks &#47; Pingbacks', 'Stallion'), $countp); ?></h3>
</div>
<div class="clear">&nbsp;</div>

<ul class="list-4">
<?php wp_list_comments('type=pings&callback=mytheme_ping'); ?>
</ul>
<?php endif; ?>

<?php else : // this is displayed if there are no comments so far ?>
<?php if ('open' == $post->comment_status) :
// If comments are open, but there are no comments.
else : ?>
<?php endif;
endif;
else:
//WP 2.6 and older Comment Loop
$oddcomment = 'class="alt" ';
?>

<?php if ($comments) : ?>
<div class="clear">&nbsp;</div>
<div class="commenthead">
<h3 class="comments" class="block">&nbsp;&nbsp;<?php comments_number( __('No responses to', 'Stallion'), __('One response to', 'Stallion'), __('% responses to', 'Stallion'));?> <?php the_title(); ?></h3>
</div>
<ul class="list-4">

<?php foreach ($comments as $comment) : ?>

<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
<div class="com-header">
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

<p class="tp">
<span><?php comment_author_link() ?></span>
<?php if ($comment->comment_approved == '0') : ?>
<em><?php _e('Your comment is awaiting moderation', 'Stallion'); ?>.</em>
<?php endif; ?>
<small class="comment-meta"><a href="#comment-<?php comment_ID() ?>">Comment on <?php the_title(); ?></a> <?php if(st_commentst_post_dates_hide()==1){ ?>(<?php printf( __('%1$s at %2$s', 'Stallion'), get_comment_time(__('F jS, Y', 'Stallion')), get_comment_time(__('H:i', 'Stallion')) ); ?>)<?php } ?> <?php edit_comment_link(__('Edit', 'Stallion'),'&nbsp;&nbsp;',''); ?></small>
</p>
</div>
<?php comment_text() ?>
</li>

<?php
/* Changes every other comment to a different class */
$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
?>

<?php endforeach; /* end for each comment */ ?>

</ul>

<?php else : // this is displayed if there are no comments so far ?>

<?php if ('open' == $post->comment_status) : ?>
<!-- If comments are open, but there are no comments. -->

<?php else : // comments are closed ?>

<?php endif; ?>
<?php endif; ?>
<?php endif; ?>

<div class="reply">
<?php if ('open' == $post->comment_status) : ?>

<h4 id="respond"><?php _e('Leave a reply to', 'Stallion'); ?> <?php the_title(); ?></h4>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<?php
$login_link = get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink());
printf(__('You must be<form method="post" action="%s"><div><button class="bnofollow" title="logged in">logged in</button></div></form> to post a comment.', 'Stallion'), $login_link);
#printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'Stallion'), $login_link);
?>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : 
if (function_exists('wp_logout_url')) {
$logout_link = wp_logout_url();
} else {
$logout_link = get_option('siteurl') . '/wp-login.php?action=logout';
} ?>

<p><?php _e('Logged in as', 'Stallion'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo $logout_link ?>" title="<?php _e('Log out of this account', 'Stallion'); ?>"><?php _e('Log out', 'Stallion'); ?> &raquo;</a></p>

<?php else : ?>
<div id="comment-box">
<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author" class="author"><?php _e('Name', 'Stallion'); ?> <?php if ($req) echo __('(required)', 'Stallion'); ?></label></p>
<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email" class="email"><?php _e('Mail (not published)', 'Stallion'); ?> <?php if ($req) echo __('(required)', 'Stallion'); ?></label></p>
<?php if(st_author_links()==1){ ?><p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url" class="website"><?php _e('Website', 'Stallion'); ?></label></p><?php } ?>
</div>
<?php endif; ?>

<?php if (function_exists('cancel_comment_reply_link')) { 
//2.7 comment loop code ?>
<p>
<?php comment_id_fields(); ?>
</p>
<?php } ?>

<div id="comment-area">

<?php if(function_exists('hkTC_comment_title')) { ?><div id="comment-box2">
<p><input type="text" name="hikari-titled-comments" id="hikari-titled-comments" size="22" tabindex="4" value="" /><label for="hikari-titled-comments" class="website"> <?php _e('Comment Title', 'Stallion'); ?></label></p>
</div><?php } ?>

<p><textarea name="comment" id="comment" rows="12" tabindex="5" cols="92"></textarea></p>
<p><input name="submit" type="submit" id="submit" tabindex="6" value="<?php _e('Submit Comment', 'Stallion'); ?>" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>
</div>
</form>

<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>
</div>
</div>