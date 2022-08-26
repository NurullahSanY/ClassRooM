<?php 
require('database_connection.php');

if(isset($_POST['plog'])){
session_destroy();
header("location:signin.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perform</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <script >
$(document).ready(function () {
    $("#exampleModal").modal('show');
});
    </script>
 
</head>
<body >

<nav class="navbar" style="background-color: #0873CC">
  <div class="container-fluid">

  <h1 class="navbar-brand text-white fs-3  fw-bold">
  <img src="photos/menu.png" class="navbar-brand" alt="">  
  CSE-326(Section-A)</h1>
    
   <ul class=" nav">
   <li class="nav-item">

    <form action="" method="POST">
     <a class="" id="dropdownMenuButton1" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="photos/people.png"  class="logo" alt=""></a> 
    <a href="index.php"><img src="photos/home.png"  class="logo" alt=""></a>
    <a href="teacher.php"><img src="photos/arrow (2).png"  class="logo" alt=""></a>
   <button class="btn " type="submit" name="plog"><img src="photos/check-out.png" alt=""></button>
    </form>
   
   </li>

   <li class="nav-item mt-2"> <p class="text-light">
   <img src="photos/user (5).png" alt="">
   <?php
   session_start(); 
        echo $_SESSION['name']  ;
       ?> 
   </p></li>
</ul>
  </div>
</nav>

<div class=" d-flex justify-content-center align-items-center " style="height: 75vh; margin-bottom: -20px;">

<form action="index1.php" method="POST">
<div class="card rounded shadow-lg m-3 hoverstyle" style="width: 18rem;">
  <img src="photos/announcement.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h4 class="card-title text-center">ANNOUNCEMENT</h4>
    <a href="index1.php" name="btnvalue" class=" stretched-link" ></a>
  </div>
</div>

</form>


<div class="card rounded shadow-lg m-3 hoverstyle" style="width: 18rem;">
  <img src="photos/discuss3.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h4 class="card-title text-center">DISCUSSION</h4>
    <a href="index2.php" class="stretched-link"></a>
  </div>
</div>

<div class="card rounded shadow-lg m-3 hoverstyle" style="width: 18rem;">
  <img src="photos/file share.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h4 class="card-title text-center">MATERIALS</h4>
    <a href="upload.php" class="stretched-link"></a>
  </div>
</div>

</div>

<div class=" d-flex justify-content-center">
<a class="btn btn-outline-success m-auto col-6 fs-3 fw-bolder" href="addmember.php" >Enrollment</a>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header d-flex justify-content-center ">
        <h2 class="modal-title  text-success" id="">Class Room Member </h2>

      </div>

      <div class="modal-body">

      <div class="table-responsive">

<table class="table table-bordered table-striped table-responsive">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>

  <?php

  $con = new mysqli("localhost","root","","virtual classroom");
  if($con->connect_error){
    die("Connection failed: " . $con->connect_error);
  }
  $sq = "SELECT * FROM cs326e";
  $result = $con->query($sq);

  if(!$result){
    die("Invalid Query: " . $con->connect_error);
  }

  while($r = $result->fetch_assoc())
  {
    echo" 
    <tr>
  <td>" . $r['cname'] . "</td>
  <td>" . $r['cemail'] . "</td>
   </tr>";

  }

  ?>

   
  </tbody>
</table>
</div>
      

      </div>
    
    </div>
  </div>
</div>


</div>
</div>

        
    <script src="js/bootstrap.bundle.min.js"></script>



</body>
</html>