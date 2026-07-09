<ul>
	<?php if ( ! empty( $facebook ) ) : ?>
		<li>
			<a href="<?php echo esc_url( $facebook ); ?>" class="ico-facebook" target="_blank" rel="noopener noreferrer">
				<svg xmlns="http://www.w3.org/2000/svg" width="9" height="18" viewBox="0 0 9 18" aria-hidden="true" focusable="false">
					<path fill="currentColor" d="M8.04 0H6.02C3.77 0 2.43 1.52 2.43 3.77v1.62H.48v3.1h1.95v8.51h3.57V8.49h2.97l.42-3.1H5.99V4.04c0-.9.22-1.51 1.42-1.51h1.63V0z"/>
				</svg>
				<span class="sr-only"><?php esc_html_e( 'Facebook', 'sage' ); ?></span>
			</a>
		</li>
	<?php endif; ?>

	<?php if ( ! empty( $instagram ) ) : ?>
		<li>
			<a href="<?php echo esc_url( $instagram ); ?>" class="ico-instagram" target="_blank" rel="noopener noreferrer">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" aria-hidden="true" focusable="false">
					<rect x="1" y="1" width="16" height="15" rx="4" fill="none" stroke="currentColor" stroke-width="1.75"/>
					<circle cx="9" cy="8.5" r="3.5" fill="none" stroke="currentColor" stroke-width="1.75"/>
					<circle cx="13.5" cy="4" r="1" fill="currentColor"/>
				</svg>
				<span class="sr-only"><?php esc_html_e( 'Instagram', 'sage' ); ?></span>
			</a>
		</li>
	<?php endif; ?>

	<?php if ( ! empty( $twitter ) ) : ?>
		<li>
			<a href="<?php echo esc_url( $twitter ); ?>" class="ico-twitter" target="_blank" rel="noopener noreferrer">
				<svg xmlns="http://www.w3.org/2000/svg" width="19" height="16" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path fill="currentColor" d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
				</svg>
				<span class="sr-only"><?php esc_html_e( 'Twitter', 'sage' ); ?></span>
			</a>
		</li>
	<?php endif; ?>

	<?php if ( ! empty( $linkedin ) ) : ?>
		<li>
			<a href="<?php echo esc_url( $linkedin ); ?>" class="ico-linkedin" target="_blank" rel="noopener noreferrer">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path fill="currentColor" d="M4.98 3.5c0 1.38-1.12 2.5-2.5 2.5S0 4.88 0 3.5 1.12 1 2.48 1s2.5 1.12 2.5 2.5zM.5 8.5h4V23h-4V8.5zM8.5 8.5h3.8v2h.05c.53-1 1.83-2.05 3.77-2.05 4.03 0 4.77 2.65 4.77 6.1V23h-4v-7.1c0-1.69-.03-3.86-2.35-3.86-2.35 0-2.71 1.83-2.71 3.72V23h-4V8.5z"/>
				</svg>
				<span class="sr-only"><?php esc_html_e( 'LinkedIn', 'sage' ); ?></span>
			</a>
		</li>
	<?php endif; ?>
</ul>
