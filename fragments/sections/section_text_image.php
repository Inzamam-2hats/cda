<?php
$image    = get_sub_field( 'image' );
$text     = get_sub_field( 'text' );
$url      = get_sub_field( 'image_link' );
$blank    = get_sub_field( 'blank' );
$reversed = get_sub_field( 'reversed' );
$gradient = get_sub_field( 'gradient' );

if ( empty( $text ) ) {
	return;
}
?>

<div class="article-link article-link--right article-link--large article-link--first <?php echo ( $reversed ) ? 'article-link--reversed' : ''; ?> fadeup animate">
	<?php if ( $gradient ) : ?>
		<div class="background"></div><!-- /.background -->
	<?php endif ?>

	<div class="container container--xs">
		<div class="row align-items-center">
			<div class="col-sm-12 col-md-6 col-text">
				<div class="article__content article__content--grey">
					<?php echo crb_content( $text ); ?>
				</div><!-- /.article__content -->
			</div><!-- /.col-sm-12 col-md-6 -->

			<?php if ( ! empty( $image ) ) : ?>
				<div class="col-sm-12 col-md-6 col-image">
					<div class="article__image">
						<?php if ( ! empty( $url ) ) : ?>
							<a href="<?php echo esc_url( $url ); ?>" target="<?php echo ( $blank ) ? '_blank' : ''; ?>">
						<?php endif; ?>
							<?php echo wp_get_attachment_image( $image, 'crb_feature_image' ); ?>
						<?php if ( ! empty( $url ) ) : ?>
							</a>
						<?php endif; ?>
					</div><!-- /.article__image -->
				</div><!-- /.col-sm-12 col-md-6 -->
			<?php endif; ?>
		</div><!-- /.row align-items-center -->
	</div><!-- /.container -->
</div><!-- /.article-link -->
