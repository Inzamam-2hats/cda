<?php
$index   = 0;
$counter = 0;
?>

<div class="main">
	<div class="section">
		<div class="section__head">
			<div class="container">
				<h3 class="section__title">
					<?php echo crb_the_title(); ?>
				</h3><!-- /.section__title -->
			</div><!-- /.container -->
		</div><!-- /.section__head -->

		<div class="section__body">
			<div class="container">
				<?php if ( have_posts() ) : ?>
					<div class="row">
						<?php while (have_posts()) : the_post(); ?>
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
												<?php the_post_thumbnail( 'crb_member_image' ); ?>

												<span class="btn btn--blue">
													<span><?php _e( 'Read Bio', 'sage' ); ?></span>
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
				<?php else : ?>
					<div class="error-message">
						<h4>
							<?php _e( 'Sorry, no posts matched your search criteria', 'sage' ); ?>
						</h4>

						<?php get_search_form(); ?>
					</div><!-- /.error-message -->
				<?php endif; ?>
			</div><!-- /.container -->
		</div><!-- /.section__body -->
	</div><!-- /.section -->
</div><!-- /.main -->
