<?php  if(!isset($_SESSION)){session_start();}
        include_once("../connections/connection.php");
            $con = connection(); 
            
            
             
$sql = " SELECT * FROM users";
$result=$con->query($sql) or die ($con->error);
$row=$result->fetch_assoc(); 
            
            
            
            


?>
<?php if(isset($_SESSION['UserLogin'])){?>



    <link rel="stylesheet" href="../css/admin/navigation.css">
    <link rel="stylesheet" href="../css/admin/residentAdd.css">
    <link rel="stylesheet" href="../css/admin/addresidentmodal.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

   <?php include ("navsearch.php"); ?>


<style>

    
.row::after {
  content: "";
  clear: both;
  display: table;
}

[class*="col-"] {
    float: right;
}


.col-1 {width: 20%;
margin-top: 20px;}

.col-2 {width: 80%;}

#t5{
    float: left;
    border: 1px solid #ddd;
    padding: 10px;
}
.add{
    padding: 3px;
    }

    td,
th {
    border: 1px solid rgb(190, 190, 190);
    padding: 10px;
}

td {
    text-align: center;
    margin:  200px;
}

tr:nth-child(even) {
    background-color: #eee;
}

th[scope="col"] {
    background-color: #696969;
    color: #fff;
}

th[scope="row"] {
    background-color: #d7d9f2;
}

caption {
    border-radius: 10px;
    background: whitesmoke;
    padding: 10px;
    caption-side: top;
    font-weight: bold; 
    font-size: 20px;
}

table {
    border-collapse: collapse;
    border: 2px solid rgb(200, 200, 200);
    letter-spacing: 1px;
    font-family: sans-serif;
    font-size: .8rem;
    
}


</style>
<div class="main-content">
<main>
      

<div class="row">

<!-- start chart -->
  <div class="col-1">
    
<?php
  $con = mysqli_connect("localhost","root","1234","barangaysystem");
  if($con){
   
  }
?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['age', 'number'],
         <?php
         $sql = "SELECT age, count(*) as number FROM users GROUP BY gender";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['age']."',".$result['number']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Age Percentage of Resident Records'
        };

        var chart = new google.visualization.PieChart(document.getElementById('agechart'));

        chart.draw(data, options);
      }
    </script>
  </head>

  <div>  
                  
                  <div class="chart" id="agechart"></div>  
             </div> 
             <?php
      $con = mysqli_connect("localhost","root","1234","barangaysystem");
      if($con){
       
      }
    ?>
    
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);
    
          function drawChart() {
    
            var data = google.visualization.arrayToDataTable([
              ['age', 'number'],
             <?php
             $sql = "SELECT gender, count(*) as number FROM users GROUP BY gender";
             $fire = mysqli_query($con,$sql);
              while ($result = mysqli_fetch_assoc($fire)) {
                echo"['".$result['gender']."',".$result['number']."],";
              }
    
             ?>
            ]);
    
            var options = {
              title: 'Age Percentage of Resident Records'
            };
    
            var chart = new google.visualization.PieChart(document.getElementById('genderchart'));
    
            chart.draw(data, options);
          }
        </script>
      </head>
    
      <div>  
                      
                      <div class="chart" id="genderchart"></div>  
                 </div> 
      </div>

  <!-- end chart -->

  
<div class="col-2" id="t5" style="overflow-x:auto;">
 

 <table>

   <caption>Resident Records</caption>
   <thead>
  <tr>
  <th colspan="7">Personal Information</th>
  <th colspan="2">Contact</th>
   <th> <input type="button" class="add" id="modalBtn" value="Add Resident">
           </th>
</tr>
   <tr>
       <th scope="col">Photo</th>
       <th scope="col">First Name</th>
       <th scope="col">Middle Name</th>
       <th scope="col">Last Name</th>
       <th scope="col">BirthDay</th>
       <th scope="col">Gender</th>
       <th scope="col">Age</th>
       <th scope="col">Phone Number</th>
       <th scope="col">Email</th>
       <th scope="col">Actions</th>
   </tr>
   </thead>
                        <tbody id="output">
   <tr>
   <?php 
              
              $query = "select * from users";
              $result = mysqli_query($con,$query);      
