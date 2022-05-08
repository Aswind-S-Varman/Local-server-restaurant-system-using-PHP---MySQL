<?php
session_start();

if ($_SESSION['Login'] != 'YES')
header("Location: index.php");

if ($_SESSION['LEVEL'] != 1) {
	echo '<script>alert("Forbidden Access.")</script>';
	header("Location: main.php");
}

require("config.php");
?>

<!DOCTYPE html>

<style>

  body {
    background-image: url(images/food11.jpg);
    font-family: 'Roboto', sans-serif;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    color:white;
    font-size: 100%;
  }

  html,body {
    height:100%;
}

  div {
       width: 500px;
		   margin: 40px auto;
		   box-shadow: 1px 1px 22px 0px rgba(0,0,0,0.67);
		   padding: 50px;
		   border-radius: 10px;
       background-color:#222230;
	   }

 .box
{
  border-radius: 15px;
  width: 500px;
  padding: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: #222230;
  text-align: center;
  box-shadow: 1px 1px 22px 0px rgba(0,0,0,0.67);
  color: white;
  font-size: large;
}

h1 {
	font-size: 35px;
	text-shadow: 2px 2px 20px  #db6d18, #fff 0 -1px 2px;
}

.space {
  border-collapse:separate;
  border-spacing:0 15px;
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

<html>
  <head>
    <title>Create New Account</title>
    <script type="text/javascript">

      var previous = document;
      function changed() {
        if (document.userForm.usertype.value == previous) {
          return false;
        } else {
          var previous = document.userForm.usertype.value;
          return true;
        }
      }

      function addCustomerTable() {
        var table = document.getElementById('formTable');

        var row1 = table.insertRow(3);
        var row2 = table.insertRow(4);

        var name_cell = row1.insertCell(0);
        var name_input = row1.insertCell(1);
        var ic_cell = row2.insertCell(0);
        var ic_input = row2.insertCell(1);


        name_cell.innerHTML = 'Name: ';
        name_input.innerHTML = '<input type="text" name="cust_name">';
        ic_cell.innerHTML = 'IC number: ';
        ic_input.innerHTML = '<input type="text" name="cust_ic">';

      }

      function addStaffTable() {
        var table = document.getElementById('formTable');

        var row1 = table.insertRow(3);
        var row2 = table.insertRow(4);

        var name_cell = row1.insertCell(0);
        var name_input = row1.insertCell(1);
        var id_cell = row2.insertCell(0);
        var id_input = row2.insertCell(1);

        name_cell.innerHTML = 'Name: ';
        name_input.innerHTML = '<input type="text" name="staff_name">';
        id_cell.innerHTML = 'Admin ID: ';
        id_input.innerHTML = '<input type="text" name="staffid">';
      }

      function userType() {
        var type = document.userForm.usertype.value;

        var table = document.getElementById('formTable');
        var rows = table.rows.length;

        if (changed()) {
          for (let i=rows; i>3; i--) {
            table.deleteRow(3);
          }

          if (type == 'admin') {
            document.userForm.action = "insert_admin.php";
          } else if (type == 'customer') {
            addCustomerTable();
            document.userForm.action = "insert_customer.php";
          } else if (type == 'staff') {
            addStaffTable();
            document.userForm.action = "insert_staff.php";
          }
        }
      }
    </script>

  </head>
  <body>
  <div class="box">
    <form class="form" name='userForm' action="" method="POST">
      <h1>ADD NEW USER</h1>
			<table id="formTable" class="space" border="0">
        <tr>
          <td>Username: <br></td>
          <td><input type="text" name="username"></td>
        </tr>

        <tr>
          <td>Password: </td>
          <td><input type="text" name="password"></td>
        </tr>

        <tr>
          <td>User type: </td>
          <td onclick="userType()">
            <!--<input type="radio" name="usertype" value="admin">Admin-->
            <input type="radio" name="usertype" value="customer">Customer
            <input type="radio" name="usertype" value="staff">Admin
          </td>
        </tr>
      </table>
      <br><br>
      <input type="submit" class="button" name="submitButton">
    </form>
  </div>
  </body>
</html>

<?php


 ?>
