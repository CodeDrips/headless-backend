=== No Nonsense ===
Contributors: room34
Donate link: https://room34.com/payments
Tags: remove howdy, remove emoji, remove comments, remove xml-rpc, remove WordPress logo
Requires at least: 4.9
Requires PHP: 7.0.0
Tested up to: 6.0.1
Stable tag: 2.4.0.1
License: GPLv2

The fastest, cleanest way to get rid of the parts of WordPress you don't need.

== Description ==

For professional developers working with WordPress, the first steps in any new build frequently involve deleting default content and turning off built-in settings. This plugin encapsulates many of those tasks on a single, clean configuration screen.

== Installation ==

== Frequently Asked Questions ==

= I installed and activated the plugin, now what? =

After installing the plugin, navigate to **Settings &gt; No Nonsense** to choose which built-in WordPress features you want to turn off. Be sure to click **Save Changes** when you're done.

== Screenshots ==

== Changelog ==

= 2.4.0.1 - 2022.07.19 =

* Fixed: Changed logic when writing settings to `wp_options` table (`R34NoNo::admin_page_callback()` method) so keys are no longer required to begin with `r34nono_`.

= 2.4.0 - 2022.07.15 =

* Added "Deactivate and delete Akismet Anti-Spam plugin" utility. _Note: We do recommend using Akismet or something similar to prevent spam on your website, but if your site does not support comments, and/or you already intend to secure it by other means, Akismet itself may not be necessary._
* Added "Delete inactive themes" utility.
* Added JavaScript confirmation on **Run Selected Utilities** button.
* Edited redundant description of "Deactivate and delete Hello Dolly plugin" utility.
* i18n: Updated `no-nonsense.pot` file with new/changed text strings.

= 2.3.2 - 2022.07.15 =

* Moved new filters into `R34NoNo::add_hooks()` method, and delayed execution of that method to the `after_setup_theme` action, to resolve issue of themes' use of the new filters having no effect.

= 2.3.1 - 2022.07.12 =

* Changed name of class array (again) from `functions` to `settings` to reduce potential confusion for developers using the hooks introduced in 2.3.0. Also changed the name of the hook from `r34nono_define_functions_array` to `r34nono_define_settings_array` (retaining deprecated name for backwards compatibility).

= 2.3.0.1 - 2022.07.12 =

* Added sanitization function on keys when saving to `wp_options` table.

= 2.3.0 - 2022.07.12 =

