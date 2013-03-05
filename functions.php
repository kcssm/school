<?php
/**
 * school functions and definitions
 *
 * @package school
 * @since school 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since school 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

if ( ! function_exists( 'school_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since school 1.0
 */
function school_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	//require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * WordPress.com-specific functions and definitions
	 */
	//require( get_template_directory() . '/inc/wpcom.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on school, use a find and replace
	 * to change 'school' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'school', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	
	/**
	* Set image sizes
	*/

	/* Set & create additional image sizes */
	set_post_thumbnail_size( 205, 130, true ); // default square thumbnail
	add_image_size( 'sliderthumb', 157, 150, true ); // default square thumbnail
	add_image_size( 'homeslider', 700, 278, true );
	/* Update thumbnail and image sizes */
	update_option( 'thumbnail_size_w', 205, true );
	update_option( 'thumbnail_size_h', 130, true );
	update_option( 'medium_size_w', 620, true );
	update_option( 'medium_size_h', '', true );
	update_option( 'large_size_w', 940, true );
	update_option( 'large_size_h', '', true );
	update_option( 'embed_size_w', 620, true );
	
	
	

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'school' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery' ) );
	
	
}
endif; // school_setup
add_action( 'after_setup_theme', 'school_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function school_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	$args = apply_filters( 'school_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}
}
add_action( 'after_setup_theme', 'school_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since school 1.0
 */
function school_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'school' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'school_widgets_init' );

/**
 * Register Homepage widgetized area
 *
 * @since school 1.0
 */
function school_homepage_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Homepage', 'school' ),
		'id' => 'homepage-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'school_homepage_widgets_init' );

/**
 * Register Homepage widgetized area
 *
 * @since school 1.0
 */
function school_footer_widgets_init() {
$widgets = array( '1', '2', '3', '4' );
	foreach ( $widgets as $i ) {
		register_sidebar(array(
			'name' => __( 'Footer Widget ', 'albedo' ) .$i,
			'id' => 'footer-widget-'.$i,
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title"><span>',
			'after_title' => '</span></h3>'
		) );
	} // end foreach
}
add_action( 'widgets_init', 'school_footer_widgets_init' );


/**
 * Enqueue scripts and styles
 */
function school_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'cycle', get_template_directory_uri() . '/js/jquery.cycle.all.js', array( 'jquery' ), '20120227', true );
	wp_enqueue_script( 'core', get_template_directory_uri() . '/js/core.js', array( 'cycle' ), '20120227', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'school_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Theme options
 */
if ( file_exists( get_template_directory() . '/options/options.php' ) )
	require( get_template_directory() . '/options/options.php' );
if ( file_exists( get_template_directory() . '/options/options.php' ) && file_exists( get_template_directory() . '/theme-options.php' ) )
	require( get_template_directory() . '/theme-options.php' );
