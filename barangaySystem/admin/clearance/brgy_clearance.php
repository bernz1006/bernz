<?php 
    
    include_once("../../connections/connection.php");

    $con = connection();
    $id =$_GET['ID'];

    $sql = " SELECT * FROM tblclearance WHERE id = '$id' ";
    $result=$con->query($sql) or die ($con->error);
    $row=$result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
               <title>Administrator Page</title>
       
               <style>
#two{
            border: none;
            outline:none;
            border-bottom: 1px solid black;
            length: auto;
            font-style: italic;
            font-weight: bold;
            width: 30%;
            font-size:14pt;
    font-family:Arial Narrow;
    text-align:center;
        } 
        #two2{
            border: none;
            outline:none;
            border-bottom: 1px solid black;
            length: auto;
            font-style: italic;
            font-weight: bold;
            width: 10%;
            font-size:14pt;
    font-family:Arial Narrow;
    text-align:center;
        } 
        #two3{
            border: none;
            outline:none;
            border-bottom: 1px solid black;
            length: auto;
            font-style: italic;
            font-weight: bold;
            width: 3%;
            font-size:14pt;
    font-family:Arial Narrow;
    text-align:center;
        } 
        #two4{
            border: none;
            outline:none;
            border-bottom: 1px solid black;
            length: auto;
            font-style: italic;
            font-weight: bold;
            width: 50%;
            font-size:14pt;
    font-family:Arial Narrow;
    text-align:center;
        } 
        #two5{
            border: none;
            outline:none;
            border-bottom: 1px solid black;
            length: auto;
            font-style: italic;
            font-weight: bold;
            width: 5%;
            font-size:14pt;
    font-family:Arial Narrow;
    text-align:center;
        } 
        #two6{
            border: none;
            outline:none;
            border-bottom: 1px solid black;
            length: auto;
            font-style: italic;
            font-weight: bold;
            width: 20%;
            font-size:14pt;
    font-family:Arial Narrow;
    text-align:center;
        } 
        #two7{
            border: none;
            outline:none;
            border-bottom: 1px solid black;
            length: auto;
            width: 23%;
            font-size:14pt;
    font-family:Arial Narrow;
    text-align:center;
        } 
        
