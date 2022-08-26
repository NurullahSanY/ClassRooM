<?php
if(isset($_POST['plog'])){
    session_destroy();
    header("location:signin.php");
    }
?>

    <?php
    $conn = mysqli_connect('localhost','root','','example');
    if(isset($_POST['submit'])){
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $path = "files/".$fileName;
        
        $query = "INSERT INTO filedownload(filename) VALUES ('$fileName')";
        $run = mysqli_query($conn,$query);
        
        if($run){
            move_uploaded_file($fileTmpName,$path);
        }
        else{
            echo "error".mysqli_error($conn);
        }
        
    }
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>upload</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>


<body style="background-color:#0C78CC ;">



<nav class="navbar  " style="background-color: #2397f6">
  <div class="container-fluid">

  <h1 class="navbar-brand text-white fs-3  fw-bold">
  <img src="photos/menu.png" class="navbar-brand" alt="">  
  CSE-326(Section-A)</h1>
    
   <ul class=" nav">
   <li class="nav-item">

<form action="" method="POST">
<a href="index.php" class="me-2"><img src="photos/home.png"  class="logo" alt=""></a>
<a href="perform.php"><img src="photos/arrow (2).png"  class="logo" alt=""></a>
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


<div class="container border bg-light rounded-3 mt-3" style="height: 620px;">

   <div class="card-header bg-primary text-center mt-2">
        <h1 class="text-light fw-bold ">Metarial Upload & Download</h1>
    </div>

<form action="upload.php" method="post" enctype="multipart/form-data" class="d-flex justify-content-center">

<div class="input-group w-50 m-2 ">
<input type="file" name="file" class="btn btn-outline-primary form-control" >
     <button type="submit" name="submit" class="btn btn-outline-primary"> Upload</button>
</div>
    
 </form>



 <div class="d-flex justify-content-center">
 <table class="table table-bordered table-striped " style="width: 65%;">
        <thead>
          <tr>
            <th>Name</th>
            <th>Matarials</th>
          </tr>
        </thead>

        <tbody>
           
        <?php
        $query2 = "SELECT * FROM filedownload ";
        $run2 = mysqli_query($conn,$query2);
         while($rows = mysqli_fetch_assoc($run2)){
           echo'<tr>

           <td>' .$rows['filename']. '</td>

            <td>' ?>
            <a class='text-primary' href="download.php?file=<?php echo $rows['filename'] ?>">Download</a><br>
            <?php '</td>
            
            </tr>';
         }

        ?>   
        
        </tbody>
      </table>
 </div>


</div>
    
   <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>