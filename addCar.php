

<!DOCTYPE html>
<html>
<head>
	<title>New Car</title>
	<style>
		body{
			margin: 0px;
			font-family: Arial;
		}
		.topnavAdmin{
        overflow: hidden;
        background-color: #FA101D;
      }

      .topnavAdmin a{
         float: right;
         color: #f2f2f2;
         text-align: center;
         padding: 14px 16px;
         font-size: 17px;
         text-decoration: none;
      }
      .topnavAdmin span{
         float: left;
         color: #f2f2f2;
         font-size: 23px;
         padding: 14px 16px;
      }
      h2{
      	text-align: center;
      }
      .content {
      	width: 50%;
	    margin: 70px auto;
	    background-color: #FFF8C6;
	    
	   }
	   form{
	    width: 60%;
	    margin-left: auto;
	    margin-right: 40px;
	   }
	   form div{
	    margin-top: 5px;
	    padding: 20px;
	   }
	   form input[type=text], input[type=file], input[type=select]{
	    border-radius: 20px;
	    padding: 10px;
	    text-align: center;
	   }
	   .button button[type=submit]{
	    text-align: center;
	    background-color: #FA101D;
	    color: black;
	    padding: 13px;
	    width: 200px;
	    cursor: pointer;
	    border-radius: 50px;
	   }
      }
	</style>
</head>
<body>
	<div class="topnavAdmin">
      <a href="logoutAdmin.php">SIGN OUT</a>
      <a href="addCar.php">NEW CAR</a>
      <a href="homeAdmin.php">LIST OF CAR</a>
      <a href="homeAdmin.php">HOME</a>
      <span>ADMIN</span>
   </div>

   	<h2>Add New Car Form</h2>
  <div id="content">
 
  <form method="POST" action="" enctype="multipart/form-data">
      <input type="hidden" name="size" value="1000000">
  	<div>
      <br>Name :
      <input type="text" name="car_name" required="required"><br>
      <br>Price :
      <input type="text" name="car_price" required="required" value= "MYR / day"><br>
      <br>Type :
      <select name="car_type">
      	<option value="default">Please select a type</option>
      	<option value="MPV">MPV</option>
      	<option value="Economy">Economy</option>
      </select><br>
      <br>Mileage :
      <input type="text" name="car_mileage" required="required"><br>
      <br>Max Passenger :
      <input type="text" name="car_passenger" required="required"><br>
   	  <br>Image : 
  	  <input type="file" name="image"><br>
      <br>Gear :
      <select name="car_gear">
      	<option value="default">Please select a gear</option>
      	<option value="Automatic">Automatic</option>
      	<option value="Manual">Manual</option>
      </select><br>
  	<div>
      <div class="button">
  		<button type="submit" name="upload" >Add New Car</button>
    </div>
  </form>

</body>
</html>

<?php session_start();

include 'conn.php';

if (isset($_POST['upload'])){
	$car_image = $_FILES['image']['name'];
	$car_name= mysqli_real_escape_string($conn,$_POST['car_name']);
	$car_price=mysqli_real_escape_string($conn,$_POST['car_price']);
	$car_type=mysqli_real_escape_string($conn,$_POST['car_type']);
	$car_mileage=mysqli_real_escape_string($conn,$_POST['car_mileage']);
	$car_passenger=mysqli_real_escape_string($conn,$_POST['car_passenger']);
	$car_gear=mysqli_real_escape_string($conn,$_POST['car_gear']);

	$target = "image/".basename($car_image);

	$sql="INSERT INTO mobil (car_name, car_price, car_type, car_mileage, car_passenger, car_image, car_gear) VALUES ('$car_name', '$car_price', '$car_type', '$car_mileage', '$car_passenger', '$car_image', '$car_gear')";

	mysqli_query($conn,$sql);

	if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
		 echo '<script language="javascript">';
	     echo 'alert("Data is Succesfully Added!");';
	     echo 'window.location="homeAdmin.php";';
	     echo '</script>';

	    }else{
	     echo '<script language="javascript">';
	     echo 'alert("Data failed to Added!");';
	     echo '</script>';}
	 }
 
?>

