<?php
session_start();
include('database_connection.php');

if(isset($_POST['btn']) && empty($_POST['email'])==false){

  $uname = $_POST['uname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $userType = $_POST['userType'];


  if (filter_var($email,FILTER_VALIDATE_EMAIL)== true) {
    $sql =  "INSERT INTO logininfo(Name,Email,Password,user_type) VALUES('$uname','$email','$password','$userType')" ;
    mysqli_query($conn,$sql);
 }
 else
 $_SESSION['status'] = "Please give valid Email";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
   

<style>
  .btncss{
    background: linear-gradient(to bottom, #0066cc 0%, #66ffcc 100%);
    padding: 12px 85px;
    color: #fff;
    border-radius: 5px;
    margin-right:10px ;
    border: none;
    font-size: 20px;
    font-weight: bold;
    margin-left: 100px;
    color: white;
    margin-top: 10px;
}

</style>


</head>

<body id="bodydecoration">
<form action="signup.php" method="post" class="formstyle">

<h2 >SIGN UP</h2>
 
<label for="uname" >User Name </label>
<p class="btn text-danger">
<?php 
if(isset($_SESSION['status'])){ 
    echo $_SESSION['status']; 
    unset($_SESSION['status']);
}
?>
</p>

<input type="text" name="uname" placeholder="Enter username" >

<label for="email" >Email</label> 
<input type="emial" name="email" placeholder="@" required>


<label for="password" >Password</label>
<input type="password" name="password" placeholder="Enter password" required>

<label for="" >Select Profession</label>
<select name="userType" id="">
<option value="" selected>Choose</option>
<option value="teacher">Teacher</option>
<option value="student">Student</option>
</select>

<button class="btncss" id="btncss" type="submit" name="btn">Signup</button>
<p class="link">Already have an account? <a href="signin.php">Signin</a></p>
</form>   
    
</body>
</html>