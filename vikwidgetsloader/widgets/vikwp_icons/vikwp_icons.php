<?php 
/**
 * @package     VikWidgetsLoader
 * @subpackage  widget
 * @author      E4J s.r.l.
 * @copyright   Copyright (C) 2018 E4J s.r.l. All Rights Reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://vikwp.com
 */

defined('ABSPATH') or die('No script kiddies please!');

class vikwp_icons extends VikWL_Widget {

	protected $icons = null;
 
	function __construct() {
		// Register and load the widget
		add_action('widgets_init', function() {
			register_widget('vikwp_icons');
		});

		function vikwp_icons_add_front_dependencies() {
			if (is_active_widget(false, false, 'vikwp_icons', false)) {
				//Widget CSS
				wp_register_style('vikwl_style', VIKWIDGETSLOADER_ASSETS_URI . 'css/vikwl_styles.css', false, 1.0, 'all');
				wp_enqueue_style('vikwl_style');

				//FontAwesome
				/*
				 * Disabled FontAwesome beacuse has been always loaded from the VikWP theme.

				wp_register_style('vikwpicons_fontawesome', VIKWIDGETSLOADER_ASSETS_URI . 'css/src/all.min.css', false, 1.0, 'all');
				wp_enqueue_style('vikwpicons_fontawesome');
				*/
			}
		}
		add_action('wp_enqueue_scripts', 'vikwp_icons_add_front_dependencies');

		function vikwp_icons_add_form_dependencies() {
			if (get_current_screen()->base == "widgets") {
				//FontAwesome
				wp_register_style('vikwpicons_fontawesome', VIKWIDGETSLOADER_ASSETS_URI . 'css/src/all.min.css', false, 1.0, 'all');
				wp_enqueue_style('vikwpicons_fontawesome');

				//Select2
				wp_enqueue_script('vikwpicons_select2_js', VIKWIDGETSLOADER_ASSETS_URI . 'js/select2/select2.min.js', array('jquery'));
				wp_register_style('vikwpicons_select2_css', VIKWIDGETSLOADER_ASSETS_URI . 'js/select2/select2.css', false, 1.0, 'all');
				wp_enqueue_style('vikwpicons_select2_css');
			}
		}
		add_action('admin_enqueue_scripts', 'vikwp_icons_add_form_dependencies');

		parent::__construct(
			// Path of the file
			dirname(__FILE__),
			
			// Base ID of your widget
			'vikwp_icons', 
			 
			// Widget name will appear in UI
			__('VikWP Icons Widget', 'vikwidgetsloader'), 
			 
			// Widget description
			array( 'description' => __( 'With this widget you can display any kind of icons within a block', 'vikwidgetsloader' ), ) 
		);
	}

	protected function getAvailableIcons()
	{
		if ($this->icons === null)
		{
			$font_awesome_file = VIKWIDGETSLOADER_ASSETSROOT . 'css' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'all.min.css';
			$handle = fopen($font_awesome_file, 'r');

			if (!$handle)
			{
				throw new Exception('Impossible to read the Font Awesome contents.', 403);
			}

			$buffer = "";

			while (!feof($handle))
			{
				$buffer .= fread($handle, 1024);
			}

			fclose($handle);

			preg_match_all("/fa-([a-zA-Z\-_]+):before/", $buffer, $matches);

			$this->icons = array();

			foreach ($matches[1] as $icon)
			{
				$key = $icon;

				$icon = preg_replace("/-o$/", " (outline)", $icon);
				$icon = preg_replace("/-/", " ", $icon);
				$icon = ucwords($icon);

				$this->icons[$key] = $icon;
			}
			asort($this->icons);
		}
		return $this->icons;
	}
}
