<head>
<title>Reservation Approval</title>
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

$reservation_id = $_GET["id"];

$sql = "UPDATE reservation
  SET status = 1
  WHERE reservationId = '$reservation_id'";

if (mysqli_query($connection, $sql)) {
  goto2("reservation_list.php", "Reservation Approved.");
} else {
  goto2("reservation_list.php", "Error ! Try again.");
}

mysqli_close($connection);

echo "<br><br><a href='main_page.php'>Back to Main Page </a><br/><br/>";


 ?>

</div>
</body>