<?php
$text     = get_sub_field( 'text' );
$faqs     = get_sub_field( 'faqs' );
$button   = get_sub_field( 'button' );
$gradient = get_sub_field( 'gradient' );

if ( empty( $faqs ) ) {
	return;
}
?>

<section class="section section--plain section--faq">
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
		<div class="accordion fadeup animate">
			<div class="container container--xs">
				<div class="accordion__inner">
					<?php foreach ( $faqs as $faq ) : ?>
						<?php
						if ( empty( $faq['title'] ) || empty( $faq['text'] ) ) {
							continue;
						}
						?>

						<div class="accordion__section">
							<div class="accordion__head">
								<h5>
									<a href="#">
										<?php echo esc_html( $faq['title'] ); ?>
									</a>
								</h5>
							</div><!-- /.accordion__head -->

							<div class="accordion__body">
								<?php echo wpautop( nl2br( $faq['text'] ) ); ?>
							</div><!-- /.accordion__body -->
						</div><!-- /.accordion__section -->
					<?php endforeach; ?>
				</div><!-- /.accordion__inner -->

				<?php if ( ! empty( $button ) ) : ?>
					<div class="accordion__actions text-center">
						<a href="<?php echo esc_url( $button['url'] ); ?>" class="btn" target="<?php echo esc_attr( $button['target'] ); ?>">
							<?php echo esc_html( $button['title'] ) ? : 'Learn More'; ?>
						</a>
					</div><!-- /.accordion__actions -->
				<?php endif; ?>
			</div><!-- /.container -->
		</div><!-- /.accordion -->
	</div><!-- /.section__body -->
</section><!-- /.section -->
