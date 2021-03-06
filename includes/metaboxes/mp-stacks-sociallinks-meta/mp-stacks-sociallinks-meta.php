<?php
/**
 * This page contains functions for modifying the metabox for sociallinks as a media type
 *
 * @link http://mintplugins.com/doc/
 * @since 1.0.0
 *
 * @package    MP Stacks SocialLinks
 * @subpackage Functions
 *
 * @copyright   Copyright (c) 2014, Mint Plugins
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author      Philip Johnston
 */
 
/**
 * Add SocialLinks as a Media Type to the dropdown
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @param    array $args See link for description.
 * @return   void
 */
function mp_stacks_sociallinks_create_meta_box(){	
	
	/**
	 * Array which stores all info about the new metabox
	 *
	 */
	$mp_stacks_sociallinks_add_meta_box = array(
		'metabox_id' => 'mp_stacks_sociallinks_metabox', 
		'metabox_title' => __( '"SocialLinks" Content-Type', 'mp_stacks_sociallinks'), 
		'metabox_posttype' => 'mp_brick', 
		'metabox_context' => 'advanced', 
		'metabox_priority' => 'low' ,
		'metabox_content_via_ajax' => true, 
	);
	
	/**
	 * Array which stores all info about the options within the metabox
	 *
	 */
	$mp_stacks_sociallinks_items_array = array(
		array(
			'field_id'			=> 'mp_stacks_sociallinks_links_showhider',
			'field_title' 	=> __( 'Links', 'mp_stacks_sociallinks'),
			'field_description' 	=> NULL,
			'field_type' 	=> 'showhider',
			'field_value' => '',
		),
		array(
			'field_id'			=> 'sociallink_title',
			'field_title' 	=> __( 'Social Link Name', 'mp_stacks_sociallinks'),
			'field_description' 	=> 'Enter the name of this sociallink (Facebook, Twitter, etc)',
			'field_type' 	=> 'textbox',
			'field_value' => '',
			'field_repeater' => 'mp_sociallinks_repeater',
			'field_showhider' => 'mp_stacks_sociallinks_links_showhider'
		),
		array(
			'field_id'			=> 'sociallink_icon_type',
			'field_title' 	=> __( 'Icon Type', 'mp_stacks_sociallinks'),
			'field_description' 	=> 'Select the type of icon to use for this.',
			'field_type' 	=> 'select',
			'field_value' => '',
			'field_select_values' => array('sociallink_icon' => 'Icon', 'sociallink_image' => 'Custom Image'),
			'field_repeater' => 'mp_sociallinks_repeater',
			'field_showhider' => 'mp_stacks_sociallinks_links_showhider'
		),
		array(
			'field_id'			=> 'sociallink_icon',
			'field_title' 	=> __( 'Icon', 'mp_stacks_sociallinks'),
			'field_description' 	=> 'Select the icon to use for this Social Link',
			'field_type' 	=> 'iconfontpicker',
			'field_value' => '',
			'field_select_values' => mp_stacks_sociallinks_get_sociallinks_icons(),
			'field_repeater' => 'mp_sociallinks_repeater',
			'field_conditional_id' => 'sociallink_icon_type',
			'field_conditional_values' => array( 'sociallink_icon' ),
			'field_showhider' => 'mp_stacks_sociallinks_links_showhider'
		),
		array(
			'field_id'			=> 'sociallink_icon_color',
			'field_title' 	=> __( 'Custom Icon Color', 'mp_stacks_sociallinks'),
			'field_description' 	=> 'If you\'d like a custom color for this specific icon, select it here:',
			'field_type' 	=> 'colorpicker',
			'field_value' => '',
			'field_repeater' => 'mp_sociallinks_repeater',
			'field_conditional_id' => 'sociallink_icon_type',
			'field_conditional_values' => array( 'sociallink_icon' ),
			'field_showhider' => 'mp_stacks_sociallinks_links_showhider'
		),
		array(
			'field_id'			=> 'sociallink_icon_color_hover',
			'field_title' 	=> __( 'Custom Mouse-Over Icon Color', 'mp_stacks_sociallinks'),
			'field_description' 	=> 'If you\'d like a custom color for this specific icon when the mouse is over, select it here:',
			'field_type' 	=> 'colorpicker',
			'field_value' => '',
			'field_repeater' => 'mp_sociallinks_repeater',
			'field_conditional_id' => 'sociallink_icon_type',
			'field_conditional_values' => array( 'sociallink_icon' ),
			'field_showhider' => 'mp_stacks_sociallinks_links_showhider'
		),
		array(
			'field_id'			=> 'sociallink_image',
			'field_title' 	=> __( 'Icon', 'mp_stacks_sociallinks'),
			'field_description' 	=> 'Upload the icon image to use for this Social Link. Tip: Make your image a perfect square.',
			'field_type' 	=> 'mediaupload',
			'field_value' => '',
			'field_repeater' => 'mp_sociallinks_repeater',
			'field_conditional_id' => 'sociallink_icon_type',
			'field_conditional_values' => array( 'sociallink_image' ),
			'field_showhider' => 'mp_stacks_sociallinks_links_showhider'
		),
		array(
			'field_id'			=> 'sociallink_image_hover',
			'field_title' 	=> __( 'Icon when Mouse Over', 'mp_stacks_sociallinks'),
			'field_description' 	=> 'Upload the icon image to use for this Social Link when the mouse is over it. Tip: Make sure this image matches the size of the one above and is a different color.',
			'field_type' 	=> 'mediaupload',
			'field_value' => '',
			'field_repeater' => 'mp_sociallinks_repeater',
			'field_conditional_id' => 'sociallink_icon_type',
			'field_conditional_values' => array( 'sociallink_image' ),
			'field_showhider' => 'mp_stacks_sociallinks_links_showhider'
		),
		array(
			'field_id'			=> 'sociallink_icon_link',
			'field_title' 	=> __( 'Link URL', 'mp_stacks_sociallinks'),
			'field_description' 	=> 'Enter a URL which should be visited when the icon is clicked.',
			'field_type' 	=> 'url',
			'field_value' => '',
			'field_repeater' => 'mp_sociallinks_repeater',
			'field_showhider' => 'mp_stacks_sociallinks_links_showhider'
		),
		array(
			'field_id'			=> 'sociallink_icon_link_type',
			'field_title' 	=> __( 'Open Type', 'mp_stacks_sociallinks'),
			'field_description' 	=> 'Optional: How should this link open?',
			'field_type' 	=> 'select',
			'field_value' => '',
			'field_select_values' => array( '_parent' => __( 'Open in current Window/Tab', 'mp_stacks_sociallinks' ), '_blank' => __( 'Open in New Window/Tab', 'mp_stacks_sociallinks' ) ),
			'field_repeater' => 'mp_sociallinks_repeater',
			'field_showhider' => 'mp_stacks_sociallinks_links_showhider'
		),
		array(
			'field_id'			=> 'mp_stacks_sociallinks_layout_showhider',
			'field_title' 	=> __( 'SocialLinks Layout', 'mp_stacks_sociallinks'),
			'field_description' 	=> NULL,
			'field_type' 	=> 'showhider',
			'field_value' => '',
		),
		
		//Mobile Controls
		array(
			'field_id'	 => 'sociallinks_screen_size_controller',
			'field_title' => '<div class="brick_screen_size_picker" mp-area-active="closed">
					<div class="brick_screen_size desktop" mp_stacks_device="desktop"></div>
					<div class="brick_screen_size tablet" mp_stacks_device="tablet" style="display:none;"></div>
					<div class="brick_screen_size mobile" mp_stacks_device="mobile" style="display:none;"></div>
				</div>',
			'field_description' => '',
			'field_type' => 'basictext',
			'field_showhider' => 'mp_stacks_sociallinks_layout_showhider'
		),
		
		//Desktop/Default Settings
		array(
			'field_id'			=> 'sociallinks_per_row',
			'field_title' 	=> __( 'Links Per Row', 'mp_stacks_sociallinks'),
			'field_description' 	=> __( 'How many links do you want from left to right before a new row starts?', 'mp_stacks_sociallinks' ),
			'field_type' 	=> 'number',
			'field_value' => '3',
			'field_showhider' => 'mp_stacks_sociallinks_layout_showhider'
		),
		array(
			'field_id'			=> 'sociallinks_spacing',
			'field_title' 	=> __( 'Link Spacing', 'mp_stacks_sociallinks'),
			'field_description' 	=> __( 'How much space would you like to have in between each link? (In Pixels)', 'mp_stacks_sociallinks' ),
			'field_type' 	=> 'number',
			'field_value' => '10',
			'field_showhider' => 'mp_stacks_sociallinks_layout_showhider'
		),
		array(
			'field_id'			=> 'sociallinks_size',
			'field_title' 	=> __( 'Social Icon Size', 'mp_stacks_sociallinks'),
			'field_description' 	=> __( 'What size should the icons be? (Pixels)', 'mp_stacks_sociallinks' ),
			'field_type' 	=> 'number',
			'field_value' => '30',
			'field_showhider' => 'mp_stacks_sociallinks_layout_showhider'
		),
		array(
			'field_id'			=> 'sociallinks_color',
			'field_title' 	=> __( 'Default Icon Colors (Where applicable)', 'mp_stacks_sociallinks'),
			'field_description' 	=> __( 'Select the color the icons will be', 'mp_stacks_sociallinks' ),
			'field_type' 	=> 'colorpicker',
			'field_value' => '',
			'field_showhider' => 'mp_stacks_sociallinks_layout_showhider'
		),
		array(
			'field_id'			=> 'sociallinks_color_hover',
			'field_title' 	=> __( 'Default Mouse-Over Icon Colors (Where applicable)', 'mp_stacks_sociallinks'),
			'field_description' 	=> __( 'Select the color the icons will be when the mouse is over them', 'mp_stacks_sociallinks' ),
			'field_type' 	=> 'colorpicker',
			'field_value' => '',
			'field_showhider' => 'mp_stacks_sociallinks_layout_showhider'
		),
		
		//Tablet Settings
		array(
			'field_id'			=> 'sociallinks_per_row_tablet',
			'field_title' 	=> __( 'Links Per Row (On Tablets)', 'mp_stacks_sociallinks'),
			'field_description' 	=> __( 'How many links do you want from left to right before a new row starts?', 'mp_stacks_sociallinks' ),
			'field_type' 	=> 'number',
			'field_value' => '3',
			'field_showhider' => 'mp_stacks_sociallinks_layout_showhider'
		),
		array(
			'field_id'			=> 'sociallinks_spacing_tablet',
			'field_title' 	=> __( 'Link Spacing (On Tablets)', 'mp_stacks_sociallinks'),
			'field_description' 	=> __( 'How much space would you like to have in between each link? (In Pixels)', 'mp_stacks_sociallinks' ),
			'field_type' 	=> 'number',
			'field_value' => '10',
			'field_showhider' => 'mp_stacks_sociallinks_layout_showhider'
		),
		array(
			'field_id'			=> 'sociallinks_size_tablet',
			'field_title' 	=> __( 'Social Icon Size (On Tablets)', 'mp_stacks_sociallinks'),
			'field_description' 	=> __( 'What size should the icons be? (Pixels)', 'mp_stacks_sociallinks' ),
			'field_type' 	=> 'number',
			'field_value' => '30',
			'field_showhider' => 'mp_stacks_sociallinks_layout_showhider'
		),
		array(
			'field_id'			=> 'sociallinks_color_tablet',
			'field_title' 	=> __( 'Default Icon Colors (On Tablets)', 'mp_stacks_sociallinks'),
			'field_description' 	=> __( 'Select the color the icons will be', 'mp_stacks_sociallinks' ),
			'field_type' 	=> 'colorpicker',
			'field_value' => '',
			'field_showhider' => 'mp_stacks_sociallinks_layout_showhider'
		),
		array(
			'field_id'			=> 'sociallinks_color_hover_tablet',
			'field_title' 	=> __( 'Default Mouse-Over Icon Colors (On Tablets)', 'mp_stacks_sociallinks'),
			'field_description' 	=> __( 'Select the color the icons will be when the mouse is over them', 'mp_stacks_sociallinks' ),
			'field_type' 	=> 'colorpicker',
			'field_value' => '',
			'field_showhider' => 'mp_stacks_sociallinks_layout_showhider'
		),
		
		//Mobile Settings
		array(
			'field_id'			=> 'sociallinks_per_row_mobile',
			'field_title' 	=> __( 'Links Per Row (On Mobile)', 'mp_stacks_sociallinks'),
			'field_description' 	=> __( 'How many links do you want from left to right before a new row starts?', 'mp_stacks_sociallinks' ),
			'field_type' 	=> 'number',
			'field_value' => '3',
			'field_showhider' => 'mp_stacks_sociallinks_layout_showhider'
		),
		array(
			'field_id'			=> 'sociallinks_spacing_mobile',
			'field_title' 	=> __( 'Link Spacing (On Mobile)', 'mp_stacks_sociallinks'),
			'field_description' 	=> __( 'How much space would you like to have in between each link? (In Pixels)', 'mp_stacks_sociallinks' ),
			'field_type' 	=> 'number',
			'field_value' => '10',
			'field_showhider' => 'mp_stacks_sociallinks_layout_showhider'
		),
		array(
			'field_id'			=> 'sociallinks_size_mobile',
			'field_title' 	=> __( 'Social Icon Size (On Mobile)', 'mp_stacks_sociallinks'),
			'field_description' 	=> __( 'What size should the icons be? (Pixels)', 'mp_stacks_sociallinks' ),
			'field_type' 	=> 'number',
			'field_value' => '30',
			'field_showhider' => 'mp_stacks_sociallinks_layout_showhider'
		),
		array(
			'field_id'			=> 'sociallinks_color_mobile',
			'field_title' 	=> __( 'Default Icon Colors (On Mobile)', 'mp_stacks_sociallinks'),
			'field_description' 	=> __( 'Select the color the icons will be', 'mp_stacks_sociallinks' ),
			'field_type' 	=> 'colorpicker',
			'field_value' => '',
			'field_showhider' => 'mp_stacks_sociallinks_layout_showhider'
		),
		array(
			'field_id'			=> 'sociallinks_color_hover_mobile',
			'field_title' 	=> __( 'Default Mouse-Over Icon Colors (On Mobile)', 'mp_stacks_sociallinks'),
			'field_description' 	=> __( 'Select the color the icons will be when the mouse is over them', 'mp_stacks_sociallinks' ),
			'field_type' 	=> 'colorpicker',
			'field_value' => '',
			'field_showhider' => 'mp_stacks_sociallinks_layout_showhider'
		),
	);
	
	
	/**
	 * Custom filter to allow for add-on plugins to hook in their own data for add_meta_box array
	 */
	$mp_stacks_sociallinks_add_meta_box = has_filter('mp_stacks_sociallinks_meta_box_array') ? apply_filters( 'mp_stacks_sociallinks_meta_box_array', $mp_stacks_sociallinks_add_meta_box) : $mp_stacks_sociallinks_add_meta_box;
	
	//Globalize the and populate mp_stacks_sociallinks_items_array (do this before filter hooks are run)
	global $global_mp_stacks_sociallinks_items_array;
	$global_mp_stacks_sociallinks_items_array = $mp_stacks_sociallinks_items_array;
	
	/**
	 * Custom filter to allow for add on plugins to hook in their own extra fields 
	 */
	$mp_stacks_sociallinks_items_array = has_filter('mp_stacks_sociallinks_items_array') ? apply_filters( 'mp_stacks_sociallinks_items_array', $mp_stacks_sociallinks_items_array) : $mp_stacks_sociallinks_items_array;
	
	/**
	 * Create Metabox class
	 */
	global $mp_stacks_sociallinks_meta_box;
	$mp_stacks_sociallinks_meta_box = new MP_CORE_Metabox($mp_stacks_sociallinks_add_meta_box, $mp_stacks_sociallinks_items_array);
}
add_action('mp_brick_ajax_metabox', 'mp_stacks_sociallinks_create_meta_box');
add_action('wp_ajax_mp_stacks_sociallinks_metabox_content', 'mp_stacks_sociallinks_create_meta_box');