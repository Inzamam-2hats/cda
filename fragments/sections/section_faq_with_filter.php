<?php
$text          = get_sub_field( 'text' );
$button        = get_sub_field( 'button' );
$gradient      = get_sub_field( 'gradient' );
$faq_programs  = crb_get_faq_program_data();
$program_keys  = array_keys( $faq_programs );
$first_program = $program_keys[0] ?? '';

if ( empty( $faq_programs ) ) {
	return;
}
?>

<section class="section section--plain section--faq section--faq-filter">
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
		<div class="faq-filter fadeup animate">
			<div class="container container--xs">
				<div class="faq-filter__programs">
					<ul class="list-resourses d-flex faq-filter__list">
						<?php foreach ( $faq_programs as $program_slug => $program ) : ?>
							<li>
								<a
									href="#"
									class="faq-filter__btn faq-filter__btn--program <?php echo $program_slug === $first_program ? 'is-active' : ''; ?>"
									data-program="<?php echo esc_attr( $program_slug ); ?>"
								>
									<?php echo esc_html( $program['label'] ); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div><!-- /.faq-filter__programs -->

				<?php foreach ( $faq_programs as $program_slug => $program ) : ?>
					<?php
					$categories      = $program['categories'] ?? [];
					$first_category  = $categories[0]['slug'] ?? '';
					$has_categories  = count( $categories ) > 1;
					$is_first_program = $program_slug === $first_program;
					?>

					<?php if ( $has_categories ) : ?>
						<div
							class="faq-filter__categories <?php echo $is_first_program ? 'is-active' : ''; ?>"
							data-program="<?php echo esc_attr( $program_slug ); ?>"
							<?php echo $is_first_program ? '' : 'hidden'; ?>
						>
							<ul class="faq-filter__grid faq-filter__grid--categories">
								<?php foreach ( $categories as $category ) : ?>
									<li class="faq-filter__grid-item">
										<a
											href="#"
											class="faq-filter__btn faq-filter__btn--category <?php echo ( $is_first_program && $category['slug'] === $first_category ) ? 'is-active' : ''; ?>"
											data-program="<?php echo esc_attr( $program_slug ); ?>"
											data-category="<?php echo esc_attr( $category['slug'] ); ?>"
										>
											<?php echo esc_html( $category['label'] ); ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div><!-- /.faq-filter__categories -->
					<?php endif; ?>
				<?php endforeach; ?>
			</div><!-- /.container -->
		</div><!-- /.faq-filter -->

		<div class="accordion fadeup animate">
			<div class="container container--xs">
				<?php foreach ( $faq_programs as $program_slug => $program ) : ?>
					<?php foreach ( $program['categories'] as $category_index => $category ) : ?>
						<?php
						$is_active_panel = $program_slug === $first_program && $category_index === 0;
						?>

						<div
							class="accordion__inner faq-filter__panel <?php echo $is_active_panel ? 'is-active' : ''; ?>"
							data-program="<?php echo esc_attr( $program_slug ); ?>"
							data-category="<?php echo esc_attr( $category['slug'] ); ?>"
							<?php echo $is_active_panel ? '' : 'hidden'; ?>
						>
							<?php foreach ( $category['faqs'] as $faq ) : ?>
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
										<?php echo wp_kses_post( $faq['text'] ); ?>
									</div><!-- /.accordion__body -->
								</div><!-- /.accordion__section -->
							<?php endforeach; ?>
						</div><!-- /.accordion__inner -->
					<?php endforeach; ?>
				<?php endforeach; ?>

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
