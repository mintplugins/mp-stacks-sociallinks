jQuery(document).ready(function($){
			
	/**
	 * When someone changes the "Screen Size" controller for the SocialLinks Content-Type
	 *
	 * @since    1.0.0
	 * @link     http://mintplugins.com/doc/
	 */	
	$( document ).on( 'click', '.mp_field_sociallinks_screen_size_controller .brick_screen_size', function(){
				
		var screen_size = $(this).attr( 'mp_stacks_device' );
						
		//Show the other "device" icon buttons (desktop, tablet, mobile etc) when clicked
		if ( $(this).parent().attr( 'mp-area-active' ) == 'closed' ){
			
			//Show all the device icons
			$(this).parent().attr('mp-area-active', 'open' );
			$( this ).parent().find( '.brick_screen_size' ).css( 'display', 'inline-block' );
			
		}
		//Hide the other "device" icon buttons (desktop, tablet, mobile etc) when clicked
		else{
			$(this).parent().attr('mp-area-active', 'closed' );			
			
			//Hide all text options temporarily
			
			//Desktop
			$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_per_row' ).css( 'display', 'none' );
			$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_spacing' ).css( 'display', 'none' );
			$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_size' ).css( 'display', 'none' );
			$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_color' ).css( 'display', 'none' );
			$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_color_hover' ).css( 'display', 'none' );
			
			//Tablet
			$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_per_row_tablet' ).css( 'display', 'none' );
			$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_spacing_tablet' ).css( 'display', 'none' );
			$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_size_tablet' ).css( 'display', 'none' );
			$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_color_tablet' ).css( 'display', 'none' );
			$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_color_hover_tablet' ).css( 'display', 'none' );
			
			//Mobile
			$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_per_row_mobile' ).css( 'display', 'none' );
			$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_spacing_mobile' ).css( 'display', 'none' );
			$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_size_mobile' ).css( 'display', 'none' );
			$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_color_mobile' ).css( 'display', 'none' );
			$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_color_hover_mobile' ).css( 'display', 'none' );
			
			//Show only the icon the user just picked
			$( '.mp_field_sociallinks_screen_size_controller .brick_screen_size' ).css( 'display', 'none' );
		
			$( this ).css( 'display', 'block' );
			
			//If the screen size is "desktop", that's our default so it's a bit different
			if ( screen_size == 'desktop' ){
				
				//Show the controls for the selected screen size
				$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_per_row' ).css( 'display', 'block' );
				$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_spacing' ).css( 'display', 'block' );
				$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_size' ).css( 'display', 'block' );
				$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_color' ).css( 'display', 'block' );
				$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_color_hover' ).css( 'display', 'block' );
								
			
			}
			else{
									
				//Show the text controls for the selected screen size
				$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_per_row_' + screen_size ).css( 'display', 'block' );
				$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_spacing_' + screen_size ).css( 'display', 'block' );
				$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_size_' + screen_size ).css( 'display', 'block' );
				$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_color_' + screen_size ).css( 'display', 'block' );
				$( '#mp_stacks_sociallinks_layout_showhidershowhider_group .mp_field_sociallinks_color_hover_' + screen_size ).css( 'display', 'block' );
				
			}			
			
		}
		
	});
});