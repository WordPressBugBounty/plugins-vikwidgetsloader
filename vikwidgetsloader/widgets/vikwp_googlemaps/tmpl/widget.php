<?php
/**
 * @package     VikWidgetsLoader
 * @subpackage  widget
 * @author      E4J s.r.l.
 * @copyright   Copyright (C) 2018 E4J s.r.l. All Rights Reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://vikwp.com
 */

$mapstyles = array(
	/* Default */		"[{\"featureType\": \"landscape.natural.landcover\", \"elementType\": \"geometry\"}]",
	/* Grayscale */		"[{\"featureType\":\"landscape\",\"stylers\":[{\"saturation\":-100},{\"lightness\":65},{\"visibility\":\"on\"}]},{\"featureType\":\"poi\",\"stylers\":[{\"saturation\":-100},{\"lightness\":51},{\"visibility\":\"simplified\"}]},{\"featureType\":\"road.highway\",\"stylers\":[{\"saturation\":-100},{\"visibility\":\"simplified\"}]},{\"featureType\":\"road.arterial\",\"stylers\":[{\"saturation\":-100},{\"lightness\":30},{\"visibility\":\"on\"}]},{\"featureType\":\"road.local\",\"stylers\":[{\"saturation\":-100},{\"lightness\":40},{\"visibility\":\"on\"}]},{\"featureType\":\"transit\",\"stylers\":[{\"saturation\":-100},{\"visibility\":\"simplified\"}]},{\"featureType\":\"administrative.province\",\"stylers\":[{\"visibility\":\"off\"}]},{\"featureType\":\"water\",\"elementType\":\"labels\",\"stylers\":[{\"visibility\":\"on\"},{\"lightness\":-25},{\"saturation\":-100}]},{\"featureType\":\"water\",\"elementType\":\"geometry\",\"stylers\":[{\"hue\":\"#ffff00\"},{\"lightness\":-25},{\"saturation\":-97}]}]",
	/* Midnight */		"[{\"featureType\":\"water\",\"stylers\":[{\"color\":\"#021019\"}]},{\"featureType\":\"landscape\",\"stylers\":[{\"color\":\"#08304b\"}]},{\"featureType\":\"poi\",\"elementType\":\"geometry\",\"stylers\":[{\"color\":\"#0c4152\"},{\"lightness\":5}]},{\"featureType\":\"road.highway\",\"elementType\":\"geometry.fill\",\"stylers\":[{\"color\":\"#000000\"}]},{\"featureType\":\"road.highway\",\"elementType\":\"geometry.stroke\",\"stylers\":[{\"color\":\"#0b434f\"},{\"lightness\":25}]},{\"featureType\":\"road.arterial\",\"elementType\":\"geometry.fill\",\"stylers\":[{\"color\":\"#000000\"}]},{\"featureType\":\"road.arterial\",\"elementType\":\"geometry.stroke\",\"stylers\":[{\"color\":\"#0b3d51\"},{\"lightness\":16}]},{\"featureType\":\"road.local\",\"elementType\":\"geometry\",\"stylers\":[{\"color\":\"#000000\"}]},{\"elementType\":\"labels.text.fill\",\"stylers\":[{\"color\":\"#ffffff\"}]},{\"elementType\":\"labels.text.stroke\",\"stylers\":[{\"color\":\"#000000\"},{\"lightness\":13}]},{\"featureType\":\"transit\",\"stylers\":[{\"color\":\"#146474\"}]},{\"featureType\":\"administrative\",\"elementType\":\"geometry.fill\",\"stylers\":[{\"color\":\"#000000\"}]},{\"featureType\":\"administrative\",\"elementType\":\"geometry.stroke\",\"stylers\":[{\"color\":\"#144b53\"},{\"lightness\":14},{\"weight\":1.4}]}]",
	/* Blue Essence */	"[{\"featureType\":\"landscape.natural\",\"elementType\":\"geometry.fill\",\"stylers\":[{\"visibility\":\"on\"},{\"color\":\"#e0efef\"}]},{\"featureType\":\"poi\",\"elementType\":\"geometry.fill\",\"stylers\":[{\"visibility\":\"on\"},{\"hue\":\"#1900ff\"},{\"color\":\"#c0e8e8\"}]},{\"featureType\":\"landscape.man_made\",\"elementType\":\"geometry.fill\"},{\"featureType\":\"road\",\"elementType\":\"geometry\",\"stylers\":[{\"lightness\":100},{\"visibility\":\"simplified\"}]},{\"featureType\":\"road\",\"elementType\":\"labels\",\"stylers\":[{\"visibility\":\"off\"}]},{\"featureType\":\"water\",\"stylers\":[{\"color\":\"#7dcdcd\"}]},{\"featureType\":\"transit.line\",\"elementType\":\"geometry\",\"stylers\":[{\"visibility\":\"on\"},{\"lightness\":700}]}]",
	/* Nature */		"[{\"featureType\":\"landscape\",\"stylers\":[{\"hue\":\"#FFA800\"},{\"saturation\":0},{\"lightness\":0},{\"gamma\":1}]},{\"featureType\":\"road.highway\",\"stylers\":[{\"hue\":\"#53FF00\"},{\"saturation\":-73},{\"lightness\":40},{\"gamma\":1}]},{\"featureType\":\"road.arterial\",\"stylers\":[{\"hue\":\"#FBFF00\"},{\"saturation\":0},{\"lightness\":0},{\"gamma\":1}]},{\"featureType\":\"road.local\",\"stylers\":[{\"hue\":\"#00FFFD\"},{\"saturation\":0},{\"lightness\":30},{\"gamma\":1}]},{\"featureType\":\"water\",\"stylers\":[{\"hue\":\"#00BFFF\"},{\"saturation\":6},{\"lightness\":8},{\"gamma\":1}]},{\"featureType\":\"poi\",\"stylers\":[{\"hue\":\"#679714\"},{\"saturation\":33.4},{\"lightness\":-25.4},{\"gamma\":1}]}]"
);

