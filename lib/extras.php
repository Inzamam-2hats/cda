<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return '...';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

function excerpt_length() {
  return 40;
}
add_filter('excerpt_length', __NAMESPACE__ . '\\excerpt_length');

add_action( 'init', function () {
  if ( ! function_exists('acf_add_options_page') ) {
    return;
  }

  acf_add_options_page( array(
    'page_title'  => __( 'Theme Options', 'sage' ),
    'menu_title'  => __( 'Theme Options', 'sage' ),
    'menu_slug'   => 'theme-options-page',
  ) );

  acf_add_options_sub_page( array(
    'page_title'  => __( 'Header', 'sage' ),
    'menu_title'  => __( 'Header', 'sage' ),
    'parent_slug'   => 'theme-options-page',
  ) );

  acf_add_options_sub_page( array(
    'page_title'  => __( 'Footer', 'sage' ),
    'menu_title'  => __( 'Footer', 'sage' ),
    'parent_slug'   => 'theme-options-page',
  ) );

  acf_add_options_sub_page( array(
    'page_title'  => __( 'Misc', 'sage' ),
    'menu_title'  => __( 'Misc', 'sage' ),
    'parent_slug'   => 'theme-options-page',
  ) );
} );

function replace_simpay_classes($classes){
    $classes[] = 'btn';
    $classes[] = 'btn--blue';
    return $classes;
}
add_filter('simpay_payment_button_class', __NAMESPACE__ . '\\replace_simpay_classes');

function strip_multilang_from_rest_url($url){
  return str_replace('?lang=es', '', $url);
}
add_filter('rest_url', __NAMESPACE__ . '\\strip_multilang_from_rest_url', 10, 1);