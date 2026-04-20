<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'main_menu' => __('Menu Menu', 'sage')
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer', 'sage'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page(),
    is_page_template('template-custom.php'),
  ]);

  return apply_filters('sage/display_sidebar', $display);
}

# Get Google Maps API Key
function sage_get_gmaps_api_key() {
  $api_key = get_field('google_maps_api_key', 'option');

  if ( ! empty( $api_key ) ) {
    return $api_key;
  }

  return false;
}

add_filter('acf/settings/google_api_key', function () {
  return sage_get_gmaps_api_key();
});

/**
 * Theme assets
 */
function assets() {
  $template_dir = get_template_directory_uri();

  // GFonts handled with Font Organizer plugin
//  wp_enqueue_style('google-fonts/roboto',       'https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i', false, null);
//  wp_enqueue_style('google-fonts/satisfy',      'https://fonts.googleapis.com/css?family=Satisfy', false, null);
//  wp_enqueue_style('google-fonts/ribeye',       'https://fonts.googleapis.com/css?family=Ribeye', false, null);
  wp_enqueue_style('google-fonts/merriweather', 'https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i', false, null);
  wp_enqueue_style('google-fonts/montserrat',   'https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', false, null);
  wp_enqueue_style('vendor/slick-css',           $template_dir . '/assets/plugins/slick-1.8.0/slick/slick.css', false, null);
  wp_enqueue_style('vendor/owl-carousel-css',    $template_dir . '/assets/plugins/owl-carousel2-2.2.1/dist/assets/owl.carousel.min.css', false, null);
  wp_enqueue_style('vendor/selectric-css',       $template_dir . '/assets/plugins/jQuery-Selectric/public/selectric.css', false, null);
  wp_enqueue_style('vendor/magnific-css',        $template_dir . '/assets/plugins/magnific/magnific-popup.css', false, null);
  wp_enqueue_style('sage/css',                   Assets\asset_path('styles/main.css'), false, null);
  wp_enqueue_style('blvr-css',           $template_dir . '/blvr.css', false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('google-maps/js',            'https://maps.googleapis.com/maps/api/js?key=' . sage_get_gmaps_api_key(), ['jquery'], null, true);

  wp_enqueue_script('vendor/selectric-js',       $template_dir . '/assets/plugins/jQuery-Selectric/public/jquery.selectric.min.js', ['jquery'], null, true);
  wp_enqueue_script('vendor/owl-carousel-js',    $template_dir . '/assets/plugins/owl-carousel2-2.2.1/dist/owl.carousel.min.js', ['jquery'], null, true);
  wp_enqueue_script('vendor/slick-js',           $template_dir . '/assets/plugins/slick-1.8.0/slick/slick.min.js', ['jquery'], null, true);
  wp_enqueue_script('vendor/bootstrap-js',       $template_dir . '/assets/plugins/bootstrap-4.0.0/dist/js/bootstrap.bundle.min.js', ['jquery'], null, true);
  wp_enqueue_script('vendor/mask-js',            $template_dir . '/assets/plugins/jQuery-Mask-Plugin/dist/jquery.mask.min.js', ['jquery'], null, true);
  wp_enqueue_script('vendor/magnific-js',        $template_dir . '/assets/plugins/magnific/jquery.magnific-popup.min.js', ['jquery'], null, true);
  wp_enqueue_script('vendor/count-up-js',        $template_dir . '/assets/plugins/countUp.min.js', ['jquery'], null, true);
  wp_enqueue_script('vendor/scroll-lock',        $template_dir . '/assets/plugins/jquery-scrollLock-master/jquery-scrollLock.min.js', ['jquery'], null, true);

  // Photo Shpere Viewer
  wp_enqueue_script('PSV/three-js',              $template_dir . '/assets/plugins/PSV/three.min.js', ['jquery'], null, true);
  wp_enqueue_script('PSV/PSV-js',                $template_dir . '/assets/plugins/PSV/photo-sphere-viewer.min.js', ['jquery'], null, true);

  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);

  wp_localize_script( 'vendor/index-js', 'home', array(
    'url' => get_home_url(),
  ) );
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);
