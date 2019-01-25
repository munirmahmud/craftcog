<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class TP_Heading_Widget extends Widget_Base {

	public function get_name() {
		return 'tp-heading';
	}

	public function get_title() {
		return esc_html__( 'CraftCog Heading', 'craftcog' );
	}

	public function get_icon() {
		return 'eicon-type-tool';
	}

	public function get_categories() {
		return [ 'craftcog-elements' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_tab', [
				'label' => esc_html__( 'CraftCog Heading', 'craftcog' ),
			]
		);

        $this->add_control(
            'section_heading', [
                'label'			 => esc_html__( 'Section Heading', 'craftcog' ),
                'type'			 => Controls_Manager::TEXT,
                'label_block'	 => true,
                'placeholder'	 => esc_html__( 'Put here section heading', 'craftcog' ),
                'default'        => esc_html__('Put here section heading', 'craftcog'),
            ]
        );

        $this->add_control(
            'section_subheading', [
                'label'			 => esc_html__( 'Section Sub Heading', 'craftcog' ),
                'type'			 => Controls_Manager::TEXT,
                'label_block'	 => true,
                'placeholder'	 => esc_html__( 'Section Sub Heading', 'craftcog' ),
                'default'        => esc_html__('We provide best services on design & development', 'craftcog'),
            ]
        );

		$this->end_controls_section();

		//Title Style Section
		$this->start_controls_section(
			'section_title_style', [
				'label'	 => esc_html__( 'Title', 'craftcog' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color', [
				'label'		 => esc_html__( 'Title color', 'craftcog' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .section-title.text-center > h2' => 'color: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'border_color', [
				'label'		 => esc_html__( 'Border color', 'craftcog' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .section-title > h2::before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .section-title > h2::after' => 'background-color: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'title_margin_bottom', [
				'label'			 => esc_html__( 'Margin Bottom', 'craftcog' ),
				'type'			 => Controls_Manager::SLIDER,
				'default'		 => [
					'size' => '',
				],
				'range'			 => [
					'px' => [
						'min'	 => 0,
						'step'	 => 5,
					],
				],
				'size_units'	 => ['px'],
				'selectors'		 => [
					'{{WRAPPER}} .section-title.text-center > h2'	=> 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
			'name'		 => 'title_typography',
			'selector'	 => '{{WRAPPER}} .section-title.text-center > h2',
			]
		);

		$this->end_controls_section();

		// Section Sub heading styles
		$this->start_controls_section(
			'section_subheading_style', [
				'label'	 => esc_html__( 'Subheading', 'craftcog' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subheading_color', [
				'label'		 => esc_html__( 'Subheading color', 'craftcog' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					'{{WRAPPER}} .section-title.text-center p' => 'color: {{VALUE}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
			'name'		 => 'subheading_typography',
			'selector'	 => '{{WRAPPER}} .section-title.text-center p',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		$heading = $settings[ 'section_heading' ];
		$subheading = $settings[ 'section_subheading' ];
		?>
        <div class="section-title text-center mb-20">
            <?php if ( $heading != '' ) : ?>
                <h2><?php echo craftcog_kses( sprintf( $heading, '<span>','</span>' ) ); ?></h2>
            <?php endif; ?>
            <?php if ( $subheading != '' ) : ?>
                <p><?php echo craftcog_kses( $subheading ); ?></p>
            <?php endif; ?>
        </div>
<?php

	}

	protected function _content_template() {

	}
}
