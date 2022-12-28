<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
               <title>User Page</title>
               <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
            <style>
            </style>
            </head>
    <body>
        <input type="checkbox" id="nav-toggle">
        <div class="sidebar">
            <div class="sidebar-brand">
            <img  src="../img/atate.png"  alt="user">
            <hr>
            <h2>BRGY ATATE</h2>
                
            </div>
            <div class="sidebar-menu">
                <h2>Menu <span class="las la-tools"></span></h2>
                <ul>
                    <li><a href="home.php" ><Span class="las la-chalkboard-teacher"></Span><span>Home</span></a></li>
                    <li><button class="dropdown-btn"><Span class="las la-receipt"></Span><span id="label">Request Forms</span></button>
                        <div class="dropdown-container">
                            <a href="user_certificate.php"> Brgy Certificate</a>
                            <a href="user_business.php">Business Permit</a>
                            <a href="user_clearance.php">Brgy Clearance</a>
                            <a href="user_indigency.php">Brgy Indigency</a>
                        </div><script src="../js/form.js"></script></li>
                    <li><a href="gymreservation.php" ><Span class="las la-clipboard"></Span><span>Gym Reservation</span></a></li>
                    <li><a href="requested.php" ><Span class="la la-hourglass-half"></Span><span>Request Updates</span></a></li>
                    <li><a href="personal.php" ><Span class="las la-user"></Span><span>Personal</span></a></li>
                </ul>
            </div>
        </div>
        <div class="main-content">
            <header>
                 <h2>
                    <label for="nav-toggle">
                        <span class="las la-bars"></span>
                    </label>
                 </h2>
           <div class="user">
                <a href="aCreate.php"><img src="../img/admin.jpg" width="40px" height="40px" alt="user"></a>
                <div>
                    <button class="click" ><h4> <?php echo $_SESSION['UserLogin'];?> <i  class="las la-bars"></i></h4></button>
                    <div class="list">
                        <button class="links" ><a href="logoutUser.php" class="item">Logout</a></button> 
                        <!-- <button class="links"><a href="setting.php" class="item">Setting</a></button> -->
                        <script src="../js/userdropdown.js"></script>
                    </div>
                    <small>Users</small>
                </div>
            </div>
            </header>
        </div>