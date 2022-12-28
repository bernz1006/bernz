<?php  if(!isset($_SESSION)){session_start();}
        include_once("../connections/connection.php");
            $con = connection(); 
            
            
            
            
            $sql = " SELECT COUNT(*) AS count FROM `residents`";
            $result=$con->query($sql) or die ($con->error);
          while($row = mysqli_fetch_assoc($result)){
            $resident = $row['count'];
          }
        
          $sql = " SELECT COUNT(*) AS count FROM `users`";
          $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
          $users = $row['count'];
        }

        $sql = " SELECT COUNT(*) AS count FROM `reservation`";
        $result=$con->query($sql) or die ($con->error);
      while($row = mysqli_fetch_assoc($result)){
        $reservation = $row['count'];
      }
        
        $sql = " SELECT status, COUNT(*) AS count FROM `request` WHERE status = 1";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $request = $row['count'];
        }?>
<?php if(isset($_SESSION['UserLogin'])){?>
    <link rel="stylesheet" href="../css/admin/navigation.css">
    <link rel="stylesheet" href="../css/grid.css">
    <?php include ("navigation.php"); ?>

<div class="main-content">
<main>
<style>

#r5{
    z-index: 100;
}
#r6{
    z-index:200;
}
#r7{
    z-index:300;
}
.row{
   margin-top: -20px;
}
.card-single{
    display: flex;
    justify-content: space-between;
    background: linear-gradient( 135deg, #031558, #04a7ed);
    padding: 2rem;
    border-radius: 5px;
    box-shadow: 4px 4px 10px #0c64bd;
    overflow: hidden;
    align-items: stretch;
    flex-wrap: nowrap;
    flex-direction: row;
    max-width:300px; min-height:156px;
}
.card-single h1{
color: black;
}
.card-single div:last-child span {
    background:transparent;
    color:black;
    font-size: 3rem;  
}
.card-single div:first-child span {
    background:transparent;
    font-size: 1.5rem; 
}
.card-single:last-child div:first-child span {
    color: #fff;  
}
.card-single:hover{
    background: linear-gradient( -135deg, #031558, #04a7ed);
}</style>
<div class="row">
  <div class="col-1 ">
  <a href="resident.php">
                   <div class="card-single" >
                        <div>
                            <h1><?php echo $resident;?></h1>
                            <span>Residents Records</span>
                        </div>
                        <div>
                            <span class="las la-user-circle"></span>
                        </div>
                    </div>
                    </a>

  </div>
  <div class="col-1 ">
  <a href="pending.php">
                   <div class="card-single" >
                        <div>
                            <h1><?php echo $request;?></h1>
                            <span>Pending Request</span>
                        </div>
                        <div>
                            <span class="las la-user-circle"></span>
                        </div>
                    </div>
                    </a>

  </div><div class="col-1 ">
  <a href="gymreservation.php">
                   <div class="card-single" >
                        <div>
                            <h1><?php echo $reservation;?></h1>
                            <span>Gym Reservation</span>
                        </div>
                        <div>
                            <span class="las la-user-circle"></span>
                        </div>
                    </div>
                    </a>

  </div>
  <div class="col-1 ">
  <a  href="user.php">
                   <div class="card-single" >
                        <div>
                            <h1><?php echo $users;?></h1>
                            <span>User Account</span>
                        </div>
                        <div>
                            <span class="las la-user-circle"></span>
                        </div>
                    </div>
                    </a>

  </div>
<div class="col-2" id="r5">


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









</div>


<div class="col-2" id="r6">

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



<div class="col-2" id="r7">


<?php  
 $connect = mysqli_connect("localhost", "root", "1234", "barangaysystem");  
 $query = "SELECT type, count(*) as number FROM request GROUP BY type";  
 $result = mysqli_query($connect, $query);  
 ?>  
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['type', 'number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["type"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Type of Requested Form',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('formchart'));  
                chart.draw(data, options);  
           }  
           </script>  
     
           
           <div>  
                  
                <div class="chart" id="formchart"></div>  
           </div>  
        </div>








</main>
</div>

</body>
</html>
<?php }else { echo header("location: ../index.php"); }?>