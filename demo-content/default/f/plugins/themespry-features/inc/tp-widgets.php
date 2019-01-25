<?php
function tp_themes_footer_widgets() {

    register_sidebar( array(
    'name'			 => esc_html__( 'Footer Widget Top', 'seobin' ),
    'id'			 => 'footer-widget-top',
    'description'	 => esc_html__( 'Widgets for first footer area', 'seobin' ),
    'before_widget'	 => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'	 => '</div>',
    'before_title'	 => '<h3 class="widget-title">',
        'after_title'	 => '</h3>',
    ) );

    register_sidebar( array(
    'name'			 => esc_html__( 'Footer 2', 'seobin' ),
    'id'			 => 'footer-2',
    'description'	 => esc_html__( 'Widgets for second footer area', 'seobin' ),
    'before_widget'	 => '<div id="%1$s" class="footer-widget %2$s"><div class="col-md-12">',
            'after_widget'	 => '</div></div>',
    'before_title'	 => '<h3 class="widget-title">',
        'after_title'	 => '</h3>',
    ) );

    register_sidebar( array(
    'name'			 => esc_html__( 'Footer 3', 'seobin' ),
    'id'			 => 'footer-3',
    'description'	 => esc_html__( 'Widgets for 3rd footer area', 'seobin' ),
    'before_widget'	 => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'	 => '</div>',
    'before_title'	 => '<h3 class="widget-title">',
        'after_title'	 => '</h3><span class="animate-border border-black"></span>',
    ) );

    register_sidebar( array(
    'name'			 => esc_html__( 'Footer 4', 'seobin' ),
    'id'			 => 'footer-4',
    'description'	 => esc_html__( 'Widgets for 4th footer area', 'seobin' ),
    'before_widget'	 => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'	 => '</div>',
    'before_title'	 => '<h3 class="widget-title">',
        'after_title'	 => '</h3><span class="animate-border border-black"></span>',
    ) );
}


