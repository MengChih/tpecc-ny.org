	<!--footer-->
	<div class="clear"></div>
		
		<div id="footer">
		
	<!--footer container--><div id="footer-container">
		
		 
		
			<div id = "footer_logo">

<a href="<?php echo home_url(); ?>" title="<?php bloginfo('description'); ?>"><img src="http://tpecc-ny.org/wp-content/themes/images/footer_logo.jpg"  alt="footer_logo" width="452" height="55" /></a></div>
				
			<div id = "language"><a href="<?php echo home_url(); ?>">English</a>　|　<a href="#">中文</a></div>
		</div>	
			<div class="clear"></div>


		

		<div class="foot_contact">
			<div class="left"><p>1 East 42nd Street, Floor 7th<br>
					New York, NY 10017<br>
					USA</p>
			</div>
			<div class="right"><p>Ph: +1-212-697-6188<br>Fax: +1-212-697-63-3<br>
					<a href="mailto:tpecc@tpecc.org" target="_blank">Email: tpecc@tpecc.org</a></p>
			</div>



		<div class="links">
		Copyright ©<?php //_e( 'Copyright', 'TPECC' ); ?> <?php echo get_the_date( 'Y' ); ?> <?php echo get_option('tm_footer_text') ?> | All rights reserved.<br>

		Mon-Fri 9:30am-5:30pm. And by appointment.
		</div>

		<div id="footer-widget"> 
			
			<?php
			/* A sidebar in the footer? Yep. You can can customize
			 * your footer with four columns of widgets.
			 */
			get_sidebar( 'footer' );
			?>
			
			</div><!--footer widget end--> 
				
		<div> 	
					


		
		<div class="clear"></div>			
		</div><!-- footer_contact-->	
			
		</div><!-- footer container-->
		
	<div class="clear"></div>		
			
	</div>
	
	<?php wp_footer(); ?>

</body>

</html>