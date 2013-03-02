/**
 * Core js file
 */
jQuery( document ).ready( function( $ ) {
	$("#homegallery ul").cycle();
	
	$('#slider-posts').cycle({
		fx:     'scrollHorz',
		speed:  'fast',
		timeout: 0,
		fit:1,
		width:700,
		next:   '#next2',
		prev:   '#prev2'
	});
	
	
} );


