<?php

function connection(){

    
    $host = "localhost";
    $username = "root";
    $password = "1234";
    $database = "barangaysystem";
    
    $con = new mysqli($host, $username, $password, $database);

    if($con->connect_error){
       
        echo $con->connect_error;
    }
    else{

        return $con;
    }

    
}
?>