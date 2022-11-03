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
			'show_align',
			[
				'label'   => esc_html__( 'Show Align', 'image-compare' ),
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
			'show_overlay',
			[
				'label'        => esc_html__( 'Hide Overlay', 'image-compare' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'true'         => esc_html__( 'Show', 'image-compare' ),
				'false'         => esc_html__( 'Hide', 'image-compare' ),
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

		$settings         = $this->get_settings_for_display();
		$before_image_url = $settings['before_image']['url'];
		$after_image_url  = $settings['after_image']['url'];
		$this->add_render_attribute( 'image_compare_setting', [
			'id'           => 'image_compare-' . $this->get_id(),
			'data-overlay' => $settings['show_overlay'],
		] );

		if ( $settings['show_align'] == 'horizontal' ) {
			?>
            <div id="horizontal" <?php echo $this->get_render_attribute_string( 'image_compare_setting' ) ?>>
				<?php
				echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'before_image' );
				echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image_size', 'after_image' );

				?>

            </div>
		<?php } else { ?>

            <div id="vertical">
                <!-- The before image is first -->
                <img src="<?php echo esc_url( $before_image_url ) ?>"/>
                <!-- The after image is last -->
                <img src="<?php echo esc_url( $after_image_url ) ?>"/>
            </div>
			<?php

		}
        echo $settings['show_overlay'];

	}

}