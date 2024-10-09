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

$title 				= apply_filters( 'widget_title', $instance['title'] );
$get_class_suffix 	= $instance['class_suffix'];
$get_title_effect 	= $instance['title_effect'];
$get_desc_effect 	= $instance['desc_effect'];
$get_sentence_layout = $instance['testimonials_layout'];
//$enable_testimonials = (isset($instance['testimonials']));
$enable_testimonials = array_key_exists('testimonials', $instance) ? $instance['testimonials'] : '';
$get_enable_testimonials = isset($enable_testimonials) && intval($enable_testimonials) == 1 ? "true" : "false";

//$get_sentence_layout = (isset($instance['testimonials_layout']));
$get_opacity_mask = (isset($instance['opacity_mask']) && !empty($instance['opacity_mask']) ? $instance['opacity_mask'] : '' );
$get_image_type	= (isset($instance['image_type']) && !empty($instance['image_type']) ? $instance['image_type'] : 'scroll' );
$get_textarea = (isset($instance['textarea']) && !empty($instance['textarea']) ? $instance['textarea'] : '' );

$get_img_bg			= (isset($instance['image']) && !empty($instance['image']) ? $instance['image'] : '');
$get_testimonial_post_title = $instance['testimonial_post_title'];

// Fade
$get_width 			= $instance['testimonial_box_width'];
$get_height  = array_key_exists('testimonial_box_height', $instance) ? $instance['testimonial_box_height'] : '';
$get_color_title = (isset($instance['testimonial_title_color']) && !empty($instance['testimonial_title_color']) ? $instance['testimonial_title_color'] : '#ffffff' );
$get_color_desc = (isset($instance['testimonial_title_color']) && !empty($instance['testimonial_title_color']) ? $instance['testimonial_title_color'] : '#ffffff' );

$get_quotes 		= $instance['quotes'];
$get_delay 			= $instance['testimonial_time_delay'];
$get_fadein 		= $instance['testimonial_time_fadein'];
$get_fadeout 		= $instance['testimonial_time_fadeout'];

// Carousel
$get_img_position 	= $instance['testimonials_img_pos'];
$numb_xrow 			= (isset($instance['testimonials_xrow']) && !empty($instance['testimonials_xrow']) ? $instance['testimonials_xrow'] : '' );

$autoplayparam = (isset($instance['testimonials_autoplay']) && !empty($instance['testimonials_autoplay']) ? $instance['testimonials_autoplay'] : '0' );
$autoplayparam_values = intval($autoplayparam) == 1 ? "true" : "false";

$pagination 		= (isset($instance['testimonials_dots']));
$pagination_values 	= intval($pagination) == 1 ? "true" : "false";

$navigation 		= (isset($instance['testimonials_arrows']));
$navigation_values 	= intval($navigation) == 1 ? "true" : "false";

global $post;
$cat_id = isset($instance['ts_category_id']) ? $instance['ts_category_id'] : null;
$pdet = array('posts_per_page' => -1, 'offset'=> 1, 'category' => $cat_id);
$myposts = get_posts( $pdet );

$rand_numb = rand(0, 15);

