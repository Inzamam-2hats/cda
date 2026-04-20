<?php
$title      = get_sub_field( 'title' );
$facts      = get_sub_field( 'facts' );
$gradient   = get_sub_field( 'gradient' );
$no_padding = get_sub_field( 'no_padding' );
$style      = '';

if ( $no_padding ) {
	$style = 'style="padding: 0;"';
}

if ( empty( $facts ) ) {
	return;
}
?>

<section class="section-numbers text-center" <?php echo $style; ?>>
	<?php if ( $gradient ) : ?>
		<div class="background"></div><!-- /.background -->
	<?php endif; ?>

	<?php if ( ! empty( $title ) ) : ?>
		<header class="section__head fadeup animate">
			<div class="container">
				<h3 class="section__title"><?php echo esc_html( $title ); ?></h3><!-- /.section__title -->
			</div><!-- /.container -->
		</header><!-- /.section__head -->
	<?php endif; ?>

	<div class="section__body">
		<div class="numbers" <?php echo $style; ?>>
			<div class="container container--sm">
				<div class="row justify-content-around">
					<?php foreach ( $facts as $fact ) : ?>
						<div class="col-sm-6 col-md-3 fadeup animate" data-group="1">
							<div class="numbers__content">
								<h3>
									<span class="js-count" <?php echo ( $fact['count'] ) ? 'data-count="' . $fact['count'] . '"' : ''; ?> <?php echo ( $fact['prefix'] ) ? 'data-prefix="' . $fact['prefix'] . '"' : ''; ?> <?php echo ( $fact['suffix'] ) ? 'data-suffix="' . $fact['suffix'] . '"' : ''; ?>>
									</span>
								</h3>

								<?php echo crb_content( $fact['text'] ); ?>
							</div><!-- /.numbers__content -->
						</div><!-- /.col-sm-6 col-md-3 -->
					<?php endforeach; ?>
				</div><!-- /.row -->
			</div><!-- /.container container-/-sm -->
		</div><!-- /.numbers -->
	</div><!-- /.section__body -->
</section><!-- /.section-numbers -->
