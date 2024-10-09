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

if (isset($instance['typewidget'])) {
	$typewidget = $instance['typewidget'];
} else {
	$typewidget = 0;
}

if (isset($instance['title'])) {
	$title = $instance['title'];
} else {
	$title = "";
}

$widgetType = array(
	0 => __("Review Snippets", 'vikwidgetsloader'),
	1 => __("Rating Widget", 'vikwidgetsloader'),
	2 => __("Thumbs Up Badge", 'vikwidgetsloader'),
	3 => __("Rated on Widget", 'vikwidgetsloader'),
	4 => __("Bravo Widget", 'vikwidgetsloader'),
	5 => __("Tripadvisor Widget", 'vikwidgetsloader')
);

$languageType = array(
	"en_US" => __("English (American)", 'vikwidgetsloader'),
	"en_UK" => __("English (British)", 'vikwidgetsloader'),
	"zh_CN" => __("Chinese", 'vikwidgetsloader'),
	"fr" => __("French", 'vikwidgetsloader'),
	"de" => __("German", 'vikwidgetsloader'),
	"el" => __("Greek", 'vikwidgetsloader'),
	"it" => __("Italian", 'vikwidgetsloader'),
	"no" => __("Norwegian", 'vikwidgetsloader'),
	"pl" => __("Polish", 'vikwidgetsloader'),
	"ru" => __("Russian", 'vikwidgetsloader'),
	"es" => __("Spanish", 'vikwidgetsloader'),
	"th" => __("Thai", 'vikwidgetsloader'),
	"tr" => __("Turkish", 'vikwidgetsloader'),
);

