<?php while ( have_posts() ) : the_post(); ?>
	<div class="main">
		<?php crb_render_fragment( 'single/intro' ); ?>

		<article class="article">
			<div class="container container--xs">
				<div class="article__content article__content--animate">
					<?php the_content(); ?>
				</div><!-- /.article__content -->

				<?php crb_render_fragment( 'single/share' ); ?>
			</div><!-- /.container -->
		</article><!-- /.article -->

		<?php if ( have_rows( 'sections' ) ) : ?>
			<?php while ( have_rows( 'sections' ) ) : the_row(); ?>
				<?php include( locate_template( 'fragments/sections/' . get_row_layout() . '.php' ) ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div><!-- /.main -->
<?php endwhile; ?>
