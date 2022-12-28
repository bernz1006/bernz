<?php  if(!isset($_SESSION)){session_start();}
        include_once("../connections/connection.php");
            $con = connection(); 
            
            $sql = " SELECT * FROM users where `id` = '".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
$row=$result->fetch_assoc(); 
            ?>
<?php if(isset($_SESSION['UserLogin'])){?>
    <link rel="stylesheet" href="../css/user/main.css">
    <link rel="stylesheet" href="../css/admin/navigation.css">
    <link rel="stylesheet" href="../css/admin/residentAdd.css">
    <link rel="stylesheet" href="../css/admin/addresidentmodal.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<?php include ("navigation.php"); ?>
<style>
                .img {
    background-image: url("../img/palayancity.jpg");
    background-repeat: no-repeat;
    background-size: cover;
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

.personalinfo
{
    background-color:white;
    width:50%;
    margin-left:auto;
    margin-right:auto;
    padding-top:14px;
    border-style: solid;
   
}
#registerbtn {
  background-color: blue;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
  opacity: 0.9;
  border-radius: 20px;
}

#registerbtn:hover {
  opacity: 1;
}
                </style>
<div class="main-content">
<main class="img">
<div class="personalinfo">
          <font size=5><center>  <h2>Personal Information</h2> </center></font><br>

<table border=1 align=center cellspacing=5 cellpadding=5>

<tr>

<td>
<div Align="center">
<?php echo '<img src="data:image;base64,'.base64_encode($row['photo']).'" alt="image" style="width: 75px; height: 75px;">'; ?>
                          
</div>
</td>

<td style="text-transform: capitalize; font-size: 30px; text-align:center;"><B>Name:</B><?php echo $row['firstName'] . ' '. $row['middleName'].' ' .$row['lastName'];?><br>
</B></td>
</tr>
</table>

</td>

</tr>
<table border=1 align=center cellspacing=5 cellpadding=5>
<tr>

</td>

</tr>
<tr>
<td>
    <div style=" font-size:20px;">
<B>First Name</B><br>
<B>Middle Name</B><br>
<B>Last Name</B><br>
<B>Birthdate</B><br>
<B>Birth Place</B><br>
<B>Age</B><br>
<B>Gender</B><br>
<B>Email Address</B><br>
<B>Contact Number</B><br>
<B>Address:</B>
</div>
</td>
<td>
<div style="text-transform: capitalize; font-size:20px; ">
<b>:</b><?php echo $row['firstName'];?><br>
<b>:</b><?php echo $row['middleName'];?><br>
<b>:</b><?php echo $row['lastName'];?><br>
<b>:</b><?php echo $row['birthDate'];?><br>
<b>:</b><?php echo $row['birthPlace'];?><br>
<b>:</b><?php echo $row['age'];?><br>
<b>:</b><?php echo $row['gender'];?><br>
<div style="text-transform: none;">
<b>:</b><?php echo $row['emailAddress'];?><br>
</div>
<b>:</b><?php echo $row['contactNumber'];?><br>
<b>:</b><?php echo $row['address'];?>
</div>
</td>
</tr>
</table>
</table>
</div>
<div align="center">
<button data-id='<?php echo $row['id']; ?>' id="edit" class="userinfo las la-pen">Edit</button>
</div>
<script>
    
    $(document).ready(function(){
                $('.userinfo').click(function(){
                    var id = $(this).data('id');
                    $.ajax({
                        url: 'userUpdate.php',
                        type: 'post',
                        data: {id: id},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#empModal').modal('show'); 
                        }
                    });
                });
            });
</script>
<style>
#modalcontent{
    background:white;
 

}
.close{
    color: grey;
    float: right;
    font-size: 30px;
    font-weight: bold;
    background: none;
    border: none;
    margin-right: 20px;
}
.close:hover,.close:focus{
    color: red;
    text-decoration: none;
    cursor: pointer;
}
.modal-body .content input{
        border: none;
        border-bottom: 2px solid black;
        outline:none;  
}
.modal-body .content {
    padding: none;
    margin: none;
}
.modal-body .content select{
   border:none;
}
       
        </style>
        <div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog" >
                    <div class="modal-content" id="modalcontent">
                      
                        <div class="modal-header">
                            <h4 class="modal-title">User Info</h4>
                          <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                         
                        </div>
                    </div>
                </div>
        </div>

</main>
</div>

</body>
</html>
<?php }else { echo header("location: index.php"); }?>