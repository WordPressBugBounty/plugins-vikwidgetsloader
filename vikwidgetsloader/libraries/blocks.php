<?php
/**
 * @package     VikWidgetsLoader
 * @subpackage  blocks
 * @author      E4J s.r.l.
 * @copyright   Copyright (C) 2018 E4J s.r.l. All Rights Reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://vikwp.com
 */

defined('ABSPATH') or die('No script kiddies please!');

add_action('init', 'vikwl_register_blocks');
add_action('rest_api_init', 'vikwl_register_rest_routes');

function vikwl_register_rest_routes() {
	register_rest_route('vikwp/v1', '/icons', array(
		'methods'             => 'GET',
		'callback'            => 'vikwl_rest_get_icons',
		'permission_callback' => function() {
			return current_user_can('edit_posts');
		},
	));
}

function vikwl_rest_get_icons() {
	$css_file = VIKWIDGETSLOADER_ASSETSROOT . 'css' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'all.min.css';
	$buffer   = @file_get_contents($css_file);

	if (!$buffer) {
		return new WP_Error('file_error', 'Cannot read FontAwesome CSS', array('status' => 500));
	}

	preg_match_all('/fa-([a-zA-Z\-_]+):before/', $buffer, $matches);

	$icons = array();
	foreach ($matches[1] as $icon) {
		$label = preg_replace('/-o$/', ' (outline)', $icon);
		$label = str_replace('-', ' ', $label);
		$label = ucwords($label);
		$icons[] = array('value' => $icon, 'label' => $label);
	}

	usort($icons, function($a, $b) { return strcmp($a['label'], $b['label']); });

	return rest_ensure_response($icons);
}

function vikwl_register_blocks() {
	if (!function_exists('register_block_type')) {
		return;
	}

	wp_register_style(
		'vikwl_style',
		VIKWIDGETSLOADER_ASSETS_URI . 'css/vikwl_styles.css',
		array(),
		VIKWIDGETSLOADER_VERSION
	);

	wp_register_style(
		'vikwl_fontawesome',
		VIKWIDGETSLOADER_ASSETS_URI . 'css/src/all.min.css',
		array(),
		VIKWIDGETSLOADER_VERSION
	);

	$blocks_dir = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'blocks' . DIRECTORY_SEPARATOR;

	register_block_type($blocks_dir . 'vikwp_customtext', array(
		'render_callback' => 'vikwl_render_block_customtext',
	));

	register_block_type($blocks_dir . 'vikwp_counter', array(
		'render_callback' => 'vikwl_render_block_counter',
	));

	register_block_type($blocks_dir . 'vikwp_cookiespolicy', array(
		'render_callback' => 'vikwl_render_block_cookiespolicy',
	));

	register_block_type($blocks_dir . 'vikwp_googlemaps', array(
		'render_callback' => 'vikwl_render_block_googlemaps',
	));

	register_block_type($blocks_dir . 'vikwp_gridcontent', array(
		'render_callback' => 'vikwl_render_block_gridcontent',
	));

	register_block_type($blocks_dir . 'vikwp_category_post', array(
		'render_callback' => 'vikwl_render_block_category_post',
	));

	register_block_type($blocks_dir . 'vikwp_icons', array(
		'render_callback' => 'vikwl_render_block_icons',
	));

	register_block_type($blocks_dir . 'vikwp_speakers', array(
		'render_callback' => 'vikwl_render_block_speakers',
	));

	register_block_type($blocks_dir . 'vikwp_textslide', array(
		'render_callback' => 'vikwl_render_block_textslide',
	));

	// vikwp_contentslider is discontinued (see vikwl_discontinued_widgets()): kept in the
	// codebase for sites already using it, but no longer registered/offered for new use.
	if (!in_array('vikwp_contentslider', vikwl_discontinued_widgets(), true)) {
		register_block_type($blocks_dir . 'vikwp_contentslider', array(
			'render_callback' => 'vikwl_render_block_contentslider',
		));
	}

	register_block_type($blocks_dir . 'vikwp_tripadvisorreview', array(
		'render_callback' => 'vikwl_render_block_tripadvisorreview',
	));
}

