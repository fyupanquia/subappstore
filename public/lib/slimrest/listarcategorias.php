<?php 
	
	require 'app/libs/connectbd_updated.php';

    $db = new ConnectBD();


	if (!empty($_POST)) {

			$filtro = $_POST['filtro'];
			$conexion = $db->connect();

			if($filtro=="all"){
						$result_categorias = $conexion->query("SELECT id,categoria FROM categorias");
						$num_rows_categorias = $result_categorias->num_rows;

						if ($num_rows_categorias > 0) {

			                      for ($i=1; $i <= $num_rows_categorias ; $i++) { 
			                      		$registro=$result_categorias->fetch_assoc();
			                      		
				                      		$lascategorias[]=array(
				                      							"id"=>$registro['id'],
				                                                "categoria"=>$registro['categoria'],
				                              );

			                        }

			                        echo json_encode($lascategorias);
			                        exit();
			            }
	            }			
		}

		

 ?>