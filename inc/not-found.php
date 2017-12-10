<?php /*
	The template for displaying a "not found" message
	
	@package WordPress
	@subpackage DIY Theme
	@since DIY Theme 1.0

*/ ?>
<div class="post-not-found">
	<h1><?php _e('Not Found', 'diy-theme'); ?></h1>
	<p><?php _e('The requested resource was not found.', 'diy-theme'); ?></p>
	<p><?php _e('Please try again or contact the site admin for help.', 'diy-theme'); ?></p>
	<p><?php get_search_form(); ?></p>
</div>