$arrmap = array();
$alllats = array();
$alllngs = array();
$apikeygm = $instance['apikey'];

$vikgooglemapsid = rand(1, 17);
$width = $instance['width'];
$width = empty($width) ? '100%' : $width;
$height = $instance['height'];
$height = empty($height) ? '200px' : $height;

$shadowpointleft = $instance['shadowpoint_left'];
$shadowpointright = $instance['shadowpoint_right'];

$getmapstyle = $mapstyles[$instance['map_style']];

$get_textarea_above = array_key_exists('contact_textarea_above', $instance) ? $instance['contact_textarea_above'] : "";
$get_textarea_under = array_key_exists('contact_textarea_under', $instance) ? $instance['contact_textarea_under'] : "";
$get_cnt_address = array_key_exists('contact_address', $instance) ? $instance['contact_address'] : "";
$get_cnt_email = array_key_exists('contact_email', $instance) ? $instance['contact_email'] : "";
$get_cnt_telephone = array_key_exists('contact_tel', $instance) ? $instance['contact_tel'] : "";
$get_cnt_enabled = array_key_exists('contact_enabled', $instance) ? $instance['contact_enabled'] : "";
$get_cnt_title = array_key_exists('contact_header', $instance) ? $instance['contact_header'] : "";

$cnt = '';
$cnt .= '<div class="vikgm_cnt_container"><div class="vikgm_cnt_inner">';
if(!empty($get_cnt_title)) {
	$cnt .= '<div class="vikgm_cnt_item vikgm_cnt_title"><h3>'.$get_cnt_title.'</h3></div>';
}
if(!empty($get_textarea_above)) {
	$cnt .= '<div class="vikgm_cnt_item vikgm_cnt_textone">'.$get_textarea_above.'</div>';
}
if(!empty($get_cnt_address)) {
	$cnt .= '<div class="vikgm_cnt_det vikgm_cnt_address"><i class="fa fa-map-marker"></i> <span>'.$get_cnt_address.'</span></div>';
}
if(!empty($get_cnt_email)) {
	$cnt .= '<div class="vikgm_cnt_det vikgm_cnt_email"><i class="fa fa-envelope"></i> <span>'.$get_cnt_email.'</span></div>';
}
if(!empty($get_cnt_telephone)) {
	$cnt .= '<div class="vikgm_cnt_det vikgm_cnt_tel"><i class="fa fa-phone"></i> <span>'.$get_cnt_telephone.'</span></div>';
}
if(!empty($get_textarea_under)) {
	$cnt .= '<div class="vikgm_cnt_item vikgm_cnt_texttwo">'.$get_textarea_under.'</div>';
}
$cnt .= '</div></div>';

$stylesize = '';
if (!empty($width) && !empty($height)) {
	$stylesize .= 'style="width: '.$width.'; height: '.$height.';"';
}else {
	$stylesize .= 'style="width: 100%; height: 200px;"';
}

$markers_amount = $instance['markers_amount'];

