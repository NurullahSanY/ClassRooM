<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

   <style>
    .nav-item{
      margin: -10px;
    }

    .logo{
      margin-right: 10px;
      margin-left: 20px;
      margin-bottom: 10px;
    }

    .carousel-item img{
      height: 584px;
    }

   </style>
</head>
<body>

<nav class="navbar" style="background-color: #0873CC">
  <div class="container-fluid">
    <a href="index.php" class="navbar-brand text-white fs-3 fw-bold">
    <img src="photos/online-course.png" class="logo" alt="">
      VIRTUAL CLASSROOM
    </a>
    
   <ul class="nav justify-content-end">
   <li class="nav-item">
    <a class="nav-link text-white fw-bolder" href="signup.php">SIGNUP</a>
   </li>

   <li class="nav-item">
    <a class="nav-link text-white fw-bolder" href="signin.php">SIGNIN</a>
   </li>
</ul>

  </div>
</nav>


<div id="slider" class="carousel slide carousel-fade" >
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="800">
        <img src="photos/slider1.jpg" class="d-block w-100 img-fluid" alt="...">
      </div>
      <div class="carousel-item " data-bs-interval="800">
        <img src="photos/nav1.jpg" class="d-block w-100 img-fluid" alt="...">
      </div>
      <div class="carousel-item " data-bs-interval="800">
        <img src="photos/two.jpg" class="d-block w-100 img-fluid" alt="...">
      </div>
      <div class="carousel-item " data-bs-interval="800">
        <img src="photos/nav2.jpg" class="d-block w-100 img-fluid" alt="...">
      </div>
    
     
    </div>

    <button class="carousel-control-prev" type="button" 
    data-bs-target="#slider" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
   </button>

    <button class="carousel-control-next" type="button" 
    data-bs-target="#slider" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
   </button>
   </div>

<footer class="bg-dark text-center text-white ">
<p class="py-3 fs-5">Copyright &copy; 2022. All right reserved by &nbsp; <a href="index.php" class="text-decoration-none">VIRTUAL CLASSROOM</a></p>
</footer>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
