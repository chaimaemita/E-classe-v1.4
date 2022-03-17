<?php
    require 'connect.php';
    $id=$_GET['id'];
    $sql="DELETE FROM courses where id='$id'";
    $query=mysqli_query($con,$sql);
    if (isset($query)) {
        header("location:courses.php");
    }
?>