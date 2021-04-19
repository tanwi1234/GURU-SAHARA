<?php
$servername="localhost";
$username="root";
$password="";
$database="questiongenerator";
$conn=mysqli_connect($servername,$username,$password,$database);
$sql="SELECT * FROM uploadpaper ";
$result=mysqli_query($conn,$sql);
$files=mysqli_fetch_all($result,MYSQLI_ASSOC);
if(isset($_POST['submit']))
{
  $ques=$_POST['ques'];
$filename = $_FILES["myfile"]["name"];
$destination = 'uploads/'.$filename;
$extension=pathinfo($filename,PATHINFO_EXTENSION);
$file=$_FILES["myfile"]["tmp_name"];
if(!in_array($extension,['pdf']))
{
  echo"<script>alert('File must be in pdf');</script>";
}
else{
if(move_uploaded_file($file,$destination))
{
$sql="INSERT INTO uploadpaper (Paper,papers) VALUE ('$filename','$ques')";
$result= mysqli_query($conn,$sql);
if(!$result)
{
 echo"<script>alert('Failed to upload');</script>";
}
else{
    echo"<script>alert('upload successfully');</script>";
}
}
    
}
}
if(isset($_GET['file_id']))
{
  $id=$_GET['file_id'];
  $sql="SELECT * FROM uploadpaper WHERE s.no=$id";
  $result=mysqli_query($conn,$sql);
  $file=mysqli_fetch_assoc($result);
  $filepath='uploads/'.$file['name'];
  if(file_exists($filepath))
  {
    header('Content-Type:application/octet-stream');
header('Content-Description:File Transfer');
header('Content-Dispoition:attachment;filename='.basename($filepath));
header('Expires:0');
header('Cache-Control:must-revalidate');
header('Pragma:public');
header('Content-length:'.filesize('uploads/'.$file['name']));
readfile('uploads/'.$file['name']);
$newCount=$file['downloads']+1;
$updateQuery="UPDATE uploadpaper SET downloads=$newCount WHERE s.no=$id";
mysqli_query($conn,$upadteQuery);
exit;
  }
}






?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <link rel="stylesheet"href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">

 
</head>
   <style>
    body
{
  background:url('book.jpg');
  background-size:cover;
  background-repeat:no-repeat;
}
    #hiis
   {
     text-align:center;
     margin:60px;
     padding:40px;
     color:white;
     background:green;
   }
   #hii
   {
     text-align:center;
     margin:20px;
     padding:40px;
     color:white;
     background:red;
   }
     #form{

display:none;

}
   h2
   {
     position:relative;
    
   }
   #btn
   {
     position:absolute;
    padding:5px 15px;
    right:0;
     
   }
   #del{

padding:10px;
margin:5px;
border-radius:8px;
       border:2px;
       background:green;
       color:white;
   }
   #edit{

    padding:10px;
margin:5px;
border-radius:8px;
       border:2px;
       background:red;
       color:white;

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
.dropdown-btn:focus
{
  outline:0;
  border:none;
}
.fa-chevron-down
{
  float:right;
  padding-right:35px;
 
}
a {
 
  text-decoration:none;
  font-size: 17px;
  color: white;
  
}


.sidenav a:hover {
  color: #f1f1f1;
  text-decoration:none;
}


@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
   
   
   
   

   </style>

<body style="background-color:#fefbd8" >
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
  <span style="display:flex;flex-direction:row;"><i class="fa fa-key" aria-hidden="true"></i><a href="changepass.php">Change Password</a></span>
  <span style="display:flex;flex-direction:row;"><i class="fa fa-sign-out" aria-hidden="true"></i> <a href="logout.php">LogOut</a> </span>
  </div>
  
  
</div>

<!--insert modal-->
<div class="container" style="position:absolute;left:30%;top:20%;background:white;border:2px solid white; padding:50px;">
<h1 style="text-align:center;"> UPLOAD DOCUMENTS </h1><br>
<form method="post" role="form" enctype="multipart/form-data"> 
  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="paper">Question Paper Name</label>
      <input type="text" class="form-control"required=" "id="paper"name="ques" >
    </div>
    <div class="form-group col-md-4">
      <label for="branch">Branch Name</label>
      <select name="branch" class="form-control" id="branch" required="">
      <option>Select Any One</option>
      <option>Electronics and Communication Engineering</option>
      <option>Computer Science</option>
      <option>Information Technology</option>
      <option>Bio technology</option>
      <option>Civil Engineering</option>
      <option>Mechanical Engineering</option>
     
      
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="sem">Semester</label>
      <select name="sem" class="form-control" id="sem" required="">
      <option>Select Any One</option>
      <option>1st</option>
      <option>2nd</option>
      <option>3rd</option>
      <option>4th</option>
      <option>5th</option>
      <option>6th</option>
      <option>7th</option>
      <option>8th</option>
      
      </select>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="code">Subject code</label>
    <input type="text"required=" "name="code"id="code"class="form-control" >
  </div>
  <div class="form-group col-md-6">
    <label for="sub">Subject Name</label>
    <select name="sub" class="form-control" id="sub" required>
    <option val="">Select Any One</option>
      <option val="cloud computing">cloud computing</option>
      <option val="Machine learning">Machine learning</option>
      <option val="Software development">Software development</option>
      <option val="Analog electronics">Analog electronics</option>
      <option val="Digital Electronics<">Digital Electronics</option>
      <option val="Data Structure">Data Structure</option>
      <option val="Algorithm">Algorithm</option>
      
      </select>
  </div>
  </div>
  <div class="align-items-center">
       <input type="file" name="myfile" class="btn btn-info" role="button"  style="color:white;">
       <button type="submit" name="submit" class="btn btn-danger" style="padding:10px;">Upload</button>
       </div>
       </form>
      
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
           

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
   
    $('#myTable').dataTable( {
  "lengthMenu": [ 7, 10, 25,35,50, 75, 100 ],
        
        "ordering": false,
        "info":     false
       
} );
} );
</script>
<script>
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
