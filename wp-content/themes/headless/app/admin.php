<?php

/**
 * Theme admin.
 */

namespace App;

use WP_Customize_Manager;

use function Roots\asset;
use function Roots\view;

/**
 * Register the `.brand` selector to the blogname.
 *
 * @param  \WP_Customize_Manager $wp_customize
 * @return void
 */
add_action('customize_register', function (WP_Customize_Manager $wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  $wp_customize->selective_refresh->add_partial('blogname', [
    'selector' => '.brand',
    'render_callback' => function () {
      bloginfo('name');
    }
  ]);
});

/**
 * Register the customizer assets.
 *
 * @return void
 */
add_action('customize_preview_init', function () {
  wp_enqueue_script('sage/customizer.js', asset('scripts/customizer.js')->uri(), ['customize-preview'], null, true);
});

/*
 *  Add ACF Options Page
 */
if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(
    array(
      'page_title'    => 'Site Options',
      'menu_title'    => 'Site Options',
      'menu_slug'     => 'site-options',
      'capability'    => 'edit_posts',
      'show_in_graphql' => true,
      'redirect'      => false,
      'icon_url'      => 'dashicons-hammer'
    )
  );

  /*
  acf_add_options_page(
    array(
      'page_title'    => 'Shopify',
      'menu_title'    => 'Shopify',
      'menu_slug'     => 'shopify',
      'capability'    => 'edit_posts',
      'show_in_graphql' => true,
      'redirect'      => false,
      'icon_url'      => 'dashicons-cart'
    )
  );
   */

  // Replace icons to add in above - https://developer.wordpress.org/resource/dashicons/#media-interactive

}