if (!empty($markers_amount)) {
	for($v = 1; $v <= $instance['markers_amount']; $v++) {
		if (array_key_exists('viktitle_'.$v, $instance)) {
			$gettitle = $instance['viktitle_'.$v];
			$getlat = $instance['viklat_'.$v];
			$getlng = $instance['viklng_'.$v];
			$gettext = $instance['viktext_'.$v];
			$getshape = $instance['vikshape_'.$v];
			$getshadow = $instance['vikshadow_'.$v];
			if (!empty($getlat) && !empty($getlng)) {
				$arrmap[$v]['latitude'] = $getlat;
				$alllats[] = $getlat;
				$arrmap[$v]['longitude'] = $getlng;
				$alllngs[] = $getlng;
				$arrmap[$v]['title'] = $gettitle;
				$arrmap[$v]['text'] = $gettext;
				$arrmap[$v]['shape'] = $getshape;
				$arrmap[$v]['shadow'] = $getshadow;
			}
		}
	}
}

echo "<!-- Init VikGoogleMaps https://vikwp.com -->	";	?>

	<?php
	//Vale completa o cambia qua e poi togli il commento!:
	$def_zoom = $instance['map_zoom'];
	$def_center_lat = $instance['center_lat'];
	$def_center_lng = $instance['center_lng'];
	//
	if ($apikeygm != "") { ?>
		<script src="https://maps.google.com/maps/api/js?key=<?php echo $apikeygm;?>"></script>
	<?php } else { ?>
		<script src="https://maps.google.com/maps/api/js"></script>
	<?php }
	if(@count($arrmap) > 0) {
		?>
		<script language="JavaScript" type="text/javascript">
		jQuery.noConflict();
		jQuery(document).ready(function(){
			var map = new google.maps.Map(document.getElementById("vikgooglemaps_<?php echo $vikgooglemapsid; ?>"), {<?php echo (!empty($def_zoom) ? 'zoom: '.intval($def_zoom).', ' : '').(!empty($def_center_lat) && !empty($def_center_lng) ? 'center: new google.maps.LatLng('.number_format((float)$def_center_lat, 2, '.',',').', '.number_format((float)$def_center_lng, 2, '.',',').'), ' : ''); ?>mapTypeId: google.maps.MapTypeId.ROADMAP, scrollwheel: false, styles:<?php echo $getmapstyle; ?>});
		<?php
		foreach($arrmap as $k => $v) {
		?>	
			var marker<?php echo $k; ?> = new google.maps.Marker({
				position: new google.maps.LatLng(<?php echo $v['latitude']; ?>, <?php echo $v['longitude']; ?>),
				map: map,
				title: '<?php echo addslashes($v['title']); ?>'
				<?php
				if(!empty($v['shape'])) {
					?>
				,icon: '<?php echo $v['shape']; ?>'	
					<?php
				}
				if(!empty($v['shadow'])) {
					?>
				,shadow: {url: '<?php echo $v['shadow'];?>', anchor: new google.maps.Point(<?php echo $shadowpointleft; ?>, <?php echo $shadowpointright; ?>)}	
					<?php
				}
				?>
			});	
			<?php
			if(!empty($v['text'])) {
			?>
				var tooltip<?php echo $k; ?> = '<div class="vikgmapinfow"><h3><?php echo addslashes($v['title']); ?></h3><?php echo addslashes(preg_replace('/\s\s+/', ' ', $v['text'])); ?></div>';
				var infowindow<?php echo $k; ?> = new google.maps.InfoWindow({
					content: tooltip<?php echo $k; ?>
				});
				google.maps.event.addListener(marker<?php echo $k; ?>, 'click', function() {
					infowindow<?php echo $k; ?>.open(map, marker<?php echo $k; ?>);
				});
			<?php
			}
			?>
		<?php
		}
		?>
			var lat_min = <?php echo min($alllats); ?>;
			var lat_max = <?php echo max($alllats); ?>;
			var lng_min = <?php echo min($alllngs); ?>;
			var lng_max = <?php echo max($alllngs); ?>;
			<?php
			if(empty($def_zoom)) {
			?>
			map.setCenter(new google.maps.LatLng( ((lat_max + lat_min) / 2.0), ((lng_max + lng_min) / 2.0) ));
			map.fitBounds(new google.maps.LatLngBounds(new google.maps.LatLng(lat_min, lng_min), new google.maps.LatLng(lat_max, lng_max)));
			<?php
			}
			?>
		});
		</script>
		<?php
	}
	?>

<?php ?>
<div class="vikgooglemapscontainer <?php echo isset($instance['contact_position']) ? $instance['contact_position'] : '' ; ?>">
	<?php if($get_cnt_enabled == 1) { echo $cnt; } ?>
	<div class="vikgooglemaps_content">	
		<div id="vikgooglemaps_<?php echo $vikgooglemapsid; ?>" <?php echo $stylesize; ?>></div>
	</div>
</div>