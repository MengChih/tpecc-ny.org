	
	<div id="home-container">

	<!--slideshow-->
	<?php $slider_url = ''; ?>
	
	<div id="slider-wrapper">
	
	   <div id="slider" class="nivoSlider">
	   
		<?php query_posts( array ('post_type' => 'slides', 'showposts' => 20  ) ); ?>
		
			<?php while (have_posts()) : the_post(); ?>
			<?php $slider_url= get_post_meta(get_the_ID(), 'slide_url', true); ?>
			
		<?php if($slider_url<>'') { ?><a href="<?php echo get_post_meta(get_the_ID(), 'slide_url', true); ?>"><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, 'Thumbnail', true); ?>&h=350&w=963&zc=1" alt="<?php the_title(); ?>" /></a>
		<?php } else {?>
		<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, 'Thumbnail', true); ?>&h=350&w=963&zc=1" alt="<?php the_title(); ?>" /><?php } ?>
		<?php endwhile; wp_reset_query(); ?>
		
		</div><!--slide end-->
  		
		</div> <!--slideshow end-->

  </div><!--home container end-->