<?php
session_start();

if ($_SESSION['Login'] != 'YES')
header("Location: index.php");

if ($_SESSION['LEVEL'] != 3) {
	echo '<script>alert("You need to be logged in as a student to view this page.")</script>';
	echo "<script>window.location.href = 'main_page.php'</script>";
}

require("config.php");
?>

<html>
<head><title>Application Status</title>
<link href="css/bootstrap.css" rel="stylesheet" />
	<link href="css/coming-sssoon.css" rel="stylesheet" />    
    <!--     Fonts     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
<style>

.box
{
  border-radius: 15px;
  width: 600px;
  padding: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: #222230;
  text-align: center;
  align-items: center;
  box-shadow: 1px 1px 22px 0px rgba(0,0,0,0.67);
  color: white;
}

table {
  text-align: center;
  align-items: center;
  color: white;
}

.back {
  width: 80px;
	background: #222230;
	font-weight: bold;
	color: white;
	border: 3px solid black;
	cursor: pointer;
	padding: 10px 5px;
	text-align: center;
  position: relative;
  top: 80%;
  left: 50%;
  transform: translate(-50%,-50%);
}

.back:hover {
  background-color: red;
}

h1 {
  font-size: 45px;
	text-shadow: 2px 2px 20px  #db6d18, #fff 0 -1px 2px;
}

.new {
  position: relative;
  top: 78%;
  left: 25%;
  transform: translate(-50%,-50%);

  border: none;
  border-radius: 8px;
  color: black;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  font-size: larger;
}

.new:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

</style>

<head>
<div class = "main" style = "background-image:  url('images/restaurant.jpg')">
<body>
<form class="box">
  <h1>List of Applications</h1><br>
  <?php

  $user_id = $_SESSION["ID"];
  $sql = "SELECT * FROM reservation
    INNER JOIN customer
    ON reservation.userid = customer.id
    INNER JOIN users
    ON users.id = customer.userid
    WHERE users.id = '$user_id'
    ORDER BY FIELD(status, NULL, 1, 0)";

   $result = mysqli_query($connection, $sql);

   if (mysqli_num_rows($result) > 0) { 	?>

  <!-- Start table tag -->
  <table width="600" border="1" cellspacing="0" cellpadding="3">

  <!-- Print table heading -->
  <tr>
    <td align="center"><strong>Date</strong></td>
    <td align="center"><strong>Requested time</strong></td>
    <td align="center"><strong>Approval Status</strong></td>
    
  </tr>

  <?php
    // output data of each row
    while($rows = mysqli_fetch_assoc($result)) {
  ?>
    <tr>
      <td><?php echo $rows['date']; ?></td>
      <td><?php echo $rows['time']; ?></td>
      <?php if (is_null($rows['status'])) { ?>
        <td>Pending</td>
      <?php } else if ($rows['status'] == 1) { ?>
        <td>Approved</td>
      <?php } else { ?>
        <td>Rejected</td>
      <?php } ?>
  </tr>

  <?php }

  } else {
    echo "<p>You haven't submitted any applications yet.</p>";
  }
   ?>

 </table>
 <br><br>
  <button class="new">
    <a href="reservation_form.php">Submit Another Application</a></button>

    <div class="footer">
    <button class="btn btn-danger btn-fill"><a href="landing1.php" style="color: white">Back to Main Menu</a>
    </div></button>
 </form>
  
</div>
</div>
</body>
</html>
