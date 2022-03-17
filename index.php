<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["email"]) && isset($_POST["psw"])) {
            require "connect.php";

            $email=$_POST["email"];
            $psw=hash('sha256', $_POST["psw"]);

            $query = "SELECT * FROM `comptes` WHERE email='$email' AND mot_de_passe='$psw'";
            $account = mysqli_query($con,$query);

            if (mysqli_num_rows($account) > 0) {
             if(isset($_POST['remb'])){
                setcookie('email',$email,time()+60);
                setcookie('psw',$_POST["psw"],time()+60);}

                session_start();
                $rslt=mysqli_fetch_assoc($account);
                $_SESSION["id"]=$rslt['id'];
                $_SESSION["username"]=$rslt['username'];
                $_SESSION["email"]=$rslt['email'];
                
                header("location: dashboard.php");
                exit();
            }else {
                   $error='<div class="alert alert-danger" role="alert">
                                    enter your information.
                                </div>';
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
    <?php include 'toast.php'; ?>
</head>
<body style="background: linear-gradient(69.66deg, #00C1FE 19.39%, #FAFFC1 96.69%); display: flex; justify-content: center; align-items:center; height: 100vh; min-width: 150px;">
    <div class="p-3 shadow-sm bg-white container-fluid w-25 mx-auto" style="border-radius: 3%; min-width: 300px;">
        <main>
            <div class="pt-3 ps-3 text1">
                <h1 class="fw-bold"><span class="border-start pe-2 border-4 border-info"></span>E-classe</h1>
            </div>
            <div class="pt-3 text-center">
                <h3 >SIGN IN</h3>
                <p class="text-muted" style="font-size: 70%;">Enter your credentials to access your account</p>
            </div> 
            <?php
                if (isset($error)) {
                    echo  $error ;              
                }
            ?>          
            <form method="POST">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your email" aria-describedby="exampleInputEmail1"
                  value="<?php if (isset($_COOKIE['email'])) {
                      echo $_COOKIE['email'];
                  } ?>"
                  >
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="psw" class="form-control" id="exampleInputPassword1" placeholder="Enter your password"
                  value="<?php if (isset($_COOKIE['psw'])) {
                      echo $_COOKIE['psw'];
                  } ?>">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remb" <?php if(isset($_COOKIE['email'])){?> checked <?php } ?> >
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <div class="d-grid gap-2">
                    <input class="btn btn-info text-capitalize text-white"  type="submit"  value="SIGN IN">
                </div>                
                <p class="mb-3 text-center pt-4 text-muted" style="font-size: 70%; ">Forgot your password? <a href="#" style="color: #00C1FE;"> Reset Password</a></p>
                <p class="text-center">you don't have an account: <a href="inscrip.php" class="btn btn-info text-capitalize text-white">SIGN UP</a> </p>
            </form>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php
    if (isset($_GET['success'])) {
        echo "
                <script>
                    new Toast({message: 'Your account is created now',type: 'success'});
                </script>
                ";
    }
?>
</body>

</html>