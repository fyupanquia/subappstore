<?php 

	require 'app\libs\connect.php';


	if (!empty($_POST)) {
		$permiso = $_POST['permiso'];
		$segundo = $_POST['segundo'];

		if($permiso='Y'){

			try{
			 $connection = getConexion();

			 if($segundo > 0){
			 		 $dbh = $connection->prepare("update segundero set segundos=segundos-1 where id=1");			
					 $dbh->execute();
					 $segundo -= 1 ;
					$reponse[]=array("newsegundo"=>$segundo);
			 }else{
			 		$reponse[]=array("newsegundo"=>'-2');
			 }
			 
			 }catch(PDOException $e)
            {
					$reponse[]=array("newsegundo"=>'-1');
            }

            echo json_encode($reponse);    

		}
	}


 ?>