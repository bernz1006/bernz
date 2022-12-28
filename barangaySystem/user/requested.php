<?php  if(!isset($_SESSION)){session_start();}
        include_once("../connections/connection.php");
            $con = connection(); 
            
            
            
            
            ?>
<?php if(isset($_SESSION['UserLogin'])){?>
    <link rel="stylesheet" href="../css/user/main.css">
    <link rel="stylesheet" href="../css/admin/navigation.css">
<?php include ("navigation.php"); ?>

<div class="main-content">
<main class="img">

<style>
    .table-responsive{
        background: white;
        border-radius: 10px;
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

th{
    background-color: #696969;
    color: #fff;
}



.caption1 {
    
    border-bottom: 1px solid black;
    background: whitesmoke;
    padding: 10px;
    caption-side: top;
    font-weight: bold; 
    font-size: 20px;
}.caption2 {
    border-radius: 10px;
    background: whitesmoke;
    padding: 5px;
    caption-side: top;
    font-weight: bold; 
    font-size: 10px;
}
table {
    border-collapse: collapse;
    border: 2px solid rgb(200, 200, 200);
    letter-spacing: 1px;
    font-family: sans-serif;
    font-size: .8rem;
    width:100%;
    
}

    </style>
<div class="table-responsive">
                        
                        <table>
                        <caption class="caption1">Gym Reservation</caption>
                        <?php   $sql = " SELECT status, COUNT(*) AS count FROM `reservation` WHERE status = 1 AND requesterId ='".$_SESSION['userid']."'";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gym1 = $row['count'];
        }?>
         <?php   $sql = " SELECT status, COUNT(*) AS count FROM `reservation` WHERE status = 2 AND requesterId ='".$_SESSION['userid']."'";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gym2 = $row['count'];
        }?>
         <?php   $sql = " SELECT status, COUNT(*) AS count FROM `reservation` WHERE status = 3 AND requesterId ='".$_SESSION['userid']."'";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gym3 = $row['count'];
        }?>
          <?php   $sql = " SELECT status, COUNT(*) AS count FROM `reservation`
 WHERE requesterId ='".$_SESSION['userid']."'";

        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gymt = $row['count'];
        }?>
                        <caption class="caption2">Pending: <?php echo $gym1;?>   Approved: <?php echo $gym2;?>   Declined :<?php echo $gym3;?>  Total :<?php echo $gymt;?></caption>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Event</th>
                                <th>Date</th>
                                <th>Start</th>
                                <th>End</th>
                             
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
$sql = " SELECT * FROM `reservation` WHERE requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
$row=$result->fetch_assoc();
$total = $result->num_rows;  if($total >= 1) { ?>
                        <?php do{ ?>
                            <tr>
                            <td><?php echo $row['organization_name'];?></td>
                            <td><?php echo $row['name_of_event']; ?></td>
                            <td><?php echo $row['date'];?></td>
                            <td><?php echo $row['start_from'];?></td>
                            <td><?php echo $row['end_to'];?></td>
                            <style>
                                #appt{
                                    background:none;
                                    border:none;
                                }
                            </style>
                        
                            <td><?php 
                                            if( $row['status']  ==1){
                                            echo "Pending";}
                                            if( $row['status']  ==2){
                                                echo "Approved";}
                                            if( $row['status']  ==3){
                                                    echo "Decline";}
                                            ?> </td>
                          </tr>
                            <?php }while  ($row=$result->fetch_assoc()); ?>

                            <?php }elseif ($total <= 0) {?>

                                <tr>
                            <td colspan="7";><center><h2>No Pending Reservation</h2></center></td>
                            
                            </tr>
                            <?php }?>
                         </tbody>
                    </table>
                            </div>
                            <br><br>

                            <div class="table-responsive">
                        
                        <table>
                        <caption class="caption1">Business Permit</caption>
                        <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblbusiness` WHERE status = 1 AND requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
while($row = mysqli_fetch_assoc($result)){
$gym1 = $row['count'];
}?>
 <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblbusiness` WHERE status = 2 AND requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
while($row = mysqli_fetch_assoc($result)){
$gym2 = $row['count'];
}?>
 <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblbusiness` WHERE status = 3 AND requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
while($row = mysqli_fetch_assoc($result)){
$gym3 = $row['count'];
}?>
  <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblbusiness` WHERE requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
