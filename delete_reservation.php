<?php
session_start();

if ($_SESSION['Login'] != 'YES')
header("Location: index.php");

require("config.php");
?>
<html>

<head>
 <title>Delete Reservation</title>
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

      $usid = $_GET['id'];

      $sql = "DELETE FROM reservation WHERE reservationId = '$usid'";

      if (mysqli_query($connection, $sql)) {
        goto2("reservation_list.php", "Reservation Deleted.");
} else {
  goto2("reservation_list.php", "Error ! Try again.");
}


      mysqli_close($connection);

      echo "<br><br><a href='main_page.php'>Back to Main Page </a><br/><br/>";
      ?>
   </div>
  </body>
</html>
