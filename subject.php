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
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  
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
   i{



       border:2px;
      
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
th
{
  color:white;
}
td
{
  font-style:italic;
}
span
{
  margin:23px;
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
i
{
  color:white;

  margin:8px;
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

<body>
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
<!--del model-->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="deletemodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title deletemodallLabel">Delete Subject Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="delete.php">
      <div class="modal-body">
     <input type="hidden" name="del_id" id="del_id">
      <h4> Do you want to delete this data?</h4>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="done">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!----Edit modal-->

<div class="modal fade" id="subjectmodal" tabindex="-1" role="dialog" aria-labelledby="subjectmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title subjectmodalLabel">Edit Subject Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="editsub.php">
      <div class="modal-body">
     
      <input type="hidden" name="sno" id="sno" class="form-control"> <br>
 <label> Subject name </label>
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
 <label> Branch name </label>
 <select name="branch" class="form-control" id="branch" required>
      <option selected disabled value="">Select Any One</option>
      <option>Electronics and Communication Engineering</option>
      <option>Computer Science</option>
      <option>Information Technology</option>
      <option>Bio technology</option>
      <option>Civil Engineering</option>
      <option>Mechanical Engineering</option>
     
      
      </select>
 <label> Semester </label>
 <select name="sem" class="form-control" id="sem">
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

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="done">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<hr style="margin-top:90px;"></hr>
<div class="container my-5">
<div class="table-responsive "style="margin-left:150px;background:#f0efef;padding:20px;">
<table class="table table-hover  my-3" id="myTable"style="background:white;border:0;padding:10px;">
  <thead class="table-light">
  <tr>
  <th colspan="7" class="text-center "> <h2 style="color:black;">SUBJECTS LIST<a class="btn btn-dark" href="add.php" role="button" id="btn">Add Subjects</a></h2></th>
  </tr>
    <tr class="bg-danger">
      <th scope="col" class="text-center " >S.no</th>
      <th scope="col" class="text-center ">Subject Name</th>
      <th scope="col" class="text-center ">Branch Name</th>
      <th scope="col" class="text-center ">Semester</th>
      <th scope ="col" class="text-center ">Action</th>
      
    </tr>
  </thead>
  <tbody>
<?php
$sql="SELECT * FROM subjectsdetails";
$result= mysqli_query($conn,$sql);
if($result)
{
foreach($result as $row) {
      ?>
       
       <tr> 
       <td class="text-center "> <?php echo $row['sno'];?></td>
       <td class="text-center "><?php echo $row['Subjects'];?></td>
       <td class="text-center "><?php echo $row['Branch'];?></td>
       <td class="text-center "><?php echo $row['Semester'];?></td>
       <td class="text-center "> <button type="button" class="btn btn-info editbtn"data-toggle="modal" data-target="#subjectmodal" ><i class="fa fa-pencil" aria-hidden="true" id="edit" ></i></button>
       <button type="button" class="btn btn-success delbtn" ><i class="fa fa-trash" aria-hidden="true" ></i> </button></td>
       </tr>
      <?php    
      }
      
    }
    ?>
  </tbody>   
</table>
</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
           

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


<script>
 
 $(document).ready( function () {
  $('.editbtn').on('click',function()
  {

 $("#studentmodal").modal('show');
    $tr=$(this).closest('tr');
    var data=$tr.children("td").map(function()
    {
        return $(this).text();
    }).get();
    console.log(data);
    $("#sno").val(data[0]);
    $("#sub").val(data[1]);
    $("#branch").val(data[2]);
    $("#sem").val(data[3]);
});
 });

</script>
<script>
 
 $(document).ready( function () {
  $('.delbtn').on('click',function()
  {

 $("#deletemodal").modal('show');
    $tr=$(this).closest('tr');
    var data=$tr.children("td").map(function()
    {
        return $(this).text();
    }).get();
    console.log(data);
    $("#del_id").val(data[0]);
});
 });

</script>

<script>
$(document).ready( function () {
   
    $('#myTable').dataTable( {
  "lengthMenu": [ 10,20,35,50, 75, 100 ],
        
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
