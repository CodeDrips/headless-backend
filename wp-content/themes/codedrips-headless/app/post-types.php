<?php

function build_posttype($singular, $plural, $icon = 'dashicons-admin-multisite', $menu_position = 4, $slug = null, $plural_slug = null, $taxonomies = array( 'category', 'post_tag' )) {

  $name = $plural;
  if ($slug == null) {
    $slug = strtolower(str_replace(' ', '-', $singular));
  }
  if ($plural_slug == null) {
    $plural_slug = strtolower(str_replace(' ', '-', $plural));
  }

  $labels = array(
    'name'                  => _x( $name, 'Post Type General Name', 'text_domain' ),
    'singular_name'         => _x( $singular, 'Post Type Singular Name', 'text_domain' ),
    'menu_name'             => __( $name, 'text_domain' ),
    'name_admin_bar'        => __( $name, 'text_domain' ),
    'archives'              => __( $singular . ' Archives', 'text_domain' ),
    'parent_item_colon'     => __( 'Parent ' . $singular .  ':', 'text_domain' ),
    'all_items'             => __( 'All ' . $plural, 'text_domain' ),
    'add_new_item'          => __( 'Add New ' . $singular, 'text_domain' ),
    'add_new'               => __( 'Add New', 'text_domain' ),
    'new_item'              => __( 'New ' . $singular, 'text_domain' ),
    'edit_item'             => __( 'Edit ' . $singular, 'text_domain' ),
    'update_item'           => __( 'Update ' . $singular, 'text_domain' ),
    'view_item'             => __( 'View ' . $singular, 'text_domain' ),
    'search_items'          => __( 'Search ' .$singular, 'text_domain' ),
    'not_found'             => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
    'featured_image'        => __( 'Featured Image', 'text_domain' ),
    'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
    'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
    'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this ' . $singular, 'text_domain' ),
    'items_list'            => __( $plural . ' list', 'text_domain' ),
    'items_list_navigation' => __( $plural . ' list navigation', 'text_domain' ),
    'filter_items_list'     => __( 'Filter ' . $plural . ' list', 'text_domain' ),
  );

  $args = array(
    'label'                 => __( $name, 'text_domain' ),
    'description'           => __( '', 'text_domain' ),
    'labels'                => $labels,
    'supports'              => array( 'title' ),
    'taxonomies'            => $taxonomies,
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => $menu_position,
    'menu_icon'             => $icon,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'show_in_rest'          => true,
    'rewrite'               => array( 'slug' => $slug, 'with_front' => false ),
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    'show_in_graphql'       => true,
    'graphql_single_name'   => $slug,
    'graphql_plural_name'   => $plural_slug
  );

  register_post_type( $slug, $args );
}

function build_hierarchical_taxonomy($singular, $plural, $post_types = array('post'), $slug = null, $plural_slug = null) {

  $name = $plural;
  if ($slug == null) {
    $slug = strtolower(str_replace(' ', '-', $singular));
  }
  if ($plural_slug == null) {
    $plural_slug = strtolower(str_replace(' ', '-', $plural));
  }

  $labels = array(
    'name' => _x( $name, 'taxonomy general name' ),
    'singular_name' => _x( $singular, 'taxonomy singular name' ),
    'search_items' =>  __( 'Search ' . $name ),
    'all_items' => __( 'All ' . $name ),
    'parent_item' => __( 'Parent ' . $singular ),
    'parent_item_colon' => __( "Parent $singular:" ),
    'edit_item' => __( 'Edit ' . $singular ),
    'update_item' => __( 'Update ' . $singular ),
    'add_new_item' => __( 'Add New ' . $singular ),
    'new_item_name' => __( "New $singular Name" ),
    'menu_name' => __( $name ),
  );
  register_taxonomy( $slug, $post_types, array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'show_in_graphql' => true,
    'graphql_single_name' => $slug,
    'graphql_plural_name' => $plural_slug,
    'rewrite' => array( 'slug' => $slug ),
  ));
}

/**
 * Project
 */
function custom_post_type_project() {
  build_posttype('Project', 'Projects', 'dashicons-media-interactive');
}
add_action( 'init', 'custom_post_type_project', 0 );
