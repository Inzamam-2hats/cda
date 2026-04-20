<?php
$text    = get_field('info_text', 'option');
$buttons = get_field('info_buttons', 'option');
?>

<div class="modal modal--info">
	<div class="modal__body">
		<a href="#" class="btn-close-modal btn-close-modal--blue">
			<span></span>

			<span></span>
		</a>

		<div class="modal__content">
			<div class="container container--sm">
				<div class="row">
					<div class="col-lg-9 offset-lg-2">
						<div class="modal__inner">
							<?php echo crb_content( $text ); ?>

							<?php if ( ! empty( $buttons ) ) : ?>
								<div class="modal__actions">
									<?php foreach ( $buttons as $button ) : ?>
										<a href="<?php echo esc_url( $button['link']['url'] ); ?>" class="btn <?php echo esc_attr( $button['type'] ); ?>" target="<?php echo esc_attr( $button['link']['target'] ); ?>">
											<?php echo esc_html( $button['link']['title'] ); ?>
										</a>
									<?php endforeach; ?>
								</div><!-- /.modal__actions -->
							<?php endif; ?>
						</div><!-- /.modal__inner -->
					</div><!-- /.col-lg-8 offset-lg-2 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.modal__content -->
	</div><!-- /.modal__body -->
</div><!-- /.modal -->
