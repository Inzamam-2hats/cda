<?php
$locations = get_sub_field( 'locations' );

if ( empty( $locations ) ) {
	return;
}
?>

<div class="maps">
	<?php foreach ( $locations as $index => $location ) : ?>
		<div class="map <?php echo ( $index % 2 !== 0 ) ? 'map--left' : '';  ?> fadeup animate">
			<?php if ( $location['gradient'] ) : ?>
				<div class="background"></div><!-- /.background -->
			<?php endif; ?>

			<div class="container container--sm">
				<div class="row align-items-center justify-content-between">
					<div class="col-sm-12 col-md-12 col-lg-6 <?php echo ( $index % 2 !== 0 ) ? 'order-2' : 'order-last order-lg-first'; ?>">
						<div class="map__content">
							<?php if ( ! empty( $location['title'] ) ) : ?>
								<h4><?php echo esc_html( $location['title'] ); ?></h4>
							<?php endif; ?>

							<?php echo crb_content( $location['text'] ); ?>

							<div class="map__actions d-flex align-items-center justify-content-between">
								<?php if ( ! empty( $location['tour']['title'] ) ) : ?>
									<h5><?php echo esc_html( $location['tour']['title'] ); ?></h5>
								<?php endif; ?>

								<?php if ( ! empty( $location['tour']['locations'] ) ) : ?>
									<?php $tour_locations = join( ',', $location['tour']['locations'] ); ?>

									<a href="#" class="btn btn--blue btn-tour btn-tour--1" data-navitems="<?php echo esc_attr( $tour_locations ); ?>">
										<span><?php echo esc_html( $location['tour']['button'] ) ? : 'View'; ?></span>
									</a>
								<?php endif; ?>
							</div><!-- /.map__actions -->
						</div><!-- /.map__content -->
					</div><!-- /.col-sm-12 col-md-12 col-lg-6 -->

					<?php if ( ! empty( $location['map'] ) ) : ?>
                        <?php $directions = 'https://maps.google.com/maps?daddr=' . urlencode( $location['map']['address'] ); ?>

                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="map__link" data-directions="<?php echo esc_url( $directions ); ?>">
                            	<div class="map__media" style="pointer-events: none;" data-lng="<?php echo esc_attr( $location['map']['lng'] ); ?>" data-lat="<?php echo esc_attr( $location['map']['lat'] ); ?>">
                            	</div><!-- /.map__media -->
                            </div><!-- /.map__link -->
                        </div><!-- /.col-sm-12 col-md-12 col-lg-6 -->
                    <?php endif; ?>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.map -->
	<?php endforeach; ?>
</div><!-- /.maps -->

<?php crb_render_fragment( 'popups/tour' ); ?>
