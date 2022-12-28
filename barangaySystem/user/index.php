<?php 
       if(!isset($_SESSION)){
        session_start();

       }

    include_once("../connections/connection.php");

    $con = connection();

       { if(isset($_POST['submit'])){

            $username = $_POST['username'];
            $password = $_POST['password'];
            $username = mysqli_real_escape_string($con, $username);
            $password = mysqli_real_escape_string($con, $password);
    $sql = "SELECT * FROM users WHERE username = '$username' AND password='$password'";    
    $user = $con->query($sql) or die ($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows; 
    $_SESSION['userid'] = $row['id'];
    if($total == 1){
        $_SESSION['UserLogin'] = $row['username'];
        $_SESSION['Access'] = $row['password'];


        echo header("location: home.php");
    }
    else{

        echo '<script>alert("Incorrect Username or Password!")</script>';
        echo'<script>window.location.href = "index.php"</script>';
    }

    }
}

 

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equive="X-UA-compatible" content="ie=edge">
        <title>User Login Form</title>
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="stylesheet" href="../css/user/index.css">
        <script src="../js/showpassword.js"></script>
        

    </head>

   
    <body>
        <div class="wrapper">
        <h1>Login Account</h1>
        <form action="" method="post">
        <label>Username</label>
        <input type="text" name="username" id="username"placeholder="Enter Username" required>
        <label>   Password</label>
        <div>
        <input type="Password"  id="password" name="password" placeholder="Enter Password"  class="form-control my-3 p-4" required>
                            <span class="toggleBtn" onclick="myFunction()">
                                <i id="hide1" class="las la-eye"></i>
                                <i id="hide2" class="las la-eye-slash"></i>
                            </span>
                            </div>
        <input type="submit" name="submit" value="Log In">
                        <p>Don't Have an Account? <a href="uCreate.php">Register Here</a></p>

        </form>
        
        </div>
      
  
    </body>
</html>