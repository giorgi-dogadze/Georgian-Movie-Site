<?php 
	$server = "localhost";
	$usernm = "root";
	$passwd = "";
	$dbname = "registraciadb";

	$con = new mysqli($server, $usernm, $passwd,$dbname);



	$id= $_GET['update_id'];
	$sql = "SELECT film_name, gamoshvebis_weli,agwera from films where filmID=$id";
    $result = $con -> query($sql);
    $row = $result -> fetch_assoc();
    $dzveli_film_name = $row["film_name"];
    $dzveli_gamoshvebis_weli = $row["gamoshvebis_weli"];
    $dzveli_agwera = $row["agwera"];



    if(isset($_POST["submit"]))
    {
    	$axali_film_name = $_POST["film_name"];
    	$axali_gamoshvebis_weli = $_POST["gamoshvebis_weli"];
		$axali_agwera = $_POST["agwera"];

    	$sql = "UPDATE films SET film_name = '$axali_film_name' , gamoshvebis_weli = '$axali_gamoshvebis_weli', agwera = '$axali_agwera' WHERE filmID=$id ";
    	if($con->query($sql))
		{
			echo "ჩანაწერი განახლებულია";
			header("refresh:0.5;url=showroom_admin.php");
		}
		else
		{
			echo $con->error."<br>";
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
			text-align: left;
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
			<li><a href = "rejisorebi.html">რეჟისორები</a></li>
			<li><a href = "galerea.html">ფოტო გალერეა</a></li>
			<li><a href = "kontaqti.html">კონტაქტი</a></li>
			<li><a href = "chven_shesaxeb.html">ჩვენ შესახებ</a></li>
		</ul>
	</nav>

	<content class="uploadform">
	<form action = "" method="post">
		<h2>შეიტანეთ ცვლილებები</h2>
		<label>ფილმის სახელი:</label>
	    <input type="text" name="film_name" class="film_name" placeholder="<?php echo $dzveli_film_name  ?>">
	    <br>
	    <label>გამოშვების წელი:</label>
	    <input type="text" name="gamoshvebis_weli" class="gamoshvebis_weli" placeholder="<?php echo $dzveli_gamoshvebis_weli  ?>">
	    <br>
	    <label>აღწერა:</label>
	    <input type="text" name="agwera" class="agwera" placeholder="<?php echo $dzveli_agwera  ?>">
	    <br>
	    <br>
	    <input type="submit" name="submit">
	</form>
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