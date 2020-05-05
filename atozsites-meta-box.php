<?php
/**
 * Plugin Name: Atozsites Meta Box
 * Plugin URI:  https://github.com/Atozsites/meta-box
 * Description: Create custom meta boxes and custom fields in WordPress.
 * Version:     1.0
 * Author:      Atozsites
 * Author URI:  https://Atozsites.com
 *
 * 
 */

if ( defined( 'ABSPATH' ) && ! defined( 'Atozsites_VER' ) ) {
	register_activation_hook( __FILE__, 'Atozsites_check_php_version' );

	/**
	 * Display notice for old PHP version.
	 */
	function Atozsites_check_php_version() {
		if ( version_compare( phpversion(), '5.3', '<' ) ) {
			die( esc_html__( 'Meta Box requires PHP version 5.3+. Please contact your host to upgrade.', 'meta-box' ) );
		}
	}

	require_once dirname( __FILE__ ) . '/inc/loader.php';
	$Atozsites_loader = new Atozsites_Loader();
	$Atozsites_loader->init();
}
