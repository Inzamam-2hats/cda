<?php
$languages = apply_filters( 'wpml_active_languages', NULL, 'skip_missing=0' );

if ( empty( $languages ) ) {
	return;
}
?>

<div class="header__bar">
	<div class="container-fluid">
		<div class="nav-lang">
			<ul>
				<li class="has-dd">
					<?php foreach ( $languages as $lang ) : ?>
						<?php
						if ( $lang['active'] !== '1' ) {
							continue;
						}
						?>

						<a href="<?php echo esc_url( $lang['url'] ); ?>">
							<?php echo esc_html( $lang['native_name'] ); ?>
						</a>
					<?php endforeach; ?>

					<ul>
						<?php foreach ( $languages as $lang ) : ?>
							<?php
							if ( $lang['active'] === '1' ) {
								continue;
							}
							?>

							<li>
								<a href="<?php echo esc_url( $lang['url'] ); ?>">
									<?php echo esc_html( $lang['translated_name'] ); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</li>
			</ul>
		</div><!-- /.nav-lang -->
	</div><!-- /.container-fluid -->
</div><!-- /.header__bar -->
