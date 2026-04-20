<?php
$title      = get_sub_field( 'title' );
$slides     = get_sub_field( 'slides' );
$background = wp_get_attachment_image_url( get_sub_field( 'background'), 'crb_full_width' );

if ( empty( $background ) || empty( $slides ) ) {
	return;
}
?>

<section class="section-history text-center" style="background-image: url(<?php echo esc_url( $background ); ?>)">
	<?php if ( ! empty( $title ) ) : ?>
		<header class="section__head fadeup animate">
			<div class="container">
				<h3 class="section__title"><?php echo esc_html( $title ); ?></h3><!-- /.section__title -->
			</div><!-- /.container -->
		</header><!-- /.section__head -->
	<?php endif; ?>

	<div class="section__body">
		<div class="slider-history fadeup animate">
			<div class="container container--sm">
				<div class="slider__clip">
					<div class="slider__slides">
						<?php foreach ( $slides as $slide ) : ?>
							<div class="slider__slide">
								<?php if ( ! empty( $slide['title'] ) ) : ?>
									<h3>
										<span>
											<?php echo esc_html( $slide['title'] ); ?>
										</span>
									</h3>
								<?php endif; ?>

								<?php echo crb_content( $slide['text'] ); ?>
							</div><!-- /.slider__slide -->
						<?php endforeach; ?>
					</div><!-- /.slider__slides -->

					<div class="slider__actions"></div><!-- /.slider__actions -->
				</div><!-- /.slider__clip -->
			</div><!-- /.container -->
		</div><!-- /.slider-history -->
	</div><!-- /.section__body -->
</section><!-- /.section-history -->