?>
<div class="vikwp-widget-params">
	<div class="vikwp-widget-cnt">
		<div class="vikwp-widget-col">
			<div class="vikwp-widget-col-inner">
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'typewidget' ); ?>"><?php _e( 'Widget Type' , 'vikwidgetsloader'); ?></label> 
					<select id="<?php echo $this->get_field_id('typewidget'); ?>" name="<?php echo $this->get_field_name('typewidget'); ?>" class="widefat" style="width:100%;">
						<?php foreach($widgetType as $widgetTypeValue => $widgetTypeName) { ?>
							<option <?php selected( $typewidget, $widgetTypeValue ); ?> value="<?php echo $widgetTypeValue; ?>"><?php echo $widgetTypeName;?></option>
						<?php } ?>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'urlwebsite' ); ?>"><?php _e( 'Website URL' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'urlwebsite' ); ?>" name="<?php echo $this->get_field_name( 'urlwebsite' ); ?>" type="text" value="<?php echo array_key_exists('urlwebsite', $instance) ? esc_attr( $instance['urlwebsite'] ) : ''; ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('httptype'); ?>"><?php _e('Protocol Type', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('httptype'); ?>" name="<?php echo $this->get_field_name('httptype'); ?>" class="widefat" style="width:100%;">
						<option <?php if(array_key_exists('httptype', $instance)) {selected( $instance['httptype'], "0" );} ?> value="0"><?php echo 'HTTPS'; ?></option>
						<option <?php if(array_key_exists('httptype', $instance)) {selected( $instance['httptype'], "1" );} ?> value="1"><?php echo 'HTTP'; ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'idhotel' ); ?>"><?php _e( "Property ID (Value in URL after 'd')" , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'idhotel' ); ?>" name="<?php echo $this->get_field_name( 'idhotel' ); ?>" type="text" size="8" value="<?php echo array_key_exists('idhotel', $instance) ? esc_attr( $instance['idhotel'] ) : '0000'; ?>" />
				</p>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'lantripadv' ); ?>"><?php _e( 'Widget Type' , 'vikwidgetsloader'); ?></label> 
					<select id="<?php echo $this->get_field_id('lantripadv'); ?>" name="<?php echo $this->get_field_name('lantripadv'); ?>" class="widefat" style="width:100%;">
						<?php foreach($languageType as $languageTypeValue => $languageTypeName) { ?>
							<option <?php if(array_key_exists('lantripadv', $instance)) {selected( $instance['lantripadv'], $languageTypeValue );} ?> value="<?php echo $languageTypeValue; ?>"><?php echo $languageTypeName;?></option>
						<?php } ?>
					</select>
				</p>
			</div>
		</div>
		<?php if ($typewidget == 0) { ?>
		<div class="vikwp-widget-col">
			<div class="vikwp-widget-col-inner">
				<p>
					<label for="<?php echo $this->get_field_id('popularity'); ?>"><?php _e('Display Property Popularity', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('popularity'); ?>" name="<?php echo $this->get_field_name('popularity'); ?>" class="widefat" style="width:100%;">
						<option <?php if(array_key_exists('popularity', $instance)) {selected( $instance['popularity'], "1" );} ?> value="1"><?php _e('Yes'); ?></option>
						<option <?php if(array_key_exists('popularity', $instance)) {selected( $instance['popularity'], "0" );} ?> value="0"><?php _e('No'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('rating'); ?>"><?php _e('Display Property Rating', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('rating'); ?>" name="<?php echo $this->get_field_name('rating'); ?>" class="widefat" style="width:100%;">
						<option <?php if(array_key_exists('rating', $instance)) {selected( $instance['rating'], "1" );} ?> value="1"><?php _e('Yes'); ?></option>
						<option <?php if(array_key_exists('rating', $instance)) {selected( $instance['rating'], "0" );} ?> value="0"><?php _e('No'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('writereview'); ?>"><?php _e('Display Write Review', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('writereview'); ?>" name="<?php echo $this->get_field_name('writereview'); ?>" class="widefat" style="width:100%;">
						<option <?php if(array_key_exists('writereview', $instance)) {selected( $instance['writereview'], "1" );} ?> value="1"><?php _e('Yes'); ?></option>
						<option <?php if(array_key_exists('writereview', $instance)) {selected( $instance['writereview'], "0" );} ?> value="0"><?php _e('No'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('border'); ?>"><?php _e('Display Border', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('border'); ?>" name="<?php echo $this->get_field_name('border'); ?>" class="widefat" style="width:100%;">
						<option <?php if(array_key_exists('border', $instance)) {selected( $instance['border'], "1" );} ?> value="1"><?php _e('Yes'); ?></option>
						<option <?php if(array_key_exists('border', $instance)) {selected( $instance['border'], "0" );} ?> value="0"><?php _e('No'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('size_thumb'); ?>"><?php _e('Thumbnail Size', 'vikwidgetsloader'); ?></label>
					<select id="<?php echo $this->get_field_id('size_thumb'); ?>" name="<?php echo $this->get_field_name('size_thumb'); ?>" class="widefat" style="width:100%;">
						<option <?php if(array_key_exists('size_thumb', $instance)) {selected( $instance['size_thumb'], "1" );} ?> value="1"><?php _e('Narrow: 160px width, variable height', 'vikwidgetsloader'); ?></option>
						<option <?php if(array_key_exists('size_thumb', $instance)) {selected( $instance['size_thumb'], "0" );} ?> value="0"><?php _e('Wide: 468px width maximum, 47px height', 'vikwidgetsloader'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( 'rewlimit' ); ?>"><?php _e( 'Review Limit' , 'vikwidgetsloader'); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'rewlimit' ); ?>" name="<?php echo $this->get_field_name( 'rewlimit' ); ?>" type="number" min="0" value="<?php echo array_key_exists('rewlimit', $instance) ? esc_attr( $instance['rewlimit'] ) : 3; ?>" />
				</p>
			</div>
		</div>
		<?php } ?>
	</div>
	<script>
		jQuery('div[id*="vikwp_tripadvisorreview"]').addClass('vikwp_widget_more_bigger');
	</script>
</div>