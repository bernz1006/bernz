<?php 
        
        include_once("../../connections/connection.php");

        $con = connection();
            
$search = $_POST['name'];
$sql = "SELECT * FROM users WHERE id LIKE '%$search%' || firstName LIKE '%$search%' || middleName LIKE '%$search%' || lastName LIKE '%$search%' || age LIKE '%$search%' || birthDate LIKE '%$search%' ||  gender LIKE '$search%' || emailAddress LIKE '%$search%' || contactNumber LIKE '%$search%'   ORDER BY id ASC ";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		?>	<tr>
                <td><a href="certificate/brgy_certificate.php?ID=<?php echo $row['id'];?>"><input type="button" id="request"  value="Request"></input></a></td>

                <td><?php echo '<img src="data:image;base64,'.base64_encode($row['photo']).'" alt="image" style="width: 50px; height: 50px;">'; ?></td>
                    <td><?php echo $row['firstName'];?></td>
                    <td><?php echo $row['middleName'];?></td>
                    <td><?php echo $row['lastName'];?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['birthDate']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td id="email"><?php echo $row['emailAddress']; ?></td>
                    <td><?php echo $row['contactNumber']; ?></td>
                    </tr>
   
                                    
                                   
   <?php }
   }
   else{ ?>
            <tr><th colspan="10"><center>No Data Save</center></th></tr>
        <?php
   }?>