<?php
session_start();

require("config.php");
?>

<html>
<head>
	<link href="css/bootstrap.css" rel="stylesheet" />
		<link href="css/coming-sssoon.css" rel="stylesheet" />    
		<!--     Fonts     -->
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
		<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
  <style>

.bar {
  font-family: "Amatic SC", sans-serif;
}

.box
{
  font-family: "Amatic SC", sans-serif;
  width: 50%;
  max-height: 130%;
  padding: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: black;
  text-align: left;
  box-shadow: 1px 1px 22px 0px rgba(0,0,0,0.67);
  color: white;
  font-size: 30px;
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
	
  position: absolute;
  top: 90%;
  left: 50%;
  transform: translate(-50%,-50%);
}

.back:hover {
  background-color: red;
}

input[type=submit] {
  background-color: #4CAF50;
  font-size: 18px;
  font-weight: bold;
  border: none;
  color: white;
  padding: 15px 25px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}

table {
  text-align: center;
  font-size: 20px;
}

h1 {
  font-family: "Amatic SC", sans-serif;
  font-size: 70px;
  text-align: center;
}

input, textarea {
  display: block;
}

.reservation {
  padding-left: 25px;
}

.main {
    background: url(landing.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height:200%;
}

.login {
  float: right;
  padding-right: 25px;
  padding-top: 5px;
}

  </style>
  <title>Apply Reservation</title>
</head>
<div class = "main">
<body>

<?php
      $sql = "SELECT users.id, customer.name, customer.ic, users.username, users.password, users.id, users.level
      FROM users
      LEFT JOIN customer
      ON users.id = customer.userid
      WHERE users.level = 3
      ORDER BY customer.name";

		  $customers = mysqli_query($connection, $sql);

        // output data of each row
        $rows = mysqli_fetch_assoc($customers);
  ?>

  <div class="bar">
<div class="w3-top w3-hide-small">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="landing1.php#" class="w3-bar-item w3-button">HOME</a>
    <a href="landing1.php#menu" class="w3-bar-item w3-button">MENU</a>
    <a href="landing1.php#about" class="w3-bar-item w3-button">ABOUT</a>
    <a href="landing1.php#myMap" class="w3-bar-item w3-button">CONTACT</a>
    <a href="reservation_form.php" class="w3-bar-item w3-button">RESERVATION</a>
    <?php $get_param = "?id=" . $rows['id'] . "&level=" . $rows['level']; ?>
    <a href="profile.php<?php echo $get_param ?>" class="login" class="w3-bar-item w3-button">USER PROFILE</a>
  </div>
</div>
  </div>
  <br><br>
<div class="box">
<h1>Make A Reservation</h1><br><br>

<?php
  require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

  $sql = "SELECT * FROM time ";
  $result = mysqli_query($connection, $sql);

  $user_id = $_SESSION["ID"];
  $sql = "SELECT * FROM customer WHERE userid = '$user_id'";
  $customer = mysqli_query($connection, $sql);
  $customer_data = mysqli_fetch_assoc($customer);
?>

  <form id="myForm" action=<?php echo $_SESSION['LEVEL'] == 3 ? '"insert_application.php"' : '"landing1.php"'; ?> method="post">
  <input type="hidden" name="user_id" value="<?php echo $_SESSION['LEVEL'] == 3? $customer_data['userid']: "admin"; ?>">
  <div class="reservation">
  <form >
    <label for ="cus_id">Customer ID</label>
    <input type = "text" name = "cus_id" value ="<?php echo $_SESSION['LEVEL'] == 3? $customer_data['id']: "admin"; ?>" readonly><br>
    <label for="fname">Name</label>
    <input type = "text" name = "fname" value ="<?php echo $_SESSION['LEVEL'] == 3? $customer_data['name']: "admin"; ?>" readonly><br>    
    <label for="email">Email</label>
    <input type = "text" name = "email" value ="<?php echo $_SESSION['LEVEL'] == 3? $customer_data['email']: "admin"; ?>" readonly><br>    
    <label for="tel">Telephone Number</label>
    <input type="tel" name = "tel"><br>
    <label for="date">Date</label>
    <input type="date" name = "date"><br>
    <label for="time">Time</label>
    <input type='time' name = "time"><br>
    <label for="number">No. of guests</label>
    <input type="number" width="200" name = "number"><br>
    <label for="comments">Special Requests</label>
    <textarea name="comments" id="" cols="50" rows="3"></textarea> <br>
    <input type="submit" value="Apply">
 </form>
  </div>
  <br><br><br>

</div>
</div>
</body>

</html>
