<?PHP

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class TP_Partner_Widget extends Widget_Base {

    public function get_name() {
        return 'tp-partner';
    }

    public function get_title() {
        return esc_html__( 'CraftCog Partners', 'craftcog' );
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
                'label' => esc_html__('Partner Carousel', 'craftcog'),
            ]
        );

        $this->add_control(
            'logo_partner',
            [
                'label' => esc_html__('Partners\'s Logo', 'craftcog'),
                'type' => Controls_Manager::REPEATER,
                'default'   => [
                    'partner_image' => Utils::get_placeholder_image_src(),
                    'btn_link'  => '#',                    
                ],
                'fields' => [
                    [
                        'name'          => 'partner_logo',
                        'label'         => esc_html__( 'Partners\'s Logo', 'craftcog' ),
                        'type'          => Controls_Manager::MEDIA,
                        'default' => [
                                'url' => Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                    ],

                    [
                        'name'  =>  'btn_link',
                        'label' => esc_html__( 'Link', 'craftcog' ),
                        'type' => Controls_Manager::URL,
                        'placeholder' => esc_html__('http://themespry.com','craftcog' ),
                        'default' => [
                            'url' => '#',
                        ],
                    ],

                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) {
          $settings = $this->get_settings();
          $logos = $settings['logo_partner'];

          ?>
          <div class="brand-logo-active owl-carousel gray-bg ptb-130">
                <?php 
                    foreach ($logos as $logo) :

                    $btn_link = (! empty( $logo['btn_link']['url'])) ? $logo['btn_link']['url'] : '';
                    $btn_target = ( $logo['btn_link']['is_external']) ? '_blank' : '_self';

                    $image = $logo['partner_logo'];
                    $alt = get_post_meta($image['id'], '_wp_attachment_image_alt', true);

                    if(isset($image['url']) && !empty($image['url'])){
                        $image = $image['url'];
                    }
                ?>
                    <div class="single-logo">
                        <a href="<?php echo esc_url( $btn_link ); ?>" target="<?php echo esc_html( $btn_target ); ?>" >
                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($alt); ?>">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
          <?php
    }

    protected function _content_template() { }
}