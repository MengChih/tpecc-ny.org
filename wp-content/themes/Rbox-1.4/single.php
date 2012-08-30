<?php get_header(); ?>
	
		<!--sub head container--><div id="subhead_container">

			<div id="subhead">
		
<h1><?php the_title(); ?></h1>
			
			</div>
			
		</div>
		

	<!--content-->
<div id="content_container">
	<div id="home-container">
	<div id="content">
		
		<?php get_sidebar(); ?>

		<div id="right-col">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
			
			<?php $thumb_small='';
	$thumb_small= get_post_meta($post->ID, 'Thumbnail', true);?>

			<div class="post-entry <?php if ($thumb_small <> '') {echo "timbg";} ?>">

	<?php if($thumb_small<>'') { ?>
		
		<img class="alignleft" src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, 'Thumbnail', true); ?>&h=400&w=715&zc=1" alt="" />
		
		<?php } ?>


			<div class="meta-data">
			
			<!- <?php //Rbox_posted_on(); ?> -->
			<!-- <div class="category_icon"><?php //the_category(', '); ?></div> -->
			<!-- <div class="comment_icon"><?php //comments_popup_link( __( 'Leave a comment', 'Rbox' ), __( '1 Comment', 'Rbox' ), __( '% Comments', 'Rbox' ) ); ?></div> -->
			
			</div><!--meta data end-->
			<div class="clear"></div>
			<h2><?php the_title(); ?></h2>

						<?php the_content( __( '', 'Rbox' ) ); ?>
						<div class="clear"></div>
			<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'Rbox' ), 'after' => '' ) ); ?>
						
						<?php the_tags('Social tagging: ',' > '); ?>
						
					</div><!--post-entry end-->
	

				<!-- <?php //comments_template( '', true ); ?> -->

<?php endwhile; ?>

</div> <!--right-col end-->




	</div> 
</div><!--content end-->
	
</div><!--home-container end-->
</div>
<!--wrapper end-->

<?php get_footer(); ?>