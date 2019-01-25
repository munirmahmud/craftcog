<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class TP_Woo_Product_Widget extends Widget_Base {

    public $base;

    public function get_name() {
        return 'tp-woo-product';
    }

    public function get_title() {
        return esc_html__( 'CraftCog Product', 'craftcog' );
    }

    public function get_icon() {
        return 'eicon-tabs';
    }

    public function get_categories() {
        return [ 'craftcog-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Products', 'craftcog'),
            ]
        );

        $this->add_control(
            'products_per_row',
            [
                'label'   => __( 'Products Per Row', 'craftcog' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => '3',
                'options'   => [
                    'item1'     => __( '1', 'craftcog' ),
                    'item2'     => __( '2', 'craftcog' ),
                    'item3'     => __( '3', 'craftcog' ),
                    'item4'     => __( '4', 'craftcog' ),
                ],
            ]
        );

        $this->add_control(
            'product_type',
            [
                'label' =>esc_html__('Product Type', 'craftcog'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'recent',
                'options'   => [
                    'recent'     	=> esc_html__( 'Recent Product', 'craftcog' ),
                    'featured'      => esc_html__( 'Featured Product', 'craftcog' ),
                    'best_sell'     => esc_html__( 'Popular Product', 'craftcog' ),
                    'on_sale'     	=> esc_html__( 'Sale Product', 'craftcog' ),
                    'tp_product'    => esc_html__( 'Product', 'craftcog' ),
                ],
            ]
        );
        $this->add_control(
            'product_ids',
            [
                'label' 		=> esc_html__( 'Select Product', 'craftcog' ),
                'type' 			=> Controls_Manager::SELECT2,
                'options' 		=> craftcog_wc_get_product_list(),
                'multiple' 		=> true,
                'condition' 	=> [
                        'product_type' => 'tp_product',
                ],
            ]
        );
        $this->add_control(
            'product_count',
            [
                'label'   => esc_html__( 'Product Count', 'craftcog' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 4,
            ]
        );
        
        $this->end_controls_section();


        // Product Background Style
        $this->start_controls_section(
            'section_general_style', [
                'label' 	=> esc_html__('General', 'craftcog'),
                'tab' 		=> Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'product_bg',
            [
                'label'         => esc_html__( 'Product Background', 'craftcog' ),
                'type'          => Controls_Manager::COLOR,
                'default'       => '#F0F1F5',
                'selectors'     => [
                    '{{WRAPPER}} .product-img' => 'background-color: {{VALUE}}',
                ]
            ]
        );
        $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();
        
        $product_type = $settings['product_type'];
        $product_count = $settings['product_count'];
        $items_in_row = $settings['products_per_row'];

        if(!empty($settings['product_ids'])){
            $product_ids = implode(',',$settings['product_ids']);
        }

        $args = array(
            'post_type'         => array('product'),
            'post_status'       => array('publish'),
            'posts_per_page'	=> $product_count,
        );

        if($product_type == 'featured'){
            $args['tax_query'][] = array(
                'taxonomy'         => 'product_visibility',
                'terms'            => 'featured',
                'field'            => 'name',
                'operator'         => 'IN',
                'include_children' => false,
            );
        }
        elseif($product_type == 'best_sell'){
            $args['meta_key']  = 'total_sales';
            $args['orderby'] = 'meta_value_num';
        }
        elseif($product_type == 'on_sale'){
            $args['meta_query'] = array(
                array(
                    'key' => '_sale_price',
                    'value' => '',
                    'compare' => '!='
                ),
            );
        }
        elseif($product_type == 'tp_product'){
            $args['post__in'] = explode(',', $product_ids);
            /*$args = array(
                'orderby' => 'none',
                'order'   => 'DESC',
            );*/
            $args['orderby'] = 'modified';
        }
        $tp_query = new \WP_Query( $args );
        $post_count = $tp_query->post_count;


        require CRAFTCOG_SHORTCODE_DIR . '/style/products/style-collection.php';

    }

    protected function _content_template() { }
}