<?php /* Template Name: Full Width
*/ ?> 

<?php get_header(); ?>

		<div id="subhead_container">
		
			<!--<div id="subhead">
		
		<h1><?php //the_title(); ?></h1>
			
			</div>-->
			
		</div>

	<div id="content_container">
	
	<div id="post-entry-fullwidth">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
				
				<?php the_content(); ?>
				<div class="clear"></div>
				<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'Rbox' ), 'after' => '' ) ); ?>
			
			
<?php endwhile; ?>

	</div> 
</div>
<!--full width end-->

		
</div>
<!--wrapper end-->

<?php get_footer(); ?>