<?php
/*
Plugin Name: Hikari Titled Comments
Plugin URI: http://hikari.ws/titled-comments/
Description: Hikari Titled Comments enables each comment to have a title, so that commentators can give a subject meaning to their comments.
Version: 0.02.02
Author: Hikari
Author URI: http://Hikari.ws
*/

/**!
*
* I, Hikari, from http://Hikari.WS , and the original author of the Wordpress plugin named
* Hikari Titled Comments, please keep this license terms and credit me if you redistribute the plugin
*
* I dedicate Hikari Titled Comments to Chiih-chan, my kawaii great frient ^-^
*
*
*   This program is distributed in the hope that it will be useful,
*    but WITHOUT ANY WARRANTY; without even the implied warranty of
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*
/*****************************************************************************
* © Copyright Hikari (http://wordpress.Hikari.ws), 2010
* If you want to redistribute this script, please leave a link to
* http://hikari.WS
*****************************************************************************/

function hkTC_get_comment_title($comment_id=null){
	if(empty($comment_id)){
		global $comment;
		$comment_id = $comment->comment_ID;
	}
	
	if(empty($comment_id)) return null;
	
	$cTitle = get_metadata('comment', $comment_id, 'hikari-titled-comments', true);
	$cTitle = apply_filters( 'HkTC_get_comment_title', $cTitle );
	
	return $cTitle;
}

function hkTC_comment_title($comment_id=null,$before=null,$after=null){
	$cTitle = hkTC_get_comment_title($comment_id);
	
	if(!empty($cTitle)){
		$cTitle = htmlspecialchars($cTitle);
	
		echo $before.$cTitle.$after;
	}
}

class HkTC{
	private $plugin_dir_path;
	private $plugin_dir_url;

	/*
		Class constructor, it is run when the plugin is loaded (object is instantiated on the bottom of the code)
		It defines the plugin URL path (so that js and css can be loaded by the browser) and adds our filter to proper hooks.
	*/
	function __construct(){
		$this->plugin_dir_path = plugin_dir_path(__FILE__);
		$this->plugin_dir_url = plugin_dir_url(__FILE__);
	
		$this->setFilters();
	}

	// add our filter to proper hooks
	private function setFilters(){

		add_action('comment_post', array($this,'postingComment'));
		add_action('edit_comment', array($this,'editingComment'));
		
		add_action('admin_menu', array($this,'register_meta_box'));
		add_filter('comment_text', array($this,'admin_pages'));

	}


	public function postingComment($comment_id){
		$cTitle = $_POST['hikari-titled-comments'];
		
		if(!empty($cTitle)){
			$this->setTitle($comment_id,$cTitle);
		}
	}
	
	public function editingComment($comment){

		if(!is_object($comment)){
			$comment = get_comment($comment);
			if(empty($comment)) return;
		}
		$comment_id = $comment->comment_ID;
		
	
		if(!wp_verify_nonce( $_POST['HkTC_nonce'], plugin_basename(__FILE__).$comment->comment_ID.'-update_title' ))
			return;

		if( !current_user_can('edit_post', $comment->comment_post_ID) )
			return;
			
			
			
		$cTitleOld = hkTC_get_comment_title($comment->comment_ID);
		$cTitleNew = $_POST['hikari-titled-comments'];
		
		if(empty($cTitleNew)){
			if(!empty($cTitleOld)) delete_metadata('comment', $comment_id, 'hikari-titled-comments','',false);
		}
		else{
			$this->setTitle($comment_id,$cTitleNew);
		}
	
	}


	public function setTitle($comment_id, $cTitle){
		if(!current_user_can('unfiltered_html')){
			add_filter('HkTC_comment_title_save_pre', 'wp_filter_kses');
		}
	
		$cTitle = apply_filters( 'HkTC_comment_title_save_pre', $cTitle, $comment_id );
	
		return update_metadata('comment', $comment_id, 'hikari-titled-comments', $cTitle);
	}
	
	

	public function admin_pages($comment_content){
		if(is_admin()){
			$cTitle = hkTC_get_comment_title();
			
			if(!empty($cTitle)){
				$comment_content = "<h3>$cTitle</h3>\n" . $comment_content;
			}
		}
	
		return $comment_content;
	}




	public function register_meta_box(){
		add_meta_box('HkTC_comment_meta_box', 'Comment Title', array($this,'admin_edit_box'), 'comment', 'normal');
	}

	public function admin_edit_box(){
		global $comment;
		$cTitle = HkTC_get_comment_title();
?>

<p>
	<input type="hidden" name="HkTC_nonce" id="HkTC_nonce" value="<?php echo wp_create_nonce(
			plugin_basename(__FILE__).$comment->comment_ID.'-update_title' ); ?>" />
	<input type="text" name="hikari-titled-comments" id="hikari-titled-comments" size="30" class="widefat" value="<?php echo $cTitle; ?>" />
</p>

<?php
	}
}
$hkTC = new HkTC();