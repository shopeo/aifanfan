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

if ( ! function_exists( 'aifanfan_sanitize' ) ) {
	function aifanfan_sanitize( $input ) {
		$sanitary_values = array();

		if ( isset( $input['aifanfan_app_key'] ) ) {
			$sanitary_values['aifanfan_app_key'] = sanitize_text_field( $input['aifanfan_app_key'] );
		}

		if ( isset( $input['aifanfan_app_secret'] ) ) {
			$sanitary_values['aifanfan_app_secret'] = sanitize_text_field( $input['aifanfan_app_secret'] );
		}

		if ( isset( $input['aifanfan_link'] ) ) {
			$sanitary_values['aifanfan_link'] = sanitize_text_field( $input['aifanfan_link'] );
		}

		if ( isset( $input['aifanfan_code'] ) ) {
			$sanitary_values['aifanfan_code'] = $input['aifanfan_code'];
		}

		return $sanitary_values;
	}
}

if ( ! function_exists( 'aifanfan_section_info' ) ) {
	function aifanfan_section_info() {
		printf( __( 'Find the required setup information via <a target="_blank" href="%1$s">%2$s</a>', 'aifanfan' ), 'https://aifanfan.baidu.com/', 'aifanfan.baidu.com' );
	}
}

if ( ! function_exists( 'aifanfan_app_key_callback' ) ) {
	function aifanfan_app_key_callback() {
		printf( '<input class="regular-text" type="text" name="aifanfan_option_name[aifanfan_app_key]" id="aifanfan_app_key" value="%s">', isset( get_option( 'aifanfan_option_name' )['aifanfan_app_key'] ) ? esc_attr( get_option( 'aifanfan_option_name' )['aifanfan_app_key'] ) : '' );
	}
}

if ( ! function_exists( 'aifanfan_app_secret_callback' ) ) {
	function aifanfan_app_secret_callback() {
		printf( '<input class="regular-text" type="text" name="aifanfan_option_name[aifanfan_app_secret]" id="aifanfan_app_secret" value="%s">', isset( get_option( 'aifanfan_option_name' )['aifanfan_app_secret'] ) ? esc_attr( get_option( 'aifanfan_option_name' )['aifanfan_app_secret'] ) : '' );
	}
}

if ( ! function_exists( 'aifanfan_link_callback' ) ) {
	function aifanfan_link_callback() {
		printf( '<input class="regular-text" type="url" name="aifanfan_option_name[aifanfan_link]" id="aifanfan_link" value="%s">', isset( get_option( 'aifanfan_option_name' )['aifanfan_link'] ) ? esc_attr( get_option( 'aifanfan_option_name' )['aifanfan_link'] ) : '' );
	}
}

if ( ! function_exists( 'aifanfan_code_callback' ) ) {
	function aifanfan_code_callback() {
		printf( '<textarea class="regular-text" rows="5" name="aifanfan_option_name[aifanfan_code]" id="aifanfan_code">%s</textarea>', isset( get_option( 'aifanfan_option_name' )['aifanfan_code'] ) ? esc_attr( get_option( 'aifanfan_option_name' )['aifanfan_code'] ) : '' );
	}
}

if ( ! function_exists( 'aifanfan_page_init' ) ) {
	function aifanfan_page_init() {
		register_setting( 'aifanfan_option_group', 'aifanfan_option_name', 'aifanfan_sanitize' );

		add_settings_section( 'aifanfan_setting_section', __( 'Settings', 'aifanfan' ), 'aifanfan_section_info', 'aifanfan' );

		add_settings_field( 'aifanfan_app_key', __( 'AppKey', 'aifanfan' ), 'aifanfan_app_key_callback', 'aifanfan', 'aifanfan_setting_section' );
		add_settings_field( 'aifanfan_app_secret', __( 'AppSecret', 'aifanfan' ), 'aifanfan_app_secret_callback', 'aifanfan', 'aifanfan_setting_section' );
		add_settings_field( 'aifanfan_link', __( 'Link', 'aifanfan' ), 'aifanfan_link_callback', 'aifanfan', 'aifanfan_setting_section' );
		add_settings_field( 'aifanfan_code', __( 'Code', 'aifanfan' ), 'aifanfan_code_callback', 'aifanfan', 'aifanfan_setting_section' );
	}
}

add_action( 'admin_init', 'aifanfan_page_init' );

if ( ! function_exists( 'aifanfan_activate' ) ) {
	function aifanfan_activate() {

	}
}

register_activation_hook( __FILE__, 'aifanfan_activate' );


if ( ! function_exists( 'aifanfan_deactivate' ) ) {
	function aifanfan_deactivate() {
		delete_option( 'aifanfan_option_name' );
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
		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form action="options.php" method="post">
				<?php
				settings_fields( 'aifanfan_option_group' );
				do_settings_sections( 'aifanfan' );
				submit_button( __( 'Save Settings', 'aifanfan' ) );
				?>
			</form>
		</div>
		<?php
	}
}

if ( ! function_exists( 'aifanfan_options_page' ) ) {
	function aifanfan_options_page() {
		add_options_page( __( 'Aifanfan', 'aifanfan' ), __( 'Aifanfan', 'aifanfan' ), 'manage_options', 'options_page_aifanfan', 'aifanfan_manage_options', 10 );
	}
}

add_action( 'admin_menu', 'aifanfan_options_page' );

if ( ! function_exists( 'aifanfan_head' ) ) {
	function aifanfan_head() {
		if ( is_archive() || is_singular() || is_home() || is_404() || is_search() || is_front_page() ) {
			echo isset( get_option( 'aifanfan_option_name' )['aifanfan_code'] ) ? get_option( 'aifanfan_option_name' )['aifanfan_code'] : '';
		}
	}
}

add_action( 'wp_head', 'aifanfan_head' );

require_once __DIR__ . '/includes/aifanfan_shortcode.php';
require_once __DIR__ . '/includes/AifanfanWidget.class.php';
