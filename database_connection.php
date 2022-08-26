<?php
$hostname = 'localhost';
$email = 'root';
$password = '';

$dbname = 'virtual classroom';
$conn = new mysqli($hostname,$email,$password,$dbname);

if($conn->connect_errno){
    die("Connection fail". $conn->connect_error);
}
?>