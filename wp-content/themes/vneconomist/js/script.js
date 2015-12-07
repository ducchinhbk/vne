/*
* Author:      Marco Kuiper (http://www.marcofolio.net/)
*/

$(document).ready(function()
{
	// Variable to set the duration of the animation
	var animationTime = 200;
	
	// Variable to store the colours
	var colours = ["cb202d", "de1d0f", "ff7800", "ffba00", "edd614", "9acd32", "5ba829", "3f7e00", "305d02"];

	// Add rating information box after rating
	var ratingInfobox = $("<div />")
		.attr("id", "ratinginfo")
		.insertAfter($("#rating"));

	// Function to colorize the right ratings
	var colourizeRatings = function(nrOfRatings) {
		$("#rating li a").each(function() {
			if($(this).parent().index() <= nrOfRatings) {
				$(this).stop().animate({ backgroundColor : "#" + colours[nrOfRatings] } , animationTime);
			}
		});
	};
	// Function to uncolorize the right ratings
	var uncolourizeRatings = function(nrOfRatings) {
		$("#rating li a").each(function() {
			if($(this).parent().index() > nrOfRatings) {
				$(this).stop().animate({ backgroundColor : "#cbcbcb" } , animationTime);
			}
		});
	};
	
	
	$('#rating li a').click(function() {
		
		$(this).unbind('mouseout');  
	}).mouseover(function() {
		
		ratingInfobox
			.empty()
			.stop()
			.animate({ opacity : 1 }, animationTime);
		
		// Add the text to the rating info box
		$("<p />")
			.html($(this).html())
			.appendTo(ratingInfobox);
		
		// Call the colourize function with the given index
		colourizeRatings($(this).parent().index());
		uncolourizeRatings($(this).parent().index());
		$('#rating-index').val( ($(this).parent().index()/2) + 1 );
	}).mouseout(function() {
		ratingInfobox
			.stop()
			.animate({ opacity : 0 }, animationTime);
		
		// Restore all the rating to their original colours
		$("#rating li a").stop().animate({ backgroundColor : "#cbcbcb" } , animationTime);
        $('#rating-index').val(0);
	});

    /****Popup login***/
    $('.login-require').click(function(){
        $('#bg-overlay').addClass('modal-backdrop fade in');
        $('#jsModuleLoginSignup').fadeIn("slow");
        
        $('.close').click(function() {
    		$('#jsModuleLoginSignup').fadeOut("slow");
            $('#bg-overlay').removeClass('modal-backdrop fade in');  
    	});
    });
    
    
});