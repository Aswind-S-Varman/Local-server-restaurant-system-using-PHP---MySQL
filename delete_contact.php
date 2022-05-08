<?php 
session_start();

require("config.php");
?>
<html>
  <head>
    <title>Delete Contact Form</title>
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

      $sql = "DELETE FROM public WHERE id = '$usid'";

      if (mysqli_query($connection, $sql)) {
        goto2("contactform_list.php", "Form Deleted.");
} else {
  goto2("contactform_list.php", "Error ! Try again.");
}

      mysqli_close($connection);

      echo "<br><br><a href='main_page.php'>Back to Main Page </a><br/><br/>";
      ?>
   </div>
  </body>
</html>