<?php  if(!isset($_SESSION)){session_start();}
        include_once("../connections/connection.php");
            $con = connection(); 
            ?>
<?php if(isset($_SESSION['UserLogin'])){?>
    <?php 
     if(isset($_POST['submited'])){

    $lastname =$_POST['lastname'];     
    $firstname =$_POST['firstname'];
    $middlename =$_POST['middlename'];
    $purok =$_POST['purok'];
    $years =$_POST['years'];
    $months =$_POST['month'];
    $status=$_POST['status'];
    $requesterId=$_POST['requesterId'];
    
 
    $con = connection();
     $sql = "INSERT INTO tblcertificate( id, firstname, middlename, lastname, purokno, years, month, status,requesterId) VALUES 
     ('', '$firstname', '$middlename', '$lastname', '$purok' , '$years', '$months','$status','$requesterId')";

     if ($con->query($sql) === TRUE) {
        echo '<script>alert("Submitted")</script>';
        echo'<script>window.location.href = ""</script>';
      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
        echo'<script>window.location.href = ""</script>';
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
}

/* Full-width input fields */
input[type=text], input[type=number] {
  width: 30%;
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
#resident
{
    width: 45%;
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
    <h1 style="text-align: center;">Requesting Form of Barangay Certificate</h1></br>
    <hr><br>

    <label for="organization" class="name"><b>Name:</b></label><br>
    <input type="text" placeholder="Last Name" name="lastname" id="lastname" required>
    <input type="text" placeholder="First Name" name="firstname" id="firstname" required>
    <input type="text" placeholder="Middle Name" name="middlename" id="lastname"><br>
    <label for="purok"><b>Purok No.:</b></label><br> 
    <input type="text" placeholder="Purok No." name="purok" id="purok"><br>
    <hr>
    <label for="resident"><b>Resident of Atate Bliss For How Many Years?:</b></label><br> 
    <input type="number" placeholder="Years" name="years" id="resident">
    <input type="number" placeholder="Months" name="month" id="resident">
    <input type="hidden" name="status" value="1">
    
 <?php 
    $sql = " SELECT * FROM users where `id` = '".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
$row=$result->fetch_assoc(); ?>
    <input type="hidden" name="requesterId" value="<?php echo $row['id'];?>">
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