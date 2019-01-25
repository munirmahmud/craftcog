<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'side' => array(
		'title'		 => __( 'WooCommerce Settings', 'craftcog' ),
		'type'		 => 'box',
		'priority'	 => 'high',
		'options'	 => array(
			'header_title'	 => array(
				'type'	 => 'text',
				'label'	 => __( 'Banner title', 'craftcog' ),
				'desc'	 => __( 'Add your WooCommerce Shop title', 'craftcog' ),
			),
			'header_image'	 => array(
				'label'	 => __( 'Banner Image', 'craftcog' ),
				'desc'	 => __( 'Upload a Page header image', 'craftcog' ),
				'help'	 => __( "This default header image will be used for all your Service.", 'craftcog' ),
				'type'	 => 'upload',
                'value'  => CRAFTCOG_IMAGES . '/page-header-bg.jpg'
			),
			'overlay'		 => array(
				'type'		 => 'rgba-color-picker',
				'value'		 => '',
				// palette colors array
				'label'		 => __( 'Overlay', 'craftcog' ),
				'desc'		 => __( 'This is optional Overlay', 'craftcog' ),
			),
		),
	),
);
