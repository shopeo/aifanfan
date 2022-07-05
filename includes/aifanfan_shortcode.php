<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'aifanfan_shortcode' ) ) {
	function aifanfan_shortcode( $atts = [], $content = null ) {
		$body = '<div class="aifanfan-shortcode">';
		$body .= '<a target="_blank" href="' . get_option( 'aifanfan_option_name' )['aifanfan_link'] . '">' . $content . '</a>';
		$body .= '</div>';

		return $body;
	}
}

add_shortcode( 'aifanfan', 'aifanfan_shortcode' );
