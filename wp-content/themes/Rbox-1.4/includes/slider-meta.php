<?php

$prefix = 'pt_';
 
$meta_box1 = array(
	'id' => 'pt-meta-box1',
	'title' => 'Images',
	'page' => 'slides',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	array(
			'name' => 'SlideUrl',
			'desc' => 'Side Link Url',
			'id' => 'slide_url',
			'type' => 'text',
			'std' => ''
		),
	),
	
);

add_action('admin_menu', 'pt_add_box1');



/*	Add metabox to edit page */
 
function pt_add_box1() {
	global $meta_box1;
 
	add_meta_box($meta_box1['id'], $meta_box1['title'], 'pt_show_box1', $meta_box1['page'], $meta_box1['context'], $meta_box1['priority']);
}



/*	Callback function to show fields in meta box */

function pt_show_box1() {
	global $meta_box1, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('Put your link here you would like the slider should go to.', 'Rbox').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="pt_meta_box1_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box1['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
 
			//If Button	
			case 'button':
				echo '<input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
				echo 	'</td>',
			'</tr>';
			
			break;
		}

	}
 
	echo '</table>';
}
 
add_action('save_post', 'pt_save_data1');


/*-----------------------------------------------------------------------------------*/
/*	Save data when post is edited
/*-----------------------------------------------------------------------------------*/
 
function pt_save_data1($post_id) {
	global $meta_box1, $meta_box_video;
 
	// verify nonce
	if (!wp_verify_nonce($_POST['pt_meta_box1_nonce'], basename(__FILE__))) {
		return $post_id;
	}
 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
 
	foreach ($meta_box1['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}



/*	Queue Scripts */
 
function pt_admin_scripts1() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
}
function pt_admin_styles1() {
	wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'pt_admin_scripts1');
add_action('admin_print_styles', 'pt_admin_styles1');