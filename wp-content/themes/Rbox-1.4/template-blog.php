<?php /* Template Name: Blog
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

		<!--content-->
		<div id="content_container">
			<div id="home-container">
			<div id="content">


				<?php get_sidebar(); ?>
		
				<div id="right-col">
				
			
<?php

global $more; $more = false; # some wordpress wtf logic

  $query_args = array(
     'post_type' => 'post', 
     'paged' => $paged
      );

$query_args = apply_filters( 'tm_blog_template_query_args', $query_args ); 

query_posts($query_args);

if (have_posts()) : while (have_posts()) : the_post();

	$thumb_small = '';
								
	if(has_post_thumbnail(get_the_ID(), 'large'))
	{
	    $image_id = get_post_thumbnail_id(get_the_ID());
	    $thumb_small = wp_get_attachment_image_src($image_id, 'large', true);

	}
?>

	

	<?php $thumb_small='';
	$thumb_small= get_post_meta($post->ID, 'Thumbnail', true);?>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="left">
		<a href="<?php the_permalink(); ?>#more-<?php the_ID(); ?>"><!--Link to pages-->
	
	
		<?php if($thumb_small<>'') { ?>
						
		<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, 'Thumbnail', true); ?>&h=138&w=245&zc=1" alt="" />
						
		<?php } ?>
		</a><!--end Link to pages-->
	</div><!--left end-->

	<div class="right">
	<div class="post-head">
	
			<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'Rbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			
			</div><!--post-heading end-->
			
			<div class="meta-data">
			
			<?php Rbox_posted_on(); ?>
			<!-- <div class="category_icon"><?php //the_category(', '); ?></div> -->
			<!-- <div class="comment_icon"><?php //comments_popup_link( __( 'Leave a comment', 'Rbox' ), __( '1 Comment', 'Rbox' ), __( '% Comments', 'Rbox' ) ); ?></div> -->
			
			</div><!--meta data end-->
			<div class="clear"></div>

<div class="post-entry <?php if ($thumb_small <> '') {echo "timbg";} ?>">
	
				
			<?php the_excerpt( __( '', 'Rbox' ) ); ?>
			<!-- <?php //the_content( __( '', 'Rbox' ) ); ?> -->
			<div class="clear"></div>

			<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'Rbox' ), 'after' => '' ) ); ?>
	
	<!--clear float--><div class="clear"></div>
				
				<span class="read-more"><a href="<?php the_permalink() ?>#more-<?php the_ID(); ?>"><?php _e('Read More' , 'Rbox'); ?></a></span>
				
				
				</div><!--post-entry end-->


		<?php comments_template( '', true ); ?>

	</div> <!--post end-->


</div> <!--right end-->

<?php endwhile; endif; ?>


<!--pagination-->
<?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); } 
		else { ?>
	<div class="navigation">
		<div class="alignleft"><?php next_posts_link( __( '&larr; Older posts', 'Enterprise' ) ); ?></div>
		<div class="alignright"><?php previous_posts_link( __( 'Newer posts &rarr;', 'Enterprise' ) ); ?></div>
	</div><?php } ?>



</div> <!--right-col end-->



	</div>
</div><!--content end-->
</div><!--home-container end-->	
</div>
<!--wrapper end-->

<?php get_footer(); ?>