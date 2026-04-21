<?php
/**
 * Returns current year
 *
 * @uses [year]
 */
add_shortcode( 'year', 'crb_shortcode_year' );
function crb_shortcode_year() {
	return date( 'Y' );
}

add_shortcode( 'directions', 'crb_shortcode_directions' );
function crb_shortcode_directions( $atts, $content ) {
	ob_start();

	$atts = shortcode_atts(
		array(
			'address' => '',
		),
		$atts, 'directions'
	);

	if ( empty( $atts['address'] ) ) {
		return;
	}

	$directions = 'https://maps.google.com/maps?daddr=' . urlencode( $atts['address'] );

	ob_start();
	?>

	<a href="<?php echo esc_url( $directions ) ?>" target="_blank" style="color: inherit;"><?php echo $content; ?></a>

	<?php
	$html = ob_get_clean();

	return $html;
}

add_shortcode( 'scroll', 'crb_shortcode_scroll' );
function crb_shortcode_scroll( $atts, $content ) {
	$atts = shortcode_atts(
		array(
			'text' => '',
			'id'   => '',
		),
		$atts, 'scroll'
	);

	if ( empty( $atts['id'] ) || empty( $atts['text'] ) ) {
		return;
	}

	ob_start();
	?>

	<a href="#<?php echo esc_attr( $atts['id'] ); ?>" class="js-btn-scroll"><?php echo esc_html( $atts['text'] ); ?></a>

	<?php
	$html = ob_get_clean();

	return $html;
}

add_shortcode( 'button', 'crb_shortcode_button' );
function crb_shortcode_button( $atts, $content ) {
	ob_start();

	$atts = shortcode_atts(
		array(
			'url'    => '#',
			'text'   => 'Learn More',
			'target' => '',
			'color' => '',
		),
		$atts, 'button'
	);

	ob_start();
	?>

	<a href="<?php echo esc_url( $atts['url'] ); ?>" class="btn <?php echo $atts['color'] === 'teal' ? 'btn--blue' : ''; ?>" target="<?php echo esc_attr( $atts['target'] ); ?>"><span><?php echo esc_html( $atts['text'] ); ?></span></a>

	<?php
	$html = ob_get_clean();

	return $html;
}
