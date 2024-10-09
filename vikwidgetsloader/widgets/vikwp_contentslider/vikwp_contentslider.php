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

class vikwp_contentslider extends VikWL_Widget {
	function __construct() {
		function vikwp_contentslider_add_style() {
			if (is_active_widget(false, false, 'vikwp_contentslider', false)) {
				wp_register_style('vikwp_contentslider', VIKWIDGETSLOADER_WIDGETS_URI . 'vikwp_contentslider/vikwp_contentslider.css', false, 1.0, 'all');
				wp_enqueue_style('vikwp_contentslider');

				wp_register_style('vikwp_widgetsloaderanimate', VIKWIDGETSLOADER_ASSETS_URI . 'css/animate.css', false, 1.0, 'all');
				wp_enqueue_style('vikwp_widgetsloaderanimate');

				wp_register_style('vikwp_widgetsloaderbootstrap', VIKWIDGETSLOADER_ASSETS_URI . 'css/bootstrap.css', false, 1.0, 'all');
				wp_enqueue_style('vikwp_widgetsloaderbootstrap');

				wp_register_style('vikwp_widgetsloadertouchslidercss', VIKWIDGETSLOADER_ASSETS_URI . 'css/bootstrap-touch-slider.css', false, 1.0, 'all');
				wp_enqueue_style('vikwp_widgetsloadertouchslidercss');
			}
		}
		add_action('wp_enqueue_scripts', 'vikwp_contentslider_add_style');

		function vikwp_contentslider_add_scripts(){
			if (is_active_widget(false, false, 'vikwp_contentslider', false)) {
				wp_enqueue_script('vikwp_widgetsloadereffects', VIKWIDGETSLOADER_ASSETS_URI . 'js/effects.js', array('jquery'));
				wp_enqueue_script('vikwp_widgetsloaderbootstrap', VIKWIDGETSLOADER_ASSETS_URI . 'js/bootstrap.js', array('jquery'));
				wp_enqueue_script('vikwp_widgetsloadertouchsliderjs', VIKWIDGETSLOADER_ASSETS_URI . 'js/bootstrap-touch-slider.js', array('jquery'));
			}
		}
		add_action('wp_enqueue_scripts', 'vikwp_contentslider_add_scripts');

		parent::__construct(
			// Path of the file
			dirname(__FILE__),
			
			// Base ID of your widget
			'vikwp_contentslider', 
			 
			// Widget name will appear in UI
			__('VikWP Content Slider Widget', 'vikwidgetsloader'), 
			 
			// Widget description
			array( 'description' => __( 'This widget displays a slider that contains your images', 'vikwidgetsloader' ), ) 
		);
	}
}
