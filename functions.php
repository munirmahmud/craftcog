<?php
/**
 * CraftCog's functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage CraftCog
 * @since 1.0
 */

/**
 * ----------------------------------------------------------------------------------------
 * 1.0 - Theme's Constant
 * ----------------------------------------------------------------------------------------
 */
define('CRAFTCOG_THEME', 'CraftCog WordPress Theme');
define('CRAFTCOG_VERSION', '1.0');
define('CRAFTCOG_THEMEROOT', get_template_directory_uri());
define('CRAFTCOG_THEMEROOT_DIR', get_parent_theme_file_path());
define('CRAFTCOG_IMAGES', CRAFTCOG_THEMEROOT . '/assets/images');
define('CRAFTCOG_IMAGES_DIR', CRAFTCOG_THEMEROOT_DIR . '/assets/images');
define('CRAFTCOG_CSS', CRAFTCOG_THEMEROOT . '/assets/css');
define('CRAFTCOG_CSS_DIR', CRAFTCOG_THEMEROOT_DIR . '/assets/css');
define('CRAFTCOG_SCRIPTS', CRAFTCOG_THEMEROOT . '/assets/js');
define('CRAFTCOG_SCRIPTS_DIR', CRAFTCOG_THEMEROOT_DIR . '/assets/js');
define('CRAFTCOG_INC', CRAFTCOG_THEMEROOT_DIR . '/inc');
define('CRAFTCOG_SHORTCODE_DIR', CRAFTCOG_INC . '/shortcode');
define('CRAFTCOG_SHORTCODE_STYLE_DIR', CRAFTCOG_SHORTCODE_DIR . '/style');
define('CRAFTCOG_REMOTE_CONTENT', esc_url('http://themespry.com/items/' ));


function craftcog_wc_popup_item() {
    do_action( 'craftcog_wc_popup_item' );
}




/**
 * ----------------------------------------------------------------------------------------
 * 2.0 - Set up the content width value based on the theme's design.
 * ----------------------------------------------------------------------------------------
 */
if (!isset($content_width)) {
    $content_width = 800;
}


/**
 * ----------------------------------------------------------------------------------------
 * 3.0 - Sets up theme defaults and registers support for various WordPress features.
 * ----------------------------------------------------------------------------------------
 */
if ( !function_exists('craftcog_setup') ) {

    function craftcog_setup() {
	/**
	 * Make the theme available for translation.
	 */
	$lang_dir = CRAFTCOG_THEMEROOT . '/languages';
	load_theme_textdomain('craftcog', $lang_dir);


    /**
     * Add support for automatic feed links.
     */
    add_theme_support('automatic-feed-links');


    /**
     * Support for the WooCommerce
     */
     add_theme_support( 'craftcog' );

        /*
    * Enable the gallery in the theme
   */
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-slider' );
    add_theme_support( 'wc-product-gallery-lightbox' );

    /**
     * Let WordPress manage the document title.
     */
     add_theme_support( 'title-tag' );


    /**
    * Enable support for Post Thumbnails on posts and pages.
    *
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'post-thumbnail', 1113, 600, true );


    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'primary-menu'    => __( 'Primary Menu', 'craftcog' ),
        'mobile-menu'    => __( 'Mobile Menu', 'craftcog' ),
        'footer-menu' => __( 'Footer Menu', 'craftcog' ),
    ) );


    /**
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );


    /**
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'quote',
        'link',
    ) );


    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ) );

    }

    add_action('after_setup_theme', 'craftcog_setup');
}

/**
 * ----------------------------------------------------------------------------------------
 * 4.0 - theme INC.
 * ----------------------------------------------------------------------------------------
 */
include_once get_template_directory() . '/inc/init.php';