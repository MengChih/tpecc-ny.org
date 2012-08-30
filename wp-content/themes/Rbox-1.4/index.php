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

		<!--content-->
		<div id="content_container">
			<div id="home-container">
			<div id="content">

				<?php get_sidebar(); ?>

				<div id="right-col">
			
			<?php get_template_part( 'loop', 'index' ); ?>

</div> <!--right-col end-->



	</div> 
</div><!--content end-->
</div><!--home-container end-->

</div>
<!--wrapper end-->

<?php get_footer(); ?>