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

function vikwl_administrator_add_style($hook) {
	if ($hook == "widgets.php") {
		wp_register_style('vikwp_widgetsloader', VIKWIDGETSLOADER_ASSETS_URI . 'css/vikwp_widgets_form.css', false, 1.0, 'all');
		wp_enqueue_style('vikwp_widgetsloader');
	}
}
add_action('admin_enqueue_scripts', 'vikwl_administrator_add_style');

function vikwl_load_language() {
    load_plugin_textdomain('vikwidgetsloader', false, VIKWIDGETSLOADER_LANGUAGEROOT);
}
add_action('plugins_loaded', 'vikwl_load_language');

/**
 * @version 1.0.4
 * Removes the core 'Widgets' panel from the Theme Customizer.
 *
 * @param array $components Core Customizer components list.
 * @return array (Maybe) modified components list.
 */
function vikwl_remove_widgets_panel( $components ) {
    $i = array_search( 'widgets', $components );
    if ( false !== $i ) {
        unset( $components[ $i ] );
    }
    return $components;
}
add_filter( 'customize_loaded_components', 'vikwl_remove_widgets_panel' );