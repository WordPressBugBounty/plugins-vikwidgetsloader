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

if (isset( $instance['title'])) {
	$title = $instance['title'];
} else {
	$title = __('New title', 'vikwidgetsloader');
}

if (isset( $instance['readmoretext'])) {
	$readmoretext = $instance['readmoretext'];
} else {
	$readmoretext = __('Read More Text', 'vikwidgetsloader');
}

if (isset($instance['icon_size'])) {
	$icon_size = $instance['icon_size'];
} else {
	$icon_size = '24';
}

if (isset($instance['icon_style'])) {
	$icon_style = $instance['icon_style'];
} else {
	$icon_style = 'default';
}

if (isset($instance['container_size'])) {
	$container_size = $instance['container_size'];
} else {
	$container_size = '0';
}

if (isset($instance['icon_padding'])) {
	$icon_padding = $instance['icon_padding'];
} else {
	$icon_padding = '3';
}

if (isset($instance['content_alignment'])) {
	$content_alignment = $instance['content_alignment'];
} else {
	$content_alignment = '0';
}

if (isset($instance['icons_displayed'])) {
	$icons_displayed = $instance['icons_displayed'];
} else {
	$icons_displayed = '3';
}

if (isset($instance['readmore_target'])) {
	$readmore_target = $instance['readmore_target'];
} else {
	$readmore_target = '0';
}

if (isset($instance['icon_alignment'])) {
	$icon_alignment = $instance['icon_alignment'];
} else {
	$icon_alignment = 'top';
}

