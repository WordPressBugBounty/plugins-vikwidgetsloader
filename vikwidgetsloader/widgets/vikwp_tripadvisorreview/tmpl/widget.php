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

$idhotel = array_key_exists('idhotel', $instance) ? $instance['idhotel'] : '0000';
$rewlimit = array_key_exists('rewlimit', $instance) ? $instance['rewlimit'] : 3;
$lantripadv = array_key_exists('lantripadv', $instance) ? $instance['lantripadv'] : 'en_US';
$urltrip = array_key_exists('urlwebsite', $instance) ? $instance['urlwebsite'] : '';
$get_widget = array_key_exists("typewidget", $instance) ? $instance["typewidget"] : 0;
$get_protocol = array_key_exists("httptype", $instance) ? $instance["httptype"] : 'http';

$idwidget = rand(0,100);

if (array_key_exists('writereview', $instance) && $instance['writereview'] == '1') {
		$writerev = "true";	
} else {
	$writerev = "false";
}

if (array_key_exists('popularity', $instance) && $instance['popularity'] == '1') {
		$valuepop = "true";	
} else {
	$valuepop = "false";
}

if (array_key_exists('rating', $instance) && $instance['rating'] == '1') {
		$valuerating = "true";	
} else {
	$valuerating = "false";
}

if (array_key_exists('border', $instance) && $instance['border'] == '1') {
		$borderbox = "true";	
} else {
	$borderbox = "false";
}

if (array_key_exists('size_thumb', $instance) && $instance['size_thumb'] == '1') {
		$get_sizethumb = "cdsratingsonlynarrow";	
} else {
	$get_sizethumb = "cdsratingsonlywide";
}

?>
<?php 
// Review Snippets
if($get_widget == 0) { ?>
	<div id="TA_selfserveprop<?php echo $idwidget;?>" class="viktacnt TA_selfserveprop">
		<ul id="LN6IRZ9U5XGS" class="TA_links SHjeWmHcfsW">
		<li id="RudzFvi1Yl" class="6zFmqoPKmoWs"> 
			<a target="_blank" href="<?php echo $urltrip; ?>"></a> 
		</li>
		</ul>
	</div>
	<?php if($get_protocol == 1) { ?>
		<script src="http://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=<?php echo $idwidget;?>&amp;locationId=<?php echo $idhotel;?>&amp;lang=<?php echo $lantripadv;?>&amp;rating=<?php echo $valuerating;?>&amp;nreviews=<?php echo $rewlimit;?>&amp;writereviewlink=<?php echo $writerev;?>&amp;popIdx=<?php echo $valuepop;?>&amp;iswide=false&amp;border=<?php echo $borderbox;?>"></script>
	<?php } else { ?>
		<script src="https://www.tripadvisor.com/WidgetEmbed-selfserveprop&amp;uniq=<?php echo $idwidget;?>&amp;locationId=<?php echo $idhotel;?>&amp;lang=<?php echo $lantripadv;?>&amp;rating=<?php echo $valuerating;?>&amp;nreviews=<?php echo $rewlimit;?>&amp;writereviewlink=<?php echo $writerev;?>&amp;popIdx=<?php echo $valuepop;?>&amp;iswide=false&amp;border=<?php echo $borderbox;?>&display_version=2"></script>
	<?php }
} 

// Rating Widget
if($get_widget == 1) { ?>
<div id="TA_<?php echo $get_sizethumb; echo $idwidget;?>" class="viktacnt TA_<?php echo $get_sizethumb; ?>">
		<ul id="2CAT8mMs" class="TA_links 6xcDY7iKP">
		<li id="hXkJDj8Jl" class="aMdZRlVzVUm">
			<a target="_blank" href="http://www.tripadvisor.com/"><img src="http://www.tripadvisor.com/img/cdsi/img2/branding/tripadvisor_logo_transp_340x80-18034-2.png" alt="TripAdvisor"/></a>
		</li>
		</ul>
	</div>
	<?php if($get_protocol == 1) { ?>
		<script src="http://www.jscache.com/wejs?wtype=<?php echo $get_sizethumb;?>&amp;uniq=<?php echo $idwidget;?>&amp;locationId=<?php echo $idhotel;?>&amp;lang=<?php echo $lantripadv;?>&amp;border=<?php echo $borderbox;?>&amp;shadow=false&amp;langversion=2"></script>
	<?php } else { ?>
		<script src="https://www.tripadvisor.com/WidgetEmbed-<?php echo $get_sizethumb;?>&amp;uniq=<?php echo $idwidget;?>&amp;locationId=<?php echo $idhotel;?>&amp;lang=<?php echo $lantripadv;?>&amp;border=<?php echo $borderbox;?>&amp;shadow=false&amp;langversion=2"></script>
	<?php }
}

