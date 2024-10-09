<?php
/**
 * @package     VikWidgetsLoader
 * @subpackage  widget
 * @author      E4J s.r.l.
 * @copyright   Copyright (C) 2018 E4J s.r.l. All Rights Reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://vikwp.com
 */

if (isset($instance['title'])) {
	$title = $instance['title'];
} else {
	$title = __( 'New title', 'vikwidgetsloader' );
}

if (isset($instance['shadowpoint_left'])) {
	$shadowpoint_left = $instance['shadowpoint_left'];
} else {
	$shadowpoint_left = 16;
}

if (isset($instance['shadowpoint_right'])) {
	$shadowpoint_right = $instance['shadowpoint_right'];
} else {
	$shadowpoint_right = 34;
}

if (isset($instance['markers_amount'])) {
	$markers_amount = $instance['markers_amount'];
} else {
	$markers_amount = 1;
}

if (isset($instance['contact_enabled'])) {
	$contact_enabled = $instance['contact_enabled'];
} else {
	$contact_enabled = 0;
}

if (isset($instance['map_zoom'])) {
	$map_zoom = $instance['map_zoom'];
} else {
	$map_zoom = 15;
}

$mapStyles = array(
	'Default' => 0,
	'Grayscale' => 1,
	'Midnight' => 2,
	'Blue Essence' => 3,
	'Nature' => 4
);

$contactPosition = array(
	"Above" => "vikcnt_above",
	"Hover" => "vikcnt_hover",
	"Left" => "vikcnt_left",
	"Right" => "vikcnt_right"
);

