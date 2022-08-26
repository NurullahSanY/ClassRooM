<?php session_start();
require("database_connection.php");
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $_SESSION['Email'] = $email;
    $password = $_POST['password'];
    $userType = $_POST['userType']; ;
     

   $query =  "SELECT * FROM logininfo WHERE  Email = '$email' AND Password = '$password' AND user_type = '$userType'";
   $result = mysqli_query($conn,$query); 

   if(mysqli_num_rows($result)){
    //session_start();

    if(mysqli_num_rows($result) > 0){
        
        $field = mysqli_fetch_array( $result);
                
            $_SESSION['name'] = $field['Name']  ;
    
}
   
    if($userType == "student"){
        //header("location: student.php");
        echo "<script language=Javascript>document.location.href='student.php'</script>";
        echo "<script language=Javascript>document.location.href='perform.php'</script>";
        echo "<script language=Javascript>document.location.href='index1.php'</script>";
        echo "<script language=Javascript>document.location.href='index2.php'</script>";
        echo "<script language=Javascript>document.location.href='upload.php'</script>";
    }
   else if($userType == "teacher"){
        //header("location: teacher.php");
        echo "<script language=Javascript>document.location.href='teacher.php'</script>";
        echo "<script language=Javascript>document.location.href='perform.php'</script>";
        echo "<script language=Javascript>document.location.href='index1.php'</script>";
        echo "<script language=Javascript>document.location.href='index2.php'</script>";
        echo "<script language=Javascript>document.location.href='upload.php'</script>";
    }
   }
   else
   echo "<script>alert('Incorrect Information')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signin</title>
<!-- CSS only -->
<link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="style.css" type="text/css">
 <style>
  .btncss{
    background: linear-gradient(to bottom, #0066cc 0%, #66ffcc 100%);
}
</style>
</head>

<body id="bodydecoration">
    <form action="" method="POST" class="formstyle">

            <h2>SIGN IN</h2>
             
            <label for="">Email</label>
            <input type="email" name="email" placeholder="Enter email">
 
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Enter password">
           
            <label for="">Select Profession</label>
           <select name="userType" id="">
            <option value="#" selected>Choose</option>
            <option value="teacher">Teacher</option>
            <option value="student">Student</option>
           </select>
             <input style="background-color: #0C78CC; " value="Signin" class=" text-light fs-6 fw-bolder" type="submit" name="login" placeholder="">
            <p class="link">Don't have an account? <a href="signup.php">Signup</a> </p> 

    </form>   
   
</body>
</html>