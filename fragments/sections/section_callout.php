<?php
$text     = get_sub_field( 'text' );
$button   = get_sub_field( 'button' );
$mail_button_body = get_sub_field( 'mail_button_body' );
$is_mail_button = get_sub_field( 'is_mail_button' );
$gradient = get_sub_field( 'gradient' );

if ( empty( $button ) ) {
	return;
}
?>

<div class="callout text-center fadeup animate">
	<?php if ( $gradient ) : ?>
		<div class="background"></div><!-- /.background -->
	<?php endif; ?>

	<div class="container">
		<div class="callout__content callout__content--grey">
			<?php echo crb_content( $text ); ?>

			<?php if ( $is_mail_button ) : ?>
				<a href="mailto:?subject=<?php the_title(); ?>&body=<?php echo esc_html( $mail_button_body ); ?>" class="btn btn--blue" target="<?php echo esc_attr( $button['target'] ); ?>">
					<span><?php echo ( $button['title'] ) ? : 'Learn More'; ?></span>
				</a>
			<?php else: ?>
				<a href="<?php echo esc_url( $button['url'] ); ?>" class="btn btn--blue" target="<?php echo esc_attr( $button['target'] ); ?>">
					<span><?php echo ( $button['title'] ) ? : 'Learn More'; ?></span>
				</a>
			<?php endif ?>
		</div><!-- /.callout__content -->
	</div><!-- /.container -->
</div><!-- /.callout -->
