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

$number_of_speakers = array_key_exists('number_of_speakers', $instance) ? $instance['number_of_speakers'] : '';
$get_numb = array_key_exists('number_of_rows', $instance) ? $instance['number_of_rows'] : '';
$get_textarea_above = array_key_exists('textarea_above', $instance) ? $instance['textarea_above'] : '';
$itemwidth = (100/$number_of_speakers);

$first_height = 0;

if ($number_of_speakers > 0) {
	for ($i = 1; $i <= $number_of_speakers; $i++) { 
		$imgabpath = array_key_exists('spkr_' . $i . '_image', $instance) ? $instance['spkr_' . $i . '_image'] : "";
		$img_size = @getimagesize($imgabpath);
		$first_height = $img_size && !($first_height > 0) ? $img_size[1] : $first_height;
		$slider_entry = '<div id="viksp-inner" class="viksp-inner">';
		$slider_entry .= '<div class="viksp-divimg">';
			$slider_entry .= '<img class="viksp-img" src="'.$instance['spkr_' . $i . '_image'].'" alt="'.$instance['spkr_' . $i . '_nominative'].'"/>
							<span class="viksp-imgmasktwo"></span>';
							if(array_key_exists('spkr_' . $i . '_readmore', $instance) && !empty($instance['spkr_' . $i . '_readmore'])) { 
								$slider_entry .= '<a class="viksp-imgmask" href="'.$instance['spkr_' . $i . '_readmore'].'"></a>';
							} else {
								$slider_entry .= '<span class="viksp-imgmask"></span>';
							}
		$slider_entry .= '</div>';
		$slider_entry .= '<figcaption>';
		if(array_key_exists('spkr_' . $i . '_nominative', $instance) && !empty($instance['spkr_' . $i . '_nominative'])) {
			$slider_entry .= '	<div class="viksp-name"><span>'.$instance['spkr_' . $i . '_nominative'].'</span></div>';
		}
		if(array_key_exists('spkr_' . $i . '_role', $instance) && !empty($instance['spkr_' . $i . '_role'])) {
			$slider_entry .= '	<div class="viksp-job"><span>'.$instance['spkr_' . $i . '_role'].'</span></div>';
		}
		if(array_key_exists('spkr_' . $i . '_description', $instance) && !empty($instance['spkr_' . $i . '_description'])) {
			$slider_entry .= '	<div class="viksp-descr"><span>'.$instance['spkr_' . $i . '_description'].'</span></div>';
		}
		$slider_entry .= ' <div class="viksp-socials">';
			if(array_key_exists('spkr_' . $i . '_facebook', $instance) && !empty($instance['spkr_' . $i . '_facebook'])) {
				$slider_entry .= '	<span class="viksp-socials-link"><a href="'.$instance['spkr_' . $i . '_facebook'].'"><i class="fa fa-facebook"></i></a></span>';
			}
			if(array_key_exists('spkr_' . $i . '_twitter', $instance) && !empty($instance['spkr_' . $i . '_twitter'])) {
				$slider_entry .= '	<span class="viksp-socials-link viksp-socials-twitter"><a href="'.$instance['spkr_' . $i . '_twitter'].'" target="_blank"><i class="fa fa-twitter"></i></a></span>';
			}
			if(array_key_exists('spkr_' . $i . '_google', $instance) && !empty($instance['spkr_' . $i . '_google'])) {
				$slider_entry .= '	<span class="viksp-socials-link viksp-socials-google"><a href="'.$instance['spkr_' . $i . '_google'].'" target="_blank"><i class="fa fa-google-plus"></i></a></span>';
			}
			if(array_key_exists('spkr_' . $i . '_linkedin', $instance) && !empty($instance['spkr_' . $i . '_linkedin'])) {
				$slider_entry .= '	<span class="viksp-socials-link viksp-socials-linkedin"><a href="'.$instance['spkr_' . $i . '_linkedin'].'" target="_blank"><i class="fa fa-linkedin"></i></a></span>';
			}
		$slider_entry .= ' </div>';
			
		$slider_entry .= '</figcaption>'.
						'</div>';
		$arrslide[] = $slider_entry;
	}
}

?>
<div id="viksp_container" class="viksp_container">
	<?php if(!empty($get_textarea_above)) { ?>
	<div class="viksp_text"><?php echo $get_textarea_above; ?></div>
	<?php } ?>
    <?php
    if (is_array($arrslide)) {
		foreach($arrslide as $vsl) {
			echo "<figure class=\"viksp-speaker\" style=\"width:".$itemwidth."%;\">";
			echo $vsl;
			echo "</figure>";
		}
	}
	?>
</div>