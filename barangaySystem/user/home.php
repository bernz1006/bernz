<?php  if(!isset($_SESSION)){session_start();}
        include_once("../connections/connection.php");
            $con = connection(); 
            
            
            
            
            ?>
<?php if(isset($_SESSION['UserLogin'])){?>
   <link rel="stylesheet" href="../css/user/main.css">
  
<?php include ("navigation.php"); ?>

<div class="main-content">
<main class="img">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  /* navigation*/
  *{
  text-transform: capitalize;
}.sidenav a, .dropdown-btn {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    display: block;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
  }
.sidenav a:hover, .dropdown-btn:hover {
    color: #f1f1f1;
  }
.main {
    margin-left: 200px; 
    font-size: 20px; 
    padding: 0px 10px;
  }
.active {
    color: white;
  }
  .dropdown-container {
    display: none;
    margin-top: .5rem;
    margin-bottom: -1rem;
    margin-left: 4rem;
  }
.dropdown-container a{
      padding: .5rem;
      padding-left: 6rem;
  }
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
.sidebar-menu button {
      padding-left: 1rem;
      display: block;
      color: #fff;
      font-size: 1.5rem;
      font-style: italic;
      font-weight: bold;
  }
.sidebar-menu button span:first-child{
      font-size: 1.5rem;
      padding-right: 1rem;
      color: whitesmoke;  
  }
.sidebar-menu button.active{
      color: black;
      background: lightgrey;
      padding-left: 1rem;
      border-radius: 30px 0px 0px 30px;
  }
.sidebar-menu button:hover{
      background: lightgrey;
      padding-left: 1.5rem;
      color:  rgb(0, 0, 0);
      border-radius: 30px 0px 0px 30px;
  }            
*{
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      list-style-type: none;
      text-decoration: none;
      font-family: Georgia, 'Times New Roman', Times, serif;
  }
.sidebar{
      width: 345px;
      position: fixed;
      left:0;
      top:0;                                                            
      height: 100%;
      background: grey;
      z-index: 1;
      transition: width 300ms;
  }
.sidebar-brand{
      height: 100px;
      padding-left: 1rem 0rem 1rem 2rem;
  }
.sidebar-brand h2{
      text-align: center;
      padding: 5px;
      color: white;
  }
.sidebar-brand img{ 
      display: block;
      width: 70px;
      height: 70px;
      margin-top: 5px;
      margin-left: auto;
      margin-right: auto;
  }              
  .sidebar-brand span{
      display: inline-block;
      padding-right: 1rem;
      padding-left: 1rem;
  }
.sidebar h1{
      margin-top: 1rem;
  }
.sidebar-menu h2 {
      padding-top: 20px;
      font-style: italic;
      margin-top: 0rem;
      padding-left: 1rem;
  }
.sidebar-menu li {
      width: 100%;
      margin-top: 1.5rem;
      padding-left: 2rem;
  }
.sidebar-menu a.active{
      color: black;
      background: darkseagreen;
      padding-top: 1rem;
      padding-bottom: 1rem;
      border-radius: 30px 0px 0px 30px;
  }
.sidebar-menu a:hover{
      background: whitesmoke;
      padding-left: 1.5rem;
      color:  rgb(0, 0, 0);
      border-radius: 30px 0px 0px 30px;
  }
.sidebar-menu a{
      padding-left: 1rem;
      display: block;
      color: #fff;
      font-size: 1.5rem;
      font-style: italic;
      font-weight: bold;
  }
.sidebar-menu a span:first-child{
      font-size: 1.5rem;
      padding-right: 1rem;
  }
.main-content{
      margin-left: 345px;
  }
header{
      background-color:lightseagreen;
      display: flex;
      justify-content: space-between;
      padding: 1rem;
      box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3);
      position: fixed;
      left: 345px;
      width: calc(100% - 345px);
      height: 77px;
      top: 0;
      z-index: 2;
      transition: left 300ms;
  }
#nav-toggle:checked + .sidebar{
      width: 70px;
  }
#nav-toggle:checked + .sidebar .sidebar-brand h2 span,
#nav-toggle:checked + .sidebar li {
      padding-left: 1rem;
      text-align: center;
  }
#nav-toggle:checked + .sidebar li a{
      padding-right: 0rem;
  }
#nav-toggle:checked + .sidebar .sidebar-brand h1 span:last-child,
#nav-toggle:checked + .sidebar li a span:last-child,
#nav-toggle:checked + .sidebar .sidebar-menu h2,
#nav-toggle:checked + .sidebar .sidebar-brand img,
#nav-toggle:checked + .sidebar .sidebar-brand h2,
#nav-toggle:checked + .sidebar .dropdown-btn,
#nav-toggle:checked + .sidebar .dropdown-container a{
      display: none;
  }
