<div class="main">
	<div class="section">
		<div class="section__head">
			<div class="container">
				<h3 class="section__title">
					<?php crb_the_title(); ?>
				</h3><!-- /.section__title -->
			</div><!-- /.container -->
		</div><!-- /.section__head -->

		<div class="section__body">
			<div class="container">
				<div class="error-message">
					<?php
					printf( __( '<p>Please check the URL for proper spelling and capitalization.<br />If you\'re having trouble locating a destination, try visiting the <a href="%1$s">home page</a>.</p>', 'crb' ), home_url( '/' ) );
					?>
				</div><!-- /.error-message -->
			</div><!-- /.container -->
		</div><!-- /.section__body -->
	</div><!-- /.section -->
</div><!-- /.main -->
