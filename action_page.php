<head>
<title>Contact Form Submission</title>
</head>

<?php
function goto2 ($to,$Message){
	echo "<script language=\"JavaScript\">alert(\"".$Message."\") \n window.location = \"".$to."\"</script>";
}
?>

<body>
<div class="box">

<?php

session_start();

require("config.php");
$name = $_POST["Name"];
$number  = $_POST["Number"];
$email  = $_POST["Email"];
$datetime  = $_POST["date"];
$message  = $_POST["Message"];


$sql = "INSERT INTO public (name, email,number, datetime, message) VALUES ('$name', '$email','$number', '$datetime','$message')";

if (mysqli_query($connection, $sql)) {
  goto2("landing1.php", "Form Submitted.");
} else {
  goto2("landing1.php", "Error ! Try again.");
}

mysqli_close($connection);

    echo "<br><br><a href='landing1.php'>Back to Main Page </a><br/><br/>";

 ?>

</div>
</body>