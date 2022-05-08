<?php
session_start();


require("config.php");
?>
<html>
<head>
    <title>Delete Pizza record</title>
</head>

<?php
function goto2 ($to,$Message){
	echo "<script language=\"JavaScript\">alert(\"".$Message."\") \n window.location = \"".$to."\"</script>";
}
?>

  <body>
      <?php
      require("config.php");

      $usid = $_GET['id'];

      $sql = "DELETE FROM pizza WHERE id = '$usid'";

      if (mysqli_query($connection, $sql)) {
        goto2("update_menu.php", "Pizza details deleted.");
} else {
  goto2("update_menu.php", "Error ! Try again.");
}

      mysqli_close($connection);

      echo "<br><br><a href='update_menu.php'>Back to Main Page </a><br/><br/>";
      ?>
  </body>
</html>