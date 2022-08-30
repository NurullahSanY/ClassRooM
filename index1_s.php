<?php
require 'action.php';  
require 'config.php';  

 
if(isset($_POST['plog'])){
    session_destroy();
    header("location:signin.php");
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <title> comment system</title>
<script src="https://kit.fontawesome.com/49d8c72937.js" crossorigin="anonymous"></script>

 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>   
<link rel="stylesheet" href="css/bootstrap.min.css">    
</head>

 
<body class="" style="background-color: #0873CC">

<nav class="navbar" style="background-color: #2397f6">
  <div class="container-fluid">

  <h1 class="navbar-brand text-white fs-3  fw-bold">
  <img src="photos/menu.png" class="navbar-brand" alt="">  
  CSE-326(Section-A)</h1>
    
   <ul class=" nav">
   <li class="nav-item">

    <form action="" method="POST">
    <a href="index.php" class="me-2"><img src="photos/home.png"  class="logo" alt=""></a>
    <a href="perform_s.php"><img src="photos/arrow (2).png"  class="logo" alt=""></a>
   <button class="btn " type="submit" name="plog"><img src="photos/check-out.png" alt=""></button>
    </form>
   
   </li>

   <li class="nav-item mt-2"> <p class="text-light">
   <img src="photos/user (5).png" alt="">
   <?php
   session_start(); 
        echo $_SESSION['name'] ;
       ?> 
   </p></li>
</ul>
  </div>
</nav>


<div class="container">

    <div class="row justify-content-center mb-2 ">
        <div class="col-lg-10 bg-light rounded mt-2">
         <h4 class="text-center p-2 fs-2 fw-bold"> Post Announcement </h4>
         <form action="index1_s.php" method="POST" class="p-2">
            <input type="hidden" name="id" value="<?=$u_id; ?>" >
            <div class="form-group">
            <input type="text" name="name" class="form-control rounded" placeholder= "Enter your name" required hidden value="<?=$u_name = $_SESSION['name']  ;?>">
</div>
<div class="form-group">
    <textarea name="comment" class="form-control rounded" placeholder="Write your post here" required style="height: 200px;"> <?=$u_comment; ?> </textarea>

</div>
<div class="form-group">
      <?php if($update==true) {  ?>
   <input type="submit" name="update" class="btn btn-primary" value=" Update">
  <?php } else{  ?>
      
    <input type="submit" name="submit" class="btn btn-primary " value="Post">
    <?php } ?>
<h6 class="float-right  text-success p-2 alert"> <?=$msg; ?>  </h6>
</div>
</form>    
</div>
</div>
<div class="row justify-content-center"> 
    <div class="col-lg-10 rounded bg-light p-3"> 
       <?php
       $sql="SELECT * FROM commnet_table ORDER BY id DESC";
       $result=$conn->query($sql);
       while($row=$result->fetch_assoc()){ 
       ?> 
       <div class="card mb-2 border-secondary">
        <div class="card-header bg-dark py-1 text-light"> 
        
            <span class="font-italic">Posted By: <?= $row['name']?> </span>
            <span class="float-right font-italic">On: <?=$row['curr_date']?> </span>

            <div class="float-right pe-4"> 
              <a href="action.php?del=<?=$row['id']?>" class="text-danger mr-2" onclick="return confirm('Do your want to delete this post?');" title="Delete"> <i class="fas fa-trash"> </i> </a>
              <a href="index1_s.php?edit=<?=$row['id']?>" class="text-success" title="Edit"><i class="fas fa-edit"> </i> </a>
              </div>
        
        </div> 
            <div card="card-body py-2"> 
             <p class="card-text" style="height: 100px;"><?=$row['comment']?> </p>
             </div>
       </div>
      <?php } ?>
    </div>
 </div>
</div>
</body>
</html>