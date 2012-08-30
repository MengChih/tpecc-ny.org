<?php get_header(); ?>
</div>

<div id="content_container">



	<?php $tm_slide_style = get_option('tm_slide_style');

if(empty($tm_slide_style))
{
	$tm_slide_style = 'slider';
}?>
<?php $slideshow = 'template-' . $tm_slide_style . '.php';
include ($slideshow); ?>


<div class="clear"></div>


<div id="home-boxes"><!--home icon boxes-->
			
				<?php $i = 1; ?>
				
		<?php query_posts( array ('post_type' => 'home_boxes', 'showposts' => 3  ) ); 

		while ( have_posts() ) : the_post(); ?>
		
			<?php $last_class = '';
				if(($i) % 3 == 0)
					{	
					$last_class = ' last';
						}
				?>
					
					<!--boxes --><div class="one_third<?php echo $last_class; ?>" style="margin-bottom:40px">
		
				<?php $icon_small='';
	$icon_small= get_post_meta($post->ID, 'Icon', true);?>
	
				<!--box icon--><div class="box-icon">
						
						<?php if($icon_small<>'') { ?>
						
						<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, 'Icon', true); ?>&h=32&w=32&zc=1" alt="" />
						
						<?php } ?>
					
					</div> <!--box-icon close-->
					
		<div class="iconbox-content">			
	
	<h3><?php small_title(33); ?></h3><p><?php the_content(); ?></p>
	
		</div> <!--box-content close-->
				
				</div><!--boxes  end-->
				
				<?php $i++; ?>
				
		<?php endwhile; wp_reset_query(); ?>
			
			</div><!--home boxes end-->
			
		<div class="clear"></div>
				
		<!--boxes-->
		<div id="box_container">

		<div class="box_Latest">LATEST NEWS／EVENTS
		
		</div>
				
		<?php
                $num_posts = 0;
                $show_posts = 7;
		$args = array(
                  'numberposts' => $show_posts 
                );
                $posts = get_posts($args);
		foreach ($posts as $post) { 
                  $num_posts++;
                  setup_postdata($post);
		?>
		
	<?php $thumb_small='';
	      $thumb_small= get_post_meta($post->ID, 'Thumbnail', true);?>
		
				<div class="boxes box<?php echo $num_posts?>">
						<div class="box-head">
						<a href="<?php the_permalink(); ?>#more-<?php the_ID(); ?>"><!--Link to pages-->

						<?php if($thumb_small<>'') { ?>
						
						<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, 'Thumbnail', true); ?>&h=126&w=225&zc=1" alt="" />
						
						<?php } ?>
					</a><!--end Link to pages-->
					</div> <!--box-head close; image_thumbnail-->

				<div class="postmeta">
					<?php Rbox_posted_on(); ?>
					
				</div><!--post date-->
	
				<div class="title-box">						
				<a href="<?php the_permalink(); ?>#more-<?php $post->ID; ?>"><!--Link to pages-->		
				<div class="title-head"><?php the_title(); ?></div>
				</a><!--end Link to pages-->
				
				
				</div>
					
					<div class="box-content">

					<?php global $more;
				        // set $more to 0 in order to only get the first part of the post
					$more = 0;
					the_excerpt(); ?>
					
					
					</div> <!--box-content close-->

				
				<span class="read-more">
				<a href="<?php the_permalink(); ?>#more-<?php $post->ID; ?>"><!--Link to pages-->
					<?php _e('Read More' , 'Rbox'); ?>
				</a><!--end Link to pages-->
				</span>
				
				
				</div><!--boxes  end-->
		<?php } ?>

		<div id="index_social">
		<table width="225" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="42" height="35" align="left" valign="middle">
	<img src="wp-content/themes/images/s_youtube.gif" width="37" height="30" alt="Youtube">
	</td>
    <td width="183" height="35" align="left" valign="middle">
	<a href="#" target="_blank">Join us on Youtube</a>
	</td>
  </tr>
  <tr>
    <td width="42" height="35" align="left" valign="middle">
	<img src="wp-content/themes/images/s_mailinglist.gif" width="37" height="30" alt="Mailing List">
	</td>
    <td width="183" height="35" colspan="2"align="left" valign="middle">
	<a href="#">Join the TPECC Mailing List</a>
	</td>
  </tr>
  <tr>
    <td width="225" height="35" colspan="2" align="left" valign="middle">
	
	<input name="textfield"  type="text" value="Enter your email here"" size="25" onclick="value='';focus()" onfocus="this.style.backgroundColor='#f8fff8' maxlength="50"/> 
	</td>

  </tr>
  <tr>
    <td width="225" height="35" colspan="2" align="left" valign="middle">
    <input name="" type="Submit" />
	</td>
  </tr>
</table>
		

		
		
		
		</div><!--index_social end-->

		</div><!--box-container end-->
			
			<div class="clear"></div>
		
	<!--welcome-->
	<div id="welcome_container">

		<div id="welcome-box">
		
	<h1><!-- <?php //if(get_option('tm_head_01') != NULL){ echo get_option('tm_head_01');} else echo "write your headline here" ?> -->
	</h1>
		
	</div>

</div><!--welcome end-->
</div><!--end content_container-->
<div class="clear"></div>
		

<!--wrapper end-->

<?php get_footer(); ?>