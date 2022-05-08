<head><style>

<?php
function goto2 ($to,$Message){
	echo "<script language=\"JavaScript\">alert(\"".$Message."\") \n window.location = \"".$to."\"</script>";
}
?>

body {
    background: url('img/restaurant.jpg');
}

.wrapper {
	background: url(img/food2.jpg);
	border: 0 none;
	border-radius: 3px;
	box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
	box-sizing: border-box;
	width: 30%;
	height: 40%;
	background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
	position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%);
    text-align:center;
}


.button {
	width: 100px;
	background-color: #b3b3b3;
	font-weight: bold;
	color: black;
	border: 1px solid black;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;

}

.button:hover {
	background: #25bf0d;
	color: white;
}

.button1 {
	width: 150px;
	background: #b3b3b3;
	font-weight: bold;
	color: black;
	border: 1px solid black;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
}

.button1:hover {
	background: red;
	color: white;
}

</style></head>

<body>
    <div class="wrapper">
    <br><br><br><br>

<?php
session_start();

require('config.php');

$myusername=$_POST["username"];
$mypassword=$_POST["password"];

$sql="SELECT * FROM users WHERE username='$myusername' and password='$mypassword'";

$result = mysqli_query($connection, $sql);

$rows=mysqli_fetch_assoc($result);

$user_name=$rows["username"];
$user_id=$rows["id"];
$user_level=$rows["level"];

$count=mysqli_num_rows($result);

if($count==1){

$_SESSION["Login"] = "YES";
$_SESSION["WRONGPASS"] = 'NO';
$_SESSION["USER"] = $user_name;
$_SESSION["ID"] = $user_id;
$_SESSION["LEVEL"] = $user_level;

if ($_SESSION['LEVEL'] == 3) {
    header('Location:landing1.php');
}

if ($_SESSION['LEVEL'] == 2) {
    echo "<h2> WELCOME ".$_SESSION["USER"]." !! </h2>";
    echo "You are now logged in with access level ".$_SESSION["LEVEL"]."";
	echo "<br>(Staff)";
}

if ($_SESSION['LEVEL'] == 1) {
    header('Location:main_page.php');
}
?>

<br><br><br>

<form action="main_page.php">
<input type="submit" class="button" value="Enter Site">
</form>

<form action="index.php">
<input type="submit" class="button1" value="Back to Login Page">
</form>
</div>
</div>
</body>

<?php
} else {

$_SESSION["Login"] = "NO";
$_SESSION['WRONGPASS'] = 'YES';
goto2("index.php", "Login Fail");
exit;
}

mysqli_close($connection);

?>
