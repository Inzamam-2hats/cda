<?php
$text         = get_sub_field( 'text' );
$gradient     = get_sub_field( 'gradient' );
$eligibility_requirement = get_sub_field( 'eligibility_requirement_label' );
$need_requirement = get_sub_field( 'need_requirement_label' );

if ( empty( $text ) ) {
	return;
}
?>

<section class="section section-eligibility">
	<?php if ( $gradient ) : ?>
		<div class="background"></div><!-- /.background -->
	<?php endif; ?>

	<header class="section__head section__head--larger fadeup animate">
		<div class="container">
			<?php echo crb_content( $text ); ?>
			
			<div class="section__links">
				<a href="#" class="js-btn-eligibility-requirement"><?php echo esc_html( $eligibility_requirement ); ?></a>
				<a href="#" class="js-btn-need-requirement"><?php echo esc_html( $need_requirement ); ?></a>
			</div>
		</div><!-- /.container -->
	</header><!-- /.section__head -->
</section><!-- /.section -->
