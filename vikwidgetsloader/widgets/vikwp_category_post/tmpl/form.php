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

if (isset($instance['title'])) {
	$title = $instance['title'];
} else {
	$title = __( '', 'vikwidgetsloader' );
}

if (isset($instance['numb_limit'])) {
	$numb_limit = $instance['numb_limit'];
} else {
	$numb_limit = 4;
}

$term = term_exists( __("Services", "vikwp_seasons"), 'category' );
if ( $term !== 0 && $term !== null && is_array($term) ) {
	$term = $term['term_id'];
}

if (isset($instance['category_id'])) {
	$category_id = $instance['category_id'];
} else {
	$category_id = $term;
}

if (isset($instance['feat_image'])) {
	$feat_image = $instance['feat_image'];
} else {
	$feat_image = 1;
} 

if (isset($instance['title_linked'])) {
	$title_linked = $instance['title_linked'];
} else {
	$title_linked = 1;
}

if (isset($instance['date_post'])) {
	$date_post = $instance['date_post'];
} else {
	$date_post = 1;
} 

if (isset( $instance['class_suffix'])) {
	$class_suffix = $instance['class_suffix'];
} else {
	$class_suffix = __('', 'vikwidgetsloader');
}

?>
<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' , 'vikwidgetsloader'); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id('category_id'); ?>"><?php _e('Select Category:', 'vikwidgetsloader'); ?></label>
	<select id="<?php echo $this->get_field_id('category_id'); ?>" name="<?php echo $this->get_field_name('category_id'); ?>" class="widefat" style="width:100%;">
		<?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
			<option <?php selected( $category_id, $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
		<?php } ?>
	</select>
</p>
<p>
	<label for="<?php echo $this->get_field_id('feat_image'); ?>"><?php _e('Show Featured Image:', 'vikwidgetsloader'); ?></label>
	<select id="<?php echo $this->get_field_id('feat_image'); ?>" name="<?php echo $this->get_field_name('feat_image'); ?>" class="widefat" style="width:100%;">				
		<option <?php selected( $feat_image, '1' ); ?> value="1">Yes</option>
		<option <?php selected( $feat_image, '0' ); ?> value="0">No</option>
	</select>
</p>
<p>
	<label for="<?php echo $this->get_field_id('title_linked'); ?>"><?php _e('Title Linked:', 'vikwidgetsloader'); ?></label>
	<select id="<?php echo $this->get_field_id('title_linked'); ?>" name="<?php echo $this->get_field_name('title_linked'); ?>" class="widefat" style="width:100%;">				
		<option <?php selected( $title_linked, '1' ); ?> value="1">Yes</option>
		<option <?php selected( $title_linked, '0' ); ?> value="0">No</option>
	</select>
</p>
<p>
	<label for="<?php echo $this->get_field_id('date_post'); ?>"><?php _e('Show Date Post:', 'vikwidgetsloader'); ?></label>
	<select id="<?php echo $this->get_field_id('date_post'); ?>" name="<?php echo $this->get_field_name('date_post'); ?>" class="widefat" style="width:100%;">				
		<option <?php selected( $date_post, '1' ); ?> value="1">Yes</option>
		<option <?php selected( $date_post, '0' ); ?> value="0">No</option>
	</select>
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'numb_limit' ); ?>"><?php _e( 'Limit:' , 'vikwidgetsloader'); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'numb_limit' ); ?>" name="<?php echo $this->get_field_name( 'numb_limit' ); ?>" type="number" value="<?php echo esc_attr( $numb_limit ); ?>" />
</p>
<p class="vikwp-classwdg">
	<label for="<?php echo $this->get_field_id( 'class_suffix' ); ?>"><?php _e('CSS Class:' , 'vikwidgetsloader'); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'class_suffix' ); ?>" name="<?php echo $this->get_field_name( 'class_suffix' ); ?>" type="text" value="<?php echo esc_attr( $class_suffix ); ?>" />
</p>