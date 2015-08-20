<?php

function getConexion(){

	try{

		$username = "u359017581_admin";
		$password=  "_administrador_";

 $conexion = new PDO("mysql:host=localhost;dbname=u359017581_sasp",$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
 $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $conexion->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
 $conexion->exec("SET NAMES 'utf8';");

	}catch(PDOException $ex)
	{
		echo "Error:".$ex->getMessage();
 	}

 	return $conexion;
}