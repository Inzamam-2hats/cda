<?php
$text = get_field( 'other_eligible_text', 'option' );

if ( empty( $text ) ) {
	return;
}
?>

<div class="modal modal--other-eligible">
	<div class="modal__body">
		<a href="#" class="btn-close-modal btn-close-modal--blue">
			<span></span>

			<span></span>
		</a>

		<div class="modal__content">
			<div class="container">
				<div class="row">
					<div class="col-md-10 offset-md-1 col-lg-6 offset-lg-3">
						<div class="modal__inner text-center">
							<?php echo crb_content( crb_replace_char_with( $text, '*', 'span', 'program-title' ) ); ?>
						</div><!-- /.modal__inner -->
					</div><!-- /.col-lg-6 offset-lg-3 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.modal__content -->
	</div><!-- /.modal__body -->
</div><!-- /.modal -->
