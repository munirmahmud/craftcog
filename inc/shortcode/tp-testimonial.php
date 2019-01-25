<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class TP_Testimonial_Widget extends Widget_Base {

    public function get_name() {
        return 'tp-testimonial';
    }

    public function get_title() {
        return esc_html__( 'CraftCog Testimonial', 'craftcog' );
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return [ 'craftcog-elements' ];
    }

    protected function _register_controls() {
        
        $this->start_controls_section(
            'section_tab_style',
            [
                'label' => esc_html__('CraftCog Testimonial', 'craftcog'),
            ]
        );

        $this->add_control(
            'testimonial',
            [
                'label' => esc_html__('Testimonial', 'craftcog'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [
                        'client_name' => esc_html__('John Doe', 'craftcog'),
                        'review' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim quis exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.', 'craftcog'),
                        'designation' => 'CEO, Pranklin Agency',
                        'image' => Utils::get_placeholder_image_src(),
                    ],
                    [
                        'client_name' => esc_html__('David Pallal', 'craftcog'),
                        'review' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim quis exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.', 'craftcog'),
                        'designation' => 'Managing Directory, Pranklin Agency',
                        'image' => Utils::get_placeholder_image_src(),
                    ],
                    [
                        'client_name' => esc_html__('John Doe', 'craftcog'),
                        'review' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim quis exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.', 'craftcog'),
                        'designation' => 'Senior Developer, Pranklin Agency',
                        'image' => Utils::get_placeholder_image_src(),
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'client_name',
                        'label' => esc_html__('Client Name', 'craftcog'),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                    ],

                    [
                        'name' => 'designation',
                        'label' => esc_html__('Designation', 'craftcog'),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                    ], 

                    [
                        'name' => 'image',
                        'label' => esc_html__('Image', 'craftcog'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                    ],

                    [
                        'name' => 'review',
                        'label' => esc_html__('Testimonial', 'craftcog'),
                        'type' => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                    ],               
                ],
                
                'title_field' => '{{{ client_name }}}',
            ]
        );

        $this->end_controls_section();        

        $this->start_controls_section(
            'section_name_style',
            [
                'label' => esc_html__('Name', 'craftcog'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => esc_html__( 'Color', 'craftcog' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial > h4 ' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'label' => esc_html__( 'Typography', 'craftcog' ),
                'selector' => '{{WRAPPER}} .single-testimonial > h4',
            ]
        );
        $this->end_controls_section();        


        $this->start_controls_section(
            'section_testimonial_style',
            [
                'label' => esc_html__('Testimonial', 'craftcog'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'tetimonial_color',
            [
                'label' => esc_html__( 'Color', 'craftcog' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial > p' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'testimonial_typography',
                'label' => esc_html__( 'Typography', 'craftcog' ),
                'selector' => '{{WRAPPER}} .single-testimonial > p',
            ]
        );
        $this->end_controls_section();   
        
        
        $this->start_controls_section(
            'section_designation_style',
            [
                'label' => esc_html__('Designation', 'craftcog'),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'designation_color',
            [
                'label' => esc_html__( 'Color', 'craftcog' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial > span' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'designation_typography',
                'label' => esc_html__( 'Typography', 'craftcog' ),
                'selector' => '{{WRAPPER}} .single-testimonial > span',
            ]
        );
        $this->end_controls_section(); 

    }

    protected function render( ) {

        $settings = $this->get_settings();

        $testimonials = $settings['testimonial'];

if( !empty($testimonials) && is_array( $testimonials ) ): ?>

<div class="testimonial-active owl-carousel pt-130 pb-125 gray-bg">
    <?php
        foreach($testimonials as $testimonial):

        if($testimonial['image'] != ''){
            $img = tp_img_resize($testimonial['image']['id'] , 45,44,true);
        }
        $alt = get_post_meta($testimonial['image']['id'], '_wp_attachment_image_alt', true);
    ?>
    <div class="single-testimonial text-center">
        <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($alt); ?>">

        <?php if( !empty($testimonial['review']) ) : ?>
            <p><?php echo esc_html( $testimonial['review'] ); ?></p>
        <?php endif; ?>                
        <div class="testimonial-icon">
            <i class="ti-direction-alt"></i>
        </div>
        <?php if( !empty($testimonial['client_name']) ) : ?>
        <h4><?php echo esc_html( $testimonial['client_name'] ); ?> </h4>
        <?php endif; ?>

        <?php if( !empty($testimonial['designation']) ) : ?>
            <span><?php echo esc_html( $testimonial['designation'] ); ?></span>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
</div>
<?php endif; ?>

        <?php

    }

    protected function _content_template() { }
}