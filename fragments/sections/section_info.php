<?php
$text     = get_sub_field( 'text' );
$button   = get_sub_field( 'button' );
$gradient = get_sub_field( 'gradient' );

if ( empty( $text ) ) {
	return;
}
?>

<section class="section">
	<?php if ( $gradient ) : ?>
		<div class="background"></div><!-- /.background -->
	<?php endif; ?>

	<header class="section__head section__head--larger fadeup animate">
		<div class="container">
			<?php echo crb_content( $text ); ?>

			<a href="#" class="btn btn--blue btn--large js-btn-info">
				<span><?php echo esc_html( $button ) ? : 'Learn More'; ?></span>
			</a>
		</div><!-- /.container -->
	</header><!-- /.section__head -->
</section><!-- /.section -->
