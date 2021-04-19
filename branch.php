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
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
 
</head>
   <style>
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

    
border-radius:8px;
      
       
       color:white;

   }
   td
   {
     font-style:italic;
   }
   body
{
  background:url('book.jpg');
  background-size:cover;
  background-repeat:no-repeat;
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
.datTable{
  color:white;
}

   </style>

<body >
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
<!--del modal-->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="deletemodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title deletemodallLabel">Delete Subject Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="deletebranch.php">
      <div class="modal-body">
     <input type="hidden" name="del_id" id="del_id">
      <h4> Do you want to delete this data?</h4>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="del">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--insert modal-->
<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title addmodalLabel">Add Branch Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="addbranch.php">
      <div class="modal-body">
      <input type="hidden" name="addhno" id="addno" class="form-control"> <br>
 
     
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
      <label> Class  </label>
 <select name="classs" class="form-control" id="classs">
 <option>Select Any One</option>
      <option>A1</option>
      <option>A2</option>
      <option>A3</option>
      <option>A4</option>
      <option>A5</option>
      <option>B1</option>
      <option>B2</option>
      <option>C</option>
     
      
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

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="add">Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--edit modal-->
<div class="modal fade" id="branchmodal" tabindex="-1" role="dialog" aria-labelledby="branchmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title branchmodalLabel">Edit Branch Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="editbranch.php">
      <div class="modal-body">
     
      <input type="hidden" name="branchno" id="branchno" class="form-control"> <br>
 <label> Branch  </label>
 <select name="branchs" class="form-control" id="branchs" required>
      <option>Select Any One</option>
      <option>Electronics and Communication Engineering</option>
      <option>Computer Science</option>
      <option>Information Technology</option>
      <option>Bio technology</option>
      <option>Civil Engineering</option>
      <option>Mechanical Engineering</option>
     
      
      </select>
      <label> Class  </label>
 <select name="class" class="form-control" id="class">
      <option>A1</option>
      <option>A2</option>
      <option>A3</option>
      <option>A4</option>
      <option>A5</option>
      <option>B1</option>
      <option>B2</option>
      <option>C</option>
     
      
      </select>
     
 <label> Semester </label>
 <select name="sems" class="form-control" id="sems" required>
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
        <button type="submit" class="btn btn-primary" name="dones">Save changes</button>
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
  <thead>
  <tr>
  <th colspan="7" class="text-center "> <h2 style="color:black;">BATCH LIST<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#addmodal" id="btn">Add Branch</button></h2></th>
  </tr>
    <tr class="bg-danger">
      <th scope="col" class="text-center " style="color:white;" >S.no</th>
      <th scope="col" class="text-center "style="color:white;" >BRANCH</th>
      <th scope="col" class="text-center "style="color:white;" >BATCH</th>
      <th scope="col" class="text-center "style="color:white;" >SEMESTER</th>
      <th scope ="col" class="text-center "style="color:white;">ACTION</th>
      
    </tr>
  </thead>
  <tbody >
<?php
$sql="SELECT * FROM branchdetails";
$result= mysqli_query($conn,$sql);
if($result)
{
foreach($result as $row) { 
      ?>
       
       <tr> 
       <td class="text-center "> <?php echo $row['sno'];?></td>
       <td class="text-center "><?php echo $row['Branch_Name'];?></td>
       <td class="text-center "><?php echo $row['Class'];?></td>
       <td class="text-center "><?php echo $row['Semester'];?></td>
       <td class="text-center "> <button type="button" class="btn btn-info editbtn"data-toggle="modal" data-target="#branchmodal" ><i class="fa fa-pencil" aria-hidden="true" id="edit" ></i></button>
       <button type="button" class="btn btn-success delbtn" ><i class="fa fa-trash" aria-hidden="true" id="edit" ></i> </button></td>
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

 $("#branchmodal").modal('show');
    $tr=$(this).closest('tr');
    var data=$tr.children("td").map(function()
    {
        return $(this).text();
    }).get();
    console.log(data);
    $("#branchno").val(data[0]);
    $("#branchs").val(data[1]);
    $("#class").val(data[2]);
    $("#sems").val(data[3]);
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
  "lengthMenu": [7,10, 20,35,50, 75, 100 ],
        
        "ordering": false,
        "info":     false
       
} );
} );
</script>

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
