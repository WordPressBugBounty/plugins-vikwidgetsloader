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

$title = apply_filters( 'widget_title', $instance['title'] );
$cat_id 	 = $instance['gridcont_category_id'];
$posts_limit = $instance['gridcont_numb_limit'];
$get_bg_img = $instance['bg_image'];
$gridcont_ordering = (isset($instance['gridcont_ordering']) && !empty($instance['gridcont_ordering']) ? $instance['gridcont_ordering'] : '' );

$get_bg_img  = (isset($instance['bg_image']) && !empty($instance['bg_image']) ? $instance['bg_image'] : '' );
$get_bg_color = (isset($instance['bg_color']) && !empty($instance['bg_color']) ? $instance['bg_color'] : '' );
$get_numb_per_row = (isset($instance['gridcont_number_of_rows']) && !empty($instance['gridcont_number_of_rows']) ? $instance['gridcont_number_of_rows'] : 1 );
$get_btn_allposts = (isset($instance['gridcont_show_allposts']) && !empty($instance['gridcont_show_allposts']) ? $instance['gridcont_show_allposts'] : 0 );
$get_text_allposts = (isset($instance['gridcont_text_allposts']) && !empty($instance['gridcont_text_allposts']) ? $instance['gridcont_text_allposts'] : __( 'Discover all our services', 'vikwidgetsloader' ));
$get_readmore_text = (isset($instance['gridcont_readmore_text']) && !empty($instance['gridcont_readmore_text']) ? $instance['gridcont_readmore_text'] : __( 'Read More', 'vikwidgetsloader' ));
$get_gridcont_excerpt = (isset($instance['gridcont_excerpt']) && !empty($instance['gridcont_excerpt']) ? $instance['gridcont_excerpt'] : 1 );

$box_size = 100 / $get_numb_per_row;
$box_size = round($box_size, 2);

$get_cat_name = get_cat_name( $cat_id );

$get_cat_slug = get_category( $cat_id );

$pdet = array(
	'posts_per_page' => $posts_limit,
	'offset'		 => 0,
	'category' 		 => $cat_id,
	'orderby'        => 'date',
	'order'          => $gridcont_ordering
);

$myposts = get_posts( $pdet );
?>
<div class="container-fluid custom-fluid vikwp_gc_container-box <?php echo ( $get_numb_per_row > 1 ) ? 'vikwp_gc-cnt-multiple' : 'vikwp_gc-cnt-oneitem'; ?>">
	<div class="vikwp_gc_bg<?php echo ( !empty( $get_bg_img ) ) ? ' vikwp_gc_bgimg' : ''; ?>" style="background-color: <?php echo ( !empty( $get_bg_color ) ) ? '$get_bg_color' : 'transparent'; ?>; <?php echo ( !empty( $get_bg_img ) ) ? 'background-image: url('.$get_bg_img.')' : ''; ?>">
		<div class="vikwp_gc_cnt-mask"></div>
			<div class="vikwp_gc_cnt-inner ">
			<?php 
			foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
				<div class="row no-gutters vikwp_gc-layout <?php echo ( $get_numb_per_row > 1 ) ? 'vikwp_gc-row-multiple' : 'vikwp_gc-row-oneitem'; ?> <?php echo ( ( has_post_thumbnail() ) ? 'vikwp_gc-featimg' : '' ); ?>" style="width: <?php echo $box_size; ?>%;">
					<div class="vikwp_gc-row-item-inner">
						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 vikwp_gc-text">
							<div class="vikwp_gc-inner">
								<h3 class="vikwp_gc-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
								<?php if( $get_gridcont_excerpt == 1 ) { ?>
								<div class="vikwp_gc-content"><?php the_excerpt(); ?></div>
								<?php } ?>
								<?php if( $instance['gridcont_readmore'] == 1) { ?>
									<a href="<?php the_permalink(); ?>" class="btn" title="<?php the_title(); ?>"><?php echo $get_readmore_text; ?></a>
								<?php } ?>
							</div>
						</div>
						<?php if( has_post_thumbnail() ) { ?>
						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 vikwp_gc-image">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
						<?php } ?>
					</div>		
				</div>
			<?php endforeach;
				wp_reset_postdata(); ?>
		</div>



		<?php if ( !empty($get_btn_allposts) ) { ?>
			<div class="vikwp_gc_allposts">
				<a href="category/<?php echo $get_cat_slug->slug; ?>" alt="<?php echo $get_cat_name; ?>" class="btn"><?php echo $get_text_allposts; ?></a>
			</div>
		<?php } ?>
	</div>
</div>