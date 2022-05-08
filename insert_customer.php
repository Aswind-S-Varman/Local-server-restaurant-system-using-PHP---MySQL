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
<title>Inserting Customer Details</title>
</head>

<body>
<div class="box">

<?php

  require("config.php");

  $user = $_POST["username"];
  $pass = $_POST["password"];
  $name = $_POST["cust_name"];
  $ic = $_POST["cust_ic"];

  ?>
  <div>
  <?php
  $sql = "INSERT INTO users (username, password, level) VALUES ('$user', '$pass', 3)";
  if (mysqli_query($connection, $sql)) {
    $sql = "SELECT id FROM users WHERE username='$user'";
    $result = mysqli_query($connection, $sql);
    $userid = mysqli_fetch_assoc($result)["id"];

    echo "<h1>User insert successful and USER ID is: " . $userid."</h1>";

    $sql = "INSERT INTO customer (name, ic, userid) VALUES ('$name', '$ic', '$userid')";

    if (mysqli_query($connection, $sql)) {
      echo "<h1>Customer insert successful</h1>";
    }
  } else {
    echo "<h1>Error: " . mysqli_error($connection) . "</h1>";
  }

  mysqli_close($connection);

  echo "<br><br><a href='users_list.php'>Back to Main Page </a><br/><br/>";

  ?>

</div>
</body>