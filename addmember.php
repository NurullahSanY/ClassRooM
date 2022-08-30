<?php
require('database_connection.php');
//require('addmember.php');

if (isset($_POST['plog'])) {
    session_destroy();
    header("location:signin.php");
}


if(isset($_GET['qname']) && isset($_GET['qmail'])){
  
     $name = $_GET['qname'];
     $email =  $_GET['qmail'];
   $sql =  "INSERT INTO cs326e(cname,cemail) VALUES('$name','$email')" ;
   mysqli_query($conn,$sql);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <style>
        .mar {
            margin-left: 30%;
        }
    </style>
</head>

<body style="background-color:#0C78CC ;">

    <nav class="navbar  " style="background-color: #2397f6">
        <div class="container-fluid">

            <h1 class="navbar-brand text-white fs-3  fw-bold">
                <img src="photos/menu.png" class="navbar-brand" alt="">
                CSE-326(Section-A)
            </h1>

            <ul class=" nav">
                <li class="nav-item">

                    <form action="" method="POST">
                    <a class="" id="dropdownMenuButton1" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="photos/people.png"  class="logo" alt=""></a> 
                        <a href="index.php" class="mx-2"><img src="photos/home.png" class="logo" alt=""></a>
                        <a href="perform.php"><img src="photos/arrow (2).png" class="logo" alt=""></a>
                        <button class="btn " type="submit" name="plog"><img src="photos/check-out.png" alt=""></button>
                    </form>

                </li>

                <li class="nav-item mt-2">
                    <p class="text-light">
                        <img src="user (5).png" alt="">
                        <?php
                        session_start();
                        echo $_SESSION['name'];
                        ?>
                    </p>
                </li>
            </ul>
        </div>
    </nav>

    <div class=" m-auto" style="width: 70%;">

        <div class="col-md-12">
            <div class="card mt-4">

                <div class=" card-header">
                    <form action="" method="GET">
                        <h1 class=" text-center text-light fw-bold text-uppercase bg-primary">Student Enrollment</h1>

                        <div class="input-group mb-3">
                            <span class=" input-group-text mt-4 border border-primary" style="height: 37px;">Search With Email</span>
                            <input type="text" required name="search" value="<?php if (isset($_GET['search'])) {
                                                                                    echo $_GET['search']; } ?>" class="form-control mt-4 " placeholder="Search data">
                            <button type="submit" class=" btn btn-outline-primary mt-4" onClick="myFunction()" style="height: 37px;">Search</button>
                        </div>
                    </form>
                </div>



                <div class=" table-responsive">


                    <div class="card-body">
                        <table class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // $con = mysqli_connect("localhost","root","","virtual classroom");

                                if (isset($_GET['search'])) {
                                    $filtervalues = $_GET['search'];
                                    $query = "SELECT * FROM logininfo WHERE CONCAT(Email,Name) LIKE '%$filtervalues%' ";
                                    $query_run = mysqli_query($conn, $query);

                                    //$nums = mysqli_num_rows($query_run);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $items) {
                                ?>
                                            <tr>
                                                <td><?php echo $items['Name']; ?></td>
                                                <td><?php echo $items['Email']; ?></td>
                                                <td class=" m-5">
                                                    <a class="btn btn-primary mar" href="addmember.php?qname=<?php echo $items['Name'];?> & qmail=<?php echo $items['Email'];?>">ADD</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="4">No Record Found</td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


<!--show part -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header d-flex justify-content-center ">
        <h2 class="modal-title  text-primary" id="">Class Room Member </h2>

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


</body>

</html>