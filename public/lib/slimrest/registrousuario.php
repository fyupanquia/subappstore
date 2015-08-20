<?php

    require 'app/libs/connect.php';

    if (!empty($_POST)) {

    $codigo     = $_POST['codigo'];
    $name       = $_POST['name'];
    $nombre     = $_POST['nombre'];
    $apellido   = $_POST['apellido'];
    $email      = $_POST['email'];
    $direccion  = $_POST['direccion'];
    $telefono   = $_POST['telefono'];
    $usuario    = $_POST['usuario'];
    $clave      = $_POST['password'];


    if (empty($_FILES['myFile'])) {
        $response = (object) array('id' => -1);
        die(json_encode($response));
        
    } else {
        $file = $_FILES['myFile'];
    }


         $target_path0 = "uploads/perfiles/".$usuario."/";
         $target_path = $target_path0 . basename( $_FILES['myFile']['name']); 



         if (file_exists($target_path0)) {
        
        } else {
           if(!mkdir($target_path0, 0777)){
                return $usuario = array("id" => 3,);
               
            }
        }

        if(move_uploaded_file($_FILES['myFile']['tmp_name'], $target_path)) {
                    

                try{

                    $connection = getConexion();
                    $dbh = $connection->prepare("INSERT INTO usuarios (nombres,apellidos,email,direccion,telefono,usuario,password,codigo)
                                                    values(?,?,?,?,?,?,?,?) ");
                    $dbh->bindParam(1,$nombre);
                    $dbh->bindParam(2,$apellido);
                    $dbh->bindParam(3,$email);
                    $dbh->bindParam(4,$direccion);
                    $dbh->bindParam(5,$telefono);
                    $dbh->bindParam(6,$usuario);
                    $dbh->bindParam(7,$clave);
                    $dbh->bindParam(8,$codigo);
                    $dbh->execute();


                     $id =  $connection->lastInsertId(); 
                     $dbh2 = $connection->prepare("INSERT INTO saldo (idusuario) values (?)");
                     $dbh2->bindParam(1,$id);
                     $dbh2->execute();

                     $connection  = null;
                    $usuarioresponse = (object) array('id' => 1);
                        

                }catch(PDOException $e)
                {

                     $usuarioresponse = (object) array('id' => 0 );
                }


        } else{
           $usuarioresponse = (object) array('id' => 2);   
        }

       echo json_encode($usuarioresponse);    

    }

?>