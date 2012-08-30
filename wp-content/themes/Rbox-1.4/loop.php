<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
		<h1><?php _e( 'Not Found', 'Rbox' ); ?></h1>
		<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'Rbox' ); ?></p>
		<?php get_search_form(); ?>

<?php endif; ?>

<!--loop starts here-->

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<?php $thumb_small='';
	$thumb_small= get_post_meta($post->ID, 'Thumbnail', true);?>


<div id="post-<?php the_ID(); ?>" class="post<?php the_category_unlinked(' '); ?>"><!--modify to use slug-->
	<div class="left">
		<a href="<?php the_permalink(); ?>#more-<?php the_ID(); ?>"><!--Link to pages-->
	
	
		<?php if($thumb_small<>'') { ?>
						
		<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, 'Thumbnail', true); ?>&h=138&w=225&zc=1" alt="" />
						
		<?php } ?>
		</a><!--end Link to pages-->
	</div><!--left end-->

	<div class="right">
	<div class="post-head">
	
			<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'Rbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			
			</div><!--post-heading end-->
			
			<div class="meta-data">
			
			<!-- <?php //Rbox_posted_on(); ?> -->
			<!-- <div class="category_icon"><?php //the_category(', '); ?></div> -->
			<!-- <div class="comment_icon"><?php //comments_popup_link( __( 'Leave a comment', 'Rbox' ), __( '1 Comment', 'Rbox' ), __( '% Comments', 'Rbox' ) ); ?></div> -->
			
			</div><!--meta data end-->
			<div class="clear"></div>

<div class="post-entry <?php if ($thumb_small <> '') {echo "timbg";} ?>">
			
			<?php the_excerpt( __( '', 'Rbox' ) ); ?>
			<!-- <?php the_content( __( '', 'Rbox' ) ); ?> -->
			<div class="clear"></div>
			<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'Rbox' ), 'after' => '' ) ); ?>
	
	<!--clear float--><div class="clear"></div>
				
				<span class="read-more"><a href="<?php the_permalink() ?>#more-<?php the_ID(); ?>"><?php _e('Read More' , 'Rbox'); ?></a></span>
				
				
				</div><!--post-entry end-->


		<?php comments_template( '', true ); ?>

</div> <!--post end-->
</div> <!--right end-->

<?php endwhile; // End the loop. Whew. ?>

<div class="clear"></div>

<!--pagination-->
<?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); } 
		else { ?>
	<div class="navigation">
		<div class="alignleft"><?php next_posts_link( __( '&larr; Older posts', 'Rbox' ) ); ?></div>
		<div class="alignright"><?php previous_posts_link( __( 'Newer posts &rarr;', 'Rbox' ) ); ?></div>
	</div><?php } ?>