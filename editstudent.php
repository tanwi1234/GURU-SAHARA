
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
 if(isset($_POST['done']))
{
    $id=$_POST['sno'];
    $name=$_POST['name'];
    $no=$_POST['enroll'];
   $branch=$_POST['branchs'];
   $class= $_POST['class'];
   $sem=$_POST['sems'];
  
           
           $sql="UPDATE student SET Branch= '$branch',batch='$class',Semester = '$sem',Name='$name',Enrolno='$no' WHERE sno= '$id'";
           $result= mysqli_query($conn,$sql);          
if(!$result)
{
    echo'<script>alert("Data not updated");</script>';
   
}
else{
  echo'<script>alert("Data updated successfully");</script>';
  header('Location:student.php');
}


   
}
?>




