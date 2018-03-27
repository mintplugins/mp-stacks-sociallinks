<?php
/**
 * This file contains the enqueue scripts function for the sociallinks plugin
 *
 * @since 1.0.0
 *
 * @package    MP Stacks Features
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2014, Mint Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */


/**
 * Function which returns an array of font awesome icons
 */
function mp_stacks_sociallinks_get_sociallinks_icons(){

	//Get all font styles in the css document and put them in an array
	$pattern = '/\.(mp-stacks-sociallinks-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';

	$url = plugin_dir_path( dirname( __FILE__ ) ) . 'fonts/fontello/css/fontello.css';

	$return = file_get_contents( $url, true );

	preg_match_all($pattern, $return, $matches, PREG_SET_ORDER);

	$icons = array();

	foreach($matches as $match){
		$icons[$match[1]] = $match[1];
	}

	return $icons;
}
