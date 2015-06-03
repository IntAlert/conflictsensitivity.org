jQuery(document).ready(function($) {
	var stickyNavTop = jQuery('#site-navigation').offset().top;

	var stickyNav = function(){
		var scrollTop = jQuery(window).scrollTop();
			 
		if (scrollTop > stickyNavTop) { 
			jQuery('body').addClass('stickynav');
		} else {
			jQuery('body').removeClass('stickynav'); 
		}
	};

	stickyNav();

	jQuery(window).scroll(function() {
		stickyNav();
	});
});