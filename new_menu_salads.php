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

    <title>Create New Pizza Menu</title>
	
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/coming-sssoon.css" rel="stylesheet" />
    

<style>

	.bar {
	  font-family: "Amatic SC", sans-serif;
	  font-size: 40px;
	}

	.wrapper {
	  font-family: "Amatic SC", sans-serif;
	  width: 30%;
	  max-height: 90%;
	  padding: 5px;
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  transform: translate(-50%,-50%);
	  background: black;
	  text-align: center;
	  box-shadow: 1px 1px 22px 0px rgba(0,0,0,0.67);
	  color: white;
	  font-size: 30px;
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
	  padding-top: 10px;
	  padding-left: 10px;
	  padding-right: 10px;
	  outline: none;
	  color: white;
	  transition: 0.25s;
	  cursor: pointer;
	  width: 300px;
	}

	.button:hover {
		box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
		transition: 0.5s;
		background-color: white;
	}

	.button1 {
		width: 150px;
		background: white;
		font-weight: bold;
		color: white;
		border: 2px solid black;
		cursor: pointer;
		padding: 10px 5px;
		text-align: center;
	}

	.button1:hover {
		background-color: red;
	}

	h1 {
		font-size: 350px;
	}


</style>
</head>
<div class = "main" style = "background-image:  url('landing.jpg')">
<body>
<div class = "wrapper">
	<br>
    <h1 class = "bar">Create New Salads Menu</h1>
    <div class="content">
        
        <form action="insert_salads.php" method="POST">
		<table id="formTable" class="wrapper" border="0">
        <tr>
          <td>Name: <br></td>
          <td><input type="text" name="name"></td>
        </tr>

        <tr>
          <td>Description: </td>
          <td><input type="text" name="description"></td>
        </tr>

        <tr>
          <td>Price ($): </td>
          <td><input type="text" name="price"></td>
        </tr>

		</table>
		<br><br><br><br><br><br><br><br>
		<input type="submit"  name="submitButton">
    </form>
		
        
       
		</div>
</div>

   

    </form>


</div>
</body>

<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</html>

<?php mysqli_close($connection); ?>