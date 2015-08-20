<?php
/*
$response["codigo"] = -1;
echo json_encode($response);*/


$app->post("/loginusuario/",function() use($app)
{
  try{

    $request = $app-> request();
    $body = $request->getBody();
    $datos = json_decode($body);

// Obtengo los parametros de mi json
    $uusuario = $datos->usuario;
     $codigo = $datos->codigo;
    //$clave = $datos->clave;


    $conexion = getConexion();
    //Declaramos sentencia
    $dbh = $conexion->prepare("SELECT * FROM usuarios where usuario= ?");
         //setear un parametro

        $dbh->bindParam(1,$uusuario);
      //$dbh->bindParam(2,$clave);

        // ejecutamos sentencia
        $dbh->execute();
        $usuario = $dbh->fetchObject();
        

        

      $dbh = $conexion->prepare("UPDATE usuarios SET codigo=? WHERE usuario= ? ");
      $dbh->bindParam(1,$codigo);
      $dbh->bindParam(2,$uusuario);
      $dbh->execute();

      if($usuario == null){
          $usuario = (object) array('id' => 0);
      }

      $conexion = null;

      $app->response->headers->set("Content-type","application/json");
      $app->response->status(200);
      $app->response->body(json_encode($usuario));

  }catch(PDOException $ex)
  {
      $usuario = (object) array('id' => -1);
      $app->response->headers->set("Content-type","application/json");
      $app->response->status(200);
      $app->response->body(json_encode($usuario));
  }

});