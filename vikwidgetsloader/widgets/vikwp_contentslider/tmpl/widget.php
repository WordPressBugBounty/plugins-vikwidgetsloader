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

$arrslide = [];

$number = $this->number;

$getfont = $instance['font'];
switch ($getfont) {
	case 0:
		echo '';
	break;
	case 1:
		echo '<link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Lato:400,700,30" type="text/css" media="all"/>';
		$slidefont = "Lato";
	break;
	case 2:
		echo '<link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Roboto:400,500,300" type="text/css" media="all"/>';
		$slidefont = "Roboto";
	break;
	case 3:
		echo '<link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Oswald:400,300,700" type="text/css" media="all"/>';
		$slidefont = "Oswald";
	break;
	case 4:
		echo '<link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Convergence" type="text/css" media="all"/>';
		$slidefont = "Convergence";
	break;
}

$get_align = $instance['textalign'];
$dotsnav = $instance['dotsnav'];

$viksliderid = rand(1, 17);
$autoplay = $instance['autoplay'];
$interval = $instance['interval'];
$navigation = $instance['navigation'];
$readmtext = $instance['readmoretext'];

if($getfont > 0) {
	$css_style = "";
	$css_style .=".vikcs-slider-".$number." h2, .vikcs-slider-".$number." .slide-text {font-family:\"".$slidefont."\";}";
	echo "<style>".$css_style."</style>";
} 

$first_read = true;

$navenable = intval($navigation) == 1 ? true : false;
$autoplaygo = intval($autoplay) == 1 ? '1' : '0';
//$textbackval = intval($textbackgr) == 1 ? " bckgr-text" : '';
$height = $instance['height'];
if(empty($height)) {
	$height = 0;
}

$number_of_slides = $instance['number_of_slides'];

//$slidejstr = $instance['viksliderimages'] '[]');
//$slides = json_decode($slidejstr);
if ($number_of_slides) {
	for ($i = 0; $i <= $number_of_slides; $i++) { 
		if (empty($instance['slideimage_' . $i]) || (int)$instance['slidepublished_' . $i] < 1) {
			continue;
		}
		$imgabpath = $instance['slideimage_' . $i];
		$slider_entry = '<div class="item'.($first_read ? ' active' : '').'">';
			$slider_entry .= '<img class="slide-image vikcs-img-bckground-'.$number.'" src="'.$imgabpath.'" alt="'.$instance['slidetitle_' . $i].'"/>';
			$slider_entry .= '<div class="bs-slider-overlay"></div>';
				
			$slider_entry .= '<div class="container">'; //Start - Container
				$slider_entry .= '<div class="row">'; //Start - Row
					$slider_entry .= '<div class="slide-text slide_style_'.$get_align.'">'; //Start - slide-text
					
						if(!empty($instance['slidetitle_' . $i])) {
							$slider_entry .= '	<h2 data-animation="animated '.$instance['title_effect'].'">'.$instance['slidetitle_' . $i].'</h2>';
						}
						$slider_entry .= '<p data-animation="animated '.$instance['desc_effect'].'">';
							if(!empty($instance['slidecaption_' . $i])) {
								$slider_entry .= '<span class="vikcs-desc">'.$instance['slidecaption_' . $i].'</span>';
							}
						$slider_entry .= '</p>';
						if(!empty($instance['slidereadmore_' . $i])) {
							$slider_entry .= '<a href="'.$instance['slidereadmore_' . $i].'" target="_blank" class="btn btn-default" data-animation="animated '.$instance['readmore_effect'].'">'.$readmtext.'</a>';
						}

					$slider_entry .= '</div>'; //End - slide-text
				$slider_entry .= '</div>'; //End - Row
			$slider_entry .= '</div>'; //End - Container
		$slider_entry .= '</div>';
		$first_read = false;
		$arrslide[] = $slider_entry;
	}
}
	echo '<div id="bootstrap-touch-slider" class="carousel bs-slider fade control-round indicators-line vikcs-slider-'.$number.'" data-ride="carousel" data-pause="hover" data-interval="5000">';
?>

	<!-- Indicators -->
	<?php if($dotsnav == 'yes') { ?>
	    <ol class="carousel-indicators">
	    	<?php for ($i = 0; $i < $number_of_slides; $i++) {  ?>
	        	<li data-target="#bootstrap-touch-slider" data-slide-to="<?php echo $i; ?>" class="<?php ($first_read ? ' active' : ''); ?>"></li>
	        <?php } ?>
	    </ol>
    <?php } ?>
    <!-- Wrapper For Slides -->
    <div class="carousel-inner" role="listbox">
		<?php 
	    if (is_array($arrslide)) {
			foreach($arrslide as $vsl) {
				echo $vsl;
			}
		}
		?>
	</div>

	<!-- Left Control -->
	<?php if($navenable === true) { ?>
	    <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
	        <span class="fa fa-angle-left" aria-hidden="true"></span>
	        <span class="sr-only">Previous</span>
	    </a>

	    <!-- Right Control -->
	    <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
	        <span class="fa fa-angle-right" aria-hidden="true"></span>
	        <span class="sr-only">Next</span>
	    </a>
	<?php } ?>
</div>
<script type="text/javascript">
    jQuery(document).ready(function() {
    	jQuery('#bootstrap-touch-slider').bsTouchSlider();
    });
</script>

