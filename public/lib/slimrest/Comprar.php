<?php 
	
	require 'app/libs/connectbd_updated.php';

    $db = new ConnectBD();


	if (!empty($_POST)) {

			$total = $_POST['total'];
			$cantdoradas = $_POST['cantdoradas'];
			$cantplateadas = $_POST['cantplateadas'];
			$numtarjeta = $_POST['numtarjeta'];
			$clavtarjeta = $_POST['clavtarjeta'];
			$idusuario = $_POST['idusuario'];

			$conexion = $db->connect();


						$result_saldo = $conexion->query("SELECT id,saldo FROM tarjetas WHERE numero=".$numtarjeta." AND clave=".$clavtarjeta."");
						$num_rows_tarjestas = $result_saldo->num_rows;

						if ($num_rows_tarjestas == 1){

			                      		$registro=$result_saldo->fetch_assoc();
			                      		$saldo = $registro['saldo'];
			                      		$id = $registro['id'];

			                      		if($saldo>=$total){
			                      			$newsaldo = $registro['saldo']-$total;
			                      			$sql = "UPDATE tarjetas SET saldo =".$newsaldo." WHERE id=".$id."";
			                      			$sql2 = "UPDATE saldo SET oro =oro + ".$cantdoradas." , plata=plata+".$cantplateadas." WHERE idUsuario=".$idusuario."";
			                      			$result = $conexion->query($sql);
			                      			$result2 = $conexion->query($sql2);
			                      			if($result && $result2){
			                      				$response = (object) array('idUsuario' => '1');
			                      			}else{
			                      				$response = (object) array('idUsuario' => '2');
			                      			}
			                      		}else{
			                      			$response = (object) array('idUsuario' => '3');
			                      		}

			                        echo json_encode($response);
			                        exit();
			            }else{
			            	$response = (object) array('idUsuario' => '0');
	            			echo json_encode($response);
			                        exit();
							}
			            }

		

 ?>