<?php  if(!isset($_SESSION)){session_start();}
        include_once("../connections/connection.php");
            $con = connection(); 

$sql = " SELECT * FROM residents";
$result=$con->query($sql) or die ($con->error);
$row=$result->fetch_assoc();
            ?>
<?php if(isset($_SESSION['UserLogin'])){?>
    <link rel="stylesheet" href="../css/admin/navigation.css">
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
  padding-right: 15px;
}


.col-1 {width: 25%;}

.col-2 {width: 75%;}

#t5{
    float:right;
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
    width:100%;
    
}

/*buttons head family and member*/
.btn1 {
  background-color: #f44336;
  color: white;
  padding: 8px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 40px;
  background-color: blue;
  font-weight:bold;
  font-size:15px;
}
.btn1:hover {
  opacity: 1;
  background-color:lightblue;
  color:black;
  padding: 10px 22px;
  font-weight:bold;
  font-size:15px;
}
/**/
</style>
<div class="main-content">
<main>
      

<div class="row">
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
         $sql = "SELECT age, count(*) as number FROM official GROUP BY gender";
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
 $connect = mysqli_connect("localhost", "root", "1234", "barangaysystem");  
 $query = "SELECT gender, count(*) as number FROM official GROUP BY gender";  
 $result = mysqli_query($connect, $query);  
 ?>  
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["gender"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Gender Percentage of Resident Records',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('genderchart'));  
                chart.draw(data, options);  
           }  
           </script>  
     
           
           <div>  
                  
                <div class="chart" id="genderchart"></div>  
           </div>  






  </div>

  
<div class="col-2" id="t5" style="overflow-x:auto;">
 

 <table>
<form action="headfamily.php">
<input type="submit" name="submited" class="btn1" value="Head Family">
</form>
<form action="member.php">
<input type="hidden" name="status" value="1">
<input type="submit" name="submited" class="btn1" value="Member">
</form>
   <caption>Resident Records</caption>
  <tr>
  <th colspan="7">Personal Information</th>
</tr>
   <tr>
       <th scope="col">Household No.</th>
       <th scope="col">Address Purok</th>
       <th scope="col">Position</th>
       <th scope="col">Last Name</th>
       <th scope="col">First Name</th>
       <th scope="col">Middle Name</th>
       <th scope="col">Tools</th>
       
   </tr>
   <?php    
              $query = "select * from residents";
              $result = mysqli_query($con,$query);      
?>     
  <?php while($row = mysqli_fetch_array($result)){ ?>
   <tr>
       <th scope="row"><?php echo $row['household']; ?></th>
       <td><?php echo $row['address']; ?></td>
       <td><?php echo $row['position']; ?></td>
       <td><?php echo $row['lastname']; ?></td>
       <td><?php echo $row['firstname']; ?></td>
       <td><?php echo $row['middlename']; ?></td>
       <td><button class="add">Add Records</button></td>
   </tr>
   <?php } ?>
</table>
</div>


<div class="col-1" id="r6">


</div>
</div>
</main>
</div>

</body>
</html>
<?php }else { echo header("location: ../index.php"); }?>