$('.hover-content').hide();

$(document).ready(function() {
	//Tabs for any page that needs it
	$('.tab-content').hide();
	$('#tab-1-content').show();
	$('#tabs').children('a').click(changeContent);
	var currentTab = 0;
	function changeContent(){
		$('.tab-content').hide();
		$('#tabs').children('a').removeClass('selected');
		currentTab = $( this ).attr( 'id' ) + "-content";
		$(document.getElementById(currentTab)).show();
		$(this).addClass('selected');
	}
	
	//Video Expansion
	$('#video-thumbs').children('a').click(expandVideo);
	function expandVideo(){
		$('#video-thumbs').children('a').toggle();
		$('.video').slideToggle();
	}

	//Video Select Class
	$('#video-thumbnails').children('a').click(addSelected);
	function addSelected(){
		$('#video-thumbnails').children('a').removeClass('selected');	
		$(this).addClass('selected');
	}	
	
	//Hover Boxes
	$('.hover-button').hover(showHover, hideHover);
	$('.hover-button').click(showHover);
	$('.hover-button').mouseleave(hideHover);
	$('.hover-content').hover(showHover, hideHover);
	function showHover() {
		$(this).find('.hover-content').show();
	}
	function hideHover(){
		$(this).find('.hover-content').hide();
	}
});