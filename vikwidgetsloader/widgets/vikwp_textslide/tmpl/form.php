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

if (isset( $instance[ 'title' ] ) ) {
	$title = $instance[ 'title' ];
} else {
	$title = __( '', 'vikwidgetsloader' );
}
if (isset( $instance['image'] )) {
	$image = $instance['image'];
} else {
	$image = "";
}

if (isset( $instance['testimonial_box_width'] )) {
	$testimonial_box_width = $instance['testimonial_box_width'];
} else {
	$testimonial_box_width = '60%';
}

if (isset( $instance['testimonial_box_height'] )) {
	$testimonial_box_height = $instance['testimonial_box_height'];
} else {
	$testimonial_box_height = '200';
}

if (isset( $instance['testimonial_time_delay'] )) {
	$testimonial_time_delay = $instance['testimonial_time_delay'];
} else {
	$testimonial_time_delay = '2000';
}

if (isset( $instance['testimonial_time_fadein'] )) {
	$testimonial_time_fadein = $instance['testimonial_time_fadein'];
} else {
	$testimonial_time_fadein = '1000';
}

if (isset( $instance['testimonial_time_fadeout'] )) {
	$testimonial_time_fadeout = $instance['testimonial_time_fadeout'];
} else {
	$testimonial_time_fadeout = '500';
}

if (isset( $instance['testimonial_title_color'] )) {
	$testimonial_title_color = $instance['testimonial_title_color'];
} else {
	$testimonial_title_color = '#ffffff';
}

if (isset( $instance['testimonial_desc_color'] )) {
	$testimonial_desc_color = $instance['testimonial_desc_color'];
} else {
	$testimonial_desc_color = '#ffffff';
}

if (isset( $instance['title_image'] )) {
	$title_image = $instance['title_image'];
} else {
	$title_image = '';
}

if (isset($instance['textarea'])) {
	$textarea = $instance['textarea'];
} else {
	$textarea = __( '', 'vikwidgetsloader' );
}

if (isset( $instance['image_type'] )) {
	$image_type = $instance['image_type'];
} else {
	$image_type = 'scroll';
}

if (isset( $instance['enable_mask'] )) {
	$enable_mask = $instance['enable_mask'];
} else {
	$enable_mask = 0;
}

if (isset( $instance['opacity_mask'] )) {
	$opacity_mask = $instance['opacity_mask'];
} else {
	$opacity_mask = 0.6;
}

if (isset( $instance['title_effect'] )) {
	$title_effect = $instance['title_effect'];
} else {
	$title_effect = 'none';
}

if (isset( $instance['desc_effect'] )) {
	$desc_effect = $instance['desc_effect'];
} else {
	$desc_effect = 'none';
}

if (isset($instance['testimonials']) ) {
	$testimonials = $instance['testimonials'];
} else {
	$testimonials = 1;
}

if (isset( $instance['ts_category_id'] )) {
	$ts_category_id = $instance['ts_category_id'];
} else {
	$ts_category_id = 0;
}

if (isset($instance['testimonials_layout']) ) {
	$testimonials_layout = $instance['testimonials_layout'];
} else {
	$testimonials_layout = 1;
}

if (isset($instance['testimonials_xrow']) ) {
	$testimonials_xrow = $instance['testimonials_xrow'];
} else {
	$testimonials_xrow = 1;
}

if (isset($instance['testimonials_img_pos']) ) {
	$testimonials_img_pos = $instance['testimonials_img_pos'];
} else {
	$testimonials_img_pos = 'up';
}

if (isset($instance['testimonials_autoplay']) ) {
	$testimonials_autoplay = $instance['testimonials_autoplay'];
} else {
	$testimonials_autoplay = 0;
}

if (isset($instance['testimonials_arrows']) ) {
	$testimonials_arrows = $instance['testimonials_arrows'];
} else {
	$testimonials_arrows = 1;
}

if (isset($instance['testimonials_dots']) ) {
	$testimonials_dots = $instance['testimonials_dots'];
} else {
	$testimonials_dots = 0;
}

if (isset( $instance['quotes'] )) {
	$quotes = $instance['quotes'];
} else {
	$quotes = 1;
}

if (isset( $instance['testimonial_post_title'] )) {
	$testimonial_post_title = $instance['testimonial_post_title'];
} else {
	$testimonial_post_title = 0;
}

if (isset( $instance['class_suffix'] )) {
	$class_suffix = $instance['class_suffix'];
} else {
	$class_suffix = "";
}

