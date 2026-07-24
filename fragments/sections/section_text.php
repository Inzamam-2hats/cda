<?php
$text     = get_sub_field('text');
$gradient = get_sub_field('gradient');
$block_additional_class = get_sub_field('block_additional_class');
if (empty($text)) {
    return;
}
?>

<section class="section <?php echo $block_additional_class; ?>">
	<?php if ($gradient) : ?>
		<div class="background <?php echo $block_additional_class; ?>"></div><!-- /.background -->
	<?php endif ?>

	<header class="section__head section__head--grey fadeup animate <?php echo $block_additional_class; ?>">
		<div class="container">
			<?php echo $text; ?>
		</div><!-- /.container -->
	</header><!-- /.section__head -->
</section><!-- /.section -->
