<?php
$text         = get_sub_field( 'text' );
$type         = get_sub_field( 'type' );
$button       = get_sub_field( 'button' );
$popup_button = get_sub_field( 'popup_button_label' );
$popup_form   = get_sub_field( 'popup_form' );
$popup_text   = get_sub_field( 'popup_text' );
$mail_button  = get_sub_field( 'mail_button_label' );
$mail_subject = get_sub_field( 'mail_subject' );
$mail_body    = get_sub_field( 'mail_body' );
$gradient     = get_sub_field( 'gradient' );
?>

<div class="callout callout--alt text-center fadeup animate">
	<?php if ( $gradient ) : ?>
		<div class="background"></div><!-- /.background -->
	<?php endif; ?>

	<div class="container container--xs">
		<div class="callout__inner">
			<div class="callout__content">
				<?php echo crb_content( $text ) ? : ''; ?>

				<?php if ( $type === 'mail' ) : ?>
					<a href="mailto:?subject=<?php echo esc_attr($mail_subject); ?>&body=<?php echo esc_attr($mail_body); ?>" class="btn btn--blue">
						<span><?php echo esc_html( $mail_button ) ? : ''; ?></span>
					</a>
                <?php elseif ( $type === 'link' ) : ?>
                    <a href="<?php echo esc_url( $button['url'] ); ?>" class="btn btn--blue" target="<?php echo esc_attr( $button['target'] ) ? : ''; ?>">
                        <span><?php echo esc_html( $button['title'] ) ? : ''; ?></span>
                    </a>
				<?php elseif ( $type === 'popup' ) : ?>
					<a href="#" class="btn btn--blue btn-form-modal">
						<span><?php echo esc_html( $popup_button ) ? : 'Learn More'; ?></span>
					</a>
				<?php endif; ?>
			</div><!-- /.callout__content -->
		</div><!-- /.callout__inner -->
	</div><!-- /.container -->
</div><!-- /.callout -->

<?php if ( $type === 'popup' ) : ?>
	<div class="modal modal--form-secondary">
		<div class="modal__body">
			<a href="#" class="btn-close-modal">
				<span></span>

				<span></span>
			</a>

			<?php echo crb_content( $popup_text ); ?>

			<div class="form-modal">
				<?php crb_render_gform( $popup_form, true ); ?>
			</div><!-- /.form-modal -->
		</div><!-- /.modal__body -->
	</div><!-- /.modal -->
<?php endif; ?>
