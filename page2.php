<?php
require 'connect.php';
if (isset($_GET['id'])) {
    $nom=$_POST['nom'];
    $time=$_POST['time'];
    $signedb=$_POST['signedb'];
    $signeda=$_POST['signeda'];
    $id=$_POST['id'];
    $sql="UPDATE courses set name='$nom', time='$time', signed_by='$signedb', signed_at='$signeda' where id='$id'";
    $q=mysqli_query($con,$sql);
    if(isset($q)){
        header("location:courses.php");
    }
    
}else {
    $nom=$_POST['nom'];
    $time=$_POST['time'];
    $signedb=$_POST['signedb'];
    $signeda=$_POST['signeda'];
    $requette="INSERT INTO courses(name , time , signed_by , signed_at ) VALUES('$nom','$time','$signedb','$signeda')";
    $query=mysqli_query($con,$requette);
    if(isset($query)){
        header("location:courses.php");
    }
}   
?>