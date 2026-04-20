<?php
$text = get_sub_field( 'text' );
$services = get_sub_field( 'services' );
$gradient = get_sub_field( 'gradient' );

if ( empty( $services ) ) {
	return;
}
?>

<section class="section">
	<?php if ( $gradient ) : ?>
		<div class="background"></div><!-- /.background -->
	<?php endif; ?>

	<?php if ( ! empty( $text ) ) : ?>
		<header class="section__head section__head--grey fadeup animate">
			<div class="container">
				<?php echo crb_content( $text ); ?>
			</div><!-- /.container -->
		</header><!-- /.section__head -->
	<?php endif; ?>

	<div class="section__body">
		<div class="services">
			<div class="container container--sm">
				<div class="services__inner">
					<div class="row justify-content-center">
						<?php foreach ( $services as $service ) : ?>
							<?php
							if ( empty( $service['icon'] ) || empty( $service['text'] ) ) {
								continue;
							}

							$src = wp_get_attachment_url( $service['icon'] );
							$meta = wp_get_attachment_metadata( $service['icon'] );
							?>

							<div class="col-sm-12 col-md-4 col-lg-4 fadeup animate" data-group="1">
								<div class="service">
									<figure class="service__image">
										<?php if ( ! empty( $service['icon_url'] ) ) : ?>
											<a href="<?php echo esc_url( $service['icon_url'] ); ?>" target="<?php echo ( $service['blank'] ) ? '_blank' : ''; ?>">
										<?php endif; ?>
											<img width="<?php echo esc_attr( $meta['width'] / 2 ); ?>" src="<?php echo esc_url( $src );?>" alt="">
										<?php if ( ! empty( $service['icon_url'] ) ) : ?>
											</a>
										<?php endif; ?>
									</figure><!-- /.service__image -->

									<div class="service__content">
										<?php echo crb_content( $service['text'] ); ?>
									</div><!-- /.service__content -->
								</div><!-- /.service -->
							</div><!-- /.col-sm-12 col-md-4 col-lg-4 -->
						<?php endforeach; ?>
					</div><!-- /.row -->
				</div><!-- /.services__inner -->
			</div><!-- /.container -->
		</div><!-- /.services -->
	</div><!-- /.section__body -->
</section><!-- /.section -->
