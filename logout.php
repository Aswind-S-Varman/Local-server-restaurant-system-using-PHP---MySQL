<?php
session_start(); 

function goto2 ($to,$Message){
	echo "<script language=\"JavaScript\">alert(\"".$Message."\") \n window.location = \"".$to."\"</script>";
}


// if the user is logged in, unset the session 
if (isset($_SESSION['USER'])) { 
	unset($_SESSION['USER']); 
} 
session_destroy(); //destroy the session


// go to login page 
goto2("landing.php", "Logout Successful");
exit; 
?> 