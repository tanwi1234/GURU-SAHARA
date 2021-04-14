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
   $branch=$_POST['branch'];
   $sub=$_POST['sub'];
   $sem=$_POST['sem'];

           
            $sql="UPDATE subjectsdetails SET Branch= '$branch',Semester = '$sem',Subjects='$sub' WHERE sno= '$id ' ";
            $result= mysqli_query($conn,$sql);
           
if(!$result)
{
    echo'<script>alert("Data not updated");</script>';
    header('Location:subject.php');
}
else{
  echo'<script>alert("Data updated successfully");</script>';
    header('Location:subject.php');
}


   
}
?>


