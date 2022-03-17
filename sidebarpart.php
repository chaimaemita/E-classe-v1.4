<?php
  require 'login.php';
?>      
      <input type="checkbox" id="sbar">
      <div class="col-2" id="side" style="background-color:  #FAFFC1; height: 100vh; width: auto;">
        <div class=" text">
          <h1 class="fw-bold fs-5 p-3"><span class="border-start pe-2 border-4 border-info" id="logo">E-classe</span  ></h1>
        </div>
        <div class="img pt-3">
          <img src="téléchargement.jpg" class="rounded-circle mx-auto w-50 d-block" alt="...">
          <p class="text-center fw-bold"><?php echo $_SESSION["username"] ?></p>
          <p class="text-center text-info">ADMIN</p>
        </div>
      <div class="navbar">
        <div class="container-fluid-sm">
          <ul style="list-style: none; width: 100%;">
            <li><a class="nav-link text-dark" href="dashboard.php"><i class="bi bi-house-door "></i><span id="cont">Home</span>  </a></li>
            <li><a class="nav-link text-dark" href="courses.php"><i class="bi bi-bookmark "></i><span id="cont">courses</span></a></li>
            <li><a class="nav-link text-dark" href="studentul.php"><i class="bi bi-mortarboard"></i><span id="cont">students</span></a></li>
            <li><a class="nav-link text-dark" href="payement.php"><i class="bi bi-currency-dollar"></i><span id="cont">Payment</span></a></li>
            <li><a class="nav-link text-dark" href="#"><i class="bi bi-file-earmark-bar-graph"><span id="cont">Report</span></i></a></li>
            <li><a class="nav-link text-dark" href="#"><i class="bi bi-sliders"><span id="cont">Settings</span></i></a></li>
            <li><a class="nav-link text-dark" href="logout.php"><span id="cont">Logout</span><i class="bi bi-box-arrow-right"></i></a></li>
          </ul>
        </div>
      </div>
      </div>