<div id="breadcrumbs">

	<!--category-->
	  <?php if (is_category()) { ?>
  	<a href="<?php bloginfo('siteurl'); ?>" title="home"><span>home</span></a> &raquo; 
    <?php single_cat_title(); ?>
  <?php } ?>
  
  <!--page-->
    <?php if (is_page()) { ?>
  	<a href="<?php bloginfo('siteurl'); ?>" title="home"><span>home</span></a> &raquo;
    <?php echo (get_the_title()); ?>
  <?php } ?>
  
  <!--single-->
  
    <?php if (is_single()) { ?>
  	<a href="<?php bloginfo('siteurl'); ?>" title="home"><span>home</span></a> &raquo;
    <?php the_category(', ') ?>
  <?php } ?>
  
  <!--search page-->
    <?php if (is_search()) { ?>
  	<a href="<?php bloginfo('siteurl'); ?>" title="home"><span>home</span></a> &raquo; <?php the_search_query() ?>
  <?php } ?>
  
  <!--tag-->
    <?php if (is_tag() ) { ?>
  	<a href="<?php bloginfo('siteurl'); ?>" title="home"><span>home</span></a> &raquo;
    <?php single_tag_title(); echo('&quot;');?>
  <?php } ?>  

<!--archives-->

  <?php if (is_year()) { ?>
 	<a href="<?php bloginfo('siteurl'); ?>" title="home"><span>home</span></a> &raquo;
    <?php the_time('Y'); ?>
  <?php } ?>

  <?php if (is_month()) { ?>
  	<a href="<?php bloginfo('siteurl'); ?>" title="home"><span>home</span></a> &raquo; 
    <?php the_time('F, Y'); ?>
  <?php } ?>

  <?php if (is_day()) { ?>
	<a href="<?php bloginfo('siteurl'); ?>" title="home"><span>home</span></a> &raquo;
    <?php the_time('F jS, Y'); ?>
  <?php } ?>
  
  <!--author-->
  
    <?php if (is_author()) { ?>
  	<a href="<?php bloginfo('siteurl'); ?>" title="home"><span>home</span></a> &raquo;
    <?php
if(isset($_GET['author_name'])) :
$curauth = get_userdatabylogin($author_name);
else :
$curauth = get_userdata(intval($author));
endif;
?>
    <?php echo $curauth->display_name; ?>
  <?php } ?>
  
	
</div> <!-- end #breadcrumbs -->