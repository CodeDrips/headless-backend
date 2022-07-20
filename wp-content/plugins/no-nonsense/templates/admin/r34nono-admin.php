<?php
// Don't load directly
if (!defined('ABSPATH')) { exit; }

// Only load in admin
if (!is_admin()) { exit; }

global $r34nono;
?>

<div class="wrap r34nono">
	<h2><?php echo get_admin_page_title(); ?></h2>

	<div class="metabox-holder columns-2">
	
		<div class="column-1">

			<div class="postbox">

				<div class="inside">
	
					<form method="post" action="" class="r34nono-admin" autocomplete="force-off">
					<?php wp_nonce_field('r34nono-nonce-utilities','r34nono-nonce-utilities'); ?>
					
					<h3><?php _e('Utilities', 'no-nonsense'); ?></h3>
					
					<p><?php _e('Utilities are one-time actions to clean up default content, plugins and options in the default WordPress installation.', 'no-nonsense'); ?></p>
					
					<table class="form-table"><tbody>
					
						<?php
						foreach ((array)$r34nono->utilities as $name => $item) {
							if (empty($item['show_in_admin'])) { continue; }
							?>
							<tr>
								<td style="white-space: nowrap;">
									<input type="checkbox" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>" />
								</td>
								<td style="width: 100%;">
									<strong><label for="<?php echo esc_attr($name); ?>"><?php echo wp_kses_post($item['title']); ?></label></strong>
									<span class="help"><span class="help_content"><?php echo wp_kses_post($item['description']); ?></span></span>
								</td>
							</tr>
							<?php
						}
						?>
					
					</tbody></table>
					
					<div style="text-align: right;">
						<input type="submit" value="<?php echo esc_attr(__('Run Selected Utilities', 'no-nonsense')); ?>" class="button button-primary button-disabled" onclick="if (!jQuery(this).hasClass('button-disabled') && !confirm('<?php esc_attr_e('Are you sure? This cannot be undone.'); ?>')) { return false; }" />
					</div>
					
					</form>

					<hr />
					
					<h3><?php _e('Settings', 'no-nonsense'); ?></h3>

					<p><?php _e('Settings are persistent configuration changes that modify default behaviors on each page load.', 'no-nonsense'); ?></p>
					
					<form method="post" action="" class="r34nono-admin" autocomplete="force-off">
					<?php wp_nonce_field('r34nono-nonce-settings','r34nono-nonce-settings'); ?>
					
					<div style="text-align: right;">
						<input type="submit" value="<?php echo esc_attr(__('Save Settings', 'no-nonsense')); ?>" class="button button-primary button-disabled" />
					</div>

					<table class="form-table"><tbody>
					
						<?php
						foreach ((array)r34nono_group_settings() as $group => $group_fns) {
							?>
							<tr class="r34nono-table-header-row"><td colspan="3"><strong><?php echo wp_kses_post($group); ?></strong></td></tr>
							<?php
							foreach ((array)$group_fns as $name => $item) {
								if (empty($item['show_in_admin'])) { continue; }
								$current_value = get_option($name);
								?>
								<tr>
									<td style="white-space: nowrap;">
										<label for="<?php echo esc_attr($name); ?>_0"><input type="radio" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>_0" value="0"<?php if ($current_value == 0) { echo ' checked="checked"'; } ?> />&nbsp;<?php _e('Off', 'no-nonsense'); ?></label>
									</td>
									<td style="white-space: nowrap;">
										<label for="<?php echo esc_attr($name); ?>_1"><input type="radio" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>_1" value="1"<?php if ($current_value == 1) { echo ' checked="checked"'; } ?> />&nbsp;<?php _e('On', 'no-nonsense'); ?></label>
									</td>
									<td style="width: 100%;">
										<strong><?php echo wp_kses_post($item['title']); ?></strong>
										<span class="help"><span class="help_content"><?php echo wp_kses_post($item['description']); ?></span></span>
										<?php
										if (!empty($item['options'])) {
											$fn_options = get_option($name . '_options');
											?>
											<div class="r34nono-options-toggle" data-fn="<?php echo esc_attr($name); ?>">
												<!-- This hidden field is for handling situations where all options are being deselected -->
												<input type="hidden" name="<?php echo esc_attr($name); ?>_options[]" value="" />
												<?php
												foreach ((array)$item['options'] as $opt_name => $opt_label) {
													?>
													<label for="<?php echo esc_attr($name); ?>_options_<?php echo esc_attr($opt_name); ?>"><input type="checkbox" name="<?php echo esc_attr($name); ?>_options[<?php echo esc_attr($opt_name); ?>]" id="<?php echo esc_attr($name); ?>_options_<?php echo esc_attr($opt_name); ?>" value="1"<?php
													if (!empty($fn_options[$opt_name])) { echo ' checked="checked"'; }
													?> />&nbsp;<?php echo wp_kses_post($opt_label); ?></label>
													<?php
												}
												?>
											</div>
											<?php
										}
										?>
									</td>
								</tr>
								<?php
							}
						}
						?>
					
					</tbody></table>

					<div style="text-align: right;">
						<input type="submit" value="<?php echo esc_attr(__('Save Settings', 'no-nonsense')); ?>" class="button button-primary button-disabled" />
					</div>

					</form>
				
				</div>
			
			</div>

		</div>
	
		<div class="column-2">

			<div class="postbox">

				<h3 class="hndle"><span><?php _e('No Nonsense Support', 'no-nonsense'); ?></span></h3>
		
				<div class="inside">
	
					<p><?php echo sprintf(__('For support with the %1$s plugin, please use the %2$sWordPress Support Forums%3$s or email %4$s.', 'no-nonsense'), '<strong>No Nonsense</strong>', '<a href="https://wordpress.org/support/plugin/no-nonsense" target="_blank">', '</a>', '<a href="mailto:support@room34.com">support@room34.com</a>'); ?></p>
		
				</div>

			</div>

			<div class="postbox">

				<h3 class="hndle"><span>Thank You!</span></h3>
		
				<div class="inside">
	
					<a href="https://room34.com/about/payments/?type=WordPress+Plugin&plugin=No+Nonsense&amt=9" target="_blank"><img src="<?php echo dirname(dirname(plugin_dir_url(__FILE__))); ?>/assets/room34-logo-on-white.svg" alt="Room 34 Creative Services" style="display: block; height: auto; margin: 0 auto 0.5em auto; width: 200px;" /></a> 
		
					<p><?php _e('This plugin is free to use. However, if you find it to be of value, we welcome your donation (suggested amount: USD $9), to help fund future development.', 'no-nonsense'); ?></p>

					<p><a href="https://room34.com/about/payments/?type=WordPress+Plugin&plugin=No+Nonsense&amt=9" target="_blank" class="button"><?php _e('Make a Donation', 'no-nonsense'); ?></a></p>
					
				</div>
		
			</div>
		
			<p><small>No Nonsense v. <?php echo wp_kses_post(get_option('r34nono_version')); ?></small></p>
		
		</div>
	
	</div>

</div>