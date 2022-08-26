<?php
require('database_connection.php');

if(isset($_POST['copydata'])){         
    $cemail = $_POST['email'];
    $cname = $_POST['uname']; 

    $sqlselect = " SELECT * FROM logininfo WHERE Email ='$cemail' AND Name ='$cname' "  ;

    $records = mysqli_query($conn,$sqlselect);
      
    if(mysqli_num_rows($records)){
    $field = mysqli_fetch_array( $records);
         
           echo $_SESSION['cname'] = $field['Name'];
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>