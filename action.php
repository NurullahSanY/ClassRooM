<?php
require'config.php';
$msg="";
$u_id="";
$u_name="";
$u_comment="";
$update=false;
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $comment=$_POST['comment'];
    $date=date("Y-m-d");
    $sql="INSERT INTO commnet_table(name,comment,curr_date) VALUES('$name','$comment','$date')";
    if($conn->query($sql))
    {$msg="Posted successfully!";
     }
    else{
        $msg="Failed to post comment!";
    }
}
if(isset($_GET['del']))
{
    $id=$_GET['del'];
    $sql="DELETE FROM commnet_table WHERE id='$id'";
      if($conn->query($sql))
      {
        header('location:index1.php');
    }  
}
if(isset($_GET['edit']))
{
    $id=$_GET['edit'];
  $sql="SELECT* FROM commnet_table WHERE id='$id'";
  $result= $conn->query($sql);
  $row=$result->fetch_assoc();
$u_id=$row['id'];
$u_name=$row['name'];
$u_comment=$row['comment'];
$update=true;
}
if(isset($_POST['update']))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $comment=$_POST['comment'];
    $date=date('y-m-d');
    $sql="UPDATE commnet_table SET name='$name',comment='$comment',curr_date='$date' WHERE id='$id' ";
    if($conn->query($sql))
    {
        $msg= "Edited Successfully!";
    }

}
?>