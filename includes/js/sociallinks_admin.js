jQuery(document).ready(function($){
	
	mp_sociallinks_reset_icon_types();
		
	$(document).on('change', "[class$='sociallink_icon_typeBBBBB'] select, [class*='sociallink_icon_typeBBBBB '] select", function() {
		mp_sociallinks_reset_icon_types();
	});
	
	function mp_sociallinks_reset_icon_types(){
		
		$("[class$='sociallink_icon_typeBBBBB'] select>option:selected, [class*='sociallink_icon_typeBBBBB '] select>option:selected").map(function() {	
			
			var icon_type = $(this).val();
			
			//If the value of the selected option is sociallink_icon	
			if ( icon_type == 'sociallink_icon' ){
				//Show the icon field
				$(this).parent().parent().parent().find("[class$='sociallink_iconBBBBB'], [class*='sociallink_iconBBBBB ']").css('display', 'block');
				$(this).parent().parent().parent().find("[class$='sociallink_icon_colorBBBBB'], [class*='sociallink_icon_colorBBBBB ']").css('display', 'block');
				$(this).parent().parent().parent().find("[class$='sociallink_icon_color_hoverBBBBB'], [class*='sociallink_icon_color_hoverBBBBB ']").css('display', 'block');
				
				//Hide the the image field
				$(this).parent().parent().parent().find("[class$='sociallink_imageBBBBB'], [class*='sociallink_imageBBBBB ']").css('display', 'none');
				$(this).parent().parent().parent().find("[class$='sociallink_image_hoverBBBBB'], [class*='sociallink_image_hoverBBBBB ']").css('display', 'none');
			}
			else if( icon_type == 'sociallink_image' ){
				//Hide the icon field
				$(this).parent().parent().parent().find("[class$='sociallink_iconBBBBB'], [class*='sociallink_iconBBBBB ']").css('display', 'none');
				$(this).parent().parent().parent().find("[class$='sociallink_icon_colorBBBBB'], [class*='sociallink_icon_colorBBBBB ']").css('display', 'none');
				$(this).parent().parent().parent().find("[class$='sociallink_icon_color_hoverBBBBB'], [class*='sociallink_icon_color_hoverBBBBB ']").css('display', 'none');
				
				//Show the the image field
				$(this).parent().parent().parent().find("[class$='sociallink_imageBBBBB'], [class*='sociallink_imageBBBBB ']").css('display', 'block');
				$(this).parent().parent().parent().find("[class$='sociallink_image_hoverBBBBB'], [class*='sociallink_image_hoverBBBBB ']").css('display', 'block');
			}
			else{
				//Hide both the icon and the image selector fields
				$(this).parent().parent().parent().find("[class$='sociallink_iconBBBBB'], [class*='sociallink_iconBBBBB ']").css('display', 'none');
				$(this).parent().parent().parent().find("[class$='sociallink_icon_colorBBBBB'], [class*='sociallink_icon_colorBBBBB ']").css('display', 'none');
				$(this).parent().parent().parent().find("[class$='sociallink_icon_color_hoverBBBBB'], [class*='sociallink_icon_color_hoverBBBBB ']").css('display', 'none');
				
				$(this).parent().parent().parent().find("[class$='sociallink_imageBBBBB'], [class*='sociallink_imageBBBBB ']").css('display', 'none');
				$(this).parent().parent().parent().find("[class$='sociallink_image_hoverBBBBB'], [class*='sociallink_image_hoverBBBBB ']").css('display', 'none');
			}
						
		});
	}	
	
	//When a new sociallinks gets duplicated
	$(window).on('mp_core_duplicate_repeater_after', function(event, data){
		
		var containing_li = data[0];
		
		//Hide the icon
		$( containing_li ).next( ".mp_sociallinks_repeater_repeater" ).find("[class$='sociallink_iconBBBBB'], [class*='sociallink_iconBBBBB ']").css('display', 'none');
		$( containing_li ).next( ".mp_sociallinks_repeater_repeater" ).find("[class$='sociallink_icon_colorBBBBB'], [class*='sociallink_icon_colorBBBBB ']").css('display', 'none');
		$( containing_li ).next( ".mp_sociallinks_repeater_repeater" ).find("[class$='sociallink_icon_color_hoverBBBBB'], [class*='sociallink_icon_color_hoverBBBBB ']").css('display', 'none');
		
		//Hide image upload fields
		$( containing_li ).next( ".mp_sociallinks_repeater_repeater" ).find("[class$='sociallink_imageBBBBB'], [class*='sociallink_imageBBBBB ']").css('display', 'none');	
		$( containing_li ).next( ".mp_sociallinks_repeater_repeater" ).find("[class$='sociallink_image_hoverBBBBB'], [class*='sociallink_image_hoverBBBBB ']").css('display', 'none');		
		
	});
	
}); 