.certificate{   

  
    border: none;
    background-image: url("../../img/bgatate.png");
    background-repeat: no-repeat;
    background-size: cover;
    
}
.top{
    font-size:12pt;
    line-height: 3pt;
  
    
    text-align: center;
    font-family:arial;
    font-weight: bold;
}
.sec{
  margin:0;
    font-size:18pt;
    text-align: left;
    padding-left: 60px;
    text-align: center;
    font-family:Baskerville Old Face;
    font-weight: bold;
    font-style:italic;
    color:yellowgreen;
}
.sec2{
    font-size:18pt;
    line-height: 0;
    text-align: left;
    padding-left: 60px;
    text-align: center;
    font-family:arial;
    font-weight: bold;
}
.trd{
    font-size:18pt;
   
    margin: 1px;
    text-align: left;
    
    text-align: center;
    font-family:Engravers MT;
    font-weight: bold;
}
.line-1 {
  height: 1px;
  background: black;
}
.p1{ 
    text-indent:10px;
    margin-left: 1.27cm;
    font-size:14pt;
    font-family:Arial Narrow;
    font-weight: bold;
}
.p2{ 
  text-indent:35px;
    margin:8px;
    font-size:14pt;
    font-family:Arial Narrow;
}
.p3{ 
  text-indent:10px;
  margin:8px;
    font-size:14pt;
    font-family:Arial Narrow;
}
.p31{ 
  text-indent:35px;
  margin:8px;
    font-size:14pt;
    font-family:Arial Narrow;
}
.p4{ 
  text-align:right;
  margin:0;
    font-size:14pt;
    font-family:Arial Narrow;
}
.p5{ 
  text-align:right;
  margin:0;
  padding-right:2cm;
    font-size:14pt;
    font-family:Arial Narrow;
    font-weight:bold;
}
.p6{ 
    text-align:right;
    margin:0;
    font-size:14pt;
    font-family:Arial Narrow;
    font-weight:bold;
}
.p7{ 
    text-align:right;
    padding-right:1cm;
    margin:0;
    font-size:14pt;
    font-family:Arial Narrow;
    font-weight:bold;
}
.p8{ 
    text-align:right;
    padding-right:1cm;
    margin:0;
    font-size:9pt;
    font-family:calibri;
    font-weight:bold;
    font-style:italic;
}
.p9{ 
    text-align:right;
    text-decoration: underline;
    margin:0;
    font-size:12pt;
    font-family:Arial Narrow;
    font-weight:bold;
}
.p10{ 
    text-align:right;
    padding-right:1cm;
    margin:0;
    font-size:12pt;
    font-family:calibri;
    font-style:italic;
}
    #prt-btn {
    margin-top: 100px;
    margin-left: 200px;
}
#printb{
    
    color: white;
    text-transform: uppercase;
    font-weight: 1000;
    border-radius: 17px 17px 17px 17px;
    border: 2px solid black;  
 
    background-color:blue;
    text-decoration: underline;
}
#printb2{
   
    color: white;
    text-transform: uppercase;
    font-weight: 1000;
    border-radius: 17px 17px 17px 17px;
    border: 2px solid black;  
   
    background-color:red;
}
#cancel{
    color: white;
}
button:hover{
    cursor:pointer;
}
@media print {  
		@page {
			size:8.5in 11in;
     
		}
		head{
			height:0px;
			display: none;
		}
		#prt-btn{
            height: 0px;
            display: none;
        }
      
		}
        #print{
		width:7.5in;
		}
		input {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px solid black;
}
.certificate{
    margin-left:auto;
    margin-right:auto;
}

                </style>
      </head>
      <div id="prt-btn">
        <button onclick="window.print()" id="printb">print</button>
        <button id="printb2"><a href="../clearance.php"  id="cancel" >cancel</a></button>
        </div>
        
    <body>

    <div class="certificate" id="print">
   
    <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
  
    <img src="../../img/atate.png" alt="BongabonLogo"   align="left" style="width:130px;height:130px;  border-radius: 50px; padding-left: 50px; padding-top:10px;"><img src="../../img/palayancity.png" alt="NuevaEcijaLogo"  align="right" style="width130px;height:130px; border-radius: 50px; padding-right: 50px;padding-top:10px;" >
   
    <br><br><br><p class="top">Republic of the Philippines</p>
    <p class="top">Province of Nueva Ecija</p>
   <p class="top">City of Palayan</p>
   <p class="top">Barangay Atate</p>
   <div class="line-1"></div>
   <p class="trd">OFFICE OF THE PUNONG BARANGAY</p>
   <div class="line-1"></div>
   <br><br>
   <img src="../../img/bg2.png"   align="left" 
    style="width:6.59cm;height:18.97cm;">
<div class="main"> 
    <p class="sec">BARANGAY CLEARANCE</p>
       <br>
        <p class="p1">TO WHOM IT MAY CONCERN:</p>
      <p class="p2">This is to certify that <input type="text" name="two" id="two" value="<?php echo $row['firstname']. ' '. $row['middlename'].' ' .$row['lastname'];?>"> , 
      <input type="text" name="two" id="two2" value="<?php echo $row['age'];?>"> </p>
     <p class="p3">years old, a Filipino Citizen, whose signature appears before, 
        is a BONAFIDE</p> <p class="p3">resident of this Barangay with postal address at Purok
        <input type="text" name="two" id="two3" value="<?php echo $row['purokno'];?>">Barangay Atate,</p>
        <p class="p3"> Palayan City, Nueva Ecija.</p>
        <br>
        <p class="p2">Issued upon the request of the aforementioned name for the purpose of</p>
        <p class="p3"><input type="text" name="two" id="two4" value="<?php echo $row['purpose'];?>"></p><br>
        <p class="p31">Issued this <input type="text" name="two" id="two5"> 
        DAY of <input type="text" name="two" id="two6"> 
        2022 here at <b>Barangay</b></p>
        <p class="p3"> <b>Atate, Palayan City, Nueva Ecija.</b></p>
        <br>
        <p class="p4"><input type="text" name="two" id="two"></p>
<p class="p5">SIGNATURE</p>
<br><br>
<p class="p6">Kagawad<input type="text" name="two" id="two7"></p>
<p class="p7">Duty Officer of the Day</p>
<p class="p8">(Authorized Barangay Official)</p>
<br>
<p class="p9">HON. FLORENCIO D. BERNARDO</p>
<p class="p10">Punong Barangay</p>
</div>
 

</div>
    </body>
</html>