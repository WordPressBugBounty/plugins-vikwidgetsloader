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
	$title = __( 'New title', 'vikwidgetsloader' );
}

if (isset($instance['agree'])) {
	$agree = $instance['agree'];
} else {
	$agree = __('Ok');
}

if (isset($instance['articlelinkname'])) {
	$articlelinkname = $instance['articlelinkname'];
} else {
	$articlelinkname = __( 'Further information', 'vikwidgetsloader' );
}

$modulePosition = array(
	__("Bottom","vikwidgetsloader") => "bottom",
	__("Top","vikwidgetsloader") => "top",
	__("Middle","vikwidgetsloader") => "middle"
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
					<label for="<?php echo $this->get_field_id( 'policy' ); ?>"><?php _e( 'Cookies Policy' , 'vikwidgetsloader'); ?></label> 
					<?php 
					$editor_id = $this->get_field_id('policy');
					$editor_name = $this->get_field_name('policy');
					$content = array_key_exists('policy', $instance) ? $instance['policy'] : __('This site uses cookies. By continuing to browse you accept their use.', 'vikwidgetsloader');
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
					<label for="<?php echo $this->get_field_id( 'agree' ); ?>"><?php _e( 'Agree Button:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'agree' ); ?>" name="<?php echo $this->get_field_name( 'agree' ); ?>" type="text" value="<?php echo esc_attr( $agree ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'articlelinkname' ); ?>"><?php _e( 'Further Information Button:' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'articlelinkname' ); ?>" name="<?php echo $this->get_field_name( 'articlelinkname' ); ?>" type="text" value="<?php echo esc_attr( $articlelinkname ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'article' ); ?>"><?php _e( 'Select the article the visitor will be redirected to when requesting further information:' , 'vikwidgetsloader'); ?></label> 
					<?php 
					$article = array_key_exists('article', $instance) ? $instance['article'] : 0;
					wp_dropdown_pages(array(
					    'selected'              => $article,
					    'echo'                  => 1,
					    'name'                  => $this->get_field_name( 'article' ),
					    'id'                    => $this->get_field_id( 'article' ),
					    'class'                 => 'widefat'
					)); ?>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'css_type' ); ?>"><?php _e( 'Module Position:' , 'vikwidgetsloader'); ?></label> 
					<select id="<?php echo $this->get_field_id('css_type'); ?>" name="<?php echo $this->get_field_name('css_type'); ?>" class="widefat" style="width:100%;">
						<?php foreach($modulePosition as $moduleName => $moduleValue) { ?>
							<option <?php if(array_key_exists('css_type', $instance)) {selected($instance['css_type'], $moduleValue);} ?> value="<?php echo $moduleValue; ?>"><?php echo $moduleName; ?></option>
						<?php } ?>
					</select>
				</p>
			</div>
		</div>
		<script>
			jQuery(document).ready(function($) {
				jQuery('.widget-control-save').click(function() {
					jQuery('.switch-html').click();
				});
			});
		</script>
	</div>	
</div>