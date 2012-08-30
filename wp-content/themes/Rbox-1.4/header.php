<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>


	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title>Taipei Cultural Center in New York
	<?php /* if (is_front_page() ) {
    bloginfo('name');
	} elseif ( is_category() ) {
		single_cat_title(); echo ' - ' ; bloginfo('name');
	} elseif (is_single() ) {
		single_post_title();
	} elseif (is_page() ) {
		single_post_title(); echo ' - '; bloginfo('name');
	} elseif (is_archive() ) {
		single_month_title(); echo ' - '; bloginfo('name');
	} else {
		wp_title('',true);
	} */ ?>
	</title>
			
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link href="<?php bloginfo('template_directory'); ?>/favicon.ico" rel="shortcut icon"/>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/nivo-slider.css" type="text/css" /> 
<!-- <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/dropdown.css" type="text/css" /> -->
<!-- <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/default.advanced.css" type="text/css" /> -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Cuprum:700' rel='stylesheet' type='text/css'>
	
<?php if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_enqueue_script('jquery'); ?>
	
	<?php wp_head(); ?>
	
	<!--[if lt IE 7]>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>js/jquery/jquery.dropdown.js"></script>
<![endif]-->

<!-- / END -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.nivo.slider.pack.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/tabs.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/cufon/cufon-yui.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/cufon/Titillium_Rg_700.font.js" type="text/javascript"></script>

<!-- Javascript Start //-->

<script type="text/javascript"> 
 
// dropdown menu
jQuery(document).ready(function () {	

jQuery('ul.dropdown ul').css('display', 'none');

	jQuery('ul.dropdown li').hover(
		function () {
			//show its submenu
			jQuery('ul', this).slideDown(250);
		}, 
		function () {
			//hide its submenu
			jQuery('ul', this).slideUp(250);	
		}
	);
	
});
 
</script>

<?php $tm_slide_style = get_option('tm_slide_style'); ?>

<?php if (is_front_page() ) { ?>

<?php if ($tm_slide_style == 'slider') { ?>

		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle.all.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.easing.1.3.js"></script>	

<script type="text/javascript">
jQuery.noConflict();
 jQuery(document).ready( function($){	
 
 $('#slideshow').after('<div id="nav">').cycle({ 
   		fx: 'scrollLeft',
        speed:  'slow',
		easing: 'easeInOutQuad',
        timeout: 5000,
        pager:  '#nav'

});
});

</script>

<?php } else if ($tm_slide_style == 'nivoslidedown') { ?>

<script type="text/javascript">
jQuery(document).ready(function() {
       jQuery('#slider').nivoSlider({
	   animSpeed:500, //Slide transition speed
        pauseTime:3000,	
		directionNav:true,
		pauseOnHover:false,
		effect:'sliceDownLeft'	
		});
    });
</script>

<?php } else if ($tm_slide_style == 'nivofadein') { ?>

<script type="text/javascript">
jQuery(document).ready(function() {
       jQuery('#slider').nivoSlider({
	   animSpeed:500, //Slide transition speed
        pauseTime:3000,	
		directionNav:true,
		pauseOnHover:false,
		effect:'fade'	
		});
    });
</script>

<?php } ?>
<?php } ?>

<script type="text/javascript">
jQuery(function() { 

jQuery("#accordion").tabs("#accordion div.pane", {tabs: 'h2', effect: 'slide'});
});
		</script>

<script type="text/javascript">		
jQuery(function() {
	// setup ul.tabs to work as tabs for each div directly under div.panes
	jQuery("ul.tabs").tabs("div.panes > div", {tabs: 'h2', effect: 'fade'});

});	
</script>	

<script type="text/javascript" charset="utf-8">
		jQuery(document).ready(function(){
			jQuery("a[rel^='prettyPhoto']").prettyPhoto({theme: 'light_rounded'});
		});
	</script>
	
	<script type="text/javascript">
	jQuery(document).ready(function(){

jQuery(".pphoto a, .pphoto2 a").append("<span></span>");

// ON MOUSE OVER
jQuery(".pphoto img, .pphoto2 img, .box-thumb").hover(function () {

// SET OPACITY TO 100%
jQuery(this).stop().animate({
opacity: 0.5
}, "fast");
},
	 
// ON MOUSE OUT
function () {
	 
// SET OPACITY BACK TO 50%
jQuery(this).stop().animate({
opacity: 1.0
}, "slow");
});
});

</script>
<!--comment cufon-->
<!-- <script type="text/javascript">
			Cufon.replace('h1, h2, h3, h4, h5, h6, th, .title-box, .form label,#welcome-box h1, .read-more-slide a, form#commentform label', { fontFamily: 'TitilliumText22L Rg' });
</script> -->

<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie6.css" />
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/DD_belatedPNG_0.0.8a.js"></script>
<script type="text/javascript">

DD_belatedPNG.fix('.navbar, #logo img, #searchsubmit, #img-left img, #img-right img, .widget-container ul li, .timbg, .nivo-controlNav a');

</script>
<![endif]-->

	<?php $googleanalytics=get_option("tm_go_code"); ?>
	<?php echo stripslashes($googleanalytics); ?>
	
</head>

<body <?php body_class(); ?>>

	<!--wrapper-->
	<div id="wrapper">
	
	<div id="menu_container">
			
		<div id="menu_container_width">
			
	<?php $navcheck = '' ; ?>
	
	<?php if (function_exists( 'wp_nav_menu' )) {
		$navcheck = wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'menu_class' => 'dropdown dropdown-horizontal reset' ,'fallback_cb' => '', 'echo' => false ) );
	} ?>

	<?php  if ($navcheck == '') { ?>
	
	<ul class="dropdown dropdown-horizontal reset">
		<li class="current"><a href="<?php echo home_url(); ?>" title="Home">Home</a></li>
					
		<?php
				if (get_option('tm_menu_bar') <> ''){
					$menubar = implode(",", get_option('tm_menu_bar'));
					}
				if($menubar){
					wp_list_pages('title_li=&include='.$menubar);
				}
		?>
		
		<?php
				if (get_option('tm_cat_bar') <> ''){
					$catbar = implode(",", get_option('tm_cat_bar'));
					}
				if($catbar){
					wp_list_categories('title_li=&include='.$catbar);
				}
		?>

	</ul>

		

<?php } else echo($navcheck); ?> 
<div id = "top-language"><a href="<?php echo home_url(); ?>">English</a>　|　<a href="#">中文</a></div>
		</div>	
	

	<div class="clear"></div>
	</div><!-- end menu_container_width -->
</div><!-- end menu_container -->

<!--headercontainer-->
	<div id="header_container">
	
		<!--header-->
		<div id="header">

	
			
			<!--menu-->	


	<!--menu end-->
			<!--headercontainer-->
	<div id="header_container">
	
		<!--logo-->

<?php if ( ( get_option('tm_logo_01') ) != '' ) { ?>
		<div id="logo2"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('description'); ?>"><img src="<?php echo get_option('tm_logo_01'); ?>" alt="<?php echo get_option('tm_logo_02'); ?>" /></a></div><!--logo end-->
	<?php } else { ?>
			
	<?php } ?>	
			
			<!--menu-->
	<div id=header_full_name>
		TAIPEI CULTURAL CENTER<br>
		TAIPEI ECONOMIC AND CULTURAL OFFICE IN NEW YORK
	</div>

	<div class='tagline'>
	 <?php echo str_replace('-', '<br />', get_bloginfo('description')); ?>
	</div>
	

	<div class="clear"></div>		
			
		</div><!-- header end-->
		
	</div><!--header container end-->	
		