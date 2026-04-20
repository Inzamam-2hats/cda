<?php
$text                 = get_sub_field( 'form_title' );
$program              = get_sub_field( 'cda_program' );
$button               = get_sub_field( 'form_button_label' );
$family_size_title    = get_sub_field( 'family_size_title' );
$family_size_hint     = get_sub_field( 'family_size_hint' );
$family_size_options  = get_sub_field( 'family_size_options' );
$income_title         = get_sub_field( 'income_title' );
$income_hint          = get_sub_field( 'income_hint' );
$needs_title          = get_sub_field( 'needs_title' );
$needs_hint           = get_sub_field( 'needs_hint' );
$needs_options        = get_sub_field( 'needs_options' );
?>

<div class="form-payment form-payment--large text-center fadeup animate" id="eligibility">
	<div class="container">
		<div class="form__inner">
			<form action="?" method="post" class="form-eligibility" data-program="<?php echo esc_attr( $program ); ?>">
				<?php if ( ! empty( $text ) ) : ?>
					<div class="form__head">
						<?php echo crb_content( $text ); ?>
					</div><!-- /.form__head -->
				<?php endif; ?>

				<div class="form__body">
					<div class="form__row">
						<div class="form__cols">
							<div class="form__col form__col--1of3">
								<?php if ( ! empty( $family_size_title ) ) : ?>
									<label for="size" class="form__label"><?php echo esc_html( $family_size_title ); ?></label>
								<?php endif; ?>

								<div class="form__controls">
									<div class="select">
										<select name="size" id="size" class="size-select">
											<?php foreach ( $family_size_options as $index => $option ) : ?>
												<option value="<?php echo $index + 1; ?>" data-income="<?php echo esc_attr( $option['income'] ); ?>">
													<?php echo esc_html( $option['value'] ); ?>
												</option>
											<?php endforeach; ?>
										</select>
									</div><!-- /.select -->
								</div><!-- /.form__controls -->

								<?php if ( ! empty( $family_size_hint ) ) : ?>
									<div class="form__hint">
										<a href="#">
											<?php echo esc_html( $family_size_hint['title'] ); ?>

											<div class="form__hint-inner">
												<?php echo crb_content( $family_size_hint['text'] ); ?>
											</div>
										</a>
									</div><!-- form__hint -->
								<?php endif; ?>
							</div><!-- /.form__col form__col-/-1of3 -->

							<div class="form__col form__col--1of3">
								<?php if ( ! empty( $income_title ) ) : ?>
									<label for="income" class="form__label"><?php echo esc_html( $income_title ); ?></label>
								<?php endif; ?>

								<div class="form__controls">
									<input type="text" class="field js-money-field" name="income" id="income" required>

									<strong>$</strong>
								</div><!-- /.form__controls -->

								<?php if ( ! empty( $income_hint ) ) : ?>
									<div class="form__hint">
										<a href="#">
											<?php echo esc_html( $income_hint['title'] ); ?>

											<div class="form__hint-inner">
												<?php echo crb_content( $income_hint['text'] ); ?>
											</div>
										</a>
									</div><!-- form__hint -->
								<?php endif; ?>
							</div><!-- /.form__col form__col-/-1of3 -->

							<div class="form__col form__col--1of3">
								<?php if ( ! empty( $needs_title ) ) : ?>
									<label for="need" class="form__label"><?php echo esc_html( $needs_title ); ?></label>
								<?php endif; ?>

								<div class="form__controls">
									<div class="select">
										<select name="need" id="need" class="need-select" required>
											<option value="" selected disabled><?php _e( 'Select', 'sage' ); ?></option>

											<?php foreach ( $needs_options as $index => $option ) : ?>
												<option value="<?php echo esc_html( $option['text'] ); ?>"><?php echo esc_html( $option['text'] ); ?></option>
											<?php endforeach; ?>
										</select>
									</div><!-- /.select -->
								</div><!-- /.form__controls -->

								<?php if ( ! empty( $needs_hint ) ) : ?>
									<div class="form__hint">
										<a href="#">
											<?php echo esc_html( $needs_hint['title'] ); ?>

											<div class="form__hint-inner">
												<?php echo crb_content( $needs_hint['text'] ); ?>
											</div>
										</a>
									</div><!-- form__hint -->
								<?php endif; ?>
							</div><!-- /.form__col form__col-/-1of3 -->
						</div><!-- /.form__cols -->
					</div><!-- /.form__row -->
				</div><!-- /.form__body -->

				<div class="form__actions">
					<button type="submit" class="form__btn btn js-form-btn">
						<?php echo esc_html( $button ) ? : 'Submit'; ?>
					</button>
				</div><!-- /.form__actions -->
			</form>
		</div><!-- /.form__inner -->
	</div><!-- /.container -->
</div><!-- /.form-payment -->
