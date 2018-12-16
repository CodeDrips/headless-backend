<?php
function nullify_empty($value, $post_id, $field){
  if (empty($value)) {
    return null;
  }

  return $value;
}
add_filter('acf/format_value/type=image', 'nullify_empty', 100, 3);
add_filter('acf/format_value/type=relationship', 'nullify_empty', 100, 3);
add_filter('acf/format_value/type=gallery', 'nullify_empty', 100, 3);
add_filter('acf/format_value/type=post_object', 'nullify_empty', 100, 3);

/**
 * Ellis Jones Post Counter

function ellis_share_counter( $request ) {

  $body = json_decode($request->get_body());

  $post_id = $body->ID;

  // get current share value
  $count = (int) get_field('field_5c120fb2dbd41', $post_id);

  // increase
  $count++;

  // update
  update_field('field_5c120fb2dbd41', $count, $post_id);

  $response->shares = $count;

  return $response;

}

// Add custom wp-api endpoint
add_action( 'rest_api_init', function () {

  register_rest_route( 'ellisjones/v1', '/counter', array(
    'methods' => 'POST',
    'callback' => 'ellis_post_counter'
  ));

});
*/

