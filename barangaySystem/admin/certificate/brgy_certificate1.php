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
            width: 25%;
        } 
        #two2{
            border: none;
            outline:none;
            border-bottom: 1px solid black;
            length: auto;
            width: 10%;
        } 
        #two3{
            border: none;
            outline:none;
            border-bottom: 1px solid black;
            length: auto;
            width: 20%;
        } 
        #two4{
            border: none;
            outline:none;
            border-bottom: 1px solid black;
            length: auto;
            width: 23%;
        } 
        

.top{
    font-size:12pt;
    line-height: 3pt;
  
    
    text-align: center;
    font-family:arial;
    font-weight: bold;
}
.sec{
    font-size:18pt;
    line-height: 2;
    text-align: left;
    padding-left: 60px;
    text-align: center;
    font-family:arial;
    font-weight: bold;
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
    margin:0;
    font-size:11pt;
    font-family:Calibri;
}
.p2{ 
    margin-left: 1.27cm;
    margin-bottom:0;
    font-size:11pt;
    font-family:Calibri;
}
.p3{ 
    margin-left: 3.5cm;
    font-size:11pt;
    margin-bottom:0;
    font-family:Calibri;
}
.p4{ 
    text-align:right;
    margin:0;
    padding-right:1.27cm;
    font-size:11pt;
    font-weight:bold;
    text-decoration:underline;
    font-family:Calibri;
}
.p5{ 
    text-align:right;
    padding-right:2cm;
    margin:0;
    font-size:11pt;
    font-family:Calibri;
}
.p6{ 
    text-align:right;
    padding-right:3cm;
    margin:0;
    font-size:11pt;
    font-family:Calibri;
}
.p7{ 
    text-align:right;
    margin:0;
    padding-right:1.27cm;
    font-size:11pt;
    font-family:Calibri;
}
.p8{ 
    text-align:right;
    margin:0;
    padding-right:1.27cm;
    font-size:11pt;
    font-family:Calibri;
    font-weight:bold;
}
p{
    text-align: justify;
  text-justify: inter-word;

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
        }}
        #print{
		width:7.5in;
		
		}
		input {
            text-align: center;
            text-transform: capitalize;
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px solid black;
    margin-left: 0 auto;
   margin-right: 0 auto;
}
.certificate{
    margin-left:auto;
    margin-right:auto;
}
                </style>
                 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      </head>
      <div id="prt-btn">
        <button onclick="window.print()" id="printb">print</button>
        <button id="printb2"><a href="../certificate.php"  id="cancel" >cancel</a></button>
        </div>
    <body>
    

    <div class="certificate" id="print" >
    <form>
    <img src="../../img/atate.png" alt="BongabonLogo"   align="left" style="width:130px;height:130px;  border-radius: 50px; padding-left: 50px; padding-top:10px;"><img src="../../img/palayancity.png" alt="NuevaEcijaLogo"  align="right" style="width130px;height:130px; border-radius: 50px; padding-right: 50px;padding-top:10px;" >
    <br><br><br><p class="top">Republic of the Philippines</p>
    <p class="top">Province of Nueva Ecija</p>
   <p class="top">City of Palayan</p>
   <p class="top">Barangay Atate</p>
   <div class="line-1"></div>
   <p class="trd">OFFICE OF THE PUNONG BARANGAY</p>
   <div class="line-1"></div>
   <br><br>
<div class="main"> 
    <p class="sec">BARANGAY CERTIFICATION</p>
    <p class="sec2">(First Time Jobseekers Assistance Act - RA 11261)</p>
       <br><br><br>
       <p class="p2">This is to certify that <input type="text" name="two" id="two" > 
       , a resident of PUROK <input type="text" name="two" id="two2"> ,<b>BARANGAY ATATE  
        <p class="p1">PALAYAN CITY NUEVA ECIJA</b> for <b><input type="text" name="two" id="two2"> 
        years and <input type="text" name="two" id="two2"> months</b>, is a qualified availee 
        of <b>RA 11261</b> or <b>the First Time</b></p>
        <p class="p1"><b>Jobseekers Assistance Act of 2019.</b></p>
        <br>
<br>
<br>
<p class="p2">I further certify that the holder/bearer was informed of 
his/her rights, including the duties and responsibilities </p>
<p class="p1">accorded by <b>RA 11261</b> through the <b>Oath of Undertaking</b> 
he/she has signed and executed in the presence of Barangay</p>
<p class="p1">Official/s.</p>
<br><br><br>
<p class="p3">Signed this <input type="text" name="two" id="two2"> <b>day of</b> 
<input type="text" name="two" id="two3"> , 
<b>2022</b>, in the City of Palayan , Nueva Ecija.</p>
<br><br>
<p class="p3">This certification is valid only until 
<input type="text" name="two" id="two3">
<b>2023</b> one (1) year from the issuance.</p>
<br><br><br>
<p class="p4">Hon. Florencio D. Bernardo</p>
<p class="p5">Punong Barangay</p>
<br>
<p class="p4"><input type="text" name="two" id="two3"></p>
<p class="p6">Date</p>
<br><br><br>
<p class="p8">Kagawad<input type="text" name="two" id="two4"></p>
<p class="p7">Authorized Barangay Official and Position</p>
<br>
<p class="p4"><input type="text" name="two" id="two3"></p>
<p class="p6">Date</p>
</div>
</form>
</div>
    </body>
</html>
<?php }else {
        echo header("location: loginUser.php");
}?>