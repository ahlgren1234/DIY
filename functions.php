<?php
if( !isset( $content_width ) ) $content_width = 960;

function diy_setup() {
	// Enable featured images
	add_theme_support( 'post-thumbnails' );

	// Enable custom headers
	add_theme_support( 'custom-header' );

	// Enable custom backgrounds
	add_theme_support( 'custom-background' );

	// Enable three nav menus.
	register_nav_menus( array(
		'header'	=> __( 'Header Menu', 'diy' ),
		'sidebar'	=> __( 'Sidebar Menu', 'diy' ),
		'footer'	=> __( 'Footer Menu', 'diy' ),
	) );

	// Automatic feed links
	add_theme_support( 'automatic-feed-links' );

	// Enable internationalization.
	load_theme_textdomain( 'diy', get_template_directory() . '/languages' );
} 
add_action( 'after_setup_theme', 'diy_setup' );

// Register sidebars for widgets.
function diy_widgets_init() {
	register_sidebar( array(
		'name'			=> __( 'Header Widgets', 'diy' ),
		'id'			=> 'header',
		'description'	=> __( 'Header Area', 'diy' ),
		'before_widget'	=> '<div class="widget %2$s">',
		'after_widget'	=> '</div>',
	) );
	register_sidebar( array(
		'name'			=> __( 'Sidebar Widgets', 'diy' ),
		'id'			=> 'sidebar',
		'description'	=> __( 'Sidebar Area', 'diy' ),
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'	=> '</div>',
	) );
	register_sidebar( array(
		'name'			=> __( 'Footer Widgets', 'diy' ),
		'id'			=> 'footer',
		'description'	=> __( 'Footer Area', 'diy' ),
		'before_widget'	=> '<div class="widget %2$s">',
		'after_widget'	=> '</div>',
	) );
}
add_action( 'widgets_init', 'diy_widgets_init' );

// Enable styles for visual editor
function diy_add_editor_style() {
	add_editor_style( 'style-editor.css' );
}
add_action( 'after_setup_theme', 'diy_add_editor_style' );

function diy_scripts_styles() {
	// Load custom scripts
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), null, false );

	// Conditionally load script for threaded comments
	if( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// Load style.css
	wp_enqueue_style( 'diy', get_stylesheet_uri(), array() );
}
add_action( 'wp_enqueue_scripts', 'diy_scripts_styles' );

function diy_year() {
	return date( 'Y' ); 
}
add_shortcode( 'y', 'diy_year' );
