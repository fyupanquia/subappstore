<?php

    require 'app/libs/connect.php';

    if (!empty($_POST)) {

    $myFile0       = "";
    $myFile1       = "";
    $myFile2       = "";
    $myFile3       = "";
    $myFile4       = "";

    $name0       = "";
    $name1       = "";
    $name2       = "";
    $name3       = "";
    $name4       = "";



    $titulo         = $_POST['titulo'];
    $descripcion    = $_POST['descripcion'];
    $precio         = $_POST['precio'];
    $usuario        = $_POST['usuario'];
    $idusuario      = $_POST['idusuario'];
    $idcategoria      = $_POST['idcategoria'];

    $cont = 0;
    $cont2 = 0;

    utf8_encode($titulo);
    utf8_encode($descripcion);
    utf8_encode($usuario);



    if (!empty($_FILES['myFile0'])) {
        $myFile0 = $_FILES['myFile0'];
        @$name0   = $_POST['name0'];
        $cont++;

        if (!empty($_FILES['myFile1'])) {
        $myFile1 = $_FILES['myFile1'];
        @$name1  = $_POST['name1'];
        $cont++;


            if (!empty($_FILES['myFile2'])) {
            $myFile2 = $_FILES['myFile2'];
            @$name2  = $_POST['name2'];
            $cont++;

                if (!empty($_FILES['myFile3'])) {
                    $myFile3 = $_FILES['myFile3'];
                    @$name3  = $_POST['name3'];
                    $cont++;

                     if (!empty($_FILES['myFile4'])) {
                        $myFile4 = $_FILES['myFile4'];
                        @$name4  = $_POST['name4'];
                        $cont++;
                    }


                }

            }


        }

    }




$grupo  = $idusuario;
$grupo .= str_replace(" ", "",$titulo) ;


        $target_path0 = "uploads/perfiles/".$usuario."/"."productos/";
        

        if ( file_exists($target_path0) ) {

                        $target_path0 = "uploads/perfiles/".$usuario."/"."productos/".$grupo."/";
                          
                        if (!file_exists($target_path0)) {      
                            if(!mkdir($target_path0, 0777)){
                                $productresponse = (object) array('titulo' => 'ERR_CREAR');
                                echo json_encode($productresponse); 
                                exit();
                            }
                        }else{
                            $productresponse = (object) array('titulo' => 'ERR_EXISTS');
                            echo json_encode($productresponse); 
                            exit();
                        }


                } else {

                   if(mkdir($target_path0, 0777)){

                            $target_path0 = "uploads/perfiles/".$usuario."/"."productos/".$grupo."/";
                              
                            if (!file_exists($target_path0)) {  

                                if(!mkdir($target_path0, 0777)){
                                    $productresponse = (object) array('titulo' => 'ERR_CREAR');
                                    echo json_encode($productresponse); 
                                    exit();
                                }

                            }else{
                               $productresponse = (object) array('titulo' => 'ERR_EXISTS');
                               echo json_encode($productresponse); 
                               exit();
                            }
                        
                    }else{
                            $productresponse = (object) array('titulo' => 'ERR_CREAR');
                            echo json_encode($productresponse); 
                            exit();
                    }

                }



         $target_path0 = "uploads/perfiles/".$usuario."/"."productos/".$grupo."/";
            
         for ($i=0; $i < $cont ; $i++) { 
                $target_path = $target_path0 . basename( $_FILES['myFile'.$i]['name']); 
                if(move_uploaded_file($_FILES['myFile'.$i]['tmp_name'], $target_path)) {
                    $cont2++;
                }else{
                    $productresponse = (object) array('titulo' => 'ERR_MOVER');
                    echo json_encode($productresponse); 
                    exit();
                }
         }
         

         if($cont == $cont2){
                    $cont2=0;

                    

                    try{

                    $connection = getConexion();

                    $dbh = $connection->prepare("INSERT INTO imagenes(grupo,imagen,estado) values(?,?,1)");

                    
                    for ($i=0; $i < $cont ; $i++) { 
                        $dbh->bindParam(1,$grupo);
                        $nombre=basename( $_FILES['myFile'.$i]['name']);
                        $dbh->bindParam(2, $nombre );// aqui la aplicacion debe enviar 1nombre.png y esta trayendo nombre.png

                        $dbh->execute();
                        $cont2++;
                    }

                    if($cont == $cont2){
                        
                                $dbh = $connection->prepare("INSERT INTO productos (idusuario,nombre,descripcion,cantidad
                                                        ,precio,created_at,updated_at,imagen,idcategoria)values(?,?,?,1,?,now(),now(),?,?)");
                                $dbh->bindParam(1,$idusuario);
                                $dbh->bindParam(2,$titulo);
                                $dbh->bindParam(3,$descripcion);
                                $dbh->bindParam(4,$precio);
                                $dbh->bindParam(5,$grupo);
                                $dbh->bindParam(6,$idcategoria);
                                $dbh->execute();

                                $productoid = $connection->lastInsertId();

                                $dbh = $connection->prepare("INSERT INTO salas(idproducto,grupo,iduserganador,precio) values (?,?,?,?)");

                                $dbh->bindParam(1,$productoid);
                                $dbh->bindParam(2,$grupo);
                                $dbh->bindParam(3,$idusuario);
                                $dbh->bindParam(4,$precio);
                                $dbh->execute();

                                $productresponse = (object) array('titulo' => 'OK');

                                 echo json_encode($productresponse); 
                                    exit();

                    }

                    
                        

                    }catch(PDOException $e)
                    {

                          $productresponse = (object) array('titulo' => 'ERR');
                          echo json_encode($productresponse); 
                          exit();
                    }



         }
  

    }

?>