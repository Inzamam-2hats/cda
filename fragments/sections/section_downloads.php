<?php
$text      = get_sub_field( 'text' );
$downloads = get_sub_field( 'downloads' );
$gradient  = get_sub_field( 'gradient' );

if ( empty( $downloads ) ) {
	return;
}
?>

<section class="section section--plain">
	<?php if ( $gradient ) : ?>
		<div class="background"></div><!-- /.background -->
	<?php endif; ?>

	<?php if ( ! empty( $text ) ) : ?>
		<header class="section__head">
			<div class="container">
				<?php echo crb_content( $text ); ?>
			</div><!-- /.container -->
		</header><!-- /.section__head -->
	<?php endif; ?>

	<div class="section__body">
		<div class="resources">
			<div class="container container--sm">
				<div class="row">
					<div class="col-lg-8 offset-lg-2">
						<?php foreach ( $downloads as $download ) : ?>
							<div class="resource d-flex justify-content-between align-items-center fadeup animate">
								<div class="resource__content">
									<?php echo crb_content( $download['text'] ); ?>
								</div><!-- /.resource__content -->

								<div class="resource__actions">
									<?php if ( $download['type'] === 'download' ) : ?>
										<a href="<?php echo esc_url( $download['file']['url'] ); ?>" class="btn btn--blue" target="_blank" download>
											<span><?php _e( 'Download', 'sage' ); ?></span>
										</a><!-- /.btn btn-/-blue -->
									<?php else : ?>
										<a href="<?php echo esc_url( $download['link']['url'] ); ?>" class="btn btn--blue" target="<?php echo esc_attr( $download['link']['target'] ) ?>">
											<span><?php echo esc_html( $download['link']['title'] ) ? : 'Learn More'; ?></span>
										</a><!-- /.btn btn-/-blue -->
									<?php endif; ?>
								</div><!-- /.resource__actions -->
							</div><!-- /.resource -->
						<?php endforeach; ?>
					</div><!-- /.col-lg-8 offset-lg-2 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.resources -->
	</div><!-- /.section__body -->
</section><!-- /.section -->
