<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['helpers', 'setup', 'filters', 'admin', 'post-types', 'api', 'wp-ajax', 'graphql'])
    ->each(function ($file) {
        $file = "app/{$file}.php";

        if (! locate_template($file, true, true)) {
            wp_die(
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/*
|--------------------------------------------------------------------------
| Enable Sage Theme Support
|--------------------------------------------------------------------------
|
| Once our theme files are registered and available for use, we are almost
| ready to boot our application. But first, we need to signal to Acorn
| that we will need to initialize the necessary service providers built in
| for Sage when booting.
|
*/

add_theme_support('sage');

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We are ready to bootstrap the Acorn framework and get it ready for use.
| Acorn will provide us support for Blade templating as well as the ability
| to utilize the Laravel framework and its beautifully written packages.
|
*/

new Roots\Acorn\Bootloader();

function tt_get_article_views() {
	global $post;
	$views = (int)get_post_meta($post->ID, 'views', true);
	return $views;
}

/*
add_action( 'pre_get_posts', function( $query ) {
	if ( $query->is_tax() ) {
		$query->set( 'offset', '1' );
	}
	if ( $query->is_home() ) {
		$featured_post = get_field('featured_post');
    if ($featured_post && count($featured_post) > 0)
      $query->set( 'post__not_in', $featured_post[0] );
	}
}, 1 );
 */

add_shortcode('su_youtube', function( $atts = null, $content = null ){
	$atts = shortcode_atts(
		array(
			'url'        => false,
			'width'      => 600,
			'height'     => 400,
			'autoplay'   => 'no',
			'mute'       => 'no',
			'responsive' => 'yes',
			'title'      => '',
			'class'      => '',
		),
		$atts,
		'youtube'
	);

	$video_id = preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $atts['url'], $match )
		? $match[1]
		: false;

	$url_params = array();

	if ( 'yes' === $atts['autoplay'] ) {
		$url_params['autoplay'] = '1';
	}

	if ( 'yes' === $atts['mute'] ) {
		$url_params['mute'] = '1';
	}

	$domain = strpos( $atts['url'], 'youtube-nocookie.com' ) !== false
		? 'www.youtube-nocookie.com'
		: 'www.youtube.com';

	return '<div class="article__video"><iframe width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="https://' . $domain . '/embed/' . $video_id . '?' . http_build_query( $url_params ) . '" frameborder="0" allowfullscreen allow="autoplay; encrypted-media; picture-in-picture" title="' . esc_attr( $atts['title'] ) . '"></iframe></div>';
});
