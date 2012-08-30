<?php

if ( ! isset( $content_width ) )
	$content_width = 620;

/** Tell WordPress to run Rbox_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'Rbox_setup' );

if ( ! function_exists( 'Rbox_setup' ) ):

function Rbox_setup() {

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'Rbox', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

			// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'Rbox' ),
	) );

}
endif;
?>
<?php
function list_pings($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
<?php } ?>
<?php
add_filter('get_comments_number', 'comment_count', 0);
function comment_count( $count ) {
	if ( ! is_admin() ) {
	global $id;
	$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
	return count($comments_by_type['comment']);
} else {
return $count;
}
}
?>
<?php
if ( ! function_exists( 'Rbox_comment' ) ) :
function Rbox_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s', 'Rbox' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'Rbox' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'Rbox' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'Rbox' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'Rbox' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'Rbox'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override Rbox_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 */
function Rbox_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'Rbox' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'Rbox' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'Rbox' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'Rbox' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'Rbox' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'Rbox' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'Rbox' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'Rbox' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'Rbox' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'Rbox' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
if ( ! function_exists( 'Rbox_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post�date/time and author.
 */
function Rbox_posted_on() {
	printf( __( '<span class="%1$s date_icon"> %2$s </span>    ', 'Rbox' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'Rbox' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;
/** Register sidebars by running Rbox_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'Rbox_widgets_init' );

/** Excerpt */
function Rbox_excerpt_length( $length ) {
	return 45;
}
add_filter( 'excerpt_length', 'Rbox_excerpt_length' );

function Rbox_auto_excerpt_more( $more ) {
	return ' &hellip;' ;
}
add_filter( 'excerpt_more', 'Rbox_auto_excerpt_more' );

/** redirect */
if ( is_admin() && isset($_GET['activated'] ) && $pagenow ==	"themes.php" )
	wp_redirect( 'themes.php?page=Rbox_functions.php');

// custom function
function wt_get_ID_by_page_name($page_name)
{
	global $wpdb;
	$page_name_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = '".$page_name."' AND post_type IN ('post', 'page') ");
	return $page_name_id;
}

// POST TYPES

function post_type_slides() {
$args = array(
'label' => 'SLIDES',
'public' => true,
'show_ui' => true,
'capability_type' => 'post',
'hierarchical' => false,
'rewrite' => true,
'query_var' => true,
'supports' => array(
'title',
'editor',
'custom-fields',
'thumbnail')
 );

register_post_type( 'slides', $args );
}
add_action('init', 'post_type_slides');

function post_type_home_boxes() {
	$args = array(
    	'label' => 'HOMEPAGE BOXES',
    	'public' => true,
    	'publicly_queryable' => true,
    	'show_ui' => true,
    	'query_var' => true,
    	'rewrite' => true,
    	'capability_type' => 'post',
    	'supports' => array('title','editor', 'thumbnail','custom-fields')
	);

	register_post_type( 'home_boxes', $args );
}
add_action('init', 'post_type_home_boxes');

function post_type_portfolios() {
	$args = array(
    	'label' => 'PORTFOLIO',
    	'public' => true,
    	'publicly_queryable' => true,
    	'show_ui' => true,
    	'query_var' => true,
    	'rewrite' => true,
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'menu_position' => null,
    	'supports' => array('title','editor', 'thumbnail','custom-fields')
	);

	register_post_type( 'portfolios', $args );
}
add_action('init', 'post_type_portfolios');

// Shortcodes///////////////////

//lightbox//

function lightbox_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
		'href' => '',
		'type' => 'image',
	), $atts));

	$class = 'prettyPhoto[gallery1]';

	if($type != 'image')
	{
		$class.= '_'.$type;
	}

	$return_html.= '<a href="'.$href.'" rel="'.$class.'">'.do_shortcode($content).'</a>';

	return $return_html;
}
add_shortcode('lightbox', 'lightbox_func');

//buttons//
function Rbox_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'link'	=> '#',
    'target'	=> '',
    'variation'	=> '',
    'size'	=> '',
    'align'	=> '',
    ), $atts));

	$style = ($variation) ? ' '.$variation. '_gradient' : '';
	$align = ($align) ? ' align'.$align : '';
	$size = ($size == 'large') ? ' large_button' : '';
	$target = ($target == 'blank') ? ' target="_blank"' : '';

	$out = '<a' .$target. ' class="button_link' .$style.$size.$align. '" href="' .$link. '"><span>' .do_shortcode($content). '</span></a>';

    return $out;
}
add_shortcode('button', 'Rbox_button');

