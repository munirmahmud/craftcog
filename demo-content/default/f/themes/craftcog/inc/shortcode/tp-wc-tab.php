<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class TP_Woo_Tab_Widget extends Widget_Base {

  public $base;

    public function get_name() {
        return 'tp-woo-tab';
    }

    public function get_title() {
        return esc_html__( 'Product Tab', 'craftcog' );
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
                'label' => esc_html__('Craftcog Products', 'craftcog'),
            ]
        );

        $this->add_control(
          'product_count',
          [
            'label'         => esc_html__( 'Product count', 'craftcog' ),
            'type'          => Controls_Manager::NUMBER,
            'default'       => esc_html__( '3', 'craftcog' ),
          ]
        );

        $this->add_control(
            'product_tab',
            [
                'label' =>esc_html__('Product', 'craftcog'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'product_title' =>esc_html__('On Sell', 'craftcog'),
                        'product_content' => 'on_sell',
                    ],

                    [
                        'product_title' =>esc_html__('Hot Sell', 'craftcog'),
                        'product_content' =>'featured',
                    ],

                    [
                        'product_title' =>esc_html__('Trend', 'craftcog'),
                        'product_content' =>'recent',
                    ],

                    [
                        'product_title' =>esc_html__('Best Sell', 'craftcog'),
                        'product_content' =>'best_sell',
                    ],

                    [
                        'product_title' =>esc_html__('Top Categories', 'craftcog'),
                        'product_content' =>'tp_category',
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'product_title',
                        'label' =>esc_html__('Title', 'craftcog'),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                    ],

                    [
                        'name' => 'product_content',
                        'label' =>esc_html__('Product Attribute', 'craftcog'),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 'recent',
                        'options'   => [
                            'recent'     => esc_html__( 'Recent Product', 'craftcog' ),
                            'featured'     => esc_html__( 'Featured Product', 'craftcog' ),
                            'best_sell'     => esc_html__( 'Popular Product', 'craftcog' ),
                            'on_sell'     => esc_html__( 'Sale Product', 'craftcog' ),
                            'xs_product'     => esc_html__( 'Product', 'craftcog' ),
                        ],
                    ],
                    [
                        'name' => 'product_ids',
                        'label' => esc_html__( 'Select Product', 'craftcog' ),
                        'type' => Controls_Manager::SELECT2,
                        'options' => craftcog_wc_get_product_list(),
                        'multiple' => true,
                        'condition' => [
                            'product_content' => 'xs_product',
                        ],
                    ],

                ],

                'title_field' => '{{{ product_title }}}',
            ]
        );

        $this->end_controls_section();


        // Product Tab Styles
        $this->start_controls_section(
            'section_style', [
                'label'  =>esc_html__( 'Style', 'craftcog' ),
                'tab'    => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'tab_title_color', [
                'label'      =>esc_html__( 'Tab Title color', 'craftcog' ),
                'type'       => Controls_Manager::COLOR,
                'selectors'  => [
                    '{{WRAPPER}} .tp-nav-tab .nav-link' => 'color: {{VALUE}};'
                ],
            ]
        );
        $this->add_control(
            'tab_title_hover_color', [
                'label'      =>esc_html__( 'Tab Title Active & Hover color', 'craftcog' ),
                'type'       => Controls_Manager::COLOR,
                'selectors'  => [
                    '{{WRAPPER}} .tp-nav-tab .nav-link.active, .tp-nav-tab .nav-link:hover' => 'color: {{VALUE}};'
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'       => 'tab_title_typography',
                'selector'   => '{{WRAPPER}} .tp-nav-tab .nav-item .nav-link',
            ]
        );
        $this->add_control(
            'tab_title_padding',
            [
                'label' => esc_html__( 'Tab Margin Right', 'craftcog' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => '',
                ],

                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .tp-nav-tab .nav-item' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__( 'Alignment', 'craftcog' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'craftcog' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'craftcog' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'craftcog' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tp-product-wraper' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'margin',
            [
                'label' => esc_html__( 'Border Width', 'craftcog' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .tp-product-widget' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .tp-product-wraper' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__( 'Border Color', 'craftcog' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-product-wraper' => 'border-color: {{VALUE}}; border-style: solid',
                ],
            ]
        );

        $this->add_control(
            'item_margin_bottom',
            [
                'label' => esc_html__( 'Product Margin Bottom', 'craftcog' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .tp-product-wraper.tab-style1' => 'margin-bottom: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'padding',
            [
                'label' => esc_html__( 'Padding', 'craftcog' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px'],
                'selectors' => [
                    '{{WRAPPER}} .tp-product-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .tp-product-wraper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render( ) {
      $settings = $this->get_settings();

        $product_count = $settings['product_count'];
        $product_tab = $settings['product_tab'];

        require CRAFTCOG_SHORTCODE_STYLE_DIR.'/tab/product-tab.php';

    }

    protected function _content_template() { }
}