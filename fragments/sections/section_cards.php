<?php
$text        = get_sub_field('text');
$cards    = get_sub_field('cards');
$gradient    = get_sub_field('gradient');
$top_spacing = get_sub_field('spacing');

if (empty($cards)) {
    return;
}
?>

<section class="section section--cards <?php echo ($top_spacing) ? 'section--large' : ''; ?> section--decorated gap-50">
	<?php if ($gradient) : ?>
		<div class="background"></div><!-- /.background -->
	<?php endif; ?>

	<?php if (! empty($text)) : ?>
		<header class="section__head section__head--grey fadeup animate">
			<div class="container">
				<?php echo crb_content($text); ?>
			</div><!-- /.container -->
		</header><!-- /.section__head -->
	<?php endif; ?>

	<div class="section__body">
		<div class="cards">
			<div class="container container--sm">
				<div class="cards__inner">
					<div class="row justify-content-center">
						<?php foreach ($cards as $index => $card) : ?>
							<?php
                            $link = ! empty($card['link']) ? $card['link'] : array();

						    if (empty($card['icon']) || empty($card['title']) || empty($link['url'])) {
						        continue;
						    }

						    $src         = wp_get_attachment_url($card['icon']);
						    $meta        = wp_get_attachment_metadata($card['icon']);
						    $link_url    = $link['url'];
						    $link_target = ! empty($link['target']) ? $link['target'] : '';
						    $link_text   = ! empty($link['title']) ? $link['title'] : __('View Details', 'sage');
						    $shape_class = 'card-item__icon--shape-' . (($index % 4) + 1);
						    ?>

							<div class="col-sm-12 col-md-6 col-lg-3 fadeup animate" data-group="1">
								<div class="card-item" >
									<figure class="card-item__icon <?php echo esc_attr($shape_class); ?>">
										<img width="<?php echo esc_attr(! empty($meta['width']) ? $meta['width'] / 2 : ''); ?>" src="<?php echo esc_url($src); ?>" alt="">
									</figure><!-- /.card-item__icon -->

									<div class="card-item__content">
										<div class="card-item__title">
											<?php echo crb_content($card['title']); ?>
										</div>

										<a class="btn btn--blue js-btn-nutrition-program" href="<?php echo esc_url($link_url); ?>"<?php echo $link_target ? ' target="' . esc_attr($link_target) . '"' : ''; ?>>
										<span><?php echo esc_html($link_text); ?></span> 
										</a>
									</div><!-- /.card-item__content -->
						</div>
							</div><!-- /.col-sm-12 col-md-6 col-lg-3 -->
						<?php endforeach; ?>
					</div><!-- /.row -->
				</div><!-- /.cards__inner -->
			</div><!-- /.container -->
		</div><!-- /.cards -->
		<div class="section__decoration">
			<img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/butterfly.png" alt="">
		</div><!-- /.section__decoration -->
	</div><!-- /.section__body -->
</section><!-- /.section -->
