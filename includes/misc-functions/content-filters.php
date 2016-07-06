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
function mp_stacks_brick_content_output_css_sociallinks( $css_output, $post_id, $first_content_type, $second_content_type ){
	
	if ( $first_content_type != 'sociallinks' && $second_content_type != 'sociallinks' ){
		return $css_output;	
	}
	
	//Enqueue Font Awesome CSS
	wp_enqueue_style( 'mp-stacks-sociallinks-icons', plugins_url( '/fonts/fontello/css/fontello.css', dirname( __FILE__ ) ), array(), MP_STACKS_SOCIALLINKS_VERSION );
			
	//Enqueue sociallinks CSS
	wp_enqueue_style( 'mp_stacks_sociallinks_css', plugins_url( 'css/sociallinks.css', dirname( __FILE__ ) ), array(), MP_STACKS_SOCIALLINKS_VERSION );
	
	//Get SocialLinks Metabox Repeater Array
	$sociallinks_repeaters = get_post_meta($post_id, 'mp_sociallinks_repeater', true);
	
	//If no sociallinks have been set up, return
	if ( empty( $sociallinks_repeaters ) ){
		return $css_output;
	}
	
	//SocialLinks per row
	$sociallinks_per_row = get_post_meta($post_id, 'sociallinks_per_row', true);
	$sociallinks_per_row = empty( $sociallinks_per_row ) ? '3' : $sociallinks_per_row;
	
	//SocialLinks spacing
	$sociallinks_spacing = get_post_meta($post_id, 'sociallinks_spacing', true);
	$sociallinks_spacing = empty( $sociallinks_spacing ) ? '20' : $sociallinks_spacing;
	
	//SocialLinks icon size
	$sociallinks_size = get_post_meta($post_id, 'sociallinks_size', true);
	$sociallinks_size = empty( $sociallinks_size ) ? 30 : $sociallinks_size;
	
	//SocialLinks Color
	$sociallinks_color = get_post_meta($post_id, 'sociallinks_color', true);
	$sociallinks_color = empty( $sociallinks_color ) ? '#FFF' : $sociallinks_color;
	
	//SocialLinks color hover 
	$sociallinks_color_hover = get_post_meta($post_id, 'sociallinks_color_hover', true);
	$sociallinks_color_hover = empty( $sociallinks_color_hover ) ? '#FFF' : $sociallinks_color_hover;
	
	//SocialLinks icon hover size - make it .5 bigger than non-hover to cover weird whitespace
	$sociallinks_hover_size = get_post_meta($post_id, 'sociallinks_size', true);
	$sociallinks_hover_size = empty( $sociallinks_hover_size ) ? '20.5' : $sociallinks_hover_size;


	//SocialLinks per row (Tablet)
	$sociallinks_per_row_tablet = mp_core_get_post_meta($post_id, 'sociallinks_per_row_tablet', $sociallinks_per_row);
	
	//SocialLinks spacing (Tablet)
	$sociallinks_spacing_tablet = mp_core_get_post_meta($post_id, 'sociallinks_spacing_tablet', $sociallinks_spacing );
	
	//SocialLinks icon size (Tablet)
	$sociallinks_size_tablet = mp_core_get_post_meta($post_id, 'sociallinks_size_tablet', $sociallinks_size );
	
	//SocialLinks Color (Tablet)
	$sociallinks_color_tablet = mp_core_get_post_meta($post_id, 'sociallinks_color_tablet', $sociallinks_color );
	
	//SocialLinks color hover (Tablet)
	$sociallinks_color_hover_tablet = mp_core_get_post_meta($post_id, 'sociallinks_color_hover_tablet', $sociallinks_color_hover );
	
	//SocialLinks icon hover size - make it .5 bigger than non-hover to cover weird whitespace (Tablet)
	$sociallinks_hover_size_tablet = mp_core_get_post_meta($post_id, 'sociallinks_size_tablet', $sociallinks_hover_size);
	
	//SocialLinks per row (Mobile)
	$sociallinks_per_row_mobile = mp_core_get_post_meta($post_id, 'sociallinks_per_row_mobile', $sociallinks_per_row);
	
	//SocialLinks spacing (Mobile)
	$sociallinks_spacing_mobile = mp_core_get_post_meta($post_id, 'sociallinks_spacing_mobile', $sociallinks_spacing );
	
	//SocialLinks icon size (Mobile)
	$sociallinks_size_mobile = mp_core_get_post_meta($post_id, 'sociallinks_size_mobile', $sociallinks_size );
	
	//SocialLinks Color (Mobile)
	$sociallinks_color_mobile = mp_core_get_post_meta($post_id, 'sociallinks_color_mobile', $sociallinks_color );
	
	//SocialLinks color hover (Mobile)
	$sociallinks_color_hover_mobile = mp_core_get_post_meta($post_id, 'sociallinks_color_hover_mobile', $sociallinks_color_hover );
	
	//SocialLinks icon hover size - make it .5 bigger than non-hover to cover weird whitespace (Mobile)
	$sociallinks_hover_size_mobile = mp_core_get_post_meta($post_id, 'sociallinks_size_mobile', $sociallinks_hover_size);
	
	
	
	//Set SocialLinks CSS Output
	$css_sociallinks_output = '@media (min-width: 961px) {
		#mp-brick-' . $post_id . ' .mp-stacks-sociallink:nth-child(' . $sociallinks_per_row . 'n+1){ 
			
			clear:left;
			
		}
	}
	#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallink{ 
		width:' . $sociallinks_size .'px;
		height: ' . $sociallinks_size . 'px;
		margin: ' . $sociallinks_spacing . 'px;
	}
	#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallink a{ 
		color:' . $sociallinks_color . ';
	}
	#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallink a:hover, 
	#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallink a:hover .mp-stacks-sociallinks-icon{ 
		color:' . $sociallinks_color_hover . ';
		font-size:' . $sociallinks_hover_size . 'px;
	}
	#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallinks-icon-container {
		width: ' . $sociallinks_size . 'px;
	}
	#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallinks-icon {
		font-size: ' . $sociallinks_size . 'px;
		width: ' . $sociallinks_size . 'px;
		line-height:1;
	}
	#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallinks-image {
		width: ' . $sociallinks_size . 'px;
		height: ' . $sociallinks_size . 'px;
		background-size: ' . $sociallinks_size . 'px;
	}
	';
	
	//Tablet
	$css_sociallinks_output .= '@media (max-width: 961px) and (min-width: 600px) {
			
		#mp-brick-' . $post_id . ' .mp-stacks-sociallink:nth-child(' . $sociallinks_per_row_tablet. 'n+1){ 
			
			clear:left;
			
		}
	
		#mp-brick-' . $post_id . ' .mp-stacks-sociallinks  .mp-stacks-sociallink{ 
			width:' . $sociallinks_size_tablet .'px;
			height: ' . $sociallinks_size_tablet . 'px;
			margin: ' . $sociallinks_spacing_tablet . 'px;
		}
		#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallink a{ 
			color:' . $sociallinks_color_tablet . ';
		}
		#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallink a:hover,
		#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallink a:hover .mp-stacks-sociallinks-icon{ 
			color:' . $sociallinks_color_hover_tablet . ';
			font-size:' . $sociallinks_hover_size_tablet . 'px;
		}
		#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallinks-icon-container {
			width: ' . $sociallinks_size_tablet . 'px;
		}
		#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallinks-icon {
			font-size: ' . $sociallinks_size_tablet . 'px;
			width: ' . $sociallinks_size_tablet . 'px;
		}
		#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallinks-image {
			width: ' . $sociallinks_size_tablet . 'px;
			height: ' . $sociallinks_size_tablet . 'px;
			background-size: ' . $sociallinks_size_tablet . 'px;
		}
	}
	';
	
	//Mobile
	$css_sociallinks_output .= '@media (max-width: 600px) {
		
		#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallink:nth-child(' . $sociallinks_per_row_mobile . 'n+1){ 
			
			clear:left;
			
		}
		
		#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallink{ 
			width:' . $sociallinks_size_mobile .'px;
			height: ' . $sociallinks_size_mobile . 'px;
			margin: ' . $sociallinks_spacing_mobile . 'px;
		}
		#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallink a{ 
			color:' . $sociallinks_color_mobile . ';
		}
		#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallink a:hover,
		#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallink a:hover .mp-stacks-sociallinks-icon{ 
			color:' . $sociallinks_color_hover_mobile . ';
			font-size:' . $sociallinks_hover_size_mobile . 'px;
		}
		#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallinks-icon-container {
			width: ' . $sociallinks_size_mobile . 'px;
		}
		#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallinks-icon {
			font-size: ' . $sociallinks_size_mobile . 'px;
			width: ' . $sociallinks_size_mobile . 'px;
		}
		#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallinks-image {
			width: ' . $sociallinks_size_mobile . 'px;
			height: ' . $sociallinks_size_mobile . 'px;
			background-size: ' . $sociallinks_size_mobile . 'px;
		}
	}
	';
		
	if ($sociallinks_repeaters ){
	
		$social_link_counter = 0;
		
		//Loop through each sociallink
		foreach( $sociallinks_repeaters as $sociallinks_repeater ){
			
			//If we are using an icon
			if ( $sociallinks_repeater['sociallink_icon_type'] == 'sociallink_icon' ){
				
				//Get and set Social Icon Color Hover
				$sociallink_icon_color = $sociallinks_repeater['sociallink_icon_color'];
				$sociallink_icon_color = !empty( $sociallink_icon_color ) ? $sociallink_icon_color : NULL;
				
				//CSS for this Social Icon's Color 
				if ( !empty( $sociallink_icon_color ) ){
					$css_sociallinks_output .= '#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallink-' . $social_link_counter . ' a{';
						$css_sociallinks_output .= 'color:' . $sociallink_icon_color . ';';
					$css_sociallinks_output .= '}';
				}
				
				//Get and set Social Icon Color Hover
				$sociallink_icon_color_hover = $sociallinks_repeater['sociallink_icon_color_hover'];
				$sociallink_icon_color_hover = !empty( $sociallink_icon_color_hover ) ? $sociallink_icon_color_hover : NULL;
				
				
				//CSS for this Social Icon's Color Hover
				if ( !empty( $sociallink_icon_color_hover ) ){
					$css_sociallinks_output .= '#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallink-' . $social_link_counter . ' a:hover, 
					#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallink-' . $social_link_counter . ' a:hover .mp-stacks-sociallinks-icon {';
						$css_sociallinks_output .= 'color:' . $sociallink_icon_color_hover . ';';
					$css_sociallinks_output .= '}';
				}
			}
			//If we are using an image instead of a font icon
			else if ( $sociallinks_repeater['sociallink_icon_type'] == 'sociallink_image' ){
				
				//SocialLinks Image
				$sociallink_image = $sociallinks_repeater['sociallink_image'];
				
				//SocialLinks Image Hover
				$sociallink_image_hover = $sociallinks_repeater['sociallink_image_hover'];
				
				//CSS for this Social Image
				if ( !empty( $sociallink_image ) ){
						$css_sociallinks_output .= '#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallink-' . $social_link_counter . ' a .mp-stacks-sociallinks-image{';
							$css_sociallinks_output .= 'background-image: url(\'' . $sociallink_image . '\');';
						$css_sociallinks_output .= '}';
						$css_sociallinks_output .= '#mp-brick-' . $post_id . ' .mp-stacks-sociallinks .mp-stacks-sociallink-' . $social_link_counter . ' a:hover .mp-stacks-sociallinks-image{';
							$css_sociallinks_output .= 'background-image: url(\'' . $sociallink_image_hover . '\');';
						$css_sociallinks_output .= '}';
				}
			}
			
			//Increment social link counter
			$social_link_counter = $social_link_counter + 1;
			
		}
	}

	return $css_sociallinks_output . $css_output;
		
}
add_filter('mp_brick_additional_css', 'mp_stacks_brick_content_output_css_sociallinks', 10, 4);

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
	$sociallinks_per_row = empty( $sociallinks_per_row ) ? '3' : $sociallinks_per_row;
	
	//Feature alignment
	$sociallink_alignment = get_post_meta($post_id, 'sociallink_alignment', true);
	$sociallink_alignment = empty( $sociallink_alignment ) ? 'left' : $sociallink_alignment;

	//Get SocialLinks Output
	$sociallinks_output = '<div class="mp-stacks-sociallinks">';
	
	//Set counter to 0
	$counter = 1;
	
	if ($sociallinks_repeaters ){
		
		$social_link_counter = 0;
		
		//Loop through each sociallink
		foreach( $sociallinks_repeaters as $sociallinks_repeater ){
						
			$sociallinks_output .= '<div class="mp-stacks-sociallink mp-stacks-sociallink-' . $social_link_counter . '">';
								
				//If the user has saved an open type
				if ( !empty($sociallinks_repeater['sociallink_icon_link_type'])){
					$target = $sociallinks_repeater['sociallink_icon_link_type'];
				}
				//If they haven't saved an open type
				else{
					$target = '_parent';
				}
				
				$sociallinks_output .= !empty($sociallinks_repeater['sociallink_icon_link']) ? '<a href="' . $sociallinks_repeater['sociallink_icon_link'] . '" class="mp-stacks-sociallinks-icon-link" target="' . $target . '" title="' . $sociallinks_repeater['sociallink_title']  . '">' : NULL;
										
					//If we should use an image as the sociallind icon
					if ( $sociallinks_repeater['sociallink_icon_type'] == 'sociallink_image' ){
						$sociallinks_output .= '<div class="mp-stacks-sociallinks-icon-container mp-stacks-sociallinks-image">';
						$sociallinks_output .= '</div>';
					}
					//If we should use an icon from the icon font
					else{	
						$sociallinks_output .= '<div class="mp-stacks-sociallinks-icon-container mp-stacks-sociallinks-icon">';
							$sociallinks_output .= '<div class="mp-stacks-sociallinks-icon ' . $sociallinks_repeater['sociallink_icon'] . '" ' . $sociallinks_repeater['sociallink_icon_color'] . '></div>';
						$sociallinks_output .= '</div>';
					}
				
				$sociallinks_output .= !empty($sociallinks_repeater['sociallink_icon_link']) ? '</a>' : NULL;
										
				$sociallinks_output .= $sociallink_alignment == 'center' ? '<div class="mp-stacks-sociallinks-clearedfix"></div>' : NULL;
				
			$sociallinks_output .= '</div>';
			
			
		
				
				
			
			$social_link_counter = $social_link_counter + 1;
		}
	}
	
	$sociallinks_output .= '</div>';
	
	//Content output
	$content_output .= $sociallinks_output;
	
	//Return
	return $content_output;
	
}
add_filter('mp_stacks_brick_content_output', 'mp_stacks_brick_content_output_sociallinks', 10, 3);