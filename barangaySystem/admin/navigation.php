<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
               <title>Administrator Page</title>
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
                    <li><a href="dashboard.php" ><Span class="las la-chalkboard-teacher"></Span><span>DashBoard</span></a></li>
                    <li><a href="official.php" ><Span class="las la-user-circle"></Span><span>Brgy Officials</span></a></li>
                    <li><a href="resident.php" ><Span class="las la-users"></Span><span>Brgy Residents</span></a></li>
                    <hr>
                    <li><button class="dropdown-btn"><Span class="las la-receipt"></Span><span id="label">Request Forms</span></button>
                        <div class="dropdown-container">
                            <a href="certificate.php">Brgy Certificate</a>
                            <a href="business.php">Business Permit</a>
                            <a href="clearance.php">Brgy Clearance</a>
                            <a href="indigency.php">Brgy Indigency</a>
                        </div><script src="../js/form.js"></script></li>
                        <li><a href="gymreservation.php" ><Span class="las la-clipboard"></Span><span>Gym Reservation</span></a></li>
                        <li><a href="pending.php" ><Span class="las la-receipt"></Span><span>Requester Updates</span></a></li>
                   <hr>
                    <li><a href="user.php" ><Span class="las la-user"></Span><span>User</span></a></li>
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
                    <button class="click" ><h4> <?php echo $_SESSION['Name'];?> <i  class="las la-bars"></i></h4></button>
                    <div class="list">
                        <button class="links" href="logoutAdmin"><a href="logoutAdmin.php" class="item">Logout</a></button> 
                        <!-- <button class="links"><a href="setting.php" class="item">Setting</a></button> -->
                        <script src="../js/userdropdown.js"></script>
                    </div>
                    <small>Administrator</small>
                </div>
            </div>
            </header>
        </div>