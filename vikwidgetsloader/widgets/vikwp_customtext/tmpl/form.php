<?php
/**
 * @package     VikWidgetsLoader
 * @subpackage  widget
 * @author      E4J s.r.l.
 * @copyright   Copyright (C) 2019 E4J s.r.l. All Rights Reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://vikwp.com
 */

defined('ABSPATH') or die('No script kiddies please!');

if (isset( $instance[ 'title' ] ) ) {
	$title = $instance[ 'title' ];
} else {
	$title = __( 'New title', 'vikwidgetsloader' );
}

if (isset($instance['textarea'])) {
	$textarea = $instance['textarea'];
} else {
	$textarea = __( '', 'vikwidgetsloader' );
}

if (isset( $instance['class_suffix'])) {
	$class_suffix = $instance['class_suffix'];
} else {
	$class_suffix = __('', 'vikwidgetsloader');
}

?>
<div class="vikwp-widget-params">
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' , 'vikwidgetsloader'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<p>
		<?php 
		$editor_id = $this->get_field_id('textarea');
		$editor_name = $this->get_field_name('textarea');
		$content = $textarea;
		$settings = array( 
			'textarea_name' => $editor_name,
			'textarea_rows' => 20,
			'media_buttons' => false,
			'editor_height'	=> 100,
			'teeny' => true,
			);
		wp_editor( $content, $editor_id, $settings );
		?>
	</p>
	<p class="vikwp-classwdg">
		<label for="<?php echo $this->get_field_id( 'class_suffix' ); ?>"><?php _e('CSS Class:' , 'vikwidgetsloader'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'class_suffix' ); ?>" name="<?php echo $this->get_field_name( 'class_suffix' ); ?>" type="text" value="<?php echo esc_attr( $class_suffix ); ?>" />
	</p>
</div>