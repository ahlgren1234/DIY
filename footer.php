<?php /*
	The template for displaying the footer
	
	@package WordPress
	@subpackage DIY Theme
	@since DIY Theme 1.0

*/ ?>

			<div class="box footer">
				
				<?php if (is_active_sidebar('footer')) : 
					dynamic_sidebar('footer'); 
				else : ?>
				
					<?php if (has_nav_menu('footer')) :
						wp_nav_menu(array(
							'theme_location' => 'footer', 
							'container' => false
						));
					endif; ?>
				
					<p>
						<?php _e('&copy;', 'diy-theme'); ?> <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a> 
						<?php _e('&bull;', 'diy-theme'); ?> <a href="<?php bloginfo('rss2_url'); ?>"><?php _e('RSS Feed', 'diy-theme'); ?></a>
					</p>
				
				<?php endif; ?>
				
			</div>
			
			<?php wp_footer(); ?>

		</div>
	</body>
</html>