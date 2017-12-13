<?php /*
	DIY Theme functions and definitions

	Set up the theme and provides some helper functions, which are used in the
	theme as custom template tags. Others are attached to action and filter
	hooks in WordPress to change core functionality.

	When using a child theme you can override certain functions (those wrapped
	in a function_exists() call) by defining them first in your child theme's
	functions.php file. The child theme's functions.php file is included before
	the parent theme's file, so the child theme functions would be used.

	@link http://codex.wordpress.org/Theme_Development
	@link http://codex.wordpress.org/Child_Themes
	@link http://codex.wordpress.org/Plugin_API

	@package WordPress
	@subpackage DIY Theme
	@since DIY Theme 1.0

*/



// enable theme support
function diy_setup() {

	// enable title tag
	add_theme_support('title-tag');

	// enable featured images
	add_theme_support('post-thumbnails');

	// enable custom headers
	add_theme_support('custom-header');

	// enable custom backgrounds
	add_theme_support('custom-background');

	// enable three nav menus
	register_nav_menus(array(
		'header'  => __('Header Menu', 'diy-theme'),
		'sidebar' => __('Sidebar Menu', 'diy-theme'),
		'footer'  => __('Footer Menu', 'diy-theme'),
	));

	// automatic feed links
	add_theme_support('automatic-feed-links');
}
add_action('after_setup_theme', 'diy_setup');



// enable widgets
function diy_widgets_init() {
	register_sidebar(array(
		'name'          => __('Header Widgets', 'diy-theme'),
		'id'            => 'header',
		'description'   => __('Header Area', 'diy-theme'),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
	));
	register_sidebar(array(
		'name'          => __('Sidebar Widgets', 'diy-theme'),
		'id'            => 'sidebar',
		'description'   => __('Sidebar Area', 'diy-theme'),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
	));
	register_sidebar(array(
		'name'          => __('Footer Widgets', 'diy-theme'),
		'id'            => 'footer',
		'description'   => __('Footer Area', 'diy-theme'),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
	));
}
add_action('widgets_init', 'diy_widgets_init');



// enable styles for visual editor
function diy_add_editor_style() {
	add_editor_style('style-editor.css');
}
add_action('after_setup_theme', 'diy_add_editor_style');



// enqueue script and style
function diy_scripts_styles() {

	// Load the jQuery file from CDN.
	wp_enqueue_script('jquery_js', 'https://code.jquery.com/jquery-3.2.1.slim.min.js');
	// Load the Popper JS File from CDN.
	wp_enqueue_script('popper_js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js');
	// Load the Bootstrap JS File from CDN.
	wp_enqueue_script('bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js');
	// load custom scripts
	wp_enqueue_script('custom', get_template_directory_uri() .'/js/custom.js', array('jquery'), null, false);

	// conditionally load script for threaded comments
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	// Load the Bootstrap 4 CSS File from CDN.
	wp_enqueue_style('bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css');
	// load style.css
	wp_enqueue_style('diy-theme', get_stylesheet_uri(), array(), null);
}
add_action('wp_enqueue_scripts', 'diy_scripts_styles');
