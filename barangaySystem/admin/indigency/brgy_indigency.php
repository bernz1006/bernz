<?php 
    
    include_once("../../connections/connection.php");

    $con = connection();
    $id =$_GET['ID'];

    $sql = " SELECT * FROM tblindigency WHERE id = '$id' ";
    $result=$con->query($sql) or die ($con->error);
    $row=$result->fetch_assoc();
?>
<?php session_start(); ?>
<?php if(isset($_SESSION['UserLogin'])){?> 
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
            text-align:center;
            font-family:Arial Narrow;
            font-size:14pt;
        } 
        #two2{
            border: none;
            outline:none;
            border-bottom: 1px solid black;
            length: auto;
            font-style: italic;
            font-weight: bold;
            width: 10%;
            text-align:center;
            font-family:Arial Narrow;
            font-size:14pt;
        } 
        #two3{
            border: none;
            outline:none;
            border-bottom: 1px solid black;
            length: auto;
            font-style: italic;
            font-weight: bold;
            width: 3%;
            text-align:center;
            font-family:Arial Narrow;
            font-size:14pt;
        } 
        #two4{
            border: none;
            outline:none;
            border-bottom: 1px solid black;
            length: auto;
            font-style: italic;
            font-weight: bold;
            width: 50%;
            text-align:center;
            font-family:Arial Narrow;
            font-size:14pt;
        } 
        #two5{
            border: none;
            outline:none;
            border-bottom: 1px solid black;
            length: auto;
            font-style: italic;
            font-weight: bold;
            width: 5%;
            text-align:center;
            font-family:Arial Narrow;
            font-size:14pt;
        } 
        #two6{
            border: none;
            outline:none;
            border-bottom: 1px solid black;
            length: auto;
            font-style: italic;
            font-weight: bold;
            width: 20%;
            text-align:center;
            font-family:Arial Narrow;
            font-size:14pt;
        } 
        #two7{
            border: none;
            outline:none;
            border-bottom: 1px solid black;
            length: auto;
            width: 23%;
            text-align:center;
            font-family:Arial Narrow;
            font-size:14pt;
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
    color:orange;
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
hr.line-1{
  border-top: 2px solid black;
  margin:0;
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
   
    margin:0;
    font-size:14pt;
    font-family:Arial Narrow;
    font-weight:bold;
    color:blue;
}
.p8{ 
    text-align:right;

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
        <button id="printb2"><a href="../indigency.php"  id="cancel" >cancel</a></button>
        </div>
   
    <body>
        
    <div class="certificate" id="print">
    <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
  
    <img src="../../img/atate.png" alt="BongabonLogo"   align="left" style="width:130px;height:130px;  border-radius: 50px; padding-left: 50px; padding-top:10px;"><img src="../../img/palayancity.png" alt="NuevaEcijaLogo"  align="right" style="width130px;height:130px; border-radius: 50px; padding-right: 50px;padding-top:10px;" >
   
    <br><br><br><p class="top">Republic of the Philippines</p>
    <p class="top">Province of Nueva Ecija</p>
   <p class="top">City of Palayan</p>
   <p class="top">Barangay Atate</p>
   <hr class="line-1"></hr>
   <p class="trd">OFFICE OF THE PUNONG BARANGAY</p>
   <hr class="line-1"></hr>
   <br><br>
   <img src="../../img/bg2.png"   align="left" 
    style="width:6.59cm;height:18.97cm;">
<div class="main"> 
    <p class="sec">BARANGAY CERTIFICATE OF INDIGENCY</p>
       <br>
        <p class="p1">TO WHOM IT MAY CONCERN:</p>
      <p class="p2">This is to certify that <input type="text" name="two" id="two" value="<?php echo $row['firstname']. ' '. $row['middlename'].' ' .$row['lastname'];?>"> of legal age, is a</p>
     <p class="p3">Bonafide resident of Barangay Atate, Palayan City. The said person is of Good</p> 
     <p class="p3">Moral Character and an Active Member of the Community. She/He is one of</p>
        <p class="p3">those who belong to a Low-Income Family.</p>
        <br>
        <p class="p2">This Certification is being issued upon the request of the above-named</p>
        <p class="p3">person for <input type="text" name="two" id="two" value="<?php echo $row['purpose'];?>"> purpose/s.</p><br>
        <p class="p31">Given this <input type="text" name="two" id="two5"> 
        day of <input type="text" name="two" id="two6"> 
        2022 here at</b></p>
        <p class="p3"> <b>Barangay Atate, Palayan City, Nueva Ecija.</b></p>
        <br>
        <p class="p4"><input type="text" name="two" id="two"></p>
<p class="p5">SIGNATURE</p>
<br><br>
<p class="p6">Kagawad Sonny de Vera</p>
<p class="p7">Officer Duty of the Day</p>
<p class="p8">(Authorized Barangay Official)</p>
<br><br>
<p class="p9">HON. FLORENCIO D. BERNARDO</p>
<p class="p10">Punong Barangay</p>
</div>
 


    </body>
</html>
<?php }else {
        echo header("location: loginUser.php");
}?>
 