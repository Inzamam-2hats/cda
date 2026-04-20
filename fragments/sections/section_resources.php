<?php
$text     = get_sub_field( 'text' );
$links    = get_sub_field( 'resources' );
$gradient = get_sub_field( 'gradient' );
$style    = '';

if ( $gradient ) {
	$style = 'style="background: #ebebeb;"';
}

if ( empty( $links ) ) {
	return;
}
?>

<section class="section section--plain">
	<?php if ( $gradient ) : ?>
		<div class="background"></div><!-- /.background -->
	<?php endif; ?>

	<?php if ( ! empty( $text ) ) : ?>
		<header class="section__head section__head--grey">
			<div class="container">
				<?php echo crb_content( $text ); ?>
			</div><!-- /.container -->
		</header><!-- /.section__head -->
	<?php endif; ?>

	<div class="section__body">
		<div class="resources resources--small">
			<div class="container container--xs">
				<ul class="list-resourses d-flex">
					<?php foreach ( $links as $link ) : ?>
						<li>
							<a href="<?php echo esc_url( $link['resource']['url'] ); ?>" target="<?php echo esc_attr( $link['resource']['target'] ); ?>" <?php echo $style; ?>>
								<?php echo esc_html( $link['resource']['title'] ) ? : 'Learn More'; ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul><!-- /.list-resourses -->
			</div><!-- /.container -->
		</div><!-- /.resources -->
	</div><!-- /.section__body -->
</section><!-- /.section -->