/*
* jQuery Tools - Tabs shortcode
*/
add_shortcode( 'tabmenu', 'etdc_tab_menu' );
function etdc_tab_menu( $atts, $content ){
$GLOBALS['tab_count'] = 0;

do_shortcode( $content );

if( is_array( $GLOBALS['tabs'] ) ){
foreach( $GLOBALS['tabs'] as $tab ){
$tabs[] = '<li><a class="" href="#">'.$tab['title'].'</a></li>';
$panes[] = '<div class="pane">'.$tab['content'].'</div>';
}
$return = "\n".'<ul class="tabs">'.implode( "\n", $tabs ).'</ul>'."\n".'<div class="panes">'.implode( "\n", $panes ).'</div>'."\n";
}
return $return;
}

add_shortcode( 'tab', 'etdc_tab' );
function etdc_tab( $atts, $content ){
extract(shortcode_atts(array(
'title' => 'Tab %d'
), $atts));

$x = $GLOBALS['tab_count'];
$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  $content );

$GLOBALS['tab_count']++;
}

/*
* jQuery Tools - Accordion shortcode
*/
add_shortcode( 'accordion', 'etdc_accordion_group' );
function etdc_accordion_group( $atts, $content ){
$GLOBALS['accordion_count'] = 0;

do_shortcode( $content );

if( is_array( $GLOBALS['accordion'] ) ){
foreach( $GLOBALS['accordion'] as $accordion_pane ){
$accordion[] = '<h2>'.$accordion_pane['title'].'</h2>'.'<div class="pane">'.$accordion_pane['content'].'</div>';
}
$return = "\n".'<div id="accordion">'.implode( "\n", $accordion )."\n".'</div>'."\n";
}
return $return;
}

add_shortcode( 'accordion_pane', 'etdc_accordion' );
function etdc_accordion( $atts, $content ){
extract(shortcode_atts(array(
'title' => 'Accordion_pane %d'
), $atts));

$x = $GLOBALS['accordion_count'];
$GLOBALS['accordion'][$x] = array( 'title' => sprintf( $title, $GLOBALS['accordion_count'] ), 'content' =>  $content );

$GLOBALS['accordion_count']++;
}


//CUSTOM LIST TYPE//

add_shortcode('customlist', 'custom_list');
function custom_list($atts, $content = null) {
	extract(shortcode_atts(array(
		"type" => ''
	), $atts));

	$type = ' list-' . $type;

	$return = "
		<div class='custom-list{$type}'>
			{$content}
		</div> <!-- .custom-list -->";

	return $return;
}

//VIDEO//

function video_func($atts) {

	//extract short code attr
	extract(shortcode_atts(array(
		'width' => 620,
		'height' => 370,
		'video_id' => '',
		'type' => '',
	), $atts));

	$custom_id = time().rand();

		if($type == 'youtube')
	{
			$return_html = '<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/'.$video_id.'&hd=1" style="width:'.$width.'px;height:'.$height.'px"><param name="wmode" value="opaque"><param name="movie" value="http://www.youtube.com/v/'.$video_id.'&hd=1" /></object>';
	}

		if($type == 'vimeo')
	{
			$return_html = '<object width="'.$width.'" height="'.$height.'"><param name="allowfullscreen" value="true" /><param name="wmode" value="opaque"><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id='.$video_id.'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id='.$video_id.'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="'.$width.'" height="'.$height.'" wmode="transparent"></embed></object>';
	}

	return $return_html;
}
add_shortcode('video', 'video_func');

//boxes//
function successbox($atts, $content=null, $code="") {
$return = '<div class="success">';
$return .= $content;
$return .= '</div>';
return $return;
}
add_shortcode('success' , 'successbox' );

