<?php 
/**
 * This file contains the function which hooks to a brick's content output
 *
 * @since 1.0.0
 *
 * @package    MP Stacks SocialLinks
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2014, Mint Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */

/**
 * This function hooks to the brick css output. If it is supposed to be a 'sociallink', then it will add the css for those sociallinks to the brick's css
 *
 * @access   public
 * @since    1.0.0
 * @return   void
 */
function mp_stacks_brick_content_output_css_sociallinks( $css_output, $post_id ){

	//First Media Type
	$mp_stacks_first_content_type = get_post_meta($post_id, 'brick_first_content_type', true);
	
	//Second Media Type
	$mp_stacks_second_content_type = get_post_meta($post_id, 'brick_second_content_type', true);
	
	if ( $mp_stacks_first_content_type != 'sociallinks' && $mp_stacks_second_content_type != 'sociallinks' ){
		return $css_output;	
	}
	
	//Get SocialLinks Metabox Repeater Array
	$sociallinks_repeaters = get_post_meta($post_id, 'mp_sociallinks_repeater', true);
	
	//If no sociallinks have been set up, return
	if ( empty( $sociallinks_repeaters ) ){
		return $css_output;
	}
	
	//SocialLinks per row
	$sociallinks_per_row = get_post_meta($post_id, 'sociallinks_per_row', true);
	$sociallinks_per_row = empty( $sociallinks_per_row ) ? '2' : $sociallinks_per_row;
	
	//SocialLinks spacing
	$sociallinks_spacing = get_post_meta($post_id, 'sociallinks_spacing', true);
	$sociallinks_spacing = empty( $sociallinks_spacing ) ? '20' : $sociallinks_spacing;
	
	//SocialLinks icon size
	$sociallinks_size = get_post_meta($post_id, 'sociallinks_size', true);
	$sociallinks_size = empty( $sociallinks_size ) ? '30px' : $sociallinks_size . 'px';
	
	//SocialLinks title size
	$sociallinks_color = get_post_meta($post_id, 'sociallinks_color', true);
	$sociallinks_color = empty( $sociallinks_color ) ? '#FFF' : $sociallinks_color;
	
	//Set SocialLinks Output
	$css_sociallinks_output = '
		#mp-brick-' . $post_id . ' .mp-stacks-sociallink{ 
			width:' . (100/$sociallinks_per_row) .'%;
			padding:' . $sociallinks_spacing . 'px;
		}
		#mp-brick-' . $post_id . ' .mp-stacks-sociallink a,
		#mp-brick-' . $post_id . ' .mp-stacks-sociallink a:hover
		{ 
			color:' . $sociallinks_color . ';
		}
		#mp-brick-' . $post_id . ' .mp-stacks-sociallinks-icon-container {
			width: ' . $sociallinks_size . ';
		}
		#mp-brick-' . $post_id . ' .mp-stacks-sociallinks-icon {
			font-size: ' . $sociallinks_size . ';
			width: ' . $sociallinks_size . ';
		}
		@media screen and (max-width: 600px){
			#mp-brick-' . $post_id . ' .mp-stacks-sociallink{ 
				width:' . '100%;
			}
		}';
	
	return $css_sociallinks_output . $css_output;
		
}
add_filter('mp_brick_additional_css', 'mp_stacks_brick_content_output_css_sociallinks', 10, 3);

/**
 * This function hooks to the brick output. If it is supposed to be a 'sociallink', then it will output the sociallinks
 *
 * @access   public
 * @since    1.0.0
 * @return   void
 */
function mp_stacks_brick_content_output_sociallinks($default_content_output, $mp_stacks_content_type, $post_id){
	
	//If this stack content type is set to be an image	
	if ($mp_stacks_content_type != 'sociallinks'){
		return $default_content_output;	
	}
		
	//Set default value for $content_output to NULL
	$content_output = NULL;	
	
	//Get SocialLinks Metabox Repeater Array
	$sociallinks_repeaters = get_post_meta($post_id, 'mp_sociallinks_repeater', true);
	
	//SocialLinks per row
	$sociallinks_per_row = get_post_meta($post_id, 'sociallinks_per_row', true);
	$sociallinks_per_row = empty( $sociallinks_per_row ) ? '2' : $sociallinks_per_row;
	
	//Feature alignment
	$sociallink_alignment = get_post_meta($post_id, 'sociallink_alignment', true);
	$sociallink_alignment = empty( $sociallink_alignment ) ? 'left' : $sociallink_alignment;

	//Get SocialLinks Output
	$sociallinks_output = '<div class="mp-stacks-sociallinks">';
	
	//Set counter to 0
	$counter = 1;
	
	if ($sociallinks_repeaters ){
		
		//Loop through each sociallink
		foreach( $sociallinks_repeaters as $sociallinks_repeater ){
				
			//Feature alignment
			$sociallink_icon_color = $sociallinks_repeater['sociallink_icon_color'];
			$sociallink_icon_color = !empty( $sociallink_icon_color ) ? 'style="color:' . $sociallink_icon_color . ';"' : NULL;
	
						
			$sociallinks_output .= '<div class="mp-stacks-sociallink">';
	
				//If the user has saved an open type
				if ( !empty($sociallinks_repeater['sociallink_icon_link_type'])){
					$target = $sociallinks_repeater['sociallink_icon_link_type'];
				}
				//If they haven't saved an open type
				else{
					$target = '_parent';
				}
				
				$sociallinks_output .= !empty($sociallinks_repeater['sociallink_icon_link']) ? '<a href="' . $sociallinks_repeater['sociallink_icon_link'] . '" class="mp-stacks-sociallinks-icon-link" target="' . $target . '" title="' . $sociallinks_repeater['sociallink_title']  . '">' : NULL;
										
						//If we should use an image as the sociallinkd icon
						if ( $sociallinks_repeater['sociallink_icon_type'] == 'sociallink_image' ){
							$sociallinks_output .= '<div class="mp-stacks-sociallinks-icon-container mp-stacks-sociallinks-image">';
								$sociallinks_output .= '<img src="' . $sociallinks_repeater['sociallink_image'] . '" width="100%"/>';
							$sociallinks_output .= '</div>';
						}
						//If we should use an icon from the icon font
						else{
							$sociallinks_output .= '<div class="mp-stacks-sociallinks-icon-container mp-stacks-sociallinks-icon">';
								$sociallinks_output .= '<div class="mp-stacks-sociallinks-icon ' . $sociallinks_repeater['sociallink_icon'] . '" ' . $sociallink_icon_color . '></div>';
							$sociallinks_output .= '</div>';
						}
				
				$sociallinks_output .= !empty($sociallinks_repeater['sociallink_icon_link']) ? '</a>' : NULL;
										
				$sociallinks_output .= $sociallink_alignment == 'center' ? '<div class="mp-stacks-sociallinks-clearedfix"></div>' : NULL;
				
			$sociallinks_output .= '</div>';
			
			if ( $sociallinks_per_row == $counter ){
				
				//Add clear div to bump a new row
				$sociallinks_output .= '<div class="mp-stacks-sociallinks-clearedfix"></div>';
				
				//Reset counter
				$counter = 1;
			}
			else{
				
				//Increment Counter
				$counter = $counter + 1;
				
			}	
		}
	}
	
	$sociallinks_output .= '</div>';
	
	//Content output
	$content_output .= $sociallinks_output;
	
	//Return
	return $content_output;
	
}
add_filter('mp_stacks_brick_content_output', 'mp_stacks_brick_content_output_sociallinks', 10, 3);