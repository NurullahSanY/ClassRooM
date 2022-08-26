<?php
$conn= new mysqli("localhost","root","","virtual classroom");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}
?>