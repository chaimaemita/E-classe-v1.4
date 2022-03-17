<?php
    require 'connect.php';
    if (isset($_POST['log'])) {
        $uname=$_POST['uname'];
        $email=$_POST['email'];
        $psw=hash('sha256',$_POST['psw']);

        if (!empty($uname) && !empty($email) && !empty($psw)) {    
            $query="SELECT * FROM comptes WHERE email='$email'";
            $q=mysqli_query($con,$query);
            if(mysqli_num_rows($q) == 0) {
                $reqst="INSERT INTO comptes (username, email, mot_de_passe) VALUES ('$uname','$email','$psw')";
                $sql=mysqli_query($con,$reqst);
                header("location:dashboard.php");
                exit();
            }elseif (empty($uname) && empty($email) && empty($psw)) {
                echo "error";
                header("location:inscrip.php");
                exit();
            } else{
                    header("location:inscrip.php");
                    exit();
                }
            }
    }
?>