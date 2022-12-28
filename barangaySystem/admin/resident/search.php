<?php

include_once("../../connections/connection.php");

$conn = connection();
$search = $_POST['name'];
$sql = "SELECT * FROM residents WHERE id LIKE '%$search%' || household LIKE '%$search%' || address LIKE '%$search%' || position LIKE '%$search%' || lastname LIKE '%$search%' || firstname LIKE '%$search%' || middlename LIKE '$search%' || sex LIKE '%$search%' || religion LIKE '%$search%'   ORDER BY id ASC ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		?>	<tr>
            <th scope="row"><?php echo $row['household']; ?></th>
       <td><?php echo $row['address']; ?></td>
       <td><?php echo $row['position']; ?></td>
       <td><?php echo $row['lastname']; ?></td>
       <td><?php echo $row['firstname']; ?></td>
       <td><?php echo $row['middlename']; ?></td>
       <td><button class="add">Add Records</button></td>
                <form action="resident/delete.php" method="post">
   <button type="submit" id="delete" name="delete"><span class="las la-trash"></span>Delete</button><input type="hidden" name="ID" value="<?php echo $row['id'];?>">
    </form>
</td>
   
            </td>
            </tr>

				 
				
<?php }
}
else{ ?>
	 <tr><td colspan="9"><center>No result's found</center></t></tr>";
     <?php
}

?>