if (isset($instance['textarea_above'])) {
	$textarea_above = $instance['textarea_above'];
} else {
	$textarea_above = __( '', 'vikwidgetsloader' );
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
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'icons_displayed' ); ?>"><?php _e( 'Icons Displayed:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'icons_displayed' ); ?>" name="<?php echo $this->get_field_name( 'icons_displayed' ); ?>" type="number" min="0" value="<?php echo esc_attr( $icons_displayed ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('icon_size'); ?>"><?php _e('Icons Size:', 'vikwidgetsloader'); ?></label>
					<input class="widefat" id="<?php echo $this->get_field_id('icon_size'); ?>" name="<?php echo $this->get_field_name('icon_size'); ?>" type="number" min="0" value="<?php echo esc_attr( $icon_size ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('icon_style'); ?>"><?php _e('Icons Style:', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('icon_style'); ?>" name="<?php echo $this->get_field_name('icon_style'); ?>" class="widefat" style="width:100%;">
						<option <?php selected( $icon_style, "default" ); ?> value="default"><?php _e('Default', 'vikwidgetsloader'); ?></option>
						<option <?php selected( $icon_style, "circle" ); ?> value="circle"><?php _e('Circle', 'vikwidgetsloader'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('container_size'); ?>"><?php _e('Container Size:', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('container_size'); ?>" name="<?php echo $this->get_field_name('container_size'); ?>" class="widefat" style="width:100%;">
						<option <?php selected( $container_size, "0" ); ?> value="0"><?php _e('Normal', 'vikwidgetsloader'); ?></option>
						<option <?php selected( $container_size, "1" ); ?> value="1"><?php _e('Full Size', 'vikwidgetsloader'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'icon_padding' ); ?>"><?php _e( 'Icons Padding:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'icon_padding' ); ?>" name="<?php echo $this->get_field_name( 'icon_padding' ); ?>" type="number" min="1" max="12" value="<?php echo esc_attr( $icon_padding ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'readmoretext' ); ?>"><?php _e('Read More Text:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'readmoretext' ); ?>" name="<?php echo $this->get_field_name( 'readmoretext' ); ?>" type="text" value="<?php echo esc_attr( $readmoretext ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('readmore_target'); ?>"><?php _e('Target Read More Link:', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('readmore_target'); ?>" name="<?php echo $this->get_field_name('readmore_target'); ?>" class="widefat" style="width:100%;">
						<option <?php selected( $readmore_target, "0" ); ?> value="0"><?php _e('New Page', 'vikwidgetsloader'); ?></option>
						<option <?php selected( $readmore_target, "1" ); ?> value="1"><?php _e('Same Page', 'vikwidgetsloader'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('content_alignment'); ?>"><?php _e('Content Alignment:', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('content_alignment'); ?>" name="<?php echo $this->get_field_name('content_alignment'); ?>" class="widefat" style="width:100%;">
						<option <?php selected( $content_alignment, "0" ); ?> value="0"><?php _e('Centered', 'vikwidgetsloader'); ?></option>
						<option <?php selected( $content_alignment, "1" ); ?> value="1"><?php _e('Default', 'vikwidgetsloader'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('icon_alignment'); ?>"><?php _e('Icon Alignment:', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('icon_alignment'); ?>" name="<?php echo $this->get_field_name('icon_alignment'); ?>" class="widefat" style="width:100%;">
						<option <?php selected( $icon_alignment, "top" ); ?> value="top"><?php _e('Top', 'vikwidgetsloader'); ?></option>
						<option <?php selected( $icon_alignment, "right" ); ?> value="right"><?php _e('Right', 'vikwidgetsloader'); ?></option>
						<option <?php selected( $icon_alignment, "bottom" ); ?> value="bottom"><?php _e('Bottom', 'vikwidgetsloader'); ?></option>
						<option <?php selected( $icon_alignment, "left" ); ?> value="left"><?php _e('Left', 'vikwidgetsloader'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'textarea_above' ); ?>"><?php _e( 'Here you can insert a text that will be shown above the icons' , 'vikwidgetsloader'); ?></label> 
					<?php 
					$editor_id = $this->get_field_id('textarea_above');
					$editor_name = $this->get_field_name('textarea_above');
					$content = $textarea_above;
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
		</div>
	<?php if($icons_displayed > 0) { ?>
		<div class="vikwp-widget-col">
			<?php for ($i = 0; $i < $icons_displayed; $i++) {
				$icon_type = array_key_exists('icon_' . $i . '_type', $instance) ? $instance['icon_' . $i . '_type'] : '';
				$icon = array_key_exists('icon_' . $i . '_selected', $instance) ? $instance['icon_' . $i . '_selected'] : '';
				$title = array_key_exists('icon_' . $i . '_title', $instance) ? $instance['icon_' . $i . '_title'] : '';
				$readmore = array_key_exists('icon_' . $i . '_readmore', $instance) ? $instance['icon_' . $i . '_readmore'] : '';
				$description = array_key_exists('icon_' . $i . '_description', $instance) ? $instance['icon_' . $i . '_description'] : '';
			?>
			<div class="vikwp-widget-col-inner">
				<p>
					<label for="<?php echo $this->get_field_id('icon_' . $i . '_type'); ?>"><?php _e('Font Awesome Icon Type:', 'vikwidgetsloader'); ?></label>
					<select class="widefat" id="<?php echo $this->get_field_id('icon_' . $i . '_type');?>" name="<?php echo $this->get_field_name('icon_' . $i . '_type');?>" class="widefat" style="width:100%;">
						<option <?php selected( $icon_type, "fa" ); ?> value="fa"><?php _e('Default', 'vikwidgetsloader'); ?></option>
						<option <?php selected( $icon_type, "far" ); ?> value="far"><?php _e('Regular', 'vikwidgetsloader'); ?></option>
						<option <?php selected( $icon_type, "fas" ); ?> value="fas"><?php _e('Solid', 'vikwidgetsloader'); ?></option>
						<option <?php selected( $icon_type, "fab" ); ?> value="fab"><?php _e('Brand', 'vikwidgetsloader'); ?></option>
						<option <?php selected( $icon_type, "fal" ); ?> value="fal"><?php _e('Light', 'vikwidgetsloader'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('icon_' . $i . '_selected'); ?>"><?php _e('Icon Selected:', 'vikwidgetsloader'); ?></label>
					<select class="widefat vikwp_icons_select" id="<?php echo $this->get_field_id('icon_' . $i . '_selected');?>" name="<?php echo $this->get_field_name('icon_' . $i . '_selected');?>" style="width:100%;">
						<?php foreach ($this->getAvailableIcons() as $class => $name) { ?>
						<option <?php selected( $icon, $class ); ?> value="<?php echo $class;?>" data-font-type-id="<?php echo $this->get_field_id('icon_' . $i . '_type');?>"><?php echo $name;?></option>
						<?php } ?>
					</select>
					<div class="vikwp_icons_example_div"></div>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('icon_' . $i . '_title'); ?>"><?php _e( 'Icon Title' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id('icon_' . $i . '_title'); ?>" name="<?php echo $this->get_field_name('icon_' . $i . '_title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'icon_' . $i . '_description' ); ?>"><?php _e( 'Icon Text' , 'vikwidgetsloader'); ?></label> 
					<?php 
					$editor_id = $this->get_field_id('icon_' . $i . '_description');
					$editor_name = $this->get_field_name('icon_' . $i . '_description');
					$content = $description;
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
				<p>
					<label for="<?php echo $this->get_field_id('icon_' . $i . '_readmore'); ?>"><?php _e( 'Icon Read More Link' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id('icon_' . $i . '_readmore'); ?>" name="<?php echo $this->get_field_name('icon_' . $i . '_readmore'); ?>" type="text" value="<?php echo esc_attr( $readmore ); ?>" />
				</p>
			</div>
			<?php } ?>
		</div>
	<?php } ?>
	</div>
	<script>
		jQuery('document').ready(function() {
			jQuery('div[id*="vikwp_icons"]').addClass('vikwp_widget_more_bigger');
			jQuery('.widget-control-save').click(function() {
				jQuery('.switch-html').click();
			});
			jQuery('select.vikwp_icons_select:not([name*="__i__"])').select2({
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
			var _id = jQuery(element.element).data('font-type-id');
			var type = jQuery('#' + _id).val();
			return element.text + '<i style="text-align: right; margin-left: 5px" class="' + type + ' fa-' + element.id + '"></i>';
		}
	</script>
</div>
