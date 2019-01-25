<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class TP_Team_Widget extends Widget_Base {

    public function get_name() {
        return 'tp-team';
    }

    public function get_title() {
        return esc_html__( 'CraftCog Team', 'craftcog' );
    }

    public function get_icon() {
        return 'fa fa-user-o';
    }

    public function get_categories() {
        return [ 'craftcog-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('CraftCog Team', 'craftcog'),
            ]
        );

        $this->add_control(

            'member_name', 
            [
                'label' => esc_html__('Member\'s Name', 'craftcog'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Zoe Jones', 'craftcog'),
                
            ]
        );

        $this->add_control(

            'member_designation', 
            [
                'label' => esc_html__('Designation', 'craftcog'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Director', 'craftcog'),
                
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__( 'Member\'s  Photograph', 'craftcog' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image',
                'label' => esc_html__( 'Image Size', 'craftcog' ),
                'default' => 'full',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_title_style',
            [
                'label'     => esc_html__( 'Team Style', 'craftcog' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'member_name_color',
            [
                'label'     => esc_html__( 'Name color', 'craftcog' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-content > h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'member_pos_color',
            [
                'label'     => esc_html__( 'Designation color', 'craftcog' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-content > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) {

        $settings = $this->get_settings();

        $member_name = $settings['member_name'];
        $member_position = $settings['member_designation'];
        ?>

        <div class="team-wrapper mb-30">
            <div class="team-img">
            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings); ?>
            </div>
            <div class="team-content">
                <?php if( !empty($member_name)) : ?>
                    <h4><?php echo esc_html( $member_name ); ?></h4>
                <?php endif; ?>

                <?php if (!empty($member_position)) : ?>
                    <span><?php echo esc_html( $member_position ); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }

    protected function _content_template() { }
}