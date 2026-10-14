<?php
/**
 * Zinvos V2 Theme Functions and Definitions
 *
 * @package Zinvos_V2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Setup theme defaults and register support for WordPress features.
 */
function zinvos_v2_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Enable HTML5 markup support
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	// Add theme support for custom logo
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	// Register Navigation Menus
	register_nav_menus( array(
		'primary_1'  => __( 'Primary Navigation', 'zinvos-v2' ),
		'top_nav'    => __( 'Top Navigation', 'zinvos-v2' ),
		'footer_nav' => __( 'Footer Navigation', 'zinvos-v2' ),
	) );
}
add_action( 'after_setup_theme', 'zinvos_v2_setup' );

/**
 * Enqueue scripts and styles.
 */
function zinvos_v2_scripts() {
	// Google Fonts
	wp_enqueue_style( 'zinvos-v2-google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300..900;1,300..900&display=swap', array(), null );

	// FontAwesome icons
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1' );

	// Core stylesheet
	wp_enqueue_style( 'zinvos-v2-style', get_stylesheet_uri(), array(), '2.0.0' );

	// Theme script
	wp_enqueue_script( 'zinvos-v2-script', get_template_directory_uri() . '/js/script.js', array(), '2.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'zinvos_v2_scripts' );

/**
 * Register Sidebars / Widget Areas.
 */
function zinvos_v2_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'zinvos-v2' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'zinvos-v2' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'zinvos_v2_widgets_init' );

/**
 * Register Custom Post Types (Client, Feature, Video, Event, Case Study).
 */
function zinvos_v2_register_cpts() {
	// Client CPT
	register_post_type( 'client', array(
		'labels' => array(
			'name'          => __( 'Clients', 'zinvos-v2' ),
			'singular_name' => __( 'Client', 'zinvos-v2' )
		),
		'public'       => true,
		'has_archive'  => true,
		'show_in_rest' => true,
		'supports'     => array( 'title', 'thumbnail' ),
		'menu_icon'    => 'dashicons-businessperson'
	) );

	// Feature CPT
	register_post_type( 'feature', array(
		'labels' => array(
			'name'          => __( 'Features', 'zinvos-v2' ),
			'singular_name' => __( 'Feature', 'zinvos-v2' ),
		),
		'public'       => true,
		'has_archive'  => true,
		'show_in_rest' => true,
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'menu_icon'    => 'dashicons-star-filled',
		'rewrite'      => array( 'slug' => 'feature' ),
	) );

	// Video CPT
	register_post_type( 'video', array(
		'labels' => array(
			'name'          => __( 'Videos', 'zinvos-v2' ),
			'singular_name' => __( 'Video', 'zinvos-v2' ),
		),
		'public'       => true,
		'has_archive'  => true,
		'show_in_rest' => true,
		'supports'     => array( 'title', 'thumbnail' ),
		'menu_icon'    => 'dashicons-video-alt3',
	) );

	// Event CPT
	register_post_type( 'event', array(
		'labels' => array(
			'name'          => __( 'Events', 'zinvos-v2' ),
			'singular_name' => __( 'Event', 'zinvos-v2' ),
		),
		'public'       => true,
		'has_archive'  => 'events',
		'show_in_rest' => true,
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'menu_icon'    => 'dashicons-calendar',
		'rewrite'      => array( 'slug' => 'event' ),
	) );


	// Case Study CPT
	register_post_type( 'case_study', array(
		'labels' => array(
			'name'          => __( 'Case Studies', 'zinvos-v2' ),
			'singular_name' => __( 'Case Study', 'zinvos-v2' ),
		),
		'public'       => true,
		'has_archive'  => true,
		'show_in_rest' => true,
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'menu_icon'    => 'dashicons-portfolio',
		'rewrite'      => array( 'slug' => 'case-study' ),
	) );
}
add_action( 'init', 'zinvos_v2_register_cpts' );

/**
 * Register REST API fields for Client featured image.
 */
add_action( 'rest_api_init', function () {
	register_rest_field( 'client', 'featured_image_url', array(
		'get_callback' => function ( $object ) {
			$feat_id = $object['featured_media'];
			if ( $feat_id ) {
				$img = wp_get_attachment_image_src( $feat_id, 'full' );
				return $img ? $img[0] : null;
			}
			return null;
		},
		'schema' => null,
	) );
} );

/**
 * Calculate post reading time.
 */
function reading_time( $post_id ) {
	$content    = get_post_field( 'post_content', $post_id );
	$word_count = str_word_count( strip_tags( $content ) );
	$minutes    = ceil( $word_count / 200 );
	return ( $minutes > 0 ? $minutes : 1 ) . ' min read';
}

/**
 * Custom Excerpt Length filter.
 */
function zinvos_v2_custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'zinvos_v2_custom_excerpt_length', 999 );

/**
 * Redirect /event archive URL to /events
 */
function zinvos_redirect_event_to_events() {
	if ( is_admin() ) {
		return;
	}

	$request_uri = $_SERVER['REQUEST_URI'] ?? '';
	// Redirect /event or /event/ (archive) to /events, preserving query args if present
	if ( preg_match( '#/event/?(\?.*)?$#i', $request_uri ) ) {
		wp_redirect( home_url( '/events' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'zinvos_redirect_event_to_events' );

