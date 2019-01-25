<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor icon list widget.
 *
 * Elementor widget that displays a bullet list with any chosen icons and texts.
 *
 * @since 1.0.0
 */
class TP_Widget_Contact_Info extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve icon list widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'tp-icon-list';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve icon list widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'CraftCog Contact Info', 'craftcog' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve icon list widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-bullet-list';
	}

	/**
	 * Register icon list widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__( 'Contact Information', 'craftcog' ),
			]
		);


		$this->add_control(
			'info_title',
			[
				'label' => esc_html__( 'Title', 'craftcog' ),
				'label_block'   => true,
				'type' => Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'contact_info_list',
			[
				'label' => '',
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'text' => esc_html__( 'Contact Information ', 'craftcog' ),
						'icon' => 'fa fa-envelope-open-o',
					],
				],
				'fields' => [
					[
						'name' => 'info_heading',
						'label' => esc_html__( 'Heading', 'craftcog' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => esc_html__( 'Info Heading', 'craftcog' ),
						'default' => esc_html__( 'Info Heading', 'craftcog' ),
					],

					[
						'name' => 'info_title',
						'label' => esc_html__( 'Info Title', 'craftcog' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => esc_html__( 'Info Title', 'craftcog' ),
						'default' => esc_html__( 'Info Title', 'craftcog' ),
					],

					[
						'name' => 'info_icon',
						'label' => esc_html__( 'Icon', 'craftcog' ),
						'type' => Controls_Manager::ICON,
						'label_block' => true,
						'default' => 'fa fa-home',
					],
				],
				'title_field' => '<i class="{{ info_icon }}" aria-hidden="true"></i> {{{ text }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'craftcog' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'craftcog' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .communication-icon i' => 'color: {{VALUE}}', '.communication-icon i' => 'border: 1px solid {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'icon_bg_hover',
			[
				'label' => esc_html__( 'Icon Background Hover', 'craftcog' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .single-communication:hover .communication-icon i' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label' => esc_html__( 'Icon Hover Color', 'craftcog' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .single-communication:hover .communication-icon i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		
	}

	/**
	 * Render icon list widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$settings = $this->get_settings();
		$title = $settings['info_title'];
		$contact_info = $settings['contact_info_list'];
		?>

		<div class="contact-info-wrapper">
			<h4 class="contact-title"><?php echo esc_html( $title ); ?></h4>

			<?php if( is_array( $contact_info ) && !empty( $contact_info ) ) : ?>
				<div class="communication-info">
					
				<?php foreach( $contact_info as $contacts ) :
				$heading 	= $contacts['info_heading'];
				$info_title = $contacts['info_title'];
				$info_icon 	= $contacts['info_icon'];
				
				?>
					<div class="single-communication">
						<div class="communication-icon">
							<i class="<?php echo esc_html($info_icon); ?>" aria-hidden="true"></i>
						</div>
						<div class="communication-text">
							<?php if( $heading ) : ?>
								<h4><?php echo esc_html( $heading ); ?>:</h4>
							<?php endif; ?>
							<?php if( $info_title ) : ?>
								<p><?php echo esc_html( $info_title ); ?></p>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>

				</div>
			<?php endif; ?>
		</div>

        

<?php
    }

    protected function _content_template() {}
}
?>
