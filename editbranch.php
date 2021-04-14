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
<?php
 if(isset($_POST['dones']))
{
    $id=$_POST['branchno'];
   $branch=$_POST['branchs'];
   $class=$_POST['class'];
   $sem=$_POST['sems'];

           
            $sql="UPDATE branchdetails SET Branch_Name= '$branch',Class='$class',Semester = '$sem'WHERE sno= '$id ' ";
            $result= mysqli_query($conn,$sql);
           
if(!$result)
{
    echo'<script>alert("Data not updated");</script>';
   
}
else{
  echo'<script>alert("Data updated successfully");</script>';
    header('Location:branch.php');
}


   
}
?>


