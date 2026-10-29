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

$number_of_speakers = array_key_exists('number_of_speakers', $instance) ? (int) $instance['number_of_speakers'] : 0;
$get_numb = (array_key_exists('number_of_rows', $instance) && !empty($instance['number_of_rows'])) ? (int) $instance['number_of_rows'] : 1;
$get_textarea_above = array_key_exists('textarea_above', $instance) ? $instance['textarea_above'] : '';

$items_per_row = $get_numb > 0 ? ceil($number_of_speakers / $get_numb) : $number_of_speakers;
$itemwidth = $items_per_row > 0 ? (100 / $items_per_row) : 0;

// every value is escaped for the context it's printed in (attributes, URLs, HTML)
$speaker_value = function($i, $key) use ($instance) {
	$field = 'spkr_' . $i . '_' . $key;
	return array_key_exists($field, $instance) && is_scalar($instance[$field]) ? (string) $instance[$field] : '';
};

$speaker_socials = array(
	'facebook' => array('class' => '',                         'icon' => 'fa fa-facebook',    'target' => ''),
	'twitter'  => array('class' => ' viksp-socials-twitter',  'icon' => 'fa fa-twitter',     'target' => ' target="_blank"'),
	'google'   => array('class' => ' viksp-socials-google',   'icon' => 'fa fa-google-plus', 'target' => ' target="_blank"'),
	'linkedin' => array('class' => ' viksp-socials-linkedin', 'icon' => 'fa fa-linkedin',    'target' => ' target="_blank"'),
);

if ($number_of_speakers > 0) {
	for ($i = 1; $i <= $number_of_speakers; $i++) { 
		$nominative = $speaker_value($i, 'nominative');
		$readmore   = $speaker_value($i, 'readmore');
		$slider_entry = '<div id="viksp-inner" class="viksp-inner">';
		$slider_entry .= '<div class="viksp-divimg">';
			$slider_entry .= '<img class="viksp-img" src="'.esc_url($speaker_value($i, 'image')).'" alt="'.esc_attr(wp_strip_all_tags($nominative)).'"/>
							<span class="viksp-imgmasktwo"></span>';
							if (!empty($readmore)) { 
								$slider_entry .= '<a class="viksp-imgmask" href="'.esc_url($readmore).'"></a>';
							} else {
								$slider_entry .= '<span class="viksp-imgmask"></span>';
							}
		$slider_entry .= '</div>';
		$slider_entry .= '<figcaption>';
		if (!empty($nominative)) {
			$slider_entry .= '	<div class="viksp-name"><span>'.wp_kses_post($nominative).'</span></div>';
		}
		if ($role = $speaker_value($i, 'role')) {
			$slider_entry .= '	<div class="viksp-job"><span>'.wp_kses_post($role).'</span></div>';
		}
		if ($description = $speaker_value($i, 'description')) {
			$slider_entry .= '	<div class="viksp-descr"><span>'.wp_kses_post($description).'</span></div>';
		}
		$slider_entry .= ' <div class="viksp-socials">';
			foreach ($speaker_socials as $social => $social_data) {
				$social_url = $speaker_value($i, $social);
				if (!empty($social_url)) {
					$slider_entry .= '	<span class="viksp-socials-link'.$social_data['class'].'"><a href="'.esc_url($social_url).'"'.$social_data['target'].'><i class="'.$social_data['icon'].'"></i></a></span>';
				}
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
	<div class="viksp_text"><?php echo wp_kses_post($get_textarea_above); ?></div>
	<?php } ?>
    <?php
    if (is_array($arrslide)) {
		foreach($arrslide as $vsl) {
			echo "<figure class=\"viksp-speaker\" style=\"width:".(float) $itemwidth."%;\">";
			echo $vsl;
			echo "</figure>";
		}
	}
	?>
</div>