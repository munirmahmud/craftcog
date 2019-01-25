<?php if ( !defined( 'FW' ) ) {	die( 'Forbidden' ); }

$options = array(
	'side' => array(
		'title'		 => esc_html__( 'Page Settings', 'craftcog' ),
		'type'		 => 'box',
		'priority'	 => 'high',
		'options'	 => array(
			'header_title'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Banner title', 'craftcog' ),
				'desc'	 => esc_html__( 'Add your Service hero title', 'craftcog' ),
			),
			'header_image'	 => array(
				'label'	 => esc_html__( ' Banner Image', 'craftcog' ),
				'desc'	 => esc_html__( 'Upload a Page header image', 'craftcog' ),
				'help'	 => esc_html__( "This default header image will be used for all your Service.", 'craftcog' ),
				'type'	 => 'upload'
			),
		),
	),
);
