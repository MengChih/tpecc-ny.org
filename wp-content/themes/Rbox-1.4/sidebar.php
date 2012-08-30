		<!--left-col-->
		<div id="left-col">
		
		<!-- <img src="<?php bloginfo('template_url'); ?>/images/sidebar-top.png" alt="" /> -->
			
				<!--sidebar-->
				<div id="sidebar">
			
			<ul class="xoxo">

<?php

	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>


		<?php endif; // end primary widget area ?>
			</ul>

<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>
			

<?php endif; ?>

				</div><!--sb end-->
				
				<div class="clear"></div>
				
<!-- <img src="<?php bloginfo('template_url'); ?>/images/sidebar-bottom.png" alt="" /> -->
				
			</div> <!--left-col-->