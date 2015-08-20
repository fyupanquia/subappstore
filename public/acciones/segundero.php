<?php 


 	define("DB_HOST", "localhost");
	define("DB_USER", "u359017581_admin");
	define("DB_PASSWORD", "_administrador_");
	define("DB_DATABASE", "u359017581_sasp");

	
	

	$Accion=$_REQUEST['q'];
	if (is_callable($Accion)) {
		$Accion();
	}


	function updatesegundo(){
		$conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		//$sql = "select * from salas";
		$sql = "UPDATE salas set trestante=trestante-1 WHERE trestante>0";
		$response = $conexion->query($sql);

		echo $response;

	}



 ?>