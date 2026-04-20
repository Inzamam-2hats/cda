<?php
$title = get_field( 'donate_title', 'option' );
$text  = get_field( 'donate_text', 'option' );
$form  = get_field( 'donate_form', 'option' );

if ( empty( $form ) ) {
	return;
}
?>

<div class="modal modal--form">
	<div class="modal__body">
		<a href="#" class="btn-close-modal">
			<span></span>

			<span></span>
		</a>

		<?php if ( ! empty( $title ) ) : ?>
			<h3><?php echo esc_html( $title ); ?></h3>
		<?php endif; ?>

		<?php echo wpautop( nl2br( esc_html( $text ) ) ); ?>

		<div class="form-modal">
			<?php crb_render_gform( $form, true ); ?>
		</div><!-- /.form-modal -->
	</div><!-- /.modal__body -->
</div><!-- /.modal -->
