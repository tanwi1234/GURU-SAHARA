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
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  
 
 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script type='text/javascript' src='tableExport.js'></script>
     <script type='text/javascript' src='jspdf.min.js'></script>
     <script type='text/javascript' src='html2canvas.js'></script>
     
 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    

<script type='text/javascript' src='base64.js'></script>
<script type='text/javascript' src='sprintf.js'></script>
<script type='text/javascript' src='jspdf.js'></script>



    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

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

    
border-radius:8px;
      
       
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
td
{
  font-style:italic;
}
th
{
  color:white;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
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
      <form method="POST" action="deleteclass.php">
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
        <h5 class="modal-title addmodalLabel">Add student Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="addclass.php">
      <div class="modal-body">
      <input type="hidden" name="addno" id="addno" class="form-control"> <br>
      <label> Time </label>
      <input type="time" name="nos" id="nos" class="form-control"> <br>
      <label> Date </label>
      <input type="Date" name="names" id="names" class="form-control"> <br>
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

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="add">Add Student</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--edit modal-->
<div class="modal fade" id="studentmodal" tabindex="-1" role="dialog" aria-labelledby="studentmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title studentmodalLabel">Edit Student Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="editclass.php">
      <div class="modal-body">
     
      <input type="hidden" name="sno" id="sno" class="form-control"> <br>
      <label> Time </label>
      <input type="time" name="no" id="no" class="form-control" required=""> <br>
      <label> Date </label>
      <input type="date" name="name" id="name" class="form-control" required=" "> <br>
 <label> Branch  </label>
 <select name="branchs" class="form-control" id="branchs" required="">
      <option>Select Any One</option>
      <option>Electronics and Communication Engineering</option>
      <option>Computer Science</option>
      <option>Information Technology</option>
      <option>Bio technology</option>
      <option>Civil Engineering</option>
      <option>Mechanical Engineering</option>
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
        <button type="submit" class="btn btn-primary" name="done">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<hr style="margin-top:90px;"></hr>
<div class="container my-5">
<div class="dropdown">
  <a class="btn btn-success dropdown-toggle" style="margin-left:140px;margin-bottom:10px;" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="true" aria-haspopup="true" >
    Download
  </a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    
   
    <li class="text-center"><a onclick="$('#myTable').tableExport({type:'excel' ,escape:'false'});"href="#"style="text-decoration:none;color:black;"  >EXCEL</a></li>
    <li class="text-center"><a onclick="$('#myTable').tableExport({type:'png' ,escape:'false'});"href="#"style="text-decoration:none;color:black;" >PNG</a></li>
    <li class="text-center"><a onclick="$('#myTable').tableExport({type:'pdf' ,escape:'false'});"href="#"style="text-decoration:none;color:black;" >PDF</a></li>
    




    
    
  </ul>
</div>
<div class="table-responsive"style="margin-left:150px;padding:20px;background:#f0efef;">
<table class="table table-bordered border-light table-hover  my-5" id="myTable"style="background:white;border:0;padding:10px;">
  <thead>
  <tr>
  <th colspan="7" class="text-center "> <h2 style="color:black;">DATESHEET<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#addmodal" id="btn">Add details</button></h2></th>
  </tr>
    <tr class="bg-danger">
      <th scope="col" class="text-center " >S.no</th>
      <th scope="col" class="text-center ">DATE</h>
      <th scope="col" class="text-center ">BRANCH</th>
     
      <th scope="col" class="text-center ">SEMESTER</th>
      <th scope="col" class="text-center " >TIME</th>
      <th scope ="col" class="text-center ">ACTION</th>
      
    </tr>
  </thead>
  <tbody>
<?php
$sql="SELECT * FROM datesheet";
$result= mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_array($result)) {
      ?>
       
       <tr> 
       <td class="text-center "> <?php echo $row[0];?></td>
       <td class="text-center "><?php echo $row[1];?></td>
       <td class="text-center "><?php echo $row[2];?></td>
       <td class="text-center "><?php echo $row[3];?></td>
       <td class="text-center "><?php echo $row[4];?></td>
       <td class="text-center "> <button type="button" class="btn btn-primary editbtn"data-toggle="modal" data-target="#studentmodal">Edit</button>
       <button type="button" class="btn btn-success delbtn" style="color:white;">Delete</button></td>
       </tr>
      <?php    
      }
      
    }
    ?>
  </tbody>   
</table>
</div>

</div>

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
    $("#name").val(data[1]);
    $("#branchs").val(data[2]);
    $("#sems").val(data[3]);
    $("#no").val(data[4]);
   
  
    
  
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
  "lengthMenu": [ 20,35,50, 75, 100 ],
        
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