while($row = mysqli_fetch_assoc($result)){
$gymt = $row['count'];
}?>
                <caption class="caption2">Pending: <?php echo $gym1;?>   Approved: <?php echo $gym2;?>   Declined :<?php echo $gym3;?>  Total :<?php echo $gymt;?></caption>
               <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Date</th>
                               
                                <th>Status</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
//$sql = " SELECT * FROM `tblbusiness` ORDER BY status ASC";
$sql = " SELECT * FROM `tblbusiness` WHERE requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
$row=$result->fetch_assoc();
$total = $result->num_rows;  if($total >= 1) { ?>
                        <?php do{ ?>
                            <tr>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><?php echo $row['requestdate'];?></td>
                            <td><?php 
                                            if( $row['status']  ==1){
                                            echo "Pending";}
                                            if( $row['status']  ==2){
                                                echo "Approved";}
                                            if( $row['status']  ==3){
                                                    echo "Decline";}
                                            ?> </td>
                            </tr>
                            <?php }while  ($row=$result->fetch_assoc()); ?>

                            <?php }elseif ($total <= 0) {?>

                                <tr>
                            <td colspan="6";><center><h2>No Pending Request</h2></center></td>
                            
                            </tr>
                            <?php }?>
                         </tbody>
                    </table>
                            </div>
                            <br><br>

<div class="table-responsive">

<table>
<caption class="caption1">Barangay Certificate</caption>
<?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblcertificate` WHERE status = 1 AND requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
while($row = mysqli_fetch_assoc($result)){
$gym1 = $row['count'];
}?>
 <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblcertificate` WHERE status = 2 AND requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
while($row = mysqli_fetch_assoc($result)){
$gym2 = $row['count'];
}?>
 <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblcertificate` WHERE status = 3 AND requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
while($row = mysqli_fetch_assoc($result)){
$gym3 = $row['count'];
}?>
  <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblcertificate` WHERE requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
while($row = mysqli_fetch_assoc($result)){
$gymt = $row['count'];
}?>
                <caption class="caption2">Pending: <?php echo $gym1;?>   Approved: <?php echo $gym2;?>   Declined :<?php echo $gym3;?>  Total :<?php echo $gymt;?></caption>
               <thead>
<tr>
<th>First Name</th>
<th>Middle Name</th>
<th>Last Name</th>
    <th>Zone #</th>
    <th>Year</th>
    <th>Month</th>
    <th>Date</th>
    <th>Status</th>
  
</tr>
</thead>
<tbody>
<?php 
$sql = " SELECT * FROM `tblcertificate` WHERE requesterId ='".$_SESSION['userid']."'";
//$sql = " SELECT * FROM `reservation` WHERE requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
$row=$result->fetch_assoc();
$total = $result->num_rows;  if($total >= 1) { ?>
<?php do{ ?>
<tr>
<td><?php echo $row['firstname'];?></td>
<td><?php echo $row['middlename']; ?></td>
<td><?php echo $row['lastname'];?></td>
<td><?php echo $row['purokno'];?></td>
<td><?php echo $row['years']; ?></td>
<td><?php echo $row['month'];?></td>
<td><?php echo $row['requestdate'];?></td>
<td><?php 
                if( $row['status']  ==1){
                echo "Pending";}
                if( $row['status']  ==2){
                    echo "Approved";}
                if( $row['status']  ==3){
                        echo "Decline";}
                ?> </td></tr>
<?php }while  ($row=$result->fetch_assoc()); ?>

<?php }elseif ($total <= 0) {?>

    <tr>
<td colspan="8";><center><h2>No Pending Request</h2></center></td>

</tr>
<?php }?>
</tbody>
</table>
</div>

<br><br>

                    <div class="table-responsive">
                
                        <table>
                        <caption class="caption1">Barangay Clearance</caption>
                        <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblclearance` WHERE status = 1 AND requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
while($row = mysqli_fetch_assoc($result)){
$gym1 = $row['count'];
}?>
 <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblclearance` WHERE status = 2 AND requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
