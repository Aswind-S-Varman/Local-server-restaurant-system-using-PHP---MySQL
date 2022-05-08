<?php
session_start();
require("config.php");
?>

<html>
<head>
    
	<link href="css/bootstrap.css" rel="stylesheet" />
		<link href="css/coming-sssoon.css" rel="stylesheet" />    
		<!--     Fonts     -->
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
		<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
	
	
	
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <title>Admin Dashboard</title>
	
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/coming-sssoon.css" rel="stylesheet" />
    

<style>

.bar {
  font-family: "Amatic SC", sans-serif;
  font-size: 40px;
}

.wrapper {
  font-family: "Amatic SC", sans-serif;
  width: 40%;
  max-height: 100%;
  padding: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: black;
  text-align: center;
  box-shadow: 1px 1px 22px 0px rgba(0,0,0,0.67);
  color: white;
  font-size: 20px;
}

.button
{
  border:0;
  background:white;
  display: block;
  margin: 15px auto;
  text-align: center;
  font-size: 20px;
  font-weight: bold;
  padding-top: 25px;
  padding-left: 10px;
  padding-right: 10px;
  outline: none;
  color: white;
  transition: 0.25s;
  cursor: pointer;
  width: 350px;
}

.button:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    transition: 0.5s;
    background-color: white;
}


h1 {
    font-size: 350px;
}

.login {
  float: right;
  padding: 5px;
}
  
.bar {
  font-family: "Amatic SC", sans-serif;
}

</style>
</head>
<div class = "main" style = "background-image:  url('landing.jpg')">
<body>
<div class="bar">
<div class="w3-top w3-hide-small">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="#" class="w3-bar-item w3-button">HOME</a>
    <a href="landing.php#menu" class="w3-bar-item w3-button">MENU</a>
    <a href="landing.php#about" class="w3-bar-item w3-button">ABOUT</a>
    <a href="landing.php#myMap" class="w3-bar-item w3-button">CONTACT</a>
    <a href="logout.php"><button class="login" class="w3-bar-item w3-button"  style="color:red;">LOG OUT</a></button>

  </div>
</div>
</div>
  
<div class = "wrapper">
    <h1 class = "bar">Admin Dashboard</h1> <br><br>
    <div class="content">
    <?php
        if ($_SESSION['LEVEL'] != 3 && $_SESSION['LEVEL'] != 2) {
        ?>
        <div class="button">
            <a href="users_list.php" style="color:black;">Click here to view all
				<?php echo $_SESSION['LEVEL']==1 ? 'users' : 'users'; ?>
            </a> <br><br>
            </div>
            <div class="button">
            <a href="update_menu.php" style="color:black;">Manage Menu</a> <br/><br/>
            </div>
            <div class="button">
            <a href="contactform_list.php" style="color:black;">Manage Contact Forms</a> <br/><br/>
            </div>
            <div class="button">
            <a href="reservation_list.php" style="color:black;">Manage Reservations</a> <br/><br/>
            </div>
        <?php
        }
        ?>

		<br><br><br>
	</div>
</div>

    <br>

    </form>


</div>
</body>

<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</html>

<?php mysqli_close($connection); ?>