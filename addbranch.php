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
if(isset($_POST['add']))
{
   
    $branch = $_POST['branchi'];
    $class = $_POST['classs'];
    $sem  =  $_POST['semi'];
    $sql="INSERT INTO branchdetails (Branch_Name,Class,Semester) VALUE ('$branch','$class','$sem')";
    $result= mysqli_query($conn,$sql);
    if(!$result)
    {
     echo'<script>alert("data not inserted");</script>';
    }
    else{
        header('location: branch.php');
    }




}

?>