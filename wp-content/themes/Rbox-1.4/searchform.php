<!--search form-->
				
				    <form method="get" id="search" action="<?php echo home_url(); ?>">

					<div>
					<?php $req=''; ?>
               		<input type="text" value="<?php esc_attr_e( 'search this site', 'Rbox' ); ?>" name="s" id="s"  onfocus="if(this.value=='<?php esc_attr_e( 'search this site', 'Rbox' ); ?>'){this.value=''};" onblur="if(this.value==''){this.value='<?php esc_attr_e( 'search this site', 'Rbox' ); ?>'};" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
               		<input type="submit" id="searchsubmit" value="" />
                	
					</div>
               		</form>