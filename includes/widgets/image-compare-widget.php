<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Image Compare Widget.
 *
 * Elementor widget that inserts an animated headline content into the page, from any given text.
 *
 * @since 1.0.0
 */
class Image_Compare_Elementor_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Image Compare widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_name() {
		return 'image-compare-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Image Compare widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_title() {
		return esc_html__( 'Image Compare', 'image-compare' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Image Compare widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_icon() {
		return 'eicon-image-before-after';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @return string Widget help URL.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @return array Widget scripts dependencies.
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 */
	public function get_script_depends() {
		return [ 'image-compare-editor-js' ];
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Image Compare widget belongs to.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_categories() {
		return [ 'image-compare-category' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the Image Compare widget belongs to.
	 *
	 * @return array Widget keywords.
	 * @since 1.0.0
	 * @access public
	 */
	public function get_keywords() {
		return [
			'elementor',
			'compare',
			'image compare',
			'image comparison',
			'elementor before after slider',
			'before after image slider'
		];
	}


	/**
	 * Register Image Compare widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'image_compare_section',
			[
				'label' => esc_html__( 'Content', 'image-compare' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_orientation',
			[
				'label'   => esc_html__( 'Align', 'image-compare' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'horizontal',
				'options' => [
					'horizontal' => esc_html__( 'Horizontal', 'image-compare' ),
					'vertical'   => esc_html__( 'Vertical', 'image-compare' ),
				]
			]
		);

		$this->add_control(
			'before_image',
			[
				'label'   => esc_html__( 'Before Image', 'image-compare' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'after_image',
			[
				'label'   => esc_html__( 'After Image', 'image-compare' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'    => 'image_size',
				'default' => 'full',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'image_compare_setting_section',
			[
				'label' => esc_html__( 'Setting', 'image-compare' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'before_label',
			[
				'label'   => esc_html__( 'Before Label', 'image-compare' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Before', 'image-compare' ),
			]
		);
		$this->add_control(
			'after_label',
			[
				'label'   => esc_html__( 'After Label', 'image-compare' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'After', 'image-compare' ),
			]
		);
		$this->add_control(
			'offset',
			[
				'label'       => esc_html__( 'Default Offset', 'image-compare' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( '0.7', 'image-compare' ),
				'placeholder' => esc_html__( '0.7', 'image-compare' ),
			]
		);

		$this->add_control(
			'show_overlay',
			[
				'label'        => esc_html__( 'Hide Overlay', 'image-compare' ),
				'type'         => Controls_Manager::SWITCHER,
				'true'         => esc_html__( 'Show', 'image-compare' ),
				'false'        => esc_html__( 'Hide', 'image-compare' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);

		$this->add_control(
			'move_slider_on_hover',
			[
				'label'        => esc_html__( 'Move Slider On Hover', 'image-compare' ),
				'type'         => Controls_Manager::SWITCHER,
				'true'         => esc_html__( 'Show', 'image-compare' ),
				'false'        => esc_html__( 'Hide', 'image-compare' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'move_with_handle_only',
			[
				'label'        => esc_html__( 'Move With Handle Only', 'image-compare' ),
				'type'         => Controls_Manager::SWITCHER,
				'true'         => esc_html__( 'Show', 'image-compare' ),
				'false'        => esc_html__( 'Hide', 'image-compare' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->add_control(
			'click_to_move',
			[
				'label'        => esc_html__( 'Click To Move', 'image-compare' ),
				'type'         => Controls_Manager::SWITCHER,
				'true'         => esc_html__( 'Show', 'image-compare' ),
				'false'        => esc_html__( 'Hide', 'image-compare' ),
				'return_value' => 'true',
				'default'      => 'true',
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Render Image Compare widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		$this->add_render_attribute( 'image_compare_setting', [
			'id'                => 'image_compare-' . $this->get_id(),
			'data-overlay'      => $settings['show_overlay'],
			'data-orientation'  => $settings['show_orientation'],
			'data-before-label' => $settings['before_label'],
			'data-after-label'  => $settings['after_label'],
			'data-slider-hover' => $settings['move_slider_on_hover'],
			'data-move-handle'  => $settings['move_with_handle_only'],
			'data-click-move'   => $settings['click_to_move'],
			'data-offset'   => $settings['offset'],
		] );

		?>
        <div id="horizontal"
             class="image-compare-container" <?php echo $this->get_render_attribute_string( 'image_compare_setting' ) ?>>
			<?php
			echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'before_image' );
			echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'after_image' );

			?>

        </div>
		<?php

	}

}