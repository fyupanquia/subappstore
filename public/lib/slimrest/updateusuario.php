<?php

    require 'app/libs/connect.php';

    if (!empty($_POST)) {

    $nombre     = $_POST['nombre'];
    $apellido   = $_POST['apellido'];
    $email      = $_POST['email'];
    $direccion  = $_POST['direccion'];
    $telefono   = $_POST['telefono'];
    $bandera    = $_POST['bandera'];
    $password   = $_POST['password'];
    $id         = $_POST['idusuario'];

            $connection = getConexion();

             try{

                if($bandera=="1"){

                    $dbh = $connection->prepare("UPDATE usuarios SET nombres=?,apellidos=?,email=?,direccion=?,telefono=?,password=? WHERE id=?");

                    $dbh->bindParam(1,$nombre);
                    $dbh->bindParam(2,$apellido);
                    $dbh->bindParam(3,$email);
                    $dbh->bindParam(4,$direccion);
                    $dbh->bindParam(5,$telefono);
                    $dbh->bindParam(6,$password);
                    $dbh->bindParam(7,$id);
                    $dbh->execute();

                    $connection  = null;
                    $usuarioresponse = (object) array('id' => 1);

                }else{

                    $dbh = $connection->prepare("UPDATE usuarios SET nombres=?,apellidos=?,email=?,direccion=?,telefono=? WHERE id=?");

                    $dbh->bindParam(1,$nombre);
                    $dbh->bindParam(2,$apellido);
                    $dbh->bindParam(3,$email);
                    $dbh->bindParam(4,$direccion);
                    $dbh->bindParam(5,$telefono);
                    $dbh->bindParam(6,$id);
                    $dbh->execute();

                    $connection  = null;
                    $usuarioresponse = (object) array('id' => 1);
                }

             }catch(PDOException $e) {

                     $usuarioresponse = (object) array('id' => 0 );
            }
   
                    
                    

       echo json_encode($usuarioresponse);    

    }

?>