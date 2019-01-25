<?php
/**
 * Nav Menu API: Walker_Nav_Menu class
 *
 * @package WordPress
 * @subpackage Nav_Menus
 * @since 4.6.0
 */

/**
 * Core class used to implement an HTML list of nav menu items.
 *
 * @since 3.0.0
 *
 * @see Walker
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct Access forbidden!' );
}

class Custom_Nav_Walker extends Walker_Nav_menu {
	
	/**
	 * Starts the list before the elements are added.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::start_lvl()
	 *
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$submenu = ( $depth > 0 ) ? ' munir' : '';
		$output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
	}


	/**
	 * Starts the element output.
	 *
	 * @since 3.0.0
	 * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
	 *
	 * @see Walker::start_el()
	 *
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		
		$indent = ( $depth ) ? str_repeat( "\t",  $depth ) : ''; 

	}

	/**
	 * Ends the element output, if needed.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::end_el()
	 */
	/*public function end_el() {
		# code...
	}*/


	/**
	 * Ends the list of after the elements are added.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::end_lvl()
	 *
	 */
	/*public function end_lvl() {
		# code...
	}*/
}