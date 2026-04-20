<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */

define( 'THEME_DIR', dirname( __FILE__ ) . DIRECTORY_SEPARATOR );

# Autoload dependencies
$autoload_dir = THEME_DIR . 'vendor/autoload.php';
if ( ! is_readable( $autoload_dir ) ) {
  wp_die( 'Please, run <code>composer install</code> to download and install the theme dependencies.' );
}
include_once( $autoload_dir );

$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf('Error locating %s for inclusion', $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

# Add image size options
include_once( THEME_DIR . 'options/image-sizes.php' );

# Add custom post types
include_once( THEME_DIR . 'options/post-types.php' );

# Add shortcodes
include_once( THEME_DIR . 'options/shortcodes.php' );

# Add Gravity Forms Functions
include_once( THEME_DIR . 'includes/gravity-forms.php' );

# Add Title functions
include_once( THEME_DIR . 'includes/title.php' );

# Enqueue JS and CSS assets on admin pages
add_action( 'login_enqueue_scripts', 'crb_login_enqueue_scripts' );
function crb_login_enqueue_scripts() {
  $template_dir = get_template_directory_uri();

  # Enqueue Scripts
  # @crb_enqueue_script attributes -- id, location, dependencies, in_footer = false

  # Enqueue Styles
  # @crb_enqueue_style attributes -- id, location, dependencies, media = all
  wp_enqueue_style( 'sage/admin-styles', $template_dir . '/assets/styles/admin-styles.css' );
}

# Admin Login Headers
add_filter( 'login_headerurl', 'crb_login_headerurl' );
function crb_login_headerurl() {
  return get_bloginfo( 'url' );
}

add_filter( 'login_headertitle', 'crb_login_headertitle' );
function crb_login_headertitle() {
  return get_bloginfo( 'name' );
}

function crb_strip_phone_digits( $phone ) {
  return preg_replace( '~\D+~', '', $phone );
}

add_action( 'admin_init', 'crb_hide_wysiwyg_page_editor' );
function crb_hide_wysiwyg_page_editor() {
  if ( ! is_admin() || ! isset( $_GET['post'] ) || empty( $_GET['post'] ) ) {
    return;
  }

  $templates = [
    'templates/template-builder.php',
  ];

  $post_id = absint( $_GET['post'] );

  if ( ! isset( $post_id ) ) {
    return;
  }

  $page_template = get_page_template_slug( $post_id );

  if ( in_array( $page_template, $templates ) ) {
    remove_post_type_support( 'page', 'editor' );
  } else {
    return;
  }
}

function crb_replace_char_with( $value, $char, $tagname, $classname = '' ) {
  $regex = '~' . preg_quote( $char ) . '(.+?)' . preg_quote( $char ) . '~';
  return nl2br( preg_replace( $regex, "<{$tagname} class='{$classname}'>$1</{$tagname}>", $value ) );
}