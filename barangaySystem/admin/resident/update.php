<?php 
        
        include_once("../../connections/connection.php");

        $con = connection();
$id =$_POST['id'];


if(isset($_POST['submit'])){

    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $firstName =$_POST['firstName'];
    $middleName =$_POST['middleName'];
    $lastName =$_POST['lastName'];
    $age =$_POST['age'];
    $birthDate =$_POST['birthDate'];
    $gender =$_POST['gender'];
    $emailAddress =$_POST['emailAddress'];
    $contactNumber =$_POST['contactNumber'];

     $sql = "UPDATE users SET photo = '$file' , firstName = '$firstName' , middleName = '$middleName', lastName = '$lastName', age = '$age', birthDate = '$birthDate', gender = '$gender', emailAddress = '$emailAddress', contactNumber = '$contactNumber' WHERE id = '$id' ";

        $con->query($sql) or die ($con->error);


echo '<script>alert("Successfully Updated")</script>';
echo'<script>window.location.href = "../resident.php"</script>';

}