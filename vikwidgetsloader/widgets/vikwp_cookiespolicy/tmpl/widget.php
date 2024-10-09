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

$cookies = false;

if (array_key_exists('vcp_a', $_COOKIE)) {
	$cookies = $_COOKIE['vcp_a'];
}

$article = array_key_exists('article', $instance) ? get_page($instance['article'], 'ARRAY_A') : array('guid' => "");

if(!$cookies) {
?>

<div class="vikcp-policy-container">
    <div class="vikcp-policy-inner vikcp-policy-display-<?php echo array_key_exists('css_type', $instance) ? $instance['css_type'] : 'bottom';?>">
		<span class="vikcp-policy-message"><?php echo array_key_exists('policy', $instance) ? $instance['policy'] : ''; ?></span>
<?php if (array_key_exists('article', $instance)) { ?>
		<span class="vikcp-policy-link"><a href="<?php echo $article['guid'];?>"><?php echo array_key_exists('articlelinkname', $instance) ? $instance['articlelinkname'] : ''; ?></a></span>
<?php } ?>
		<button id="vikcp-policy-btn" onclick="" type="button"><?php echo array_key_exists('agree', $instance) ? $instance['agree'] : ''; ?></button>
    </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery(".vikcp-policy-container").fadeIn();
	jQuery("#vikcp-policy-btn").click(function() {
		document.cookie="vcp_a=1; expires=<?php echo date('r', (time() + (86400 * 60))); ?>; path=/";
		jQuery(".vikcp-policy-container").fadeOut(400, function() {
			jQuery(".vikcp-policy-container").remove();
		});
	});
});
</script>
<?php }
