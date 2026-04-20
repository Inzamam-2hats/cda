<?php
$text     = get_sub_field( 'text' );
$form     = get_sub_field( 'form' );
$contacts = get_sub_field( 'contacts' );
$gradient = get_sub_field( 'gradient' );
?>

<section class="section section--plain section--contacts">
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
		<?php if ( ! empty( $form ) ) : ?>
			<div class="form-contacts">
				<div class="container">
					<?php crb_render_gform( $form, true ); ?>
				</div><!-- /.container -->
			</div><!-- /.form-contacts -->
		<?php endif; ?>

		<?php if ( ! empty( $contacts ) ) : ?>
			<div class="contacts fadeup animate">
				<div class="container container--sm">
					<div class="row">
						<?php foreach ( $contacts as $contact ) : ?>
							<div class="col-sm-12 col-md-6 col-lg-3">
								<?php echo crb_content( $contact['text'] ); ?>
							</div><!-- /.col-sm-12 col-md-6 col-lg-3 -->
						<?php endforeach; ?>
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.contacts -->
		<?php endif; ?>
	</div><!-- /.section__body -->
</section><!-- /.section section-/-plain -->
