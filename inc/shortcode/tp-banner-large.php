<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class TP_Large_Banner_Widget extends Widget_Base {

    public function get_name() {
        return 'tp-banner-large';
    }

    public function get_title() {
        return __( 'Craftcog Banner Large', 'craftcog' );
    }

    public function get_icon() {
        return 'fa fa-folder-open';
    }

    public function get_categories() {
        return [ 'craftcog-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab_style',
            [
                'label' => esc_html__('Craftcog Banner Large', 'craftcog'),
            ]
        );

        $this->add_control(
            'banner_tag',
            [
                'label' => esc_html__( 'Banner Tag', 'craftcog' ),
                'label_block'   => true,
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Banner Tag', 'craftcog' ),
                'placeholder' => esc_html__( 'Banner Tag', 'craftcog' ),
            ]
        );

        $this->add_control(
            'banner_heading',
            [
                'label' => esc_html__( 'Banner Heading', 'craftcog' ),
                'label_block'   => true,
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Banner Heading ', 'craftcog' ),
                'placeholder' => esc_html__( 'Banner Heading', 'craftcog' ),
            ]
        );

        $this->add_control(
            'banner_subheading',
            [
                'label' => esc_html__( 'Banner Sub Heading', 'craftcog' ),
                'label_block'   => true,
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Banner Sub Heading ', 'craftcog' ),
                'placeholder' => esc_html__( 'Banner Sub Heading', 'craftcog' ),
            ]
        );

        $this->add_control(
            'banner_image',
            [
                'label' => esc_html__( 'Banner Image', 'craftcog' ),
                'label_block'   => true,
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'banner_btn_text',
            [
                'label'         => __( 'Button Text', 'craftcog' ),
                'label_block'   => true,
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => __( 'View Collection', 'craftcog' ),
                'default'       => __( 'View Collection', 'craftcog' ),
            ]
        );

        $this->add_control(
            'banner_url',
            [
                'label'         => __( 'Banner Link', 'craftcog' ),
                'label_block'   => true,
                'type'          => Controls_Manager::URL,
                'placeholder' => esc_html__('http://themespry.com','craftcog' ),
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __('Banner Tag Styles', 'craftcog'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => __( 'Color', 'craftcog' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .banner-content-5 > h4 ' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Typography', 'craftcog' ),
                'selector' => '{{WRAPPER}} .banner-content-5 > h4',
            ]
        );

        $this->end_controls_section();

        //HEADING STYLES
        $this->start_controls_section(
            'section_heading',
            [
                'label' => __('Heading Styles', 'craftcog'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label'     => __( 'Color', 'craftcog' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .banner-content-5 > h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'label' => __( 'Typography', 'craftcog' ),
                'selector' => '{{WRAPPER}} .banner-content-5 > h2',
            ]
        );

        $this->end_controls_section();

        //SUBHEADING STYLES
        $this->start_controls_section(
            'section_subheading',
            [
                'label' => __('Sub Heading Styles', 'craftcog'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'subheading_color',
            [
                'label'     => __( 'Color', 'craftcog' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .banner-content-5 > h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subheading_typography',
                'label' => __( 'Typography', 'craftcog' ),
                'selector' => '{{WRAPPER}} .banner-content-5 > h3',
            ]
        );

        $this->end_controls_section();

        //SUBHEADING STYLES
        $this->start_controls_section(
            'section_button',
            [
                'label' => __('Button Styles', 'craftcog'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label'     => __( 'Color', 'craftcog' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .banner-btn' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .banner-btn:before' => 'background: {{VALUE}}  none repeat scroll 0 0;',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render( ) {

        $settings = $this->get_settings();

        $heading        = $settings['banner_heading'];
        $subheading     = $settings['banner_subheading'];
        $banner_tag     = $settings['banner_tag'];
        $banner_image   = $settings['banner_image'];
        $btn_text       = $settings['banner_btn_text'];
        $banner_link    = $settings['banner_url'];


        $target = ($banner_link['is_external']) ? '_blank' : '_self';
        ?>
        <div class="banner-wrapper overflow mb-30">
            <div class="banner-img">
                <?php if ( $banner_image['url'] != '' ) : ?>
                    <a href="<?php echo esc_url( $banner_link['url'] ); ?>" target="<?php echo esc_attr( $target ); ?>">
                        <img alt="image" src="<?php echo esc_url( $banner_image['url'] ); ?>">
                    </a>
                <?php endif; ?>
            </div>
            <div class="banner-content-5">
                <?php if ( $banner_tag  != '' ) : ?>
                    <h4><?php echo craftcog_kses( sprintf( $banner_tag, '<span>','</span>' ) ); ?></h4>
                <?php endif; ?>
                <?php if ( $heading != '' ) : ?>
                    <h2><?php echo esc_html( $heading ); ?></h2>
                <?php endif; ?>
                <?php if ( $subheading != '' ) : ?>
                    <h3><?php echo craftcog_kses( $subheading ); ?></h3>
                <?php endif; ?>

                <?php if ( $btn_text != '' ) : ?>
                    <a href="<?php echo esc_url( $banner_link['url'] ); ?>" target="<?php echo esc_attr( $target ); ?>" class="banner-btn"><?php echo esc_html( $btn_text ); ?></a>
                <?php endif; ?>
            </div>
        </div>

        <?php

    }

    protected function _content_template() { }
}
?>