$(document).ready(function() {
	var resizeFont = function() {
		var windowSize = $(window).width();
		var fontSizing = windowSize/950 * 16 + "px";
		var topBannerHeight = windowSize/1100 * 600 + "px";
		var iFrameSizing = windowSize/1100 * .37;
		
		$("#top-banner").css("height", topBannerHeight);
		
		if (windowSize > 1200) {
			$("body").css("font-size", "20px");
			$(".subhead").show();
		} 
		else if (windowSize < 550) {
			$("body").css("font-size", "9px");
			$(".subhead").hide();
		} else {
			$("body").css("font-size", fontSizing);
			$(".subhead").show();
		}
	}

	resizeFont();
	$(window).resize(function(){
		resizeFont();
	});
});