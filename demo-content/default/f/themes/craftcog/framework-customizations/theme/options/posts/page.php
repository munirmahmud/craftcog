<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'side' => array(
		'title'		 => esc_html__( 'Page Settings', 'craftcog' ),
		'type'		 => 'box',
		'priority'	 => 'high',
		'options'	 => array(
			'page_heading'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Page Custom Heading', 'craftcog' ),
				'desc'	 => esc_html__( 'Add your page heading', 'craftcog' ),
			),
			'page_sub_heading'	 => array(
				'type'	 => 'text',
                'label'	 => esc_html__( 'Page Sub Heading', 'craftcog' ),
				'desc'	 => esc_html__( 'Add your page sub heading/title', 'craftcog' ),
			),
			'page_header_bg'	 => array(
				'label'	 => esc_html__( ' Banner Image', 'craftcog' ),
				'desc'	 => esc_html__( 'Upload a Page header image', 'craftcog' ),
				'help'	 => esc_html__( "This default header background image will be shown for all pages.", 'craftcog' ),
				'type'	 => 'upload',
			),
			'overlay'		 => array(
                'type'          => 'rgba-color-picker',
                // palette colors array
                //'palettes'      => array( '#ba4e4e', '#0ce9ed', '#941940' ),
				'label'		 => esc_html__( 'Overlay', 'craftcog' ),
				'desc'		 => esc_html__( 'This is optional Overlay', 'craftcog' ),
			),
            'page_breadcrumb' => array(
                'type'			 => 'switch',
                'label'			 => __( 'Breadcrumb', 'craftcog' ),
                'desc'			 => __( 'Do you want to show Breadcrumb?', 'craftcog' ),
                'left-choice'	 => array(
                    'value'	 => 'yes',
                    'label'	 => __( 'Yes', 'craftcog' ),
                ),
                'right-choice'	 => array(
                    'value'	 => 'no',
                    'label'	 => __( 'No', 'craftcog' ),
                ),
            ),
		),
	),
);
