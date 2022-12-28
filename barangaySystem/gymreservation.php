<?php session_start(); 
include_once("../connections/connection.php");
?>
<?php if(isset($_SESSION['UserLogin'])){?> 
    <?php 
     if(isset($_POST['submited'])){

      
    $organization =$_POST['organization'];
    $event =$_POST['event'];
    $status =$_POST['status'];
    $date =$_POST['date'];
    $timestart =$_POST['start'];
    $timeend =$_POST['end'];
    $requesterId =$_POST['requesterId'];
    $con = connection();
     $sql = "INSERT INTO reservation( organization_name,name_of_event, status, date, start_from, end_to,requesterId) VALUES ('$organization', '$event', '$status', '$date', '$timestart' , '$timeend','$requesterId')";

     if ($con->query($sql) === TRUE) {
        echo '<script>alert("Submitted")</script>';
        echo'<script>window.location.href = "gymreservation.php"</script>';
      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
        echo'<script>window.location.href = "gymreservation.php"</script>';
      }
 
        
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
               <title>Users Page</title>
               <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
               <link rel="stylesheet" href="../css/user/uMain.css">
               
               <style>
                #imgs{ 
                    display: block;  
margin-left: auto;  
margin-right: auto; 
background-position: center;
box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.bg-text {

  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 111%;
  left: 63%;
  transform: translate(-50%, -50%);
  width: auto;
  margin-left: auto;  
margin-right: auto;
  padding: 20px;
  text-align: center;
}
.img {
    background-image: url("../img/palayancity.jpg");
    background-repeat: no-repeat;
    background-size: cover;
}
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.sidebar-menu button{
    padding-left: 1rem;
    display: block;
    color: #fff;
    font-size: 1.5rem;
    font-style: italic;
    font-weight: bold;
}

.sidebar-menu button span:first-child{
    font-size: 1.5rem;
    padding-right: 1rem;
    color: rgb(255, 255, 255);
}
.sidebar-menu button.active{
    
    padding-top: 1rem;
    padding-bottom: 1rem;
    color: #0c64bd;
  
}
.sidebar-menu button:hover{
    background: rgb(243, 235, 0);
    padding-top: 1rem; 
    padding-bottom: 1rem;
    color:  rgb(0, 0, 0);
 
}

*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    list-style-type: none;
    text-decoration: none;
    font-family: Georgia, 'Times New Roman', Times, serif;

}
.sidebar{
    width: 345px;
    position: fixed;
    left:0;                                                           top:0;                                                            
    height: 100%;
    background: grey;
     z-index: 1;
    transition: width 300ms;
}

.sidebar-brand h2{
    text-align: center;
    padding: 5px;
    color: white;
}
.sidebar-brand img{ 
    display: block;
    width: 70px;
    height: 70px;
    margin-top: 5px;
    margin-left: auto;
    margin-right: auto;
}              

.sidebar-brand{
    height: 90px;
    padding-left: 1rem 0rem 1rem 2rem;
    color: #0c64bd;
}
.sidebar-brand span{
    display: inline-block;
    padding-right: 1rem;
    padding-left: 1rem;
}
.sidebar h1{
    margin-top: 1rem;
}
.sidebar-menu h2 {
    font-style: italic;
    margin-top: 0rem;
    padding-left: 1rem;
}
.sidebar-menu li {
    width: 100%;
    margin-top: 1.5rem;
    padding-left: 2rem;
}
.sidebar-menu a.active{
    color: black;
    background: darkseagreen;
    padding-top: 1rem;
    padding-bottom: 1rem;
    border-radius: 30px 0px 0px 30px;
}
.sidebar-menu a:hover{
    background: lightgrey;
    padding-top: .1rem;
    padding-bottom: .1rem;
    color:  rgb(0, 0, 0);
    border-radius: 30px 0px 0px 30px;
}
.sidebar-menu button.active{
    color: black;
   
    padding-top: 1rem;
    padding-bottom: 1rem;
    border-radius: 30px 0px 0px 30px;
}
.sidebar-menu button:hover{
    background: lightgrey;
    padding-top: .1rem;
    padding-bottom: .1rem;
    color:  rgb(0, 0, 0);
    border-radius: 30px 0px 0px 30px;
}
.sidebar-menu a{
    padding-left: 1rem;
    display: block;
    color: #fff;
    font-size: 1.5rem;
    font-style: italic;
    font-weight: bold;
}


.sidebar-menu a span:first-child{
    font-size: 1.5rem;
    padding-right: 1rem;
    color: rgb(255, 255, 255);
}
.main-content{
    margin-left: 345px;
}
header{
    background-color:lightseagreen;
    display: flex;
    justify-content: space-between;
    padding: 1rem;
    box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3);
    position: fixed;
    left: 345px;
    width: calc(100% - 345px);
    top: 0;
    z-index: 2;
    transition: left 300ms;
}
#nav-toggle:checked + .sidebar{
    width: 70px;
}
#nav-toggle:checked + .sidebar .sidebar-brand h2 span,
#nav-toggle:checked + .sidebar li {
    padding-left: 1rem;
    text-align: center;
}
#nav-toggle:checked + .sidebar li a{
    padding-right: 0rem;
}

