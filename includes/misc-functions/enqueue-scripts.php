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
 * Enqueue JS and CSS for sociallinks 
 *
 * @access   public
 * @since    1.0.0
 * @return   void
 */

/**
 * Enqueue css and js
 *
 * Filter: mp_stacks_sociallinks_css_location
 */
function mp_stacks_sociallinks_enqueue_scripts(){
	
	//Enqueue Font Awesome CSS
	wp_enqueue_style( 'mp-stacks-sociallinks-icons', plugins_url( '/fonts/fontello/css/fontello.css', dirname( __FILE__ ) ) );
			
	//Enqueue sociallinks CSS
	wp_enqueue_style( 'mp_stacks_sociallinks_css', plugins_url( 'css/sociallinks.css', dirname( __FILE__ ) ) );

}
add_action( 'wp_enqueue_scripts', 'mp_stacks_sociallinks_enqueue_scripts' );

/**
 * Enqueue css and js
 *
 * Filter: mp_stacks_sociallinks_css_location
 */
function mp_stacks_sociallinks_admin_enqueue_scripts(){
	
	//Enqueue Admin Features CSS
	wp_enqueue_style( 'mp_stacks_sociallinks_css', plugins_url( 'css/admin-sociallinks.css', dirname( __FILE__ ) ) );
	
	//Enqueue Font Awesome CSS
	wp_enqueue_style( 'mp-stacks-sociallinks-icons', plugins_url( '/fonts/fontello/css/fontello.css', dirname( __FILE__ ) ) );
	
	//Enqueue sociallinks CSS
	wp_enqueue_script( 'mp_stacks_sociallinks_js', plugins_url( 'js/sociallinks_admin.js', dirname( __FILE__ ) ), array( 'jquery' ) );

}
add_action( 'admin_enqueue_scripts', 'mp_stacks_sociallinks_admin_enqueue_scripts' );