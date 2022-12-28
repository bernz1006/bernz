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
            border-bottom: 3px solid black;
            length: auto;
            width: 45%;
        } 
        #two2{
            border: none;
            outline:none;
            border-bottom: 2px solid black;
            length: auto;
            width: 40%;
        } 
        #two3{
            border: none;
            outline:none;
            border-bottom: 1px solid black;
            length: auto;
            width: 2%;
        } 
        #two4{
            border: none;
            outline:none;
            border-bottom: 3px solid red;
            length: auto;
            width: 33%;
        } 
        #two5{
            border: none;
            outline:none;
            border-bottom: 2px solid blue;
            length: auto;
            width: 20%;
        } 
        

form
{
    border-style: double;
}

.top{
    font-size:12pt;
    line-height: 3pt;
    text-align: center;
    font-family:Century Gothic;
    
}
.sec{
    font-size:18pt;
    
    text-align: left;
  
    text-align: center;
    font-family:Rockwell Extra Bold;
    font-weight: bold;
}
.sec2{
    font-size:18pt;
    line-height: 0;
    text-align: left;
 
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
  height: 2.5px;
  background: black;
}
.line-2 {
  height: 1px;
  background: black;
}

.p2{ 
    text-indent:10px;
    margin-bottom:0;
    font-size:12pt;
    font-family:Century Gothic;
}
.p3{ 
    
    margin-bottom:0;
    font-size:11pt;
    text-align:center;
    font-family:Century Gothic;
}
.p4{ 
    
    margin:0;
    font-size:10pt;
    text-align:center;
    font-family:Century Gothic;
    font-weight:bold;
}
.p5{    
    margin:0;
    font-size:14pt;
    text-align:center;
    font-family:Arial Narrow;
    font-weight:bold;
    font-style: italic;
}
.p6{ 
    margin:0;
    font-size:12pt;
    text-align:center;
    font-family:Century Gothic;
    font-weight:bold;
}
.p7{ 
    margin:0;
    font-size:12pt;
    text-align:center;
    font-family:Century Gothic;
    font-weight:bold;
}
.p8{ 
    margin:0;
    font-size:11pt;
    text-align:center;
    font-family:Century Gothic;
   
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
			size:11in 8.5in;

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
            width:11in;
    height:8.5in;
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
        <button id="printb2"><a href="../business.php"  id="cancel" >cancel</a></button>
        </div>
    <body>
        
    <div class="certificate" id="print">
    <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
    <form>
    <img src="../../img/atate.png" alt="Logo"   align="left" style="width:130px;height:130px;  border-radius: 50px; padding-left: 50px; padding-top:10px;"><img src="../../img/palayancity.png" alt="NuevaEcijaLogo"  align="right" style="width130px;height:130px; border-radius: 50px; padding-right: 50px;padding-top:10px;" >
    <br><p class="top">Republic of the Philippines</p>
    <p class="top">Province of Nueva Ecija</p>
   <p class="top">City of Palayan</p>
  <b> <p class="top">BARANGAY ATATE</p>
   <p class="top">OFFICE OF THE PUNONG BARANGAY</p></b><br>
   <div class="line-1"></div>
   
<div class="main"> 
    <p class="sec"><u>BARANGAY BUSINESS CLEARANCE</u></p>

       <p class="p2">TO WHOM IT MAY CONCERN:</p>
        <br>
<p class="p2"><b>This is to certify that</b></p>


<p class="p3"><input type="text" name="two" id="two"></p>
<br>
<p class="p3"><input type="text" name="two" id="two2"></p>
<p class="p4">Name of Business / OWNER</p><br>
<p class="p5">PUROK <input type="text" name="two" id="two3"> ,BARANGAY ATATE, PALAYAN CITY</p>
<div class="line-2"></div>
<p class="p6">Business Address/Office Address</p>
<br>
<p class="p3"><input type="text" name="two" id="two4"></p>
<p class="p6">Type of Business</p>
<br>
<p class="p6">is now operating a business within the 
jurisdiction of Barangay Atate, Palayan City, Nueva Ecija</p>
<br>
<p class="p7">Issued this<input type="text" name="two" id="two3">
<label style="color:blue; font-size:14pt;">DAY OF 
<input type="text" name="two" id="two5"> ,2022</label></p>
<p class="p6"><label style="color:red; font-weight:bold;">Noted:</label> Any violation(s) or illegal acts(s) committed by a 
business will be cause for cancelation of this clearance. </p>
<br>
<p class="p6">KAGAWAD;SONNY T. DE VERA </p>
<p class="p8">OFFICER DUTY OF THE DAY</p>
<br>
<p class="p6">HON. FLORENCIO BERNARDO</p>
<p class="p8">PUNONG BARANGAY </p>
</div>
</form>
</div>
 


    </body>
</html>
<?php }else {
        echo header("location: loginUser.php");
}?>