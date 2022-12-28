<?php 
        
        include_once("../connections/connection.php");

        $con = connection();
            
$id = $_POST['id'];

$sql = "select * from users where id=".$id;
$result = mysqli_query($con,$sql);

 

    
while( $row = mysqli_fetch_array($result) ){
?> <div class="content"><form action="resident/update.php"  method="post" enctype="multipart/form-data">
   
<table border='0' width='100%'>
<tr> 
   
    <td width="300"><?php echo '<img src="data:image;base64,'.base64_encode($row['photo']).'" alt="image" style="width: 400px; height: 400px; border-radius: 80px;">'; ?>
    <td style="padding:20px;">

    <label>Picture :<input type="file" name="image" id="image" required  ></label>
<br><br>
    <p>First Name : <input type="text" name="firstName" id="firstName" value="<?php echo $row['firstName'];?>" required > </p>

    <p>Middle Name :<input type="text"name="middleName" id="middleName" value="<?php echo $row['middleName'];?>" required>  </p> 

    <p>Last Name :  <input type="text"  name="lastName" id="lastName" value="<?php echo $row['lastName'];?>"  required > </p>

    <p>BirthDay :<input type="date"  name="birthDate" id="birthDate" value="<?php echo $row['birthDate'];?>" required ></p>

    <p>Gender : <select name="gender" id="gender" ?>">
                        <option  value="Male" <?php echo ($row['gender'] == "Male")? 'Selected' : '';?> >Male</option>
                                                <option  value="Female" <?php echo ($row['gender'] == "Female")? 'Selected' : '';?> >Female</option>
            </select></p>

    <p>Age: <input type="text"  name="age" id="age" value="<?php echo $row['age'];?>" required> 

    <p>Contact Number :   <input type="text"  name="contactNumber" id="contactNumber" value="<?php echo $row['contactNumber'];?>" required> </p>

    <p>Email : <input type="text"  name="emailAddress" id="emailAddress" value="<?php echo $row['emailAddress'];?>" required ></p>
   


<p><input type="reset" value="Reset">
<input type="submit" name="submit" id="" value="Update"></input><input type="hidden" name="id" value="<?php echo $row['id'];?>"></p>
</td>
</tr>
</table></form>
</div>
<?php } ?>

