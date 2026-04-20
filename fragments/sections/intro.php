<?php
$background = wp_get_attachment_image_url( get_sub_field( 'background' ), 'crb_full_width' );
$text       = get_sub_field( 'text' );
$buttons    = get_sub_field( 'buttons' );
?>

<div class="intro <?php echo ( ! is_front_page() ) ? 'intro--plain' : ''; ?>">
	<div class="container-fluid">
		<div class="intro__inner">
			<div class="intro__image-container">
				<div class="intro__image" style="background-image: url(<?php echo esc_url( $background ); ?>);">
				</div><!-- /.intro__image -->
			</div><!-- /.intro__image-container -->

			<div class="intro__content">
				<?php echo crb_content( $text ); ?>

				<?php if ( ! empty( $buttons ) ) : ?>
					<?php foreach ( $buttons as $button ) : ?>
						<a href="<?php echo esc_url( $button['link']['url'] ); ?>" class="btn <?php echo esc_attr( $button['type'] ); ?>" target="<?php echo esc_attr( $button['link']['target'] ); ?>">
							<span><?php echo esc_html( $button['link']['title'] ); ?></span>
						</a>
					<?php endforeach; ?>
				<?php endif; ?>
			</div><!-- /.intro__content -->
		</div><!-- /.intro__inner -->
	</div><!-- /.container-fluid -->
</div><!-- /.intro -->
