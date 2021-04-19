<?php
$servername="localhost";
$username="root";
$password="";
$database="questiongenerator";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
    die("connection failed:".mysqli_connect_error());
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  
 
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
<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title addmodalLabel">Add Paper Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="papers.php">
      <div class="modal-body">
      <input type="hidden" name="addno" id="addno" class="form-control"> <br>
 
     <lable> Paper Name</label>
     <input type="text" name="paper" id="paper" class="form-control"> <br>
      <label> Branch  </label>
 <select name="branchi" class="form-control" id="branchi">
      <option>Select Any One</option>
      <option>Electronics and Communication Engineering</option>
      <option>Computer Science</option>
      <option>Information Technology</option>
      <option>Bio technology</option>
      <option>Civil Engineering</option>
      <option>Mechanical Engineering</option>
     
      
      </select>
     
 <label> Semester </label>
 <select name="semi" class="form-control" id="semi">
      <option>Select Any One</option>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      
      </select>
      <label> Subject </label>
 <select name="sub" class="form-control" id="sub">
    <option>Select Any One</option>
      <option>cloud computing</option>
      <option>Machine learning</option>
      <option>Software development</option>
      <option>Analog electronics</option>
      <option>Digital Electronics</option>
      <option>Data Structure</option>
      <option>Algorithm</option>
      
      </select>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="add">Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--del modal-->
<div class="modal fade" id="deletesmodal" tabindex="-1" role="dialog" aria-labelledby="deletesmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title deletesmodalLabel">Delete Question paper</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="deletepaper.php">
      <div class="modal-body">
     <input type="hidden" name="delt_id" id="delt_id">
      <h4> Do you want to delete this question paper?</h4>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="delt">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>


<form method="POST" action='pdf.php' name='f1' id="form"style="position:absolute;left:40%;top:5%;background:white;border:2px solid white; padding:50px;margin:auto;">
<h1 style="text-align:center;color:black;">SET PAPER </h1>
<div class="form-row">
<div class="form-group col-md-9">

      <label for="collg">Institute Name</label>
      <input type="text" class="form-control"required=" "id="collg" name="collg" >
    </div>
    <div class="form-group col-md-3">
      <label for="date">Date of Examination</label>
      <input type="date" class="form-control"required=" "id="date"name="date" >
    </div>
</div>
  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="paper">Question Paper Name</label>
      <input type="text" class="form-control"id="paperss"name="paperss" required=" ">
    </div>
    <div class="form-group col-md-4">
      <label for="branch">Branch Name</label>
      <select class="form-control" id="branchss"name="branchss" required="">
      
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
      <select name="semss" class="form-control" id="semss" required="">
     
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
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
    <select name="subss" class="form-control" id="subss" required="">
    
      <option>cloud computing</option>
      <option>Machine learning</option>
      <option>Software development</option>
      <option>Analog electronics</option>
      <option>Digital Electronics</option>
      <option>Data Structure</option>
      <option>Algorithm</option>
      </select>
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-4">
    <label for="qno">Total no of question</label>
    <input type="number"required=" " name="qno" id="qno"class="form-control"min="5">
  </div>
  <div class="form-group col-md-4">
    <label for="marks">Total marks</label>
    <input type="number"required=" " name="marks" id="marks"class="form-control" min="5" max="100">
  </div>
  <div class="form-group col-md-4">
    <label for="time">Time allowed</label>
    <input type="time"required=" " name="time" id="time"class="form-control">
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12 ">
      <label for="qp">Question Paper description</label>
      <textarea class="form-control"rows="10" name="qp"></textarea>
    </div>
    </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="questa">Section A Questions</label>
    <textarea class="form-control"rows="10"  name="questa"></textarea>
     </div>
    <div class="form-group col-md-6">
      <label for="questb">Section B Question</label>
      <textarea class="form-control" rows="10" name="questb"></textarea>
    </div>
    </div>
    
    <div style="display:flex">
  <button class="btn btn-primary" type="submit" name="done" onclick="this.form.target='_blank';return true;"style="padding:10px 100px;margin:auto;">Generate paper</button>
  <button class="btn btn-danger" type="submit" name="doness"  onclick="f1.action='papers.php';  return true;" style="padding:10px 100px;margin:auto;">Save paper</button>
  </div>
  
    
</form>
   



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
 
 $(document).ready( function () {
  $('.deltbtn').on('click',function()
  {

 $("#deletesmodal").modal('show');
    $tr=$(this).closest('tr');
    var data=$tr.children("td").map(function()
    {
        return $(this).text();
    }).get();
    console.log(data);
    $("#delt_id").val(data[0]);
});
 });

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
