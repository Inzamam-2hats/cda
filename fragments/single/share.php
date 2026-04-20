<div class="socials socials--grey text-center fadeup animate">
	<p><?php _e( 'Share', 'sage' ); ?></p>

	<ul>
		<li>
			<a href="<?php echo 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink(); ?>" class="ico-facebook">
				<img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/facebook-grey.png" alt="">

				<img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/facebook.png" alt="">
			</a>
		</li>

		<li>
			<a href="<?php echo 'https://twitter.com/intent/tweet?url=' . get_the_permalink(); ?>" class="ico-twitter-grey">
				<img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/twiiter-grey.png" alt="">

				<img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/twitter.png" alt="">
			</a>
		</li>

		<li>
			<a href="<?php echo 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink(); ?>" class="ico-linkedin">
				<img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/linkedin-grey.png" alt="">

				<img src="<?php bloginfo('template_directory'); ?>/assets/images/temp/linkedin.png" alt="">
			</a>
		</li>
	</ul>
</div><!-- /.socials-grey -->
