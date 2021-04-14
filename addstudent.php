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
if(isset($_POST['adds']))
{
   
    $branch = $_POST['branchi'];
    $class = $_POST['classs'];
    $sem  =  $_POST['semi'];
    $names  =  $_POST['names'];
    $nos  =  $_POST['nos'];
    $sql="INSERT INTO student (Branch,Name,Semester,Enrolno,Batch) VALUE ('$branch','$names','$sem','$nos','$class')";
    $result= mysqli_query($conn,$sql);
    if(!$result)
    {
     echo'<script>alert("data not inserted");</script>';
    }
    else{
        header('location: student.php');
    }




}

?>

