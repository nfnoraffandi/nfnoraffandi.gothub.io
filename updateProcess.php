<?php session_start();
include 'conn.php';

$car_id =$_GET['car_id'];
$sql ="UPDATE mobil SET car_name= '$_POST[car_name]', car_price= '$_POST[car_price]', car_type='$_POST[car_type]',
 car_mileage='$_POST[car_mileage]', car_passenger='$_POST[car_passenger]', car_image='$_POST[image]', car_gear='$_POST[car_gear]' WHERE car_id =$car_id";

if(!mysqli_query($conn,$sql)){
	die('Error:'.mysqli_error($conn));
}

echo '<script language="javascript">';
echo 'alert("Data is Succesfully Updated!");';
echo 'window.location="homeAdmin.php";';
echo '</script>';
?>