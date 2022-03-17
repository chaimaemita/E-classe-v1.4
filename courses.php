<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <style>
      .container-fluid-sm ul li:hover{
        background-color:  #00C1FE;
       }
      
    </style>
</head>
<body style="overflow-x:hidden; width: 100%; height: fit-content;">
    <div class="row align-items-start">

      <?php
        include 'sidebarpart.php';
      ?>

      <div class="col" style="padding: 0;width: 100%; background-color: #E5E5E5; height: 100vh;">

        <?php
          include 'navebar.php';
        ?>
        <div class="col px-5" id="row" style="background-color: #E5E5E5; ">
            <nav class="navbar navbar-light px-3" style="width: 100%;">
                <div class="container-fluid">
                  <a class="navbar-brand fw-bold">Courses program</a>
                  <form class="d-flex">
                    <a class="me-5 mt-1" href="#"><img src="Vector.png" alt=""></a>
                    <div class="">
                    <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD NEW COURSES</button>
                    </div>
                  </form>
                </div>
            </nav>
            <div class="container border-top border-2 ps-5" id="row">
            <table class="container text-center">
              <tr>
                <th class="py-3">Name</th>
                <th>Time</th>
                <th>Signed by</th>
                <th>Signed at</th>
              </tr>
            <?php
            require 'connect.php';
            $requete="SELECT * from courses";
            $query=mysqli_query($con,$requete);
            while($row=mysqli_fetch_assoc($query)){
                $id=$row['id'];
                echo ' <tr class="py-3 bg-white">
                            <td class="py-3">'.$row['name'].'</td>
                            <td >'.$row['time'].'</td>
                            <td>'.$row['signed_by'].'</td>
                            <td>'.$row['signed_at'].'</td>
                            <td>
                                <a href="addcourses.php?id='.$id.'"><img class="pe-2"  src="modif.png" alt="icon"></a>
                                <a href="deletcs.php?id='.$id.'"><img src="poub.png" alt="icon"></a>
                            </td>
                        </tr>'; 
            }
            ?>
            </table>
    </div>
    </div>
      <div id="cartes" class="container mt-3" style=" background-color: #E5E5E5;">
      <?php
        require 'connect.php';
        $requete="SELECT * from courses";
        $query=mysqli_query($con,$requete);
        while($row=mysqli_fetch_assoc($query)){
            $id=$row['id'];
            echo ' 
            <div class="card text-center my-2" style="width: 18rem; width: 50%; margin: 25%;">
              <div class="card-body">
              <h5 class="card-title">'.$row['name'].'</h5>
                <p class="card-text">'.$row['time'].'</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">'.$row['signed_by'].'</li>
                <li class="list-group-item">'.$row['signed_at'].'</li>
              </ul>
              <div class="card-body" style="background-color:#FAFFC1">
                <a href="addcourses.php?id='.$id.'"><img class="pe-2" src="modif.png" alt="icon"></a>
                <a href="deletcs.php?id='.$id.'"><img src="poub.png" alt="icon"></a>
              </div>
            </div>';  
           }
      ?>
      </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD COURSES</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
            <div class="modal-footer">
                <button  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>