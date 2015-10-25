<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Include dashicons post formats lib
include_once( get_stylesheet_directory() . '/inc/post-formats.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Cloe' );
define( 'CHILD_THEME_URL', 'http://magikpress.com/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );

}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add Structural Wraps
add_theme_support( 'genesis-structural-wraps', array( 'header', 'nav', 'subnav', 'inner', 'footer-widgets', 'footer' ) );

//* Add Accessibility support
add_theme_support( 'genesis-accessibility', array( 'headings', 'drop-down-menu',  'search-form', 'skip-links', 'rems' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background', array(
		'default-image'	=>	get_stylesheet_directory_uri().'/images/body.jpg'											  
	));

//* Add support for post formats
add_theme_support( 'post-formats', array(
	'aside',
	'audio',
	'chat',
	'gallery',
	'image',
	'link',
	'quote',
	'status',
	'video'
) );

//* Add support for post format images
add_theme_support( 'genesis-post-format-dashicons' );

//* Disable layouts
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'full-width-content' );
genesis_unregister_layout( 'content-sidebar' );
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_sidebar_content' );

