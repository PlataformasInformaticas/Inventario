<?php
    $con;
    include "config.php";
    $con = new mysqli($_DBHOST,$_DBUSER,$_DBPASS,$_DBNAME);
    if($con->connect_errno){
        die ("error, no se pudo conectar.");
    }

?>
