<?php get_header(); ?>
		
		<div id="subhead_container">
		
			<!--<div id="subhead">
		
		<h1><?php //the_title(); ?></h1>
			
			</div>-->
			
		</div>

		<!--content-->
		<div id="content_container">
			<div id="home-container">
			<div id="content">
				<?php get_sidebar(); ?>
					


				<div id="right-col">


			

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					
					<div class="post-entry">

					<?php the_content(); ?>
					<div class="clear"></div>
			<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'Rbox' ), 'after' => '' ) ); ?>
						
					</div><!--post-entry end-->


<?php endwhile; ?>
</div> <!--right-col end-->


</div><!--content end-->
</div><!--home-container end-->	
</div>
<!--wrapper end-->
<?php get_footer(); ?>