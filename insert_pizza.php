<head>
<title>Inserting Pizza Details</title>
</head>

<?php
function goto2 ($to,$Message){
	echo "<script language=\"JavaScript\">alert(\"".$Message."\") \n window.location = \"".$to."\"</script>";
}
?>

<body>

<?php

  require("config.php");

  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  ?>
  <div>
  <?php
  $sql = "INSERT INTO pizza (name, description, price) VALUES ('$name', '$description','$price')";

 if (mysqli_query($connection, $sql)) {
  goto2("update_menu.php", "Pizza details updated.");
} else {
  goto2("update_menu.php", "Error ! Try again.");
}

  mysqli_close($connection);

  echo "<br><br><a href='update_menu.php'>Back to Main Page </a><br/><br/>";

  ?>

</div>
</body>