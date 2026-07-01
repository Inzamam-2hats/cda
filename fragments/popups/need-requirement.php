<?php
$text = get_field( 'need_requirement_content', 'option' );
?>

<div class="modal modal--need-requirement">
	<div class="modal__body">
		<a href="#" class="btn-close-modal btn-close-modal--blue">
			<span></span>

			<span></span>
		</a>

		<div class="modal__content">
			<div class="container container--sm">
				<div class="modal__inner">
					<?php echo crb_content( $text ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
