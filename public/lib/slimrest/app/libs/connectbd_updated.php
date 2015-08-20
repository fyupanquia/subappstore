<?php
 
class ConnectBD {
 
    function __construct() {
 
    }

    function __destruct() {
      //   $this->close();
    }
 
    public function connect() {
        require_once 'app/libs/configuration.php';
      // $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE) or die("Error " . mysqli_error("Error de conexion")); 
      // @ $con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
      // @ mysql_select_db(DB_DATABASE);
        return $mysqli;
    }

    public function close() {
       // mysql_close();
    }

 
}
 
?>