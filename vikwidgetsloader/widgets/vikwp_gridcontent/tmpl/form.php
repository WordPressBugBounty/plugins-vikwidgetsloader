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

if (isset($instance['gridcont_numb_limit'])) {
	$gridcont_numb_limit = $instance['gridcont_numb_limit'];
} else {
	$gridcont_numb_limit = 2;
}

$term = term_exists( __("Grid", "vikwp_seasons"), 'category' );
if ( $term !== 0 && $term !== null && is_array($term) ) {
	$term = $term['term_id'];
}

if (isset($instance['gridcont_category_id'])) {
	$gridcont_category_id = $instance['gridcont_category_id'];
} else {
	$gridcont_category_id = $term;
}

if (isset($instance['gridcont_excerpt'])) {
	$gridcont_excerpt = $instance['gridcont_excerpt'];
} else {
	$gridcont_excerpt = 0;
}

if (isset($instance['gridcont_readmore'])) {
	$gridcont_readmore = $instance['gridcont_readmore'];
} else {
	$gridcont_readmore = 0;
}

if (isset($instance['gridcont_readmore_text'])) {
	$gridcont_readmore_text = $instance['gridcont_readmore_text'];
} else {
	$gridcont_readmore_text = 'Read more';
}

if (isset($instance['gridcont_ordering'])) {
	$gridcont_ordering = $instance['gridcont_ordering'];
} else {
	$gridcont_ordering = 'DESC';
}

if (isset($instance['bg_color'])) {
	$bg_color = $instance['bg_color'];
} else {
	$bg_color = '';
}

if (isset($instance['bg_image'])) {
	$bg_image = $instance['bg_image'];
} else {
	$bg_image = '';
}

if (isset($instance['gridcont_number_of_rows']) && !empty($instance['gridcont_number_of_rows'])) {
	$gridcont_number_of_rows = $instance['gridcont_number_of_rows'];
} else {
	$gridcont_number_of_rows = 1;
}

if (isset($instance['gridcont_show_allposts'])) {
	$gridcont_show_allposts = $instance['gridcont_show_allposts'];
} else {
	$gridcont_show_allposts = 0;
}

if (isset($instance['gridcont_text_allposts']) && !empty($instance['gridcont_text_allposts'])) {
	$gridcont_text_allposts = $instance['gridcont_text_allposts'];
} else {
	$gridcont_text_allposts = __( 'Discover all our services', 'vikwidgetsloader' );
}

?>
<div class="vikwp-widget-params">
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' , 'vikwidgetsloader'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('gridcont_category_id'); ?>"><?php _e('Select Category:', 'vikwidgetsloader'); ?></label>
		<select id="<?php echo $this->get_field_id('gridcont_category_id'); ?>" name="<?php echo $this->get_field_name('gridcont_category_id'); ?>" class="widefat" style="width:100%;">
			<?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
				<option <?php selected( $gridcont_category_id, $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo property_exists($term, 'name') ? $term->name : ''; ?></option>
			<?php } ?>
		</select>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'gridcont_numb_limit' ); ?>"><?php _e('Limit:' , 'vikwidgetsloader'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'gridcont_numb_limit' ); ?>" name="<?php echo $this->get_field_name( 'gridcont_numb_limit' ); ?>" type="number" value="<?php echo esc_attr( $gridcont_numb_limit ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('gridcont_excerpt'); ?>"><?php _e('Show Excerpt:', 'vikwidgetsloader'); ?></label>
		<select id="<?php echo $this->get_field_id('gridcont_excerpt'); ?>" name="<?php echo $this->get_field_name('gridcont_excerpt'); ?>" class="widefat" style="width:100%;">
			<option <?php selected( $gridcont_excerpt, 1 ); ?> value="1">Yes</option>
			<option <?php selected( $gridcont_excerpt, 0 ); ?> value="0">No</option>									
		</select>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('gridcont_readmore'); ?>"><?php _e('Show Read More:', 'vikwidgetsloader'); ?></label>
		<select id="<?php echo $this->get_field_id('gridcont_readmore'); ?>" name="<?php echo $this->get_field_name('gridcont_readmore'); ?>" class="widefat" style="width:100%;">
			<option <?php selected( $gridcont_readmore, 1 ); ?> value="1">Yes</option>
			<option <?php selected( $gridcont_readmore, 0 ); ?> value="0">No</option>									
		</select>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'gridcont_readmore_text' ); ?>"><?php _e( 'Read More text:' , 'vikwidgetsloader'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'gridcont_readmore_text' ); ?>" name="<?php echo $this->get_field_name( 'gridcont_readmore_text' ); ?>" type="text" value="<?php echo esc_attr( $gridcont_readmore_text ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'gridcont_number_of_rows' ); ?>"><?php _e( 'Post per row:' , 'vikwidgetsloader'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'gridcont_number_of_rows' ); ?>" name="<?php echo $this->get_field_name( 'gridcont_number_of_rows' ); ?>" type="number" min="1" value="<?php echo esc_attr( $gridcont_number_of_rows ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'gridcont_ordering' ); ?>"><?php _e( 'Posts Order' , 'vikwidgetsloader'); ?></label> 
		<select id="<?php echo $this->get_field_id('gridcont_ordering'); ?>" name="<?php echo $this->get_field_name('gridcont_ordering'); ?>" class="widefat" style="width:100%;">
			<option <?php selected( $gridcont_ordering, 'ASC' ); ?> value="ASC">Ascending</option>
			<option <?php selected( $gridcont_ordering, 'DESC' ); ?> value="DESC">Descending</option>									
		</select>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('gridcont_show_allposts'); ?>"><?php _e('Button All Category Posts:', 'vikwidgetsloader'); ?></label>
		<select id="<?php echo $this->get_field_id('gridcont_show_allposts'); ?>" name="<?php echo $this->get_field_name('gridcont_show_allposts'); ?>" class="widefat" style="width:100%;">
			<option <?php selected( $gridcont_show_allposts, 1 ); ?> value="1">Yes</option>
			<option <?php selected( $gridcont_show_allposts, 0 ); ?> value="0">No</option>									
		</select>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'gridcont_text_allposts' ); ?>"><?php _e('Text Button All Posts:' , 'vikwidgetsloader'); ?></label>
		<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'gridcont_text_allposts' ); ?>" value="<?php echo esc_attr( $gridcont_text_allposts ); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'bg_color' ); ?>"><?php _e('Background Color:' , 'vikwidgetsloader'); ?></label>
		<input type="text" class="my-color-picker" name="<?php echo $this->get_field_name( 'bg_color' ); ?>" value="<?php echo esc_attr( $bg_color ); ?>" />
	</p>
	<div class="vikwp-image-params">
		<p>
			<label for="<?php echo $this->get_field_id( 'bg_image' ); ?>"><?php _e('Background Image:' , 'vikwidgetsloader'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'bg_image' ); ?>" name="<?php echo $this->get_field_name( 'bg_image' ); ?>" type="text" value="<?php echo esc_url( $bg_image ); ?>" />
			<button class="upload_image_button button button-primary">Upload Image</button>
		</p>
		<div class="vikwp-preview-img"></div>
	</div>
</div>
<script>
	jQuery(document).ready(function($) {
		jQuery('.my-color-picker').wpColorPicker();
	});
</script>