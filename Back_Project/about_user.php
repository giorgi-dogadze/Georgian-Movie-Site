<?php 
	$conn = new mysqli("localhost","root","","registraciadb");
	if ($conn->connect_error)
	{
  		die("Connection failed: " . $conn->connect_error);
	}
	session_start();
	$smth = $_SESSION['user_name'];
	$myFile = "about_user.txt";
	$fh = fopen($myFile, 'a') or die("საქაღალდე ვერ გავხსენი");
	
	if(isset($_POST["submit"]))
	{
		$stringData = $_POST["text_about_user"];
		fwrite($fh, $stringData);
		// header("refresh:0.5;url=about_user.php");


	}
	fclose($fh);

	if(isset($_POST["clear"]))
	{
		$fh = fopen($myFile, 'w') or die("საქაღალდე ვერ გავხსენი");
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
		.text_about_user
		{
			width: 60%;
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





	<content>
		<form method="post">
			<label>მომხმარებლის შესახებ ტექსტი შეიყვანეთ აქ:</label>
			<input type="text" name="text_about_user" class="text_about_user">
			<input type="submit" name="submit" value="ჩაწერა">
			<input type="submit" name="clear" value="გაწმენდა" style="margin-left: 600px;">
		</form>

		<?php 	$myFile = "about_user.txt";
		$fh = fopen($myFile, 'r') or die("საქაღალდე ვერ გავხსენი");
		while (!feof($fh))
  		{ 
  			echo fgetc($fh);  
  		}
		fclose($fh); 
		?>

		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<h3 style="float: right; margin-right: 20px;"><a href="showroom_admin.php">უკან დაბრუნება</a></h3>


	</content>




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