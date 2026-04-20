<?php
$text        = get_sub_field( 'text' );
$features    = get_sub_field( 'features' );
$gradient    = get_sub_field( 'gradient' );
$top_spacing = get_sub_field( 'spacing' );
?>

<div class="section <?php echo ( $top_spacing ) ? 'section--large' : ''; ?>">
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
	</div><!-- /.section__body -->
</div><!-- /.section -->
