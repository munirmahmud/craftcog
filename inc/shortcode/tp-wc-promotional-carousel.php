<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class TP_Woo_Carousel_Widget extends Widget_Base {

    public $base;

    public function get_name() {
        return 'tp-woo-carousel';
    }

    public function get_title() {
        return esc_html__( 'Promotional Carousel', 'craftcog' );
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
                'label' => esc_html__('Promotion element', 'craftcog'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'heading_title', [
                'type' => \Elementor\Controls_Manager::TEXT,
                'default'   	=> __('Buy One Get One', 'craftcog'),
                'label_block' => true,
                'label' 		=> __('Heading Title', 'craftcog'),
            ]
        );

        $repeater->add_control(
            'carousel_image', [
                'label' 		=> __('Upload Carousel Image', 'craftcog'),
                'type'          => \Elementor\Controls_Manager::MEDIA,
                'default'       => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'label_block' 	=> true,
            ]
        );

        $repeater->add_control(
            'button_text', [
                'label' 		=> __('Button Text', 'craftcog'),
                'type' 			=> Controls_Manager::TEXT,
                'label_block' 	=> true,
                'default'   	=> __('Shop Now', 'craftcog'),
            ]
        );

        $repeater->add_control(
            'button_url', [
                'label' 		=> __('Button URL', 'craftcog'),
                'type' 			=> Controls_Manager::URL,
                'label_block' 	=> true,
                'placeholder'   => __('http://themespry.com', 'craftcog'),
            ]
        );

        $this->add_control(
            'promotional_carousel',
            [
                'label' => __( 'Carousel Elements', 'craftcog' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'heading_title' => __( 'Buy One Get One', 'craftcog' ),
                    ],
                    [
                        'heading_title' => __( 'Black Friday\'s Offer', 'craftcog' ),
                    ],
                ],
                'title_field' => '{{{ heading_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style', [
                'label'	 =>esc_html__( 'Style', 'craftcog' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color', [
                'label'		 =>esc_html__( 'Title color', 'craftcog' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .new-collection-content > h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'		 => 'title_typography',
                'label'		 =>esc_html__( 'Title Typography', 'craftcog' ),
                'selector'	 => '{{WRAPPER}} .new-collection-content > h2',
            ]
        );

        $this->add_control(
            'button_text_color', [
                'label'		 =>esc_html__( 'Button Text color', 'craftcog' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .btn-style' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color', [
                'label'		 =>esc_html__( 'Button Background color', 'craftcog' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .btn-style' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_color', [
                'label'		 =>esc_html__( 'Button Hover color', 'craftcog' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .btn-style:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();
        
        $promotional_items = $settings['promotional_carousel'];

if( is_array( $promotional_items ) && ! empty( $promotional_items ) ) :
?>

    <div class="new-collection-slider owl-carousel mb-30">

		<?php
			foreach ($promotional_items as $item ) :

				$title = $item['heading_title'];
				$bg_image = $item['carousel_image'];
				$btn_text = $item['button_text'];
				$btn_url = $item['button_url'];

				$img_bg = \tp_img_resize( $bg_image['id'], 570, 439);
				$target = $btn_url['is_external'] ? '_blank' : '_self';

				//fw_print($btn_url);
		?>
        <div class="single-new-collection">

            <?php if( $img_bg ) : ?>
                <a href="<?php echo esc_url( $btn_url['url'] ); ?>"><img alt="<?php echo esc_html( $title ); ?>" src="<?php echo esc_url( $img_bg ); ?>"></a>
            <?php endif; ?>

            <div class="new-collection-content slider-animated-3">
            	<?php if( $title ) : ?>
                	<h2 class="animated"><?php echo esc_html( $title ); ?></h2>
            	<?php endif; ?>

            	<?php if( $btn_text != '' ) : ?>
            		<a href="<?php echo esc_url( $btn_url['url'] ); ?>" target="<?php echo esc_attr( $target ); ?>" class="btn-style cr-btn animated">
                        <span><?php echo esc_html( $btn_text ); ?></span>
                    </a>
            	<?php endif; ?>
            </div>
        </div>
    	<?php endforeach; ?>

    </div>
   
<?php
endif;

    }

    protected function _content_template() { }
}