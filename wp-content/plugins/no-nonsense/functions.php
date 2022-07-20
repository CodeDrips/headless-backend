<?php

// Don't load directly
if (!defined('ABSPATH')) { exit; }


// Admin functions

function r34nono_group_settings() {
	global $r34nono;
	$output = array();
	foreach ((array)$r34nono->settings as $fn => $item) {
		$output[$item['group']][$fn] = $item;
	}
	foreach (array_keys((array)$output) as $group) {
		uasort($output[$group], 'r34nono_group_settings_sort_callback');
	}
	ksort($output);
	return $output;
}

function r34nono_group_settings_sort_callback($a, $b) {
	return strnatcmp($a['title'], $b['title']);
}


// Hook functions

function r34nono_admin_bar_logout_link() {
	add_action('admin_bar_menu', 'r34nono_admin_bar_logout_link_admin_bar_menu_callback', 1);
	add_action('admin_head', 'r34nono_admin_bar_logout_link_admin_head_callback');
}

function r34nono_admin_bar_logout_link_admin_bar_menu_callback($wp_admin_bar) {
	$wp_admin_bar->add_node(array(
		'href' => wp_logout_url(),
		'id' => 'r34nono-logout',
		'meta' => array(
			'class' => 'r34nono-important',
		),
		'parent' => 'top-secondary',
		'title' => __('Log Out'),
	));
}

function r34nono_admin_bar_logout_link_admin_head_callback() {
	global $_wp_admin_css_colors;
	$user_option_admin_color = get_user_option('admin_color');
	$admin_color_scheme = $_wp_admin_css_colors[$user_option_admin_color];
	// "Modern" only has 3 colors
	if ($user_option_admin_color == 'modern' || empty($admin_color_scheme->colors[3])) {
		$logout_button_color = $admin_color_scheme->colors[1];
		$logout_button_hover_color = $admin_color_scheme->colors[2];
		$logout_button_hover_text_color = '#000000';
	}
	// Most schemes have 4 colors
	else {
		$logout_button_color = $admin_color_scheme->colors[2];
		$logout_button_hover_color = $admin_color_scheme->colors[3];
	}
	?>
	<style>
		#wpadminbar .r34nono-important {
			background: <?php echo esc_attr($logout_button_color); ?>;
		}
		#wpadminbar .r34nono-important:hover {
			background: <?php echo esc_attr($logout_button_hover_color); ?>;
		}
		<?php
		if (!empty($logout_button_hover_text_color)) {
			?>
			#wpadminbar .r34nono-important:hover .ab-item, #wpadminbar .r34nono-important .ab-item:hover {
				color: <?php echo esc_attr($logout_button_hover_text_color); ?> !important;
			}
			<?php
		}
		?>
	</style>
	<?php
}

function r34nono_auto_core_update_send_email_only_on_error($send, $type, $core_update, $result) {
	return (empty($type) || $type != 'success');
}

function r34nono_core_upgrade_skip_new_bundled() {
	if (!defined('CORE_UPGRADE_SKIP_NEW_BUNDLED')) {
		define('CORE_UPGRADE_SKIP_NEW_BUNDLED', true);
	}
}

function r34nono_disable_site_search() {
	if (!is_admin()) {
		add_action('parse_query', 'r34nono_disable_site_search_parse_query_callback', 5);
	}
	add_filter('get_search_form', '__return_false', 999);
	add_action('widgets_init', 'r34nono_disable_site_search_widgets_init_callback', 1);
}

function r34nono_disable_site_search_parse_query_callback($query) {
	if ($query->is_search && $query->is_main_query()) {
		wp_redirect(home_url('/'), 301); exit;
	}
}

function r34nono_disable_site_search_widgets_init_callback() {
	unregister_widget('WP_Widget_Search');
}

function r34nono_disallow_file_edit() {
	if (!defined('DISALLOW_FILE_EDIT')) {
		define('DISALLOW_FILE_EDIT', true);
	}
}

function r34nono_disallow_full_site_editing() {
	add_action('admin_bar_menu', 'r34nono_remove_edit_site', 999, 1);
	add_action('admin_menu', 'r34nono_disallow_full_site_editing_admin_menu_callback');
	add_action('current_screen', 'r34nono_disallow_full_site_editing_current_screen_callback');
	add_action('customize_controls_head', 'r34nono_disallow_full_site_editing_customize_controls_head_callback');
}

function r34nono_disallow_full_site_editing_admin_menu_callback() {
	remove_submenu_page('themes.php', 'site-editor.php');
}

function r34nono_disallow_full_site_editing_current_screen_callback() {
	global $pagenow;
	if (is_admin() && 'site-editor.php' === $pagenow) {
		wp_redirect(admin_url('/')); exit;
	}
}

function r34nono_disallow_full_site_editing_customize_controls_head_callback() {
	// @todo Find a better way to do this.
	echo '<style>.notice[data-code="site_editor_block_theme_notice"]{display:none!important;}</style>';
}

function r34nono_hide_admin_bar_for_logged_in_non_editors() {
	if (!wp_doing_ajax() && is_user_logged_in() && !current_user_can('edit_posts')) {
		add_filter('show_admin_bar', '__return_false');
	}
}

