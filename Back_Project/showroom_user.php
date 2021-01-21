<?php  
$server = "localhost";
$usernm = "root";
$passwd = "";
$dbname = "registraciadb";

//$con = mysqli_connect($server, $usernm, $passwd,$dbname);
$con = new mysqli($server, $usernm, $passwd,$dbname);
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
		content
		{
			margin-top: 20px;
			margin-left: 20px;
		}
		table, td, th 
		{
 			border: 1px solid black;
		}

		table 
		{
 			 border-collapse: collapse;
 			 width: 80%;
		}

		th 
		{
  			height: 50px;
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
		<?php 
		$sql = "SELECT * from films";
		$result= $con->query($sql);
		echo "<table>";
		echo "<tr><th>"."ფილმის სახელი"."</th><th>"."გამოშვების წელი"."</th><th>"."ფილმის აღწერა"."</th></tr>";
		while($row = $result->fetch_row())
		{
			echo "<tr><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
		}




		echo "</table>";


		 ?>	
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