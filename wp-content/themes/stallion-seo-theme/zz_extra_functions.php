<?php
/* Keep your functions.php file clean, add new functions below */

/* You might find the odd Stallion test or future feature here */
?>
<?php 
/* The test code below adds a sig to the Admins comments */
/* Will probably incorporate into the next update */
/* To try it out remove the two lines (10 and 22) including *s and edit the name and link */
/*
add_filter( 'comment_text', 'st_comment_sig' );
function st_comment_sig($st_sig) {
$id = get_comment(get_comment_ID())->user_id;
global $comment;
if($id == 1 ){
$st_sig = get_comment_text($comment) . '<p>David Law : <a href="http://www.stallion-theme.com/">Best WordPress SEO Theme</a></p>';
}else{
$st_sig = get_comment_text($comment);
}
return $st_sig;
}
*/
?>