<?php
$index   = 0;
$counter = 0;
?>

<div class="main">
	<section class="section">
		<header class="section__head">
			<div class="container">
				<h3 class="section__title">
					<?php crb_the_title(); ?>
				</h3><!-- /.section__title -->
			</div><!-- /.container -->
		</header><!-- /.section__head -->

		<div class="section__body">
			<?php if ( have_posts() ) : ?>
				<div class="profiles">
					<div class="container container--sm">
						<div class="row">
							<?php while ( have_posts() ) : the_post(); ?>
								<?php
								if ( $index % 3 === 0 ) {
									$counter++;
								}
								?>

								<div class="col-sm-12 col-md-4 fadeup animate" data-group="<?php echo esc_attr( $counter ); ?>">
									<div class="profile">
										<?php if ( has_post_thumbnail() ) : ?>
											<div class="profile__image">
												<a href="<?php the_permalink(); ?>">
													<?php the_post_thumbnail( 'crb_feature_image' ); ?>

													<span class="btn btn--blue">
														<span><?php _e( 'Read More', 'sage' ); ?></span>
													</span>
												</a>
											</div><!-- /.profile__image -->
										<?php endif; ?>

										<div class="profile__content">
											<h5>
												<a href="<?php the_permalink(); ?>">
													<?php the_title(); ?>
												</a>
											</h5>

											<?php the_excerpt(); ?>
										</div><!-- /.profile__content -->
									</div><!-- /.profile -->
								</div><!-- /.col-sm-12 col-md-3 -->

								<?php $index++; ?>
							<?php endwhile; ?>
						</div><!-- /.row -->
					</div><!-- /.container container-/-sm -->
				</div><!-- /.profiles -->
			<?php else : ?>
				<div class="error-message">
					<h4>
						<?php _e( 'Sorry, no posts matched your criteria', 'sage' ); ?>
					</h4>

					<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
						<?php _e( 'Return to Blog', 'sage' ); ?>
					</a>
				</div><!-- /.error-message -->
			<?php endif; ?>
		</div><!-- /.section__body -->
	</section><!-- /.section -->

	<?php
	carbon_pagination('posts', array(
		'wrapper_before'         => '<ul class="paging d-flex justify-content-center">',
		'wrapper_after'          => '</ul>',
		'enable_prev'            => false,
		'enable_next'            => false,
		'enable_numbers'         => true,
		'numbers_wrapper_before' => '',
		'numbers_wrapper_after'  => '',
		'current_number_html'    => '<li class="active"><a href="{URL}">{PAGE_NUMBER}</a></li>',
	) );
	?>
</div><!-- /.main -->
