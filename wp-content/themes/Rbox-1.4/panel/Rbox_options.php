<?php
//include class file
require_once ('Rbox_functions.php');

$themename = "Rbox";
$shortname = "tm";

$categories = get_categories('hide_empty=0');
$cats_all = array();
foreach ($categories as $category_list ) {
       $cats_all[$category_list->cat_ID] = $category_list->cat_name;
}

$pages = get_pages();
$pages_all = array();
foreach ($pages as $page_list ) {
       $pages_all[$page_list->ID] = $page_list->post_title;
}
$posts = get_posts();
$posts_all = array();
foreach ($posts as $post_list ) {
       $posts_all[$post_list->ID] = $post_list->post_title;
}

$options = array (
 
array( "name" => $themename." Options",
	"type" => "title"),
	
//Navigation//
//////////////////////////////////////////////////////////////////////////////////////////	

array( "name" => "Logo",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Change logo (full path to logo image)",
	"desc" => "Put the full path, if you want to use IMAGE logo, instead of text logo",
	"id" => $shortname."_logo_01",
	"type" => "text",
	"std" => ""),
		
array( "name" => "Logo ALT Text",
	"desc" => "Alternate text for your logo",
	"id" => $shortname."_logo_02",
	"type" => "text",
	"std" => ""),
		
array( "name" => "save",
	"type" => "savebutton"),		

//Homepage settings//
//////////////////////////////////////////////////////////////////////////////////////////			
array( "type" => "close"),

array( "name" => "Homepage",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Welcome headline",
	"desc" => "write your headline here",
	"id" => $shortname."_head_01",
	"type" => "text",
	"std" => ""),

array( "name" => "Slideshow Style",
	"desc" => "Choose the type of slider",
	"id" => $shortname."_slide_style",
	"type" => "select",
	"options" => array("slider", "nivoslidedown", "nivofadein"),
	"std" => "slider"),

array( "name" => "Homepage Box 1",
	"desc" => "Choose a page from which data is drawn",
	"id" => $shortname."_box_01",
	"type" => "select",
	"options" => $pages_all,
	//"options" => $posts_all,
	"std" => "Select a Page"),
	
array( "name" => "Homepage Box 2",
	"desc" => "Choose a page from which data is drawn",
	"id" => $shortname."_box_02",
	"type" => "select",
	"options" => $pages_all,
	//"options" => $posts_all,
	"std" => "Select a Page"),

array( "name" => "Homepage Box 3",
	"desc" => "Choose a page from which data is drawn",
	"id" => $shortname."_box_03",
	"type" => "select",
	"options" => $pages_all,
	//"options" => $posts_all,
	"std" => "Select a Page"),
	
array( "name" => "Homepage Box 4",
	"desc" => "Choose a page from which data is drawn",
	"id" => $shortname."_box_04",
	"type" => "select",
	"options" => $pages_all,
	//"options" => $posts_all,
	"std" => "Select a Page"),
array( "name" => "Homepage Box 5",
	"desc" => "Choose a page from which data is drawn",
	"id" => $shortname."_box_05",
	"type" => "select",
	"options" => $pages_all,
	//"options" => $posts_all,
	"std" => "Select a Page"),
array( "name" => "Homepage Box 6",
	"desc" => "Choose a page from which data is drawn",
	"id" => $shortname."_box_06",
	"type" => "select",
	"options" => $pages_all,
	//"options" => $posts_all,
	"std" => "Select a Page"),
array( "name" => "Homepage Box 7",
	"desc" => "Choose a page from which data is drawn",
	"id" => $shortname."_box_07",
	"type" => "select",
	"options" => $pages_all,
	//"options" => $posts_all,
	"std" => "Select a Page"),

array( "name" => "save",
	"type" => "savebutton"),

//Portfolio settings//
//////////////////////////////////////////////////////////////////////////////////////////			
array( "type" => "close"),

array( "name" => "Portfolio",
	"type" => "section"),
array( "type" => "open"),
	
array( "name" => "Portfolio style",
	"desc" => "Choose portfolio column style",
	"id" => $shortname."_port_style",
	"type" => "select",
	"options" => array("1", "2", "3", "4"),
	"std" => ""),

array( "name" => "save",
	"type" => "savebutton"),

//Blog settings//
//////////////////////////////////////////////////////////////////////////////////////////			
array( "type" => "close"),

array( "name" => "Blog page",
	"type" => "section"),
array( "type" => "open"),
	
array( "name" => "Blog Exclude Categories",
	"desc" => "Specify a comma seperated list of category IDs (eg: 1,4,8) or slugs that you would like to exclude from your blog page (eg: uncategorized).",
	"id" => $shortname."_exclude_cat",
	"type" => "text",
	"std" => ""),

array( "name" => "save",
	"type" => "savebutton"),

//follow//
//////////////////////////////////////////////////////////////////////////////////////////
array( "type" => "close"),

array( "name" => "Follow links",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Feedburner URL",
	"desc" => "Insert your Feedburner URL here.",
	"id" => $shortname."_feedburner",
	"type" => "text",
	"std" => ""),
	
array( "name" => "Twitter",
	"desc" => "Insert your link to the twitter page here.",
	"id" => $shortname."_twitter",
	"type" => "text",
	"std" => ""),	
	
array( "name" => "Facebook",
	"desc" => "Insert your link to the facebook page here.",
	"id" => $shortname."_facebook",
	"type" => "text",
	"std" => ""),

array( "name" => "save",
	"type" => "savebutton"),

//Footer settings//
//////////////////////////////////////////////////////////////////////////////////////////

array( "type" => "close"),

array( "name" => "Footer",
	"type" => "section"),
array( "type" => "open"),
	
array( "name" => "Footer copyright text",
	"desc" => "Enter your company name here.",
	"id" => $shortname."_footer_text",
	"type" => "text",
	"std" => ""),
	
array( "name" => "Google Analytics Code",
	"desc" => "You can paste your Google Analytics or other tracking code in this box.",
	"id" => $shortname."_go_code",
	"type" => "textarea",
	"std" => ""),
	
array( "name" => "save",
	"type" => "savebutton"),		
		
array( "type" => "close")
 
);

// tm Metabox Options
// Start name with underscore to hide custom key from the user
$tm_metaboxes = array();

global $post;

/* "slide" Custom Post Type. */

if ( get_post_type() == 'slides' || !get_post_type() ) {																																														
								
								
	$tm_metaboxes[] = array (	
								"name" => "slide-link",
								"label" => __( 'Slide link', 'Rbox' ),
								"type" => "text",
								"desc" =>  __( 'Put the url of the page the slide would link to.', 'Rbox' ) );																
					           
					            
} //End slide

// Add extra metaboxes through function
if ( function_exists( "tm_metaboxes_add") )
	$tm_metaboxes = tm_metaboxes_add($tm_metaboxes);
	
	if ( get_option( 'tm_custom_template' ) != $tm_metaboxes) update_option( 'tm_custom_template', $tm_metaboxes );

			

update_option('tm_template',$options); 					  
update_option('tm_themename',$themename);   
update_option('tm_shortname',$shortname);


?>