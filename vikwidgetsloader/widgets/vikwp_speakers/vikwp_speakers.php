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

class vikwp_speakers extends VikWL_Widget {
	function __construct() {
		function vikwp_speakers_add_style() {
			if (is_active_widget(false, false, 'vikwp_speakers', false)) {
				wp_register_style('vikwl_style', VIKWIDGETSLOADER_ASSETS_URI . 'css/vikwl_styles.css', false, 1.0, 'all');
				wp_enqueue_style('vikwl_style');
				
				/*
				 * Disabled FontAwesome beacuse has been always loaded from the VikWP theme.
				//FontAwesome
				wp_register_style('vikwpspeakers_fontawesome', VIKWIDGETSLOADER_ASSETS_URI . 'css/src/font-awesome.min.css', false, 1.0, 'all');
				wp_enqueue_style('vikwpspeakers_fontawesome');
				*/
			}
		}
		add_action('wp_enqueue_scripts', 'vikwp_speakers_add_style');

		parent::__construct(
			// Path of the file
			dirname(__FILE__),
			
			// Base ID of your widget
			'vikwp_speakers', 
			 
			// Widget name will appear in UI
			__('VikWP Speakers Widget', 'vikwidgetsloader'), 
			 
			// Widget description
			array( 'description' => __( 'With this module you can create speakers or peoples profile.', 'vikwidgetsloader' ), ) 
		);
	}
}
