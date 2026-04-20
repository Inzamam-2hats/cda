<?php
$title      = get_sub_field( 'title' );
$member_ids = get_sub_field( 'members' );
$gradient   = get_sub_field( 'gradient' );

if ( empty( $member_ids ) ) {
	return;
}

$members_query = new WP_Query( [
	'post_type'      => 'crb_member',
	'posts_per_page' => -1,
	'post__in'       => $member_ids,
	'orderby'        => 'post__in',
] );

if ( $members_query->found_posts === 0 ) {
	return;
}
?>

<section class="section">
	<?php if ( $gradient ) : ?>
		<div class="background"></div><!-- /.background -->
	<?php endif; ?>

	<?php if ( ! empty( $title ) ) : ?>
		<header class="section__head">
			<div class="container">
				<h3 class="section__title"><?php echo esc_html( $title ); ?></h3><!-- /.section__title -->
			</div><!-- /.container -->
		</header><!-- /.section__head -->
	<?php endif; ?>

	<div class="section__body">
		<div class="profiles">
			<div class="container container--sm">
				<div class="row">
					<?php while ( $members_query->have_posts() ) : $members_query->the_post(); ?>
						<?php
						$position = get_field( 'position' );
						?>

						<div class="col-sm-12 col-md-3 fadeup animate" data-group="2">
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

									<?php echo wpautop( esc_html( $position ) ); ?>
								</div><!-- /.profile__content -->
							</div><!-- /.profile -->
						</div><!-- /.col-sm-12 col-md-3 -->
					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>
				</div><!-- /.row -->
			</div><!-- /.container container-/-sm -->
		</div><!-- /.profiles -->
	</div><!-- /.section__body -->
</section><!-- /.section -->
