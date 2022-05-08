<html>
	<head><title>Updating User Data</title><head>
    <body>

<h1>Update User Data Form</h1>
<div>

<style>

  body {
    background-image: url("images/food11.jpg");
    font-family: 'Roboto', sans-serif;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    color:white;
    font-size: 100%;
  }

  div {
       width: 500px;
		   margin: 40px auto;
		   box-shadow: 1px 1px 22px 0px rgba(0,0,0,0.67);
		   padding: 50px;
		   border-radius: 10px;
       background-color:#222230;
	   }

  .out {
    background-color: #33BBFF;
    border-radius:15px;
    padding: 8px;
    margin: auto;
    display: block;
  }

  .out:hover {
    background-color: red;
  }

  .main { 
    background-color: #33BBFF ;
    border-radius:15px;
    padding: 8px;
    margin: auto;
    display: block;
  }
  
  .main:hover {
    background-color: yellow;
  }

  h1 {
    text-align:center; 
    text-shadow: 2px 2px 20px  #db6d18, #fff 0 -1px 2px;
  }

  a {
    color: black;
    font-size:25px;
  }
  
	.box
	{
		text-align: center;
	}	

  .button {
	width: 125px;
  height: 50px;
  font-size: larger;
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

</style>

<?php
     $ID = $_GET['id'];

     require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

     if ($_GET['level'] == 2) {
         $sql = "SELECT staff.id, staff.name, staff.staffid, users.username, users.password
         FROM users
         LEFT JOIN staff
         ON users.id = staff.userid
         WHERE users.id = '$ID'";

         $result = mysqli_query($connection, $sql);
         $rows=mysqli_fetch_assoc($result);
         ?>

         <form class="box" action="update_staff.php" method="post">
                 <table>
                     <tr>
                         <td>Name: </td>
                        <td>
                            <input name="s_id" type="hidden" value="<?php echo $rows['id']; ?>">
                            <input name="userid" type="hidden" value="<?php echo $ID; ?>">
                            <input type="text" name="name" value="<?php echo $rows['name']; ?>">
                        </td>
                     </tr>
                    <tr>
                         <td>Staff ID: </td>
                        <td> <input type="text" name="staff_id" value="<?php echo $rows['staffid']; ?>"> </td>
                     </tr>
                    <tr>
                         <td>Username: </td>
                        <td> <input type="text" name="username" value="<?php echo $rows['username']; ?>"> </td>
                     </tr>
                    <tr>
                         <td>Password: </td>
                        <td> <input type="text" name="password" value="<?php echo $rows['password']; ?>"> </td>
                     </tr>
                    <tr>
                        <td colspan="2"> <input type="submit" class="button" name="submit" value="Update"> </td>
                    </tr>
                 </table>
         </form>

<?php
     } else if ($_GET['level'] == 3) {
         $sql = "SELECT customer.id, customer.name, customer.ic, users.username, users.password
         FROM users
         LEFT JOIN customer
         ON users.id = customer.userid
         WHERE users.id = '$ID'";

         $result = mysqli_query($connection, $sql);
         $rows=mysqli_fetch_assoc($result);
         ?>

         <form class="box" action="update_customer.php" method="post">
                 <table>
                     <tr>
                         <td>Name: </td>
                        <td>
                            <input name="cus_id" type="hidden" value="<?php echo $rows['id']; ?>">
                            <input name="userid" type="hidden" value="<?php echo $ID; ?>">
                            <input type="text" name="name" value="<?php echo $rows['name']; ?>">
                        </td>
                     </tr>
                    <tr>
                         <td>IC Number: </td>
                        <td> <input type="text" name="cus_ic" value="<?php echo $rows['ic']; ?>"> </td>
                     </tr>
                    <tr>
                         <td>Username: </td>
                        <td> <input type="text" name="username" value="<?php echo $rows['username']; ?>"> </td>
                     </tr>
                    <tr>
                         <td>Password: </td>
                        <td> <input type="text" name="password" value="<?php echo $rows['password']; ?>"> </td>
                     </tr>
                    <tr> <br>
                        <td colspan="2"> <input type="submit" class="button" name="submit" value="Update"> </td>
                    </tr>
                 </table>
         </form>

<?php
     } else {

     }
?>
</div>
</body>
</html>

