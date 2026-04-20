<?php
$testimonial_ids = get_sub_field( 'testimonials' );
$gradient        = get_sub_field( 'gradient' );

if ( empty( $testimonial_ids ) ) {
	return;
}

$testimonial_query = new WP_Query( [
	'post_type'      => 'crb_testimonial',
	'posts_per_page' => -1,
	'post__in'       => $testimonial_ids,
	'orderby'        => 'post__in',
] );

if ( $testimonial_query->found_posts === 0 ) {
	return;
}
?>

<div class="slider-testimonials fadeup animate">
	<?php if ( $gradient ) : ?>
		<div class="background"></div><!-- /.background -->
	<?php endif; ?>

	<div class="slider__clip">
		<div class="slider__slides">
			<?php while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>
				<div class="slider__slide">
					<div class="testimonial">
						<div class="container">
							<i class="ico-quotes"></i>

							<?php the_content(); ?>

							<span><?php the_title(); ?></span>
						</div><!-- /.container -->
					</div><!-- /.testimonial -->
				</div><!-- /.slider__slide -->
			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>
		</div><!-- /.slider__slides -->

		<div class="slider__actions"></div><!-- /.slider__actions -->
	</div><!-- /.slider__clip -->
</div><!-- /.slider-testimonials -->
