$(document).ready(function() {
	var resizeHeight = function() {
		var documentSize = $(document).width();
		var windowSize = $(window).width();
		$(".texture_BG").css("max-width", windowSize);
		var fontSizing = windowSize/1050 * 16 + "px";

		if (windowSize >580) {
			$("#home_featured_banners").css("height", $("#home_featured_banners").width()/1350 * 650 + "px");
			$("#homepage_buckets").css("height", $("#home_featured_banners").width()/950 * 116 + "px");
		} else {
			$("#home_featured_banners").css("height", $("#home_featured_banners").width()/1350 * 650 + "px");
			$("#homepage_buckets").css("height", $("#home_featured_banners").width()/950 * 116 + "px");
		}
		
		var headlineSizing = windowSize/1400 * 250 + "%";
		var subheadSizing = windowSize/1250 * 106 + "%";
		var promoBannerCopyTop = windowSize/1250 * 70 + "px";
		var promoBannerCopyTopLess = windowSize/1250 * 30 + "%";
		if (windowSize < 950) {
			if ($("#home_featured_banners").width() > 675) {
				$("body").css("font-size", fontSizing);
				$("#home_featured_banners").find(".more-copy-vertical").css({"top": promoBannerCopyTop});
				$("#home_featured_banners").find(".less-copy-vertical").css({"top": promoBannerCopyTopLess});
				$("#home_featured_banners").find(".banner_copy_vertical").css({"right": "7%"});
				$("#home_featured_banners").find(".banner_copy_vertical_left").css({"left": "7%"});
				$("#home_featured_banners").find(".banner_image_vertical").css("left", "0");
				$("#home_featured_banners").find(".cta").children("a").children("img").css("width", windowSize/1150 * 16 + "px");
				$("#home_featured_banners").find(".gaming_logo").css("bottom", windowSize/1150 * 90 + "px");
			} else {
				$("body").css("font-size", "9px");
				$("#home_featured_banners").find(".more-copy-vertical").css({"top": "10%"});
				$("#home_featured_banners").find(".less-copy-vertical").css({"top": promoBannerCopyTopLess});
				$("#home_featured_banners").find(".banner_copy_vertical").css({"right": "7%"});
				$("#home_featured_banners").find(".banner_copy_vertical_left").css({"left": "7%"});
				$("#home_featured_banners").find(".banner_image_vertical").css("left", "0");
				$("#home_featured_banners").find(".cta").children("a").children("img").css("width", 12 + "px");
				$("#home_featured_banners").find(".gaming_logo").css("bottom", 64 + "px");
			}
		} else {
			if (windowSize > 1750) {
				$("body").css("font-size", "16px");			
				$("#home_featured_banners").find(".more-copy-vertical").css({"top": "26%"});
				$("#home_featured_banners").find(".less-copy-vertical").css({"top": "30%"});
				$("#home_featured_banners").find(".banner_copy_vertical").css({"right": "16%"});
				$("#home_featured_banners").find(".banner_copy_vertical_left").css({"left": "16%"});
				$("#home_featured_banners").find(".banner_image_vertical").css("left", "7%");
				$("#home_featured_banners").find(".cta").children("a").children("img").css("width", 16 + "px");
				$("#home_featured_banners").find(".gaming_logo").css("bottom", windowSize/1150 * 130 + "px");			
			} else if (windowSize > 1550 && windowSize < 1750) {
				$("body").css("font-size", "16px");			
				$("#home_featured_banners").find(".more-copy-vertical").css({"top": "26%"});
				$("#home_featured_banners").find(".less-copy-vertical").css({"top": "30%"});
				$("#home_featured_banners").find(".banner_copy_vertical").css({"right": "12%"});
				$("#home_featured_banners").find(".banner_copy_vertical_left").css({"left": "12%"});
				$("#home_featured_banners").find(".banner_image_vertical").css("left", "4%");
				$("#home_featured_banners").find(".cta").children("a").children("img").css("width", 16 + "px");
				$("#home_featured_banners").find(".gaming_logo").css("bottom", windowSize/1150 * 130 + "px");
			} else {
				$("body").css("font-size", "16px");
				$("#home_featured_banners").find(".more-copy-vertical").css({"top": "20%"});
				$("#home_featured_banners").find(".less-copy-vertical").css({"top": "24%"});
				$("#home_featured_banners").find(".banner_copy_vertical").css({"right": "10%"});
				$("#home_featured_banners").find(".banner_copy_vertical_left").css({"left": "10%"});
				$("#home_featured_banners").find(".banner_image_vertical").css("left", "1%");
				$("#home_featured_banners").find(".cta").children("a").children("img").css("width", 16 + "px");
				$("#home_featured_banners").find(".gaming_logo").css("bottom", windowSize/1150 * 90 + "px");
			}
		}
	}

	$("#home_featured_banners").css("height", $("#home_featured_banners").width()/1350 * 650 + "px");
	$("#homepage_buckets").css("height", $("#home_featured_banners").width()/950 * 116 + "px");
	$(".texture_BG").css("max-width", $(window).width());
	resizeHeight();
	$(window).resize(function(){
		resizeHeight();
	});
});
