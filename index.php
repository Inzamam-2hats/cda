<?php $categories = get_categories(); ?>

<div class="main">
	<section class="section section--plain">
		<header class="section__head">
			<div class="container">
				<?php crb_the_title( '<h3>', '</h3>' ); ?>
			</div><!-- /.container -->
		</header><!-- /.section__head -->

		<div class="section__body">
			<div class="links">
				<div class="container container--sm">
					<div class="row">
						<?php foreach ( $categories as $category ) : ?>
							<?php
							if ( $category->slug === 'uncategorized' ) {
								continue;
							}
							$category_archive_link = get_category_link( $category->term_id );

							$args = array(
								'post_type'        => 'post',
								'category__in'     => $category->term_id,
								'posts_per_page'   => 12
							);
							?>

							<div class="col-sm-12 col-md-3">
								<div class="links__head">
									<h5><?php echo esc_html( $category->name ); ?></h5>
								</div><!-- /.links__head -->

								<div class="links__body">
									<ul>
										<?php
										query_posts($args);
										if (have_posts()) {
											while (have_posts()) {
												the_post(); ?>

												<li>
													<a href="<?php echo get_the_permalink(); ?>" class="btn-updates">
														<?php the_title(); ?>
													</a>
												</li>

												<?php
											}
										}
										?>
									</ul>
								</div><!-- /.links__body -->
							</div><!-- /.col-sm-12 col-md-3 -->
						<?php endforeach; ?>
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.links -->
		</div><!-- /.section__body -->
	</section><!-- /.section -->
</div><!-- /.main -->
