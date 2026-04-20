<?php while ( have_posts() ) : the_post(); ?>
	<div class="main">
		<section class="section">
			<div class="section__head">
				<div class="container">
					<h2 class="section__title">
						<?php crb_the_title(); ?>
					</h2><!-- /.section__title -->
				</div><!-- /.container -->
			</div><!-- /.section__head -->

			<div class="section__body">
				<div class="container">
					<?php the_content(); ?>
				</div><!-- /.container -->
			</div><!-- /.section__body -->
		</section><!-- /.section -->
	</div><!-- /.main -->
<?php endwhile; ?>
