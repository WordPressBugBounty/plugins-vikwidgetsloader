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

/**
 * Output helpers for widget/block values.
 *
 * Block attributes (and widget instances) reach the widget templates exactly as
 * they were saved: KSES only filters them as HTML text on save, so a value made of
 * a double quote and an equals sign survives and could break out of an HTML
 * attribute. Every value printed outside of an HTML text node must therefore go
 * through the helper matching its context, regardless of who saved it.
 */

/**
 * Returns the value only if it's one of the allowed ones (enumerations such as
 * positions, layouts or styles), otherwise the default.
 *
 * @param 	mixed 	$value
 * @param 	array 	$allowed
 * @param 	string 	$default
 *
 * @return 	string
 */
function vikwl_allowed_value($value, array $allowed, $default) {
	$value = is_scalar($value) ? (string) $value : '';
	return in_array($value, $allowed, true) ? $value : $default;
}

/**
 * Sanitizes a space-separated list of CSS classes (e.g. animation effects or
 * icon names), dropping anything that isn't a valid class name.
 *
 * @param 	mixed 	$value
 *
 * @return 	string
 */
function vikwl_css_classes($value) {
	$value = is_scalar($value) ? (string) $value : '';
	return trim(implode(' ', array_filter(array_map('sanitize_html_class', explode(' ', $value)))));
}

/**
 * Sanitizes a CSS length (e.g. "100%", "400px", "200"). A plain number gets the
 * given unit appended, any other value falls back to the default.
 *
 * @param 	mixed 	$value
 * @param 	string 	$default
 * @param 	string 	$unit 	 unit appended to unitless numbers.
 *
 * @return 	string
 */
function vikwl_css_size($value, $default, $unit = 'px') {
	$value = is_scalar($value) ? trim((string) $value) : '';
	if (!preg_match('/^(\d+(?:\.\d+)?)(px|%|em|rem|vh|vw|vmin|vmax)?$/i', $value, $match)) {
		return $default;
	}
	return $match[1] . (isset($match[2]) ? strtolower($match[2]) : $unit);
}

/**
 * Sanitizes a CSS color: hex, rgb(a)/hsl(a) or a named color. Returns an empty
 * string for anything else.
 *
 * @param 	mixed 	$value
 *
 * @return 	string
 */
function vikwl_css_color($value) {
	$value = is_scalar($value) ? trim((string) $value) : '';
	if (preg_match('/^#(?:[0-9a-f]{3,4}|[0-9a-f]{6}|[0-9a-f]{8})$/i', $value)
		|| preg_match('/^(?:rgb|hsl)a?\(\s*[0-9.,%\s\/-]+\)$/i', $value)
		|| preg_match('/^[a-z]+$/i', $value)) {
		return $value;
	}
	return '';
}

/**
 * Sanitizes a URL to be printed inside a CSS url('...') declaration, encoding the
 * characters that could close the string or the url() function.
 *
 * @param 	mixed 	$value
 *
 * @return 	string
 */
function vikwl_css_url($value) {
	$value = is_scalar($value) ? esc_url_raw((string) $value) : '';
	return str_replace(array('(', ')', "'", '"', '\\', ' '), array('%28', '%29', '%27', '%22', '%5C', '%20'), $value);
}

/**
 * Encodes a value as a JavaScript literal safe to be printed inside a <script> tag.
 *
 * @param 	mixed 	$value
 *
 * @return 	string
 */
function vikwl_js_value($value) {
	return wp_json_encode($value, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
}