function infobox($atts, $content=null, $code="") {
$return = '<div class="info">';
$return .= $content;
$return .= '</div>';
return $return;
}
add_shortcode('info' , 'infobox' );

function warningbox($atts, $content=null, $code="") {
$return = '<div class="warning">';
$return .= $content;
$return .= '</div>';
return $return;
}
add_shortcode('warning' , 'warningbox' );

function cancelbox($atts, $content=null, $code="") {
$return = '<div class="cancel">';
$return .= $content;
$return .= '</div>';
return $return;
}
add_shortcode('cancel' , 'cancelbox' );

//highlights//
function hyellow($atts, $content = null) {
	$return = '<span class="yellow">';
$return .= $content;
$return .= '</span>';
return $return;
}

add_shortcode('yellow', 'hyellow');

function hblack($atts, $content = null) {
	$return = '<span class="black">';
$return .= $content;
$return .= '</span>';
return $return;
}

add_shortcode('black', 'hblack');

function hred($atts, $content = null) {
	$return = '<span class="red">';
$return .= $content;
$return .= '</span>';
return $return;
}

add_shortcode('red', 'hred');

//drop caps//
function dropcap($atts, $content = null) {
	$return = '<span class="dropcap">';
$return .= $content;
$return .= '</span>';
return $return;
}

add_shortcode('dropcap', 'dropcap');

function pullleft($atts, $content = null) {
	$return = '<span class="pullleft">';
$return .= $content;
$return .= '</span>';
return $return;
}

add_shortcode('pullleft', 'pullleft');

function pullright($atts, $content = null) {
	$return = '<span class="pullright">';
$return .= $content;
$return .= '</span>';
return $return;
}

add_shortcode('pullright', 'pullright');

function quote($atts, $content = null) {
	$return = '<span class="quote">';
$return .= $content;
$return .= '</span>';
return $return;
}

add_shortcode('quote', 'quote');

//column shortcodes
function Rbox_one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'Rbox_one_third');

function Rbox_one_third_last( $atts, $content = null ) {
   return '<div class="one_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_third_last', 'Rbox_one_third_last');

function Rbox_two_third( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'Rbox_two_third');

function Rbox_two_third_last( $atts, $content = null ) {
   return '<div class="two_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_third_last', 'Rbox_two_third_last');

function Rbox_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'Rbox_one_half');

function Rbox_one_half_last( $atts, $content = null ) {
   return '<div class="one_half last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_half_last', 'Rbox_one_half_last');

function Rbox_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'Rbox_one_fourth');

function Rbox_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fourth_last', 'Rbox_one_fourth_last');

function Rbox_three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'Rbox_three_fourth');

function Rbox_three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fourth_last', 'Rbox_three_fourth_last');

function Rbox_one_fifth( $atts, $content = null ) {
   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'Rbox_one_fifth');

function Rbox_one_fifth_last( $atts, $content = null ) {
   return '<div class="one_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fifth_last', 'Rbox_one_fifth_last');

