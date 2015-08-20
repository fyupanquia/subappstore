$(document).ready(function() {
	$('#TopNavigation_v2c').children('ul').children('li').children('a').click(showHover);
	var currentClick = 0;
	function showHover() {
		$(this).parent('li').children('ul').toggle();
	}
});