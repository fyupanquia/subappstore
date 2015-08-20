//Generates window scroll from anchor links

function goToByScroll(id){
$('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');
} 