#nav-toggle:checked  ~.main-content {
      margin-left: 70px;
  }
#nav-toggle:checked  ~.main-content header {
   width: calc(100% - 0px);
   left: 0px;
  }
main{
    margin-top: 60px;
    padding: 2rem 1.5rem;
    background: #fff;
    min-height: calc(100vh - 90px);
    overflow: overlay;
}  


header h2{
      color: black;
      margin-top:6px;
  }
header label .las:hover{
    font-size: 2.3rem;
}
header label .las{
      font-size: 2rem;
      padding-left: 1rem;
      position: fixed;
  }
header h2 #label{
      padding-left: 3.5rem;
  }
.search{
      border: 1px solid  rgb(3, 3, 3);
      border-radius: 30px;
      height: 40px;
      overflow-x: hidden;
  }
.search span{
      display: inline-block;
      padding: 0rem 1rem;
      font-size: 1.5rem;
  }
.search button{
      background: transparent;
      border: none;
  }
.search input {
  height: 100%;
  padding-left: 1.5rem;
  margin-left: -.5rem;
  border: none;
  outline: none;
  font-style: normal;
  }
  
#r5{
  z-index: 100;
}
#r6{
  z-index:200;
}
#r7{
  z-index:300;
}
.row{
 margin-top: -20px;
}
.card-single{
  display: flex;
  justify-content: space-between;
  background: linear-gradient( 135deg, #031558, #04a7ed);
  padding: 2rem;
  border-radius: 5px;
  box-shadow: 4px 4px 10px #0c64bd;
  overflow: hidden;
  align-items: stretch;
  flex-wrap: nowrap;
  flex-direction: row;
  max-width:300px; min-height:156px;
}
.card-single h1{
color: black;
}
.card-single div:last-child span {
  background:transparent;
  color:black;
  font-size: 3rem;  
}
.card-single div:first-child span {
  background:transparent;
  font-size: 1.5rem; 
}
.card-single:last-child div:first-child span {
  color: #fff;  
}
.card-single:hover{
  background: linear-gradient( -135deg, #031558, #04a7ed);
}
.sub{
      display: none;
  }
.user{
      display: flex;
      align-items: center;
  }
.user img{
      border-radius: 50%;
      margin-right: .5rem;
  }
.user small{
      display: inline-block;
      color: #fff;   
  }
.user button{
      display: flex;
     background:none;
     border:none;
  }
.click{
         color:black;
      }
.click:hover{
     color: white;
         }
.click,.links{
          font-size: 1.2em;
      }
.list{
          width: 100%;
          position: fixed;
          transform: scaleY(0);
          transform-origin: top;
          transition: .8s;
      }
.newlist{
          background:transparent;
          transform: scaleY(1);
      }
.links a{
          background:black;
          color: white;
      }
.links a:hover{
          color:yellow;
          transform: scale(1.1);
      }
      
  /* */
* {
  box-sizing: border-box;
}

/* Style the body */
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

/* Header/logo Title */
.header {
  padding: 80px;
  text-align: center;
  background: white;
  color: black;
}
 #imgs{ 
  margin-bottom: 10px;
  margin-top: -70px;
                    display: block;  
margin-left: auto;  
margin-right: auto; 
background-position: center;
box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.bg-text {

  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
 
 
  width: auto;
  margin-left: auto;  
margin-right: auto;
margin-bottom: -70px;

  padding: 30px;

  text-align: center;
}

/* Increase the font size of the heading */
.header h1 {
  font-size: 40px;
}

/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
  .row {   
    flex-direction: column;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .navbar a {
    float: none;
    width: 100%;
  }
}
</style>
</head>
<body>

<div class="header">
<div id="imgs" class="w3-content w3-section" style="max-width:50%">
  <img class="mySlides" src="../img/palayan1.jpg" style="width:100%">
  <img class="mySlides" src="../img/palayan2.jpeg" style="width:100%">
  <img class="mySlides" src="../img/download.jpg" style="width:100%">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
<div class="bg-text">
  <h2>Brgy. Atate Bliss Background</h2></br>
  <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Atate is a barangay in the city of Palayan, in the province of Nueva Ecija. Its population as determined by the 2020 Census was 3,942. This represented 8.69% of the total population of Palayan.</br>
 <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Combining age groups together, those aged 14 and below, consisting of the young dependent population which include infants/babies, children and young adolescents/teenagers, make up an aggregate of 33.61% (1,079). Those aged 15 up to 64, roughly, the economically active population and actual or potential members of the work force, constitute a total of 61.99% (1,990). Finally, old dependent population consisting of the senior citizens, those aged 65 and over, total 4.39% (141) in all.</p>
</div>
</div>



</main>
</div>

</body>
</html>
<?php }else { echo header("location: index.php"); }?>