
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
  background-color: #3e4444;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 10px 10px;
  text-decoration: none;
  font-size: 17px;
  color: white;
  display: block;
  margin:20px;
  font-family: 'Courgette', cursive;
  text-transform:uppercase;s
}

.sidenav a:hover {
  color: #f1f1f1;
  text-decoration:underline;
}


@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
   
   
   
   

   </style>

<body style="background-color:#fefbd8" >
<div class="sidenav">
<a href="home.php"><i>Dashboard</i></a>
  <a href="branch.php"><i>Batches details</i></a>
  <a href="subject.php"><i>Subjects details</i></a>
  <a href="class.php"><i>Examination Schedule</i></a>
  
  <a href="setpapers.php"><i>Generate Question Paper</i></a>
  <a href="paper.php"><i>List of paper</i></a>
  
  
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
<div class="modal fade" id="branchmodal" tabindex="-1" role="dialog" aria-labelledby="branchmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title branchmodalLabel">Edit Paper Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="editpaper.php">
      <div class="modal-body">
     
      <input type="hidden" name="branchno" id="branchno" class="form-control"> <br>
      <lable> Paper Name</label>
     <input type="text" name="papers" id="papers" class="form-control"> <br>
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
      
      <label> Subject </label>
 <select name="subs" class="form-control" id="subs">
    <option>Select Any One</option>
      <option>cloud computing</option>
      <option>Machine learning</option>
      <option>Software development</option>
      <option>Analog electronics</option>
      <option>Digital Electronics</option>
      <option>Data Structure</option>
      <option>Algorithm</option>
      
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
<div class="container my-5" >
<div class="table-responsive"style="margin-left:150px;">
<table class="table table-bordered table-warning border-dark  table-hover table-striped my-3 " id="myTable">
  <thead class="table-light">
  <tr>
  <th colspan="7" class="text-center "> <h2><i style="color:black">LIST OF PAPER</i><a href="setpapers.php"role="button"style="float:right;"class="btn btn-info">set Papers</a></h2></th>
  </tr>
    <tr>
      <th scope="col" class="text-center " >S.no</th>
      <th scope="col" class="text-center ">Paper Name</th>
      <th scope="col" class="text-center ">Branch</th>
      <th scope="col" class="text-center ">Semester</th>
      <th scope="col" class="text-center ">Subjects</th>
      <th scope ="col" class="text-center ">Action</th>

      
    </tr>
  </thead>
  <tbody>
<?php
$sql="SELECT * FROM generatepaper";
$result= mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_array($result)) {
      ?>
       
       <tr id="boxes"> 
       <td class="text-center "> <?php echo $row[0];?></td>
       <td class="text-center "><?php echo $row[1];?></td>
       <td class="text-center "><?php echo $row[2];?></td>
       <td class="text-center "><?php echo $row[3];?></td>
       <td class="text-center "><?php echo $row[4];?></td>
       <td class="text-center ">
       <button type="button" class="btn btn-danger editbtn"data-toggle="modal" data-target="#branchmodal" ><i class="fa fa-pencil" aria-hidden="true"></i></button>
       <a class="btn btn-success deltbtn" role="button"  style="color:white;"><i class="fa fa-trash" aria-hidden="true" ></i> </a>
       
       </td>
   
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
    $("#branchs").val(data[2]);
    $("#subs").val(data[4]);
    $("#sems").val(data[3]);
    $("#papers").val(data[1]);
});
 });
 </script>
 
 <script>
$(document).ready( function () {
   
    $('#myTable').dataTable( {
  "lengthMenu": [ 7, 10, 25,35,50, 75, 100 ],
        
        "ordering": false,
        "info":     false
       
} );
} );
</script>


</body>
</html>