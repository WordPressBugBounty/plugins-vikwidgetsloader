<?php
/*
Plugin Name:  VikWidgetsLoader
Plugin URI:   https://wordpress.org/plugins/vikwidgetsloader/
Description:  Plugin used to load several Widgets.
Version:      1.10.1
Author:       E4J s.r.l.
Author URI:   https://vikwp.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  vikwidgetsloader
Domain Path:  /languages
*/

defined('ABSPATH') or die('No script kiddies please!');

require dirname(__FILE__).DIRECTORY_SEPARATOR."autoload.php";

register_activation_hook(__FILE__, array('VikWidgetsLoaderInstaller', 'activatePlugin'));
register_deactivation_hook( __FILE__, array('VikWidgetsLoaderInstaller', 'deactivatePlugin'));
add_action('init', array('VikWidgetsLoaderInstaller', 'init'));
add_action('widgets_init', function(){VikWidgetsLoaderHandler::LoadAll();});
