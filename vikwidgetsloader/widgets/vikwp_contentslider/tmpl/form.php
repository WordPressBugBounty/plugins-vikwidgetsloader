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

if (isset($instance['number_of_slides'])) {
	$number_of_slides = $instance['number_of_slides'];
} else {
	$number_of_slides = 0;
}

if (isset($instance['height'])) {
	$height = $instance['height'];
} else {
	$height = "400px";
}

if (isset($instance['interval'])) {
	$interval = $instance['interval'];
} else {
	$interval = 2000;
}

if (isset( $instance['title_effect'] )) {
	$title_effect = $instance['title_effect'];
} else {
	$title_effect = __( 'zoomInRight', 'vikwidgetsloader' );
}

if (isset( $instance['desc_effect'] )) {
	$desc_effect = $instance['desc_effect'];
} else {
	$desc_effect = __( 'fadeInLeft', 'vikwidgetsloader' );
}

if (isset( $instance['readmore_effect'] )) {
	$readmore_effect = $instance['readmore_effect'];
} else {
	$readmore_effect = __( 'fadeInLeft', 'vikwidgetsloader' );
}

$fontStyles = array(
	'Theme Default'	=> 0,
	'Lato' => 1,
	'Roboto' => 2,
	'Oswald' => 3,
	'Convergence' => 4
);

$contactPosition = array(
	"Center" => "center",
	"Left" => "left",
	"Right" => "right"
);