/**
 * The vikwp/icons block's render_callback runs while the_content is generated
 * (i.e. in the page body), which is always AFTER wp_head() has already printed
 * the enqueued styles. Enqueuing FontAwesome from inside the render_callback is
 * therefore too late for it to ever be printed. has_block() can instead detect
 * the block from the post content while wp_enqueue_scripts is still running,
 * i.e. before wp_head() prints anything.
 *
 * Note: this only detects the block when placed in the current post/page
 * content. A vikwp/icons block used in a block-based widget area is covered
 * by the classic-widget style detection in widgets/vikwp_icons/vikwp_icons.php
 * instead (is_active_widget()), not by this check.
 */
function vikwl_maybe_autoload_icons_fontawesome() {
	if (has_block('vikwp/icons')) {
		vikwl_autoload_fontawesome();
	}
}
// Late priority so themes/other plugins have already registered their own FontAwesome, if any.
add_action('wp_enqueue_scripts', 'vikwl_maybe_autoload_icons_fontawesome', 100);

function vikwl_block_args() {
	return array(
		'before_widget' => '<div class="vikwl-block-wrapper">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="vikwl-block-title">',
		'after_title'   => '</h2>',
	);
}

/**
 * Returns the already-registered widget instance from $wp_widget_factory.
 * WordPress instantiates each widget during widgets_init via register_widget(),
 * so re-instantiating would cause "Cannot redeclare function" fatal errors
 * for widgets that define named functions inside their constructor.
 */
function vikwl_get_widget($class_name, $widget_file) {
	global $wp_widget_factory;

	if (isset($wp_widget_factory->widgets[$class_name])) {
		return $wp_widget_factory->widgets[$class_name];
	}

	// Fallback: widget not yet registered (should not normally happen)
	if (!class_exists($class_name)) {
		require_once $widget_file;
	}
	return new $class_name();
}

function vikwl_render_block_customtext($attributes) {
	$widget = vikwl_get_widget('vikwp_customtext', VIKWIDGETSLOADER_WIDGETROOT . 'vikwp_customtext/vikwp_customtext.php');

	ob_start();
	$widget->widget(vikwl_block_args(), $attributes);
	return ob_get_clean();
}

function vikwl_render_block_counter($attributes) {
	$widget = vikwl_get_widget('vikwp_counter', VIKWIDGETSLOADER_WIDGETROOT . 'vikwp_counter/vikwp_counter.php');

	$instance = $attributes;

	if (!empty($attributes['items']) && is_array($attributes['items'])) {
		foreach ($attributes['items'] as $i => $item) {
			$instance['counter_' . $i . '_value']       = isset($item['value'])       ? $item['value']       : '';
			$instance['counter_' . $i . '_title']       = isset($item['title'])       ? $item['title']       : '';
			$instance['counter_' . $i . '_description'] = isset($item['description']) ? $item['description'] : '';
			$instance['counter_' . $i . '_image']       = isset($item['image'])       ? $item['image']       : '';
			$instance['counter_' . $i . '_selected']    = isset($item['selected'])    ? $item['selected']    : '';
			$instance['counter_' . $i . '_type']        = isset($item['type'])        ? $item['type']        : 'fas';
		}
		$instance['counter_displayed'] = count($attributes['items']);
	}
	unset($instance['items']);

	ob_start();
	$widget->widget(vikwl_block_args(), $instance);
	return ob_get_clean();
}

function vikwl_render_block_cookiespolicy($attributes) {
	$widget = vikwl_get_widget('vikwp_cookiespolicy', VIKWIDGETSLOADER_WIDGETROOT . 'vikwp_cookiespolicy/vikwp_cookiespolicy.php');

	ob_start();
	$widget->widget(vikwl_block_args(), $attributes);
	return ob_get_clean();
}

