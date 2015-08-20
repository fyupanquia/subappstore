<?php

$app->get("/obtenerusuarios",function() use($app)
{
	try{

		$conexion = getConexion();
		//Declaramos sentencia
		$dbh = $conexion->prepare("SELECT * FROM usuario");
        // ejecutamos sentencia
        $dbh->execute();
        //obtener los usuarios
        $usuario = $dbh->fetchAll();
        //cerramos conexion
        $conexion = null;

      $app->response->headers->set("Content-type","application/json");
      $app->response->status(200);
      $app->response->body(json_encode($usuario));

	}catch(PDOException $ex)
	{
       echo "Error: ".$ex->getMessage();
	}

});


$app->get("/obtenerusuarios/:codigo",function($codigo) use($app)
{
  try{

    $conexion = getConexion();
    //Declaramos sentencia
    $dbh = $conexion->prepare("SELECT * FROM
      usuario Where codigo = ?");
         //setear un parametro

        $dbh->bindParam(1,$codigo);

        // ejecutamos sentencia
        $dbh->execute();
        //obtener los usuarios
        $usuario = $dbh->fetchObject();
        //cerramos conexion
        $conexion = null;

      $app->response->headers->set("Content-type","application/json");
      $app->response->status(200);
      $app->response->body(json_encode($usuario));

  }catch(PDOException $ex)
  {
       echo "Error: ".$ex->getMessage();
  }

});

$app->post("/resgistarusuario/",function() use($app)
{
  try{

    $request = $app-> request();
    $body = $request->getBody();
    $datos = json_decode($body);

// Obtengo los parametros de mi json
    $usuario = $datos->usuario;
    $nombre = $datos->nombre;
    $clave = $datos->clave;


    $conexion = getConexion();
    //Declaramos sentencia
    $dbh = $conexion->prepare("SELECT * FROM
      usuario values (null,?,?,?))");
         //setear un parametro

        $dbh->bindParam(1,$usuario);
        $dbh->bindParam(2,$nombre);
        $dbh->bindParam(3,$clave);

        // ejecutamos sentencia
        $dbh->execute();
        //obtener los usuarios
      //  $usuario = $dbh->lastInsertId();
        //cerramos conexion
        $conexion = null;

        //crear un objeto cuando el registro es Exitoso
        $resultado = (object) array('resultado' =>
         'se registro Correctamente');

      $app->response->headers->set("Content-type","application/json");
      $app->response->status(200);
      $app->response->body(json_encode($resultado));

  }catch(PDOException $ex)
  {
       echo "Error: ".$ex->getMessage();

    $resultado = (object) array('resultado' => 'Hubo un Error');

      $app->response->headers->set("Content-type","application/json");
      $app->response->status(200);
      $app->response->body(json_encode($resultado));
  }

});

$app->post("/loginusuario/",function() use($app)
{
  try{

    $request = $app-> request();
    $body = $request->getBody();
    $datos = json_decode($body);

// Obtengo los parametros de mi json
    $usuario = $datos->usuario;
    $clave = $datos->clave;


    $conexion = getConexion();
    //Declaramos sentencia
    $dbh = $conexion->prepare("SELECT * FROM
      usuario where usuario= ? and clave =?");
         //setear un parametro

        $dbh->bindParam(1,$usuario);
        $dbh->bindParam(2,$clave);

        // ejecutamos sentencia
        $dbh->execute();
        //obtener los usuarios
        $usuario = $dbh->fetchObject();
        //cerramos conexion
        $conexion = null;

        //crear un objeto cuando el registro es Exitoso

      $app->response->headers->set("Content-type","application/json");
      $app->response->status(200);
      $app->response->body(json_encode($usuario));

  }catch(PDOException $ex)
  {
       echo "Error: ".$ex->getMessage();


      $app->response->headers->set("Content-type","application/json");
      $app->response->status(200);
      $app->response->body(json_encode($usuario));
  }

});