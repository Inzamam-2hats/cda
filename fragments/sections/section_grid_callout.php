<?php
$title    = get_sub_field( 'title' );
$grid_items   = get_sub_field( 'grid_items' );
$center_items   = get_sub_field( 'center_items' );
$callout  = get_sub_field( 'callout' );

if ( empty( $grid_items ) ) {
	return;
}
?>

<section class="section section--plain">
	<?php if ( ! empty( $title ) ) : ?>
		<header class="section__head section__head--smallest fadeup animate">
			<div class="container">
				<h3><?php echo esc_html( $title ); ?></h3>
			</div><!-- /.container -->
		</header><!-- /.section__head -->
	<?php endif; ?>

	<div class="section__body">
		<div class="videos">
			<div class="container container--sm">
				<div class="row<?php if($center_items) { echo ' justify-content-center'; } ?>">
					<?php foreach ($grid_items as $item ) : ?>
						<?php $thumbnail = wp_get_attachment_image_url( $item['thumbnail'], 'crb_video_thumbnail' ); ?>

						<div class="col-md-4 col-lg-4 fadeup animate" data-group="1">
							<div class="video video--small">
								<div class="video__body">
									<div class="video__image" style="background-image: url(<?php echo esc_url( $thumbnail ); ?>);"></div><!-- /.video__image -->
								</div><!-- /.video__body -->

								<div class="video__content text-center">
									<?php echo crb_content( $item['text'] ); ?>
								</div><!-- /.video__content -->
							</div><!-- /.video -->
						</div><!-- /.col-md-4 col-lg-4 -->
					<?php endforeach; ?>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.videos -->

		<?php if ( ! empty( $callout ) ) : ?>
			<div class="callout callout--alt text-center fadeup animate">
				<div class="container container--xs">
					<div class="callout__inner">
						<div class="callout__content callout__content--large">
							<?php echo crb_content( $callout ); ?>
						</div><!-- /.callout__content -->
					</div><!-- /.callout__inner -->
				</div><!-- /.container -->
			</div><!-- /.callout -->
		<?php endif; ?>
	</div><!-- /.section__body -->

	<div class="section__background"></div><!-- /.section__background -->
</section><!-- /.section -->
