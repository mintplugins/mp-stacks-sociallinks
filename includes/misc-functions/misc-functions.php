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
	
	$return = wp_remote_get( plugins_url( '/fonts/fontello/css/fontello.css', dirname( __FILE__ ) ), array( 'sslverify' => false ) );
	
	preg_match_all($pattern, $return['body'], $matches, PREG_SET_ORDER);
	
	$icons = array();

	foreach($matches as $match){
		$icons[$match[1]] = $match[1];
	}
	
	return $icons;
}