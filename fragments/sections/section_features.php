<?php
$text     = get_sub_field( 'text' );
$features = get_sub_field( 'features' );

if ( empty( $features ) ) {
	return;
}
?>

<div class="section section--decorated">
	<?php if ( ! empty( $text ) ) : ?>
		<header class="section__head fadeup animate">
			<div class="container">
				<?php echo crb_content( $text ); ?>
			</div><!-- /.container -->
		</header><!-- /.section__head -->
	<?php endif; ?>

	<div class="section__body">
		<?php foreach ( $features as $index => $feature ) : ?>
			<div class="article-link fadeup animate <?php echo ( $index % 2 !== 0 ) ? 'article-link--right' : ''; ?>">
				<div class="container container--xs">
					<div class="row align-items-center">
						<div class="col-sm-12 col-md-6 <?php echo ( $index % 2 === 0 ) ? 'order-last order-md-first' : 'order-2'; ?>">
							<div class="article__content">
								<?php if ( ! empty( $feature['title'] ) ) : ?>
									<h4>
										<a href="<?php echo esc_url( $feature['button']['url'] ) ? : '#'; ?>">
											<?php echo esc_html( $feature['title'] ); ?>
										</a>
									</h4>
								<?php endif; ?>

								<?php echo wpautop( $feature['text'] ); ?>

								<?php if ( $feature['button'] ) : ?>
									<a href="<?php echo esc_url( $feature['button']['url'] ); ?>" class="btn btn--blue" target="<?php echo esc_attr( $feature['button']['target'] ); ?>">
										<span><?php echo esc_html( $feature['button']['title'] ) ? : 'Learn More'; ?></span>
									</a>
								<?php endif; ?>
							</div><!-- /.article__content -->
						</div><!-- /.col-sm-12 col-md-6 -->

						<?php if ( $feature['button'] ) : ?>
							<div class="col-sm-12 col-md-6">
								<div class="article__image">
									<a href="<?php echo esc_url( $feature['button']['url'] ); ?>">
										<?php echo wp_get_attachment_image( $feature['image'], 'crb_feature_image' ); ?>
									</a>
								</div><!-- /.article__image -->
							</div><!-- /.col-sm-12 col-md-6 -->
						<?php endif; ?>
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.article-link -->
		<?php endforeach; ?>

		<div class="section__decoration">
			<img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/butterfly.png" alt="">
		</div><!-- /.section__decoration -->
	</div><!-- /.section__body -->

	<div class="section__background"></div><!-- /.section__background -->
</div><!-- /.section -->
