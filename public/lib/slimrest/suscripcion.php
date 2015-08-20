<?php



    include 'app/libs/connect.php';

	$mensaje = array("mensaje" => $_POST['descripcion']);

	$parusuario = $_POST['usuario'];


        $connection = getConnection();

        $dbh = $connection->prepare("SELECT codigo FROM usuarios");

        //$dbh->bindParam(1,$parusuario);

        $dbh->execute();

        $usuario = array();

        while ($row = $dbh->fetch()) {

             
              $usuario[] =  $row['codigo'];
                  
        }



        $connection  = null;


	$url = "https://android.googleapis.com/gcm/send";



	$fields = array(

                    'registration_ids'  => $usuario,

                    'data'              => $mensaje,

                    );



	$headers = array( 

                        'Authorization: key=' . 'AIzaSyCHDfizMAnnJfZSSB13WTSx7ofo_m3tM30',

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

    }

 

        // Close connection

    curl_close($ch);

    echo $result;

?>