//Thumbs Up Badge
if($get_widget == 2) { ?>
<div id="TA_percentRecommended<?php echo $idwidget;?>" class="viktacnt TA_percentRecommended">
		<ul id="Lp3Kish7f" class="TA_links l2UCWy">
		<li id="0rPO2P2" class="mKgHKjr3c9">
			<a target="_blank" href="http://www.tripadvisor.com/"><img src="http://www.tripadvisor.com/img2/widget/logo_shadow_109x26.png" alt="TripAdvisor" class="widPERIMG" id="CDSWIDPERLOGO"/></a>
		</li>
		</ul>
	</div>
	<?php if($get_protocol == 1) { ?>
		<script src="http://www.jscache.com/wejs?wtype=percentRecommended&amp;uniq=<?php echo $idwidget;?>&amp;locationId=<?php echo $idhotel;?>&amp;lang=<?php echo $lantripadv;?>&amp;border=<?php echo $borderbox;?>&amp;backgroundColor=white&amp;langversion=2"></script>
	<?php } else { ?>
		<script src="https://www.tripadvisor.com/WidgetEmbed-percentRecommended&amp;uniq=<?php echo $idwidget;?>&amp;locationId=<?php echo $idhotel;?>&amp;lang=<?php echo $lantripadv;?>&amp;border=<?php echo $borderbox;?>&amp;backgroundColor=white&amp;langversion=2"></script>
	<?php }
}

//Rated on Widget
if($get_widget == 3) { ?>
	<div id="TA_rated<?php echo $idwidget;?>" class="viktacnt TA_rated">
		<ul id="fshdIzprKh" class="TA_links HcEasTUH4o4j">
		<li id="0rQrK8" class="NDVG8kH5G6S2">
			<a target="_blank" href="http://www.tripadvisor.com/"><img src="http://www.tripadvisor.com/img/cdsi/img2/badges/recommended_en-11424-2.gif" alt="TripAdvisor"/></a>
		</li>
		</ul>
	</div>
	<?php if($get_protocol == 1) { ?>
		<script src="http://www.jscache.com/wejs?wtype=rated&amp;uniq=<?php echo $idwidget;?>&amp;locationId=<?php echo $idhotel;?>&amp;lang=<?php echo $lantripadv;?>&amp;langversion=2"></script>
	<?php } else { ?>
		<script src="https://www.tripadvisor.com/WidgetEmbed-rated&amp;uniq=<?php echo $idwidget;?>&amp;locationId=<?php echo $idhotel;?>&amp;lang=<?php echo $lantripadv;?>&amp;langversion=2"></script>
	<?php }
}

//Bravo Widget
if($get_widget == 4) { ?>
	<div id="TA_excellent<?php echo $idwidget;?>" class="viktacnt TA_excellent">
	<ul id="GL2TA2Qt" class="TA_links gwHvH7hV3c">
		<li id="YGJUoyPcJcwd" class="Fl1cJfnW">
			<a target="_blank" href="http://www.tripadvisor.com/"><img src="http://c1.tacdn.com/img2/widget/tripadvisor_logo_115x18.gif" alt="TripAdvisor" class="widEXCIMG" id="CDSWIDEXCLOGO"/></a>
		</li>
		</ul>
	</div>
	<?php if($get_protocol == 1) { ?>
		<script src="http://www.jscache.com/wejs?wtype=excellent&amp;uniq=<?php echo $idwidget;?>&amp;locationId=<?php echo $idhotel;?>&amp;lang=<?php echo $lantripadv;?>&amp;langversion=2"></script>
	<?php } else { ?>
		<script src="https://www.tripadvisor.com/WidgetEmbed-excellent&amp;uniq=<?php echo $idwidget;?>&amp;locationId=<?php echo $idhotel;?>&amp;lang=<?php echo $lantripadv;?>&amp;langversion=2"></script>
<?php }
}

//Tripadvisor Widget
if($get_widget == 5) { ?>
	<div id="TA_linkingWidgetRedesign<?php echo $idwidget;?>" class="viktacnt TA_linkingWidgetRedesign">
		<ul id="Jd9PN08" class="TA_links TBABzoEhz9zm">
		<li id="MAtZky" class="PYkXvf">
			<a target="_blank" href="http://www.tripadvisor.com/"><img src="http://www.tripadvisor.com/img/cdsi/partner/tripadvisor_logo_115x18-15079-2.gif" alt="TripAdvisor"/></a>
		</li>
		</ul>
	</div>
	<?php if($get_protocol == 1) { ?>
		<script src="http://www.jscache.com/wejs?wtype=linkingWidgetRedesign&amp;uniq=<?php echo $idwidget;?>&amp;locationId=<?php echo $idhotel;?>&amp;lang=<?php echo $lantripadv;?>&amp;border=<?php echo $borderbox;?>&amp;langversion=2"></script>
	<?php } else { ?>
		<script src="https://www.tripadvisor.com/WidgetEmbed-linkingWidgetRedesign&amp;uniq=<?php echo $idwidget;?>&amp;locationId=<?php echo $idhotel;?>&amp;lang=<?php echo $lantripadv;?>&amp;border=<?php echo $borderbox;?>&amp;langversion=2"></script>
<?php }
}
