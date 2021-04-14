
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
if(isset($_POST['doness']))
{
   
    $branch = $_POST['branchss'];
    $sem  =  $_POST['semss'];
    $paper =  $_POST['paperss'];
    $sub  =  $_POST['subss'];
   
    $sql="INSERT INTO generatepaper (branch,semester,subject,papers) VALUE ('$branch','$sem','$sub','$paper')";
    $result= mysqli_query($conn,$sql);
    if(!$result)
    {
     echo'<script>alert("data not inserted");</script>';
    }
    else{
        echo'<script>alert("data inserted");</script>';
        header('location: mergetable.php');
    }




}

?>