<head>
<title>Reservation Confirmation</title>
</head>

<?php
function goto2 ($to,$Message){
	echo "<script language=\"JavaScript\">alert(\"".$Message."\") \n window.location = \"".$to."\"</script>";
}
?>

<body>
<div class="box">

<?php

require("config.php");

$customer_id = $_POST["cus_id"];
$name = $_POST["fname"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$date = $_POST["date"];
$time= $_POST["time"];
$guest = $_POST["number"];
$comments = $_POST["comments"];


$sql = "INSERT INTO reservation (userid, name, date, time, email, number, guests, request)
VALUES ('$customer_id', '$name', '$date', '$time', '$email', '$tel', '$guest', '$comments')";

if (mysqli_query($connection, $sql)) {
  goto2("landing1.php", "Reservation Added.");
} else {
  goto2("landing1.php", "Error ! Try again.");
}

mysqli_close($connection);

  echo "<br><br><a href='landing1.php'>Back to Main Page </a><br/><br/>";

 ?>

</div>
</body>