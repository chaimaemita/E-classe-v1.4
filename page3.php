<?php
$nom=$_POST['nom'];
$pschedule=$_POST['pschedule'];
$bnumber=$_POST['bnumber'];
$apaid=$_POST['apaid'];
$bamount=$_POST['bamount'];
$date=$_POST['date'];
require 'connect.php';
$requete="INSERT INTO payment(name , payment_schedule , bill_number , amount_paid , balance_amount , date ) VALUES('$nom','$pschedule','$bnumber','$apaid','$bamount','$date')";
$query=mysqli_query($con,$requete);
if (isset($query)) {
    header("location:payement.php");
}
?>