$locationValues = array(
	"viktitle" => array(
		"type" => "text",
		"default" => "",
		"label" => __("Title","vikwidgetsloader"),
		"description" => __("The title of your location","vikwidgetsloader")
	),
	"viklat" => array(
		"type" => "text",
		"default" => "",
		"label" => __("Latitude","vikwidgetsloader"),
		"description" => __("Latitude for this marker","vikwidgetsloader")
	),
	"viklng" => array(
		"type" => "text",
		"default" => "",
		"label" => __("Longitude","vikwidgetsloader"),
		"description" => __("Longitude for this marker","vikwidgetsloader")
	),
	"viktext" => array(
		"type" => "text",
		"default" => "",
		"label" => __("Description","vikwidgetsloader"),
		"description" => __("Description for this marker","vikwidgetsloader")
	),
	"vikshape" => array(
		"type" => "filelist",
		"default" => "", //TODO /modules/mod_vikgooglemaps/src/markers/shapes
		"label" => __("Marker Image","vikwidgetsloader"),
		"description" => __("The image to be used as Marker","vikwidgetsloader")
	),
	"vikshadow" => array(
		"type" => "filelist",
		"default" => "", //TODO /modules/mod_vikgooglemaps/src/markers/shadows
		"label" => __("Marker Shadow Image","vikwidgetsloader"),
		"description" => __("The image to be used as Shadow for the Marker","vikwidgetsloader")
	)
);

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
					<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Width (in px or %):' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" type="text" value="<?php echo array_key_exists('width', $instance) ? esc_attr( $instance['width'] ) : ''; ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Height (in px or %):' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo array_key_exists('height', $instance) ? esc_attr( $instance['height'] ) : ''; ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'map_style' ); ?>"><?php _e( 'Map Style:' , 'vikwidgetsloader'); ?></label> 
					<select id="<?php echo $this->get_field_id('map_style'); ?>" name="<?php echo $this->get_field_name('map_style'); ?>" class="widefat" style="width:100%;">
						<?php foreach($mapStyles as $mapName => $mapValue) { ?>
							<option <?php if(array_key_exists('map_style', $instance)) {selected($instance['map_style'], $mapValue);} ?> value="<?php echo $mapValue; ?>"><?php echo $mapName; ?></option>
						<?php } ?>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'map_zoom' ); ?>"><?php _e( 'Map Zoom Level:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'map_zoom' ); ?>" name="<?php echo $this->get_field_name( 'map_zoom' ); ?>" type="number" min="1" max="20" value="<?php echo esc_attr( $map_zoom ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'center_lat' ); ?>"><?php _e( 'Center Latitude:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'center_lat' ); ?>" name="<?php echo $this->get_field_name( 'center_lat' ); ?>" type="text" value="<?php echo array_key_exists('center_lat', $instance) ? esc_attr( $instance['center_lat'] ) : ''; ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'center_lng' ); ?>"><?php _e( 'Center Longitude:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'center_lng' ); ?>" name="<?php echo $this->get_field_name( 'center_lng' ); ?>" type="text" value="<?php echo array_key_exists('center_lng', $instance) ? esc_attr( $instance['center_lng'] ) : ''; ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'apikey' ); ?>"><?php _e( 'Google Maps API Key' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'apikey' ); ?>" name="<?php echo $this->get_field_name( 'apikey' ); ?>" type="text" value="<?php echo array_key_exists('apikey', $instance) ? esc_attr( $instance['apikey'] ) : ''; ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'shadowpoint_left' ); ?>"><?php _e( 'Shadows Left Point' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'shadowpoint_left' ); ?>" name="<?php echo $this->get_field_name( 'shadowpoint_left' ); ?>" type="number" min="0" step="1" value="<?php echo esc_attr($shadowpoint_left); ?>"/>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'shadowpoint_right' ); ?>"><?php _e( 'Shadows Right Point' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'shadowpoint_right' ); ?>" name="<?php echo $this->get_field_name( 'shadowpoint_right' ); ?>" type="number" min="0" step="1" value="<?php echo esc_attr($shadowpoint_right); ?>"/>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'markers_amount' ); ?>"><?php _e( 'Amount of markers on the map:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'markers_amount' ); ?>" name="<?php echo $this->get_field_name( 'markers_amount' ); ?>" type="number" min="0" value="<?php echo esc_attr( $markers_amount ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('contact_enabled'); ?>"><?php _e('Contact Enabled:', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('contact_enabled'); ?>" name="<?php echo $this->get_field_name('contact_enabled'); ?>" class="widefat" style="width:100%;">
						<option <?php selected( $contact_enabled, "0" ); ?> value="0"><?php _e('No'); ?></option>
						<option <?php selected( $contact_enabled, "1" ); ?> value="1"><?php _e('Yes'); ?></option>
					</select>
				</p>
			</div>
		</div>
		<?php if($contact_enabled) { ?>
		<div class="vikwp-widget-col">
			<div class="vikwp-widget-col-inner">
				<p>
					<label for="<?php echo $this->get_field_id( 'contact_header' ); ?>"><?php _e( 'Contact Header:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'contact_header' ); ?>" name="<?php echo $this->get_field_name( 'contact_header' ); ?>" type="text" value="<?php echo array_key_exists('contact_header', $instance) ? esc_attr( $instance['contact_header'] ) : ''; ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('contact_position'); ?>"><?php _e('Contact Position:', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('contact_position'); ?>" name="<?php echo $this->get_field_name('contact_position'); ?>" class="widefat" style="width:100%;">
						<?php foreach($contactPosition as $positionName => $positionValue) { ?>
							<option <?php if(array_key_exists('contact_position', $instance)) {selected( $instance['contact_position'], $positionValue );} ?> value="<?php echo $positionValue; ?>"><?php echo $positionName; ?></option>
						<?php } ?>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'contact_textarea_above' ); ?>"><?php _e( 'Here you can insert a text that will be shown above the contact details' , 'vikwidgetsloader'); ?></label> 
					<?php 
					$editor_id = $this->get_field_id('contact_textarea_above');
					$editor_name = $this->get_field_name('contact_textarea_above');
					$content = array_key_exists('contact_textarea_above', $instance) ? $instance['contact_textarea_above'] : '';
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
					<label for="<?php echo $this->get_field_id( 'contact_address' ); ?>"><?php _e( 'Insert your address' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'contact_address' ); ?>" name="<?php echo $this->get_field_name( 'contact_address' ); ?>" type="text" value="<?php echo array_key_exists('contact_address', $instance) ? esc_attr( $instance['contact_address'] ) : ''; ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'contact_email' ); ?>"><?php _e( 'Insert your email' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'contact_email' ); ?>" name="<?php echo $this->get_field_name( 'contact_email' ); ?>" type="text" value="<?php echo array_key_exists('contact_address', $instance) ?  esc_attr( $instance['contact_email'] ) : ''; ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'contact_tel' ); ?>"><?php _e( 'Insert your telephone' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'contact_tel' ); ?>" name="<?php echo $this->get_field_name( 'contact_tel' ); ?>" type="text" value="<?php echo array_key_exists('contact_address', $instance) ?  esc_attr( $instance['contact_tel'] ) : ''; ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'contact_textarea_under' ); ?>"><?php _e( 'Here you can insert a text that will be shown under the contact details' , 'vikwidgetsloader'); ?></label> 
					<?php 
					$editor_id = $this->get_field_id('contact_textarea_under');
					$editor_name = $this->get_field_name('contact_textarea_under');
					$content = array_key_exists('contact_textarea_under', $instance) ? $instance['contact_textarea_under'] : '';
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
			</div>
		</div>
		<?php } ?>
		<?php if($markers_amount > 0) { ?>
		<div class="vikwp-widget-col">
			<div class="vikwp-widget-col-inner">
			<?php for ($i=1; $i <= $markers_amount; $i++) { ?>
				<div class="vikwp-widget-box vikwp-widget-spacing">
					<span><?php echo sprintf(__('Location %s', 'vikwidgetsloader'), $i);?></span>
					<?php foreach ($locationValues as $fieldName => $fieldAttributes) {
						if (!empty($instance[$fieldName . '_' . $i])) {
							$defaultValue = $instance[$fieldName . '_' . $i];
						} else {
							$defaultValue = $fieldAttributes['default'];
						}?>
						<?php if ($fieldAttributes['type'] == "text") { ?>
						<p>
							<label for="<?php echo $this->get_field_id( $fieldName . '_' . $i ); ?>"><?php echo $fieldAttributes['label'];?></label> 
							<input class="widefat" id="<?php echo $this->get_field_id( $fieldName . '_' . $i ); ?>" name="<?php echo $this->get_field_name( $fieldName . '_' . $i ); ?>" type="text" value="<?php echo esc_attr( $defaultValue ); ?>" />
						</p>
						<?php }
						else if ($fieldAttributes['type'] == "filelist") {?>
						<div class="vikwp-image-params">
							<p>
								<label for="<?php echo $this->get_field_id( $fieldName . '_' . $i ); ?>"><?php echo $fieldAttributes['label'];?></label>
								<input class="widefat" id="<?php echo $this->get_field_id( $fieldName . '_' . $i ); ?>" name="<?php echo $this->get_field_name( $fieldName . '_' . $i ); ?>" type="text" value="<?php echo esc_attr( $defaultValue ); ?>" />
								<button class="upload_image_button button button-primary"><?php _e('Upload Image', 'vikwidgetsloader');?></button>
							</p>
							<div class="vikwp-preview-img"></div>
						</div>
						<?php } ?>
					<?php } ?>
				</div>
			<?php } ?>
			</div>
		</div>
		<?php } ?>
		<script>
			jQuery('div[id*="vikwp_googlemaps"]').addClass('vikwp_widget_more_bigger');
			jQuery(document).ready(function($) {
				jQuery('.my-color-picker').wpColorPicker();
				jQuery('.widget-control-save').click(function() {
					jQuery('.switch-html').click();
				});
			});
		</script>
	</div>	
</div>