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
                header("location:index.php?success=1");
                exit();
            } else {
                $foo = 1;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <?php include 'toast.php' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</head>
<body>
<body style="background: linear-gradient(69.66deg, #00C1FE 19.39%, #FAFFC1 96.69%); display: flex; justify-content: center; align-items:center; height: 100vh; min-width: 150px;">
    <div class="p-3 shadow-sm bg-white container-fluid w-25 mx-auto" style="border-radius: 3%; min-width: 300px;">
        <main>
            <style>
                label.error {
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
                padding:1px 20px 1px 20px;
                border-radius: 3px;
                margin : 5px;
                }
            </style>
            <div class="pt-3 ps-3 text1">
                <h1 class="fw-bold"><span class="border-start pe-2 border-4 border-info"></span>E-classe</h1>
            </div>
            <div class="pt-3 text-center">
                <h3 >REGISTER</h3>
                <p class="text-muted" style="font-size: 70%;">Enter your credentials for a new account</p>
            </div>    
            <div id="error"></div>    
            <form id="form" method="POST">
                <div class="mb-3">
                  <label for="exampleInputname" class="form-label">Username</label>
                  <input type="text" name="uname" id="name" class="form-control" placeholder="Enter your name" aria-describedby="exampleInputname">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input type="email" name="email"  class="form-control" id="email" placeholder="Enter your email" aria-describedby="exampleInputEmail1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="psw" class="form-control" id="psw" placeholder="Enter your password">
                </div>
                <div class="d-grid gap-2">
                    <input class="btn btn-info text-capitalize text-white"  type="submit" id="log" name="log" value="LOG IN">
                </div>                
            </form>
        </main>
    </div>
    <script src="script.js"></script>
    <script>
        $(document).ready(function() {
        $("#form").validate({
            rules: {
                email : {
                    required: true,
                    email: true
                },
                psw: {
                    required: true,
                    minlength: 3
                }
            }
        });
    });
    </script>
    <?php
        if (isset($foo)) {
            echo "
                <script>
                    new Toast({message: 'User already exists',type: 'danger'});
                </script>
                ";
        }
    ?>
</body>
</html>

