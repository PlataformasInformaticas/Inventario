<?php
    session_start();

    if (!(isset($_SESSION['loggedin']))){
        header("Location: index.php");
        die();
    }else{
        $now = time(); // checking the time now when home page starts
        if($now > $_SESSION['expire']){
            session_destroy();
            header("Location: index.php");
            die();
        }
    }

?>
