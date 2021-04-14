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
$id = $_POST['del_id'];
$sql="DELETE FROM subjectsdetails WHERE sno='$id'";
$result= mysqli_query($conn,$sql);
if($result)
{
   
    header('location:subject.php');
    echo'<script> alert("data deleted");</script>';
}
else{
    echo'<script> alert("Not deleted");</script>';

}

}


?>