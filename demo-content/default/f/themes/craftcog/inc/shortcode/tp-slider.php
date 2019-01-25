<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class TP_Slider_Widget extends Widget_Base {

    public function get_name() {
        return 'tp-slider';
    }

    public function get_title() {
        return esc_html__( 'Craftcog Slider', 'craftcog' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }

    public function get_categories() {
        return [ 'craftcog-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Craftcog Slider', 'craftcog'),
            ]
        );

        $this->add_control(
            'sliders',
            [
                'label' => esc_html__('Slider', 'craftcog'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'title' => esc_html__('Slider Title', 'craftcog'),
                        'description' => esc_html__('Allow our team of beauty specialists to help you prepare for your wedding and enhance your special.', 'craftcog'),
                        'btn_label_one' => esc_html__('Learn More', 'craftcog'),
                    ],

                    [
                        'title' => esc_html__('Slider Title', 'craftcog'),
                        'description' => esc_html__('Allow our team of beauty specialists to help you prepare for your wedding and enhance your special.', 'craftcog'),
                        'btn_label_one' => esc_html__('Learn More', 'craftcog'),
                    ],

                    [
                        'title' => esc_html__('Slider Title', 'craftcog'),
                        'description' => esc_html__('Allow our team of beauty specialists to help you prepare for your wedding and enhance your special.', 'craftcog'),
                        'btn_label_one' => esc_html__('Learn More', 'craftcog'),
                    ],
                ],
                'fields' => [

                    [
                        'name'          => 'title',
                        'label'         => esc_html__('Title', 'craftcog'),
                        'label_block'   => true,
                        'type'          => Controls_Manager::TEXT,
                    ],

                    [
                        'name' => 'description',
                        'label' => esc_html__('Description', 'craftcog'),
                        'type' => Controls_Manager::TEXTAREA,
                    ],

                    [
                        'name' => 'btn_label',
                        'label' => esc_html__('Button Label', 'craftcog'),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'   => esc_html__('LEARN MORE', 'craftcog'),
                    ],

                    [
                        'name'  =>  'btn_link',
                        'label' => esc_html__( 'Link', 'craftcog' ),
                        'type' => Controls_Manager::URL,
                        'placeholder' => esc_html__('http://your-link.com','craftcog' ),
                        'default' => [
                            'url' => '',
                        ],
                    ],

                    [
                        'name' => 'slider_bg_color',
                        'label' => esc_html__('Background Color', 'craftcog'),
                        'type' => Controls_Manager::COLOR,
                        'default'   => '#f0f1f5',
                    ],

                    [
                        'name' => 'small_image',
                        'label' => esc_html__('Small Image', 'craftcog'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                    ],

                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        //Title Style
        $this->start_controls_section(
            'slider_title_style',
            [
                'label'     => esc_html__( 'Title', 'craftcog' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'slider_title_color', [
                'label'		 => esc_html__( 'Color', 'craftcog' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .slider-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'highlight_title_color', [
                'label'		 => esc_html__( 'Highlight Keyword Color', 'craftcog' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .slider-content h2 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'craftcog' ),
                'selector' => '{{WRAPPER}} .slider-content h2',
            ]
        );
        $this->end_controls_section();


        //SLIDER DESCRIPTION
        $this->start_controls_section(
            'slider_description',
            [
                'label'     => esc_html__( 'Description', 'craftcog' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'slider_desc_color', [
                'label'		 => esc_html__( 'Color', 'craftcog' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .slider-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'label' => esc_html__( 'Typography', 'craftcog' ),
                'selector' => '{{WRAPPER}} .slider-content p',
            ]
        );

        $this->end_controls_section();


        //SLIDER BUTTON
        $this->start_controls_section(
            'slider_button',
            [
                'label'     => esc_html__( 'Button Styles', 'craftcog' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'slider_btn_color', [
                'label'		 => esc_html__( 'Button Label Color', 'craftcog' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} a.slider-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'slider_btn_hover_color', [
                'label'		 => esc_html__( 'Button Label Color', 'craftcog' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} a.slider-btn:hover' => 'color: {{VALUE}}', 'a.slider-btn:hover:before' => 'background: {{VALUE}} none repeat scroll 0 0;',

                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();

        $sliders = $settings['sliders'];

        require CRAFTCOG_SHORTCODE_STYLE_DIR . '/slider/style.php';
    }

    protected function _content_template() { }
}
?>