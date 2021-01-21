<?php 

$conn = new mysqli("localhost","root","","registraciadb");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
session_start();

$smth = $_SESSION['status'];
if($smth=='admin')
{
	header("location:showroom_admin.php");
}
if($smth == 'user')
{
	header("location:showroom_user.php");
}



?>