<?php 
        
        include_once("../../connections/connection.php");

        $con = connection();
$id =$_GET['id'];


$sql = "UPDATE reservation SET status = '3' WHERE id = '$id' ";

$con->query($sql) or die ($con->error);


echo '<script>alert("Successfully Updated")</script>';
echo'<script>window.location.href = "../pending.php"</script>';
