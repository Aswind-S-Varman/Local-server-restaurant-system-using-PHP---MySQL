<head>
<title>Updating Starter Details</title>
</head>

<?php
function goto2 ($to,$Message){
	echo "<script language=\"JavaScript\">alert(\"".$Message."\") \n window.location = \"".$to."\"</script>";
}
?>


<body>

<?php

require("config.php");


$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];


$sql = "UPDATE starter SET name = '$name', description = '$description', price = '$price' WHERE id = '$id'";

if (mysqli_query($connection, $sql)) {
  goto2("update_menu.php", "Starter details updated.");
} else {
  goto2("update_menu.php", "Error ! Try again.");
  //echo "<h1>ERROR !</h1>".mysqli_error($connection);
}

mysqli_close($connection);

//echo "<a href='update_menu.php'>Back to Main Page </a><br/><br/>";


?>

</div>
</body>
