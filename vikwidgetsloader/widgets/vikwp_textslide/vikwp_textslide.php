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

class vikwp_textslide extends VikWL_Widget {
	function __construct() {
		// Add Widget scripts
		function vikwp_textslide_add_style() {
			if ( is_active_widget( false, false, 'vikwp_textslide', false ) ) {
				wp_register_style( 'vikwl_style', VIKWIDGETSLOADER_ASSETS_URI . 'css/vikwl_styles.css', false, 1.0, 'all' );
				wp_enqueue_style( 'vikwl_style' );

				wp_register_style( 'vikwp_textslide_owlcarousel', VIKWIDGETSLOADER_ASSETS_URI . 'css/src/owl.carousel.min.css', false, 1.0, 'all' );
				wp_enqueue_style( 'vikwp_textslide_owlcarousel' );

				/*wp_register_style( 'vikwp_textslide_owltheme', VIKWIDGETSLOADER_ASSETS_URI . 'css/src/owl.theme.default.min.css', false, 1.0, 'all' );
				wp_enqueue_style( 'vikwp_textslide_owltheme' );*/
			}
		}
		add_action( 'wp_enqueue_scripts', 'vikwp_textslide_add_style' );

		function vikwp_textslide_add_scripts(){
			if ( is_active_widget( false, false, 'vikwp_textslide', false ) ) { 
				wp_enqueue_script( 'vikwp_textslide_owl-carousel', VIKWIDGETSLOADER_ASSETS_URI . 'js/owl.carousel.min.js', array(), 1.0 );
			}
		}
		add_action('wp_enqueue_scripts', 'vikwp_textslide_add_scripts');


		function vikwp_textslide_add_form_style() {
			if ( get_current_screen()->base == "widgets" ) {
				wp_enqueue_script( 'media-upload' );
				wp_enqueue_media();
				wp_enqueue_script( 'widget-config', VIKWIDGETSLOADER_ASSETS_URI . 'js/widget-config.js', array( 'jquery' ) );
			}
		}
		add_action( 'admin_enqueue_scripts', 'vikwp_textslide_add_form_style' );

		wp_enqueue_script( 'jquery-core' );

		function color_load() {
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );
		}
		add_action( 'load-widgets.php', 'color_load' );
		
		parent::__construct(
			// Path of the file
			dirname(__FILE__),
			
			// Base ID of your widget
			'vikwp_textslide', 
			 
			// Widget name will appear in UI
			__( 'VikWP Text Slide', 'vikwidgetsloader' ), 
			 
			// Widget description
			array( 'description' => __( 'This widget allows you to select a background image and a post category, to show them over the image', 'vikwidgetsloader' ), ) 
		);
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = parent::update( $new_instance, $old_instance );
		$instance['testimonials'] = isset( $instance['testimonials'] ) ? 1 : 0;
		return $instance;
	}
}
