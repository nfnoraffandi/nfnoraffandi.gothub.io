<?php
session_start();

$message="";
if(count($_POST)>0){
  include 'conn.php';

  $result = mysqli_query($conn, "SELECT * FROM admin WHERE admin_username='". $_POST["admin_username"]. " ' and admin_password= '". $_POST["admin_password"]."'");
  $row= mysqli_fetch_array($result);
  if(is_array($row)){
    $_SESSION["admin_id"]= $row['admin_id'];
    $_SESSION["admin_name"]= $row['admin_name'];
  }else{
    $message= "Invalid ID or Password!";
  }
  
}
if(isset($_SESSION["admin_id"])){
  header("Location: homeAdmin.php");
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
      .message{
        color: white;
      }
    </style>
  </head>

  <body>

    <form class="box" action="" method="post">
      <h1>Easy Car Rental System</h1>
      <h1>Admin Login</h1>
      <div class="message"><?php if($message != "") {echo $message;}?></div>
      <input type="text" name="admin_username" placeholder="Username" style="color: white;" required="required">
      <input type="password" name="admin_password" placeholder="Password" style="color:white;" required="required">
      <input type="submit" name="" value="Login" >
    </form>


  </body>
</html>
