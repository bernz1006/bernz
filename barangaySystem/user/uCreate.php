<?php 
    
    include_once("../connections/connection.php");

    $con = connection();

    if(isset($_POST['submit'])){

       $username =$_POST['username'];
       $password =$_POST['password'];
       $lname=$_POST['lastname'];
       $fname =$_POST['firstname'];
       $mname =$_POST['middlename'];
       $bdate=$_POST['bdate'];
       $bplace=$_POST['bplace'];
       $sex=$_POST['ddl_gender'];
       $email=$_POST['email'];
       $contact=$_POST['contact'];
       $address=$_POST['address'];
      

     $sql = "INSERT INTO `users`( `username`, `password`,`photo`, `firstName`,`middleName`,`lastName`, `age`,`birthDate`,`birthPlace`,`gender`,`emailAddress`,`contactNumber`,`dateCreated`,`address` ) VALUES 
     ('$username','$password','','$fname','$mname','$lname','','$bdate','$bplace','$sex','$email','$contact','','$address')";

        $con->query($sql) or die ($con->error);
 
        echo '<script>alert("Submitted")</script>';
        echo'<script>window.location.href = "index.php"</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equive="X-UA-compatible" content="ie=edge">
        <title>Create User Account</title>
     
       <style>
         .container {
        margin-top:20px;
  padding: 10px;
  background-color: white;
  width:27%;
  border-radius: 40px;
  margin-left:auto;
  margin-right:auto;
  font-weight:bold;
}

/* Full-width input fields */
input[type=text], input[type=number], input[type=password]{
  width: 24%;
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
  padding: 6px 10px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 25%;
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
    width: 60%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
body{
  background:lightseagreen;
}
       </style>

    </head>
    <body >
      
    <div class="wrapper">
    <div class="container">
    <h1 style="text-align: center;">Registration form</h1></br>
    <hr>
       <form action="" class="box" method="POST">
            <label>Username</label>
            <input type="text" name="username" id="username"  required >     
    
            <label>Password</label>
            <input type="password" name="password" id="password" required> <br>  
            
         
  
   

    <label for="organization" class="name"><b>Name:</b></label><br>
    <input type="text" placeholder="Last Name" name="lastname" id="lastname" required>
    <input type="text" placeholder="First Name" name="firstname" id="firstname" required>
    <input type="text" placeholder="Middle Name" name="middlename" id="lastname"><br>
    <label>Birthdate</label>
            <input type="date" name="bdate" id="password" required>
            <label>Birthplace</label>
            <input type="text" name="bplace" id="username"  required > 
    <hr>
    
    <label class="">Sex:</label>
                                        <select name="ddl_gender" class="">
                                            <option selected="" disabled="">-Select Sex-</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select><br>
            <label>Email</label>
            <input type="text" name="email" id="email"  required >     
            <label>Contact No.</label>
            <input type="text" name="contact" id="contact"  required >    <br> 
    
            <label>Address</label>
            <input type="text" name="address" id="address" required>
           
    <hr id="hr">
<div align="center">
<input type="submit" name="submit" value="Submit" class="registerbtn">
</div>
  </div>
</form>
</div>
    </body>
</html>
