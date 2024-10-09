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
	$title = __( '', 'vikwidgetsloader' );
}

if (isset($instance['counter_displayed'])) {
	$counter_displayed = $instance['counter_displayed'];
} else {
	$counter_displayed = 1;
}

if (isset($instance['counter_padding'])) {
	$counter_padding = $instance['counter_padding'];
} else {
	$counter_padding = 2;
}

if (isset( $instance['class_suffix'])) {
	$class_suffix = $instance['class_suffix'];
} else {
	$class_suffix = __('', 'vikwidgetsloader');
}

?>
<div class="vikwp-widget-params">
	<div class="vikwp-widget-cnt">
		<div class="vikwp-widget-col">
			<div class="vikwp-widget-col-inner">
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'counter_displayed' ); ?>"><?php _e( 'Number of Counters:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'counter_displayed' ); ?>" name="<?php echo $this->get_field_name( 'counter_displayed' ); ?>" type="number" min="0" value="<?php echo esc_attr( $counter_displayed ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'counter_padding' ); ?>"><?php _e( 'Padding Size - from 1 to 12:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'counter_padding' ); ?>" name="<?php echo $this->get_field_name( 'counter_padding' ); ?>" type="number" min="1" max="12" value="<?php echo esc_attr( $counter_padding ); ?>" />
				</p>
				<p class="vikwp-classwdg">
					<label for="<?php echo $this->get_field_id( 'class_suffix' ); ?>"><?php _e('CSS Class:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'class_suffix' ); ?>" name="<?php echo $this->get_field_name( 'class_suffix' ); ?>" type="text" value="<?php echo esc_attr( $class_suffix ); ?>" />
				</p>
			</div>
		</div>
		<?php if ($counter_displayed > 0) { ?>
			<div class="vikwp-widget-col">
				<?php for ($i = 0; $i < $counter_displayed; $i++) {
					$counter_image = array_key_exists('counter_' . $i . '_image', $instance) ? $instance['counter_' . $i . '_image'] : '';
					$counter_type = array_key_exists('counter_' . $i . '_type', $instance) ? $instance['counter_' . $i . '_type'] : '';
					$counter_icon = array_key_exists('counter_' . $i . '_selected', $instance) ? $instance['counter_' . $i . '_selected'] : '';
					$title = array_key_exists('counter_' . $i . '_title', $instance) ? $instance['counter_' . $i . '_title'] : '';
					$description = array_key_exists('counter_' . $i . '_description', $instance) ? $instance['counter_' . $i . '_description'] : '';
					$value = array_key_exists('counter_' . $i . '_value', $instance) ? $instance['counter_' . $i . '_value'] : '';
					?>
				<div class="vikwp-widget-col-inner">
					<p>
						<label for="<?php echo $this->get_field_id( 'counter_' . $i . '_image' ); ?>"><?php _e('Counter Image:' , 'vikwidgetsloader'); ?></label>
						<input class="widefat" id="<?php echo $this->get_field_id( 'counter_' . $i . '_image' ); ?>" name="<?php echo $this->get_field_name( 'counter_' . $i . '_image' ); ?>" type="text" value="<?php echo esc_url( $counter_image ); ?>" />
						<button class="upload_image_button button button-primary">Upload Image</button>
					</p>
					<p>
						<label for="<?php echo $this->get_field_id('counter_' . $i . '_type'); ?>"><?php _e('Counter Icon Type:', 'vikwidgetsloader'); ?></label>
						<select class="widefat" id="<?php echo $this->get_field_id('counter_' . $i . '_type');?>" name="<?php echo $this->get_field_name('counter_' . $i . '_type');?>" class="widefat" style="width:100%;">
							<option <?php selected( $counter_type, "fa" ); ?> value="fa"><?php _e('Default', 'vikwidgetsloader'); ?></option>
							<option <?php selected( $counter_type, "far" ); ?> value="far"><?php _e('Regular', 'vikwidgetsloader'); ?></option>
							<option <?php selected( $counter_type, "fas" ); ?> value="fas"><?php _e('Solid', 'vikwidgetsloader'); ?></option>
							<option <?php selected( $counter_type, "fab" ); ?> value="fab"><?php _e('Brand', 'vikwidgetsloader'); ?></option>
							<option <?php selected( $counter_type, "fal" ); ?> value="fal"><?php _e('Light', 'vikwidgetsloader'); ?></option>
						</select>
					</p>
					<p>
						<label for="<?php echo $this->get_field_id('counter_' . $i . '_selected'); ?>"><?php _e('Counter Icon:', 'vikwidgetsloader'); ?></label>
						<select class="widefat vikwp_counter_select" id="<?php echo $this->get_field_id('counter_' . $i . '_selected');?>" name="<?php echo $this->get_field_name('counter_' . $i . '_selected');?>" style="width:100%;">
							<?php foreach ($this->vikwp_counter_getAvailableIcons() as $class => $name) { ?>
							<option <?php selected( $counter_icon, $class ); ?> value="<?php echo $class;?>" data-icon-type-id="<?php echo $this->get_field_id('counter_' . $i . '_type');?>"><?php echo $name;?></option>
							<?php } ?>
						</select>
						<div class="vikwp_counter_example_div"></div>
					</p>
					<p>
						<label for="<?php echo $this->get_field_id('counter_' . $i . '_value'); ?>"><?php _e( 'Counter Value' , 'vikwidgetsloader'); ?></label> 
						<input class="widefat" id="<?php echo $this->get_field_id('counter_' . $i . '_value'); ?>" name="<?php echo $this->get_field_name('counter_' . $i . '_value'); ?>" type="text" value="<?php echo esc_attr( $value ); ?>" />
					</p>
					<p>
						<label for="<?php echo $this->get_field_id('counter_' . $i . '_title'); ?>"><?php _e( 'Counter Title' , 'vikwidgetsloader'); ?></label> 
						<input class="widefat" id="<?php echo $this->get_field_id('counter_' . $i . '_title'); ?>" name="<?php echo $this->get_field_name('counter_' . $i . '_title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
					</p>
					<p>
						<label for="<?php echo $this->get_field_id( 'counter_' . $i . '_description' ); ?>"><?php _e( 'Counter Description' , 'vikwidgetsloader'); ?></label> 
						<input class="widefat" id="<?php echo $this->get_field_id('counter_' . $i . '_description'); ?>" name="<?php echo $this->get_field_name('counter_' . $i . '_description'); ?>" type="text" value="<?php echo esc_attr( $description ); ?>" />
					</p>
				</div>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>

<script>
	jQuery('document').ready(function() {
		jQuery('div[id*="vikwp_counter"]').addClass('vikwp_widget_more_bigger');
		jQuery('.widget-control-save').click(function() {
			jQuery('.switch-html').click();
		});
		
		jQuery('select.vikwp_counter_select:not([name*="__i__"])').select2({
			minimumInputLength: 2,
			allowClear: true,
			// support for Select2 2-
			formatResult: formatIconSelect2,
			formatSelection: formatIconSelect2,
			// support for Select3 3+
			templateResult: formatIconSelect2,
			templateSelection: formatIconSelect2,
			escapeMarkup: function(m) { return m; }
		});
		
	});

	function formatIconSelect2(element) {
		if(!element.id) return element.text; // optgroup
		var _id = jQuery(element.element).data('icon-type-id');
		var type = jQuery('#' + _id).val();
		return element.text + '<i style="text-align: right; margin-left: 5px" class="' + type + ' fa-' + element.id + '"></i>';
	}
</script>