function r34nono_limit_admin_elements_for_logged_in_non_editors() {
	if (!wp_doing_ajax() && is_admin() && is_user_logged_in() && !current_user_can('edit_posts')) {
		remove_menu_page('index.php');
		add_filter('admin_footer_text', '__return_false');
		add_filter('update_footer', '__return_false', 99);
	}
}

function r34nono_login_replace_wp_logo_link() {
	if (has_site_icon()) {
		?>
		<style type="text/css">.login h1 a { background-image: url('<?php echo get_site_icon_url(192); ?>') !important; border-radius: 16px; }</style>
		<?php
	}
	else {
		?>
		<style type="text/css">.login h1 a { display: none !important; }</style>
		<?php
	}
	add_filter('login_headerurl', 'r34nono_login_replace_wp_logo_link_login_headerurl_callback');
}

function r34nono_login_replace_wp_logo_link_login_headerurl_callback() {
	return home_url('/');
}

function r34nono_redirect_admin_to_homepage_for_logged_in_non_editors() {
	if (!wp_doing_ajax() && is_admin() && is_user_logged_in() && !current_user_can('edit_posts')) {
		global $pagenow;
		$options = get_option('r34nono_redirect_admin_to_homepage_for_logged_in_non_editors_options');
		if ($pagenow != 'profile.php' || !empty($options['prevent_profile_access'])) { wp_redirect(home_url('/')); exit; }
	}
}

function r34nono_remove_admin_color_scheme_picker() {
	remove_action('admin_color_scheme_picker', 'admin_color_scheme_picker');
}

function r34nono_remove_admin_wp_logo($wp_admin_bar) {
	$wp_admin_bar->remove_node('wp-logo');
}

function r34nono_remove_comments_column($columns) {
	unset($columns['comments']);
	return $columns;
}

function r34nono_remove_comments_from_admin() {
	add_action('admin_menu', 'r34nono_remove_comments_from_admin_admin_menu_callback');
	add_action('admin_bar_menu', 'r34nono_remove_comments_from_admin_admin_bar_menu_callback', 999);
	add_filter('manage_edit-post_columns', 'r34nono_remove_comments_column');
	add_filter('manage_edit-page_columns', 'r34nono_remove_comments_column');
	add_filter('manage_media_columns', 'r34nono_remove_comments_column');
}

function r34nono_remove_comments_from_admin_admin_menu_callback() {
	remove_menu_page('edit-comments.php');
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
}

function r34nono_remove_comments_from_admin_admin_bar_menu_callback($wp_admin_bar) {
	$wp_admin_bar->remove_node('comments');
}

function r34nono_remove_comments_from_front_end() {
	if (!is_admin()) {
		add_filter('comments_array', function() { return array(); });
		add_filter('comments_open', '__return_false');
		add_filter('pings_open', '__return_false');
		// This is only needed due to wp-includes/theme-compat/comments.php, lines 70-74
		add_action('comment_form_comments_closed', function() { echo '<style>.nocomments { display: none !important; }</style>'; });
	}
}

function r34nono_remove_dashboard_widgets() {
	if ($options = get_option('r34nono_remove_dashboard_widgets_options')) {
		foreach ((array)$options as $option => $bool) {
			if (!empty($bool)) {
				if ($option == 'welcome_panel') {
					remove_action('welcome_panel', 'wp_welcome_panel');
				}
				else {
					remove_meta_box($option, 'dashboard', 'core');
				}
			}
		}
	}
}

function r34nono_remove_default_block_patterns() {
	remove_theme_support('core-block-patterns');
}

function r34nono_remove_duotone_svg_filters() {
	remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
	remove_action('in_admin_header', 'wp_global_styles_render_svg_filters');
}

function r34nono_remove_edit_site($wp_admin_bar) {
	$wp_admin_bar->remove_node('site-editor');
}

function r34nono_remove_head_tags() {
	if ($options = get_option('r34nono_remove_head_tags_options')) {
		foreach ((array)$options as $option => $bool) {
			if (!empty($bool)) {
				switch ($option) {
					case 'feed_links':
						remove_action('wp_head', 'feed_links', 2);
						remove_action('wp_head', 'feed_links_extra', 3);
						break;
					case 'oembed_linktypes':
						add_filter('oembed_discovery_links', '__return_false');
						break;
					case 'resource_hints':
					case 'wp_resource_hints':
						remove_action('login_head', 'wp_resource_hints', 2);
						remove_action('wp_head', 'wp_resource_hints', 2);
						break;
					case 'rest_output_link_wp_head':
						remove_action('template_redirect', 'rest_output_link_header', 11);
						remove_action('wp_head', 'rest_output_link_wp_head');
						remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
						break;
					case 'wp_shortlink_wp_head':
						remove_action('template_redirect', 'wp_shortlink_header', 11);
						remove_action('wp_head', 'wp_shortlink_wp_head');
						break;
					default:
						remove_action('wp_head', $option);
						break;
				}
			}
		}
	}
}

