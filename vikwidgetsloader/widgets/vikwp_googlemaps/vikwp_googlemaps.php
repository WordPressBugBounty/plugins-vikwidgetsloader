<?php 
/**
 * @package     VikWidgetsLoader
 * @subpackage  widget
 * @author      E4J s.r.l.
 * @copyright   Copyright (C) 2018 E4J s.r.l. All Rights Reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://vikwp.com
 */

class vikwp_googlemaps extends VikWL_Widget {
	function __construct() {
		function vikwp_googlemaps_add_style() {
			if (is_active_widget(false, false, 'vikwp_googlemaps', false)) {
				wp_register_style('vikwl_style', VIKWIDGETSLOADER_ASSETS_URI . 'css/vikwl_styles.css', false, 1.0, 'all');
				wp_enqueue_style('vikwl_style');
			}
		}
		add_action('wp_enqueue_scripts', 'vikwp_googlemaps_add_style');

		parent::__construct(
			// Path of the file
			dirname(__FILE__),
			
			// Base ID of your widget
			'vikwp_googlemaps', 
			 
			// Widget name will appear in UI
			__('VikWP Google Maps Widget', 'vikwidgetsloader'), 
			 
			// Widget description
			array( 'description' => __( 'This widget displays a map and allows you to show positions', 'vikwidgetsloader' ), ) 
		);
	}
}
