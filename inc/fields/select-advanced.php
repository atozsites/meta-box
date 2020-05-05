<?php
/**
 * The beautiful select field which uses select2 library.
 *
 * @package Meta Box
 */

/**
 * Select advanced field which uses select2 library.
 */
class Atozsites_Select_Advanced_Field extends Atozsites_Select_Field {
	/**
	 * Enqueue scripts and styles.
	 */
	public static function admin_enqueue_scripts() {
		parent::admin_enqueue_scripts();
		wp_enqueue_style( 'Atozsites-select2', Atozsites_CSS_URL . 'select2/select2.css', array(), '4.0.10' );
		wp_enqueue_style( 'Atozsites-select-advanced', Atozsites_CSS_URL . 'select-advanced.css', array(), Atozsites_VER );

		wp_register_script( 'Atozsites-select2', Atozsites_JS_URL . 'select2/select2.min.js', array( 'jquery' ), '4.0.10', true );

		// Localize.
		$dependencies = array( 'Atozsites-select2', 'Atozsites-select' );
		$locale       = str_replace( '_', '-', get_locale() );
		$locale_short = substr( $locale, 0, 2 );
		$locale       = file_exists( Atozsites_DIR . "js/select2/i18n/$locale.js" ) ? $locale : $locale_short;

		if ( file_exists( Atozsites_DIR . "js/select2/i18n/$locale.js" ) ) {
			wp_register_script( 'Atozsites-select2-i18n', Atozsites_JS_URL . "select2/i18n/$locale.js", array( 'Atozsites-select2' ), '4.0.10', true );
			$dependencies[] = 'Atozsites-select2-i18n';
		}

		wp_enqueue_script( 'Atozsites-select-advanced', Atozsites_JS_URL . 'select-advanced.js', $dependencies, Atozsites_VER, true );
	}

	/**
	 * Normalize parameters for field.
	 *
	 * @param array $field Field parameters.
	 * @return array
	 */
	public static function normalize( $field ) {
		$field = wp_parse_args(
			$field,
			array(
				'js_options'  => array(),
				'placeholder' => __( 'Select an item', 'meta-box' ),
			)
		);

		$field = parent::normalize( $field );

		$field['js_options'] = wp_parse_args(
			$field['js_options'],
			array(
				'allowClear'  => true,
				'width'       => 'none',
				'placeholder' => $field['placeholder'],
			)
		);

		if ( version_compare( get_bloginfo( 'version' ), '5.3', '>=' ) ) {
			$field['class'] .= ' Atozsites-select-advanced-dark';
		}

		return $field;
	}

	/**
	 * Get the attributes for a field.
	 *
	 * @param array $field Field parameters.
	 * @param mixed $value Meta value.
	 * @return array
	 */
	public static function get_attributes( $field, $value = null ) {
		$attributes = parent::get_attributes( $field, $value );
		$attributes = wp_parse_args(
			$attributes,
			array(
				'data-options' => wp_json_encode( $field['js_options'] ),
			)
		);

		return $attributes;
	}
}