function vikwl_render_block_googlemaps($attributes) {
	$widget = vikwl_get_widget('vikwp_googlemaps', VIKWIDGETSLOADER_WIDGETROOT . 'vikwp_googlemaps/vikwp_googlemaps.php');

	$instance = $attributes;

	if (!empty($attributes['items']) && is_array($attributes['items'])) {
		foreach ($attributes['items'] as $idx => $item) {
			$i = $idx + 1;
			$instance['viktitle_' . $i]  = isset($item['title'])  ? $item['title']  : '';
			$instance['viklat_' . $i]    = isset($item['lat'])     ? $item['lat']    : '';
			$instance['viklng_' . $i]    = isset($item['lng'])     ? $item['lng']    : '';
			$instance['viktext_' . $i]   = isset($item['text'])    ? $item['text']   : '';
			$instance['vikshape_' . $i]  = isset($item['shape'])   ? $item['shape']  : '';
			$instance['vikshadow_' . $i] = isset($item['shadow'])  ? $item['shadow'] : '';
		}
		$instance['markers_amount'] = count($attributes['items']);
	}
	unset($instance['items']);

	ob_start();
	$widget->widget(vikwl_block_args(), $instance);
	return ob_get_clean();
}

function vikwl_render_block_gridcontent($attributes) {
	$widget = vikwl_get_widget('vikwp_gridcontent', VIKWIDGETSLOADER_WIDGETROOT . 'vikwp_gridcontent/vikwp_gridcontent.php');

	ob_start();
	$widget->widget(vikwl_block_args(), $attributes);
	return ob_get_clean();
}

function vikwl_render_block_category_post($attributes) {
	$widget = vikwl_get_widget('vikwp_category_post', VIKWIDGETSLOADER_WIDGETROOT . 'vikwp_category_post/vikwp_category_post.php');

	ob_start();
	$widget->widget(vikwl_block_args(), $attributes);
	return ob_get_clean();
}

function vikwl_render_block_icons($attributes) {
	// FontAwesome is auto-loaded (if needed) via vikwl_maybe_autoload_icons_fontawesome() on
	// wp_enqueue_scripts, not here: by the time this render_callback runs, wp_head() has
	// already printed the enqueued styles, so enqueuing it here would always be too late.
	$widget = vikwl_get_widget('vikwp_icons', VIKWIDGETSLOADER_WIDGETROOT . 'vikwp_icons/vikwp_icons.php');

	$instance = $attributes;

	if (!empty($attributes['items']) && is_array($attributes['items'])) {
		foreach ($attributes['items'] as $i => $item) {
			$instance['icon_' . $i . '_type']        = isset($item['type'])        ? $item['type']        : 'fas';
			$instance['icon_' . $i . '_selected']    = isset($item['selected'])    ? $item['selected']    : '';
			$instance['icon_' . $i . '_title']       = isset($item['title'])       ? $item['title']       : '';
			$instance['icon_' . $i . '_description'] = isset($item['description']) ? $item['description'] : '';
			$instance['icon_' . $i . '_readmore']    = isset($item['readmore'])    ? $item['readmore']    : '';
		}
		$instance['icons_displayed'] = count($attributes['items']);
	}
	unset($instance['items']);

	ob_start();
	$widget->widget(vikwl_block_args(), $instance);
	return ob_get_clean();
}

function vikwl_render_block_speakers($attributes) {
	$widget = vikwl_get_widget('vikwp_speakers', VIKWIDGETSLOADER_WIDGETROOT . 'vikwp_speakers/vikwp_speakers.php');

	$instance = $attributes;

	if (!empty($attributes['items']) && is_array($attributes['items'])) {
		foreach ($attributes['items'] as $idx => $item) {
			$i = $idx + 1;
			$instance['spkr_' . $i . '_image']       = isset($item['image'])       ? $item['image']       : '';
			$instance['spkr_' . $i . '_nominative']  = isset($item['nominative'])  ? $item['nominative']  : '';
			$instance['spkr_' . $i . '_role']        = isset($item['role'])        ? $item['role']        : '';
			$instance['spkr_' . $i . '_description'] = isset($item['description']) ? $item['description'] : '';
			$instance['spkr_' . $i . '_readmore']    = isset($item['readmore'])    ? $item['readmore']    : '';
			$instance['spkr_' . $i . '_facebook']    = isset($item['facebook'])    ? $item['facebook']    : '';
			$instance['spkr_' . $i . '_twitter']     = isset($item['twitter'])     ? $item['twitter']     : '';
			$instance['spkr_' . $i . '_google']      = isset($item['google'])      ? $item['google']      : '';
			$instance['spkr_' . $i . '_linkedin']    = isset($item['linkedin'])    ? $item['linkedin']    : '';
		}
		$instance['number_of_speakers'] = count($attributes['items']);
	}
	unset($instance['items']);

	ob_start();
	$widget->widget(vikwl_block_args(), $instance);
	return ob_get_clean();
}

