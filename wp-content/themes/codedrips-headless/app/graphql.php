<?php

add_action('graphql_register_types',  function () {

  register_graphql_field('ContentNode', 'menuOrder', [
    'type' => 'Integer',
    'description' => __('Archive display order', 'wp-graphql'),
    'resolve' => function (\WPGraphQL\Model\Post $post, $args, $context, $info) {
      return get_post_field('menu_order', $post->ID);
    }
  ]);
});

add_action('pre_get_posts', function () {

  // access the custom post type order class
  global $CPTO;

  // if WPGraphQL isn't active or CPTUI isn't active, carry on and bail early
  if (!function_exists('is_graphql_request') || !is_graphql_request() || !$CPTO) {
    return;
  }

  // Remove the Post Type Order plugin's "posts_orderby" filter for WPGraphQL requests
  // This filter hooks in too late and modifies the SQL directly so WPGraphQL
  // can't properly map the orderby args to generate the SQL for proper pagination
  remove_filter('posts_orderby', [$CPTO, 'posts_orderby'], 99);

  // Add a filter
  add_filter('graphql_post_object_connection_query_args', function ($args, $source, $input_args, $context, $info) {

    $orderby = [];

    // If the connection has explicit orderby arguments set,
    // use them
    if (!empty($input_args['where']['orderby'])) {
      return $args;
    }

    // Else use any orderby args set on the WP_Query
    if (isset($args['orderby'])) {
      $orderby = [];

      if (is_string($args['orderby'])) {
        $orderby[] = $args['orderby'];
      } else {
        $orderby = $args['orderby'];
      }
    }

    $orderby['menu_order'] = !empty($input_args['last']) ? 'DESC' : 'ASC';
    $args['orderby']       = $orderby;

    return $args;
  }, 10, 5);
});
