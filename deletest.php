<?php
include 'connect.php';
$id=$_GET['id'];
$sql="DELETE FROM students where id='$id'";
$query=mysqli_query($con,$sql);
if(isset($query)){
    header("location:studentul.php");
}
?>