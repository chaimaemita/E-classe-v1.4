<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body style="background-color:  #FAFFC1;">
<div class=" p-3 style shadow-sm bg-white  container-fluid w-25 mx-auto" style="border-radius: 3%; min-width: 300px; dispaly: flex; align-items:center; justify-content:center;">
    <div class="pt-3 ps-3 text1">
        <h1 class="fw-bold"><span class="border-start pe-2 border-4 border-info"></span>E-classe</h1>
    </div>
    <div class="pt-3 text-center">
        <h3 >COURSES</h3>
        <p class="text-muted" style="font-size: 70%;">Enter the informations.</p>
    </div>        
    <?php
        require 'connect.php';
        if (isset($_GET['id'])) {
            $id=$_GET['id'];
            $sql="SELECT * from courses where id='$id'";
            $q=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($q);
            $nom=$row['name'];
            $time=$row['time'];
            $signedb=$row['signed_by'];
            $signeda=$row['signed_at'];
        }
    ?>   
        <form method="POST" action="page2.php?<?php if (isset($_GET['id'])){echo "id=update";} ?>">
            <input type="hidden" value=" <?php if (isset($_GET['id'])) echo $_GET['id']; else echo ''; ?> ">
            <div class="mb-3">
            <label class="form-label">NAME</label>
            <input type="text" name="nom" class="form-control" id="exampleInputname1" placeholder="Enter name" value="<?php if (isset($_GET['id'])) {
                echo $nom;
            } ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">time</label>
                <input type="text" name="time" class="form-control" id="exampleInputps1" placeholder="time" value="<?php if (isset($_GET['id'])) {
                    echo $time;
                } ?>">
            </div>
            <div class="mb-3">
                <label  class="form-label">signed by</label>
                <input type="text" name="signedb" class="form-control" id="exampleInputbn1" placeholder="Enter phone namber" value="<?php if (isset($_GET['id'])) {
                    echo $signedb;
                } ?>">
            </div>
            <div class="mb-3">
                <label  class="form-label">signed at</label>
                <input type="date" name="signeda" class="form-control" id="exampleInputap1" placeholder="Enter enroll number" value="<?php if (isset($_GET['id'])) {
                    echo $signeda;
                } ?>">
            </div>
            <button type="submit" style="background: linear-gradient(69.66deg, #00C1FE 19.39%, #FAFFC1 96.69%); width:100%">
                <?php
                    if (isset($_GET['id'])) {
                        echo "MODIFIER";
                    }
                    else {
                        echo "ENVOYER";
                    }
                ?>
            </button>
        </form>
</div>
    
</body>
</html>