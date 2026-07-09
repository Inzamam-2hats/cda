<?php
/**
 * Program-specific FAQ data sourced from enrolled client resource center pages.
 */
function crb_get_faq_program_data() {
	static $data = null;

	if ( null !== $data ) {
		return $data;
	}

	$json_path = THEME_DIR . 'includes/faq-program-data.json';

	if ( ! is_readable( $json_path ) ) {
		$data = [];
		return $data;
	}

	$decoded = json_decode( file_get_contents( $json_path ), true );

	$data = is_array( $decoded ) ? $decoded : [];

	return $data;
}
