<?php

    include 'app/libs/connect.php';




	$mensaje = array("mensaje" => $_POST['msm']);
    $level = $_POST['level'];


    $connection = getConexion();
    $dbh = '';

    if($level == 1){

         $parusuario = $_POST['name'];

         $dbh = $connection->prepare("SELECT codigo FROM usuarios where usuario=?");

         $dbh->bindParam(1,$parusuario);

         $dbh->execute();


    }else{
        $dbh = $connection->prepare("SELECT codigo FROM usuarios");

       // $dbh->bindParam(1,$parusuario);

        $dbh->execute();

    }


$num_rows = $dbh->rowCount();

if($num_rows==0){

    header('Location: http://subappstore.zz.mu/public/messages/msgerr');
}else{


        $usuario = array();

        while ($row = $dbh->fetch()) {

             
              $usuario[] =  $row['codigo'];
              $b++;     
        }




        $connection  = null;


    $url = "https://android.googleapis.com/gcm/send";



    $fields = array(

                    'registration_ids'  => $usuario,

                    'data'              => $mensaje,

                    );



    $headers = array( 


                        'Authorization: key=' . 'AIzaSyDjF1NOzhE8vSX9-RkBzIsxibrHUVoCQzg',

                        'Content-Type: application/json'

                    );

    



    $ch = curl_init();



    curl_setopt($ch, CURLOPT_URL, $url);

 

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

 

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

 

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));



    $result = curl_exec($ch);

        if ($result === FALSE) {

            die('Curl failed: ' . curl_error($ch));
       header('Location: http://subappstore.zz.mu/public/messages/msgerr');

    }

 

        // Close connection

    curl_close($ch);

   // echo $result;
   header('Location: http://subappstore.zz.mu/public/messages/msgok');
    
}


?>