<?php
/**
 * Plugin Name: Aifanfan
 * Plugin URI: https://www.shopeo.cn
 * Description: Integrate Baidu Aifanfan CRM management system to collect customer leads.
 * Author: Shopeo
 * Version: 0.0.1
 * Author URI: https://www.shopeo.cn
 * License: GPL2+
 * Text Domain: aifanfan
 * Domain Path: /languages
 * Requires at least: 5.9
 * Requires PHP: 5.6
 */

if ( ! function_exists( 'aifanfan_activate' ) ) {
	function aifanfan_activate() {

	}
}

register_activation_hook( __FILE__, 'aifanfan_activate' );


if ( ! function_exists( 'aifanfan_deactivate' ) ) {
	function aifanfan_deactivate() {

	}
}

register_deactivation_hook( __FILE__, 'aifanfan_deactivate' );

