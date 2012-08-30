<?php /* Template Name: Portfolio
*/ ?> 

<?php get_header(); ?>

		<div id="subhead_container">

			<div id="subhead">
		
		<h1><?php if ( is_category() ) {
		single_cat_title();
	} elseif (is_archive() ) {
		echo 'Archives for '; single_month_title();
	} else {
		wp_title('',true);
	} ?></h1>
			
			</div>
			
		</div>
			

	<div id="content_container">
	
	<div id="post-entry-fullwidth">
	
	<?php $tm_port_style = get_option('tm_port_style');

if(empty($tm_port_style))
{
	$tm_port_style = '1';
}

include (TEMPLATEPATH . "/portfolio-".$tm_port_style.".php"); ?>
	

<div class="clear"></div>
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } $wp_query = null; $wp_query = $temp; ?>

				
</div>
</div>
<!--full width end-->
		
</div>
<!--wrapper end-->

<?php get_footer(); ?>