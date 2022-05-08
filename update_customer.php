<head>
<style>
  
<?php
function goto2 ($to,$Message){
	echo "<script language=\"JavaScript\">alert(\"".$Message."\") \n window.location = \"".$to."\"</script>";
}
?>

</style>
<title>Updating Customer Details</title>
</head>

<body>
<div class="box">

<?php

require("config.php");

$usid = $_POST['userid'];
$cus_id = $_POST['cus_id'];
$user = $_POST["username"];
$pass = $_POST["password"];
$name = $_POST["name"];
$stic = $_POST["cus_ic"];
$email = $_POST["email"];
$address = $_POST["address"];
$city = $_POST["city"];
$country = $_POST["country"];
$postal = $_POST["postal"];


$sql = "UPDATE users SET username = '$user', password = '$pass' WHERE id = '$usid'";

$sql = "UPDATE customer SET name = '$name', ic = '$stic', email = '$email', address = '$address', city = '$city', country = '$country', postal = '$postal'
WHERE id = '$cus_id'";

if (mysqli_query($connection, $sql)) {
  goto2("landing1.php", "Customer details updated.");
} else {
  echo "ERROR! :" . mysqli_error($connection);
}

mysqli_close($connection);

//echo "<a href='landing1.php'>Back to Main Page </a><br/><br/>";

?>


</div>
</body>