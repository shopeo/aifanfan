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

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define AIFANFAN_PLUGIN_FILE.
if ( ! defined( 'AIFANFAN_PLUGIN_FILE' ) ) {
	define( 'AIFANFAN_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'AIFANFAN_PLUGIN_BASE' ) ) {
	define( 'AIFANFAN_PLUGIN_BASE', plugin_basename( AIFANFAN_PLUGIN_FILE ) );
}

if ( ! defined( 'AIFANFAN_PATH' ) ) {
	define( 'AIFANFAN_PATH', plugin_dir_path( AIFANFAN_PLUGIN_FILE ) );
}

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

if ( ! function_exists( 'aifanfan_load_textdomain' ) ) {
	function aifanfan_load_textdomain() {
		load_plugin_textdomain( 'aifanfan', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
}

add_action( 'init', 'aifanfan_load_textdomain' );

if ( ! function_exists( 'aifanfan_manage_options' ) ) {
	function aifanfan_manage_options() {

	}
}

if ( ! function_exists( 'aifanfan_options_page' ) ) {
	function aifanfan_options_page() {
		add_options_page( __( 'Aifanfan', 'aifanfan' ), __( 'Aifanfan', 'aifanfan' ), 'manage_options', 'options_page_aifanfan', 'aifanfan_manage_options', 10 );
	}
}

add_action( 'admin_menu', 'aifanfan_options_page' );
