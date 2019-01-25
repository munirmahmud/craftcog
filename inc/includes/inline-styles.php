<?php

function craftcog_action_tp_hook_css() {
	if ( defined( 'FW' ) ) {
		$main_color		 = fw_get_db_settings_option( 'main_color' );
		$secondary_color = fw_get_db_settings_option( 'secondary_color' );
		$others_color = fw_get_db_settings_option( 'others_color' );

		$color_hex = craftcog_color_rgb( $main_color );

		//global font

		$global_body_font = fw_get_db_settings_option( 'body_font' );
		if ( $global_body_font[ 'family' ] != 'gilroylight' || $global_body_font[ 'family' ] != 'gilroyextrabold' ) {
			Unyson_Google_Fonts::add_typography_v2( fw_get_db_settings_option( 'body_font' ) );
		}
		$body_font = craftcog_advanced_tp_font_styles( fw_get_db_settings_option( 'body_font' ) );



		$heading_title = fw_get_db_settings_option( 'heading_title' );
		if ( $heading_title[ 'family' ] != 'gilroylight' && $heading_title[ 'family' ] != 'gilroyextrabold' ) {
			Unyson_Google_Fonts::add_typography_v2( fw_get_db_settings_option( 'heading_title' ) );
		}



		$global_title = craftcog_advanced_tp_font_styles( fw_get_db_settings_option( 'heading_title' ) );

		Unyson_Google_Fonts::add_typography_v2( fw_get_db_settings_option( 'extra_fonts' ) );
		Unyson_Google_Fonts::add_typography_v2( fw_get_db_settings_option( 'extra_fonts_2' ) );
		$global_subtitle = craftcog_advanced_tp_font_styles( fw_get_db_settings_option( 'extra_fonts' ) );

		//top bar bg color
		$top_color		 = craftcog_get_option( 'topbar_menu_color' );
		$top_bg_color	 = $top_color != '' ? '#top-bar{background:' . $top_color . '}' : '';
		

		$top_txt_color	 = craftcog_get_option( 'topbar_text_color' );
		$top_text_color	 = $top_txt_color != '' ? '#top-bar ul > li > a, #top-bar i, #top-bar .top-info p, #top-bar .top-info i{color:' . $top_txt_color . '}' : '';

		$menu_bg_color	 = '';
		//Menu bg color
		$menu_color		 = craftcog_get_option( 'main_menu_color' );
		$menu			 = craftcog_get_option( 'mainmenu_style' );
		if ( $menu_color != '' ) {

			if ( $menu[ 'menu_style' ] == 'menu-1' ) {
				$menu_bg_color = '.header-trans-leftbox .header-wrapper, .header-trans-leftbox .header-wrapper:before{background:' . $menu_color . '}';
			} elseif ( $menu[ 'menu_style' ] == 'menu-3' && $menu[ 'menu-3' ][ 'boxed' ] == 'yes' ) {
				$menu_bg_color = '#header .row{background:' . $menu_color . '}';
			} elseif ( $menu[ 'menu_style' ] == 'menu-5' ) {

				$menu_bg_color = isset( $menu[ 'menu-5' ][ 'boxed' ] ) && $menu[ 'menu-5' ][ 'boxed' ] == 'yes' ? '.site-navigation .row{background:' . $menu_color . '}' : '.site-navigation.navdown{background:' . $menu_color . '}';
			} else {
				$menu_bg_color = '#header{background:' . $menu_color . '}';
			}
		}

		$menu_txt_color	 = craftcog_get_option( 'menu_text_color' );
		$menu_text_color = $menu_txt_color != '' ? 'ul.main-menu>li>a, .nav-search, .header-standard ul.navbar-nav > li > a{color:' . $menu_txt_color . '}' : '';



		//Footer style
		$footer_widgets_background	 = $footer_overlay				 = $widget_text_color			 = '';
		$footer_widgets				 = craftcog_get_option( 'footer_widget' );

		if ( $footer_widgets[ 'footer_bg' ] == 'yes' ) {
			$widgets_settings = $footer_widgets[ 'yes' ][ 'footer_bg_setting' ];

			if ( $widgets_settings[ 'footer_bg' ] == 'image' ) {
				$footer_widgets_background	 = $widgets_settings[ 'image' ][ 'bg_image' ] != '' ? '.footer {background: url(' . $widgets_settings[ 'image' ][ 'bg_image' ][ 'url' ] . ');}' : '';
				$footer_overlay_color		 = $widgets_settings[ 'image' ][ 'widgets_overlay_color' ];

				$footer_overlay = $footer_overlay_color != '' ? '.footer .tp-main-overlay{background-color:' . $footer_overlay_color . '}' : '';
			} else {
				$footer_widgets_background = $widgets_settings[ 'color' ][ 'bg_color' ] != '' ? '.footer, .ts-oval-shape {background-color:' . $widgets_settings[ 'color' ][ 'bg_color' ] . ';}' : '';
			}
			$widget_text_color = $footer_widgets[ 'yes' ][ 'widgets_text_color' ] != '' ? '.footer, .footer-widget ul.list-dash li a, .footer .widget-title{color:' . $footer_widgets[ 'yes' ][ 'widgets_text_color' ] . '}' : '';
		}


		//	copyright_bgcolor
		$footer_bg_color	 = craftcog_get_option( 'footer_bg_color' );
		$footer_bg_copyright = $footer_bg_color != '' ? '.copyright{background:' . $footer_bg_color . '}' : '';



		$copyright_text_color	 = craftcog_get_option( 'footer_text_color' );
		//custom css
		$custom_css				 = craftcog_get_option( 'custom_css' );
		$output					 = "h1, h2, h3, h4, h5, h6, .fw-special-title{ $global_title }"
		. ".fw-special-subtitle, .fw-contact-form-description, .team-member h5{ $global_subtitle }"
		. "body{ $body_font }.colorsbg, .separator, .separator-left, .separator, .preloader {background: $main_color;}"
		. ".service-icon:before {border-bottom: 30px solid $main_color;} $footer_widgets_background $footer_overlay $widget_text_color $top_bg_color $top_text_color $menu_bg_color $menu_text_color .copyright-info, .copyright p{color: $copyright_text_color;} $footer_bg_copyright "
		. "a.link-more.color,a:hover,ul.main-menu li ul li.current-menu-item a, 
		ul.main-menu li > ul.sub-menu > li:hover >a, .footer-widget ul.list-dash li a:hover, 
		#footer-menu li a:hover, #responsive-menu ul li a:hover, 
		.header-standard ul.navbar-nav > li.active > 
		a,.header-standard ul.navbar-nav > li:hover > a, .entry-header .entry-title a:hover
		{color: $secondary_color;}"
		. "a ,.download-btn i,.top-bar.solid-bg ul.top-menu li a:hover,
		.top-bar.solid-bg .top-social a:hover, ul.top-menu li a:hover,  
		.top-info .info-icon, .team-social-icons a:hover,
		.ts-testimonial-static .ts-testimonial-text:before,
		.latest-post .post-title a:hover, .team-social a:hover, 
		.plan.featured .btn, .footer-social ul li a:hover, .fw-accordion 
		.fw-accordion-title.accordion-head.ui-state-active, ul.list-dash li:before, 
		.ts-feature-info.icon-left .feature-icon, .section-title.border-left:before, 
		.job-box .job-info .desc strong, .post-meta a:hover, .post-meta-left a:hover, 
		.sidebar .widget ul li a:hover, .post-navigation span:hover, .post-navigation h3:hover,
		.post-navigation i, .post-navigation span:hover, .post-navigation h3:hover, 
		.sidebar ul li.active a, .sidebar ul li:hover a, 
		.ts-contact-info .ts-contact-icon
		{color: $main_color;}"
		.".section-title.border-left:before, .section-title:after,
		.sidebar .widget-title{border-color:$main_color;}"
		. ".btn-primary, .tp-custom-menu > li.current-menu-item > a,
		.tp-custom-menu > li:hover > a,#main-slide .carousel-indicators li.active,
		.owl-carousel.owl-theme .owl-nav [class*=owl-],
		.owl-theme .owl-dots .owl-dot.active span,
		#main-slide .carousel-indicators li:hover, 
		#main-slide .carousel-control i:hover, 
		.box-primary, .plan.featured, .quote-item .quote-text:before, 
		.quote-item-area .quote-thumb,#back-to-top .btn.btn-primary, 
		.sidebar .search-widget .input-group-btn i, 
		.fw-accordion .fw-accordion-title.accordion-head 
		.ui-icon:before,.finances-newsletter input[type=submit], .post-meta-date, 
		.pagination>.active>a, .pagination>.active>a:hover, .pagination>li>a:hover
		{background-color: $main_color;}"
		.".navbar-toggle{background-color: $secondary_color;}"
		. ".owl-carousel.featured-projects-slide.owl-theme .owl-nav>.disabled
		{background: rgba($color_hex, 0.48)}
		.section-title-vertical 
		.section-title{color:rgba($color_hex, 0.20)}
		.section-title-vertical 
		.section-title:after{border-bottom: 2px solid rgba($color_hex, 0.20)}"
		.".wpcf7-form .wpcf7-form-control.wpcf7-submit:hover{background: $others_color}"
		. "$custom_css";


		wp_add_inline_style( 'craftcog-style', $output );
	}
	wp_add_inline_script( 'craftcog-form-helpers', 'var adminAjax = "' . admin_url( 'admin-ajax.php' ) . '"' );
}

add_action( 'wp_enqueue_scripts', 'craftcog_action_tp_hook_css', 90 );


