<?php
$is_lang_bar_hidden = get_field( 'hide_language_bar', 'option' );
?>

<div class="wrapper wrapper--secondary  <?php // echo ( $is_lang_bar_hidden ) ? 'wrapper--secondary' : ''; ?>">
	<header class="header header--secondary  <?php // echo ( $is_lang_bar_hidden ) ? 'header--secondary' : ''; ?>">
		<?php if ( ! $is_lang_bar_hidden ) : ?>
			<?php //crb_render_fragment( 'header/language-select' ); ?>
		<?php endif; ?>
		<?php //if(is_front_page()): ?>
			<div class="header-top">
				<?php echo get_search_form(); //search form ?>
				<?php echo do_shortcode('[wpml_language_selector_widget]'); ?>
			</div>
		<?php //endif; ?>
		<div class="header__content">
			<div class="container-fluid">
				<?php
				$logo_src = wp_get_attachment_image_url( get_field( 'header_logo', 'option' ), 'full' );
				$donate = get_field( 'donate_button', 'option' );
				?>

				<?php if ( ! empty( $logo_src ) ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" style="background-image: url(<?php echo esc_url( $logo_src ); ?>)">
						<?php bloginfo( 'name' ); ?>
					</a>
				<?php endif; ?>

				<?php if ( has_nav_menu( 'main_menu' ) ) : ?>
					<a href="#" class="btn-menu">
						<span></span>

						<span></span>
					</a>

					<div class="header__inner">
						<nav class="nav">
							<?php
							wp_nav_menu( array(
								'theme_location'  => '',
								'container'       => false,
								'depth'           => '4',
							) );
							?>
							<?php if ( ! empty( $donate ) ) : ?>
								<a href="<?php echo esc_url( $donate['url'] ); ?>" class="btn btn-donate" target="<?php echo esc_attr( $donate['target'] ); ?>">
									<?php echo esc_html( $donate['title'] ) ? : 'Donate'; ?>
								</a>
							<?php endif; ?>
						</nav><!-- /.nav -->
					</div><!-- /.header__inner -->
				<?php endif; ?>
			</div><!-- /.container-fluid -->
		</div><!-- /.header__content -->
	</header><!-- /.header -->
