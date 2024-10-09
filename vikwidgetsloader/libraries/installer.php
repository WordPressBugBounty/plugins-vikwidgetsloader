<?php
/**
 * @package     VikWidgetsLoader
 * @subpackage  installer
 * @author      E4J s.r.l.
 * @copyright   Copyright (C) 2018 E4J s.r.l. All Rights Reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://vikwp.com
 */

defined('ABSPATH') or die('No script kiddies please!');

class VikWidgetsLoaderInstaller {

	protected static $init = false;

	public static function init() {
		// init only if not done yet
		if (static::$init === false)
		{
			// handle installation message
			add_action('admin_notices', array('VikWidgetsLoaderInstaller', 'handleMessage'));

			/**
			 * Register hooks and actions here
			 */

			// mark flag as true to avoid init it again
			static::$init = true;
		}
	}

	public static function activatePlugin() {
		add_option('vikwidgetsloader_onactivate', 1);
	}

	public static function deactivatePlugin() {
		delete_option('vikwidgetsloader_disabled_widgets');
		delete_option('vikwidgetsloader_onactivate');
	}

	public static function handleMessage() {
		// if we are in the admin section and the plugin has been activated
		if (is_admin() && get_option('vikwidgetsloader_onactivate') == 1)
		{
			// delete the activation flag to avoid displaying the message more than once
			delete_option('vikwidgetsloader_onactivate');

			?>
			<div class="notice is-dismissible activate-success">
				<p>
					<strong><?php _e('Thank you for activating our plugin! Check the widgets page to see the new widgets.', 'vikwidgetsloader');?></strong>
					<a href="https://vikwp.com">https://vikwp.com</a>
				</p>
			</div>
			<?php
		}
	}
}