* Added `r34nono_define_functions_array` and `r34nono_define_utilities_array` filters to allow developers to add (or remove) functions and utilities to No Nonsense from their themes or plugins. Usage is outlined in our [Developer Documentation](https://nononsensewp.com/developer.php).
* Added `show_in_admin` to each function and utility, allowing developers to hide options in the admin, but still have them function via hardcoded values in themes or plugins. (Use in conjunction with the aforementioned filters.)
* Changed names of class arrays from `function_details` and `utility_details` to `functions` and `utilities`.
* Added sanitization functions on dynamic `add_action()` and `add_filter()` in `R34NoNo::__construct()` method, in preparation for adding filters for developers to extend this plugin's functionality.
* Added tooltips to status color dots on admin notice after running utilities.
* Minor refactoring of `R34NoNo::__construct()` method.

= 2.2.0 - 2022.06.20 =

* Added "Remove default block patterns" option. This turns off all of the core block patterns, which may not match your theme, but retains the ability for you to create your own custom block patterns.
* Added "Block Editor" section to admin screen and reorganized all block editor-related options into that section.
* Updated text strings. (Removed somewhat inconsistent use of capitalization for terms such as "block editor," "block patterns," and "full site editing.")
* Removed "(BETA)" label on "Remove comments from front end" option on admin page.

= 2.1.1 - 2022.05.22 =

* Fixed **Deactivate and delete Hello Dolly plugin** utility to handle both a manually installed instance (where Hello Dolly is contained in a `hello-dolly` folder) and the base install instance (where Hello Dolly is a bare `hello.php` file in the `plugins` folder). *(Opinionated side note: This is yet another argument for why Hello Dolly is a **bad** example of how to create a plugin, which is ostensibly one of its intended reasons for inclusion in the core installation.)*

= 2.1.0 - 2022.05.19 =

* Changed success/fail indicator UTF-8 characters in admin notices when running utilities, from check mark and X to "black circle" (colored green, orange or red), because WordPress 6.0 forces conversion of those UTF characters to emoji, which causes them not to render if the "Remove WP emoji" option is turned on!
* Modified utility functions to return true or false depending on whether or not they completed their intended actions, so admin notice "black circle" icons are colored accordingly: green for success; orange if the function ran but did not have an effect; and red for an error.
* Removed action hook to `r34nono_deactivate_and_delete_hello_dolly_admin_head_callback()` in `r34nono_deactivate_and_delete_hello_dolly()` because now that this is a utility, rather than a setting that runs on every admin page load, the function would not be firing anyway. The function has been retained in the plugin however and will not be deprecated.
* i18n: Added text domain to "Just another WordPress site" string.

= 2.0.0 - 2022.05.03 =

* Added new **Utilities** section with a set of one-time actions that are frequently part of the new site installation process.
* Moved **Deactivate and delete Hello Dolly plugin** to **Utilities**, so it only runs once.
* Minor interface refinements.

= 1.9.0 - 2022.05.02 =

* Added BETA **Remove comments from front end** option. This option uses standard hooks to hide comment output, along with a workaround for a deprecated backwards compatibility file, but it may not completely remove all traces of comments from the front end of your site, depending on its theme structure. Please provide any feedback you have on this functionality in the [WordPress Support Forums](https://wordpress.org/support/plugin/no-nonsense/).

= 1.8.1 - 2022.05.02 =

* Added **Disallow Full Site Editing** option to extend upon **Remove "Edit site" link**. This option removes the "Edit site" link in the admin bar, the "Editor" link under "Appearance" in the admin menu, the FSE notice in the Customizer, and force-redirects any direct attempts to access the FSE editing screen to the admin dashboard.

= 1.8.0 - 2022.04.21 =

* Added **Remove "Edit site" link** option to suppress the Full Site Editing link in the front-end admin bar on sites that use Block Themes.
* Refactored logic for **Remove Comments from admin** to properly hide the comment count in the front-end admin bar.

= 1.7.0 - 2022.04.18 =

* Added **Remove duotone SVG filters** option to suppress Block Editor's duotone filter HTML SVG tags for Safari users.
* Bumped *Tested up to* to 5.9.3.

= 1.6.1.1 - 2022.02.28 =

* Corrected text domain in `load_plugin_textdomain()` function call.

= 1.6.1 - 2022.02.18 =

* Added **Remove admin email check interval** option to suppress periodic verification of the admin email address upon login.

= 1.6.0.1 - 2021.12.27 =

* Changed hook for **Remove front end Edit links** to fix an issue that may have prevented edit links from working on the admin side.

= 1.6.0 - 2021.12.27 =

* i18n: Numbered all placeholders in `sprintf()` functions.
* i18n: Added text domain path `i18n/languages` and created `.pot` file.
* Removed stray `xmlrpc_enabled` filter in main plugin file.

= 1.5.1 - 2021.12.22 =

* Changed optional custom site icon on login screen to use a 16-pixel border radius, to match how the icon is displayed in the Customizer.

= 1.5.0 - 2021.12.21 =

* Added **Remove front end Edit links** option. (Thanks to @ov3rfly for this suggestion and several others.)
* Changed priority on removing comments from admin bar to account for potential activity by other plugins.
* Changed `fn` key to `cb` in `R34NoNo::function_details()` for less potential confusion on its purpose.
* Changed **Remove Posts from admin** hook run on `init` (with other enclosed hooks as appropriate) and to include removal of New Post option from admin bar.
* For those who *really* don't want "Hello Dolly" around, this version now also hides it in the "Add Plugins" search results, via CSS.
* Refactored **Remove Howdy** to remove greeting before username in *all* languages.
* Refactored `r34nono_install()` function to fix issues with updating version number and resetting deprecated option names.
* Replaced all closures with named callback functions.
* Return HTTP 301 status (instead of `wp_redirect()` default 302) on searches when **Disable site search** is turned on.
* Updated admin page sidebar content.
* Updated plugin description in `no-nonsense.php` to match `readme.txt`.

= 1.4.4 - 2021.12.20 =

* Added "Also prevent access to profile screen" option under **Redirect admin to home page for logged-in non-editors**. (Thanks to @dcavins for suggesting this change.)
* Fixed issue with **Replace WP logo with site icon on login screen** CSS when site icon is not set (hotfix).

= 1.4.3.1 - 2021.12.19 =

* Changed `r34nono_remove_head_tags()` to hook into `init` instead of `wp_head` to ensure that all enclosed hooks are applied in time.

= 1.4.3 - 2021.12.19 =

* Added **Remove admin color scheme picker**.
* Added dynamic sorting of functions alphabetically by title on admin screen, to keep the list organized as the set of options grows.

= 1.4.2 - 2021.12.19 =

* Added HTTP 403 status when XML-RPC requests are killed.
* Added logic to remove HTTP response headers for WP Shortlink and REST API.
* Added logic to also remove resource hints from login screen when set for the front end.
* Added "oEmbed Discovery Links" option in **Remove head tags**.
* Corrected checkbox label "Quick Press" to "Quick Draft" in dashboard widget options.
* Fixed priority on `remove_action()` for REST API.
* Modified admin bar logout button to use admin color scheme.
* Removed `likes` column from functionality affected by **Remove Comments from admin** because it is not part of WP core.
* Refactored `r34nono_remove_head_tags()` to use `switch` instead of `if / elseif / else`.
* Specified PHP 7.0.0 minimum requirement in readme file.

= 1.4.1 - 2021.12.18 =

* Added **Remove Posts from admin**, **Disable site search**, and **Disallow theme and plugin file editing** options.
* Fix: Changed `r34nono_core_upgrade_skip_new_bundled` hook type from `filter` to `action.

= 1.4.0 - 2021.12.18 =

**NOTE** Two options' function names have changed in this version. The update script should automatically transfer their settings over to their replacements. However, you are encouraged to review your settings after running the update.

* Added **Remove head tags**, with options to turn off a number of `<link>` tags that WordPress inserts by default in the `<head>` of every page.
* Changed **Remove WordPress logo on login screen** to **Replace WP logo with site icon on login screen**. This will use the designated site icon and change the URL to the site's home page. If there is no designated site icon, the icon will simply be removed instead.
* Modified **Remove Comments from admin** functionality to also remove comments (and likes) columns from admin index pages for Posts, Pages and Media Library. (Does not change settings for any custom post types.)
* Modified **Disable XML-RPC** functionality to add the option to immediately kill incoming XML-RPC requests. Due to the fact that this is a plugin-based solution, you may find it more effective to block access to `xmlrpc.php` directly in your site's `.htaccess` file.

= 1.3.0 - 2021.12.18 =

* Added **Admin bar logout link** option.
* Refactored CSS.
* Fixed link error in sidebar on admin page.

= 1.2.0 - 2021.12.17 =

* Added option to deactivate, delete and prevent reinstallation of [Hello Dolly](https://wordpress.org/plugins/hello-dolly) plugin.

= 1.1.1 - 2021.12.15 =

* Changed all instances of `esc_html()` to `wp_kses_post()` on admin page.
* Removed unnecessary `NAMESPACE` constant from `R34NoNo` class.
* New branding assets.

= 1.1.0 - 2021.12.14 =

* Initial WordPress Plugin Directory version.
* Added option to deactivate Widgets Block Editor.
* Added option to remove Dashboard widgets, and related functionality to support sub-options on admin page.
* Duplicated Save Changes button at top of form.
* Updated sidebar on admin page.
	* Changed donation button to make it less likely to be mistaken for the Save Changes button.
	* Fixed links.
	* i18n: Added translation strings. (Translation files are not yet present.)
* Updated readme content and tags.
* Added input value filtering on `update_option()`.
* Added `esc_html()` on all variable output on admin page.
* Changed text domain to conform with plugin directory requirements.

= 1.0.0 - 2021.12.13 =

* Original version.

== Upgrade Notice ==
