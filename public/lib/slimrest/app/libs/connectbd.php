<?php
 
class ConnectBD {
 
    function __construct() {
 
    }

    function __destruct() {
         $this->close();
    }
 
    public function connect() {
        require_once 'app/libs/configuration.php';
       @ $con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
       @ mysql_select_db(DB_DATABASE);
        return $con;
    }

    public function close() {
        mysql_close();
    }

    public function query($sql){
       $response = mysql_query($sql);
       return $response;
    }
 
}
 
?>