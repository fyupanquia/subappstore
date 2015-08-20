<?php 
	
	require 'app/libs/connectbd.php';

    $db = new ConnectBD();
    $db->connect();

	if (!empty($_POST)) {

			$filtro = $_POST['filtro'];
			$conexion = $db->connect();

			if($filtro=="all"){
						$result_productos = mysql_query("SELECT p.id, p.idusuario,u.level, u.usuario, p.nombre, p.descripcion,p.imagen,
						 p.cantidad, p.precio, p.created_at, p.updated_at, p.imagen,c.categoria FROM productos as p inner join usuarios as u on u.id = p.idusuario inner join categorias as c on c.id=p.idcategoria 
						  INNER JOIN salas AS ss ON ss.idproducto=p.id WHERE ss.estado=0  ORDER BY p.id DESC ");
						$num_rows_productos = mysql_num_rows($result_productos);

						if ($num_rows_productos > 0) {

			                      for ($i=1; $i <= $num_rows_productos ; $i++) { 

			                      		$registro=mysql_fetch_array($result_productos);

			                      		$result_productos_id = mysql_query("SELECT COUNT(id) as cantidad_imgs FROM imagenes WHERE grupo ='".$registro['imagen']."'");
			                      		$cantidad_imgs = mysql_fetch_array($result_productos_id);

			                      		$losproductos[]=array("cantidadtotal"=>$num_rows_productos,
			                                                "id"=>$registro['id'],
			                                                "idusuario"=>$registro['idusuario'],
			                                                "usuario"=>$registro['usuario'],
			                                                "nombre"=>$registro['nombre'],
			                                                "descripcion"=>$registro['descripcion'],
			                                                "cantidad"=>$registro['cantidad'],
			                                                "precio"=>$registro['precio'],
			                                                "created_at"=>$registro['created_at'],
			                                                "updated_at"=>$registro['updated_at'],
			                                                "imagen"=>$registro['imagen'],
			                                                "categoria"=>$registro['categoria'],
			                                                "level"=>$registro['level'],
			                                                "imagenes"=>$cantidad_imgs['cantidad_imgs'],
			                                                );

			                        }

			                        echo json_encode($losproductos);
			                        exit();
			            }
	            }else if($filtro=="this"){
	            	$idusuario = $_POST['vfiltro'];
						$result_productos = mysql_query("SELECT p.id, p.idusuario,u.level, u.usuario, p.nombre, p.descripcion,p.imagen,
						 p.cantidad, p.precio, p.created_at, p.updated_at, p.imagen,c.categoria FROM productos as p inner join usuarios as u on u.id = p.idusuario inner join categorias as c on c.id=p.idcategoria INNER JOIN salas AS ss ON ss.idproducto=p.id WHERE ss.estado=0 AND p.idusuario=".$idusuario."  ORDER BY p.id DESC ");
						$num_rows_productos = mysql_num_rows($result_productos);

						if ($num_rows_productos > 0) {

			                      for ($i=1; $i <= $num_rows_productos ; $i++) { 
			                      		$registro=mysql_fetch_array($result_productos);

			                      		$result_productos_id = mysql_query("SELECT COUNT(id) as cantidad_imgs FROM imagenes WHERE grupo ='".$registro['imagen']."' ");
			                      		$cantidad_imgs = mysql_fetch_array($result_productos_id);


			                      		$losproductos[]=array("cantidadtotal"=>$num_rows_productos,
			                                                "id"=>$registro['id'],
			                                                "idusuario"=>$registro['idusuario'],
			                                                "nombre"=>$registro['nombre'],
			                                                "descripcion"=>$registro['descripcion'],
			                                                "cantidad"=>$registro['cantidad'],
			                                                "precio"=>$registro['precio'],
			                                                "created_at"=>$registro['created_at'],
			                                                "updated_at"=>$registro['updated_at'],
			                                                "categoria"=>$registro['categoria'],
			                                                "imagen"=>$registro['imagen'],
			                                                "usuario"=>$registro['usuario'],
			                                                "level"=>$registro['level'],
			                                                "imagenes"=>$cantidad_imgs['cantidad_imgs'],
			                                                );
			                        }

			                        echo json_encode($losproductos);
			                        exit();
			            }
	            }else if($filtro=="thisWin"){
	            	$idusuario = $_POST['vfiltro'];
						$result_productos = mysql_query("SELECT p.id, p.idusuario,u.level, u.usuario, p.nombre, p.descripcion,p.imagen,
						 p.cantidad, p.precio, p.created_at, p.updated_at, p.imagen,c.categoria FROM productos as p inner join usuarios as u on u.id = p.idusuario inner join categorias as c on c.id=p.idcategoria INNER JOIN salas AS ss ON ss.idproducto=p.id WHERE ss.estado=1 AND ss.iduserganador=".$idusuario."  ORDER BY p.id DESC");
						$num_rows_productos = mysql_num_rows($result_productos);

						if ($num_rows_productos > 0) {

			                      for ($i=1; $i <= $num_rows_productos ; $i++) { 
			                      		$registro=mysql_fetch_array($result_productos);

			                      		$result_productos_id = mysql_query("SELECT COUNT(id) as cantidad_imgs FROM imagenes WHERE grupo ='".$registro['imagen']."' ");
			                      		$cantidad_imgs = mysql_fetch_array($result_productos_id);


			                      		$losproductos[]=array("cantidadtotal"=>$num_rows_productos,
			                                                "id"=>$registro['id'],
			                                                "idusuario"=>$registro['idusuario'],
			                                                "nombre"=>$registro['nombre'],
			                                                "descripcion"=>$registro['descripcion'],
			                                                "cantidad"=>$registro['cantidad'],
			                                                "precio"=>$registro['precio'],
			                                                "created_at"=>$registro['created_at'],
			                                                "updated_at"=>$registro['updated_at'],
			                                                "categoria"=>$registro['categoria'],
			                                                "imagen"=>$registro['imagen'],
			                                                "usuario"=>$registro['usuario'],
			                                                "level"=>$registro['level'],
			                                                "imagenes"=>$cantidad_imgs['cantidad_imgs'],
			                                                );
			                        }

			                        echo json_encode($losproductos);
			                        exit();
			            }
	            }		
		}

		

 ?>