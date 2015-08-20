<?php 
	
	require 'app/libs/connectbd_updated.php';

    $db = new ConnectBD();

	if (!empty($_POST)) {

						$razon = $_POST['razon'];
						$grupo = $_POST['grupo'];

						if($razon=="conectados"){
							$conexion = $db->connect();
										/*
                                 		 $sql   = "         SELECT u.usuario, ss.oro,s.precio, ss.plata, ss.bronce,s.trestante, uu.usuario AS  'uusuario', s.estado ";
										 $sql   .= "			FROM conectados AS c";
										 $sql   .= "			INNER JOIN salas AS s ON  s.grupo = '".$grupo."'";
										 $sql   .= "			INNER JOIN usuarios AS u ON c.idusuario = u.id";
										 $sql   .= "			INNER JOIN saldo AS ss ON c.idusuario = ss.idusuario";
										 $sql   .= "			LEFT JOIN usuarios AS uu ON uu.id = s.iduserganador";
										 $sql   .= "			WHERE c.grupo = '".$grupo."'"; */

										 
										$sql   = " SELECT u.usuario, s.precio,s.trestante, s.estado,ss.oro , ss.plata, ss.bronce,uu.usuario AS 'uusuario' ";
										$sql   .= "  FROM conectados as c INNER JOIN salas AS s ON s.grupo = c.grupo INNER JOIN usuarios";
										$sql   .= "   AS u ON c.idusuario = u.id INNER JOIN saldo AS ss ON c.idusuario = ss.idusuario ";
										$sql   .= "   LEFT JOIN usuarios AS uu ON uu.id = s.iduserganador	WHERE c.grupo = '".$grupo."'";
									 

									$result_conectados = $conexion->query($sql); //mysql_query($sql);
									$num_rows_conectados = $result_conectados->num_rows; //mysql_num_rows($result_conectados);
									if ($num_rows_conectados > 0) {

						                      for ($i=1; $i <= $num_rows_conectados ; $i++) {
						                      		$registro=$result_conectados->fetch_assoc();//mysql_fetch_array($result_conectados);
						                      		if($i==1){
						                      				$losconectados[]=array("cantidadconectados"=>$num_rows_conectados,
						                                                   "usuario"=>$registro['usuario'],
						                                                   "estado"=>$registro['estado'],
						                                                   "precio"=>$registro['precio'],
						                                                   "uusuario"=>$registro['uusuario'],
						                                                   "trestante"=>$registro['trestante'],
						                                                   "oro"=>$registro['oro'],
						                                                   "plata"=>$registro['plata'],
						                                                   "bronce"=>$registro['bronce']
						                                                   );
						                      		}else{
						                      			    $losconectados[]=array("cantidadconectados"=>null,
						                                                   "usuario"=>$registro['usuario'],
						                                                   "estado"=>$registro['estado'],
						                                                   "precio"=>null,
						                                                   "uusuario"=>null,
						                                                   "trestante"=>null,
																		   "oro"=>$registro['oro'],
						                                                   "plata"=>$registro['plata'],
						                                                   "bronce"=>$registro['bronce']
						                                                   );
						                      		}
						                      		
						                        }

						                        echo json_encode($losconectados);
						                        
						            }

						}else if($razon == 'retirarsubasta'){
				        		$conexion = $db->connect();
					        	$idusuario = $_POST['id'];

					        	
					        	$sql ="DELETE FROM conectados WHERE grupo='".$grupo."' and idusuario=".$idusuario;
					        	$result_retiro = $conexion->query($sql);//mysql_query($sql);
								
								if($result_retiro){
									$responseRetirarsubasta[]=array("response"=>1);
								}

								echo json_encode($responseRetirarsubasta);
								

				        }else if($razon == 'conectarsubasta'){
				        		$conexion = $db->connect();
					        	$idusuario = $_POST['id'];
	
					        	
					        	$sql = "INSERT INTO conectados(idusuario,estado,grupo) values(".$idusuario.",1,'".$grupo."')";
					        	$result_ingreso = $conexion->query($sql);// mysql_query($sql);
								
								if($result_ingreso){
									$responseConectarsubasta[]=array("response"=>1);
								}

								echo json_encode($responseConectarsubasta);
								

				        }else if($razon == 'nuevaoferta'){
				        		$conexion = $db->connect();
					        	$idproducto = $_POST['idproducto'];
					        	$idusuario = $_POST['idusuario'];
					        	$monto = $_POST['monto'];

					        	
					        	$sql = "SELECT precio from salas where grupo='".$grupo."' AND idproducto=".$idproducto;


					        	$result_precio = $conexion->query($sql);// mysql_query($sql);
					        	$filaprecio=$result_precio->fetch_assoc();

					        	if($filaprecio['precio']<$monto){
					        		$sql2 = "UPDATE salas set precio=".$monto." , iduserganador=".$idusuario." where grupo='".$grupo."' AND idproducto=".$idproducto;
									$result_update = $conexion->query($sql2);
										if($result_update){

											//$sql3 = "UPDATE saldo set oro=oro-".$monto." WHERE idusuario=".$idusuario;
											//$result_update_saldo = $conexion->query($sql3);
											
											//if($result_update_saldo){
												$responseOfrecer[]=array("response"=>1);
											//}

											
										}else{
											$responseOfrecer[]=array("response"=>0);
										}
					        	}

								echo json_encode($responseOfrecer);					

				        }else if($razon == 'setGanador'){
				        		$conexion = $db->connect();
					        	$idproducto = $_POST['idproducto'];
					        	$idusuario = $_POST['idusuario'];
					        	$monto = $_POST['monto'];
					        	$level = $_POST['level'];
					        	
					        	$sql = "SELECT oro from saldo where idusuario=".$idusuario;
					        	$result_saldo = $conexion->query($sql);// mysql_query($sql);

					        	if($result_saldo){
					        		$filaprecio=$result_saldo->fetch_assoc();
					        		$NewSaldo = $filaprecio['oro']-$monto;
					        		
					        		if($level==1){
					        			$sql1 = "UPDATE saldo set oro=".$NewSaldo." WHERE idusuario=".$idusuario;
					        			$result_update_saldo = $conexion->query($sql1);					        			
					        		}

					        		if(($result_update_saldo && $level==1) || $level==0){
					        			$sql2 = "UPDATE salas set precio='".$monto."' ,iduserganador='".$idusuario."', estado=1 where grupo='".$grupo."' AND idproducto=".$idproducto." ";

										$result_finsubasta = $conexion->query($sql2);
										if($result_finsubasta){

										$sql3 = "UPDATE productos SET precio=".$monto." WHERE id=".$idproducto."";
					        			
										$result_finsubasta3 = $conexion->query($sql3);

										if($result_finsubasta3){
											$responsefinsubasta[]=array("response"=>1);

											### INICIO EMAIL
											error_reporting(0);

											$sqlSubasta = "SELECT u.nombres,u.apellidos,u.email,u.direccion,u.telefono,u.usuario,p.nombre,p.descripcion,p.precio,c.categoria";
												$sqlSubasta .= " from usuarios AS u INNER JOIN productos AS p ON u.id=p.idusuario";
												$sqlSubasta .= " INNER JOIN categorias AS c ON c.id=p.idcategoria WHERE p.id=".$idproducto."";

												$resultmsm = $conexion->query($sqlSubasta);
												$numresult = $resultmsm->num_rows;

												$sqlSubasta2 = "Select * from usuarios WHERE id=".$idusuario."";

												$resultmsm2 = $conexion->query($sqlSubasta2);
												$numresult2 = $resultmsm2->num_rows;

												

									if($numresult>0 && $numresult2>0 ){
												$reg=$resultmsm->fetch_assoc();
												$reg2=$resultmsm2->fetch_assoc();

											$cadena_envio="";

										 require_once 'mail/PHPMailer/class.phpmailer.php';
										 require_once 'mail/PHPMailer/class.smtp.php';
											 $mail = new PHPMailer();
											// $mail = new phpmailer();
											 $mail->PluginDir = "mail/PHPMailer/";
											 $mail->Mailer = "pop3";
											 $mail->Hello = "owlgroup.org"; 
											 $mail->SMTPAuth = true;
											 $mail->SMTPSecure = "tls";
											 $mail->Host = "pop3.owlgroup.org";
											 $mail->Username = "info@owlgroup.org";
											 $mail->Password = "chuleta01";
											 $mail->From = "info@owlgroup.org";		
											 $mail->FromName = "SUBAPPSTORE";
											 $mail->Timeout = 60;
											 $mail->Port = 25;
											 $mail->SMTPDebug = 2;
											 $mail->IsHTML(true);

											 $cadena_envio='
												<!DOCTYPE html>
												<html>
												<head>
												<title></title>
												<meta charset="UTF-8">
												<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1"/>
												</head>
												<body>
														<center><font face="Agency FB" color="a11128" size="16">¡Felicidades!</font><br/>
												USTED ACABA DE GANAR UNA SUBASTA EN "!COMO JUGANDO!"<br/><br/></center>

												A continuación pasaremos a describir los detalles del vendedor y el producto:<br/><br/>
												Nombres : '.$reg['nombres'].'<br/><br/>
												Apellidos : '.$reg['apellidos'].'<br/><br/>
												Email : '.$reg['email'].'<br/><br/>
												Dirección : '.$reg['direccion'].'<br/><br/>
												Teléfono : '.$reg['telefono'].'<br/><br/>
												ALIAS : '.$reg['usuario'].'<br/><br/>
												<br/><br/>
												USTED HA GANADO : '.$reg['nombre'].'<br/>
												'.$reg['descripcion'].'<br/>
												CON UN PRECIO DE : '.$reg['precio'].'<br/>
												CON UN CATEGORIA DE : '.$reg['categoria'].'<br/>
												<hr width="500px" align="left" ><br/>
												PÓNGASE EN CONTACTO CON EL PROPIETARIO DEL PRODUCTO DE LO CONTRARIO SERÁ CALIFICADO NEGATIVAMENTE
												<br/><br/>ATENTAMENTE:<br/><br/>
												<img src="http://subappstore.zz.mu/public/img/logoSubAppStore.png" alt="mail image" width="164" height="160" border="0" boder="0" />
												</body>
												</html>
												';

										 $mail->AddAddress($reg2['email']); 
										 $mail->Subject = 'NUEVA SUBASTA GANADA !!';
										 $mail->Body = utf8_decode($cadena_envio);

										 if($mail->Send()) {

										 	$mail = new PHPMailer();
											// $mail = new phpmailer();
											 $mail->PluginDir = "mail/PHPMailer/";
											 $mail->Mailer = "pop3";
											 $mail->Hello = "owlgroup.org"; 
											 $mail->SMTPAuth = true;
											 $mail->SMTPSecure = "tls";
											 $mail->Host = "pop3.owlgroup.org";
											 $mail->Username = "info@owlgroup.org";
											 $mail->Password = "chuleta01";
											 $mail->From = "info@owlgroup.org";		
											 $mail->FromName = "SUBAPPSTORE";
											 $mail->Timeout = 60;
											 $mail->Port = 25;
											 $mail->SMTPDebug = 2;
											 $mail->IsHTML(true);

											$cadena_envio='
												<!DOCTYPE html>
												<html>
												<head>
												<title></title>
												<meta charset="UTF-8">
												<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1"/>
												</head>
												<body>
														<center><font face="Agency FB" color="a11128" size="16">¡Felicidades!</font><br/>
												USTED ACABA DE GANAR UNA SUBASTA EN "!COMO JUGANDO!"<br/><br/></center>

												A continuación pasaremos a describir los detalles del comprador y el producto:<br/><br/>
												Nombres : '.$reg2['nombres'].'<br/><br/>
												Apellidos : '.$reg2['apellidos'].'<br/><br/>
												Email : '.$reg2['email'].'<br/><br/>
												Dirección : '.$reg2['direccion'].'<br/><br/>
												Teléfono : '.$reg2['telefono'].'<br/><br/>
												ALIAS : '.$reg2['usuario'].'<br/><br/>
												<br/><br/>
												USTED HA SUBASTADO : '.$reg['nombre'].'<br/>
												'.$reg['descripcion'].'<br/>
												CON UN PRECIO DE : '.$reg['precio'].'<br/>
												CON UN CATEGORIA DE : '.$reg['categoria'].'<br/>
												<hr width="500px" align="left" ><br/>
												PÓNGASE EN CONTACTO CON EL PROPIETARIO DEL PRODUCTO DE LO CONTRARIO SERÁ CALIFICADO NEGATIVAMENTE
												<br/><br/>ATENTAMENTE:<br/><br/>
												<img src="http://subappstore.zz.mu/public/img/logoSubAppStore.png" alt="mail image" width="164" height="160" border="0" boder="0" />
												</body>
												</html>
												';

											 $mail->AddAddress($reg['email']); //Puede ser Hotmail 
											 $mail->Subject = 'NUEVA SUBASTA REALIZADA !!';
										 	 $mail->Body = utf8_decode($cadena_envio);
										 	 if($mail->Send()){
										 	 	$responsefinsubasta[]=array("response"=>1);
										 	 	echo json_encode($responsefinsubasta);	
										 	 	exit();
										 	 }

										 }else{
										 	
										 }

									}else{
										
									}

											### FIN EMAIL

										}

											
										}else{
											$responsefinsubasta[]=array("response"=>0);
										}
					        		}else{
					        			$responsefinsubasta[]=array("response"=>2);
					        		}
					        	}else{
					        		$responsefinsubasta[]=array("response"=>3);
					        	}


								echo json_encode($responsefinsubasta);					

				        }
			}







 ?>