<?php

class CraftCog_unyson extends WP_Widget {

	/**
	 * Widget constructor.
	 */
	private $options;
	private $prefix;

	function __construct() {

		$widget_ops		 = array( 'description' => esc_html__( 'Display online support infomation', 'craftcog' ) );
		parent::__construct( false, esc_html__( 'Online Support', 'craftcog' ), $widget_ops );
		$this->options	 = array(
			'title'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Widget Title', 'craftcog' ),
			),
			'option' => array(
				'type'				 => 'addable-popup',
				'value'				 => array(
					array(
						'option_1'	 => 'value 1',
						'option_2'	 => 'value 2',
					),
				// ...
				),
				'label'				 => esc_html__( 'Addable Popup', 'craftcog' ),
				'desc'				 => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'craftcog' ),
				'template'			 => '{{- demo_text }}',
				'popup-title'		 => null,
				'size'				 => 'small', // small, medium, large
				'limit'				 => 0, // limit the number of popup`s that can be added
				'add-button-text'	 => esc_html__( 'Add', 'craftcog' ),
				'sortable'			 => true,
				'popup-options'		 => array(
					'option_1'	 => array(
						'label'	 => esc_html__( 'Text', 'craftcog' ),
						'type'	 => 'text',
						'value'	 => 'Demo text value',
						'desc'	 => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'craftcog' ),
						'help'	 => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>", esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'craftcog' ), esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', 'craftcog' )
						),
					),
					'option_2'	 => array(
						'label'	 => esc_html__( 'Textarea', 'craftcog' ),
						'type'	 => 'textarea',
						'value'	 => 'Demo textarea value',
						'desc'	 => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'craftcog' ),
						'help'	 => sprintf( "%s \n\n'\"<br/><br/>\n\n <b>%s</b>", esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'craftcog' ), esc_html__( 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', 'craftcog' )
						),
					),
				),
			),
		);
		$this->prefix	 = 'online_support';
	}

	function widget( $args, $instance ) {
		extract( $args );
		$params = array();

		foreach ( $instance as $key => $value ) {
			$params[ $key ] = $value;
		}
	}

	function update( $new_instance, $old_instance ) {
		return fw_get_options_values_from_input(
		$this->options, FW_Request::POST( fw_html_attr_name_to_array_multi_key( $this->get_field_name( $this->prefix ) ), array() )
		);
	}

	function form( $values ) {

		$prefix	 = $this->get_field_id( $this->prefix );
		$id		 = 'fw-widget-options-' . $prefix;

		echo '<div class="fw-force-xs fw-theme-admin-widget-wrap" id="' . esc_attr( $id ) . '">';
		$this->print_widget_javascript( $id );
		echo fw()->backend->render_options( $this->options, $values, array(
			'id_prefix'		 => $prefix . '-',
			'name_prefix'	 => $this->get_field_name( $this->prefix ),
		) );
		echo '</div>';

		return $values;
	}

	private function print_widget_javascript( $id ) {
		?><script type="text/javascript">
		            jQuery( function( $ ) {
		            var selector = '#<?php echo esc_js( $id ) ?>', timeoutId;
		            $( selector ).on( 'remove', function( ){ // ReInit options on html replace (on widget Save)
		            clearTimeout( timeoutId );
		            timeoutId = setTimeout( function( ){ // wait a few milliseconds for html replace to finish
		            fwEvents.trigger( 'fw:options:init', { $elements: $( selector ) } );
		            }, 100 );
		            } );
		            } );
		            jQuery( function( $ ) {
		            let timeoutAddId;
		            $( document ).on( 'widget-added', function( ev, $widget ){
		            clearTimeout( timeoutAddId );
		            timeoutAddId = setTimeout( function( ){ // wait a few milliseconds for html replace to finish
		            $widget.find( 'form input[type="submit"]' ).click( );
		            console.log( $widget );
		            }, 300 );
		            } );
		            let timeoutUpdateId;
		            $( document ).on( 'widget-updated', function( ev, $widget ){
		            clearTimeout( timeoutUpdateId );
		            timeoutUpdateId = setTimeout( function( ){ // wait a few milliseconds for html replace to finish
		            fwEvents.trigger( 'fw:options:init', { $elements: $widget } );
		            }, 100 );
		            } );
		            } );

		</script><?php
	}

}
?>