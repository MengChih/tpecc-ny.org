<div id="home-container">

	<!--slideshow-->
	<?php $slider_url = ''; ?>
	
	<div id="slideshow">

		<?php query_posts( array ('post_type' => 'slides', 'showposts' => 20  ) ); ?>

			<?php while (have_posts()) : the_post(); ?>
				<?php $slider_url= get_post_meta(get_the_ID(), 'slide_url', true); ?>
			<div>
			 <img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, 'Thumbnail', true); ?>&h=350&w=963&zc=1" alt="<?php the_title(); ?>" />
			 <?php global $more;
				// set $more to 0 in order to only get the first part of the post
					$more = 0; ?>
			 <span class="information"><span class="info-title"><?php small_title(33); ?></span><p><?php the_excerpt(); ?></p>
			 <?php if($slider_url<>'') { ?><a href="<?php echo get_post_meta(get_the_ID(), 'slide_url', true); ?>"><span class="read-more-slide"><?php _e( 'Learn More', 'Rbox' ); ?></span></a><?php } ?>
			 </span>
			
			</div>
			
		<?php endwhile; wp_reset_query(); ?>
		
		</div> <!--slideshow end-->

  </div><!--home container end-->