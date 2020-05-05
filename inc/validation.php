<?php
/**
 * Validation module.
 *
 * @package Meta Box
 */

/**
 * Validation class.
 */
class Atozsites_Validation {

	/**
	 * Add hooks when module is loaded.
	 */
	public function __construct() {
		add_action( 'Atozsites_after', array( $this, 'rules' ) );
		add_action( 'Atozsites_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	/**
	 * Output validation rules of each meta box.
	 * The rules are outputted in [data-rules] attribute of an hidden <script> and will be converted into JSON by JS.
	 *
	 * @param RW_Meta_Box $object Meta Box object.
	 */
	public function rules( RW_Meta_Box $object ) {
		if ( ! empty( $object->meta_box['validation'] ) ) {
			echo '<script type="text/html" class="Atozsites-validation-rules" data-rules="' . esc_attr( wp_json_encode( $object->meta_box['validation'] ) ) . '"></script>';
		}
	}

	/**
	 * Enqueue scripts for validation.
	 *
	 * @param RW_Meta_Box $object Meta Box object.
	 */
	public function enqueue( RW_Meta_Box $object ) {
		if ( empty( $object->meta_box['validation'] ) ) {
			return;
		}
		wp_enqueue_script( 'jquery-validation', Atozsites_JS_URL . 'jquery-validation/jquery.validate.min.js', array( 'jquery' ), '1.15.0', true );
		wp_enqueue_script( 'jquery-validation-additional-methods', Atozsites_JS_URL . 'jquery-validation/additional-methods.min.js', array( 'jquery-validation' ), '1.15.0', true );
		wp_enqueue_script( 'Atozsites-validate', Atozsites_JS_URL . 'validate.js', array( 'jquery-validation', 'jquery-validation-additional-methods' ), Atozsites_VER, true );

		Atozsites_Helpers_Field::localize_script_once(
			'Atozsites-validate',
			'AtozsitesValidate',
			array(
				'summaryMessage' => esc_html__( 'Please correct the errors highlighted below and try again.', 'meta-box' ),
			)
		);
	}
}
