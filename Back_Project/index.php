<?php
$localhost = "localhost"; #localhost
$dbusername = "root"; #username of phpmyadmin
$dbpassword = "";  #password of phpmyadmin
// $dbname = "registraciadb";  #database name
 
#connection string
$conn = new mysqli("localhost","root","","registraciadb");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
session_start();

if(!isset($_SESSION['user_id']))
{
  header("location:login.php");
}



$message = '';



	// if(!isset($_SESSION['user_id']))
	// {
	// 	header("location:login.php");
	// }

if (isset($_POST["submit"]))
 {
	$film_name = stripcslashes($_POST["film_name"]);
	$film_name = mysqli_real_escape_string($conn,$film_name);

 	$gamoshvebis_weli = stripcslashes($_POST["gamoshvebis_weli"]);
	$gamoshvebis_weli = mysqli_real_escape_string($conn,$gamoshvebis_weli);

 	$agwera = stripcslashes($_POST["agwera"]);
	$agwera = mysqli_real_escape_string($conn,$agwera);

    $pname = $_FILES["file"]["name"];
    $tname = $_FILES["file"]["tmp_name"];
	$uploads_dir = 'images';
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
    $sql = "INSERT into films(film_name,gamoshvebis_weli,agwera,mdebareoba) VALUES('$film_name','$gamoshvebis_weli','$agwera','$pname')";
    if($conn-> query($sql) === TRUE)
    {
    	$message = 'ჩანაწერი დამატებულია';
    }
    else
    {
    	$message = 'ჩანაწერი არ დაემატა';
    }
}
	
?>


<!DOCTYPE html>
<html>
 <head>
 	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
	<meta name="description" content="ქართული კინემატოგრაფიის მოყვარულთა საიტი">
	<meta name="keywords" content="ქართული, კინემატოგრაფია">
	<meta name="author" content="გიორგი დოღაძე">
	<link rel="icon" href="images\lika_qavjaradze_icon.jpg">
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	<style type="text/css">
		.uploadform
		{
			width: 100%;
			height: 420px;
			text-align: center;
			font-size: 18px;
			font-weight: bold;
		}

		.film_name
		{
			margin-right: 82px;
		}
		.gamoshvebis_weli
		{
			margin-right: 90px;
		}
		h2
		{
			text-align: center;
		}
	</style>




 </head>
 <body>
<div class="everything">
	<header>
		<div class="saitis_shesaxeb">
			<a href = "index.html">Geomovies<span class="color_green">.ge </span></a> 
			<span class="ubralod"> - უბრალოდ საიტი კინომოყვარულთათვის </span>
		</div>
		<ul>
			<li><a href="logout.php">გამოსვლა</a></li>
			<li><a href="#"><img src="images\geo.gif" alt= "georgian" title="ქართული"></a></li>

		</ul>
	</header>



	<nav>
		<ul>
			<li><a href = "#">ფილმები</a></li>
			<li><a href = "#">მსახიობები</a></li>
			<li><a href = "#">რეჟისორები</a></li>
			<li><a href = "#">ფოტო გალერეა</a></li>
			<li><a href = "#">კონტაქტი</a></li>
			<li><a href = "#">ჩვენ შესახებ</a></li>
		</ul>

	</nav>
	<h2>შეიყვანეთ თქვენთვის სასურველი ფილმის მონაცემები</h2>
	<div class="uploadform">
	<form method="post" enctype="multipart/form-data">
		<label>ფილმის სახელი:</label>
	    <input type="text" name="film_name" class="film_name" required>
	    <br>
	    <label>გამოშვების წელი:</label>
	    <input type="text" name="gamoshvebis_weli" class="gamoshvebis_weli">
	    <br>
	    <label>აღწერა:</label>
	    <input type="text" name="agwera" class="agwera">
	    <br>
	    <label>ფაილი ატვირთეთ აქ:</label>
	    <input type="File" name="file">
	    <br>
	    <input type="submit" name="submit">
	    <br>
	    <br>
 		<?php echo $message ?>
 		<br><br><br>
 		<p><a href="obshoruli_zona.php">ფილმების სიის ნახვა</a></p>


 
	</form>

	</div>

	<footer>
		<div class="footer_top_content">
			<ul>
				<li><a href="#">ჩვენი გუნდი</a></li>
				<li><a href="#">ვაკანსიები</a></li>
			</ul>

			<ul>
				<li><a href="#">ჩვენი მხარდამჭერები</a></li>
				<li><a href="#">ჩვენი თანამშრომლები</a></li>
			</ul>
		</div>



		<div class="footer_bottom_content">
				<span class="company">© 2020 Geomovies.ge</span> &nbsp &nbsp გამოყენების პირობები &nbsp &nbsp კონფიდენციალურობის პოლიტიკა
			<div class="footer_bottom_right_content">
				<ul>
					<li><a href="#"><img src="images\fb.png" alt= "facebook" title="facebook"></a></li>
					<li><a href="#"><img src="images\inst.png" alt= "instagram" title="instagram"></a></li>
					<li><a href="#"><img src="images\yt.png" alt= "youtube" title="youtube"></a></li>
				</ul>
			</div>
		</div>
	</footer>


 </div>

 </body>
 
</html>