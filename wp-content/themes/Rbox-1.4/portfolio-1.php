					<!--portfolio-->
	<?php
 	 $temp = $wp_query;
 	 $wp_query= null;
 	 $wp_query = new WP_Query('post_type=portfolios' . '&paged=' . $paged);
 	 $i = 1;
 	 while ($wp_query->have_posts()) : $wp_query->the_post();
	?>			
					<div class="two_third" style="margin-bottom:50px">
		
							<!--pretty photo--><div class="pphoto">
		<a href="<?php echo get_post_meta($post->ID, 'Thumbnail', true); ?>" <?php if(get_post_meta($post->ID, Thumbnail, true) != NULL){echo 'rel="prettyPhoto[gallery1]" ';}?>title="<?php the_title_attribute(); ?>"><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, 'Thumbnail', true); ?>&amp;h=300&amp;w=630&amp;zc=1" alt="<?php the_title(); ?>" /></a>
			</div><!--pp end--></div>
			
		<div class="one_third last portfolio1">	
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>	
			
		<div><?php global $more;
				// set $more to 0 in order to only get the first part of the post
					$more = 0;
					the_content(); ?>
					
					</div>
					
				

		<!--clear float--><div class="clear"></div>
				
				</div><!--row  end-->
				
				<?php $i++; ?>
			
			<!--portfolio end-->
				
<?php endwhile; ?>