<?php  if(!isset($_SESSION)){session_start();}
        include_once("../connections/connection.php");
            $con = connection(); 
            ?>
<?php if(isset($_SESSION['UserLogin'])){?>
    <?php 
     if(isset($_POST['submited'])){

      $requesterId =$_POST['requesterId'];
    $name =$_POST['name'];
    $type =$_POST['type'];
    $status=$_POST['status'];
  
    $con = connection();
     $sql = "INSERT INTO tblbusiness( id,requesterId, name, type,status) VALUES 
     ('',' $requesterId','$name', '$type','$status')";

     if ($con->query($sql) === TRUE) {
        echo '<script>alert("Submitted")</script>';
        echo'<script>window.location.href = "user_business.php"</script>';
      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
        echo'<script>window.location.href = "user_business.php"</script>';
      }
 
        
    }
?>
    <link rel="stylesheet" href="../css/user/main.css">
    <link rel="stylesheet" href="../css/admin/navigation.css">
<?php include ("navigation.php"); ?>
<style>
    .container {
        margin-top:30px;
  padding: 20px;
  background-color: white;
  width:50%;
  border-radius: 40px;
  margin-left:auto;
  margin-right:auto;
  text-align:center;
}

/* Full-width input fields */
input[type=text], input[type=number] {
  width: 80%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=number]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 30%;
  opacity: 0.9;
  border-radius: 40px;
}

.registerbtn:hover {
  opacity: 1;
}
#purpose
{
    width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
</style>
<div class="main-content">
<main class="img">

            <form action="" class="box" method="POST">
  <div class="container">
    <h1 style="text-align: center;">Requesting Form of Business Permit</h1></br>
    <hr><br>

    <label for="name" class="name"><b>Name of Business / OWNER:</b></label><br>
    <input type="text" placeholder="Name of Business / OWNER:" name="name" id="name" required><br>
    <?php 
    $sql = " SELECT * FROM users where `id` = '".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
$row=$result->fetch_assoc(); ?>
    <input type="hidden" name="requesterId" value="<?php echo $row['id'];?>">
    <hr>
    <label for="type"><b>Type of Business:</b></label><br> 
    <input type="text" placeholder="Type of Business" name="type" id="type">
    <input type="hidden" name="status" value="1">
    
    
    <hr id="hr">
<div align="center">
    <input type="submit" name="submited" class="registerbtn" style="font-size:20px;" value="Submit">
</div>
  </div>
</form>
</div>


</main>
</div>

</body>
</html>
<?php }else { echo header("location: index.php"); }?>