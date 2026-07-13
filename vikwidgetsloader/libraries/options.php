<?php
/**
 * @package     VikWidgetsLoader
 * @subpackage  options
 * @author      E4J s.r.l.
 * @copyright   Copyright (C) 2018 E4J s.r.l. All Rights Reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://vikwp.com
 */

defined('ABSPATH') or die('No script kiddies please!');

add_action( 'admin_menu', 'vikwidgetsloader_add_options_page' );

function vikwl_add_options_style() {
	if (get_current_screen()->base == 'settings_page_vikwidgetsloader') {
		wp_register_style('vikwp_widgetsloader_options_css', VIKWIDGETSLOADER_ASSETS_URI . 'css/vikwp_options_page.css', false, 1.0, 'all');
		wp_enqueue_style('vikwp_widgetsloader_options_css');
	}
}
add_action('admin_enqueue_scripts', 'vikwl_add_options_style'); 

function vikwidgetsloader_add_options_page() {

	$disabled_widgets = array();

	add_options_page( __('VikWidgetsLoader', 'vikwidgetsloader'), __('VikWidgetsLoader', 'vikwidgetsloader'), 'manage_options', 'vikwidgetsloader', function() {

		if (!current_user_can('manage_options')) {
			wp_die(
				'<h1>' . __('Forbidden', 'vikmailsmtp') . '</h1>' .
				'<p>' . __('You are not authorized to access this resource.', 'vikmailsmtp') . '</p>',
				403
			);
		}

		if(!empty($_POST)) {

			$disabled_widgets = array();

			check_admin_referer('vikwl_options.save');

			$discontinued_widgets = vikwl_discontinued_widgets();

			foreach (glob(VIKWIDGETSLOADER_WIDGETROOT.'*',GLOB_ONLYDIR) as $widgetValue) {
				$widgetName = vikwl_stripDirectory($widgetValue);
				if (in_array($widgetName, $discontinued_widgets, true)) {
					continue;
				}
				if(!isset($_POST[$widgetName])) {
					$disabled_widgets[] = $widgetName;
				}
			}

			update_option('vikwidgetsloader_disabled_widgets', $disabled_widgets);
			update_option('vikwidgetsloader_fontawesome_autoload', isset($_POST['vikwl_fontawesome_autoload']) ? '1' : '0');

			?>
			<div class="notice is-dismissible notice-success">
				<p><strong><?php _e('Settings Saved Correctly!' , 'vikwidgetsloader'); ?></strong></p>
			</div>
		<?php
		}

		$disabled_widgets = get_option('vikwidgetsloader_disabled_widgets');
		$fontawesome_autoload = get_option('vikwidgetsloader_fontawesome_autoload', '1');
	?>
	<form action="options-general.php?page=vikwidgetsloader" method="POST">
	<?php wp_nonce_field('vikwl_options.save'); ?>
	<h3 class="vikwl-title"><?php _e('General Settings', 'vikwidgetsloader')?></h3>
	<table class="form-table vikwl-settings-table" role="presentation">
		<tbody>
			<tr>
				<th scope="row"><?php _e('Auto-load FontAwesome', 'vikwidgetsloader')?></th>
				<td>
					<div class="switch-ios switch-ios-compact">
						<input type="checkbox" name="vikwl_fontawesome_autoload" value="1" <?php checked($fontawesome_autoload, '1'); ?> id="vikwl-fontawesome-autoload-enabled" class="ios-toggle ios-toggle-round" />
						<label for="vikwl-fontawesome-autoload-enabled"></label>
					</div>
					<p class="description"><?php _e('Automatically load the FontAwesome stylesheet bundled with this plugin on the frontend, when it\'s not already loaded by your theme or another plugin. Disable this if you load FontAwesome yourself and the automatic detection doesn\'t work for your setup (e.g. asynchronous/lazy loading).', 'vikwidgetsloader')?></p>
				</td>
			</tr>
		</tbody>
	</table>
	<h3 class="vikwl-title"><?php _e('VikWidgetsLoader Widgets', 'vikwidgetsloader')?></h3>
	<div class="vikwl-desc"><?php _e('Enable or Disable the widgets you\'d like to use in your website.', 'vikwidgetsloader')?></div>
	<div class="vikwl-container">
	<?php
		$discontinued_widgets = vikwl_discontinued_widgets();
		foreach (glob(VIKWIDGETSLOADER_WIDGETROOT.'*',GLOB_ONLYDIR) as $widgetValue) {
			$widgetName = vikwl_stripDirectory($widgetValue);
			if (in_array($widgetName, $discontinued_widgets, true)) {
				continue;
			}
			?>
			<div class="vikwl-option-box">
				<?php if (file_exists(VIKWIDGETSLOADER_WIDGETROOT . $widgetName . '/' . $widgetName . '.png')) { ?>
				<img src="<?php echo VIKWIDGETSLOADER_WIDGETS_URI . $widgetName . '/' . $widgetName . '.png';?>"/>
				<?php } else { ?>
				<span class="vikwl-missing-image-text"><?php echo $widgetName;?></span>
				<?php } ?>
				<div class="vikwl-description-box">
					<div class="vikwl-checkbox-container">
						<div class="switch-ios">
							<input type="checkbox" name="<?php echo $widgetName;?>" value="1" <?php is_array($disabled_widgets) ? checked(!in_array($widgetName, $disabled_widgets)) : checked(true); ?> id="vikwl-<?php echo $widgetName;?>-enabled" class="ios-toggle ios-toggle-round" />
							<label for="vikwl-<?php echo $widgetName;?>-enabled"></label>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	?>
			<div class="vikwl-option-button-container">
				<button class="vikwl-option-button activate-now button button-primary" type="submit">Submit</button>
			</div>
		</div>
	</form>
	<?php
	});
}
