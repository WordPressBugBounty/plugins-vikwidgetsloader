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

$title = apply_filters('widget_title', $instance['title']);
		
global $post;

$cat_id = (isset($instance['category_id']) && !empty($instance['category_id']) ? $instance['category_id'] : '' );

$posts_limit = $instance['numb_limit'];
$get_title_linked = (isset($instance['title_linked']) && !empty($instance['title_linked']) ? $instance['title_linked'] : '' );
$show_img = (isset($instance['feat_image']) && !empty($instance['feat_image']) ? $instance['feat_image'] : '' );
$get_post_date = (isset($instance['date_post']) && !empty($instance['date_post']) ? $instance['date_post'] : '' );
$get_class_suffix = (isset($instance['class_suffix']) && !empty($instance['class_suffix']) ? $instance['class_suffix'] : '' );

$rand_id = rand(0, 999);

$pdet = array(
	'posts_per_page' => $posts_limit,
	'offset'		 => 0,
	'category' 		 => $cat_id,
);

$myposts = get_posts($pdet);

?>
<div id="vikwp_category-<?php echo $rand_id; ?>" class="vikwp_category-widget">
	<div class="container-fluid">
		<div class="row">
			<ul class="vikwp_category-ul">
				<?php 
				foreach ($myposts as $post) : setup_postdata($post); ?>
					<li class="vikwp_category-item col-xs-12 col-sm-6 col-md-6">
						<div class="vikwp_category-inner">
							<?php if ($show_img == 1) { ?>
								<div class="vikwp_category-img col-xs-12 col-sm-12 col-md-6">
									<?php the_post_thumbnail( 'medium-square' ); ?>
								</div>
							<?php } ?>
							<div class="vikwp_category-cnt col-xs-12 ol-sm-12 col-md-6">
								<?php if ($get_post_date == 1) { ?>
									<div class="vikwp_category-post-date"><i class="far fa-clock"></i> <span><?php the_time( get_option( 'date_format' ) ); ?></span></div>
								<?php } ?>
								<?php if( $get_title_linked == 1 ) { ?>

									<a class="vikwp_category-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								
								<?php } else { ?>
								
								<h3 class="vikwp_category-title"><?php the_title(); ?></h3>
								
								<?php } ?>
								<?php the_excerpt(); ?>							
							</div>
						</div>
					</li>
				<?php endforeach;
				wp_reset_postdata(); ?>
			</ul>
		</div>
	</div>
</div>

<script>
/** Add Class to widget container **/
jQuery(document).ready(function() {
	if ( jQuery('#vikwp_category-<?php echo $rand_id; ?>').parents('.module').length ) {
		jQuery('#vikwp_category-<?php echo $rand_id; ?>').parents('.module').addClass('<?php echo $get_class_suffix; ?>');
	} else {
		jQuery('#vikwp_category-<?php echo $rand_id; ?>').parent('div').addClass('<?php echo $get_class_suffix; ?>');
	}
	
});
</script>