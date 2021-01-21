<?php

$connect = new PDO('mysql:host=localhost;dbname=registraciadb', 'root', '');

session_start();

if(isset($_SESSION['user_id']))
{
  header("location:index.php");
}

$message = '';

if(isset($_POST["login"]))
{
  $query = "
  SELECT * FROM register_user 
  WHERE user_email = :user_email
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
  array(
    ':user_email' => $_POST["user_email"]
   )
  );

  $count = $statement->rowCount();

  if($count > 0)
  {
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
      if($row['user_email_status'] == 'verified')
      {
        if(password_verify($_POST["user_password"], $row["user_password"])) //heshirebul mnishvnelobebs adarebs
        {
          $_SESSION['user_id'] = $row['register_user_id'];
          $_SESSION['status'] = $row['status'];
          $_SESSION['user_name'] = $row['user_name'];
          header("location:index.php");
        }
        else
        {
          $message = "<label>მცდარი პაროლია :(</label>";
        }
     }
     else
     {
        $message = "<label class='text-danger'>გთხოვთ ჯერ გაიარეთ ვერიფიკაცია</label>";
     }
    }
  }
   else
   {
    $message = "<label class='text-danger'>მცდარი ელ-ფოსტაა</label>";
   }
}


?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>login</title>
<style>
body 
{
  font-family: Arial, Helvetica, sans-serif;
}

form 
{
  border: 3px solid #f1f1f1;
}

h2
{
  text-align: center;
}

input[type=email], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  transition: 0.3s;
}
input[type=email]:focus, input[type=password]:focus
{
      background-color: #ddd;
      outline: none;
}
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
  border-radius: 3px;
}
.cancelbtn a
{
  text-decoration: none;
}



.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Login</h2>

<form method="post" >
  <?php echo $message;  ?>

  <div class="container">
    <label for="user_email"><b>User Eemail</b></label>
    <input type="email" placeholder="შეიყვანეთ ელ-ფოსტა" name="user_email" class="form-control" required>

    <label for="user_password"><b>Password</b></label>
    <input type="password" placeholder="შეიყვანეთ პაროლი" name="user_password" class="form-control" required>
        
    <button type="submit" name="login" class="btn btn-info">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> დამაკლიკე
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn"><a href="registration.php">Cancel</a></button>
    <span class="psw">დაგავიწყდათ <a href="#">პაროლი?</a></span>
  </div>
</form>

</body>
</html>
