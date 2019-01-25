<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class TP_Elementor_Shortcode{

	/**
     * Holds the class object.
     *
     * @since 1.0
     *
     */
	public static $_instance;

	/**
     * Load Construct
     * 
     * @since 1.0
     */

	public function __construct(){

		add_action('elementor/init', array($this, 'tp_elementor_init'));
        add_action('elementor/widgets/widgets_registered', array($this, 'tp_shortcode_elements'));
        add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}


    /**
     * Enqueue Scripts
     *
     * @return void
     */
    
     public function enqueue_scripts() {
        wp_enqueue_script( 'tp-elementor', CRAFTCOG_SCRIPTS . '/elementor.js',array( 'jquery', 'elementor-frontend' ), CRAFTCOG_VERSION, true );
    }

    
	/**
     * Elementor Initialization
     *
     * @since 1.0
     *
     */

    public function tp_elementor_init(){
        \Elementor\Plugin::$instance->elements_manager->add_category(
            'craftcog-elements',
            [
                'title' => esc_html__( 'CraftCog', 'craftcog' ),
                'icon' => 'fa fa-plug',
            ],
            1
        );
    }

    public function tp_shortcode_elements($widgets_manager){
        require_once CRAFTCOG_SHORTCODE_DIR . '/tp-slider.php';
        require_once CRAFTCOG_SHORTCODE_DIR . '/tp-banner.php';
        require_once CRAFTCOG_SHORTCODE_DIR . '/tp-heading.php';
        require_once CRAFTCOG_SHORTCODE_DIR . '/tp-banner-large.php';
        require_once CRAFTCOG_SHORTCODE_DIR . '/tp-blog.php';
        require_once CRAFTCOG_SHORTCODE_DIR . '/tp-wc-product.php';
        require_once CRAFTCOG_SHORTCODE_DIR . '/tp-wc-tab.php';
        require_once CRAFTCOG_SHORTCODE_DIR . '/tp-wc-promotional-carousel.php';
        require_once CRAFTCOG_SHORTCODE_DIR . '/tp-testimonial.php';
        require_once CRAFTCOG_SHORTCODE_DIR . '/tp-team.php';
        require_once CRAFTCOG_SHORTCODE_DIR . '/tp-partner.php';
        require_once CRAFTCOG_SHORTCODE_DIR . '/tp-contact-info.php';


        $widgets_manager->register_widget_type(new Elementor\TP_Slider_Widget());
        $widgets_manager->register_widget_type(new Elementor\TP_Small_Banner_Widget());
        $widgets_manager->register_widget_type(new Elementor\TP_Large_Banner_Widget());
        $widgets_manager->register_widget_type(new Elementor\TP_Heading_Widget());
        $widgets_manager->register_widget_type(new Elementor\TP_Post_Widget());
        $widgets_manager->register_widget_type(new Elementor\TP_Post_Widget());
        $widgets_manager->register_widget_type(new Elementor\TP_Testimonial_Widget());
        $widgets_manager->register_widget_type(new Elementor\TP_Team_Widget());
        $widgets_manager->register_widget_type(new Elementor\TP_Partner_Widget());
        $widgets_manager->register_widget_type(new Elementor\TP_Widget_Contact_Info());

        //WooCommerce
        $widgets_manager->register_widget_type(new Elementor\TP_Woo_Product_Widget());
        $widgets_manager->register_widget_type(new Elementor\TP_Woo_Carousel_Widget());
        $widgets_manager->register_widget_type(new Elementor\TP_Woo_Tab_Widget());

    }
    
	public static function tp_get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new TP_Elementor_Shortcode();
        }
        return self::$_instance;
    }

}
$tp_el_shortcode = TP_Elementor_Shortcode::tp_get_instance();
