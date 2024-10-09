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

global $post;

$arrslide = array();

$get_number_items	= array_key_exists('counter_displayed', $instance) ? $instance['counter_displayed'] : 0;
$get_item_padding = (isset($instance['counter_padding']) && !empty($instance['counter_padding']) ? $instance['counter_padding'] : 2 );


$get_class_suffix = array_key_exists('class_suffix', $instance) ? $instance['class_suffix'] : '';

$rand_id = rand(0, 999);

?>
<?php 
if ($get_number_items > 0) {
	for ($i = 0; $i < $get_number_items; $i++) {

		$get_item_value = (isset($instance['counter_' . $i . '_value']) && !empty($instance['counter_' . $i . '_value']) ? $instance['counter_' . $i . '_value'] : '' );

		$slider_entry = '<div class="vikcounter-item col-xs-6 col-sm-'.$get_item_padding.'">';
			$slider_entry .= '<div class="vikcounter-item-inner">';
				if (!empty($instance['counter_'.$i.'_image'])) {
					$slider_entry .= '<img class="vikcounter-img" src="'.$instance['counter_'.$i.'_image'].'" />';
				}
				if (!empty($instance['counter_'.$i.'_selected'])) {
					$slider_entry .= '<span class="vikcounter-icon"><i class="'.$instance['counter_'.$i.'_type'].' fa-'.$instance['counter_'.$i.'_selected'].'" ></i></span>';
				}
				$slider_entry .= '<span id="vikcounter-count-'.$rand_id.'-'.$i.'" class="vikcounter-count">'.$get_item_value.'</span>';
				if (!empty($instance['counter_' . $i . '_title'])) {
					$slider_entry .= '<h3 class="vikcounter-title">'.$instance['counter_' . $i . '_title'].'</h3>';
				}
				if (!empty($instance['counter_' . $i . '_description'])) {
					$slider_entry .= '<div class="vikcounter-caption">'.$instance['counter_' . $i . '_description'].'</div>';
				}
			$slider_entry .= '</div>';
		$slider_entry .= '</div>';
		$arrslide[] = $slider_entry;
	}
} 
?>

<a id="vikcounter-start"></a>
<div id="vikcounter-<?php echo $rand_id; ?>" class="vikcounter container-fluid">
	<div class="vikcounter-inner row">
		<?php 
			if (is_array($arrslide)) {
				foreach($arrslide as $vsl) {
					echo $vsl;
				}
			}
		?>
	</div>
</div>

<script>
jQuery.noConflict();
Function.prototype.debounce = function(threshold) {
	var callback = this;
	var timeout;
	return function() {
		var context = this,
			params = arguments;
		window.clearTimeout(timeout);
		timeout = window.setTimeout(function() {
			callback.apply(context, params);
		}, threshold);
	};
};
jQuery.fn.isOnScreen = function(x, y) {
	if (x == null || typeof x == 'undefined') x = 1;
	if (y == null || typeof y == 'undefined') y = 1;
	var win = jQuery(window);
	var viewport = {
		top: win.scrollTop(),
		left: win.scrollLeft()
	};
	viewport.right = viewport.left + win.width();
	viewport.bottom = viewport.top + win.height();
	var height = this.outerHeight();
	var width = this.outerWidth();
	if (!width || !height) {
		return false;
	}
	var bounds = this.offset();
	bounds.right = bounds.left + width;
	bounds.bottom = bounds.top + height;
	var visible = (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
	if (!visible) {
		return false;
	}
	var deltas = {
		top: Math.min(1, (bounds.bottom - viewport.top) / height),
		bottom: Math.min(1, (viewport.bottom - bounds.top) / height),
		left: Math.min(1, (bounds.right - viewport.left) / width),
		right: Math.min(1, (viewport.right - bounds.left) / width)
	};

	return (deltas.left * deltas.right) >= x && (deltas.top * deltas.bottom) >= y;
};
		
//cambia il selettore con ID o classe da leggere, meglio ID cosi hanno sempre la posizione precisa e singola
var vikcounter_start = false;
var vikcounter_block_cont = jQuery('.vikcounter-inner');
var vikcounter_check = function() {
	var vikcounter_cont_visible = vikcounter_block_cont.isOnScreen(0.1, 0.5);
	if (vikcounter_cont_visible === true && !vikcounter_start) {
		vikcounter_start = true;
		jQuery('.vikcounter-count').each(function () {
		jQuery(this).prop('Counter',0).animate({
				Counter: jQuery(this).text()
		}, {
				duration: 4000,
				easing: 'swing',
				step: function (now) {
						jQuery(this).text(Math.ceil(now));
				}
		});
	});
	}
}
jQuery(document).ready(function() {
	var debounced = vikcounter_check.debounce(50);
	jQuery(window).on('scroll', debounced);

	/** Add Class to widget container **/
	if ( jQuery('#vikcounter-<?php echo $rand_id; ?>').parents('.module').length ) {
		jQuery('#vikcounter-<?php echo $rand_id; ?>').parents('.module').addClass('<?php echo $get_class_suffix; ?>');
	} else {
		jQuery('#vikcounter-<?php echo $rand_id; ?>').parent('div').addClass('<?php echo $get_class_suffix; ?>');
	}
});
</script>