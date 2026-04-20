<?php
$background = wp_get_attachment_image_url( get_field( 'single_background' ), 'crb_full_width' );
?>

<div class="intro intro--plain">
	<div class="container-fluid">
		<div class="intro__inner">
			<div class="intro__image-container">
				<div class="intro__image" style="background-image: url(<?php echo esc_url( $background ); ?>);"></div><!-- /.intro__image -->
			</div><!-- /.intro__image-container -->

			<div class="intro__content">
				<p><?php the_time( 'F j, Y ' ); ?></p>

				<h2><?php the_title(); ?></h2>
			</div><!-- /.intro__content -->
		</div><!-- /.intro__inner -->
	</div><!-- /.container-fluid -->
</div><!-- /.intro -->
