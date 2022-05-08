<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

$connection = mysqli_connect($db_host, $db_user, $db_pass);

if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE test_database";


if (mysqli_query($connection, $sql)) {
  echo "Database test_database created<br>";
} else {
  echo "Error creating database: " . mysqli_error($connection);
}


mysqli_close($connection);

 ?>
 