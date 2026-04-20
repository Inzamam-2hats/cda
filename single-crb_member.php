<?php
$position = get_field( 'position' );
$bio      = get_field( 'bio' );
?>

<div class="main">
	<article class="article-bio">
		<div class="container container--sm">
			<div class="row">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="col-md-3 col-lg-3 offset-lg-1">
						<div class="article__image">
							<?php the_post_thumbnail( 'crb_member_image' ); ?>
						</div><!-- /.article__image -->
					</div><!-- /.col-md-3 col-lg-3 offset-lg-1 -->
				<?php endif; ?>

				<div class="col-md-9 col-lg-7">
					<div class="article__content">
						<h5><?php the_title(); ?></h5>

						<h6><?php echo esc_html( $position ); ?></h6>

						<?php echo crb_content( $bio ); ?>
					</div><!-- /.article__content -->
				</div><!-- /.col-md-9 col-lg-7 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</article><!-- /.article-bio -->
</div><!-- /.main -->