function r34nono_remove_howdy($wp_admin_bar) {
	$my_account = $wp_admin_bar->get_node('my-account');
	$wp_admin_bar->add_node(array(
		'id' => 'my-account',
		'title' => substr($my_account->title, strpos($my_account->title, '<span class="display-name">')),
	));
}

function r34nono_remove_posts_from_admin() {
	add_action('admin_bar_menu', 'r34nono_remove_posts_from_admin_admin_bar_menu_callback', 999);
	add_action('admin_menu', 'r34nono_remove_posts_from_admin_admin_menu_callback');
}

function r34nono_remove_posts_from_admin_admin_bar_menu_callback($wp_admin_bar) {
	$wp_admin_bar->remove_node('new-post');
}

function r34nono_remove_posts_from_admin_admin_menu_callback() {
	remove_menu_page('edit.php');
}

function r34nono_remove_widgets_block_editor() {
	remove_theme_support('widgets-block-editor');
}

function r34nono_remove_wp_emoji() {
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('admin_print_styles', 'print_emoji_styles');	
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');	
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	// Remove WP emoji from TinyMCE
	add_filter('tiny_mce_plugins', 'r34nono_remove_wp_emoji_from_tinymce', 10, 1);
	// Remove WP emoji DNS prefetch
	add_filter('emoji_svg_url', '__return_false');
}

function r34nono_remove_wp_emoji_from_tinymce($plugins) {
	return is_array($plugins) ? array_diff($plugins, array('wpemoji')) : array();
}

// This plugin's name appears contradictory but it is kept this way for backwards compatibility
function r34nono_xmlrpc_disabled() {
	$options = get_option('r34nono_xmlrpc_disabled_options');
	// Turn off XML-RPC (after WP 3.5 this only turns off unauthenticated access)
	add_filter('xmlrpc_enabled', '__return_false');
	// Silently kill any XML-RPC request
	if (!empty($options['kill_requests'])) {
		if (defined('XMLRPC_REQUEST') && XMLRPC_REQUEST) { status_header(403); exit; }
	}
}


// Utility functions

function r34nono_deactivate_and_delete_akismet() {
	$return = false;
	if (is_plugin_active('akismet/akismet.php')) {
		deactivate_plugins(array('akismet/akismet.php'));
	}
	if (array_key_exists('akismet/akismet.php', get_plugins())) {
		delete_plugins(array('akismet/akismet.php'));
		$return = true;
	}
	return $return;
}

function r34nono_deactivate_and_delete_hello_dolly() {
	$return = false;
	if (is_plugin_active('hello-dolly/hello.php')) {
		deactivate_plugins(array('hello-dolly/hello.php'));
	}
	elseif (is_plugin_active('hello.php')) {
		deactivate_plugins(array('hello.php'));
	}
	if (array_key_exists('hello-dolly/hello.php', get_plugins())) {
		delete_plugins(array('hello-dolly/hello.php'));
		$return = true;
	}
	elseif (array_key_exists('hello.php', get_plugins())) {
		delete_plugins(array('hello.php'));
		$return = true;
	}
	return $return;
}

/**
 * This function is no longer automatically called back in
 * r34nono_deactivate_and_delete_hello_dolly() above, but is
 * retained for future use and is not deprecated.
 */
function r34nono_deactivate_and_delete_hello_dolly_admin_head_callback() {
	$current_screen = get_current_screen();
	if ($current_screen->base == 'plugin-install') {
		?>
		<style>.plugin-card-hello-dolly { display: none !important; }</style>
		<?php
	}
}

function r34nono_delete_inactive_themes() {
	$return = false;
	$status = null;
	$success = $fail = 0;
	$keep_themes = array();
	// Get all installed themes
	$all_themes = wp_get_themes();
	// Get info about current theme (and parent, if applicable)
	$current_theme = wp_get_theme();
	$keep_themes[] = $current_theme->__get('name');
	if ($parent_theme_name = $current_theme->__get('parent_theme')) {
		$keep_themes[] = $parent_theme_name;
	}
	// Delete all themes except current theme (and parent, if applicable)
	foreach ((array)$all_themes as $stylesheet => $theme) {
		if (!in_array($theme->__get('name'), $keep_themes)) {
			$status = delete_theme($theme->__get('stylesheet'));
			if ($status) { $success++; } else { $fail++; }
		}
	}
	if ($success && !$fail) { $return = true; }
	return $return;
}

function r34nono_delete_sample_content() {
	$return = false;
	if (wp_delete_comment(1)) { $return = true; } // Sample comment by "A WordPress Commenter" on "Hello world!" post
	if (wp_delete_post(1, true)) { $return = true; } // "Hello world!" post
	if (wp_delete_post(2, true)) { $return = true; } // "Sample Page" page
	return $return;
}

function r34nono_remove_default_tagline() {
	$return = false;
	if (get_option('blogdescription') == __('Just another WordPress site', 'no-nonsense')) {
		if (update_option('blogdescription', '')) { $return = true; }
	}
	return $return;
}

function r34nono_set_permalink_structure_to_postname() {
	$return = false;
	if (update_option('permalink_structure', '/%postname%/')) {
		flush_rewrite_rules();
		$return = true;
	}
	return $return;
}
