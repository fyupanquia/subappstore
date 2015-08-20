<?php



$app->get("/usuario/",function() use($app)

{



	try{

		$connection = getConnection();

		$dbh = $connection->prepare("SELECT * FROM usuario");

		$dbh->execute();

		$usuarios = $dbh->fetchAll();

		$connection  = null;



		$app->response->headers->set("Content-type","application/json");

		$app->response->status(200);

		$app->response->body(json_encode($usuarios));



	}catch(PDOException $e)

	{

		echo "Error: ". $e->getMessage();

	}

});



$app->get("/usuario/:codigo",function($codigo) use($app)

{



	try{



		$connection = getConnection();

		$dbh = $connection->prepare("SELECT * FROM usuario where codigo=?");

		$dbh->bindParam(1,$codigo);

		$dbh->execute();

		$usuarios = $dbh->fetchObject();

		$connection  = null;



		$app->response->headers->set("Content-type","application/json");

		$app->response->status(200);

		$app->response->body(json_encode($usuarios));



	}catch(PDOException $e)

	{

		echo "Error: ". $e->getMessage();

	}

});



$app->post("/insertarusuario/",function() use($app)

{

	



    $request = $app->request();

    $body = $request->getBody();

    $event = json_decode($body);



    $usuario = $event->usuario;

	$codigo = $event->codigo;

	

	try{



		$connection = getConnection();

		$dbh = $connection->prepare("INSERT INTO usuarios values(?,?)");

		$dbh->bindParam(1,$usuario);

		$dbh->bindParam(2,$codigo);

		$dbh->execute();

		$connection  = null;



		$obj = (object) array('resultado' => 'Se registro correctamente');

		$app->response->headers->set("Content-type","application/json");

		$app->response->status(200);

		$app->response->body(json_encode($obj));



	}catch(PDOException $e)

	{



		echo "Error: ". $e->getMessage();

		$obj = (object) array('resultado' => 'Se produjo un error');

		$app->response->headers->set("Content-type","application/json");

		$app->response->status(200);

		$app->response->body(json_encode($obj));

	}

});



/*

$app->post("/loginusuario/",function() use($app)

{

	



    $request = $app->request();

    $body = $request->getBody();

    $event = json_decode($body);



    $user = $event->usuario;

	$clave = $event->clave;



	try{



		$connection = getConnection();

		$dbh = $connection->prepare("SELECT * FROM usuario where usuario = ? and clave = ?");

		$dbh->bindParam(1,$user);

		$dbh->bindParam(2,$clave);

		$dbh->execute();

		$usuario = $dbh->fetchObject();

		$connection  = null;



		if($usuario == null){

		

		$usuario = (object) array('codigo' => '-1','usuario' => 'Usuario Incorrecto');

		}

		

		$app->response->headers->set("Content-type","application/json");

		$app->response->status(200);

		$app->response->body(json_encode($usuario));



	}catch(PDOException $e)

	{



		echo "Error: ". $e->getMessage();

	}

});*/