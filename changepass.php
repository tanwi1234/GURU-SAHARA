<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gradient Card</title>

	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ballet&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Anton&family=Oswald:wght@200;400&display=swap" rel="stylesheet">
</head>
<style>
body
{
  background:url('book.jpg');
  background-size:cover;
  background-repeat:no-repeat;
}

input
{
    margin:10px;
}
h2
{
  text-align:center;
  margin-top:50px;
}
.spanclass
{
  font-size:50px;
  text-align:center;
  color:yellow;
  font-family: 'Kaushan Script', cursive;
}
#title
{
 margin-right:40px;
  color:white;
 float:right;
margin-top:0px;
border-radius:8px;
background-color:red;
  font-size:20px;
  padding:5px 20px;
}
.sidenav {
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background: rgba(0,0,0,0.7);
  overflow-x: hidden;
  padding-top: 20px;
}
span
{
  margin:23px;
}
i
{
  color:white;

  margin:8px;
}
.dropdown-btn
{
  margin:20px;
  text-decoration: none;
  font-size: 17px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;

}
a,.dropdown-btn {
 
  text-decoration:none;
  font-size: 17px;
  color: white;
  border:none;
  
}
.fa-chevron-down
{
  float:right;
  padding-right:35px;
 
}
.sidenav a:hover {
  color: #f1f1f1;
  text-decoration:none;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

#cardss:hover{
    opacity: 1;
    
  
    
}

.gradient{
    
    background-image: linear-gradient(0deg,   #009ece,transparent);
    position:absolute;
    height: 200px;
    width: 400px;
    opacity: 0;
    transition: opacity 0.5s;
}

.dropdown-btn:focus
{
  outline:0;
  border:none;
}
#cardss
  {
    
    
background-color:yellow;
  border-radius:220px;

   height:300px;
   margin:20px;
 

  }
  .dropdown-container {
  display: none;
}
  
</style>
<div class="sidenav">
<div style="margin:auto;color:white;display:flex;align-items:center;flex-direction:column;"><i class="fa fa-user-circle" style="font-size: 40px;"aria-hidden="true"></i> 
<?php

session_start();
if($_SESSION['user']){
  echo"<div>". $_SESSION['user']."</div>" ;
}else{
    header("location:index.php");
}

?>
</div>
<div style="padding-left:10px;">
<span style="display:flex;flex-direction:row;"><i class="fa fa-tachometer" aria-hidden="true" style="color:white;"></i><a href="home.php">Dashboard</a></span>
<span style="display:flex;flex-direction:row;"><i class="fa fa-graduation-cap" aria-hidden="true"></i><a href="branch.php">Classes</a></span>
  <span style="display:flex;flex-direction:row;"><i class="fa fa-tasks" aria-hidden="true"></i><a href="subject.php">Subjects </a></span>
  <span style="display:flex;flex-direction:row;"><i class="fa fa-tasks" aria-hidden="true"></i><a href="student.php">Students </a></span>
  <button class="dropdown-btn"><i class="fa fa-folder" aria-hidden="true"></i>Documents 
  <i class="fa fa-chevron-down" aria-hidden="true"></i></i>
  </button>
  <div class="dropdown-container">
  <span style="display:flex;flex-direction:row;"><i class="fa fa-upload" aria-hidden="true"></i><a href="uploadpaper.php">Upload Documents</a></span>
  <span style="display:flex;flex-direction:row;"><i class="fa fa-folder" aria-hidden="true"></i><a href="mergetable.php">View documents</a></span>
  </div>
  <button class="dropdown-btn"><i class="fa fa-id-card" aria-hidden="true"></i>Exam Info 
  <i class="fa fa-chevron-down" aria-hidden="true"></i></i>
  </button>
  <div class="dropdown-container">
  <span style="display:flex;flex-direction:row;"><i class="fa fa-file-excel-o" aria-hidden="true"></i><a href="class.php">Datesheet</a></span>
  <span style="display:flex;flex-direction:row;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><a href="setpapers.php">Generate Question Paper</a></span>
  </div>
  <span style="display:flex;flex-direction:row;"><i class="fa fa-key" aria-hidden="true"></i><a href="setpapers.php">Change Password</a></span>
  <span style="display:flex;flex-direction:row;"><i class="fa fa-sign-out" aria-hidden="true"></i> <a href="logout.php">LogOut</a> </span>
  </div>
  
</div>
<body>
<div class="container" style="position:absolute;left:30%;top:25%;background:white;border:2px solid white; padding:50px;">
<h1 style="text-align:center;"> UPDATE YOUR PROFILE </h1><br>
<form method="post" action="pass.php" role="form" enctype="multipart/form-data"> 
<div style="display:flex;justify-content:center;align-items:center;flex-direction:column;">
  <div class="col-md-9">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username"placeholder="Enter Your name" >
  </div>
  <div class="col-md-9">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password"placeholder="Password">
  </div>
  </div>
  <div style="display:flex;justify-content:center;align-items:center;">
  <button type="submit" class="btn btn-danger" style="padding:8px 30px;"name="update">Update</button>
  </div>
</form>
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>
</body>
</html>
