<?php

/**
 * Color Picker field
 * @package Fieldmanager
 */
class Fieldmanager_Colorpicker extends Fieldmanager_Field {

	/**
	 * @var string
	 * Override field_class
	 */
	public $field_class = 'colorpicker';

	/**
	 * @var bool
	 * @access private
	 */
	private static $has_registered_js = false;

	/**field
	 * @var array
	 * Options to pass to the wpColorPicker.
	 *
	 * @see http://automattic.github.io/Iris/
	 */
	public $js_opts = array();

	/**
	 * Construct default attributes
	 * @param string $label
	 * @param array $options
	 */
	public function __construct( $label, $options = array() ) {
		if (!self::$has_registered_js) {
			wp_enqueue_style( 'wp-color-picker' );
			fm_add_script( 'fm_colorpicker', 'js/fieldmanager-colorpicker.js', array('wp-color-picker') );
			self::$has_registered_js = true;
		}
		parent::__construct( $label, $options );
	}

	/**
	 * Form element
	 * @param mixed $value
	 * @return string HTML
	 */
	public function form_element( $value = array() ) {
		return sprintf(
			'<input type="text" class="fm-%4$s fm-element" id="%1$s" name="%2$s" value="%3$s" data-colorpicker-opts=\'%5$s\' />',
			esc_attr( $this->get_element_id() ),
			esc_attr( $this->get_form_name() ),
			esc_attr( $value ),
			$this->field_class,
			json_encode($this->js_opts)
		);
	}

}
