<?php session_start();
  include 'conn.php';?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<style>
		body{
         margin: 0px;
         font-family: Arial;
         background: #FFF;
         color: black;
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
      .top h1{
      	font-family: sans-serif;
      	color: #373737;
      }
      .top p{
      	font-family: sans-serif;
      	font-size:18px;
      	color: #636363;
      }
      .top table td{
      	text-align: center;
      }
      .main h2{
      	color: #373737;
      	font-size: 23px;
      	text-align: center;
      	text-decoration-line: underline;
      }
     /*table list admin*/
		.table-home {
			 margin: 30px;
			 margin-left: auto;
		     margin-right: auto;
			 font-size: 16px;
			 min-width: 400px;
			 overflow: hidden;
			 color: black;
			 float: center;
			 
		}
		.table-home thead tr{
			text-align: center;
			padding: 10px;
			font-size: 20px;
		}
		.table-home th, .table-home td{
			padding: 12px 15px;
			border-bottom: 1px solid #ddd;
		}
		.table-home tr:hover {
		    background-color: #FF9E9E;
		 }
		 .table-car {
		 	margin-left: auto;
		    margin-right: auto;
			font-size: 16px;
			min-width: 400px;
			overflow: hidden;
			color: black;
			float: center;
			color: black;
			text-align: center;
		 }
		 .table-car th a{
		 	text-decoration: none;
		 	color: #FA101D;
		 	font-size: 23px;
		 	font-family: monospace;
		 }
		 .table-car td:hover{
		 	background-color: #CCCCCC;
		 }
		</style>
</head>
<body>
	<div class="topnavAdmin">
      <a href="logoutAdmin.php">SIGN OUT</a>
      <a href="addCar.php">NEW CAR</a>
      <a href="#carList">LIST OF CAR</a>
      <a href="homeAdmin.php">HOME</a>
      <span>ADMIN</span>
   </div>
    <?php
	if($_SESSION["admin_name"]){?>
		<p align="center"> Current User: <?php echo $_SESSION["admin_name"];}?></p>
   <div class="top">
   	<table><tr>
	   <td><img src="image/slide3.png"></td>
	   <td><h1>We are Easy Car. Your Favourite Car Rental</h1>
	   <p>Easy Car was established since year 2020. The company is licensed by the Ministry of Culture, Arts, and Tourism to carry out a car rental business in Malaysia. Our head office is located in Kuala Lumpur. We offer car rental and car leasing services in major city and airport throughout Malaysia.</p>
	   <p>We offer wide choice of vehicles, from economical to luxury cars, vans, MPV and SUV for you 
	   to choose the one most appropriate for your trip and travelling comfort. We have various brand of vehicles included TOYOTA, PROTON, PERODUA, and etc in our fleet for rent.</p></td></tr></table>
	</div>
	<br><br><br><br>

	<div class="main">
		<br><br><br><h2> List of Admin in the Current System </h2><br>

	<table class="table-home" >
		<tr><thead>
			<th>Name</th><th>Phone</th><th>Email</th><th>Address</th>
		</thead></tr>
		

	<?php
	$result = mysqli_query($conn, "select * from admin");

	while($row= mysqli_fetch_array($result)){
		echo "<tbody>";
		echo "<tr><td>".$row['admin_name']."</td>";
		echo "<td>".$row['admin_phone']."</td>";
		echo "<td>".$row['admin_email']."</td>";
		echo "<td>".$row['admin_address']."</td>";
		echo "</tr>";
		echo "</tbody>";}
		echo "</table>";		

	mysqli_free_result($result);
	?>


	<br><br><br><br><p id="carList"><h2>List of Car that are Available</h2></p>
	<table class="table-car">
		

		<?php
		$result = mysqli_query($conn,"select car_id,car_name, car_image from mobil");

		while ($row= mysqli_fetch_array($result)) {
			echo "<tbody>";
			echo "<tr><th><a href=detailsCar.php?car_id=$row[0]>$row[1]</a></th></tr>";
			echo "<tr><td><img src='image/".$row['car_image']."' style='width: 350px; height: 230px;'/></td></tr>";
			echo "<tr><td></td></tr><tr><td></td></tr>";
			echo "</tbody>";}
			echo "</table>";

		mysqli_free_result($result);
		mysqli_close($conn);
		?>




	</div>

</body>
</html>