?>
<div id="vikwp_ts-<?php echo $rand_numb; ?>" class="vikwp_ts-container">

	<div class="vikwp_ts-inner vikwp_ts-image-<?php echo $get_image_type; ?> <?php echo ( empty( $get_img_bg ) ) ? 'vikqt_nobg' : 'vikqt_bg'; ?>" style="background-image:url(<?php echo $get_img_bg; ?>);">
		<?php if($instance['enable_mask'] == 1) { ?>
			<div class="vikwp_ts-mask" style="opacity: <?php echo $get_opacity_mask?>;"></div>
		<?php } ?>
			<?php if(isset($instance['testimonials']) && $instance['testimonials'] == 1) { 
				if($get_sentence_layout == 0) { ?>
					<div class="vikqt-container vikqt-list-l">
						<?php
						if(!empty($get_textarea)) { ?>
							<div class="vikqt_box_desc">
								<?php echo $get_textarea; ?>
							</div>
						<?php } ?>
						<div class="vikqt-slide" style="width:<?php echo $get_width; ?>; height: <?php echo $get_height; ?>px;">
						<?php 
						foreach ( $myposts as $post ) : setup_postdata( $post ); 
							$descTestimonial = get_the_content();
							$titleTestimonial = get_the_title();
							$imgTestimonial = get_the_post_thumbnail_url(get_the_ID(),'medium-square');
							?>
							<div class="vikqt_box vikqt-item-fade vikqt-item-lay_<?php echo $get_img_position; ?>">
								<?php 
								if($get_img_position == "up" || $get_img_position == "down") {
									if( $get_testimonial_post_title == 1 ) { ?>
										<div class="vikqt_title" style="<?php echo ( !empty( $get_color_title ) ) ? 'color:'.$get_color_title.';' : ''; ?>"><?php echo $titleTestimonial ?></div>
									<?php 
									}
								} ?>
										<div class="vikqt-item-content vikqt-item-img_<?php echo $get_img_position; ?>">
											<?php if(!empty($imgTestimonial)) { ?>
												<div class="vikqt_image"><img src="<?php echo $imgTestimonial; ?>" alt="<?php echo $titleTestimonial; ?>" /></div>
											<?php } ?>
												<div class="vikqt_text_cont">
													<?php if($get_quotes == 1) { ?>
														<div class="vikqt-quotes">
															<i class="fas fa-quote-left"></i>
														</div>
													<?php } ?>
													<?php if(!empty($descTestimonial)) { ?>
														<div class="vikqt_desc" style="color: <?php echo $get_color_desc; ?>;">
															<?php echo $descTestimonial ?>
															<?php if($get_img_position == "right" || $get_img_position == "left") {
																	if(!empty($titleTestimonial)) { ?>
																	<div class="vikqt_title" style="<?php echo ( !empty( $get_color_title ) ) ? 'color:'.$get_color_title.';' : ''; ?>"><?php echo $titleTestimonial; ?></div>
															<?php }
															} ?>
														</div>
													<?php } ?>
												</div>
											</div>
										</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php } else { ?>
					<div class="vikqt-container vikqt-grid-l container" style="width:<?php echo $get_width; ?>;">
						<?php
						if(!empty($get_textarea)) { ?>
							<div class="vikqt_box_desc">
								<?php echo $get_textarea; ?>
							</div>
						<?php } ?>
						<div id="vikqt-inner" class="owl-carousel vikqt-items row-fluid">	
						<?php foreach ( $myposts as $post ) : setup_postdata( $post );
							$descTestimonial = get_the_content();
							$titleTestimonial = get_the_title();
							$imgTestimonial = get_the_post_thumbnail_url(get_the_ID(),'medium-square');
						 	?>
							<div class="vikqt_box vikqt-item-grid vikqt-item-lay_<?php echo $get_img_position; ?>">
								<div class="vikqt-item-content vikqt-item-img_<?php echo $get_img_position; ?>">
									<?php if(!empty($imgTestimonial)) { ?>
										<div class="vikqt_image"><img src="<?php echo $imgTestimonial; ?>" alt="<?php echo $titleTestimonial; ?>" /></div>
									<?php } ?>
										<div class="vikqt_text_cont">
										<?php if($get_quotes == 1) { ?>
											<div class="vikqt-quotes"><i class="fas fa-quote-left"></i></div>
										<?php } ?>
										<?php if(!empty($descTestimonial)) { ?>
											<div class="vikqt_desc">
												<?php 
												echo $descTestimonial; 
												if($get_img_position == "right" || $get_img_position == "left") {
													if(!empty($titleTestimonial)) { ?>
													<div class="vikqt_title" style="<?php echo ( !empty( $get_color_title ) ) ? 'color:'.$get_color_title.';' : ''; ?>"><?php echo $titleTestimonial; ?></div>
												<?php }
												} 
												?>
											</div>
										<?php } ?>
										</div>
									</div>
								<?php if($get_img_position == "up" || $get_img_position == "down") {
									if( $get_testimonial_post_title == 1 ) { ?>
									<div class="vikqt_title" style="<?php echo ( !empty( $get_color_title ) ) ? 'color:'.$get_color_title.';' : ''; ?>"> <?php echo $titleTestimonial; ?></div>
								<?php }
								} ?>
							</div>
						<?php endforeach; ?>
						</div>
					</div>			
				<?php 
				}

			} else { ?>
			<div class="vikwp_ts-layone">
				<?php if(!empty($instance['title_image'])) { ?>
					<h3 class="vikwp_ts-title animated <?php echo $get_title_effect; ?>" style="<?php echo ( !empty( $get_color_title ) ) ? 'color:'.$get_color_desc.';' : ''; ?>"><?php echo $instance['title_image']; ?></h3>
				<?php } ?>
		
				<?php if(!empty($instance['textarea'])) { ?>
				<div class="vikwp_ts-desc animated <?php echo $get_desc_effect; ?>">
					<div class="vikwp_ts-desc-inner" style="<?php echo ( !empty( $get_color_desc ) ) ? 'color:'.$get_color_desc.';' : ''; ?>">
						<?php echo $instance['textarea']; ?>
					</div>
				</div>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>

<?php
/*
 * If the Testimonial are enabled.
 */
	if($get_sentence_layout == "0") { ?>
		<script language="JavaScript" type="text/javascript">
			jQuery(function($) {
			(function() {

		    var quotes = $(".vikqt_box");
		    var quoteIndex = -1;
		    
		    function showNextQuote() {
		        ++quoteIndex;
		        quotes.eq(quoteIndex % quotes.length)
		            .fadeIn(<?php echo $get_delay; ?>)
		            .delay(<?php echo $get_fadein; ?>)
		            .fadeOut(<?php echo $get_fadeout; ?>, showNextQuote);
		    }
		    
		    showNextQuote();
		    
		})() 
		});
		</script>
	<?php } else { ?>
		<script type="text/javascript">
		jQuery(document).ready(function(){ 
			jQuery("#vikqt-inner").owlCarousel({
				items : <?php echo $numb_xrow; ?>,
				autoPlay : <?php echo $autoplayparam_values; ?>,
				navigation : <?php echo $navigation_values; ?>,
				pagination : <?php echo $pagination_values; ?>,
				lazyLoad : true,
				loop: true,
				rewind: false,
				responsiveClass:true,
			    responsive: {
				0: {
					items: 1,
					nav: true
				},
				<?php if($numb_xrow == 1) { ?>
					600: {
						items:1,
						nav: true
					},
				<?php } ?>
				<?php if($numb_xrow == 1) { ?>
					820: {
						items: 1,
						nav: true
					},
				<?php } else if($numb_xrow == 2) { ?>
					820: {
						items: 2,
						nav: true
					},
				<?php } else { ?>
					820: {
						items: 3,
						nav: true
					},
				<?php } ?>
				1024: {
					items: <?php echo $numb_xrow; ?>,
					nav: true
				}
			}
			});
		});
		</script>
	<?php 
	}
?>

<script>
	jQuery(document).ready(function() {
    jQuery('img[src$=".svg"]').each(function() {
        var $img = jQuery(this);
        var imgURL = $img.attr('src');
        var attributes = $img.prop("attributes");

        jQuery.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = jQuery(data).find('svg');

            // Remove any invalid XML tags
            $svg = $svg.removeAttr('xmlns:a');

            // Loop through IMG attributes and apply on SVG
            jQuery.each(attributes, function() {
                $svg.attr(this.name, this.value);
            });

            // Replace IMG with SVG
            $img.replaceWith($svg);
        }, 'xml');
    });

    <?php if($navigation_values == "false") { ?>
		jQuery(".vikwp_ts-container .owl-nav").addClass('owl-disabled');
	<?php } ?>

});
</script>
<script>
/** Add Class to widget container **/
jQuery(document).ready(function() {
	if ( jQuery('#vikwp_ts-<?php echo $rand_numb; ?>').parents('.module').length ) {
		jQuery('#vikwp_ts-<?php echo $rand_numb; ?>').parents('.module').addClass('<?php echo $get_class_suffix; ?>');
	} else {
		jQuery('#vikwp_ts-<?php echo $rand_numb; ?>').parent('div').addClass('<?php echo $get_class_suffix; ?>');
	}
	
});
</script>
