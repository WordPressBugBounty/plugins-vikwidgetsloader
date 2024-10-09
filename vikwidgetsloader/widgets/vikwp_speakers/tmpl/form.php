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

if (isset($instance['number_of_speakers'])) {
	$number_of_speakers = $instance['number_of_speakers'];
} else {
	$number_of_speakers = 0;
}

if (isset($instance['number_of_rows'])) {
	$number_of_rows = $instance['number_of_rows'];
} else {
	$number_of_rows = 0;
}

?>
<div class="vikwp-widget-params">
	<div class="vikwp-widget-cnt">
		<div class="vikwp-widget-col">
			<div class="vikwp-widget-col-inner">
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo array_key_exists('title', $instance) ? esc_attr( $instance['title'] ) : ''; ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'number_of_speakers' ); ?>"><?php _e( 'Number of People:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'number_of_speakers' ); ?>" name="<?php echo $this->get_field_name( 'number_of_speakers' ); ?>" type="number" min="1" value="<?php echo esc_attr( $number_of_speakers ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'number_of_rows' ); ?>"><?php _e( 'Number of Rows:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'number_of_rows' ); ?>" name="<?php echo $this->get_field_name( 'number_of_rows' ); ?>" type="number" min="1" value="<?php echo esc_attr( $number_of_rows ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'textarea_above' ); ?>"><?php _e( 'This text will be displayed above the people details' , 'vikwidgetsloader'); ?></label> 
					<?php 
					$editor_id = $this->get_field_id('textarea_above');
					$editor_name = $this->get_field_name('textarea_above');
					$content = array_key_exists('textarea_above', $instance) ? $instance['textarea_above'] : '';
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
		<div class="vikwp-widget-col">
			<?php if($number_of_speakers > 0) {
				for ($i=1; $i <= $number_of_speakers; $i++) {
					$image = array_key_exists('spkr_' . $i . '_image', $instance) ? $instance['spkr_' . $i . '_image'] : "";
					$nominative = array_key_exists('spkr_' . $i . '_nominative', $instance) ? $instance['spkr_' . $i . '_nominative'] : "";
					$role = array_key_exists('spkr_' . $i . '_role', $instance) ? $instance['spkr_' . $i . '_role'] : "";
					$description = array_key_exists('spkr_' . $i . '_description', $instance) ? $instance['spkr_' . $i . '_description'] : "";
					$readmore = array_key_exists('spkr_' . $i . '_readmore', $instance) ? $instance['spkr_' . $i . '_readmore'] : "";
					$facebook = array_key_exists('spkr_' . $i . '_facebook', $instance) ? $instance['spkr_' . $i . '_facebook'] : "";
					$twitter = array_key_exists('spkr_' . $i . '_twitter', $instance) ? $instance['spkr_' . $i . '_twitter'] : "";
					$google = array_key_exists('spkr_' . $i . '_google', $instance) ? $instance['spkr_' . $i . '_google'] : "";
					$linkedin = array_key_exists('spkr_' . $i . '_linkedin', $instance) ? $instance['spkr_' . $i . '_linkedin'] : "";?>
			
				<div class="vikwp-widget-col-inner">
					<div class="vikwp-widget-box vikwp-widget-spacing">
						<span><?php echo sprintf(__('Person %s', 'vikwidgetsloader'), $i);?></span>
						<div class="vikwp-image-params">
							<p>
								<label for="<?php echo $this->get_field_id('spkr_' . $i . '_image'); ?>"><?php _e( 'Person Image' , 'vikwidgetsloader'); ?></label>
								<input class="widefat" id="<?php echo $this->get_field_id('spkr_' . $i . '_image'); ?>" name="<?php echo $this->get_field_name( 'spkr_' . $i . '_image'); ?>" type="text" value="<?php echo esc_attr($image); ?>" />
								<button class="upload_image_button button button-primary"><?php _e('Upload Image', 'vikwidgetsloader');?></button>
							</p>
							<div class="vikwp-preview-img"></div>
						</div>
						<p>
							<label for="<?php echo $this->get_field_id('spkr_' . $i . '_nominative'); ?>"><?php _e( 'Person Name and Surname' , 'vikwidgetsloader'); ?></label> 
							<input class="widefat" id="<?php echo $this->get_field_id('spkr_' . $i . '_nominative'); ?>" name="<?php echo $this->get_field_name('spkr_' . $i . '_nominative'); ?>" type="text" value="<?php echo esc_attr( $nominative ); ?>" />
						</p>
						<p>
							<label for="<?php echo $this->get_field_id('spkr_' . $i . '_role'); ?>"><?php _e( 'Person Role' , 'vikwidgetsloader'); ?></label> 
							<input class="widefat" id="<?php echo $this->get_field_id('spkr_' . $i . '_role'); ?>" name="<?php echo $this->get_field_name('spkr_' . $i . '_role'); ?>" type="text" value="<?php echo esc_attr( $role ); ?>" />
						</p>
						<p>
							<label for="<?php echo $this->get_field_id('spkr_' . $i . '_description'); ?>"><?php _e( 'Person Description' , 'vikwidgetsloader'); ?></label> 
							<input class="widefat" id="<?php echo $this->get_field_id('spkr_' . $i . '_description'); ?>" name="<?php echo $this->get_field_name('spkr_' . $i . '_description'); ?>" type="text" value="<?php echo esc_attr( $description ); ?>" />
						</p>
						<p>
							<label for="<?php echo $this->get_field_id('spkr_' . $i . '_readmore'); ?>"><?php _e( 'Read More Link' , 'vikwidgetsloader'); ?></label> 
							<input class="widefat" id="<?php echo $this->get_field_id('spkr_' . $i . '_readmore'); ?>" name="<?php echo $this->get_field_name('spkr_' . $i . '_readmore'); ?>" type="text" value="<?php echo esc_attr( $readmore ); ?>" />
						</p>
					</div>
					<div class="vikwp-widget-box vikwp-widget-spacing">
						<p>
							<label for="<?php echo $this->get_field_id('spkr_' . $i . '_facebook'); ?>"><?php _e( 'Facebook Link' , 'vikwidgetsloader'); ?></label> 
							<input class="widefat" id="<?php echo $this->get_field_id('spkr_' . $i . '_facebook'); ?>" name="<?php echo $this->get_field_name('spkr_' . $i . '_facebook'); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
						</p>
						<p>
							<label for="<?php echo $this->get_field_id('spkr_' . $i . '_twitter'); ?>"><?php _e( 'Twitter Link' , 'vikwidgetsloader'); ?></label> 
							<input class="widefat" id="<?php echo $this->get_field_id('spkr_' . $i . '_twitter'); ?>" name="<?php echo $this->get_field_name('spkr_' . $i . '_twitter'); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
						</p>
						<p>
							<label for="<?php echo $this->get_field_id('spkr_' . $i . '_google'); ?>"><?php _e( 'Google Link' , 'vikwidgetsloader'); ?></label> 
							<input class="widefat" id="<?php echo $this->get_field_id('spkr_' . $i . '_google'); ?>" name="<?php echo $this->get_field_name('spkr_' . $i . '_google'); ?>" type="text" value="<?php echo esc_attr( $google ); ?>" />
						</p>
						<p>
							<label for="<?php echo $this->get_field_id('spkr_' . $i . '_linkedin'); ?>"><?php _e( 'LinkedIn Link' , 'vikwidgetsloader'); ?></label> 
							<input class="widefat" id="<?php echo $this->get_field_id('spkr_' . $i . '_linkedin'); ?>" name="<?php echo $this->get_field_name('spkr_' . $i . '_linkedin'); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
						</p>
					</div>
				</div>
				<?php }
			} ?>
		</div>
	</div>
	<script>
		jQuery('div[id*="vikwp_speakers"]').addClass('vikwp_widget_more_bigger');
	</script>
</div>