?>
<div class="vikwp-widget-params">
	<div class="vikwp-widget-cnt">
		<div class="vikwp-widget-col">
			<div class="vikwp-widget-col-inner">
				<p>
					<label for="<?php echo $this->get_field_id( 'number_of_slides' ); ?>"><?php _e('Number of Slides:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'number_of_slides' ); ?>" name="<?php echo $this->get_field_name( 'number_of_slides' ); ?>" type="number" min="1" value="<?php echo esc_attr( $number_of_slides ); ?>" />
				</p>
				<?php if($number_of_slides > 0) { ?>
					<?php for ($i=1; $i <= $number_of_slides; $i++) {
						$image = array_key_exists('slideimage_' . $i, $instance) ? $instance['slideimage_' . $i] : "";
						$title = array_key_exists('slidetitle_' . $i, $instance) ? $instance['slidetitle_' . $i] : "";
						$caption = array_key_exists('slidecaption_' . $i, $instance) ? $instance['slidecaption_' . $i] : "";
						$readmorelink = array_key_exists('slidereadmore_' . $i, $instance) ? $instance['slidereadmore_' . $i] : "";
						$slidepublished = array_key_exists('slidepublished_' . $i, $instance) ? $instance['slidepublished_' . $i] : "1";?>
				<div class="vikwp-widget-box vikwp-widget-spacing">
					<span><?php echo sprintf(__('Slider Image %s', 'vikwidgetsloader'), $i);?></span>
					<div class="vikwp-image-params">
						<p>
							<label for="<?php echo $this->get_field_id('slideimage_' . $i ); ?>"><?php _e('Slide Image' , 'vikwidgetsloader'); ?></label>
							<input class="widefat" id="<?php echo $this->get_field_id('slideimage_' . $i ); ?>" name="<?php echo $this->get_field_name( 'slideimage_' . $i ); ?>" type="text" value="<?php echo esc_attr($image); ?>" />
							<button class="upload_image_button button button-primary"><?php _e('Upload Image', 'vikwidgetsloader');?></button>
						</p>
						<div class="vikwp-preview-img"></div>
					</div>
					<p>
						<label for="<?php echo $this->get_field_id( 'slidetitle_' . $i ); ?>"><?php _e('Slide Title' , 'vikwidgetsloader'); ?></label> 
						<input class="widefat" id="<?php echo $this->get_field_id( 'slidetitle_' . $i ); ?>" name="<?php echo $this->get_field_name( 'slidetitle_' . $i ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
					</p>
					<p>
						<label for="<?php echo $this->get_field_id( 'slidecaption_' . $i ); ?>"><?php _e('Slide Caption' , 'vikwidgetsloader'); ?></label> 
						<input class="widefat" id="<?php echo $this->get_field_id( 'slidecaption_' . $i ); ?>" name="<?php echo $this->get_field_name( 'slidecaption_' . $i ); ?>" type="text" value="<?php echo esc_attr( $caption ); ?>" />
					</p>
					<p>
						<label for="<?php echo $this->get_field_id( 'slidereadmore_' . $i ); ?>"><?php _e('Slide Read More Link' , 'vikwidgetsloader'); ?></label> 
						<input class="widefat" id="<?php echo $this->get_field_id( 'slidereadmore_' . $i ); ?>" name="<?php echo $this->get_field_name( 'slidereadmore_' . $i ); ?>" type="text" value="<?php echo esc_attr( $readmorelink ); ?>" />
					</p>
					<p>
						<label for="<?php echo $this->get_field_id('slidepublished_' . $i); ?>"><?php _e('Slide Published:', 'vikwidgetsloader'); ?></label>
						<select id="<?php echo $this->get_field_id('slidepublished_' . $i); ?>" name="<?php echo $this->get_field_name('slidepublished_' . $i); ?>" class="widefat" style="width:100%;">
							<option <?php selected( $slidepublished, "0" ); ?> value="0"><?php _e('No'); ?></option>
							<option <?php selected( $slidepublished, "1" ); ?> value="1"><?php _e('Yes'); ?></option>
						</select>
					</p>
				</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
		<div class="vikwp-widget-col">
			<div class="vikwp-widget-col-inner">
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo array_key_exists('title', $instance) ? esc_attr( $instance['title'] ) : ''; ?>" />
				</p>
				<h3><?php _e('CONFIGURATION:' , 'vikwidgetsloader'); ?></h3>
				<p>
					<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e('Forced Height (in px or %):' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo esc_attr( $height ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'font' ); ?>"><?php _e('Text Font:' , 'vikwidgetsloader'); ?></label> 
					<select id="<?php echo $this->get_field_id('font'); ?>" name="<?php echo $this->get_field_name('font'); ?>" class="widefat" style="width:100%;">
						<?php foreach($fontStyles as $fontName => $fontValue) { ?>
							<option <?php if(array_key_exists('font', $instance)) {selected( $instance['font'], $fontValue );} ?> value="<?php echo $fontValue; ?>"><?php echo $fontName; ?></option>
						<?php } ?>
					</select>
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('title_effect'); ?>"><?php _e('Title Effect:', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('title_effect'); ?>" name="<?php echo $this->get_field_name('title_effect'); ?>" class="widefat" style="width:100%;">
						<group label="Bouncing Entrances">
							<option <?php selected( $title_effect, 'bounceIn' ); ?> value="bounceIn"><?php _e('bounceIn' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'bounceInDown' ); ?> value="bounceInDown"><?php _e('bounceInDown' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'bounceInLeft' ); ?> value="bounceInLeft"><?php _e('bounceInLeft' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'bounceInRight' ); ?> value="bounceInRight"><?php _e('bounceInRight' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'bounceInUp' ); ?> value="bounceInUp"><?php _e('bounceInUp' , 'vikwidgetsloader'); ?></option>
						</group>

						<group label="Bouncing Exits">
							<option <?php selected( $title_effect, 'bounceOut' ); ?> value="bounceOut"><?php _e('bounceOut' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'bounceOutDown' ); ?> value="bounceOutDown"><?php _e('bounceOutDown' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'bounceOutLeft' ); ?> value="bounceOutLeft"><?php _e('bounceOutLeft' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'bounceOutRight' ); ?> value="bounceOutRight"><?php _e('bounceOutRight' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'bounceOutUp' ); ?> value="bounceOutUp"><?php _e('bounceOutUp' , 'vikwidgetsloader'); ?></option>
						</group>

						<group label="Fading Entrances">
							<option <?php selected( $title_effect, 'fadeIn' ); ?> value="fadeIn"><?php _e('fadeIn' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'fadeInDown' ); ?> value="fadeInDown"><?php _e('fadeInDown' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'fadeInDownBig' ); ?> value="fadeInDownBig"><?php _e('fadeInDownBig' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'fadeInLeft' ); ?> value="fadeInLeft"><?php _e('fadeInLeft' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'fadeInLeftBig' ); ?> value="fadeInLeftBig"><?php _e('fadeInLeftBig' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'fadeInRight' ); ?> value="fadeInRight"><?php _e('fadeInRight' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'fadeInRightBig' ); ?> value="fadeInRightBig"><?php _e('fadeInRightBig' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'fadeInUp' ); ?> value="fadeInUp"><?php _e('fadeInUp' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'fadeInUpBig' ); ?> value="fadeInUpBig"><?php _e('fadeInUpBig' , 'vikwidgetsloader'); ?></option>
						</group>

						<group label="Fading Exits">
							<option <?php selected( $title_effect, 'fadeOut' ); ?> value="fadeOut"><?php _e('fadeOut' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'fadeOutDown' ); ?> value="fadeOutDown"><?php _e('fadeOutDown' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'fadeOutDownBig' ); ?> value="fadeOutDownBig"><?php _e('fadeOutDownBig' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'fadeOutLeft' ); ?> value="fadeOutLeft"><?php _e('fadeOutLeft' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'fadeOutLeftBig' ); ?> value="fadeOutLeftBig"><?php _e('fadeOutLeftBig' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'fadeOutRight' ); ?> value="fadeOutRight"><?php _e('fadeOutRight' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'fadeOutRightBig' ); ?>  value="fadeOutRightBig"><?php _e('fadeOutRightBig' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'fadeOutUp' ); ?> value="fadeOutUp"><?php _e('fadeOutUp' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'fadeOutUpBig' ); ?> value="fadeOutUpBig"><?php _e('fadeOutUpBig' , 'vikwidgetsloader'); ?></option>
						</group>                

						<group label="Sliding Entrances">
							<option <?php selected( $title_effect, 'slideInUp' ); ?> value="slideInUp"><?php _e('slideInUp' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'slideInDown' ); ?> value="slideInDown"><?php _e('slideInDown' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'slideInLeft' ); ?> value="slideInLeft"><?php _e('slideInLeft' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'slideInRight' ); ?> value="slideInRight"><?php _e('slideInRight' , 'vikwidgetsloader'); ?></option>
						</group>

						<group label="Sliding Exits">
							<option <?php selected( $title_effect, 'slideOutUp' ); ?> value="slideOutUp"><?php _e('slideOutUp' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'slideOutDown' ); ?> value="slideOutDown"><?php _e('slideOutDown' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'slideOutLeft' ); ?> value="slideOutLeft"><?php _e('slideOutLeft' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $title_effect, 'slideOutRight' ); ?> value="slideOutRight"><?php _e('slideOutRight' , 'vikwidgetsloader'); ?></option>
						</group>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('desc_effect'); ?>"><?php _e('Description Effect:', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('desc_effect'); ?>" name="<?php echo $this->get_field_name('desc_effect'); ?>" class="widefat" style="width:100%;">
						<group label="Bouncing Entrances">
							<option <?php selected( $desc_effect, 'bounceIn' ); ?> value="bounceIn"><?php _e('bounceIn' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'bounceInDown' ); ?> value="bounceInDown"><?php _e('bounceInDown' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'bounceInLeft' ); ?> value="bounceInLeft"><?php _e('bounceInLeft' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'bounceInRight' ); ?> value="bounceInRight"><?php _e('bounceInRight' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'bounceInUp' ); ?> value="bounceInUp"><?php _e('bounceInUp' , 'vikwidgetsloader'); ?></option>
						</group>

						<group label="Bouncing Exits">
							<option <?php selected( $desc_effect, 'bounceOut' ); ?> value="bounceOut"><?php _e('bounceOut' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'bounceOutDown' ); ?> value="bounceOutDown"><?php _e('bounceOutDown' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'bounceOutLeft' ); ?> value="bounceOutLeft"><?php _e('bounceOutLeft' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'bounceOutRight' ); ?> value="bounceOutRight"><?php _e('bounceOutRight' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'bounceOutUp' ); ?> value="bounceOutUp"><?php _e('bounceOutUp' , 'vikwidgetsloader'); ?></option>
						</group>

						<group label="Fading Entrances">
							<option <?php selected( $desc_effect, 'fadeIn' ); ?> value="fadeIn"><?php _e('fadeIn' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'fadeInDown' ); ?> value="fadeInDown"><?php _e('fadeInDown' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'fadeInDownBig' ); ?> value="fadeInDownBig"><?php _e('fadeInDownBig' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'fadeInLeft' ); ?> value="fadeInLeft"><?php _e('fadeInLeft' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'fadeInLeftBig' ); ?> value="fadeInLeftBig"><?php _e('fadeInLeftBig' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'fadeInRight' ); ?> value="fadeInRight"><?php _e('fadeInRight' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'fadeInRightBig' ); ?> value="fadeInRightBig"><?php _e('fadeInRightBig' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'fadeInUp' ); ?> value="fadeInUp"><?php _e('fadeInUp' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'fadeInUpBig' ); ?> value="fadeInUpBig"><?php _e('fadeInUpBig' , 'vikwidgetsloader'); ?></option>
						</group>

						<group label="Fading Exits">
							<option <?php selected( $desc_effect, 'fadeOut' ); ?> value="fadeOut"><?php _e('fadeOut' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'fadeOutDown' ); ?> value="fadeOutDown"><?php _e('fadeOutDown' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'fadeOutDownBig' ); ?> value="fadeOutDownBig"><?php _e('fadeOutDownBig' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'fadeOutLeft' ); ?> value="fadeOutLeft"><?php _e('fadeOutLeft' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'fadeOutLeftBig' ); ?> value="fadeOutLeftBig"><?php _e('fadeOutLeftBig' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'fadeOutRight' ); ?> value="fadeOutRight"><?php _e('fadeOutRight' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'fadeOutRightBig' ); ?>  value="fadeOutRightBig"><?php _e('fadeOutRightBig' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'fadeOutUp' ); ?> value="fadeOutUp"><?php _e('fadeOutUp' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'fadeOutUpBig' ); ?> value="fadeOutUpBig"><?php _e('fadeOutUpBig' , 'vikwidgetsloader'); ?></option>
						</group>                

						<group label="Sliding Entrances">
							<option <?php selected( $desc_effect, 'slideInUp' ); ?> value="slideInUp"><?php _e('slideInUp' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'slideInDown' ); ?> value="slideInDown"><?php _e('slideInDown' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'slideInLeft' ); ?> value="slideInLeft"><?php _e('slideInLeft' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'slideInRight' ); ?> value="slideInRight"><?php _e('slideInRight' , 'vikwidgetsloader'); ?></option>
						</group>

						<group label="Sliding Exits">
							<option <?php selected( $desc_effect, 'slideOutUp' ); ?> value="slideOutUp"><?php _e('slideOutUp' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'slideOutDown' ); ?> value="slideOutDown"><?php _e('slideOutDown' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'slideOutLeft' ); ?> value="slideOutLeft"><?php _e('slideOutLeft' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $desc_effect, 'slideOutRight' ); ?> value="slideOutRight"><?php _e('slideOutRight' , 'vikwidgetsloader'); ?></option>
						</group>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('readmore_effect'); ?>"><?php _e('Read More Effect:' , 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('readmore_effect'); ?>" name="<?php echo $this->get_field_name('readmore_effect'); ?>" class="widefat" style="width:100%;">
						<group label="Bouncing Entrances">
							<option <?php selected( $readmore_effect, 'bounceIn' ); ?> value="bounceIn"><?php _e('bounceIn' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'bounceInDown' ); ?> value="bounceInDown"><?php _e('bounceInDown' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'bounceInLeft' ); ?> value="bounceInLeft"><?php _e('bounceInLeft' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'bounceInRight' ); ?> value="bounceInRight"><?php _e('bounceInRight' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'bounceInUp' ); ?> value="bounceInUp"><?php _e('bounceInUp' , 'vikwidgetsloader'); ?></option>
						</group>

						<group label="Bouncing Exits">
							<option <?php selected( $readmore_effect, 'bounceOut' ); ?> value="bounceOut"><?php _e('bounceOut' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'bounceOutDown' ); ?> value="bounceOutDown"><?php _e('bounceOutDown' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'bounceOutLeft' ); ?> value="bounceOutLeft"><?php _e('bounceOutLeft' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'bounceOutRight' ); ?> value="bounceOutRight"><?php _e('bounceOutRight' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'bounceOutUp' ); ?> value="bounceOutUp"><?php _e('bounceOutUp' , 'vikwidgetsloader'); ?></option>
						</group>

						<group label="Fading Entrances">
							<option <?php selected( $readmore_effect, 'fadeIn' ); ?> value="fadeIn"><?php _e('fadeIn' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'fadeInDown' ); ?> value="fadeInDown"><?php _e('fadeInDown' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'fadeInDownBig' ); ?> value="fadeInDownBig"><?php _e('fadeInDownBig' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'fadeInLeft' ); ?> value="fadeInLeft"><?php _e('fadeInLeft' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'fadeInLeftBig' ); ?> value="fadeInLeftBig"><?php _e('fadeInLeftBig' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'fadeInRight' ); ?> value="fadeInRight"><?php _e('fadeInRight' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'fadeInRightBig' ); ?> value="fadeInRightBig"><?php _e('fadeInRightBig' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'fadeInUp' ); ?> value="fadeInUp"><?php _e('fadeInUp' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'fadeInUpBig' ); ?> value="fadeInUpBig"><?php _e('fadeInUpBig' , 'vikwidgetsloader'); ?></option>
						</group>

						<group label="Fading Exits">
							<option <?php selected( $readmore_effect, 'fadeOut' ); ?> value="fadeOut"><?php _e('fadeOut' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'fadeOutDown' ); ?> value="fadeOutDown"><?php _e('fadeOutDown' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'fadeOutDownBig' ); ?> value="fadeOutDownBig"><?php _e('fadeOutDownBig' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'fadeOutLeft' ); ?> value="fadeOutLeft"><?php _e('fadeOutLeft' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'fadeOutLeftBig' ); ?> value="fadeOutLeftBig"><?php _e('fadeOutLeftBig' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'fadeOutRight' ); ?> value="fadeOutRight"><?php _e('fadeOutRight' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'fadeOutRightBig' ); ?>  value="fadeOutRightBig"><?php _e('fadeOutRightBig' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'fadeOutUp' ); ?> value="fadeOutUp"><?php _e('fadeOutUp' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'fadeOutUpBig' ); ?> value="fadeOutUpBig"><?php _e('fadeOutUpBig' , 'vikwidgetsloader'); ?></option>
						</group>                

						<group label="Sliding Entrances">
							<option <?php selected( $readmore_effect, 'slideInUp' ); ?> value="slideInUp"><?php _e('slideInUp' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'slideInDown' ); ?> value="slideInDown"><?php _e('slideInDown' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'slideInLeft' ); ?> value="slideInLeft"><?php _e('slideInLeft' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'slideInRight' ); ?> value="slideInRight"><?php _e('slideInRight' , 'vikwidgetsloader'); ?></option>
						</group>

						<group label="Sliding Exits">
							<option <?php selected( $readmore_effect, 'slideOutUp' ); ?> value="slideOutUp"><?php _e('slideOutUp' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'slideOutDown' ); ?> value="slideOutDown"><?php _e('slideOutDown' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'slideOutLeft' ); ?> value="slideOutLeft"><?php _e('slideOutLeft' , 'vikwidgetsloader'); ?></option>
							<option <?php selected( $readmore_effect, 'slideOutRight' ); ?> value="slideOutRight"><?php _e('slideOutRight' , 'vikwidgetsloader'); ?></option>
						</group>
					</select>
				</p>

				<p>
					<label for="<?php echo $this->get_field_id( 'readmoretext' ); ?>"><?php _e('Read More Text:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'readmoretext' ); ?>" name="<?php echo $this->get_field_name( 'readmoretext' ); ?>" type="text" value="<?php echo array_key_exists('readmoretext', $instance) ? esc_attr( $instance['readmoretext'] ) : ''; ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'textalign' ); ?>"><?php _e('Text Align:' , 'vikwidgetsloader'); ?></label> 
					<select id="<?php echo $this->get_field_id('textalign'); ?>" name="<?php echo $this->get_field_name('textalign'); ?>" class="widefat" style="width:100%;">
						<?php foreach($contactPosition as $positionName => $positionValue) { ?>
							<option <?php if(array_key_exists('textalign', $instance)) {selected( $instance['textalign'], $positionValue );} ?> value="<?php echo $positionValue; ?>"><?php echo $positionName;?></option>
						<?php } ?>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('autoplay'); ?>"><?php _e('Autoplay:', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('autoplay'); ?>" name="<?php echo $this->get_field_name('autoplay'); ?>" class="widefat" style="width:100%;">
						<option <?php if(array_key_exists('autoplay', $instance)) {selected( $instance['autoplay'], "0" );} ?> value="0"><?php _e('No'); ?></option>
						<option <?php if(array_key_exists('autoplay', $instance)) {selected( $instance['autoplay'], "1" );} ?> value="1"><?php _e('Yes'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('navigation'); ?>"><?php _e('Left-Right Navigation Enabled:', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('navigation'); ?>" name="<?php echo $this->get_field_name('navigation'); ?>" class="widefat" style="width:100%;">
						<option <?php if(array_key_exists('navigation', $instance)) {selected( $instance['navigation'], "0" );} ?> value="0"><?php _e('No'); ?></option>
						<option <?php if(array_key_exists('navigation', $instance)) {selected( $instance['navigation'], "1" );} ?> value="1"><?php _e('Yes'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('dotsnav'); ?>"><?php _e('Navigation Dots Enabled:', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('dotsnav'); ?>" name="<?php echo $this->get_field_name('dotsnav'); ?>" class="widefat" style="width:100%;">
						<option <?php if(array_key_exists('dotsnav', $instance)) {selected( $instance['dotsnav'], "0" );} ?> value="0"><?php _e('No'); ?></option>
						<option <?php if(array_key_exists('dotsnav', $instance)) {selected( $instance['dotsnav'], "1" );} ?> value="1"><?php _e('Yes'); ?></option>
					</select>
				</p>
			</div>
		</div>
	</div>
	<script>
			jQuery('div[id*="vikwp_contentslider"]').addClass('vikwp_widget_more_bigger');
	</script>
</div>
