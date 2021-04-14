
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
    $time=$_POST['no'];
    $date=$_POST['name'];
   $branch=$_POST['branchs'];
   $sem=$_POST['sems'];
   $sql="UPDATE datesheet SET date= '$date',branch='$branch',sem= '$sem',time='$time'WHERE sno= '$id'";
   $result= mysqli_query($conn,$sql);          
if(!$result)
{
    echo'<script>alert("Data not updated");</script>';
   
}
else{
  echo'<script>alert("Data updated successfully");</script>';
  header('Location:class.php');
}


   
}
?>