?>
<div class="vikwp-widget-params">
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:' , 'vikwidgetsloader'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<div class="vikwp-widget-cnt">
		<div class="vikwp-widget-col">
			<div class="vikwp-widget-col-inner">
				<div class="vikwp-image-params">
					<p class="vikwp-classwdg">
						<label for="<?php echo $this->get_field_id( 'class_suffix' ); ?>"><?php _e('CSS Class:' , 'vikwidgetsloader'); ?></label> 
						<input class="widefat" id="<?php echo $this->get_field_id( 'class_suffix' ); ?>" name="<?php echo $this->get_field_name( 'class_suffix' ); ?>" type="text" value="<?php echo esc_attr( $class_suffix ); ?>" />
					</p>
					<p>
						<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e('Image:' , 'vikwidgetsloader'); ?></label>
						<input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>" />
						<button class="upload_image_button button button-primary">Upload Image</button>
					</p>
				<div class="vikwp-preview-img"></div>
				</div>
				<p>
					<label for="<?php echo $this->get_field_id( 'title_image' ); ?>"><?php _e('Title Image:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'title_image' ); ?>" name="<?php echo $this->get_field_name( 'title_image' ); ?>" type="text" value="<?php echo esc_attr( $title_image ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'textarea' ); ?>"><?php _e('Content Image:' , 'vikwidgetsloader'); ?></label> 
					<?php 
					$editor_id = $this->get_field_id('textarea');
                    $editor_name = $this->get_field_name('textarea');
                    $content = $textarea;
					$settings = array( 
						'textarea_name' => $editor_name,
						'textarea_rows' => 20,
                        'media_buttons' => false,
                        'editor_height'	=> 120,
                        'teeny' => true,
						);
					wp_editor( $content, $editor_id, $settings );
					?>
				</p>
				<h4><?php _e('CONFIGURATION:' , 'vikwidgetsloader'); ?></h4>
				<p>
					<label for="<?php echo $this->get_field_id('image_type'); ?>"><?php _e('Layout Image:', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('image_type'); ?>" name="<?php echo $this->get_field_name('image_type'); ?>" class="widefat" style="width:100%;">
						<option <?php selected( $image_type, 'scroll' ); ?> value="scroll"><?php _e('Scroll' , 'vikwidgetsloader'); ?></option>
						<option <?php selected( $image_type, 'fixed' ); ?> value="fixed"><?php _e('Fixed' , 'vikwidgetsloader'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('enable_mask'); ?>"><?php _e('Enable Mask:', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('enable_mask'); ?>" name="<?php echo $this->get_field_name('enable_mask'); ?>" class="widefat" style="width:100%;">
						<option <?php selected( $enable_mask, '1' ); ?> value="1"><?php _e( 'Yes' ); ?></option>
						<option <?php selected( $enable_mask, '0' ); ?> value="0"><?php _e( 'No' ); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('opacity_mask'); ?>"><?php _e('Opacity Mask:', 'vikwidgetsloader'); ?></label>
					<input class="widefat" id="<?php echo $this->get_field_id( 'opacity_mask' ); ?>" name="<?php echo $this->get_field_name( 'opacity_mask' ); ?>" type="number" min="0" max="1" step="0.1" value="<?php echo esc_attr( $opacity_mask ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'testimonial_box_height' ); ?>"><?php _e('Box Height:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'testimonial_box_height' ); ?>" name="<?php echo $this->get_field_name( 'testimonial_box_height' ); ?>" type="number" value="<?php echo esc_attr( $testimonial_box_height ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('title_effect'); ?>"><?php _e('Title Effect:', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('title_effect'); ?>" name="<?php echo $this->get_field_name('title_effect'); ?>" class="widefat" style="width:100%;">
						<option <?php selected( $title_effect, 'none' ); ?> value="none"><?php _e('none' , 'vikwidgetsloader'); ?></option>
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
						<option <?php selected( $desc_effect, 'none' ); ?> value="none"><?php _e('none' , 'vikwidgetsloader'); ?></option>
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
				<div class="vikwp-widget-box">
					<p>
						<label for="<?php echo $this->get_field_id( 'testimonials' ); ?>"><?php _e('Enable Testimonials' , 'vikwidgetsloader'); ?></label>
						<input type="checkbox" id="<?php echo $this->get_field_id( 'testimonials' ); ?>" name="<?php echo $this->get_field_name( 'testimonials' ); ?>" value="1" <?php checked( $testimonials, 1 ); ?> />
					</p>									
				</div>
			</div>
		</div>
		<?php 
			$testim = $testimonials;
			if($testim == 1) { ?>
			<div class="vikwp-widget-col">
				<div class="vikwp-widget-col-inner">
					<h4><?php _e('TESTIMONIAL CONFIGURATION:' , 'vikwidgetsloader'); ?></h4>
					<div class="vikwp-widget-testimonials-box">
						<p>
							<label for="<?php echo $this->get_field_id('ts_category_id'); ?>"><?php _e('Select Category:', 'vikwidgetsloader'); ?></label>
							<select id="<?php echo $this->get_field_id('ts_category_id'); ?>" name="<?php echo $this->get_field_name('ts_category_id'); ?>" class="widefat" style="width:100%;">
								<?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
									<option <?php selected( $ts_category_id, $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
								<?php } ?>
							</select>
						</p>
						<p>
							<label for="<?php echo $this->get_field_id('testimonials_layout'); ?>"><?php _e('Testimonials Layout:', 'vikwidgetsloader'); ?></label>
							<select id="<?php echo $this->get_field_id('testimonials_layout'); ?>" name="<?php echo $this->get_field_name('testimonials_layout'); ?>" class="widefat" style="width:100%;">
								<option <?php selected( $testimonials_layout, 0 ); ?> value="0">Fade</option>
								<option <?php selected( $testimonials_layout, 1 ); ?> value="1">Carousel</option>
							</select>
						</p>
						<div id="vikwp-carousel-fields" class="vikwp-widget-param-hidden <?php echo ($testimonials_layout == 1 ? 'vikwp-show' : ''); ?>">
							<p>
								<label for="<?php echo $this->get_field_id('testimonials_xrow'); ?>"><?php _e('Testimonial per Row:', 'vikwidgetsloader'); ?></label>
								<input class="widefat" id="<?php echo $this->get_field_id( 'testimonials_xrow' ); ?>" name="<?php echo $this->get_field_name( 'testimonials_xrow' ); ?>" type="number" value="<?php echo esc_attr( $testimonials_xrow ); ?>" />
							</p>
							<p>
								<label for="<?php echo $this->get_field_id('testimonials_img_pos'); ?>"><?php _e('Featured Image position:', 'vikwidgetsloader'); ?></label>
								<select id="<?php echo $this->get_field_id('testimonials_img_pos'); ?>" name="<?php echo $this->get_field_name('testimonials_img_pos'); ?>" class="widefat" style="width:100%;">
									<option <?php selected( $testimonials_img_pos, 'up' ); ?> value="up">Above</option>
									<option <?php selected( $testimonials_img_pos, 'down' ); ?> value="down">Under</option>
									<option <?php selected( $testimonials_img_pos, 'right' ); ?> value="right">Right</option>
									<option <?php selected( $testimonials_img_pos, 'left' ); ?> value="left">Left</option>
								</select>
							</p>
							<p>
								<label for="<?php echo $this->get_field_id('testimonials_autoplay'); ?>"><?php _e('Autoplay:', 'vikwidgetsloader'); ?></label>
								<select id="<?php echo $this->get_field_id('testimonials_autoplay'); ?>" name="<?php echo $this->get_field_name('testimonials_autoplay'); ?>" class="widefat" style="width:100%;">
									<option <?php selected( $testimonials_autoplay, 0 ); ?> value="0">No</option>
									<option <?php selected( $testimonials_autoplay, 1 ); ?> value="1">Yes</option>
								</select>
							</p>
							<p>
								<label for="<?php echo $this->get_field_id('testimonials_arrows'); ?>"><?php _e('Navigation Arrows:', 'vikwidgetsloader'); ?></label>
								<select id="<?php echo $this->get_field_id('testimonials_arrows'); ?>" name="<?php echo $this->get_field_name('testimonials_arrows'); ?>" class="widefat" style="width:100%;">
									<option <?php selected( $testimonials_arrows, 0 ); ?> value="0">No</option>
									<option <?php selected( $testimonials_arrows, 1 ); ?> value="1">Yes</option>
								</select>
							</p>
							<p>
								<label for="<?php echo $this->get_field_id('testimonials_dots'); ?>"><?php _e('Navigation Dots:', 'vikwidgetsloader'); ?></label>
								<select id="<?php echo $this->get_field_id('testimonials_dots'); ?>" name="<?php echo $this->get_field_name('testimonials_dots'); ?>" class="widefat" style="width:100%;">
									<option <?php selected( $testimonials_dots, 0 ); ?> value="0">No</option>
									<option <?php selected( $testimonials_dots, 1 ); ?> value="1">Yes</option>
								</select>
							</p>
						</div>
						<div id="vikwp-fade-fields" class="vikwp-widget-param-hidden <?php echo ($testimonials_layout == 0 ? 'vikwp-show' : ''); ?>">
							<p>
								<label for="<?php echo $this->get_field_id( 'testimonial_box_width' ); ?>"><?php _e('Box Width:' , 'vikwidgetsloader'); ?></label> 
								<input class="widefat" id="<?php echo $this->get_field_id( 'testimonial_box_width' ); ?>" name="<?php echo $this->get_field_name( 'testimonial_box_width' ); ?>" type="text" value="<?php echo esc_attr( $testimonial_box_width ); ?>" />
							</p>
							<p>
								<label for="<?php echo $this->get_field_id( 'testimonial_time_delay' ); ?>"><?php _e('Time Delay:' , 'vikwidgetsloader'); ?></label> 
								<input class="widefat" id="<?php echo $this->get_field_id( 'testimonial_time_delay' ); ?>" name="<?php echo $this->get_field_name( 'testimonial_time_delay' ); ?>" type="text" value="<?php echo esc_attr( $testimonial_time_delay ); ?>" />
							</p>
							<p>
								<label for="<?php echo $this->get_field_id( 'testimonial_time_fadein' ); ?>"><?php _e('Time Fade In:' , 'vikwidgetsloader'); ?></label> 
								<input class="widefat" id="<?php echo $this->get_field_id( 'testimonial_time_fadein' ); ?>" name="<?php echo $this->get_field_name( 'testimonial_time_fadein' ); ?>" type="text" value="<?php echo esc_attr( $testimonial_time_fadein ); ?>" />
							</p>
							<p>
								<label for="<?php echo $this->get_field_id( 'testimonial_time_fadeout' ); ?>"><?php _e('Time Fade Out:' , 'vikwidgetsloader'); ?></label> 
								<input class="widefat" id="<?php echo $this->get_field_id( 'testimonial_time_fadeout' ); ?>" name="<?php echo $this->get_field_name( 'testimonial_time_fadeout' ); ?>" type="text" value="<?php echo esc_attr( $testimonial_time_fadeout ); ?>" />
							</p>
							<p>
								<label for="<?php echo $this->get_field_id( 'testimonial_desc_color' ); ?>"><?php _e('Text Content Color:' , 'vikwidgetsloader'); ?></label>
								<input type="text" class="my-color-picker" name="<?php echo $this->get_field_name( 'testimonial_desc_color' ); ?>" value="<?php echo esc_attr( $testimonial_desc_color ); ?>" />
							</p>
						</div>
						<p>
							<label for="<?php echo $this->get_field_id( 'testimonial_title_color' ); ?>"><?php _e('Title Color:' , 'vikwidgetsloader'); ?></label>
							<input type="text" class="my-color-picker" name="<?php echo $this->get_field_name( 'testimonial_title_color' ); ?>" value="<?php echo esc_attr( $testimonial_title_color ); ?>" />
						</p>
						<p>
							<label for="<?php echo $this->get_field_id('quotes'); ?>"><?php _e('Enable Quotes:', 'vikwidgetsloader'); ?></label>
							<select id="<?php echo $this->get_field_id('quotes'); ?>" name="<?php echo $this->get_field_name('quotes'); ?>" class="widefat" style="width:100%;">
								<option <?php selected( $quotes, 0 ); ?> value="0">No</option>
								<option <?php selected( $quotes, 1 ); ?> value="1">Yes</option>
							</select>
						</p>
						<p>
							<label for="<?php echo $this->get_field_id('testimonial_post_title'); ?>"><?php _e('Show Post Title:', 'vikwidgetsloader'); ?></label>
							<select id="<?php echo $this->get_field_id('testimonial_post_title'); ?>" name="<?php echo $this->get_field_name('testimonial_post_title'); ?>" class="widefat" style="width:100%;">
								<option <?php selected( $testimonial_post_title, 1 ); ?> value="1">Yes</option>
								<option <?php selected( $testimonial_post_title, 0 ); ?> value="0">No</option>									
							</select>
						</p>
						
						
					</div>
				</div>
			</div>
			<script>
				jQuery('div[id*="vikwp_textslide"]').addClass('vikwp_widget_more');
				
				jQuery(document).ready(function($) {
					var carouselParam = jQuery('#vikwp-carousel-fields');
					var fadeParam = jQuery('#vikwp-fade-fields');

					jQuery('.my-color-picker').wpColorPicker();

					jQuery('#<?php echo $this->get_field_id('testimonials_layout'); ?>').on('change', function(){
						if(jQuery(this).val() == 1) {
							carouselParam.addClass('vikwp-show');
							
						} else if(jQuery(this).val() == 0) {
							//carouselParam.removeClass('vikwp-show');
							fadeParam.addClass('vikwp-show');
						}
					});					

				});
			</script>
		<?php }
			?>
	</div>
</div>
