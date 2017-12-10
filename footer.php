			<div class="box footer">
				
				<?php if( is_active_sidebar( 'footer' ) ) : ?>
					<?php dynamic_sidebar( 'footer' ); ?>
				<?php else : ?>

					<?php if( has_nav_menu( 'footer' ) ) : ?>
						<?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false ) ); ?>
					<?php endif; ?>

					<p><?php _e( '&copy;', 'diy' ); ?> <?php echo do_shortcode( '[y]' ); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a> <?php _e( '&bull;', 'diy' ); ?> <a href="<?php bloginfo( 'rss2_url' ); ?>"><?php _e( 'RSS Feed', 'diy' ); ?></a></p>

				<?php endif; ?>

			</div>

			<?php wp_footer(); ?>

		</div>
	</body>
</html>
