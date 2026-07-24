<?php
$items                  = get_sub_field( 'items' );
$gradient               = get_sub_field( 'gradient' );
$block_additional_class = get_sub_field( 'block_additional_class' );

if ( empty( $items ) || ! is_array( $items ) ) {
	return;
}

$sections = [];
$used_ids = [];

foreach ( $items as $item ) {
	$category = trim( (string) ( $item['category'] ?? '' ) );
	$title    = trim( (string) ( $item['title'] ?? '' ) );
	$content  = $item['content'] ?? '';

	if ( '' === $title && '' === $category ) {
		continue;
	}

	$filter_label = '' !== $category ? $category : $title;
	$id           = sanitize_title( $filter_label );

	if ( '' === $id ) {
		continue;
	}

	$base = $id;
	$i    = 2;

	while ( in_array( $id, $used_ids, true ) ) {
		$id = $base . '-' . $i;
		$i++;
	}

	$used_ids[] = $id;

	$sections[] = [
		'id'      => $id,
		'label'   => $filter_label,
		'title'   => '' !== $title ? $title : $filter_label,
		'content' => $content,
	];
}

if ( empty( $sections ) ) {
	return;
}
?>

<section class="section section--text-filter <?php echo esc_attr( $block_additional_class ); ?>">
	<?php if ( $gradient ) : ?>
		<div class="background <?php echo esc_attr( $block_additional_class ); ?>"></div><!-- /.background -->
	<?php endif; ?>

	<div class="section__body fadeup animate">
		<div class="text-filter">
			<div class="container">
				<ul class="text-filter__list">
					<?php foreach ( $sections as $index => $item ) : ?>
						<li class="text-filter__item">
							<a
								href="#<?php echo esc_attr( $item['id'] ); ?>"
								class="text-filter__btn js-btn-scroll <?php echo 0 === $index ? 'is-active' : ''; ?>"
							>
								<?php echo esc_html( $item['label'] ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div><!-- /.container -->
		</div><!-- /.text-filter -->

		<div class="container">
			<?php foreach ( $sections as $item ) : ?>
				<div class="text-filter__block" id="<?php echo esc_attr( $item['id'] ); ?>">
					<h2><?php echo esc_html( $item['title'] ); ?></h2>

					<?php if ( ! empty( $item['content'] ) ) : ?>
						<div class="text-filter__content">
							<?php echo wp_kses_post( $item['content'] ); ?>
						</div><!-- /.text-filter__content -->
					<?php endif; ?>
				</div><!-- /.text-filter__block -->
			<?php endforeach; ?>
		</div><!-- /.container -->
	</div><!-- /.section__body -->
</section><!-- /.section -->
