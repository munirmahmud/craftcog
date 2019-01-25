<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class TP_Small_Banner_Widget extends Widget_Base {

    public function get_name() {
        return 'tp-banner';
    }

    public function get_title() {
        return __( 'Craftcog Banner', 'craftcog' );
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
                'label' => esc_html__('Craftcog Banner', 'craftcog'),
            ]
        );


        $this->add_control(
            'product_banner',
            [
                'label' => __('Small Banners', 'craftcog'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'banner_name'         => __('Banner Name', 'craftcog'),
                    ],
                ],
                'fields' => [
                    [
                        'name'          => 'banner_img_position',
                        'label'         => __( 'Banner Position', 'craftcog' ),
                        'type'          => \Elementor\Controls_Manager::SWITCHER,
                        'label_on'      => __( 'Right', 'craftcog' ),
                        'label_off'     => __( 'Left', 'craftcog' ),
                        'return_value'  => 'yes',
                        'default'       => 'no',
                    ],

                    [
                        'name'          => 'banner_name',
                        'label'         => __('Featured Category Product', 'craftcog'),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => __('30% Discount Products', 'craftcog'),
                        'label_block'   => true,
                    ],
                    [
                        'name'          => 'banner_subheading',
                        'label'         => __('Banner Subheading', 'craftcog'),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => __('Don\'t miss', 'craftcog'),
                        'label_block'   => true,
                    ],

                    [
                        'name'          => 'banner_img',
                        'label'         => __('Banner Image', 'craftcog'),
                        'type'          => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],

                    [
                        'name'          => 'banner_url',
                        'label'         => __('Banner URL', 'craftcog'),
                        'type'          => Controls_Manager::URL,
                        'placeholder'   => __('http://themespry.com/', 'craftcog'),
                        'label_block'   => true,
                    ],

                    [
                        'name'          => 'middle_banner',
                        'label'         => __( 'Middle Banner', 'craftcog' ),
                        'type'          => \Elementor\Controls_Manager::SWITCHER,
                        'label_on'      => __( 'Yes', 'craftcog' ),
                        'label_off'     => __( 'No', 'craftcog' ),
                        'return_value'  => 'yes',
                        'default'       => 'yes',
                    ],

                ],

                'title_field' => '{{{ banner_name }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_title_style',
            [
                'label' => __('Title Styles', 'craftcog'),
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
                    '{{WRAPPER}} .banner-content-style1 > h2 ' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'highlighted_color',
            [
                'label'     => __( 'Hightlight Keyword Color', 'craftcog' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .banner-content-style1 > h2 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Typography', 'craftcog' ),
                'selector' => '{{WRAPPER}} .banner-content-style1 > h2',
            ]
        );

        $this->end_controls_section();

        //SUBHEADING STYLES
        $this->start_controls_section(
            'section_subheading',
            [
                'label' => __('Subheading Styles', 'craftcog'),
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
                    '{{WRAPPER}} .banner-content-style2 > h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subheading_typography',
                'label' => __( 'Typography', 'craftcog' ),
                'selector' => '{{WRAPPER}} .banner-content-style2 > h3',
            ]
        );

        $this->end_controls_section();

    }

    protected function render( ) {

        $settings = $this->get_settings();

        $banner_items = $settings[ 'product_banner' ];

        if( is_array( $banner_items ) && !empty( $banner_items ) ) :

            foreach ( $banner_items as $banner_item ) :

            $banner_name  = $banner_item['banner_name'];
            $subheading = $banner_item['banner_subheading'];
            $banner_img  = $banner_item['banner_img'];
            $banner_link = $banner_item['banner_url'];
            $target = ($banner_link['is_external']) ? '_blank' : '_self';

            $banner_position = $banner_item['banner_img_position'];
            $middle_banner = $banner_item['middle_banner'];

            if ( $middle_banner == 'yes' ) :
            ?>
                <div class="banner-wrapper mrg-mb-md">
                    <?php if ( $banner_img != '' ) : ?>
                        <div class="banner-img">
                            <a href="<?php echo esc_url( $banner_link['url'] ); ?>" target="<?php echo esc_attr( $target ); ?>"><img src="<?php echo esc_url( $banner_img['url'] ); ?>" alt="image"></a>
                        </div>
                    <?php endif; ?>

                    <?php if ( $banner_name != '' ) : ?>
                        <div class="banner-content-style3 banner-position-top">
                            <h3><?php echo craftcog_kses( sprintf( $banner_name, '<span>','</span>' ) ); ?></h3>
                        </div>
                    <?php endif; ?>
                    <?php if ( $subheading != '' ) : ?>
                        <div class="banner-content-style4 banner-position-bottom">
                            <h3><?php echo esc_html( $subheading ); ?></h3>
                        </div>
                    <?php endif; ?>
                </div>
            <?php else : ?>
            <div class="banner-wrapper banner-border ml-10 mb-30">
                <?php if ( $banner_img != '' ) : ?>
                <div class="banner-img">
                    <a href="<?php echo esc_url( $banner_link['url'] ); ?>" target="<?php echo esc_attr( $target ); ?>"><img src="<?php echo esc_url( $banner_img['url'] ); ?>" alt="image"></a>
                </div>
                <?php endif; ?>

                <?php if ( $banner_position == 'yes' ) : ?>
                <div class="banner-content-style1 banner-position-center-right">
                    <?php else : ?>
                <div class="banner-content-style2 banner-position-center-left">
                <?php endif; ?>

                    <?php if ( $subheading != '' ) : ?>
                        <h3><?php echo esc_html( $subheading ); ?></h3>
                    <?php endif; ?>
                    <?php if ( $banner_name != '' ) : ?>
                        <h2><?php echo craftcog_kses( sprintf( $banner_name, '<span>','</span>' ) ); ?></h2>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; endforeach; ?>
        <?php endif; ?>

        <?php

    }

    protected function _content_template() { }
}
?>