<?php 
require('database_connection.php');
  if(isset($_POST['Logout'])){
    session_destroy();
    header("location: signin.php"); 
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
      .card{
        width: 20rem;
        height: 20rem;
      }

      .card-body img{
        height: 50px;
        width: 50px;
       margin-left: 32px;
      }
    </style>

</head>
<body>
<nav class="navbar navbar-light" style="background-color: #0C78CC;">
  <div class="container-fluid">
    <h2 class="navbar-brand fs-4 fw-bold text-light">
    <img src="photos/menu.png" alt="">  
    Student Panel</h2>
    <form class="d-flex" method="POST">
      <p class=" text-light mt-2" >
      <a href="index.php" class="btn"><img src="photos/home.png" alt=""></a>
      <button class="btn " type="submit" name="Logout"><img src="photos/check-out.png" alt=""></button>
      <img src="photos/user (5).png"   alt="">
      <?php 
      session_start();
         echo $_SESSION['name'];
       ?> 
       </p>
    </form>
  </div>
</nav>

<div class="card m-4 shadow">
  <div class="card-body ">
    <div class="card-header text-light rounded " style="background-color:#32AC71;">
    <h5 class="card-title fs-2 fw-bolder">CSE-326
    <img src="photos/user (4).png" class="card-img " alt="">  
    </h5>
    <h6 class="card-subtitile fs-5">Section A</h6>
    <p class="card-subtitle ">Internet Programming(Sessional)</p>
    </div>
    <a href="perform_s.php" class="stretched-link"></a>
  </div>
</div>
    
</body>
</html>