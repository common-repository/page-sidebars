<?php
/*
Plugin Name: Page Sidebars
Plugin URI: http://www.nexterous.com/plugins/pagesidebars
Description: A plugin that allows you to have a sidebar for content on each individual page. 
Version: 2.6
Author: Daniel
Author URI: http://www.nexterous.com/
License: GNU GPL (www.wordpress.org/about/gpl)
*/

# MULTI-WIDGET SUPPORT (added 2.6)
if(!isset($widgets_amount)):

	$widgets_amount = 3;  // Change this number to the amount of sidebars that you want to put Page Sidebars on
	
endif;


# Create a widget to display the page sidebar content
add_action('widgets_init', 'ps_widget');
function ps_widget(){
	GLOBAL $widgets_amount;
	for($n = 1; $n <= $widgets_amount; $n++):
		register_sidebar_widget("Page Sidebars $n", 'ps_widget_content');
	endfor;
}

# Display the widget content
function ps_widget_content(){
	global $wp_query;
	$postid = $wp_query->post->ID;
	$fields = get_post_custom($postid);
	if(!empty($fields['_ps_sidebar_name']) AND !empty($fields['_ps_sidebar_content'])):
		echo "<div id='ps_sidebar_name'>{$fields['_ps_sidebar_name'][0]}</div>";
		echo "<div id='ps_sidebar_content'>{$fields['_ps_sidebar_content'][0]}</div>";
	endif;
}

# Create a box on the page editing
add_action('admin_menu', 'ps_pagebox');
function ps_pagebox() {
    add_meta_box('ps_pagebox', 'Page Sidebar', 'ps_pagebox_content', 'page', 'normal', 'high');
}

# Display the Page Box content
function ps_pagebox_content(){
	$fields = get_post_custom($_GET['post']); 
	$title = $fields['_ps_sidebar_name'][0];
	$content = $fields['_ps_sidebar_content'][0];
?>
<div id="postcustomstuff">
<table id="newmeta">
<thead>
<tr>
<th class="left"><label for="metakeyselect">Title</label></th>
<th><label for="metavalue">Content</label></th>
</tr>
</thead>

<tbody>
<tr>
<td id="newmetaleft" class="left">
<?php echo '<input type="hidden" name="ps_nonce" value="' . 
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />'; ?>
<input type="text" id="metakeyinput" name="ps_name" value="<?php echo $title; ?>" />
</td>

<td><textarea id="metavalue" name="ps_content" rows="2" cols="25"><?php echo $content; ?></textarea></td>
</tr>

<tr><td colspan="2" class="submit">
</tbody>
</table>
<p>Save / Publish Page to Save Sidebar Content</p>
</div>

<?php
}

# Save the content as a meta key
add_action('save_post', 'ps_save_content');
function ps_save_content($post_id){

// verify this came from the our screen and with proper authorization,
// because save_post can be triggered at other times

  if ( !wp_verify_nonce( $_POST['ps_nonce'], plugin_basename(__FILE__) )) {
    return $post_id;
  }

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ))
      return $post_id;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ))
      return $post_id;
  }

  // OK, we're authenticated: we need to find and save the data

  $title = $_POST['ps_name']; $content = $_POST['ps_content'];
  
	if(!update_post_meta($post_id, '_ps_sidebar_name', $title)):
		add_post_meta($post_id, '_ps_sidebar_name', $title);
	endif;

	if(!update_post_meta($post_id, '_ps_sidebar_content', $content)):
		add_post_meta($post_id, '_ps_sidebar_content', $content);
	endif;

}
?>