<?php
session_start();


require("config.php");
?>
<html>
<head>
    <title>Delete Salads record</title>
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

      $sql = "DELETE FROM salads WHERE id = '$usid'";

      if (mysqli_query($connection, $sql)) {
        goto2("update_menu.php", "Salad details deleted.");
} else {
  goto2("update_menu.php", "Error ! Try again.");
}


      mysqli_close($connection);

      echo "<br><br><a href='update_menu.php'>Back to Main Page </a><br/><br/>";
      ?>
  </body>
</html>