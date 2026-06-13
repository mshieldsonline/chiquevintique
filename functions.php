<?php
defined( 'ABSPATH' ) || exit;

define( 'CV_VERSION', '2.2.3' );
define( 'CV_DIR', get_template_directory() );
define( 'CV_URI', get_template_directory_uri() );

/* =====================================================
   THEME SETUP
   ===================================================== */
function cv_setup() {
	load_theme_textdomain( 'chique-vintique', CV_DIR . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );

	// WooCommerce
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// Custom logo
	add_theme_support( 'custom-logo', [
		'height'      => 80,
		'width'       => 200,
		'flex-width'  => true,
		'flex-height' => true,
	] );

	// Image sizes
	add_image_size( 'cv-card',   600, 450, true );
	add_image_size( 'cv-hero',  1600, 700, true );
	add_image_size( 'cv-blog',   800, 450, true );

	// Menus
	register_nav_menus( [
		'primary' => __( 'Primary Navigation', 'chique-vintique' ),
		'footer'  => __( 'Footer Navigation', 'chique-vintique' ),
	] );
}
add_action( 'after_setup_theme', 'cv_setup' );

/* =====================================================
   CONTENT WIDTH
   ===================================================== */
function cv_content_width() {
	$GLOBALS['content_width'] = 1200;
}
add_action( 'after_setup_theme', 'cv_content_width', 0 );

/* =====================================================
   ENQUEUE SCRIPTS & STYLES
   ===================================================== */
function cv_inline_logo_css() {
	$css = '
		.cv-logo { height: 120px !important; width: auto; transition: height 0.35s ease; }
		.home .cv-logo { height: 195px !important; }
		.site-header.scrolled .cv-logo { height: 80px !important; }
	';
	wp_add_inline_style( 'cv-style', $css );
}
add_action( 'wp_enqueue_scripts', 'cv_inline_logo_css', 20 );

function cv_enqueue() {
	// Google Fonts
	wp_enqueue_style(
		'cv-fonts',
		'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Lato:wght@400;600;700&display=swap',
		[],
		null
	);

	// Main stylesheet
	wp_enqueue_style( 'cv-style', get_stylesheet_uri(), [ 'cv-fonts' ], CV_VERSION );

	// Main JS
	wp_enqueue_script( 'cv-main', CV_URI . '/assets/js/main.js', [], CV_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cv_enqueue' );

/* =====================================================
   EDITOR STYLES
   ===================================================== */
function cv_editor_styles() {
	add_editor_style( [
		'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Lato:wght@400;600;700&display=swap',
		'style.css',
		'assets/css/editor.css',
	] );
}
add_action( 'after_setup_theme', 'cv_editor_styles' );

/* =====================================================
   WIDGETS
   ===================================================== */
function cv_widgets_init() {
	$defaults = [
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	];

	register_sidebar( array_merge( $defaults, [
		'name' => __( 'Sidebar', 'chique-vintique' ),
		'id'   => 'sidebar-1',
	] ) );

	register_sidebar( array_merge( $defaults, [
		'name' => __( 'Footer Column 1', 'chique-vintique' ),
		'id'   => 'footer-1',
	] ) );

	register_sidebar( array_merge( $defaults, [
		'name' => __( 'Footer Column 2', 'chique-vintique' ),
		'id'   => 'footer-2',
	] ) );

	register_sidebar( array_merge( $defaults, [
		'name' => __( 'Footer Column 3', 'chique-vintique' ),
		'id'   => 'footer-3',
	] ) );
}
add_action( 'widgets_init', 'cv_widgets_init' );

/* =====================================================
   WP_HEAD — PRECONNECT FOR FONTS
   ===================================================== */
function cv_preconnect_fonts() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action( 'wp_head', 'cv_preconnect_fonts', 1 );

/* =====================================================
   EXCERPT LENGTH
   ===================================================== */
function cv_excerpt_length( $length ) {
	return is_admin() ? $length : 25;
}
add_filter( 'excerpt_length', 'cv_excerpt_length' );

function cv_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'cv_excerpt_more' );

/* =====================================================
   WOOCOMMERCE — REMOVE SIDEBAR FROM SHOP
   ===================================================== */
function cv_woo_remove_sidebar() {
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
}
add_action( 'init', 'cv_woo_remove_sidebar' );

/* =====================================================
   WOOCOMMERCE — PRODUCTS PER PAGE
   ===================================================== */
function cv_woo_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'cv_woo_products_per_page' );

/* =====================================================
   WOOCOMMERCE — COLUMNS
   ===================================================== */
function cv_woo_columns() {
	return 3;
}
add_filter( 'loop_shop_columns', 'cv_woo_columns' );

/* =====================================================
   WOOCOMMERCE — CART FRAGMENT (AJAX COUNT)
   ===================================================== */
function cv_woo_cart_count( $fragments ) {
	$count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
	$fragments['.cart-count'] = '<span class="cart-count">' . esc_html( $count ) . '</span>';
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'cv_woo_cart_count' );

/* =====================================================
   BLOCK EDITOR COLOR PALETTE
   ===================================================== */
function cv_block_editor_settings() {
	add_theme_support( 'editor-color-palette', [
		[ 'name' => __( 'Cream', 'chique-vintique' ),       'slug' => 'cream',       'color' => '#f5f0e8' ],
		[ 'name' => __( 'Light Grey', 'chique-vintique' ),  'slug' => 'light-grey',  'color' => '#e8e4e0' ],
		[ 'name' => __( 'Mid Grey', 'chique-vintique' ),    'slug' => 'mid-grey',    'color' => '#9a9696' ],
		[ 'name' => __( 'Dark Grey', 'chique-vintique' ),   'slug' => 'dark-grey',   'color' => '#3d3b3b' ],
		[ 'name' => __( 'Charcoal', 'chique-vintique' ),    'slug' => 'charcoal',    'color' => '#2a2420' ],
		[ 'name' => __( 'Gold', 'chique-vintique' ),        'slug' => 'gold',        'color' => '#c4935a' ],
		[ 'name' => __( 'White', 'chique-vintique' ),       'slug' => 'white',       'color' => '#ffffff' ],
	] );
}
add_action( 'after_setup_theme', 'cv_block_editor_settings' );

/* =====================================================
   INCLUDE PARTIALS
   ===================================================== */
require CV_DIR . '/inc/template-tags.php';
require CV_DIR . '/inc/nav-walker.php';