function Rbox_two_fifth( $atts, $content = null ) {
   return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fifth', 'Rbox_two_fifth');

function Rbox_two_fifth_last( $atts, $content = null ) {
   return '<div class="two_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_fifth_last', 'Rbox_two_fifth_last');

function Rbox_three_fifth( $atts, $content = null ) {
   return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fifth', 'Rbox_three_fifth');

function Rbox_three_fifth_last( $atts, $content = null ) {
   return '<div class="three_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fifth_last', 'Rbox_three_fifth_last');

function Rbox_four_fifth( $atts, $content = null ) {
   return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_fifth', 'Rbox_four_fifth');

function Rbox_four_fifth_last( $atts, $content = null ) {
   return '<div class="four_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('four_fifth_last', 'Rbox_four_fifth_last');

function Rbox_one_sixth( $atts, $content = null ) {
   return '<div class="one_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'Rbox_one_sixth');

function Rbox_one_sixth_last( $atts, $content = null ) {
   return '<div class="one_sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_sixth_last', 'Rbox_one_sixth_last');

function Rbox_five_sixth( $atts, $content = null ) {
   return '<div class="five_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('five_sixth', 'Rbox_five_sixth');

function Rbox_five_sixth_last( $atts, $content = null ) {
   return '<div class="five_sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('five_sixth_last', 'Rbox_five_sixth_last');

function Rbox_formatter($content) {
	$new_content = '';

	/* Matches the contents and the open and closing tags */
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';

	/* Matches just the contents */
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

	/* Divide content into pieces */
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	/* Loop over pieces */
	foreach ($pieces as $piece) {
		/* Look for presence of the shortcode */
		if (preg_match($pattern_contents, $piece, $matches)) {

			/* Append to content (no formatting) */
			$new_content .= $matches[1];
		} else {

			/* Format and append to content */
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}

// Remove the 2 main auto-formatters
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

// Before displaying for viewing, apply this function
add_filter('the_content', 'Rbox_formatter', 99);
add_filter('widget_text', 'Rbox_formatter', 99);

//Long posts should require a higher limit, see http://core.trac.wordpress.org/ticket/8553
@ini_set('pcre.backtrack_limit', 500000);

/*nivo fix*/
function my_init_method() {
if (!is_admin()) {
wp_deregister_script( 'jquery' );
wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js');
wp_enqueue_script( 'jquery' );
}
}
add_action('init', 'my_init_method');

/*small title*/
function small_title($amount,$echo=true) {
	$small = get_the_title();
	if ( strlen($small) <= $amount ) $echo_out = ''; else $echo_out = '...';
	$small = mb_substr( $small, 0, $amount, 'UTF-8' );
	if ($echo) {
		echo $small;
		echo $echo_out;
	}
	else { return ($small . $echo_out); }
}

/*-----------------------------------------------------------------------------------*/
/* Exclude categories from displaying on the "Blog" page template.
/*-----------------------------------------------------------------------------------*/

// Exclude categories on the "Blog" page template.
add_filter( 'tm_blog_template_query_args', 'tm_exclude_categories_blogtemplate' );

function tm_exclude_categories_blogtemplate ( $args ) {

	if ( ! function_exists( 'tm_prepare_category_ids_from_option' ) ) { return $args; }

	$excluded_cats = array();

	// Process the category data and convert all categories to IDs.
	$excluded_cats = tm_prepare_category_ids_from_option( 'tm_exclude_cat' );


	if ( count( $excluded_cats ) > 0 ) {

		// Setup the categories as a string, because "category__not_in" doesn't seem to work
		// when using query_posts().

		foreach ( $excluded_cats as $k => $v ) { $excluded_cats[$k] = '-' . $v; }
		$cats = join( ',', $excluded_cats );

		$args['cat'] = $cats;
	}

	return $args;

}

/*-----------------------------------------------------------------------------------*/
/* tm_prepare_category_ids_from_option()
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'tm_prepare_category_ids_from_option' ) ) {

	function tm_prepare_category_ids_from_option ( $option ) {

		$cats = array();

		$stored_cats = get_option( $option );

		$cats_raw = explode( ',', $stored_cats );

		if ( is_array( $cats_raw ) && ( count( $cats_raw ) > 0 ) ) {
			foreach ( $cats_raw as $k => $v ) {
				$value = trim( $v );

				if ( is_numeric( $value ) ) {
					$cats_raw[$k] = $value;
				} else {
					$cat_obj = get_category_by_slug( $value );
					if ( isset( $cat_obj->term_id ) ) {
						$cats_raw[$k] = $cat_obj->term_id;
					}
				}

				$cats = $cats_raw;
			}
		}

		return $cats;

	}

}

function Rbox_date_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s', 'Rbox' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		)
	);
}

// include panel file.
require_once(TEMPLATEPATH . '/panel/Rbox_options.php');
require_once(TEMPLATEPATH . '/includes/slider-meta.php');

// include wp-pagenavi file.
require(TEMPLATEPATH . "/includes/wp-pagenavi.php");

// Getting the category as slugs, and not as links
function the_category_unlinked($separator = ' ') {
    $categories = (array) get_the_category();

    $thelist = '';
    foreach($categories as $category) {    // concate
        $thelist .= $separator . $category->category_nicename;
    }

    echo $thelist;
}
