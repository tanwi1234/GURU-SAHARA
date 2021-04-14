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
    $sem  =  $_POST['semi'];
    $names  =  $_POST['names'];
    $nos  =  $_POST['nos'];
    $sql="INSERT INTO datesheet (branch,sem,date,time) VALUE ('$branch','$sem','$names','$nos')";
    $result= mysqli_query($conn,$sql);
    if(!$result)
    {
     echo'<script>alert("data not inserted");</script>';
    }
    else{
        header('location: class.php');
    }




}

?>

