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

$title 		= apply_filters( 'widget_title', $instance['title'] );
$get_text	= $instance['textarea'];
$get_class_suffix = $instance['class_suffix'];

$rand_id = rand(0, 999);

?>
<div id="vikcustext_container-<?php echo $rand_id; ?>" class="vikcustext_container">
<?php echo $get_text; ?>
</div>

<script>
/** Add Class to widget container **/
jQuery(document).ready(function() {
	if ( jQuery('#vikcustext_container-<?php echo $rand_id; ?>').parents('.module').length ) {
		jQuery('#vikcustext_container-<?php echo $rand_id; ?>').parents('.module').addClass('<?php echo $get_class_suffix; ?>');
	} else {
		jQuery('#vikcustext_container-<?php echo $rand_id; ?>').parent('div').addClass('<?php echo $get_class_suffix; ?>');
	}
	
});
</script>