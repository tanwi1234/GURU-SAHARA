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
 if(isset($_POST['update']))
{
   $branch=$_POST['password'];

           
            $sql="UPDATE teacher SET password='$branch'";
            $result= mysqli_query($conn,$sql);
           
if(!$result)
{
    echo'<script>alert("Data not updated");</script>';
   
}
else{
  echo'<script>alert("Data updated successfully");</script>';
    header('Location:changepass.php');
}


   
}
?>


