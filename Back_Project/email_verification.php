<?php

$connect = new PDO('mysql:host=localhost;dbname=registraciadb', 'root', '');


  
session_start();

$message = '';

if(isset($_GET['activation_code']))
{
 $query = "
  SELECT * FROM register_user 
  WHERE user_activation_code = :user_activation_code
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':user_activation_code'   => $_GET['activation_code']
  )
 );
 $number_of_rows = $statement->rowCount();
 
 if($number_of_rows > 0)
 {
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   if($row['user_email_status'] == 'not verified')
   {
    $update_query = "
    UPDATE register_user 
    SET user_email_status = 'verified' 
    WHERE register_user_id = '".$row['register_user_id']."'
    ";
    $statement = $connect->prepare($update_query);
    $statement->execute();
    $sub_result = $statement->fetchAll();
    if(isset($sub_result))
    {
     $message = '<label class="text-success">თქვენი ანგარიში წარმატებით ვერიფიცირდა<br />ანგარიშში შესვლა შეგიძლიათ აქედან - <a href="login.php">Login</a></label>';
    }
   }
   else
   {
    $message = '<label class="text-info">თქვენი მეილი უკვე ვერიფიცირებულია</label>';
   }
  }
 }
 else
 {
  $message = '<label class="text-danger">მცდარი ლინკია</label>';
 }
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>ვერიფიკაცია</title>  
 </head>
 <body>
  
  <div class="container">
   <h1 align="center">PHP რეგისრაცია მაილით </h1>
  
   <h3><?php echo $message; ?></h3>
   
  </div>
 
 </body>
 
</html>
