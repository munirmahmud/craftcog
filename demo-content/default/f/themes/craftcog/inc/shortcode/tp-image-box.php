<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class TP_Image_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'tp-craftcog-image-box';
    }

    public function get_title() {
        return esc_html__( 'CraftCog Image Box', 'craftcog' );
    }

    public function get_icon() {
        return 'eicon-insert-image';
    }

    public function get_categories() {
        return [ 'craftcog-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('CraftCog Image Box', 'craftcog'),
            ]
        );

        $this->add_control(

            'style', [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Choose Style', 'craftcog'),
                'default' => 'style1',
                'options' => [
                    'style1' => esc_html__('Style 1', 'craftcog'),
                    'style2' => esc_html__('Style 2', 'craftcog'),
                    'style3' => esc_html__('Style 3', 'craftcog'),
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__( 'Front Image', 'craftcog' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'title',
            [
                'label'         => esc_html__( 'Title', 'craftcog' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'placeholder'   => esc_html__( 'Add title', 'craftcog' ),
                'default'       => esc_html__( 'Add Title', 'craftcog' ),
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'craftcog' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__( 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'craftcog' ),
                'condition' => [
                    'style'   =>  ['style1', 'style2'],
                ],
            ]
        );

        $this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Label', 'craftcog' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'craftcog' ),
				'placeholder' => esc_html__( 'Read More', 'craftcog' ),
                'condition' => [
                    'style'   =>  ['style1', 'style2'],
                ],
			]
		);

		$this->add_control(
			'btn_link',
			[
				'label' => esc_html__( 'Link', 'craftcog' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__('http://your-link.com','craftcog' ),
				'default' => [
					'url' => '#',
				],
                'condition' => [
                    'style'   =>  ['style1', 'style2'],
                ],
			]
		);


        $this->end_controls_section();

        /**
		 *
		 *Title Style
		 *
		*/

        $this->start_controls_section(
			'section_title_tab',
			[
				'label' => esc_html__( 'Title', 'craftcog' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'craftcog' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .features-box h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .tw-service-features-box h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .tw-award-box h3' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
            'title_hover_color',
            [
                'label' => esc_html__( 'Title Hover Color', 'craftcog' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tw-award-box:hover h3' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Typography', 'craftcog' ),
				'selectors' => '{{WRAPPER}} .features-box h3, .tw-service-features-box h3',
			]
		);

		$this->end_controls_section();


		/**
		 *
		 *Sub Title Style
		 *
		*/

        $this->start_controls_section(
			'section_sub_title_tab',
			[
				'label' => esc_html__( 'Sub Title', 'craftcog' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sub_title_color',
			[
				'label' => esc_html__( 'Color', 'craftcog' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .features-box p ' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sub_title_typography',
				'label' => esc_html__( 'Typography', 'craftcog' ),
				'selector' => '{{WRAPPER}} .features-box p',
			]
		);


		$this->end_controls_section();

    }

    protected function render( ) {
    	
        $settings = $this->get_settings();
        $image = $settings['image'];
        $title = $settings['title'];
        $sub_title = $settings['sub_title'];
        $btn_text = $settings['btn_text'];
		$btn_link = (! empty( $settings['btn_link']['url'])) ? $settings['btn_link']['url'] : '';
		$btn_target = ( $settings['btn_link']['is_external']) ? '_blank' : '_self';

        $style = $settings['style'];

        switch ($style) {
            case 'style1':
                require CRAFTCOG_SHORTCODE_STYLE_DIR .'/box-style/style1.php';
                break;

            case 'style2':
                require CRAFTCOG_SHORTCODE_STYLE_DIR .'/box-style/style2.php';
                break;

            case 'style3':
                require CRAFTCOG_SHORTCODE_STYLE_DIR .'/box-style/style3.php';
                break;
        }

    }



    protected function _content_template() { }
}