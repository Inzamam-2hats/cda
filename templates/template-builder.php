<?php
/**
 * Template Name: Flex
 */
?>

<div class="main">
	<?php if ( have_rows( 'sections' ) ) : ?>
		<?php while ( have_rows( 'sections' ) ) : the_row(); ?>
			<?php include( locate_template( 'fragments/sections/' . get_row_layout() . '.php' ) ); ?>
		<?php endwhile; ?>
	<?php endif; ?>
</div><!-- /.main -->
