/**
 * Slider Setting
 * 
 * Contains all the slider settings for the featured post/page slider.
 */
 
jQuery(window).load(function() {
jQuery('.slider-cycle').cycle({ 
	fx:            	'fade',
	pager:  		'#controllers',
	activePagerClass: 	'active',
	timeout:       	1000,
	speed:         	1000,
	pause:         	1,
	pauseOnPagerHover: 	1,
	next:               '#slider-next-btn',
	prev:               '#slider-pre-btn',
	width: 		'100%',
	containerResize: 	0,
	fit:           	1,
	after: 		function (){
					jQuery(this).parent().css("height", jQuery(this).height());
				},
	cleartypeNoBg: 		true

});

});