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

$arrslide = array();

$get_link = array_key_exists('readmoretext', $instance) ? $instance['readmoretext'] : '';
$get_textarea_above = array_key_exists('textarea_above', $instance) ? $instance['textarea_above'] : '';
$get_size = array_key_exists('icon_size', $instance) ? (int) $instance['icon_size'] : 24;
$get_paddingicon = array_key_exists('icon_padding', $instance) ? $instance['icon_padding'] : 3;
$get_box_dim = array_key_exists('container_size', $instance) ? $instance['container_size'] : '0';
$get_alignment = array_key_exists('content_alignment', $instance) ? $instance['content_alignment'] : '1';
$get_style = array_key_exists('icon_style', $instance) ? $instance['icon_style'] : 'default';
$icons_displayed = array_key_exists('icons_displayed', $instance) ? $instance['icons_displayed'] : 0;
$readmore_target = array_key_exists('readmore_target', $instance) ? $instance['readmore_target'] : '0';
$get_ico_align = array_key_exists('icon_alignment', $instance) ? $instance['icon_alignment'] : 'top';
$get_class_suffix = array_key_exists('class_suffix', $instance) ? $instance['class_suffix'] : '';

$rand_id = rand(0, 999);
/* 
* @version 1.0.4
* Change size circle to the double of the icon size.
* Added the css declaration for the rounded icons.
*/
$circle_size = $get_size * 1.5;
$css_string = '';
$css_string .= '
.vikicons-circle .vikicons-item-icoelem {
	height: '.$circle_size.'px;
	width: '.$circle_size.'px;
}
.vikicons-circle .vikicons-item-icoelem i {
	line-height: '.$circle_size.'px;
}';

/*
* @WP - Replaced the head style on Joomla with an if.
*/
$get_general_size = "";
if ( $get_style == "circle" ) {
	$get_general_size = $circle_size;
} else {
	$get_general_size = $get_size;
}

?>

<?php 
if ($icons_displayed > 0) {
	for ($i=0; $i < $icons_displayed; $i++) { 
		$slider_entry = '<div class="vikicons-item-inner vikicons-item-'.$get_ico_align.'">';
			$slider_entry .= '<div class="vikicons-item-icon">';
				$slider_entry .= '<span class="vikicons-item-icoelem" style="height:'.$get_general_size.'px; width:'.$get_general_size.'px;">';
				
				if (!empty($instance['icon_'.$i.'_readmore'])) {
					$slider_entry .= '<a href="'.$instance['icon_'.$i.'_readmore'].'" ';
					if($readmore_target == 0) { 
						$slider_entry .= 'target="_blank"';
					}
					$slider_entry .= '>';
				}
					
					if ( $get_style == "circle" ) {
						$slider_entry .= '<i class="'.$instance['icon_'.$i.'_type'].' fa-'.$instance['icon_'.$i.'_selected'].'" style="line-height: '.$get_general_size.'px; font-size: '.$get_size.'px;"></i>';
					} else {
						$slider_entry .= '<i class="'.$instance['icon_'.$i.'_type'].' fa-'.$instance['icon_'.$i.'_selected'].'" style="font-size: '.$get_size.'px;"></i>';
					}
					
				if (!empty($instance['icon_'.$i.'_readmore'])) {
					$slider_entry .= '</a>';
				}

				$slider_entry .= '</span>';
			$slider_entry .= '</div>';
			$slider_entry .= '<div class="vikicons-item-text">';
				if (!empty($instance['icon_'.$i.'_title'])) {
					$slider_entry .= '<h3>'.$instance['icon_'.$i.'_title'].'</h3>';
				}
				if (!empty($instance['icon_'.$i.'_description'])) {
					$slider_entry .= '<p>'.$instance['icon_'.$i.'_description'].'</p>';
				}
			$slider_entry .= '</div>';
		$slider_entry .= '</div>';
		$arrslide[] = $slider_entry;
	}
	?>
	<div id="vikic_container-<?php echo $rand_id; ?>" class="vikicons-container container<?php if($get_box_dim == 1) { echo "-fluid"; } ?>">
		<?php if(!empty($get_textarea_above)) { ?>
		<div class="vikicons-topdesc"><?php echo $get_textarea_above; ?></div>
		<?php } ?>
		<div class="vikicons-inner container-fluid">
			<div class="vikicons-set d-flex flex-wrap <?php if($get_alignment == 0) { echo "vikicons-align-center"; } ?>">
			    <?php
			    if (is_array($arrslide)) {
					foreach($arrslide as $vsl) {
						echo "<div class=\"vikicons-item col-xs-6 col-md-".$get_paddingicon." vikicons-".$get_size." vikicons-".$get_style."\">";
							echo $vsl;
						echo "</div>";
					}
				}
				?>
			</div>
		</div>
	</div>
<?php } ?>

<script>
/** Add Class to widget container **/
jQuery(document).ready(function() {
	if ( jQuery('#vikic_container-<?php echo $rand_id; ?>').parents('.module').length ) {
		jQuery('#vikic_container-<?php echo $rand_id; ?>').parents('.module').addClass('<?php echo $get_class_suffix; ?>');
	} else {
		jQuery('#vikic_container-<?php echo $rand_id; ?>').parent('div').addClass('<?php echo $get_class_suffix; ?>');
	}
	
});
</script>