<?php
$text     = get_sub_field( 'text' );
$gradient = get_sub_field( 'gradient' );

if ( empty( $text ) ) {
	return;
}
?>

<section class="section">
	<?php if ( $gradient ) : ?>
		<div class="background"></div><!-- /.background -->
	<?php endif ?>

	<header class="section__head section__head--grey fadeup animate">
		<div class="container">
			<?php echo $text; ?>
		</div><!-- /.container -->
	</header><!-- /.section__head -->
</section><!-- /.section -->
