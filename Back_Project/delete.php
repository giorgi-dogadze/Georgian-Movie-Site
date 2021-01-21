<?php 
	$server = "localhost";
	$usernm = "root";
	$passwd = "";
	$dbname = "registraciadb";

	$con = new mysqli($server, $usernm, $passwd,$dbname);
	$id= $_GET['delete_id'];
	$sql = "DELETE FROM films WHERE filmID=$id";
	if($con->query($sql))
	{
		echo "ჩანაწერი წაშლილია";
		header("refresh:0.5;url=showroom_admin.php");
	}
	else
	{
		echo $con->error."<br>";
	}


 ?>