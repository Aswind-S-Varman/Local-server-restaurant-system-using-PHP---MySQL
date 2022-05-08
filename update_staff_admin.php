<head>
<title>Updating Staff Details</title>
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

$usid = $_POST['userid'];
$staff_id = $_POST['s_id'];
$user = $_POST["username"];
$pass = $_POST["password"];
$name = $_POST["name"];
$staf = $_POST["staff_id"];

$sql = "UPDATE users SET username = '$user', password = '$pass' WHERE id = '$usid'";

$sql = "UPDATE staff SET name = '$name', staffid = '$staf' WHERE id = '$staff_id'";

if (mysqli_query($connection, $sql)) {
  goto2("users_list.php", "Admin details updated.");
} else {
  echo "<h1>Error: " . mysqli_error($connection) . "</h1>";}

mysqli_close($connection);

echo "<a href='main_page.php'>Back to Main Page </a><br/><br/>";


?>

</div>
</body>