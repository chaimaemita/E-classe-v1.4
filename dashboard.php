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
        background-color:  #00C1FE
       }
      
    </style>
</head>
<body style="overflow-x: hidden; width: 100%;">

    <div class="row align-items-start" >
      <?php
      include 'sidebarpart.php';
      ?>

      <div class="col" style="padding: 0;">
      <?php
      include 'navebar.php';
      ?>
        <div class="container">
          <div class="row pt-3">
            <div class="col my-2" >
                  <?php
                    require 'connect.php';
                    $query="SELECT * from students";
                    $count=mysqli_query($con,$query) ;
                    $row = mysqli_num_rows($count); 
                  ?>
              <div class="p-1 px-3 rounded" style="background: #F0F9FF;" >
              <i class="bi bi-mortarboard fs-3" style="color: #74C1ED;"></i>
              <p>Student</p>
              <p class="text-end fw-bold fs-4"><?php echo $row; ?></p>
            </div>
            </div>  
            <div class="col my-2" >
                  <?php
                    require 'connect.php';
                    $query="SELECT * from courses";
                    $count=mysqli_query($con,$query) ;
                    $row = mysqli_num_rows($count); 
                  ?>
              <div class="p-1 px-3 rounded" style="background: #FEF6FB;">
                <i class="bi bi-bookmark fs-3" style="color: #EE95C5;"></i>
                <p>Course</p>
                <p class="text-end fw-bold fs-4"><?php echo $row; ?></p>
              </div>
            </div>       
            <div class="col my-2">
                <?php
                  require 'connect.php';
                  $query="SELECT SUM(amount_paid) AS total FROM payment";
                  $count=mysqli_query($con,$query) ;
                  $row = mysqli_fetch_assoc($count); 
                  $som = $row['total'];
                ?>
              <div class="p-1 px-3 rounded" style="background: #FEFBEC;">
                <i class="bi bi-currency-dollar fs-3" style="color: #74C1ED;"></i> 
                <p>Payments</p>
                <p class="text-end fw-bold fs-4"><span class="fs-6">DHS</span><?php echo $som; ?> </p>
              </div>
            </div>
            <div class="col my-2">
              <div class="p-1 px-3 rounded " style="background: linear-gradient(110.42deg, #00C1FE 18.27%, #FAFFC1 91.84%);">
                <i class="bi bi-person text-white fs-3" ></i>
                <p class="text-white">Users</p>
                <p class="text-end fw-bold fs-4">3</p>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>