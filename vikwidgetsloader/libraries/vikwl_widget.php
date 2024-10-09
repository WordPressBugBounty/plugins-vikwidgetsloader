<?php 
/**
 * @package     VikWidgetsLoader
 * @subpackage  superclass
 * @author      E4J s.r.l.
 * @copyright   Copyright (C) 2018 E4J s.r.l. All Rights Reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://vikwp.com
 */

defined('ABSPATH') or die('No script kiddies please!');

/**
 * VikWP WidgetsLoader Widget
*/
 
// Creating the widget 
class VikWL_Widget extends WP_Widget {
 
	protected $modpath = "";

	function __construct($modpath, $base_id, $ui_name, $description) {
		$this->modpath = $modpath;
		parent::__construct($base_id, $ui_name, $description);
	}
 
	// Creating widget front-end
	public function widget( $args, $instance ) {
		echo $this->getLayoutContents('widget', $instance, $args);
	}

	public function form( $instance ) {
		echo $this->getLayoutContents('form', $instance);
	}
	     
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$new_instance['title'] = !empty($new_instance['title']) ? strip_tags($new_instance['title']) : '';
		return $new_instance;
	}

	protected function getLayoutContents($file, $instance = array(), $args = array())
	{
		ob_start();
		if ($file == 'widget') {
			echo $args['before_widget'];
			if (isset($instance['title']) && !empty($instance['title'])) {
				echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
			}
			include $this->modpath . DIRECTORY_SEPARATOR . 'tmpl' . DIRECTORY_SEPARATOR . $file . '.php';
			echo $args['after_widget'];
		} else {
			include $this->modpath . DIRECTORY_SEPARATOR . 'tmpl' . DIRECTORY_SEPARATOR . $file . '.php';
		}
		$contents = ob_get_contents();
		ob_end_clean();
		return $contents;
	}
}