?>     
                      <?php while($row = mysqli_fetch_array($result)){ ?>
                          <tr>
                             
                          <td><?php echo '<img src="data:image;base64,'.base64_encode($row['photo']).'" alt="image" style="width: 50px; height: 50px;">'; ?></td>
                              <td><?php echo $row['firstName'];?></td>
                              <td><?php echo $row['middleName'];?></td>
                              <td><?php echo $row['lastName'];?></td>
                              <td><?php echo $row['birthDate']; ?></td>
                              <td><?php echo $row['gender']; ?></td>
                              <td><?php echo $row['age']; ?></td>
                              <td><?php echo $row['contactNumber']; ?></td>
                              <td id="email"><?php echo $row['emailAddress']; ?></td>
                              <td><button data-id='<?php echo $row['id']; ?>' id="edit" class="userinfo las la-pen">Edit</button>
                              <form action="resident/delete.php" method="post">
                 <button type="submit" id="delete" name="delete"><span class="las la-trash"></span>Delete</button><input type="hidden" name="ID" value="<?php echo $row['id'];?>">
                  </form>
              </td>
                 
                          </td>
                          </tr>
                      <?php } ?>
   </tr>
   </tbody>
</table>
<script type="text/javascript">
  $(document).ready(function(){
    $("#search").keypress(function(){
      $.ajax({
        type:'POST',
        url:'resident/search.php',
        data:{
          name:$("#search").val(),
        },
        success:function(data){
          $("#output").html(data);
        }
      });
    });
  });
</script>
</div>

<script src="../js/userinfo.js"></script>
        </div> 
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

<!-- add modal -->
<div id="simpleModal" class="modal">
    <div class="modal-content">
       
        
<?php 
    

     if(isset($_POST['submit'])){

    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $firstName =$_POST['firstName'];
    $middleName =$_POST['middleName'];
    $lastName =$_POST['lastName'];
    $age =$_POST['age'];
    $birthDate =$_POST['birthDate'];
    $gender =$_POST['gender'];
    $emailAddress =$_POST['emailAddress'];
    $contactNumber =$_POST['contactNumber'];

     $sql = "INSERT INTO `users`( `photo`,`firstName`, `middleName`, `lastName`, `age`, `birthDate`, `gender`, `emailAddress`, `contactNumber`) VALUES ('$file','$firstName', '$middleName', '$lastName', '$age' , '$birthDate' , '$gender' , '$emailAddress', '$contactNumber')";

        $con->query($sql) or die ($con->error);
 
        echo '<script>alert("Submitted")</script>';
        echo'<script>window.location.href = "resident.php"</script>';
    }
?>

    <div class="wrapper">
        <h2>Add Resident Record  <span class="closeBtn"> X</span></h2>
        <form action="" method="POST" enctype="multipart/form-data" >
            <h4>Name</h4>
            <div class="input_group">
                <div class="input_box">
                    <label for="">First Name</label>
                    <input type="text" class="one" placeholder="First Name" name="firstName" required>
                  
                </div>
                <div class="input_box">
                <label for="">Middle Name</label>
                    <input type="text" class="one" placeholder="Middle Name" name="middleName" required>
                   
                </div>
                <div class="input_box">
                <label for="">Last Name</label>
                    <input type="text"  class="one" placeholder="Last Name" name="lastName" required>
                   
                </div>
            </div>
            <h4>Infomation</h4>
            <div class="input_group">
            
                <div class="input_box">
                <label for="">Age</label>
                    <input type="text" class="two" placeholder="Age" name="age" required>
                   
                </div>
           
                <div class="input_box">
                <label for="">Gender</label>
                <select name="gender" class="two" id="gender">
                    <option name="Male" value="Male">Male</option>
                    <option name="Female" value="Female">Female</option>
    
                </select>
                   
                </div>
             
                <div class="input_box">
                <label for="">Birthday</label>
                    <input type="date"   class="two" name="birthDate" required>
                   
                </div>
                </div>   
            
               
                <h4>Contact</h4>
                <div class="input_group">
                <div class="input_box">
                <label for="">Email Address</label>
                    <input type="email"  id="email" class="contact"name="emailAddress"  placeholder="Email Address"required>
                   
                </div>
              
                <div class="input_box">
                <label for="">Contact Number</label>
                    <input type="text" class="contact" name="contactNumber" placeholder="Contact Number" required>
                    
                </div>

                <div class="input_box">
                <label for="">Picture</label>
                <input type="file" name="image" id="image" >
      
                </div>
                </div>

              
                <div class="input_box">
                    <input type="submit"  id="submit" name="submit" value="Submit">
             

               

            </div>
        </form></div></div>
    
    </div>
  

  
 <script src="../js/addresidentmodal.js"></script>


<!-- end add modal-->

          
</div>
</main>
</div>

</body>
</html>
<?php }else { echo header("location: ../index.php"); }?>