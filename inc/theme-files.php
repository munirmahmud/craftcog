<?php

if ( !defined( 'ABSPATH' ) )
	die( 'Direct access forbidden.' );
/**
 * Enqueue all theme scripts and styles
 *

  /** --------------------------------------
 * ** REGISTERING THEME ASSETS
 * ** ------------------------------------ */
/**
 * Enqueue styles.
 */
if ( !is_admin() ) {

	wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css?family=Playfair+Display:400,700,900|Rubik:300,400,500,700,900' );

	wp_enqueue_style( 'bootstrap', CRAFTCOG_CSS . '/bootstrap.min.css', null, CRAFTCOG_VERSION );
	wp_enqueue_style( 'animate', CRAFTCOG_CSS . '/animate.css', null, CRAFTCOG_VERSION );
	wp_enqueue_style( 'owl-carousel', CRAFTCOG_CSS . '/owl.carousel.min.css', null, CRAFTCOG_VERSION );
	wp_enqueue_style( 'chosen-min', CRAFTCOG_CSS . '/chosen.min.css', null, CRAFTCOG_VERSION );
	wp_enqueue_style( 'themify-icons', CRAFTCOG_CSS . '/themify-icons.css', null, CRAFTCOG_VERSION );
	wp_enqueue_style( 'ionicons', CRAFTCOG_CSS . '/ionicons.min.css', null, CRAFTCOG_VERSION );
	wp_enqueue_style( 'meanmenu', CRAFTCOG_CSS . '/meanmenu.min.css', null, CRAFTCOG_VERSION );
	wp_enqueue_style( 'bundle', CRAFTCOG_CSS . '/bundle.css', null, CRAFTCOG_VERSION );
	wp_enqueue_style( 'font-awesome', CRAFTCOG_CSS . '/font-awesome.css', null, CRAFTCOG_VERSION );
	wp_enqueue_style( 'icon-font', CRAFTCOG_CSS . '/icon-font.css', null, CRAFTCOG_VERSION );
	wp_enqueue_style( 'theme-style', CRAFTCOG_CSS . '/style.css', microtime(), CRAFTCOG_VERSION );
	wp_enqueue_style( 'responsive', CRAFTCOG_CSS . '/responsive.css', NULL, CRAFTCOG_VERSION );

    // Theme stylesheet.
    wp_enqueue_style( 'craftcog-style', get_stylesheet_uri() );

}



/**
 * Enqueue scripts.
 */
if ( !is_admin() ) {
	// wp_enqueue_script() syntax, $handle, $src, $deps, $version, $in_footer(boolean)

	if( defined( 'FW') ) :
		$map_api_code = fw_get_db_customizer_option('tp_google_api');
		$api_key		 = ($map_api_code != '') ? '?key=' . $map_api_code : '';
		endif;
		

	//Bootstrap Main JS
	wp_enqueue_script( 'modernizr', CRAFTCOG_SCRIPTS . '/vendor/modernizr-2.8.3.min.js', array( 'jquery' ), CRAFTCOG_VERSION );
	wp_enqueue_script( 'popper', CRAFTCOG_SCRIPTS . '/popper.js', array( 'jquery' ), CRAFTCOG_VERSION, true );
	wp_enqueue_script( 'bootstrap', CRAFTCOG_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), CRAFTCOG_VERSION, true );
	wp_enqueue_script( 'isotope-pkgd', CRAFTCOG_SCRIPTS . '/isotope.pkgd.min.js', array( 'jquery' ), CRAFTCOG_VERSION, true );
	wp_enqueue_script( 'imagesloaded-pkgd', CRAFTCOG_SCRIPTS . '/imagesloaded.pkgd.min.js', array( 'jquery' ), CRAFTCOG_VERSION, true );
	wp_enqueue_script( 'jquery-counterup', CRAFTCOG_SCRIPTS . '/jquery.counterup.min.js', array( 'jquery' ), CRAFTCOG_VERSION, true );
	//wp_enqueue_script( 'waypoints', CRAFTCOG_SCRIPTS . '/waypoints.js', array( 'jquery' ), CRAFTCOG_VERSION, true );
	wp_enqueue_script( 'owl-carousel', CRAFTCOG_SCRIPTS . '/owl.carousel.min.js', array( 'jquery' ), CRAFTCOG_VERSION, true );
	wp_enqueue_script( 'plugins', CRAFTCOG_SCRIPTS . '/plugins.js', array( 'jquery' ), CRAFTCOG_VERSION, true );

	if(!empty($api_key)){
       wp_enqueue_script( 'map-googleapis', 'https://maps.googleapis.com/maps/api/js' . $api_key, array( 'jquery' ), NULL, TRUE );
	}

    wp_enqueue_script( 'main-js', CRAFTCOG_SCRIPTS . '/main.js', array( 'jquery' ), CRAFTCOG_VERSION, true );


	// Load WordPress Comment js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


