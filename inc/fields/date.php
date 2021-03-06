<?php
/**
 * The date picker field, which uses built-in jQueryUI date picker widget.
 *
 * @package Meta Box
 */

/**
 * Date field class.
 */
class Atozsites_Date_Field extends Atozsites_Datetime_Field {
	/**
	 * Enqueue scripts and styles.
	 */
	public static function admin_enqueue_scripts() {
		parent::admin_register_scripts();
		wp_enqueue_style( 'Atozsites-date' );
		wp_enqueue_script( 'Atozsites-date' );
	}

	/**
	 * Returns a date() compatible format string from the JavaScript format.
	 *
	 * @link http://www.php.net/manual/en/function.date.php
	 * @param array $js_options JavaScript options.
	 *
	 * @return string
	 */
	public static function get_php_format( $js_options ) {
		return strtr( $js_options['dateFormat'], self::$date_formats );
	}
}
