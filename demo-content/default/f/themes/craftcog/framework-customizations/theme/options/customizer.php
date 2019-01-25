<?php
$before_url = "<a href='http://themespry.com/'>";
$after_url = "</a>";
$options = array(
	'tp_theme_options' => array(
		'title'				 => esc_html__( 'Theme Options', 'craftcog' ),
		'options'			 => array(

		    //Header Top Settings
			'header_top_settings' => array(
				'title'		 => esc_html__( 'Header Top Settings', 'craftcog' ),
				'options'	 => array(

                    'header_top_contact_details' => array(
                        'type'				 => 'addable-popup',
                        'add-button-text'	 => esc_html__( 'Header Top Details', 'craftcog' ),
                        'label'				 => esc_html__( 'Header Top Contact Details', 'craftcog' ),
                        'desc'				 => esc_html__( 'Add contact information details items', 'craftcog' ),
                        'limit'				 => 3,
                        'template'			 => '{{=title}}',
                        'popup-options'		 => array(
                            'title'	 => array(
                                'label'	 => esc_html__( 'Title', 'craftcog' ),
                                'value'	 => esc_html__( 'Address', 'craftcog' ),
                                'desc'	 => esc_html__( 'Enter the contact information title', 'craftcog' ),
                                'type'	 => 'text',
                            ),
                            'info'	 => array(
                                'label'	 => esc_html__( 'Information', 'craftcog' ),
                                'value'	 => esc_html__( '1877 Perry Street Swartz Creekson, MI 48473', 'craftcog' ),
                                'desc'	 => esc_html__( 'Enter the main contact information', 'craftcog' ),
                                'type'	 => 'text',
                            ),
                            'icon'	 => array(
                                'type'	 => 'new-icon',
                                'label'	 => 'Icon',
                            ),
                        ),
                        'value'				 => array(
                            0	 => array(
                                'title'	 => 'Call us now',
                                'icon'	 => 'icon icon-phone3',
                                'info'	 => '1+(91) 458 654 528'
                            ),
                            1	 => array(
                                'title'	 => 'Drop us line',
                                'icon'	 => 'icon icon-envelope',
                                'info'	 => 'mail@example.com'
                            ),
                            2	 => array(
                                'title'	 => 'Visit Our Office',
                                'icon'	 => 'icon icon-map-marker2',
                                'info'	 => '1010 Avenue, NY, USA'
                            ),
                        ),
                    ),
                    'header_top_social_details' => array(
                        'type'				 => 'addable-popup',
                        'add-button-text'	 => esc_html__( 'Add Social Icon', 'craftcog' ),
                        'label'				 => esc_html__( 'Social Details', 'craftcog' ),
                        'desc'				 => esc_html__( 'Add Social information in the header top right corner.', 'craftcog' ),
                        'template'			 => '{{=title}}',
                        'popup-options'		 => array(
                            'title'	 => array(
                                'label'	 => esc_html__( 'Title', 'craftcog' ),
                                'value'	 => esc_html__( 'Facebook', 'craftcog' ),
                                'desc'	 => esc_html__( 'Enter the title', 'craftcog' ),
                                'type'	 => 'text',
                            ),
                            'link'	 => array(
                                'label'	 => esc_html__( 'Link', 'craftcog' ),
                                'value'	 => esc_html__( '#', 'craftcog' ),
                                'desc'	 => esc_html__( 'Add your social link', 'craftcog' ),
                                'type'	 => 'text',
                            ),
                            'icon'	 => array(
                                'type'	 => 'new-icon',
                                'value'	 => esc_html__( 'icon icon-social-2', 'craftcog' ),
                                'label'	 => 'Icon',
                            ),
                        ),
                        'value'				 => array(
                            0	 => array(
                                'title'	 => 'Twitter',
                                'icon'	 => 'fa fa-twitter',
                                'link'	 => '#'
                            ),
                            1	 => array(
                                'title'	 => 'Facebook',
                                'icon'	 => 'fa fa-facebook',
                                'link'	 => '#'
                            ),
                            2	 => array(
                                'title'	 => 'instagram',
                                'icon'	 => 'fa fa-instagram',
                                'link'	 => '#'
                            ),
                            3	 => array(
                                'title'	 => 'g+',
                                'icon'	 => 'fa fa-google-plus',
                                'link'	 => '#'
                            ),
                            4	 => array(
                                'title'	 => 'linkedin',
                                'icon'	 => 'fa fa-linkedin',
                                'link'	 => '#'
                            ),
                        )
                    ),

				),
			),


			//Header Settings
			'header_settings' => array(
				'title'		 => esc_html__( 'Header Settings', 'craftcog' ),
				'options'	 => array(

				    //Theme Logo
                    'tp_theme_logo' => array(
                        'label'          => esc_html__( 'Logo', 'craftcog' ),
                        'type'           => 'upload',
                        'desc'           => esc_html__( 'Upload the a logo with the dimention of 168 x 61', 'craftcog' ),
                        'images_only'    => true,
                        'files_ext'      => array( 'jpg', 'png', 'jpeg', 'gif', 'svg' ),
                    ),
				),
			),

            'tp_main_menu_styles' => array(
                'title'		 => esc_html__( 'Menu Settings', 'craftcog' ),
                'options'	 => array(
                    'menu_bg_color' => array(
                        'label'	 => esc_html__( 'Menu Background Color', 'craftcog' ),
                        'type'	 => 'color-picker',
                    ),
                    'menu_text_color' => array(
                        'label'	 => esc_html__( 'Menu Color', 'craftcog' ),
                        'type'	 => 'color-picker',
                    ),
                    'menu_hover_color' => array(
                        'label'	 => esc_html__( 'Menu Hover Color', 'craftcog' ),
                        'type'	 => 'color-picker',
                    ),
                    'menu_dropdown_bg_color' => array(
                        'label'	 => esc_html__( 'Menu Dropdown Background Color', 'craftcog' ),
                        'type'	 => 'color-picker',
                    ),
                    'menu_dropdown_text_color' => array(
                        'label'	 => esc_html__( 'Menu Dropdown Text Color', 'craftcog' ),
                        'type'	 => 'color-picker',
                    ),
                    'menu_dropdown_hover_color' => array(
                        'label'	 => esc_html__( 'Menu Dropdown Text Hover Color', 'craftcog' ),
                        'type'	 => 'color-picker',
                    ),
                ),
            ),


			/* Theme Styling Panel */
			'styling_panel' => array(
				'title'		 => esc_html__( 'Theme Styling', 'craftcog' ),
				'options'	 => array(
					'geobin_theme_color' => array(
						'label'	 => esc_html__( 'Theme Color', 'craftcog' ),
						'type'	 => 'color-picker',
						'desc'	 => esc_html__( 'You can use any color in your theme', 'craftcog' ),
					),
					'theme_secondary_color' => array(
						'label'	 => esc_html__( 'Secondary Color', 'craftcog' ),
						'type'	 => 'color-picker',
						'desc'	 => esc_html__( 'You can use any color in your theme', 'craftcog' ),
						'value'	 => '#FA6742',
					),
					'geobin_body_font' => array(
						'type'		 => 'typography-v2',
						'value'		 => array(
							'family'		 => 'Nunito',
							'size'			 => 16,
							'line-height'	 => 28,
						),
						'components' => array(
							'family'		 => true,
							// 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
							'size'			 => true,
							'style'			 => false,
							'subset'		 => false,
							'variation'		 => false,
							'line-height'	 => true,
							'letter-spacing' => false,
							'color'			 => false
						),
						'label'		 => esc_html__( 'Body Font', 'craftcog' ),
						'desc'		 => esc_html__( 'This is default body font for your site', 'craftcog' ),
					),
					'geobin_heading_title'	 => array(
						'type'		 => 'typography-v2',
						'value'		 => array(
							'family'		 => 'Nunito',
							'variation'		 => '800',
							'line-height'	 => 15,
							'letter-spacing' => 0,
						),
						'components' => array(
							'family'		 => true,
							'style'			 => false,
							'weight'		 => true,
							'size'			 => false,
							'line-height'	 => false,
							'letter-spacing' => false,
							'color'			 => true
						),
						'label'		 => esc_html__( 'Heading Fonts', 'craftcog' ),
						'desc'		 => esc_html__( 'This is for heading google fonts', 'craftcog' ),
					),
					'primary_heading_font'	 => array(
						'label'	 => esc_html__( 'Heading Font Weight h1, h2', 'craftcog' ),
						'type'	 => 'text',
					),
					'secondary_heading_font' => array(
						'label'	 => esc_html__( 'Heading Font Weight h3, h4, h5, h6', 'craftcog' ),
						'type'	 => 'text',
					),
				),
			),


			/* Page Settings */
			'tp_page_setting_panel' => array(
				'title'		 => esc_html__( 'Page Settings', 'craftcog' ),
				'options'	 => array(
					'news_settings'			 => array(
						'label'		 => esc_html__( 'Page Settings', 'craftcog' ),
						'type'		 => 'select',
						'desc'		 => esc_html__( 'Choose your page style', 'craftcog' ),
						'choices'	 => array(
							'rightsidebar'	 => esc_html__( 'Right Sidebar', 'craftcog' ),
							'fullwidth'		 => esc_html__( 'Full Width', 'craftcog' ),
							'leftsidebar'	 => esc_html__( 'Left Sidebar', 'craftcog' ),
						),
					),
					'global_page_subheading'		 => array(
						'label'	 => esc_html__( 'Page Sub Heading', 'craftcog' ),
						'type'	 => 'text',
					),
					'global_header_bg'	 => array(
                        'label'	             => __( 'Global Header Background Image', 'craftcog' ),
                        'type'	             => 'upload',
					),

                    //Overlay Color
                    'page_banner_overlay' => array(
                        'type'          => 'rgba-color-picker',
                        'value'         => 'rgba(0,0,0,0.7)',
                        // palette colors array
                        //'palettes'      => array( '#ba4e4e', '#0ce9ed', '#941940' ),
                        'label'         => __( 'Overlay Color', 'craftcog' ),
                    ),

                    //Color Picker
                    'page_heading_color' => array(
                        'type'          => 'color-picker',
                        'value'         => '#FFFFFF',
                        // palette colors array
                        //'palettes'      => array( '#ba4e4e', '#0ce9ed', '#941940' ),
                        'label'         => __( 'Heading Color', 'craftcog' ),
                    ),
                    'page_subtitle_color' => array(
                        'type'          => 'color-picker',
                        'value'         => '#FFFFFF',
                        // palette colors array
                        //'palettes'      => array( '#ba4e4e', '#0ce9ed', '#941940' ),
                        'label'         => __( 'Subtitle Color', 'craftcog' ),
                    ),

				),
			),


            /* WooCommerce Settings */
            'tp_wc_setting_panel' => array(
                'title'		 => esc_html__( 'WooCommerce', 'craftcog' ),
                'options'	 => array(
                    'global_wc_title'		 => array(
                        'label'	 => __( 'Global Blog Title', 'craftcog' ),
                        'type'	 => 'text',
                    ),
                    'wc_header_bg'	 => array(
                        'label'	             => __( 'Global Header Background Image', 'craftcog' ),
                        'type'	             => 'upload',
                        'value'              => CRAFTCOG_IMAGES . '/page-header-bg.jpg',
                    ),
                    'wc_breadcrumb' => array(
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
                    //Overlay Color
                    'wc_banner_overlay' => array(
                        'type'          => 'rgba-color-picker',
                        'value'         => 'rgba(0,0,0,0.7)',
                        'attr'          => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                        // palette colors array
                        //'palettes'      => array( '#ba4e4e', '#0ce9ed', '#941940' ),
                        'label'         => __( 'Overlay Color', 'craftcog' ),
                    ),
                    //Color Picker
                    'wc_heading_color' => array(
                        'type'          => 'color-picker',
                        'value'         => '#FFFFFF',
                        'attr'          => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                        // palette colors array
                        //'palettes'      => array( '#ba4e4e', '#0ce9ed', '#941940' ),
                        'label'         => __( 'Heading Color', 'craftcog' ),
                    ),
                ),
            ),


			/* Blog Settings */
			'tp_blog_setting_panel' => array(
				'title'		 => esc_html__( 'Blog Settings', 'craftcog' ),
				'options'	 => array(
					'news_settings'			 => array(
						'label'		 => __( 'Blog Settings', 'craftcog' ),
						'type'		 => 'select',
						'desc'		 => __( 'Choose your blog style', 'craftcog' ),
						'choices'	 => array(
							'rightsidebar'	 => __( 'Right Sidebar', 'craftcog' ),
							'fullwidth'		 => __( 'Full Width', 'craftcog' ),
							'leftsidebar'	 => __( 'Left Sidebar', 'craftcog' ),
						),
					),
					'global_blog_title'		 => array(
						'label'	 => __( 'Global Blog Title', 'craftcog' ),
						'type'	 => 'text',
					),
					'global_blog_subtitle'		 => array(
						'label'	 => __( 'Global Subtitle', 'craftcog' ),
						'type'	 => 'text',
					),
					'global_header_blog_bg'	 => array(
                        'label'	             => __( 'Global Header Background Image', 'craftcog' ),
                        'type'	             => 'upload',
					),
					'global_blog_breadcrumb' => array(
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
					'blog_author_settings'	 => array(
						'type'			 => 'switch',
						'label'			 => __( 'Blog Author', 'craftcog' ),
						'desc'			 => __( 'Do you want to show blog author?', 'craftcog' ),
						'left-choice'	 => array(
							'value'	 => 'no',
							'label'	 => __( 'No', 'craftcog' ),
						),
						'right-choice'	 => array(
							'value'	 => 'yes',
							'label'	 => __( 'Yes', 'craftcog' ),
						),
					),


                    //Overlay Color
                    'heading_banner_overlay' => array(
                        'type'          => 'rgba-color-picker',
                        'value'         => 'rgba(0,0,0,0.7)',
                        'attr'          => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                        // palette colors array
                        //'palettes'      => array( '#ba4e4e', '#0ce9ed', '#941940' ),
                        'label'         => __( 'Overlay Color', 'craftcog' ),
                    ),

                    //Color Picker
                    'blog_heading_color' => array(
                        'type'          => 'color-picker',
                        'value'         => '#FFFFFF',
                        'attr'          => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                        // palette colors array
                        //'palettes'      => array( '#ba4e4e', '#0ce9ed', '#941940' ),
                        'label'         => __( 'Heading Color', 'craftcog' ),
                    ),
                    'blog_subtitle_color' => array(
                        'type'          => 'color-picker',
                        'value'         => '#FFFFFF',
                        'attr'          => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                        // palette colors array
                        //'palettes'      => array( '#ba4e4e', '#0ce9ed', '#941940' ),
                        'label'         => __( 'Subtitle Color', 'craftcog' ),
                    ),

				),
			),


			/* Footer Bottom Section */
			'footer_panel' => array(
				'title'		 => esc_html__( 'Footer Settings', 'craftcog' ),
				'options'	 => array(
					'footer_bg_color' => array(
						'label'	 => esc_html__( 'Footer Background Color', 'craftcog' ),
						'type'	 => 'color-picker',
						'desc'	 => esc_html__( 'You can change the footer\'s background color with rgba color or solid color', 'craftcog' ),
					),
					'footer_top_bg_color' => array(
						'label'	 => esc_html__( 'Footer Top Background Color', 'craftcog' ),
						'type'	 => 'color-picker',
					),
					'widget_title_color' => array(
						'label'	 => esc_html__( 'Widget Title Color', 'craftcog' ),
						'type'	 => 'color-picker',
					),
					'widget_text_color' => array(
						'label'	 => esc_html__( 'Widget Text Color', 'craftcog' ),
						'type'	 => 'color-picker',
					),
					'widget_link_color' => array(
						'label'	 => esc_html__( 'Widget URL Color', 'craftcog' ),
						'type'	 => 'color-picker',
					),
					'widget_link_hover_color' => array(
						'label'	 => esc_html__( 'Widget URL Hover Color', 'craftcog' ),
						'type'	 => 'color-picker',
					),
					'copyright_info'		 => array(
						'label'	 => esc_html__( 'Copyright Info', 'craftcog' ),
						'type'	 => 'textarea',
						'value'	 => 'Copyright 2018, All Right Reserved By '. $before_url .'ThemesPry' . $after_url,
						'desc'	 => false,
					),
                    'copyright_text_color'   => array(
                        'label'  => esc_html__( 'Copyright Text Color', 'craftcog' ),
                        'type'   => 'color-picker',
                    ),
					'payment_method_cards'	 => array(
						'label'	 => esc_html__( 'Payment Methods', 'craftcog' ),
						'type'	 => 'upload',
					),
				),
			),
			/* Google API */
			'tp_google_api_panel' => array(
				'title'		 => esc_html__( 'Google API', 'craftcog' ),
				'options'	 => array(
					'tp_google_api' => array(
						'label'	 => esc_html__( 'Google API', 'craftcog' ),
						'type'	 => 'text',
						'desc'	 => esc_html__( 'Put here your google API key.', 'craftcog' ),
					),
				),
			),
		),
		'wp-customizer-args' => array(
			'priority' => 3,
		),
	),
);
