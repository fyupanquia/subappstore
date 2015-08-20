<?php

    	require 'app/libs/connectbd_updated.php';



    if (!empty($_POST)) {
	 $db = new ConnectBD();
		$posicion     = $_POST['posicion'];
		$columnas = array("descripcion","mision","vision","funcionamiento","observaciones");
		

		$sql = "SELECT ". $columnas[$posicion] ." from descripciones WHERE id=1";
		$conexion = $db->connect();

		$descripcion_campo = $conexion->query($sql);

		$num_rows = $descripcion_campo->num_rows;

		if ($num_rows > 0) {

				$registro=$descripcion_campo->fetch_assoc();

 				$reponse[]=array( "descripcion" => $registro[$columnas[$posicion]]);

		}else{
				$reponse[]=array( "descripcion" => "null");
		}

		 echo json_encode($reponse) ;
   }