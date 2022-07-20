<?php
/*
Plugin Name: No Nonsense
Plugin URI: https://room34.com
Description: The fastest, cleanest way to get rid of the parts of WordPress you don't need.
Version: 2.4.0.1
Author: Room 34 Creative Services, LLC
Author URI: https://nononsensewp.com
License: GPLv2
Text Domain: no-nonsense
Domain Path: /i18n/languages/
*/

/*  Copyright 2022 Room 34 Creative Services, LLC (email: info@room34.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// Don't load directly
if (!defined('ABSPATH')) { exit; }


// Load includes
require_once(plugin_dir_path(__FILE__) . 'functions.php');


// Load plugin classes
require_once(plugin_dir_path(__FILE__) . 'class-r34nono.php');


// Instantiate
add_action('plugins_loaded', function() {
	global $r34nono;
	$r34nono = new R34NoNo();
});


// Load text domain for translations
add_action('plugins_loaded', function() {
	load_plugin_textdomain('no-nonsense', false, basename(plugin_dir_path(__FILE__)) . '/i18n/languages/');
});


// Flush rewrite rules on activation
register_activation_hook(__FILE__, function() { flush_rewrite_rules(); });


// Install/upgrade
register_activation_hook(__FILE__, 'r34nono_install');
add_action('plugins_loaded', function() {
	if (get_option('r34nono_version') != @R34NoNo::VERSION) {
		r34nono_install();
	}
});


// Plugin installation
function r34nono_install() {
	global $wpdb;

	// Update version
	update_option('r34nono_version', @R34NoNo::VERSION);
	
	// Update settings
	if (version_compare(@R34NoNo::VERSION, '1.4.0', '>=')) {
		if (get_option('r34nono_xmlrpc_disabled', null) !== null && get_option('r34nono_xmlrpc_enabled')) {
			update_option('r34nono_xmlrpc_disabled', get_option('r34nono_xmlrpc_enabled'));
			delete_option('r34nono_xmlrpc_enabled');
		}
		if (get_option('r34nono_login_replace_wp_logo_link', null) !== null && get_option('r34nono_login_remove_wp_logo')) {
			update_option('r34nono_login_replace_wp_logo_link', get_option('r34nono_login_remove_wp_logo'));
			delete_option('r34nono_login_remove_wp_logo');
		}
	}
}
