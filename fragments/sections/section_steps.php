<?php
$text        = get_sub_field( 'text' );
$title       = get_sub_field( 'title' );
$features    = get_sub_field( 'features' );
$steps       = get_sub_field( 'steps' );
$top_spacing = get_sub_field( 'spacing' );
$gradient    = get_sub_field( 'gradient' );

if ( empty( $steps ) ) {
	return;
}
?>

<div class="section <?php echo ( $top_spacing ) ? 'section--large' : ''; ?>">
	<?php if ( $gradient ) : ?>
		<div class="section__background"></div><!-- /.section__background -->
	<?php endif ?>

	<?php if ( ! empty( $text ) ) : ?>
		<header class="section__head section__head--grey fadeup animate">
			<div class="container">
				<?php echo crb_content( $text ); ?>
			</div><!-- /.container -->
		</header><!-- /.section__head -->
	<?php endif; ?>

	<div class="section__body">
		<?php if ( ! empty( $features ) ) : ?>
			<div class="services">
				<div class="container container--sm">
					<div class="services__inner">
						<div class="row">
							<?php foreach ( $features as $feature ) : ?>
								<?php
								if ( empty( $feature['image'] ) || empty( $feature['text'] ) ) {
									continue;
								}

								$src = wp_get_attachment_url( $feature['image'] );
								$meta = wp_get_attachment_metadata( $feature['image'] );
								?>

								<div class="col-sm-12 col-md-4 col-lg-4 fadeup animate" data-group="1">
									<div class="service">
										<figure class="service__image">
											<img width="<?php echo esc_attr( $meta['width'] / 2 ); ?>" src="<?php echo esc_url( $src );?>" alt="">
										</figure><!-- /.service__image -->

										<div class="service__content">
											<?php echo crb_content( $feature['text'] ); ?>
										</div><!-- /.service__content -->
									</div><!-- /.service -->
								</div><!-- /.col-sm-12 col-md-4 col-lg-4 -->
							<?php endforeach; ?>
						</div><!-- /.row -->
					</div><!-- /.services__inner -->
				</div><!-- /.container -->
			</div><!-- /.services -->
		<?php endif; ?>

		<div class="slider-steps <?php echo ( empty( $title ) ) ? 'slider-steps--alt' : ''; ?> fadeup animate">
			<div class="container">
				<?php if ( ! empty( $title ) ) : ?>
					<div class="slider__head">
						<h3 class="text-center"><?php echo esc_html( $title ); ?></h3>
					</div><!-- /.slider__head -->
				<?php endif; ?>

				<div class="slider__actions"></div><!-- /.slider__actions -->

				<div class="slider__clip">
					<div class="slider__slides">
						<?php foreach ( $steps as $index => $step ) : ?>
							<?php
							if ( empty( $step['text'] ) || empty( $step['image'] ) ) {
								continue;
							}

							$src = wp_get_attachment_url( $step['image'] );
							$meta = wp_get_attachment_metadata( $step['image'] );
							?>

							<div class="slider__slide">
								<div class="step">
									<div class="step__inner">
										<div class="step__head">
											<h6><?php _e( 'Step', 'sage' ); ?> <?php echo $index + 1; ?></h6>
										</div><!-- /.step__head -->

										<div class="step__body">
											<img style="width: <?php echo esc_attr( $meta['width'] / 2 ) . 'px'; ?>" src="<?php echo esc_url( $src );?>" alt="">

											<?php echo crb_content( $step['text'] ); ?>
										</div><!-- /.step__body -->
									</div><!-- /.step__inner -->
								</div><!-- /.step -->
							</div><!-- /.slider__slide -->
						<?php endforeach; ?>
					</div><!-- /.slider__slides -->
				</div><!-- /.slider__clip -->
			</div><!-- /.container -->
		</div><!-- /.slider-steps -->
	</div><!-- /.section__body -->
</div><!-- /.section -->
