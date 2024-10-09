<?php
/**
 * @package     VikWidgetsLoader
 * @subpackage  constants
 * @author      E4J s.r.l.
 * @copyright   Copyright (C) 2018 E4J s.r.l. All Rights Reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://vikwp.com
 */

defined('ABSPATH') or die('No script kiddies please!');

// Plugin Version
define("VIKWIDGETSLOADER_VERSION", '1.10.1');
// Language Folder
define("VIKWIDGETSLOADER_LANGUAGEROOT", basename(dirname(__FILE__)).DIRECTORY_SEPARATOR."languages".DIRECTORY_SEPARATOR);
// Widgets Folder
define("VIKWIDGETSLOADER_WIDGETROOT", dirname(__FILE__).DIRECTORY_SEPARATOR."widgets".DIRECTORY_SEPARATOR);
// Assets Folder
define("VIKWIDGETSLOADER_ASSETSROOT", dirname(__FILE__).DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR);
// Widgets URI Directory Path
define("VIKWIDGETSLOADER_WIDGETS_URI", plugin_dir_url(__FILE__)."widgets/");
// Assets Directory Path
define("VIKWIDGETSLOADER_ASSETS_URI", plugin_dir_url(__FILE__)."assets/");
