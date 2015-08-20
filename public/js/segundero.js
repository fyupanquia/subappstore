//segundo();

var b=false;
var secs=0;
$( document ).ready(function() {
    console.log( "ready!" );

    $('#btnStart').click(function(){
    	b=true;
		segundo();
        console.log( "segundero iniciado ... !" );
    });

    $('#btnStop').click(function(){
    	b=false;
        console.log( "segundero detenido ... !" );
    });

});



 function segundo(){
 	if(b){
 		var xmlhttp=new XMLHttpRequest();
              		xmlhttp.onreadystatechange=function() {

	                     if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	                     	console.log(xmlhttp.responseText);
	                     	setTimeout(segundo, 1000);

                            var hr=Math.floor(secs / 3600);
                            var min=Math.floor((secs - (hr * 3600)) / 60);
                            var sec=Math.floor(secs - (hr * 3600) - (min * 60));

                            if(hr<10){ hr="0"+hr; }
                            if(min<10){ min="0"+min; }
                            if(sec<10){ sec="0"+sec; }
                            if(hr){ hr="00"; }
                           
                            $('#segundos').val(hr+':'+min+':'+sec);
                            secs++;
	                     }
	                      
                    }

			            xmlhttp.open("GET","acciones/segundero.php?q=updatesegundo",true);
			            xmlhttp.send();
 	}
 	              	
}