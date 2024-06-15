<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Car Details</title>
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
      table{
      	margin-left: 25%;
      }
      form{
	    width: 90%;
	    margin-left: 20px;
	    margin-right: 40px;
	    margin-top: 40px;
	   }
	 
	   form input[type=text], input[type=file], input[type=select]{
	    border-radius: 20px;
	    padding: 10px;
	    text-align: center;
	   }
    form input[type=submit]{
      	text-align: center;
	    background-color: #FA101D;
	    color: black;
	    padding: 13px;
	    width: 200px;
	    cursor: pointer;
	    border-radius: 50px;
    }
    input:read-only{
      background-color: #FFEBCD;
    }
    h2{
    	text-align: center;
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
   <h2>Update Car Details Form</h2>
   <?php
   include 'conn.php';
   echo '<table><tr><td>';

   $car_id= $_GET['car_id'];
   $result= mysqli_query($conn,"select * from mobil where car_id=$car_id");
   $row = mysqli_fetch_row($result);?>

   <form action='updateProcess.php?car_id=<?=$row[0];?>' method=post>
   	<b>ID : </b>
   	<input type="text" name="car_id" value="<?=$row[0];?>" readonly="readonly"><br><br>
   	<b>Name : </b>
   	<input type="text" name="car_name" value="<?=$row[1];?>"><br><br>
   	<b>Class : </b>
   	<input type="text" name="car_type" value="<?=$row[3];?>"><br><br>
   	<b>Price : </b>
   	<input type="text" name="car_price" value="<?=$row[2];?>"><br><br>
   	<b>Mileage : </b>
   	<input type="text" name="car_mileage" value="<?=$row[4];?>"><br><br>
   	<b>Max Passenger : </b>
   	<input type="text" name="car_passenger" value="<?=$row[5];?>"><br><br>
   	<b>Gear : </b>
   	<input type="text" name="car_gear" value="<?=$row[7];?>"><br><br>
   	<b>Image : </b>
   	<input type="file" name="image" value="<?=$row[6];?>"/><br>

   	<br><br><input type="submit" name="submit" value="UPDATE">
   </form>
    </td>
   <td><img src="image/<?php echo $row[6]?>" style='width: 350px; height: 230px;' class='center'></td></tr></table>
   <?php
   mysqli_free_result($result);
   mysqli_close($conn);
   ?>
</body>
</html>