<?php 
        
        include_once("../../connections/connection.php");

        $con = connection();
            
        if(isset($_POST['delete'])){

        $id = $_POST['ID'];
        $sql = "DELETE FROM users WHERE id = '$id' ";
        $con->query($sql) or die ($con->error);
        

        echo '<script>alert("Successfully Deleted")</script>';
        echo'<script>window.location.href = "../resident.php"</script>';

}

?>
