<?php  if(!isset($_SESSION)){session_start();}
        include_once("../connections/connection.php");
            $con = connection(); 
              
$sql = " SELECT * FROM `request`";
$result=$con->query($sql) or die ($con->error);
$row=$result->fetch_assoc();
$total = $result->num_rows; 





?>
<?php if(isset($_SESSION['UserLogin'])){?>
    <link rel="stylesheet" href="../css/admin/navigation.css">
<?php include ("navigation.php"); ?>

<div class="main-content">
<main>
    <style>
        .table-responsive{
            border: 1px solid #ddd;
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
   
    background: whitesmoke;
    padding: 10px;
    caption-side: top;
    font-weight: bold; 
    font-size: 20px;
    border-bottom: 1px solid black;
}.caption2 {
    
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
                        <?php   $sql = " SELECT status, COUNT(*) AS count FROM `reservation` WHERE status = 1";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gym1 = $row['count'];
        }?>
         <?php   $sql = " SELECT status, COUNT(*) AS count FROM `reservation` WHERE status = 2";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gym2 = $row['count'];
        }?>
         <?php   $sql = " SELECT status, COUNT(*) AS count FROM `reservation` WHERE status = 3";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gym3 = $row['count'];
        }?>
          <?php   $sql = " SELECT status, COUNT(*) AS count FROM `reservation`";
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
$sql = " SELECT * FROM `reservation` ORDER BY status ASC";
$result=$con->query($sql) or die ($con->error);
$row=$result->fetch_assoc();
$total = $result->num_rows;  if($total >= 1) { ?>
                        <?php do{ ?>
                            <tr>
                            <td><?php echo $row['organization_name'];?></td>
                            <td><?php echo $row['name_of_event']; ?></td>
                            <td><?php echo $row['date'];?></td>
                            <style>
                                #appt{
                                    background:none;
                                    border:none;
                                }
                            </style>
                            <td ><input type="time" id="appt" value="<?php echo $row['start_from'];?>"></td>
                            <td><input type="time" id="appt" value="<?php echo $row['end_to'];?>"></td>
                            <td><?php 
                                            if( $row['status']  ==1){
                                            echo "Pending";}
                                            if( $row['status']  ==2){
                                                echo "Approved";}
                                            if( $row['status']  ==3){
                                                    echo "Decline";}
                                            ?> </td>
                            <td>  <input type="button" class="add" id="modalBtn" value="accept">
                            <a href="reservation/delete.php?id=<?php echo $row['id'];?>"><span class="las la-trash"></a>
                            <!-- <a href="reservation/approved.php?id=<?php echo $row['id'];?>"><span class="las la-check"></a> -->
                        </td>
                            
                           </tr>
                            <?php }while  ($row=$result->fetch_assoc()); ?>

                            <?php }elseif ($total <= 0) {?>

                                <tr>
                            <td colspan="7";><center><h2>No Pending Reservation</h2></center></td>
                            
                            </tr>
                            <?php }?>
                         </tbody>
                    </table>

                    <link rel="stylesheet" href="../css/admin/residentAdd.css">
    <link rel="stylesheet" href="../css/admin/addresidentmodal.css">

<!-- add modal -->
<div id="simpleModal" class="modal">
    <div class="modal-content">
       
        
<?php 
    

     if(isset($_POST['submit'])){

    $date =$_POST['date'];
    $time =$_POST['time'];
    $message =$_POST['message'];

    $sql = "INSERT INTO `reservation`(`godate`,`gotime`, `message`) VALUES ('$date','$time', '$message')";

        $con->query($sql) or die ($con->error);
 
        echo '<script>alert("Submitted")</script>';
        echo'<script>window.location.href = "resident.php"</script>';
    }
?>

<div class="wrapper">
        <h2> Schedule Date & Time  <span class="closeBtn"> X</span></h2>
        <form action="" method="POST">
            <h4>Date and Time</h4>
            <div class="input_group">
            <label for="date"><b>Date:</b></label>
    <input type="date" id="date" name="date" class="one" required>
    <br><br>
    <label for="start"><b>Start From:</b></label>
     <input type="time" id="appt" name="time" class="one" required>

            </div>
            <h4>Message</h4>
            <div class="input_group">
            
                <div class="input_box">
            
                    <input type="text" class="two" placeholder="Insert Your Message here" name="message" required>
                   
                </div>
