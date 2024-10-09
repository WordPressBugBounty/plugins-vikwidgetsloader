<?php
/**
 * @package     VikWidgetsLoader
 * @subpackage  libraries
 * @author      E4J s.r.l.
 * @copyright   Copyright (C) 2018 E4J s.r.l. All Rights Reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://vikwp.com
 */

defined('ABSPATH') or die('No script kiddies please!');

function vikwl_directoryToFilename($directoryName) {
	$tempName = str_replace(' ', '_', $directoryName);
	$tempName = vikwl_stripDirectory($tempName);
	return strtolower($tempName).".php";
}

function vikwl_stripDirectory($fileName) {
	return str_replace(VIKWIDGETSLOADER_WIDGETROOT, '', $fileName);
}
