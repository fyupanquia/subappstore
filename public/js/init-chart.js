//chart with points

$( document ).ready(function() {
    

    estadisticas();

         function estadisticas(){
                            console.log('ejecutando metodo estadisticas');
                            var xmlhttp=new XMLHttpRequest();
                            xmlhttp.onreadystatechange=function() {

                                        if (xmlhttp.readyState==4 && xmlhttp.status==200){

                                                    var temp = new Array();
                                                         temp  = xmlhttp.responseText.split(',');



                                            //#################

                                                    if ($("#sincos").length) {
                                                        var sin = [], cos = [];

                                                    
                                                             for (var x = 0 ; x <2; x++) {
                                                                    
                                                                   if(x==0){
                                                                    for (var i = 0; i <= 23; i += 1) {
                                                                                cos.push([i,temp[i]]);
                                                                        }
                                                                    }else if(x==1){
                                                                        var cont=0;
                                                                        for (var i = 24; i <= 47; i += 1) {
                                                                                sin.push([cont,temp[i]]);
                                                                                cont++;
                                                                        }

                                                                    }
                                                                    

                                                             };
                                                        

                                                        var plot = $.plot($("#sincos"),
                                                            [
                                                                { data: sin, label: "ayer"},
                                                                { data: cos, label: "hoy" }
                                                            ], {
                                                                series: {
                                                                    lines: { show: true  },
                                                                    points: { show: true }
                                                                },
                                                                grid: { hoverable: true, clickable: true, backgroundColor: { colors: ["#fff", "#eee"] } },
                                                                yaxis: { min: 0, max: 31 },
                                                                colors: ["#FF0000", "#0000FF"]
                                                            });

                                                    }


                                            //#################

                                                    setTimeout(estadisticas, 3000);
                                        }
                                        console.log( "estadisticas ready ... !" );
                            }

                                                         xmlhttp.open("GET","acciones/datos.php?q=estadisticas",true);
                                                         xmlhttp.send();


        }




                            var previousPoint = null;
                            $("#sincos").bind("plothover", function (event, pos, item) {
                                $("#x").text(pos.x.toFixed(2));
                                $("#y").text(pos.y.toFixed(2));

                                if (item) {
                                    if (previousPoint != item.dataIndex) {
                                        previousPoint = item.dataIndex;

                                        $("#tooltip").remove();
                                        var x = item.datapoint[0].toFixed(2),
                                            y = item.datapoint[1].toFixed(2);

                                        showTooltip(item.pageX, item.pageY,
                                            item.series.label + " a las  " + x + " = " + y+" productos registrados ...");
                                    }
                                }
                                else {
                                    $("#tooltip").remove();
                                    previousPoint = null;
                                }
                            });

                            function showTooltip(x, y, contents) {
                                $('<div id="tooltip">' + contents + '</div>').css({
                                    position: 'absolute',
                                    display: 'none',
                                    top: y - 40,
                                    left: x + 5,
                                    border: '1px solid #fdd',
                                    padding: '4px',
                                    'background-color': '#00E6FF',
                                    opacity: 0.70
                                }).appendTo("body").fadeIn(200);
                            }

                            $("#sincos").bind("plotclick", function (event, pos, item) {
                                if (item) {
                                    $("#clickdata").text("Hora " + item.dataIndex + " de " + item.series.label + ".");
                                    plot.highlight(item.series, item.datapoint);
                                }
                            });




 torta();
                       function torta(){
console.log('ejecutando metodo torta');
                              var xmlhttp=new XMLHttpRequest();
                              xmlhttp.onreadystatechange=function() {

                                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                                    var reponse = xmlhttp.responseText;
                                        
                                         var temp = new Array();
                                         temp  = xmlhttp.responseText.split(',');

                                        

                                    var data = [
                                            { label: "0-500"     , data: temp[0]},
                                            { label: "501-1000"  , data: temp[1]},
                                            { label: "1001-1500" , data: temp[2]},
                                            { label: "1501-2000" , data: temp[3]},
                                            { label: "2001-2500" , data: temp[4]},
                                            { label: ">2500"      , data: temp[5]},
                                        ];

                                                    if ($("#piechart").length) {
                                                    $.plot($("#piechart"), data,
                                                        {
                                                            series: {
                                                                pie: {
                                                                    show: true
                                                                }
                                                            },
                                                            grid: {
                                                                hoverable: true,
                                                                clickable: true
                                                            },
                                                            legend: {
                                                                show: false
                                                            }
                                                        });

                                                    function pieHover(event, pos, obj) {
                                                        if (!obj)
                                                            return;
                                                        percent = parseFloat(obj.series.percent).toFixed(2);
                                                        $("#hover").html('<span style="font-weight: bold; color: ' +
                                                         obj.series.color + '">' + 
                                                         obj.series.label + ' (' + percent + '%)</span>');
                                                    }

                                                    $("#piechart").bind("plothover", pieHover);
                                                }

                                    console.log( "estadisticas torta ... !" );
                                    setTimeout(torta, 2000);
                                }
                            }
                            xmlhttp.open("GET","acciones/datos.php?q=torta",true);
                            xmlhttp.send();

                        }


 dona();
                       function dona(){
console.log('ejecutando metodo dona');
                              var xmlhttp=new XMLHttpRequest();
                              xmlhttp.onreadystatechange=function() {

                                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                                    var reponse = xmlhttp.responseText;
                                      
                                         var temp = new Array();
                                         temp  = xmlhttp.responseText.split(',');


                                  var data = [
                                            { label: temp[1], data: temp[0]},
                                            { label: temp[3], data: temp[2]},
                                            { label: temp[5], data: temp[4]},
                                            { label: temp[7], data: temp[6]},
                                            { label: temp[9], data: temp[8]},
                                            { label: temp[11], data: temp[10]}
                                        ];

                                        if ($("#donutchart").length) {
                                        $.plot($("#donutchart"), data,
                                            {
                                                series: {
                                                    pie: {
                                                        innerRadius: 0.5,
                                                        show: true
                                                    }
                                                },
                                                legend: {
                                                    show: false
                                                }
                                            });
                                    }
                                    console.log( "estadisticas dona ... !" );
                                    setTimeout(dona, 2000);
                                }
                            }
                            xmlhttp.open("GET","acciones/datos.php?q=dona",true);
                            xmlhttp.send();

                        }

