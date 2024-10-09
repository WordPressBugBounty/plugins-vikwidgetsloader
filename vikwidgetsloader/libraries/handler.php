<?php
/**
 * @package     VikWidgetsLoader
 * @subpackage  libraries
 * @author      E4J s.r.l.
 * @copyright   Copyright (C) 2018 E4J s.r.l. All Rights Reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://vikwp.com
 */

defined('ABSPATH') or die('No script kiddies please!');

class VikWidgetsLoaderHandler {
	public static function LoadAll() {
		$disabled_widgets = get_option('vikwidgetsloader_disabled_widgets');
		foreach (glob(VIKWIDGETSLOADER_WIDGETROOT.'*',GLOB_ONLYDIR) as $widgetName) {
			if(is_array($disabled_widgets) && !in_array(vikwl_stripDirectory($widgetName), $disabled_widgets)) {
				require_once $widgetName.DIRECTORY_SEPARATOR.vikwl_directoryToFilename($widgetName);
				register_widget(vikwl_stripDirectory($widgetName));
			} else if($disabled_widgets === false) {
				require_once $widgetName.DIRECTORY_SEPARATOR.vikwl_directoryToFilename($widgetName);
				register_widget(vikwl_stripDirectory($widgetName));
			}
		}
	}

	public static function Load(array $widgets) {
		foreach ($widgets as $widget) {
			require_once VIKWIDGETSLOADER_WIDGETROOT.$widget.DIRECTORY_SEPARATOR.vikwl_directoryToFilename($widget);
			register_widget($widget);
		}
	}

	public static function UnloadAll() {
		foreach (glob(VIKWIDGETSLOADER_WIDGETROOT.'*',GLOB_ONLYDIR) as $widgetName) {
			require_once $widgetName.DIRECTORY_SEPARATOR.vikwl_directoryToFilename($widgetName);
			unregister_widget(vikwl_stripDirectory($widgetName));
		}
	}

	public static function Unload(array $widgets) {
		foreach ($widgets as $widget) {
			require_once VIKWIDGETSLOADER_WIDGETROOT.$widget.DIRECTORY_SEPARATOR.vikwl_directoryToFilename($widget);
			unregister_widget($widget);
		}
	}
}
