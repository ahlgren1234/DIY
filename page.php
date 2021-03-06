<?php /*
	The default template for displaying pages

	This is the template that displays all pages by default.
	Please note that this is the WordPress construct of pages and that
	other 'pages' on your WordPress site will use a different template.

	@package WordPress
	@subpackage DIY Theme
	@since DIY Theme 1.0

*/ ?>
<?php get_header(); ?>

<div class="row">
	<div class="col-md-9">

		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

		<div <?php post_class(); ?>>
			<h1>
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h1>

			<?php if (!post_password_required() && !is_attachment() && has_post_thumbnail()) the_post_thumbnail(); ?>

			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div>

		<?php endwhile; ?>
		<?php else : ?>
		<?php get_template_part('inc/not-found'); ?>
		<?php endif; ?>

	</div> <!-- .col-md-9 -->

	<div class="col-md-3">
		<?php get_sidebar(); ?>
	</div> <!-- .col-md-3 -->

</div> <!-- .row -->

<?php get_footer(); ?>
