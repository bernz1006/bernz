<?php

include_once("../../connections/connection.php");

$conn = connection();
$search = $_POST['name'];
$sql = "SELECT * FROM official WHERE id LIKE '%$search%' || firstname LIKE '%$search%' || middlename LIKE '%$search%' || lastname LIKE '%$search%' || age LIKE '%$search%' || birthDate LIKE '%$search%' || sex LIKE '$search%' || emailAddress LIKE '%$search%' || contactNumber LIKE '%$search%' || position LIKE '%$search%'|| start LIKE '%$search%' || end LIKE '%$search%'  ORDER BY id ASC ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		?>	 <tr>
         <td><?php echo '<img src="data:image;base64,'.base64_encode($row['photo']).'" alt="image" style="width: 50px; height: 50px;">'; ?></td>
                              <td><?php echo $row['firstName'];?></td>
                              <td><?php echo $row['middleName'];?></td>
                              <td><?php echo $row['lastName'];?></td>
                              
        <td><?php echo $row['birthDate'];?></td>
        <td><?php echo $row['gender'];?></td>
        <td><?php echo $row['age']; ?></td>
        <td id="email"><?php echo $row['emailAddress'];?></td>
        <td><?php echo $row['contactNumber'];?></td>
        <td><?php echo $row['position'];?></td>
        <td><?php echo $row['start'];?></td>
        <td><?php echo $row['end'];?></td>
        <td><button data-id='<?php echo $row['id']; ?>' class="userinfo las la-pen">Edit</button>
                                <form action="delete.php" method="post">
                   <button type="submit" id="delete" name="delete"><span class="las la-trash"></span>Delete</button><input type="hidden" name="ID" value="<?php echo $row['id'];?>">
                    </form>
                </td>
        </tr>

				 
				
<?php }
}
else{ ?>
	 <tr><td colspan="9"><center>No result's found</center></t></tr>";
     <?php
}

?>