<?php 


define("DB_HOST", "localhost");
define("DB_USER", "u359017581_admin");
define("DB_PASSWORD", "_administrador_");
define("DB_DATABASE", "u359017581_sasp");



	$Accion=$_REQUEST['q'];
	if (is_callable($Accion)) {
		$Accion();
	}


	

	function estadisticas(){

		$hoy00 = 0;
		$hoy01 = 0;
		$hoy02 = 0;
		$hoy03 = 0;
		$hoy04 = 0;
		$hoy05 = 0;
		$hoy06 = 0;
		$hoy07 = 0;
		$hoy08 = 0;
		$hoy09 = 0;
		$hoy10 = 0;
		$hoy11 = 0;
		$hoy12 = 0;
		$hoy13 = 0;
		$hoy14 = 0;
		$hoy15 = 0;
		$hoy16 = 0;
		$hoy17 = 0;
		$hoy18 = 0;
		$hoy19 = 0;
		$hoy20 = 0;
		$hoy21 = 0;
		$hoy22 = 0;
		$hoy23 = 0;
		$hoy24 = 0;

		$ayer00 = 0;
		$ayer01 = 0;
		$ayer02 = 0;
		$ayer03 = 0;
		$ayer04 = 0;
		$ayer05 = 0;
		$ayer06 = 0;
		$ayer07 = 0;
		$ayer08 = 0;
		$ayer09 = 0;
		$ayer10 = 0;
		$ayer11 = 0;
		$ayer12 = 0;
		$ayer13 = 0;
		$ayer14 = 0;
		$ayer15 = 0;
		$ayer16 = 0;
		$ayer17 = 0;
		$ayer18 = 0;
		$ayer19 = 0;
		$ayer20 = 0;
		$ayer21 = 0;
		$ayer22 = 0;
		$ayer23 = 0;
		$ayer24 = 0;

		date_default_timezone_set("America/Lima");

		$sql = "select created_at from productos";

		@$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		@		   mysql_select_db(DB_DATABASE);

		$result = mysql_query($sql);

		$fechayer = date("Y-m-d", strtotime("-1 day"));
        $fechahoy = date("Y-m-d");

		while($row = mysql_fetch_array($result))
		{
		
		$date = new DateTime($row['created_at']);
		$thefecha = $date->format('Y-m-d');


         if($thefecha == $fechayer){
         	$hora ='ayer'.$date->format('H');
         	 $$hora = $$hora +1;
         }else if($thefecha == $fechahoy){
         	$hora ='hoy'.$date->format('H');
         	 $$hora = $$hora +1;
         }

		}

		 echo  	$hoy00.','.
				$hoy01.','.
				$hoy02.','.
				$hoy03.','.  
				$hoy04.','.
				$hoy05.','.
				$hoy06.','.
				$hoy07.','.
				$hoy08.','.
				$hoy09.','.
				$hoy10.','.
				$hoy11.','.
				$hoy12.','.
				$hoy13.','.
				$hoy14.','.
				$hoy15.','.
				$hoy16.','.
				$hoy17.','.
				$hoy18.','.
				$hoy19.','.
				$hoy20.','.
				$hoy21.','.
				$hoy22.','.
				$hoy23.','.
				$hoy24.','.
				$ayer00.','.
				$ayer01.','.
				$ayer02.','.
				$ayer03.','.
				$ayer04.','.
				$ayer05.','.
				$ayer06.','.
				$ayer07.','.
				$ayer08.','.
				$ayer09.','.
				$ayer10.','.
				$ayer11.','.
				$ayer12.','.
				$ayer13.','.
				$ayer14.','.
				$ayer15.','.
				$ayer16.','.
				$ayer17.','.
				$ayer18.','.
				$ayer19.','.
				$ayer20.','.
				$ayer21.','.
				$ayer22.','.
				$ayer23.','.
				$ayer24.',';
	}

	function conectados(){
		  $response ='';
		//  @ $con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		//  @ mysql_select_db(DB_DATABASE);

		  $conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

		//$consulta = mysql_query("select id from conectados ");
		//$num_rows_conectados = mysql_num_rows($consulta);

		$consulta = $conexion->query("select id from conectados ");
		$num_rows_conectados = $consulta->num_rows;;
		$response = ''.$num_rows_conectados;

		echo $response;
	}


	function conectados2(){
		//header('Content-Type: application/json');
		$response ='';
		//@$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		//@   mysql_select_db(DB_DATABASE);
		$conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

		for ($i=0; $i <=5 ; $i++) { 
		//$consulta = mysql_query("select id from conectados");
	     $consulta = $conexion->query("select id from conectados");
		//$num_rows_conectados = mysql_num_rows($consulta);
	     $num_rows_conectados = $consulta->num_rows;
		$response .= $num_rows_conectados.',';
		}

		echo $response;
	}

	function torta(){
		$response ='';

		$_500 = 0;
		$_1000 = 0;
		$_1500 = 0;
		$_2000 = 0;
		$_2500 = 0;
		$_2501 = 0;
		$todos = 0;


		//$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		//   mysql_select_db(DB_DATABASE);

		$conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

		/*
		$consulta = mysql_query("select id from productos where precio");
		$todos  = mysql_num_rows($consulta);

		$consulta = mysql_query("select id from productos where precio > 0 and precio < 501");
		$_500  = mysql_num_rows($consulta);

		$consulta = mysql_query("select id from productos where precio > 500 and precio < 1001");
		$_1000  = mysql_num_rows($consulta);

		$consulta = mysql_query("select id from productos where precio > 1000 and precio < 1501");
		$_1500  = mysql_num_rows($consulta);

		$consulta = mysql_query("select id from productos where precio > 1500 and precio < 2001");
		$_2000  = mysql_num_rows($consulta);

		$consulta = mysql_query("select id from productos where precio > 2000 and precio < 2501");
		$_2500  = mysql_num_rows($consulta);

		$consulta = mysql_query("select id from productos where precio > 2500");
		$_2501  = mysql_num_rows($consulta);
		*/

		$consulta = $conexion->query("select id from productos where precio");
		$todos  = $consulta->num_rows;

		$consulta = $conexion->query("select id from productos where precio > 0 and precio < 501");
		$_500  = $consulta->num_rows;

		$consulta = $conexion->query("select id from productos where precio > 500 and precio < 1001");
		$_1000  = $consulta->num_rows;

		$consulta = $conexion->query("select id from productos where precio > 1000 and precio < 1501");
		$_1500  = $consulta->num_rows;

		$consulta = $conexion->query("select id from productos where precio > 1500 and precio < 2001");
		$_2000  = $consulta->num_rows;

		$consulta = $conexion->query("select id from productos where precio > 2000 and precio < 2501");
		$_2500  = $consulta->num_rows;

		$consulta = $conexion->query("select id from productos where precio > 2500");
		$_2501  = $consulta->num_rows;

		$_500 =  ($_500  /$todos )* 100;
		$_1000 = ($_1000 /$todos )* 100;
		$_1500 = ($_1500 /$todos )* 100;
		$_2000 = ($_2000 /$todos )* 100;
		$_2500 = ($_2500 /$todos )* 100;
		$_2501 = ($_2501 /$todos )* 100;

		$response = $_500.','.$_1000.','.$_1500.','.$_2000.','.$_2500.','.$_2501;

		echo $response; 
	}


		function dona(){

			    //  @ $con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
				//  @ mysql_select_db(DB_DATABASE);
				$conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

			    $response ='';

				$mejor0 = 0;$user0='';
				$mejor1 = 0;$user1='';
				$mejor2 = 0;$user2='';
				$mejor3 = 0;$user3='';
				$mejor4 = 0;$user4='';
				$mejor5 = 0;$user5='';
				$todos = 0;


				$sql="SELECT id FROM productos";
                //$consulta =  mysql_query($sql);
                //$todos = mysql_num_rows($consulta);

                $consulta =  $conexion->query($sql);
                $todos = $consulta->num_rows;

				$sql=" SELECT count(p.id) total ,u.usuario FROM productos as p left join usuarios as u on p.idusuario = u.id ";
                $sql .="group by idusuario order by total desc limit 6";
                //$consulta =  mysql_query($sql);
                $consulta =  $conexion->query($sql);

                //$num_rows_mejores = mysql_num_rows($consulta);
                $num_rows_mejores = $consulta->num_rows;

                for ($i=0; $i < $num_rows_mejores ; $i++) { 
                	//$fila = mysql_fetch_array($consulta);
                	$fila =  $consulta->fetch_assoc();

                	$variable = 'mejor'.$i;
                	$variable2 = 'user'.$i;
                	$$variable = $fila['total'];
                	$$variable2 = $fila['usuario'];
                	
                }

                $mejor0 =  ($mejor0  / $todos )* 100;
				$mejor1 =  ($mejor1  / $todos )* 100;
				$mejor2 =  ($mejor2  / $todos )* 100;
				$mejor3 =  ($mejor3  / $todos )* 100;
				$mejor4 =  ($mejor4  / $todos )* 100;
				$mejor5 =  ($mejor5  / $todos )* 100;

				echo  $mejor0.','.$user0.','.$mejor1.','.$user1.','.$mejor2.','.$user2.','.$mejor3.','.$user3.','.$mejor4.','.$user4.','.$mejor5.','.$user5;

		}

	

 ?>
