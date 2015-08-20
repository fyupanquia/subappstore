<?php 


define("DB_HOST", "localhost");
define("DB_USER", "u680829177_admin");
define("DB_PASSWORD", "_administrador_");
define("DB_DATABASE", "u680829177_sas");



	$Accion=$_REQUEST['q'];
	if (is_callable($Accion)) {
		$Accion();
	}


	function conectados(){
		$response ='';
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		   mysql_select_db(DB_DATABASE);


		$consulta = mysql_query("select id from conectados");
		$num_rows_conectados = mysql_num_rows($consulta);
		$response .= ''.$num_rows_conectados;

		echo $response;
	}


	function conectados2(){
		//header('Content-Type: application/json');
		$response ='';
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		   mysql_select_db(DB_DATABASE);

		for ($i=0; $i < 5 ; $i++) { 
		$consulta = mysql_query("select id from conectados");
		$num_rows_conectados = mysql_num_rows($consulta);
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


		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		   mysql_select_db(DB_DATABASE);

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

			$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
				   mysql_select_db(DB_DATABASE);

			    $response ='';

				$mejor0 = 0;$user0='';
				$mejor1 = 0;$user1='';
				$mejor2 = 0;$user2='';
				$mejor3 = 0;$user3='';
				$mejor4 = 0;$user4='';
				$mejor5 = 0;$user5='';
				$todos = 0;


				$sql=" SELECT id FROM productos";
                $consulta =  mysql_query($sql);
                $todos = mysql_num_rows($consulta);

				$sql=" SELECT count(p.id) total ,u.usuario FROM productos as p left join usuarios as u on p.idusuario = u.id ";
                $sql .="group by idusuario order by total desc limit 6";
                $consulta =  mysql_query($sql);

                $num_rows_mejores = mysql_num_rows($consulta);

                for ($i=0; $i < $num_rows_mejores ; $i++) { 
                	$fila = mysql_fetch_array($consulta);

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