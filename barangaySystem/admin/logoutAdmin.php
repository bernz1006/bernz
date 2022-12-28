<?php 
    session_start();
    unset($_SESSION['UserLogin']);
    unset($_SESSION['Password']);

    echo header("location: ../index.php")
?>