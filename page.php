<?php
    require 'connect.php';
    if (isset($_GET['id'])) {
        $nom=$_POST['nom'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $enumber=$_POST['enumber'];
        $date=$_POST['date'];
        $id=$_POST['id'];
        $sql="UPDATE students set name='$nom', email='$email', phone='$phone', enroll_number='$enumber', date_of_admission=' $date' where id='$id'";
        $q=mysqli_query($con,$sql);
        if (isset($q)) {
            header("location:studentul.php");
        }
    }else {
        $nom=$_POST['nom'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $enumber=$_POST['enumber'];
        $date=$_POST['date'];
        $requete="INSERT INTO students(name, email, phone, enroll_number, date_of_admission) VALUES('$nom','$email','$phone','$enumber','$date')";
        $query=mysqli_query($con,$requete);
        if(isset($query)){
            header("location:studentul.php");
        }  
    }
?>
