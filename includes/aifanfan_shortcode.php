<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'aifanfan_shortcode' ) ) {
	function aifanfan_shortcode( $atts = [], $content = null ) {
		$body    = '<div class="aifanfan-shortcode">';
		$options = get_option( 'aifanfan_option_name' );
		if ( is_array( $options ) && array_key_exists( 'aifanfan_link', $options ) ) {
			$body .= '<a target="_blank" href="' . get_option( 'aifanfan_option_name' )['aifanfan_link'] . '">' . $content . '</a>';
		}
		$body .= '</div>';

		return $body;
	}
}

add_shortcode( 'aifanfan', 'aifanfan_shortcode' );
