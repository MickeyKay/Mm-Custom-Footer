jQuery(document).ready(function() {
	
	var h = window.location.host.toLowerCase();
	jQuery("a[href^='http']:not([href*='" + h + "']), a[hrefjQuery='.pdf'], a[hrefjQuery='.mp3'], a[hrefjQuery='.m4a'], a[hrefjQuery='.wav']").attr("target", "_blank");
	jQuery("a[href^='http://']:not([href*='" + h + "'])").addClass("externalLink");
	jQuery("img").parent().removeClass("externalLink");
	
	// Niceify the HRs
	jQuery('hr').wrap('<div class="hr"></div>');
	
	// Add classes to different types of media links
	jQuery('a[href^="http://"]').addClass('externalLink');
	jQuery('a[href^="http://www.youtube"]').removeClass('externalLink');
	jQuery('a[href^="mailto:"]').addClass('emailLink');
	jQuery('a[href*=".pdf"]').attr({"target":"_blank"});
	jQuery('a[href*=".pdf"]').addClass('pdfLink');
	jQuery("img").parent().removeClass("pdfLink");

	// Add classes to parts of lists
	jQuery('li:last-child').addClass('last');
	jQuery('li:first-child').addClass('first');
	jQuery('.children').parent('li').addClass('parent');

	// The slider being synced must be initialized first
	jQuery('#carousel').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		itemWidth: 214,
		itemMargin: 5,
		asNavFor: '#slider'
	});
	
	jQuery('#slider').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		sync: "#carousel"
	});
  
}); /* end of as page load scripts */


// Executes when complete page is fully loaded, including all iframes, objects and images
jQuery(window).load(function() {

});