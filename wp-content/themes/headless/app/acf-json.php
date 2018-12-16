<?php
/**
 * Setup ACF JSON
 * - manually set path to 'acf-json' because it doesn't work out of the box
 */

add_filter('acf/settings/save_json', function($path) {
    $path = get_stylesheet_directory() . '/acf-json';

    return $path;
});

add_filter('acf/settings/load_json', function($paths) {
    $paths = [];
    $paths[] = get_stylesheet_directory() . '/acf-json';

    return $paths;
});

if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(
    array(
      'page_title'    => 'Site Settings',
      'menu_title'    => 'Site Settings',
      'menu_slug'     => 'site-settings',
      'capability'    => 'edit_posts',
      'redirect'      => false,
      'icon_url'      => 'dashicons-heart'
    )
  );

}