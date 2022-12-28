<?php session_start(); 
include_once("../connections/connection.php");

     if(isset($_POST['submited'])){

         
    $organization =$_POST['organization'];
    $event =$_POST['event'];
    $description =$_POST['description'];
    $status =$_POST['status'];
    $date =$_POST['date'];
    $timestart =$_POST['start'];
    $timeend =$_POST['end'];
    $con = connection();
     $sql = "INSERT INTO reservation( organization_name,name_of_event, description, status, date, start_from, end_to) VALUES ('$organization', '$event', '$description','$status', '$date', '$timestart' , '$timeend')";

     if ($con->query($sql) === TRUE) {
        echo '<script>alert("Submitted")</script>';
        echo'<script>window.location.href = "gymreservation.php"</script>';
      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
        echo'<script>window.location.href = "gymreservation.php"</script>';
      }
 
        
    }
?>
<?php if(isset($_SESSION['UserLogin'])){?>
    <link rel="stylesheet" href="../css/admin/navigation.css">
<?php include ("navigation.php"); ?>
<style>
    .img {
    background-image: url("../img/palayancity.jpg");
    background-repeat: no-repeat;
    background-size: cover;
}
* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 20px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
textarea{  
  width: 100%;
  height: 70px;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
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
  width: 60%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

</style>
<div class="main-content">
<main class="img">
                <div align="center">
            <form action="" class="box" method="POST">
  <div class="container">
    <h1 style="text-align: center;">Gym Reservation Form</h1></br>
    <p style="text-align: center;">Please fill in this form for Reservation.</p>
    <hr>

    <label for="organization"><b>Organization Name</b></label>
    <input type="text" placeholder="Please Enter Organization Name" name="organization" id="organization" required>

    <label for="event"><b>Name of Event</b></label>
    <input type="text" placeholder="Please Enter Name of Event" name="event" id="event" required>
    <input type="hidden" name="status" id="status" value="1"required>
    
    <label for="event"><b>Event Description</b></label>
    <textarea name="description" id="event" cols="30" rows="10" placeholder="Please Enter The Event Description"></textarea>
    <label for="date"><b>Date:</b></label>
    <input type="date" id="date" name="date" required>
    <br><br>
    <label for="start"><b>Start From:</b></label>
     <input type="time" id="appt" name="start" required>

     <label for="end"><b>End To:</b></label>
     <input type="time" id="apptend" name="end" required>
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
<?php }else { echo header("location: ../index.php"); }?>