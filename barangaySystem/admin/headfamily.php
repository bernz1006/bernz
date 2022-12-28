<?php  if(!isset($_SESSION)){session_start();}
        include_once("../connections/connection.php");
            $con = connection(); 
?>
<?php if(isset($_SESSION['UserLogin'])){?>
    <?php 
     if(isset($_POST['submited'])){

         
    $household =$_POST['txt_householdnum'];
    $purok =$_POST['txt_purok'];
    $lname=$_POST['txt_lname'];
    $fname =$_POST['txt_fname'];
    $mname =$_POST['txt_mname'];
    $position=$_POST['position'];
    $gender=$_POST['ddl_gender'];
    $status =$_POST['ddl_status'];
    $religion =$_POST['txt_religion'];
    $dbirth=$_POST['txt_dbirth'];
    $bplace =$_POST['txt_bplace'];
    $age =$_POST['age'];
    $school=$_POST['ddl_School'];
    $educ =$_POST['txt_educ'];
    $employment =$_POST['ddl_employment'];
    $occupation=$_POST['txt_occupation'];
    $income =$_POST['txt_income'];
    
   

    $con = connection();
     $sql = "INSERT INTO residents( household, address,firstname, middlename,lastname,position,relation,sex,status,religion,datebirth,placebirth,age,school,educational,employment,occupation,income) VALUES 
     ('$household','$purok', '$fname','$mname','$lname','$position','','$gender','$status','$religion','$dbirth','$bplace','$age','$school','$educ','$employment','$occupation','$income')";

     if ($con->query($sql) === TRUE) {
        echo '<script>alert("Submitted")</script>';
        echo'<script>window.location.href = "resident.php"</script>';
      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
        echo'<script>window.location.href = "resident.php"</script>';
      }
 
        
    }
?>
    <link rel="stylesheet" href="../css/admin/navigation.css">
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
form {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width:50%;
  margin-left:auto;
  margin-right:auto;
}
input[type=text],input[type=date],input[type=number], select {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
</style>
<div class="main-content">
<main>
        <form action="" method="POST">
                                   <div class="">
                                        <label class="control-label">Household No:</label>
                                        <input name="txt_householdnum" class="" type="number" min="1" placeholder="Household #"/>
                                    </div>
                                    <div class="">
                                        <label class="">Address Purok:</label>
                                        <input name="txt_purok" class="" type="text"  placeholder="Address Purok"/>
                                    </div>
                                    <div class="">
                                   <label>Head Family Name:</label><br>
                                        
                                            <input name="txt_lname" class="" type="text" placeholder="Lastname"/>
                                        
                                            <input name="txt_fname" class="" type="text" placeholder="Firstname"/>
                                       
                                            <input name="txt_mname" class="" type="text" placeholder="Middlename"/>
                                        
                                    </div>
                                    <div class="">     
                                        <label class="">Sex:</label>
                                        <select name="ddl_gender" class="">
                                            <option selected="" disabled="">-Select Sex-</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                   
                                       
                                        <label class="control-label">Civil Status:</label>
                                        <select name="ddl_status" class="">
                                            <option selected="" disabled="">-Select Status-</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Separated">Separated</option>
                                        </select>
                                    </div>
                                    <div class="">
                                        <label class="">Religion:</label>
                                        <input name="txt_religion" class="" type="text" placeholder="Religion"/>
                                    </div>
                                    <div class="">
                                        <label class="">Birth Date:</label>
                                        <input name="txt_dbirth" class="" type="date" placeholder="Birthdate"/>
                                  
                                        <label class="">Birthplace:</label>
                                        <input name="txt_bplace" class="" type="text" placeholder="Birthplace"/>
                                    </div> 
                                    <div class="">
                                        <label class="">Age:</label>
                                        <input name="age" class="" type="text" placeholder="Age"/>
                                    </div> 
                                    <div class="">     
                                        <label class="">School:</label>
                                        <select name="ddl_School" class="">
                                            <option selected="" disabled="">-Select Option-</option>
                                            <option value="In">In</option>
                                            <option value="Out">Out</option>
                                        </select>
                                    </div>
                                    <div class="">
                                        <label class="">Educational Attainment:</label>
                                        <input name="txt_educ" class="" type="text" placeholder="Educational Attainment"/>
                                    </div> 
                                    <div class="">     
                                        <label class="">Employment:</label>
                                        <select name="ddl_employment" class="">
                                            <option selected="" disabled="">-Select Employment-</option>
                                            <option value="Gov">Gov</option>
                                            <option value="Pri">Pri</option>
                                            <option value="SE">SE</option>
                                            <option value="UN">UN</option>
                                        </select>
                                    </div>
                                    
                                    <div class="">
                                        <label class="">Major Occupation:</label>
                                        <input name="txt_occupation" class="" type="text" placeholder="Major Occupation"/>
                                    </div> 
                                    <div class="">
                                        <label class="">Monthly Income:</label>
                                        <input name="txt_income" class="" type="text" placeholder="Monthly Income"/>
                                    </div> 
                                    <input type="hidden" name="position" value="Head Family">
    <hr id="hr">
<div align="center">
    <input type="submit" name="submited" class="registerbtn" style="font-size:20px;" value="Submit">
</div>
        </form> 
        </main>
</div>

</body>
</html>
<?php }else { echo header("location: ../index.php"); }?>