while($row = mysqli_fetch_assoc($result)){
$gym2 = $row['count'];
}?>
 <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblclearance` WHERE status = 3 AND requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
while($row = mysqli_fetch_assoc($result)){
$gym3 = $row['count'];
}?>
  <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblclearance` WHERE requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
while($row = mysqli_fetch_assoc($result)){
$gymt = $row['count'];
}?>
                <caption class="caption2">Pending: <?php echo $gym1;?>   Approved: <?php echo $gym2;?>   Declined :<?php echo $gym3;?>  Total :<?php echo $gymt;?></caption>
           <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Age</th>
                                <th>Zone #</th>
                                <th>Purpose</th>
                                <th>Date</th>
                                <th>Status</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
$sql = " SELECT * FROM `tblclearance` WHERE requesterId ='".$_SESSION['userid']."'";

$result=$con->query($sql) or die ($con->error);
$row=$result->fetch_assoc();
$total = $result->num_rows;  if($total >= 1) { ?>
                        <?php do{ ?>
                            <tr>
                            <td><?php echo $row['firstname'];?></td>
                            <td><?php echo $row['middlename']; ?></td>
                            <td><?php echo $row['lastname'];?></td>
                            <td><?php echo $row['age'];?></td>
                            <td><?php echo $row['purokno']; ?></td>
                            <td><?php echo $row['purpose'];?></td>
                            <td><?php echo $row['requestdate'];?></td>
                           <td><?php 
                                            if( $row['status']  ==1){
                                            echo "Pending";}
                                            if( $row['status']  ==2){
                                                echo "Approved";}
                                            if( $row['status']  ==3){
                                                    echo "Decline";}
                                            ?> </td>
                             </tr>
                            <?php }while  ($row=$result->fetch_assoc()); ?>

                            <?php }elseif ($total <= 0) {?>

                                <tr>
                            <td colspan="8";><center><h2>No Pending Request</h2></center></td>
                            
                            </tr>
                            <?php }?>
                         </tbody>
                    </table>
                            </div>

                            <br><br>

                    <div class="table-responsive">
                
                        <table>
                        <caption class="caption1"> Barangay Indigency</caption>
       
                        <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblindigency` WHERE status = 1 AND requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
while($row = mysqli_fetch_assoc($result)){
$gym1 = $row['count'];
}?>
 <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblindigency` WHERE status = 2 AND requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
while($row = mysqli_fetch_assoc($result)){
$gym2 = $row['count'];
}?>
 <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblindigency` WHERE status = 3 AND requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
while($row = mysqli_fetch_assoc($result)){
$gym3 = $row['count'];
}?>
  <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblindigency` WHERE requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
while($row = mysqli_fetch_assoc($result)){
$gymt = $row['count'];
}?>
                <caption class="caption2">Pending: <?php echo $gym1;?>   Approved: <?php echo $gym2;?>   Declined :<?php echo $gym3;?>  Total :<?php echo $gymt;?></caption>
          
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Purpose</th>
                                <th>Date</th>
                                <th>Status</th>
                         
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
$sql = " SELECT * FROM `tblindigency` WHERE requesterId ='".$_SESSION['userid']."'";
$result=$con->query($sql) or die ($con->error);
$row=$result->fetch_assoc();
$total = $result->num_rows;  if($total >= 1) { ?>
                        <?php do{ ?>
                            <tr>
                            <td><?php echo $row['firstname'];?></td>
                            <td><?php echo $row['middlename']; ?></td>
                            <td><?php echo $row['lastname'];?></td>
                            <td><?php echo $row['purpose'];?></td>
                            <td><?php echo $row['requestdate'];?></td>
                           <td><?php 
                                            if( $row['status']  ==1){
                                            echo "Pending";}
                                            if( $row['status']  ==2){
                                                echo "Approved";}
                                            if( $row['status']  ==3){
                                                    echo "Decline";}
                                            ?> </td>
                             </tr>
                            <?php }while  ($row=$result->fetch_assoc()); ?>

                            <?php }elseif ($total <= 0) {?>

                                <tr>
                            <td colspan="7";><center><h2>No Pending Request</h2></center></td>
                            
                            </tr>
                            <?php }?>
                         </tbody>
                    </table>
                            </div>


                            <br><br>
            

</main>
</div>

</body>
</html>
<?php }else { echo header("location: index.php"); }?>