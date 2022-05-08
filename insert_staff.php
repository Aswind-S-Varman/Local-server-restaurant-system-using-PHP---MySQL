<head>
<style>

body
{
  background: url(images/foodback.jpg);
	height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.box
{
  border-radius: 15px;
  width: 500px;
  padding: 10px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: #222230;
  text-align: center;
  box-shadow: 1px 1px 22px 0px rgba(0,0,0,0.67);
  color: white;
  font-family: 'Roboto', sans-serif;
  font-size: 30px;
}


</style>
<title>Adding Staff Details</title>
</head>

<body>
<div class="box">

<?php

require("config.php");

$user = $_POST["username"];
$pass = $_POST["password"];
$name = $_POST["staff_name"];
$staf = $_POST["staffid"];

$sql = "INSERT INTO users (username, password, level) VALUES ('$user', '$pass', 2)";

if (mysqli_query($connection, $sql)) {
  $sql = "SELECT id FROM users WHERE username='$user'";
  $result = mysqli_query($connection, $sql);
  $userid = mysqli_fetch_assoc($result)["id"];
  echo "User insert successful, user id is: " . $userid;

  $sql = "INSERT INTO staff (name, staffid, userid) VALUES ('$name', '$staf', '$userid')";

  if (mysqli_query($connection, $sql)) {
    echo "<br>Staff insert successful";
  }
} else {
  echo "error";
}

mysqli_close($connection);

echo "<br><br><a href='users_list.php'>Back to Main Page </a><br/><br/>";

 ?>


</div>
</body>