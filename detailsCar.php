
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
      table{
      	margin: 30px;
		margin-left: auto;
		margin-right: auto;
		font-size: 16px;
		min-width: 400px;
		overflow: hidden;
		color: black;
		float: center;
			 
		}
		table th, table td{
			padding: 15px 30px;
			border-bottom: 1px solid #ddd;
		}
		table tr{
			padding: 50px;
			margin: 30px;
		}
		table th{
			background-color: #FA101D;
			border-radius: 100px;
			color: #fff;
		}
		table h2{
			text-align: center;
		}
		.update{
			width: 150px;
		    background-color: #EDDA74;
		    border-radius: 20px;
		    color: #000;
		    border: 2px solid #12385b;
		    font-size: 16px;
		    padding: 10px;
	   }
		.delete{
			width: 150px;
		    background-color: #C19A6B;
		    border-radius: 20px;
		    color: #000;
		    border: 2px solid #12385b;
		    font-size: 16px;
		    padding: 10px;
		}

	</style>
</head>
<body>
<body>
	<div class="topnavAdmin">
      <a href="logoutAdmin.php">SIGN OUT</a>
      <a href="addCar.php">NEW CAR</a>
      <a href="homeAdmin.php">LIST OF CAR</a>
      <a href="homeAdmin.php">HOME</a>
      <span>ADMIN</span>
   </div>
   <table>
   <?php
	include 'conn.php';

	$car_id= $_GET['car_id'];
	$result = mysqli_query($conn,"select * from mobil where car_id= $car_id");
	$row= mysqli_fetch_row($result);

	echo "<tbody>";
	echo "<tr><td colspan='6'><img src='image/".$row[6]."' style='width: 450px; height: 230px;'/></td></tr>";
	echo "<tr><td colspan='4'><h2>$row[1]<br></h2></td></tr>";
	echo "<tr><th>Class :</th>";
	echo "<td>$row[3]</td>";
	echo "<th>Price Per Day :</th>";
	echo "<td>$row[2]</td></tr>";
	echo "<tr><th>Mileage :</th>";
	echo "<td>$row[4]</td>";
	echo "<th>Max Passenger :</th>";
	echo "<td>$row[5]</td></tr>";
	echo "<tr><th>Gear :</th>";
	echo "<td>$row[7]</td>";
	echo "<td></td>";
	echo "<td></td></tr>";
	echo "<tr><td colspan='2'><button class='update'><a href=update.php?car_id=$row[0] style='text-decoration:none;'>Update</a></td>";
	echo "<td colspan='3'><button class='delete'><a onclick=\"javascript:return confirm('Are sure want to delete this?');\"href=delete.php?car_id=$row[0] style='text-decoration:none;'>Delete</a></td></tr>";
	echo "</tbody>";
	echo "</table>";


	mysqli_free_result($result);
	mysqli_close($conn);
	?>


</body>
</html>

