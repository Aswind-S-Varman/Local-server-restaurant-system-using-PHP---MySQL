<?php

require("config.php");

if (!$connection) {
  die("Error, cannot connect to database: " . mysqli_connect_error());
}

$sql = "CREATE TABLE users (
  id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) UNIQUE,
  password VARCHAR(100),
  level INT(3)
)";

if (mysqli_query($connection, $sql)) {
  echo "Table users created <br>";
} else {
  echo "Error creating table: " . mysqli_error($connection) . "<br>";
}

$sql = "CREATE TABLE customer (
  id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150),
  ic VARCHAR(12) UNIQUE,
  userid INT(4) UNSIGNED NOT NULL UNIQUE,
  CONSTRAINT customer_fk FOREIGN KEY (userid) REFERENCES users(id) ON DELETE CASCADE
)";

if (mysqli_query($connection, $sql)) {
  echo "Table customer created <br>";
} else {
  echo "Error creating table: " . mysqli_error($connection) . "<br>";
}

$sql = "CREATE TABLE staff (
  id INT(4) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150),
  staffid VARCHAR(150) UNIQUE,
  userid INT(4) UNSIGNED NOT NULL UNIQUE,
  CONSTRAINT staff_fk FOREIGN KEY (userid) REFERENCES users(id) ON DELETE CASCADE
)";

if (mysqli_query($connection, $sql)) {
  echo "Table staff created <br>";
} else {
  echo "Error creating table: " . mysqli_error($connection) . "<br>";
}

$sql = "CREATE TABLE time (
  time_id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  time_period VARCHAR(150) UNIQUE
)";

if (mysqli_query($connection, $sql)) {
  echo "Table time created <br>";
} else {
  echo "Error creating table: " . mysqli_error($connection) . "<br>";
}

$sql = "CREATE TABLE reservation (
  reservationId INT(4) AUTO_INCREMENT PRIMARY KEY,
  userid INT(4) UNSIGNED NOT NULL,
  date DATE,
  timeid INT(4) UNSIGNED NOT NULL,
  status bit,
  CONSTRAINT reservation_fk_user FOREIGN KEY (userid) REFERENCES customer(id) ON DELETE CASCADE,
  CONSTRAINT reservation_fk_time FOREIGN KEY (timeid) REFERENCES time(time_id) ON DELETE CASCADE
)";

if (mysqli_query($connection, $sql)) {
  echo "Table reservation created <br>";
} else {
  echo "Error creating table: " . mysqli_error($connection) . "<br>";
}

$sql = "CREATE TABLE contactform (
  contactId INT(11) AUTO_INCREMENT PRIMARY KEY,
  userid INT(4) UNSIGNED NOT NULL,
  name VARCHAR(150),
  email VARCHAR(255),
  phone VARCHAR(255),
  message VARCHAR(255),
  CONSTRAINT contact_fk FOREIGN KEY (userid) REFERENCES customer(id) ON DELETE CASCADE,
)";

if (mysqli_query($connection, $sql)) {
  echo "Table contactform created <br>";
} else {
  echo "Error creating table: " . mysqli_error($connection) . "<br>";
}



mysqli_close($connection);

 ?>
