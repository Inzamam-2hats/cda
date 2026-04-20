<?php
$gallery_query = new WP_Query( [
	'post_type'      => 'crb_tour',
	'posts_per_page' => -1,
] );
?>

<div class="tour tour--1 modal modal--tour">
	<a href="#" class="btn-close-modal">
		<span></span>

		<span></span>
	</a>

	<div class="tour__content">
		<div id="tour__inner" class="tour__inner"></div><!-- /.tour__inner -->
	</div><!-- /.tour__content -->

	<div class="tour__images" id="sceneList">
		<ul class="scenes list-unstyled">
			<?php while ( $gallery_query->have_posts() ) : $gallery_query->the_post(); ?>
				<?php $image = wp_get_attachment_image_url( get_field( 'three_sixty_image' ), 'crb_three_sixty_gallery' ); ?>

				<li data-id="<?php echo esc_attr( get_the_ID() ); ?>">
					<a href="#" class="scene" data-panorama="<?php echo esc_url( $image ); ?>">
						<span class="text">
							<?php the_title(); ?>
						</span>
					</a>
				</li>
			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>
		</ul>
	</div>
</div><!-- /.tour -->
