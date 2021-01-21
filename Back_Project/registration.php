<?php
$connect = new PDO('mysql:host=localhost;dbname=registraciadb', 'root', '');

session_start();

if(isset($_SESSION['user_id']))
{
 	header("location:index.php");
}

$message = '';

if(isset($_POST['register']))
{
	$query = "SELECT * FROM register_user
	WHERE user_email = :user_email";

	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':user_email'  =>  $_POST['user_email']
		)
	);

	// $statement = $connect->prepare($query);
	// $statement->bindParam(':user_email',$_POST['user_email']);
	// $statement->execute();
	
	$number_of_rows = $statement->rowCount();

	if($number_of_rows > 0)
	{
		$message = '<label class = "text-danger">ასეთი ანგარიში უკვე არსებობს</label>';
	}
	else
	{
		$user_password = rand(100, 1000000);
		$user_encrypted_password = password_hash($user_password, PASSWORD_DEFAULT);
	    $user_activation_code = md5(rand());
	    $insert_query = "INSERT INTO register_user 
	    (user_name, user_email, user_password, user_activation_code, user_email_status, status) 
	    VALUES (:user_name, :user_email, :user_password, :user_activation_code, :user_email_status, :status )";
	    $statement = $connect->prepare($insert_query);
	    $statement->execute(
	    array
	    (
		    ':user_name'   => $_POST['user_name'],
		    ':user_email'   => $_POST['user_email'],
		    ':user_password'  => $user_encrypted_password,
		    ':user_activation_code' => $user_activation_code,
		    ':user_email_status' => 'not verified',
		    ':status' => 'user'
	    )
	  );
	  $result = $statement->fetchAll(); //PDOStatement::fetchAll — Returns an array containing all of the result set rows
	  if(isset($result))
	  {
	   $base_url ="http://localhost/Back_Project/";
	   $mail_body = "
	   <p>გამარჯობა ".$_POST['user_name'].",</p>
	   <p>მადლობა რეგისტრაციისთვის :)თქვენი პაროლია".$user_password.".</p>
	   <p>გთხოვთ ანგარიშის გასააქტიურებლად გახსნათ შემდეგი ბმული - ".$base_url."email_verification.php?activation_code=".$user_activation_code."
	   <p>მადლობა ჩვენს საიტზე რეგისტრაციისთვის <br /> ქართულ კინემატოგრაფიას თქვენ უყვარხართ <3 </p>
	   ";

	   $email = $_POST['user_email'];
	   require 'class/class.phpmailer.php';
	   $mail = new PHPMailer;
	   $mail->IsSMTP();        
	   $mail->Host = 'smtpout.secureserver.net';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
	   $mail->Port = '80';        
	   $mail->SMTPAuth = true;       
	   $mail->Username = 'xxx';     //aqac sheiyvanet tqveni maili
	   $mail->Password = 'XXXX';   //aq sheiyvanet tqveni paroli  da meilic shecvalet zemot $mail->Username 
	   $mail->SMTPSecure = '';       //Sets connection prefix. Options are "", "ssl" or "tls"
	   $mail->From = 'g.dogadze@gmail.com';   //Sets the From email address for the message
	   $mail->FromName = 'Murwa';     //Sets the From name of the message
	   $mail->AddAddress($_POST['user_email'], $_POST['user_name']);  //Adds a "To" address  
	   try {
		  try {
		    
		    if(strpos($_POST['user_email'], "@") == FALSE) {
		      throw new Exception($email);
		    }
		  }
		  catch(Exception $e) {
		    throw new Exception($email);
		  }
		}

		catch (Exception $e) {
		  echo "წარმოიქმნა შეცდომა";
		} 
	   $mail->WordWrap = 50;
	   $mail->IsHTML(true);      
	   $mail->Subject = 'ელ-ფოსტის ვერიფიკაცია'; 
	   $mail->Body = $mail_body; 
	   if($mail->Send())       
	   {
	    	$message = '<label class = "text-danger">aseti maili ukve arsebobs</label>';
	   }
	  }
	}

}




?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		body 
		{
		  font-family: Arial, Helvetica, sans-serif;
		  background-color: #404040;
		}

		* 
		{
		  box-sizing: border-box;
		}
		.container 
		{
		  padding: 16px;
		  background-color: white;
		}

		input[type=text], input[type=email] 
		{
		  width: 100%;
		  padding: 18px;
		  margin: 5px 0 22px 0;
		  display: inline-block;
		  border: none;
		  background: #f1f1f1;
		  transition: 0.3s;
		}

		input[type=text]:focus, input[type=email]:focus 
		{
		  background-color: #ddd;
		  outline: none;
		}

		hr 
		{
		  border: 1px solid #f1f1f1;
		  margin-bottom: 25px;
		}

		.register 
		{
		  background-color: #4CAF50;
		  color: white;
		  padding: 16px 20px;
		  margin: 8px 0;
		  border: none;
		  cursor: pointer;
		  width: 100%;
		  opacity: 0.9;
		}

		.register:hover 
		{
		  opacity: 1;
		}

		a 
		{
		  color: dodgerblue;
		}

		.signin 
		{
		  background-color: #f1f1f1;
		  text-align: center;
	}


	</style>
</head>
<body>
	<form method="post" id="register_form">
	  <div class="container">
	  	<?php echo $message;  ?>
	    <h1>რეგისტრაცია</h1>
	    <p>გთხოვთ შეავსოთ მონაცემები ანგარიშის შესაქმნელად</p>
	    <hr>

	    <label for="user_name"><b>User Name:</b></label>
	    <input type="text" placeholder="შეიყვანეთ მომხმარებლის სახელი" name="user_name" class="form-control" required>

	    <label for="user_email"><b>Email:</b></label>
	    <input type="email" placeholder="შეიყვანეთ მომხმარებლის ელ-ფოსტა" name="user_email" class="form-control" required>

	    <hr>
	    <p>თქვენი ანგარიშის შექმნინას ეთანხმებით ჩვენს <a href="#">გამოყენების წესებს</a>.</p>

	    <button type="submit" class="register" name="register">რეგისტრაცია</button>
	  	</div>
	  
	  	<div class="container signin">
	    <p>უკვე გაქვთ ანგარიში? <a href="login.php">შესვლა</a>.</p>
	  </div>
	</form>
</body>
</html>