#nav-toggle:checked + .sidebar .sidebar-brand h1 span:last-child,
#nav-toggle:checked + .sidebar li a span:last-child,
#nav-toggle:checked + .sidebar .sidebar-menu h2{
    display: none;
}
#nav-toggle:checked  ~.main-content {
    margin-left: 70px;
}
#nav-toggle:checked  ~.main-content header {
 width: calc(100% - 0px);
 left: 0px;
}
header h2{
    color: rgb(0, 0, 0);
    margin-top:6px;
}
header label .las{
    font-size: 1.7rem;
    padding-left: 1rem;
    position: fixed;
}
header h2 #label{
    padding-left: 3.5rem;
}
.search{
    border: 1px solid  rgb(245, 209, 5);
    border-radius: 30px;
    height: 50px;
    overflow-x: hidden;
}
.search span{
    display: inline-block;
    padding: 0rem 1rem;
    font-size: 1.5rem;
}
.search button{
    background: transparent;
    border: none;
}
.search input {
height: 100%;
padding: 1rem;
margin-left: -.5rem;
border: none;
outline: none;
font-style: normal;
}
.sub{
    display: none;
}
.user{
    display: flex;
    align-items: center;
}
.user img{
    border-radius: 50%;
    margin-right: .5rem;
}
.user small{
    display: inline-block;
    color: #fff;
    
}
main{
    margin-top: 60px;
    padding: 2rem 1.5rem;
    background:darkseagreen;
    min-height: calc(100vh - 90px);
}
.cards{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 2rem;
}.card-single{
    display: flex;
    justify-content: space-between;
    background: linear-gradient( 135deg, #031558, #04a7ed);
    padding: 2rem;
    border-radius: 5px;
    box-shadow: 4px 4px 10px #0c64bd;
}
.card-single div:last-child span {
    background:transparent;
    color:yellow;
    font-size: 3rem;  
}
.card-single div:first-child span {
    background:transparent;
    color: yellow;
    font-size: 1.5rem; 

}
.card-single:last-child{
    background: linear-gradient( 135deg, #031558, #04a7ed);
}

.card-single:last-child h1,
.card-single:last-child div:first-child span,
.card-single:last-child div:last-child span  {
    color: #fff;
   
}
.recent-grid{
    margin-top: 3.5rem;
    display: grid;
    grid-gap: 2rem;
    grid-template-columns: repeat(2, 1fr);
    
}
.recent-grid2{
    display: grid;
    grid-gap: 2rem;
    grid-template-columns: repeat(2, 1fr);
    
}
.card-single:hover{
    background: linear-gradient( -135deg, #031558, #04a7ed);
}
.card {
    background: navajowhite;
}
.card-header,
.card-body {
    padding: 1rem;
}

.card-header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid indigo;

}
.card-header input[type=button]{
    background: #0c64bd;
    border-radius: 10px;
    color: #fff;
    font-size: .8rem;
    padding: .5rem 1rem;
    border: 1px solid  darkblue
}
table{
    width: 100%;
    border-collapse: collapse;
}
thead tr{
    border-top: 1px solid indigo;
    border-bottom: 1px solid indigo;
    
}
thead td{
    font-weight: 700;
}
td{
    padding: .5rem 1rem;
    font-size: 1.2rem;
    border-radius: 2px;
}
tr:nth-child(even){
    background-color: #00b6df;
    border-radius: 5px;
}
.table-responsive{
    width: 100%;
    overflow-x: auto;
}

.user button{
    display: flex;
   background:none;
   border:none;
}
    .click{
       color:black;
    }
    .click:hover{
        color: midnightblue;
    }
    .click,.links{
        font-size: 1.2em;
    }
    .list
    {
        width: 100%;
        position: fixed;
        transform: scaleY(0);
        transform-origin: top;
        transition: .4s;
    }
    .newlist{
        background:transparent;
        transform: scaleY(1);
    }
    .links a{
        background:black;
        color: white;
    }
    .links a:hover{
        color:yellow;
        transform: scale(1.1);
    }
    hr {
  border: 1px solid #f1f1f1;
}

main{
    margin-top: 60px;
    padding: 2rem 1.5rem;
    background:darkseagreen;
    min-height: calc(100vh - 90px);
}
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

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
.box
{
    padding-top:50px;
    width:50%;
    text-align: left;
}
.sidebar-brand h2{
    text-align: center;
    padding: 5px;
    color: white;
}
.sidebar-brand img{ 
    display: block;
    width: 70px;
    height: 70px;
    margin-top: 5px;
    margin-left: auto;
    margin-right: auto;
}    
.user button{
    text-transform: capitalize;
}

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
<br><br><br>
            <div class="sidebar-menu">
                <h2>Menu <span class="las la-tools"></span></h2>
                <ul>
                    <li>
                        <a href="uMain.php"><Span class="las la-chalkboard-teacher"></Span><span>Home Page</span></a>
                    </li>

                    <li>

                        <button class="dropdown-btn"><Span class="las la-receipt"></Span><span>Forms</span>
                        <i class="fa-duotone fa-circle-chevron-down"></i>
  </button>
  <div class="dropdown-container">
  <a href="clearance.php">Brgy. Clearance</a>
    <a href="certificate.php">Brgy. Certificate</a>
    <a href="business.php">Business Permit</a>
  </div>
                    </li>

                    <li>
                        <a href="gymreservation.php" class="active"><Span class="las la-clipboard"></Span><span>Gym Reservation</span></a>
                    </li>

                    <li>
                        <a href="personalInfo.php"><Span class="las la-user-circle"></Span><span>Personal Info.</span></a>
                    </li>
                    

                </ul>

                <script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
            </div>
        </div>
  

        <div class="main-content">
            <header>
                 <h2>
                    <label for="nav-toggle">
                        <span class="las la-bars"></span>
                        <label id="label">GYM RESERVATION</label>
                    </label>
                 </h2>

                 <div class="user">
                    <a href="aCreate.php"><img src="../img/admin.jpg" width="40px" height="40px" alt="user"></a>
                        <div>
                            <button class="click" ><h4> <?php echo $_SESSION['UserLogin'];?> <i  class="las la-bars"></i></h4></button>
                            <div class="list">
        <button class="links" href="logoutAdmin"><a href="logoutUser.php" class="item">Logout</a></button> 
      
       <script src="../js/dropdown.js"></script>
    </div>
                            <small>User</small>
                        </div>
                </div>
            </header>
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
    <input type="hidden" name="requesterId" id="requesterId" value="1"required>
    
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

<?php }else {
        echo header("location: loginUser.php");
}?>