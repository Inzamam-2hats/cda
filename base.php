<?php
use Roots\Sage\Setup;
use Roots\Sage\Wrapper;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>	
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WB94FGD" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
	
	<?php
	do_action( 'get_header' );
	get_template_part('templates/header');

	include Wrapper\template_path();

	do_action( 'get_footer' );
	get_template_part( 'templates/footer' );
	wp_footer();
	?>
	
</body>
</html>