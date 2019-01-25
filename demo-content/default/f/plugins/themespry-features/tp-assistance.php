<?php

/**
  Plugin Name: ThemesPry Features
  Plugin URI:http://themespry.com
  Description: Themespry Features is a plugin for our Themespry's themes.
  Author: ThemesPry
  Author URI: http://themespry.com
  Version:1.0
 */
if ( !defined( 'ABSPATH' ) )
	exit;

define( "TP_PLUGIN_DIR", plugin_dir_path( __FILE__ ) );

class TP_Custom_Post_Class {

	/**
	 * Holds the class object.
	 *
	 * @since 1.0.0
	 *
	 */
	public static $_instance;

	/**
	 * Plugin Name
	 *
	 * @since 1.0.0
	 *
	 */
	public $plugin_name = 'Themespry Assistance';

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 */
	public $plugin_version = '1.0.0';

	/**
	 * Plugin File
	 *
	 * @since 1.0.0
	 *
	 */
	public $file = __FILE__;

	/**
	 * Load Construct
	 * 
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->tp_plugin_init();
	}

	/**
	 * Plugin Initialization
	 *
	 * @since 1.0.0
	 *
	 */
	public function tp_plugin_init() {
		require_once (plugin_dir_path( $this->file ) . 'post-type/tp-post-class.php');
	}

	/**
	 *
	 * Get Catagories/Taxonomies List
	 *
	 * @since 1.0.0
	 */
	public function tp_category_list( $cat ) {
		$query_args	 = array(
			'orderby'	 => 'ID',
			'order'		 => 'DESC',
			'hide_empty' => 1,
			'taxonomy'	 => $cat
		);
		$categories	 = get_categories( $query_args );
		$options	 = array( esc_html__( '0', 'themespry' ) => 'All Category' );
		if ( is_array( $categories ) && count( $categories ) > 0 ) {
			foreach ( $categories as $cat ) {
				$options[ $cat->term_id ] = $cat->name;
			}
			return $options;
		}
	}

	public static function tp_get_instance() {
		if ( !isset( self::$_instance ) ) {
			self::$_instance = new TP_Custom_Post_Class();
		}
		return self::$_instance;
	}

}

$tp_post = TP_Custom_Post_Class::tp_get_instance();

require_once ('inc/tp-social-share.php');


