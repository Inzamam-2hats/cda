<?php
$post_id  = get_sub_field( 'featured_post' );
$text     = get_sub_field( 'text' );
$gradient = get_sub_field( 'gradient' );

if ( empty( $post_id ) ) {
	return;
}

$featured_post_query = new WP_Query( [
	'post_type'      => 'post',
	'posts_per_page' => -1,
	'post__in'       => $post_id,
] );

if ( $featured_post_query->found_posts === 0 ) {
	return;
}
?>

<section class="section section--beige">
	<?php if ( $gradient ) : ?>
		<div class="background"></div><!-- /.background -->
	<?php endif; ?>

	<div class="container">
		<div class="section__inner">
			<?php if ( ! empty( $text ) ) : ?>
				<header class="section__head section__head--grey fadeup animate">
					<?php echo crb_content( $text ); ?>
				</header><!-- /.section__head -->
			<?php endif; ?>

			<div class="section__body">
				<?php while ( $featured_post_query->have_posts() ) : $featured_post_query->the_post(); ?>
					<?php $caption = get_field( 'featured_image_caption' ); ?>

					<div class="article-small row justify-content-center">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="col-sm-12 col-md-6 col-lg-5 fadeup animate" data-group="1">
								<div class="article__image">
									<?php the_post_thumbnail( 'crb_full_width' ); ?>
								</div><!-- /.article__image -->

								<?php if ( ! empty( $caption ) ) : ?>
									<div class="article__caption">
										<?php echo crb_content( $caption ); ?>
									</div><!-- /.article__caption -->
								<?php endif; ?>
							</div><!-- /.col-sm-12 col-md-6 col-lg-5 -->
						<?php endif; ?>

						<div class="col-sm-12 col-md-6 col-lg-4 fadeup animate" data-group="1">
							<div class="article__content">
								<?php the_content(); ?>
							</div><!-- /.article__content -->
						</div><!-- /.col-sm-12 col-md-6 col-lg-6 -->
					</div><!-- /.article-small row justify-content-center -->
				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>
			</div><!-- /.section__body -->
		</div><!-- /.section__inner -->
	</div><!-- /.container -->
</section><!-- /.section -->
