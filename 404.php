<?php /*
	The template for displaying 404 pages

	@package WordPress
	@subpackage DIY Theme
	@since DIY Theme 1.0

*/ ?>
<?php get_header(); ?>

<div class="row">
  <div class="col-md-9">
    <?php get_template_part('inc/not-found'); ?>
  </div> <!-- .col-md-9 -->

  <div class="col-md-3">
    <?php get_sidebar(); ?>
  </div> <!-- .col-md-3 -->

<?php get_footer(); ?>
