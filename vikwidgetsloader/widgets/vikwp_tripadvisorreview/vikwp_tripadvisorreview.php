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

class vikwp_tripadvisorreview extends VikWL_Widget {
	function __construct() {
		parent::__construct(
			// Path of the file
			dirname(__FILE__),
			
			// Base ID of your widget
			'vikwp_tripadvisoreview', 
			 
			// Widget name will appear in UI
			__('VikWP TripAdvisor Reviews Widget', 'vikwidgetsloader'), 
			 
			// Widget description
			array( 'description' => __( 'Show yours reviews on TripAdvisor for your structure', 'vikwidgetsloader' ), ) 
		);
	}
}