</div>
              <br><br>
                <div class="input_box">
                    <input type="submit"  id="submit" name="submit" value="Submit">
            
            </div>
        </form></div></div>
    
    </div>

  
 <script src="../js/addresidentmodal.js"></script>

                            </div>
                            <br><br>

                            <div class="table-responsive">
                        
                                <table>
                                <caption class="caption1">Business Permit</caption>
                                <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblbusiness` WHERE status = 1";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gym1 = $row['count'];
        }?>
         <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblbusiness` WHERE status = 2";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gym2 = $row['count'];
        }?>
         <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblbusiness` WHERE status = 3";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gym3 = $row['count'];
        }?>
          <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblbusiness`";
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
$sql = " SELECT * FROM `tblbusiness` ORDER BY status ASC";
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
                                    <td><a href="business/delete.php?id=<?php echo $row['id'];?>"><span class="las la-trash"></a><a href="business/approved.php?id=<?php echo $row['id'];?>"><span class="las la-check"></a></td>
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
    <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblcertificate` WHERE status = 1";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gym1 = $row['count'];
        }?>
         <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblcertificate` WHERE status = 2";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gym2 = $row['count'];
        }?>
         <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblcertificate` WHERE status = 3";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gym3 = $row['count'];
        }?>
          <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblcertificate`";
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
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php 
$sql = " SELECT * FROM `tblcertificate` ORDER BY status ASC";
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
                        ?> </td>
        <td><a href="certificate/delete.php?id=<?php echo $row['id'];?>"><span class="las la-trash"></a><a href="certificate/approved.php?id=<?php echo $row['id'];?>"><span class="las la-check"></a></td>
        </tr>
        <?php }while  ($row=$result->fetch_assoc()); ?>

        <?php }elseif ($total <= 0) {?>

            <tr>
        <td colspan="9";><center><h2>No Pending Request</h2></center></td>
        
        </tr>
        <?php }?>
     </tbody>
</table>
        </div>

        <br><br>

                            <div class="table-responsive">
                        
                                <table>
                                <caption class="caption1">Barangay Clearance</caption>
                                <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblclearance` WHERE status = 1";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gym1 = $row['count'];
        }?>
         <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblclearance` WHERE status = 2";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gym2 = $row['count'];
        }?>
         <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblclearance` WHERE status = 3";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gym3 = $row['count'];
        }?>
          <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblclearance`";
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
$sql = " SELECT * FROM `tblclearance` ORDER BY status ASC";
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
                                    <td><a href="clearance/delete.php?id=<?php echo $row['id'];?>"><span class="las la-trash"></a><a href="clearance/approved.php?id=<?php echo $row['id'];?>"><span class="las la-check"></a></td>
                                    </tr>
                                    <?php }while  ($row=$result->fetch_assoc()); ?>

                                    <?php }elseif ($total <= 0) {?>

                                        <tr>
                                    <td colspan="9";><center><h2>No Pending Request</h2></center></td>
                                    
                                    </tr>
                                    <?php }?>
                                 </tbody>
                            </table>
                                    </div>

                                    <br><br>

                            <div class="table-responsive">
                        
                                <table>
                                <caption class="caption1"> Barangay Indigency</caption>
               
                                <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblindigency` WHERE status = 1";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gym1 = $row['count'];
        }?>
         <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblindigency` WHERE status = 2";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gym2 = $row['count'];
        }?>
         <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblindigency` WHERE status = 3";
        $result=$con->query($sql) or die ($con->error);
        while($row = mysqli_fetch_assoc($result)){
        $gym3 = $row['count'];
        }?>
          <?php   $sql = " SELECT status, COUNT(*) AS count FROM `tblindigency`";
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
$sql = " SELECT * FROM `tblindigency` ORDER BY status ASC";
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
                                    <td><a href="indigency/delete.php?id=<?php echo $row['id'];?>"><span class="las la-trash"></a><a href="indigency/approved.php?id=<?php echo $row['id'];?>"><span class="las la-check"></a></td>
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
<?php }else { echo header("location: ../index.php"); }?>