var updateInterval = 1000,contador=0;
var data = [], totalPoints = 5;
var cadena='';
var mayor=0;
var contador=0;

$("#updateInterval").val(updateInterval).change(function () {
    var v = $(this).val();
    if (v && !isNaN(+v)) {
        updateInterval = +v;
        if (updateInterval < 1)
            updateInterval = 1;
        if (updateInterval > 2000)
            updateInterval = 2000;
        $(this).val("" + updateInterval);
    }
});

//realtime chart
if ($("#realtimechart").length) {
   var plot;
    var options = {
                            series: { shadowSize: 5 }, // drawing is faster without shadows
                            yaxis: { min: 0, max: 50 }, // mínimo - máximo de unidades
                            xaxis: { show: true }  // ver cuadros de gráfico
                        };





    datos();


    function datos(){
console.log('ejecutando metodo datos');
              var xmlhttp=new XMLHttpRequest();
              xmlhttp.onreadystatechange=function() {

                if (xmlhttp.readyState==4 && xmlhttp.status==200) {

                    var temp = new Array();
                     temp  = xmlhttp.responseText.split(',');
                      var res = [];
                        for (var i = 0; i < temp.length-1; ++i){
                            res.push([i, temp[i]])
                            $("#updateInterval2").val(""+ temp[i] );
                            console.log("> "+temp[i]+"");
                        }

                  plot =  $.plot($("#realtimechart"), [ res ], options);

/*
                    datos2();
                       function datos2(){
console.log('entrando a datos2');
                              var xmlhttp=new XMLHttpRequest();
                              xmlhttp.onreadystatechange=function() {

                                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                                    var reponse = xmlhttp.responseText;
                                    console.log('respuesta'+reponse);
                                    cadena  = cadena + reponse+',';

                                    $("#updateInterval2").val(""+ reponse );
                                    
                                    var num = parseInt(reponse);

                                    if(num>mayor){
                                            mayor=num;
                                            $("#updateInterval2").val(""+ mayor );
                                    }

                                    
                                          if (contador==6){
                                            
                                                var temp = new Array();
                                                temp  = cadena.split(',');
                                           
                                                 var res = [];
                                                for (var i = 0; i < temp.length; ++i)
                                                      res.push([i, temp[i]])

                                                 plot.setData([ res ]);
                                                 plot.draw();
                                                 cadena='';
                                                 contador=0;

                                            }
                                    contador = contador+1;
                                    setTimeout(datos2, updateInterval);
                                }
                            }

                            xmlhttp.open("GET","acciones/datos.php?q=conectados",true);
                            xmlhttp.send();

                        }*/
                        console.log( "estadisticas datos ... !" );
                        setTimeout(datos, updateInterval);
                }
            }
            xmlhttp.open("GET","acciones/datos.php?q=conectados2",true);
            xmlhttp.send();
          
    }
    
}


});


