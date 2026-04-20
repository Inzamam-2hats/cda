<?php
$index       = 1;
$text        = get_sub_field( 'text' );
$program_ids = get_sub_field( 'programs' );
$gradient    = get_sub_field( 'gradient' );

if ( empty( $program_ids ) ) {
	return;
}

$programs_query = new WP_Query( [
	'post_type'      => 'crb_service',
	'posts_per_page' => -1,
	'post__in'       => $program_ids,
	'orderby'        => 'post__in',
] );

if ( $programs_query->found_posts === 0 ) {
	return;
}
?>

<section class="section section--decorated">
	<?php if ( $gradient ) : ?>
		<div class="background"></div><!-- /.background -->
	<?php endif; ?>

	<?php if ( ! empty( $text ) ) : ?>
		<header class="section__head section__head--thin fadeup animate">
			<div class="container">
				<?php echo crb_content( $text ); ?>
			</div><!-- /.container -->
		</header><!-- /.section__head -->
	<?php endif; ?>

	<div class="section__body section__body--large">
		<?php while ( $programs_query->have_posts() ) : $programs_query->the_post(); ?>
			<div class="article-link <?php echo ( $index % 2 === 0 ) ? 'article-link--right' : ''; ?> fadeup animate">
				<div class="container container--xs">
					<div class="row align-items-center">
						<div class="col-sm-12 col-md-6 <?php echo ( $index % 2 === 0 ) ? 'order-2' : 'order-last order-md-first'; ?>">
							<div class="article__content">
								<h4>
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h4>

								<?php the_excerpt(); ?>

								<a href="<?php the_permalink(); ?>" class="btn btn--blue">
									<span><?php _e( 'Learn More', 'sage' ); ?></span>
								</a>
							</div><!-- /.article__content -->
						</div><!-- /.col-sm-12 col-md-6 -->

						<?php if ( has_post_thumbnail() ) : ?>
							<div class="col-sm-12 col-md-6">
								<div class="article__image">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'crb_feature_image' ); ?>
									</a>
								</div><!-- /.article__image -->
							</div><!-- /.col-sm-12 col-md-6 -->
						<?php endif; ?>
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.article-link -->

			<?php $index++; ?>
		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>

		<div class="section__decoration section__decoration--alt">
			<img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/butterfly.png" alt="">
		</div><!-- /.section__decoration -->
	</div><!-- /.section__body -->
</section><!-- /.section -->
