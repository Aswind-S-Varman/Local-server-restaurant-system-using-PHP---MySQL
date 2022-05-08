<head>
<style>
  body
{
  background: url(images/foodback.jpg);
	height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.box
{
  border-radius: 15px;
  width: 500px;
  padding: 10px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: #222230;
  text-align: center;
  box-shadow: 1px 1px 22px 0px rgba(0,0,0,0.67);
  color: white;
  font-family: 'Roboto', sans-serif;
  font-size: 30px;
}


</style>
<title>Contact Form Submission</title>
</head>

<body>
<div class="box">

<?php

require("config.php");
$customer_id = $_POST["cus_id"];
$name = $_POST["cus_name"];
$email  = $_POST["cus_email"];
$phone  = $_POST["cus_phone"];
$message  = $_POST["cus_message"];


$sql = "INSERT INTO contactform (userid, name, email, phone, message) VALUES ('$customer_id','$name', '$email', '$phone', '$message')";

if (mysqli_query($connection, $sql)) {
  echo "<br>Form submitted";
} else {
  echo "An error occurred: " . mysqli_error($connection);
}

mysqli_close($connection);

    echo "<br><br><a href='main_page.php'>Back to Main Page </a><br/><br/>";

 ?>

</div>
</body>