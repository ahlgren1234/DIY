<?php /*
	The template for displaying archive pages

	Used to display archive-type pages if nothing more specific matches a query.
	For example, puts together date-based pages if no date.php file exists.
	
	@package WordPress
	@subpackage DIY Theme
	@since DIY Theme 1.0

*/ ?>
<?php get_header(); ?>

<div class="box content">
	
	<?php if (have_posts()) : ?>
	
	<div id="archive-view">
		<?php if (is_category()) : ?>
		<div class="archive-title">
			<?php _e('Posts categorized:', 'diy-theme'); ?> 
			<?php single_cat_title(); ?>
		</div>
			
		<?php elseif (is_tag()) : ?>
		<div class="archive-title">
			<?php _e('Posts tagged:', 'diy-theme'); ?> 
			<?php single_tag_title(); ?>
		</div>
			
		<?php elseif (is_author()) : ?>
		<div class="archive-title">
			<?php _e('Posts by:', 'diy-theme'); ?>  
			<?php 
				the_post(); // initialize posts
				echo get_the_author(); 
				rewind_posts(); // rewind posts
			?>
		</div>
			
		<?php elseif (is_day()) : ?>
		<div class="archive-title">
			<?php _e('Daily archives:', 'diy-theme'); ?> 
			<?php the_time('l, F j, Y'); ?>
		</div>
		
		<?php elseif (is_month()) : ?>
		<div class="archive-title">
			<?php _e('Monthly archives:', 'diy-theme'); ?> 
			<?php the_time('F Y'); ?>
		</div>
			
		<?php elseif (is_year()) : ?>
		<div class="archive-title">
			<?php _e('Yearly archives:', 'diy-theme'); ?> 
			<?php the_time('Y'); ?>
		</div>
		<?php endif; ?>
	</div>
	
	<?php while (have_posts()) : the_post(); ?>
	
	<div <?php post_class(); ?>>
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php the_excerpt(); ?>
	</div>
	
	<?php endwhile; ?>
	<?php else : ?>
	
	<?php get_template_part('inc/not-found'); ?>
	
	<?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>