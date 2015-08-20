<?php 
	
	require 'app/libs/connectbd_updated.php';

    $db = new ConnectBD();
$conexion = $db->connect();
	$sqlSubasta = "SELECT u.nombres,u.apellidos,u.email,u.direccion,u.telefono,u.usuario,p.nombre,p.descripcion,p.precio,c.categoria";
												$sqlSubasta .= " from usuarios AS u INNER JOIN productos AS p ON u.id=p.idusuario";
												$sqlSubasta .= " INNER JOIN categorias AS c ON c.id=p.idcategoria WHERE p.id=80";

												$resultmsm = $conexion->query($sqlSubasta);
												$numresult = $resultmsm->num_rows;

												$sqlSubasta2 = "Select * from usuarios WHERE id=60";

												$resultmsm2 = $conexion->query($sqlSubasta2);
												$numresult2 = $resultmsm2->num_rows;

												echo $numresult.' -- '.$numresult2;

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
										 	 	
										 	 }

										 }else{
										 	
										 }

									}else{
										
									}
 ?>