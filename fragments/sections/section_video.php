<?php
$title      = get_sub_field( 'title' );
$background = wp_get_attachment_image_url( get_sub_field( 'background' ), 'crb_full_width' );
$video_url  = get_sub_field( 'video_url' );
$gradient   = get_sub_field( 'gradient' );

if ( empty( $video_url ) ) {
	return;
}
?>

<section class="section">
	<?php if ( $gradient ) : ?>
		<div class="background"></div><!-- /.background -->
	<?php endif; ?>

	<?php if ( ! empty( $title ) ) : ?>
		<header class="section__head section__head--small fadeup animate">
			<div class="container">
				<h3>
					<?php echo nl2br( esc_html( $title ) ); ?>
				</h3>
			</div><!-- /.container -->
		</header><!-- /.section__head -->
	<?php endif; ?>

	<div class="section__body section__body--upper">
		<div class="video fadeup animate">
			<div class="container">
				<div class="video__body">
					<div class="video__image" style="background-image: url(<?php echo esc_url( $background ); ?>);"></div><!-- /.video__image -->

					<a href="<?php echo esc_url( $video_url ); ?>" class="btn-play">
						<i class="ico-play"></i>
					</a>
				</div><!-- /.video__body -->
			</div><!-- /.container -->
		</div><!-- /.video -->
	</div><!-- /.section__body -->
</section><!-- /.section -->
