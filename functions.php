<?php
/**
 * pmd functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pmd
 */

if ( ! function_exists( 'pmd_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pmd_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on pmd, use a find and replace
		 * to change 'pmd' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pmd', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		
		// Include custom navwalker		
		// Register Custom Navigation Walker
		require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
		
		if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
			// file does not exist... return an error.
			return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
		} else {
			// file exists... require it.
			require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
		}
		
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'pmd' ),
			'footer' => __( 'Footer Menu', 'pmd' ),
			'frameworks' => __( 'Framework Menu', 'pmd' ),
			'users' => __( 'User Menu', 'pmd' ),
			'innerpage-menu' => __('Innerpage Navigation', 'pmd')
		) );

		

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'pmd_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'pmd_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pmd_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'pmd_content_width', 640 );
}
add_action( 'after_setup_theme', 'pmd_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pmd_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pmd' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pmd' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Theme Listing Sidebar', 'pmd' ),
		'id'            => 'sidebar-theme-listing',
		'description'   => esc_html__( 'Add widgets here.', 'pmd' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'shop', 'pmd' ),
		'id'            => 'shop',
		'description'   => esc_html__( 'Add widgets here.', 'pmd' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'pmd' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 'pmd' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pmd_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pmd_scripts() {
	wp_enqueue_style( 'bootstrap-4', get_template_directory_uri() . '/assets/css/vendors/bootstrap/bootstrap.css', array(), 'v4.0.0', 'all' );
	wp_enqueue_style( 'wp-bootstrap-4-style', get_stylesheet_uri(), array(), '1.0.2', 'all' );
	wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/assets/css/vendors/owl-carousel/owl.carousel.min.css', array(), 'v4.0.0', 'all' );
	wp_enqueue_style( 'propeller-owl-carousel-css', get_template_directory_uri() . '/assets/css/vendors/owl-carousel/pmd-carousel.css', array(), 'v4.0.0', 'all' );
	wp_enqueue_style( 'impactery-css', get_template_directory_uri() . '/assets/css/impactery.min.css', array(), 'v4.0.0', 'all' );
	wp_enqueue_style( 'custom-styles', get_bloginfo('stylesheet_directory') . '/pmd-theme-settings/css/admin-color-theme.css' );
	wp_enqueue_style( 'propeller-topbar', get_bloginfo('stylesheet_directory') . '/assets/css/vendors/propeller/propeller-topbar.css' );
	wp_enqueue_script( 'jquery-3.3.1.min', get_template_directory_uri() . '/assets/js/vendors/jquery/jquery-3.3.1.min.js', array('jquery'), 'v4.0.0', true );
	wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/assets/js/vendors/popper/popper.min.js', array('jquery'), 'v4.0.0', true );
	wp_enqueue_script( 'bootstrap-4-js', get_template_directory_uri() . '/assets/js/vendors/bootstrap/bootstrap.js', array('jquery'), 'v4.0.0', true );
	wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/assets/js/vendors/owl-carousel/owl.carousel.min.js', array('jquery'), 'v4.0.0', true );
	wp_enqueue_script( 'propeller-pro-js', get_template_directory_uri() . '/assets/js/vendors/propeller/propeller.min.js', array('jquery'), 'v4.0.0', true );
	wp_enqueue_script( 'impactery-js', get_template_directory_uri() . '/assets/js/impactery.js', array('jquery'), 'v1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pmd_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*---------------------------------------------------------------------------
 * function to create Propeller Theme option page in wordpress widget bar
---------------------------------------------------------------------------*/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'Propeller Theme',
		'instructions' => 'test',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' => 'dashicons-images-alt2',
		'position' => 63
	));
}

/*---------------------------------------------------------------------------
 * function to dynamically generate custom-style.css file. It contains the 
 * color values selected by user for theme color options.
---------------------------------------------------------------------------*/
function generate_options_css() {
	$ss_dir = get_stylesheet_directory();
	ob_start(); // Capture all output into buffer
	require($ss_dir . '/pmd-theme-settings/admin-color-theme.php'); // Grab the custom-style.php file
	$css = ob_get_clean(); // Store output in a variable, then flush the buffer
	file_put_contents($ss_dir . '/pmd-theme-settings/css/admin-color-theme.css', $css, LOCK_EX); // Save it as a css file
}
add_action( 'acf/save_post', 'generate_options_css', 20 ); //Parse the output and write the CSS file on post save (thanks Esmail Ebrahimi)
add_action( 'acf/input/admin_enqueue_scripts', function() {
  wp_enqueue_script( 'acf-custom-colors', get_stylesheet_directory_uri() . '/pmd-theme-settings/js/aw-colors.js', 'acf-input', '1.0', true );
});


/*---------------------------------------------------------------------------
 * function to register API key for Google map
---------------------------------------------------------------------------*/
function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyBoM1ePced26bN1LbtK2J0csGLq5KaQLNA');
}
add_action('acf/init', 'my_acf_init');


function cptui_register_my_cpts() {

	/**
	 * Post Type: Upcoming Modules.
	 */

	$labels = array(
		"name" => __( "Upcoming Modules", "pmd" ),
		"singular_name" => __( "upcoming_modules", "pmd" ),
	);

	$args = array(
		"label" => __( "Upcoming Modules", "pmd" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "upcoming_modules", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "thumbnail", "excerpt", "custom-fields" ),
	);

	register_post_type( "upcoming_modules", $args );

	/**
	 * Post Type: Startup Reviews.
	 */

	$labels = array(
		"name" => __( "Startup Reviews", "pmd" ),
		"singular_name" => __( "Startup Reviews", "pmd" ),
	);

	$args = array(
		"label" => __( "Startup Reviews", "pmd" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "startup_reviews", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "startup_reviews", $args );

	/**
	 * Post Type: Experts.
	 */

	$labels = array(
		"name" => __( "Experts", "pmd" ),
		"singular_name" => __( "experts", "pmd" ),
		"featured_image" => __( "Upload Profile image", "pmd" ),
		"set_featured_image" => __( "Upload Profile image", "pmd" ),
	);

	$args = array(
		"label" => __( "Experts", "pmd" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "experts", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "thumbnail", "custom-fields" ),
	);

	register_post_type( "experts", $args );

	/**
	 * Post Type: Community Partners.
	 */

	$labels = array(
		"name" => __( "Community Partners", "pmd" ),
		"singular_name" => __( "community_partners", "pmd" ),
	);

	$args = array(
		"label" => __( "Community Partners", "pmd" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "community_partners", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "thumbnail" ),
	);

	register_post_type( "community_partners", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );