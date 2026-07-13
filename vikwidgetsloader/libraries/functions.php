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

function vikwl_directoryToFilename($directoryName) {
	$tempName = str_replace(' ', '_', $directoryName);
	$tempName = vikwl_stripDirectory($tempName);
	return strtolower($tempName).".php";
}

function vikwl_stripDirectory($fileName) {
	return basename($fileName);
}

/**
 * Widget slugs that remain bundled with the plugin (for sites already using
 * them) but are no longer offered for new use, e.g. because they're
 * unmaintained. They're skipped when registering widgets/blocks and are
 * hidden from the "VikWidgetsLoader Widgets" settings list.
 *
 * @return array
 */
function vikwl_discontinued_widgets() {
	return apply_filters('vikwl_discontinued_widgets', array(
		'vikwp_contentslider',
	));
}

/**
 * Style/script handles under which FontAwesome is commonly registered by
 * themes, page builders or dedicated plugins. Used by vikwl_should_autoload_fontawesome()
 * to avoid loading a duplicate copy when FontAwesome is already available.
 *
 * @return array
 */
function vikwl_fontawesome_known_handles() {
	return apply_filters('vikwl_fontawesome_known_handles', array(
		'font-awesome',
		'font-awesome-official',
		'fontawesome',
		'fa-all',
		'font-awesome-5-all',
		'elementor-icons-fa-solid',
		'elementor-icons-fa-regular',
		'elementor-icons-fa-brands',
	));
}

/**
 * Whether VikWidgetsLoader is allowed to enqueue the FontAwesome copy bundled
 * with the plugin. Returns false when FontAwesome already appears to be
 * registered/enqueued under a known handle, or when auto-loading has been
 * explicitly disabled (needed for cases the detection can't catch, e.g. a
 * theme loading FontAwesome asynchronously).
 *
 * Disable it from Settings > VikWidgetsLoader, or (for cases the plugin
 * settings can't cover) via the VIKWL_DISABLE_FONTAWESOME_AUTOLOAD constant
 * or the vikwl_disable_fontawesome_autoload filter.
 *
 * @return bool
 */
function vikwl_should_autoload_fontawesome() {
	if (get_option('vikwidgetsloader_fontawesome_autoload', '1') !== '1') {
		return false;
	}

	if (defined('VIKWL_DISABLE_FONTAWESOME_AUTOLOAD') && VIKWL_DISABLE_FONTAWESOME_AUTOLOAD) {
		return false;
	}

	if (apply_filters('vikwl_disable_fontawesome_autoload', false)) {
		return false;
	}

	foreach (vikwl_fontawesome_known_handles() as $handle) {
		if (wp_style_is($handle, 'registered') || wp_style_is($handle, 'enqueued')
			|| wp_script_is($handle, 'registered') || wp_script_is($handle, 'enqueued')) {
			return false;
		}
	}

	return true;
}

/**
 * Enqueues the FontAwesome stylesheet bundled with the plugin on the
 * frontend, unless it's already available (see vikwl_should_autoload_fontawesome())
 * or auto-loading has been disabled.
 */
function vikwl_autoload_fontawesome() {
	if (!vikwl_should_autoload_fontawesome()) {
		return;
	}

	if (!wp_style_is('vikwl_fontawesome', 'registered')) {
		wp_register_style('vikwl_fontawesome', VIKWIDGETSLOADER_ASSETS_URI . 'css/src/all.min.css', array(), VIKWIDGETSLOADER_VERSION);
	}

	wp_enqueue_style('vikwl_fontawesome');
}
