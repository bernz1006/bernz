<?php 
        
        include_once("../../connections/connection.php");

        $con = connection();
            
$id = $_POST['id'];

$sql = "select * from official where id=".$id;
$result = mysqli_query($con,$sql);

 

    
while( $row = mysqli_fetch_array($result) ){
?> <div class="content"><form action="official/update.php"  method="post" enctype="multipart/form-data">
   
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
    <p>Gender : <select name="position" id="position" ?>">
                        <option  value="Captain" <?php echo ($row['position'] == "Captain")? 'Selected' : '';?> >Captain</option>
                                                <option  value="Secratary" <?php echo ($row['position'] == "Secratary")? 'Selected' : '';?> >Secretary</option>
                                                <option  value="Councilor" <?php echo ($row['position'] == "Councilor")? 'Selected' : '';?>>Councilor</option>
                                                <option  value="Police" <?php echo ($row['position'] == "Police")? 'Selected' : '';?>>Brgy Police</option>
            </select></p>
            <p>Start :<input type="date"  name="start" id="start" value="<?php echo $row['start'];?>" required ></p>
            <p>end :<input type="date"  name="end" id="end" value="<?php echo $row['end'];?>" required ></p>



<p><input type="reset" value="Reset">
<input type="submit" name="submit" id="" value="Update"></input><input type="hidden" name="id" value="<?php echo $row['id'];?>"></p>
</td>
</tr>
</table></form>
</div>
<?php } ?>