function vikwl_render_block_textslide($attributes) {
	$widget = vikwl_get_widget('vikwp_textslide', VIKWIDGETSLOADER_WIDGETROOT . 'vikwp_textslide/vikwp_textslide.php');

	wp_enqueue_style('vikwp_textslide_owlcarousel', VIKWIDGETSLOADER_ASSETS_URI . 'css/src/owl.carousel.min.css', array(), VIKWIDGETSLOADER_VERSION);
	wp_enqueue_script('vikwp_textslide_owl-carousel', VIKWIDGETSLOADER_ASSETS_URI . 'js/owl.carousel.min.js', array('jquery'), VIKWIDGETSLOADER_VERSION);

	ob_start();
	$widget->widget(vikwl_block_args(), $attributes);
	return ob_get_clean();
}

function vikwl_render_block_contentslider($attributes) {
	$widget = vikwl_get_widget('vikwp_contentslider', VIKWIDGETSLOADER_WIDGETROOT . 'vikwp_contentslider/vikwp_contentslider.php');

	wp_enqueue_style('vikwp_contentslider', VIKWIDGETSLOADER_WIDGETS_URI . 'vikwp_contentslider/vikwp_contentslider.css', array(), VIKWIDGETSLOADER_VERSION);
	wp_enqueue_style('vikwp_widgetsloaderanimate', VIKWIDGETSLOADER_ASSETS_URI . 'css/animate.css', array(), VIKWIDGETSLOADER_VERSION);
	wp_enqueue_style('vikwp_widgetsloaderbootstrap', VIKWIDGETSLOADER_ASSETS_URI . 'css/bootstrap.css', array(), VIKWIDGETSLOADER_VERSION);
	wp_enqueue_style('vikwp_widgetsloadertouchslidercss', VIKWIDGETSLOADER_ASSETS_URI . 'css/bootstrap-touch-slider.css', array(), VIKWIDGETSLOADER_VERSION);
	wp_enqueue_script('vikwp_widgetsloadereffects', VIKWIDGETSLOADER_ASSETS_URI . 'js/effects.js', array('jquery'), VIKWIDGETSLOADER_VERSION);
	wp_enqueue_script('vikwp_widgetsloaderbootstrap', VIKWIDGETSLOADER_ASSETS_URI . 'js/bootstrap.js', array('jquery'), VIKWIDGETSLOADER_VERSION);
	wp_enqueue_script('vikwp_widgetsloadertouchsliderjs', VIKWIDGETSLOADER_ASSETS_URI . 'js/bootstrap-touch-slider.js', array('jquery'), VIKWIDGETSLOADER_VERSION);

	$instance = $attributes;

	if (!empty($attributes['items']) && is_array($attributes['items'])) {
		foreach ($attributes['items'] as $idx => $item) {
			$i = $idx + 1;
			$instance['slideimage_' . $i]     = isset($item['image'])     ? $item['image']     : '';
			$instance['slidetitle_' . $i]     = isset($item['title'])     ? $item['title']     : '';
			$instance['slidecaption_' . $i]   = isset($item['caption'])   ? $item['caption']   : '';
			$instance['slidereadmore_' . $i]  = isset($item['readmore'])  ? $item['readmore']  : '';
			$instance['slidepublished_' . $i] = isset($item['published']) ? $item['published'] : '1';
		}
		$instance['number_of_slides'] = count($attributes['items']);
	}
	unset($instance['items']);

	ob_start();
	$widget->widget(vikwl_block_args(), $instance);
	return ob_get_clean();
}

function vikwl_render_block_tripadvisorreview($attributes) {
	$widget = vikwl_get_widget('vikwp_tripadvisorreview', VIKWIDGETSLOADER_WIDGETROOT . 'vikwp_tripadvisorreview/vikwp_tripadvisorreview.php');

	ob_start();
	$widget->widget(vikwl_block_args(), $attributes);
	return ob_get_clean();
}
