<?php
$contacts    = get_field( 'contact_text',     'option' );
$footer_cols = get_field( 'footer_cols',      'option' );
$disabled    = get_field( 'socials_disabled', 'option' );
$facebook    = get_field( 'facebook',         'option' );
$instagram   = get_field( 'instagram',        'option' );
$twitter     = get_field( 'twitter',          'option' );
$linkedin    = get_field( 'linkedin',         'option' );
$copyright   = get_field( 'copyright_text',   'option' );
$credits     = get_field( 'credits_text',     'option' );
?>

	<footer class="footer fadeup animate">
		<div class="footer__content">
			<div class="container container--sm">
				<div class="row">
					<?php if ( ! empty( $contacts ) ) : ?>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
							<div class="contacts">
								<?php echo apply_filters( 'the_content', $contacts ); ?>
							</div><!-- /.contacts -->

							<div class="socials hidden-xs">
								<?php crb_render_fragment( 'footer/social-icons', compact( 'facebook', 'instagram', 'twitter', 'linkedin' ) ); ?>
							</div><!-- /.socials -->
						</div><!-- /.col-xs-12 col-sm-12 col-md-4 col-lg-3 -->
					<?php endif; ?>

					<?php if ( ! empty( $footer_cols ) ) : ?>
						<?php foreach ( $footer_cols as $col ) : ?>
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
								<?php if ( ! empty( $col['title'] ) ) : ?>
									<h6>
										<a href="<?php echo esc_url( $col['title']['url'] ); ?>" target="<?php echo ( $col['title']['target'] ); ?>">
											<?php echo esc_html( $col['title']['title'] ) ? : ''; ?>
										</a>
									</h6>
								<?php endif; ?>

								<ul class="list-unstyled">
									<?php foreach ( $col['links'] as $link ) : ?>
										<li>
											<a href="<?php echo esc_url( $link['link']['url'] ); ?>" target="<?php echo esc_attr( $link['link']['target'] ); ?>">
												<?php echo esc_html( $link['link']['title'] ); ?>
											</a>

											<?php if ( ! empty( $link['second_level_links'] ) ) : ?>
												<ul>
													<?php foreach ( $link['second_level_links'] as $second_level_link ) : ?>
														<li>
															<a href="<?php echo esc_url( $second_level_link['link']['url'] ); ?>" target="<?php echo esc_attr( $second_level_link['link']['target'] ); ?>">
																<?php echo esc_html( $second_level_link['link']['title'] ); ?>
															</a>
														</li>
													<?php endforeach; ?>
												</ul>
											<?php endif; ?>
										</li>
									<?php endforeach; ?>
								</ul>
							</div><!-- /.col-xs-12 col-sm-12 col-md-2 -->
						<?php endforeach; ?>
					<?php endif; ?>

					<?php if ( ! empty( ! $disabled ) ) : ?>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
							<div class="socials hidden-lg">
								<?php crb_render_fragment( 'footer/social-icons', compact( 'facebook', 'instagram', 'twitter', 'linkedin' ) ); ?>
							</div><!-- /.socials -->
						</div><!-- /.col-xs-12 col-sm-12 col-md-4 col-lg-3 -->
					<?php endif; ?>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.footer__content -->

		<?php if ( ! empty( $copyright ) || ! empty( $credits ) ) : ?>
			<div class="footer__bar">
				<div class="container container--sm">
					<?php if ( ! empty( $copyright ) ) : ?>
						<div class="copyright">
							<?php echo wpautop( do_shortcode( $copyright ) ); ?>
						</div><!-- /.copyright -->
					<?php endif; ?>

					<div class="credits">
						<a href="http://blvr.com/" target="_blank">
							Site by BLVR
						</a>
					</div><!-- /.credits -->
				</div><!-- /.container -->
			</div><!-- /.footer__bar -->
		<?php endif; ?>
	</footer><!-- /.footer -->

	<?php crb_render_fragment( 'popups/donate' ); ?>

	<?php crb_render_fragment( 'popups/info' ); ?>

	<?php crb_render_fragment( 'popups/eligibility-requirement' ); ?>

	<?php crb_render_fragment( 'popups/need-requirement' ); ?>

	<?php crb_render_fragment( 'popups/eligible' ); ?>

	<?php crb_render_fragment( 'popups/not-eligible' ); ?>

	<?php crb_render_fragment( 'popups/other-eligible' ); ?>
</div><!-- /.wrapper -->

<script>
    (function(){
        var s    = document.createElement('script');
        var h    = document.querySelector('head') || document.body;
        s.src    = 'https://acsbapp.com/apps/app/dist/js/app.js';
        s.async  = true;
        s.onload = function(){
            acsbJS.init();
        };
        h.appendChild(s);
    })();
    </script>