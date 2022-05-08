<?php
session_start();
if ($_SESSION["Login"] != "YES")
header("Location: login.php");
require("config.php");
if ($_SESSION["LEVEL"] == 1){ //only user level 1 can acess
?>
<html>
<head>
<title>Users List</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="css/profile1.css" rel="stylesheet" />
<style>

.table {
	width:100%;
	border:1px solid black;
}


.table1 {
    table-layout: fixed;
	border:1px solid black;
	width: 100%;   
	overflow: auto;	
}

</style>

<head>
<body>
  <div class="main-content" style="background-color:black">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(landing.jpg) ; background-size: cover; background-position: center top;">
      <!-- Mask -->
      
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white" style="text-shadow: 3px">Hello Admin</h1>
            <p class="text-white mt-0 mb-5" style="text-shadow: 3px">This is where you manage the admins and the users. </p>
            </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col order-xl-1">
          <div class="card bg-secondary shadow" style="border-radius:0rem">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Update Menu</h3>
                </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Admin</h6>
                
				<?php
					   require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

					   	$sql = "SELECT *
						 FROM users
						 LEFT JOIN staff
						 ON users.id = staff.userid
						 WHERE users.level = 2
						 ORDER BY staff.name";

						 $staff = mysqli_query($connection, $sql);

						 if (mysqli_num_rows($staff) > 0) { 	?>

						<!-- Start table tag -->
						<table class="table" border="1"width="1200" cellspacing="0" cellpadding="15">

						<!-- Print table heading -->
						<tr class="row1">
						<td align="center"><strong>Name</strong></td>
						<td align="center"><strong>Admin ID</strong></td>
						<td align="center"><strong>Username</strong></td>
						<td align="center"><strong>Password</strong></td>

						<td align="center"><strong>Update</strong></td>
						<td align="center"><strong>Delete</strong></td>

						</tr>

						<?php
							// output data of each row
							while($rows = mysqli_fetch_assoc($staff)) {
						?>
				
					<form action="update_staff_admin.php" method="post">
						<tr>
								<input name="s_id" type="hidden" value="<?php echo $rows['id']; ?>">
                            	<input name="userid" type="hidden" value="<?php echo $rows['userid']; ?>">							
							<td>
								<input type="text" name="name" value="<?php echo $rows['name']; ?>">
							</td>
							<td>
								<input type="text" name="staff_id" value="<?php echo $rows['staffid']; ?>">
							</td>
							<td>
								<input type="text" name="username" value="<?php echo $rows['username']; ?>">
							</td>
							<td>
								<input type="text" name="password" value="<?php echo $rows['password']; ?>">
							</td>

							<?php $get_param = "?id=" . $rows['id'] . "&level=" . $rows['level']; ?>
							<td align="center"><input type="submit" class="button" name="submit" value="Update">  </td>
							<td align="center"> <button class ="del"> <a href="delete_user.php<?php echo $get_param ?>">Delete</a> </td></button>
						</tr>
					</form>

						<?php }

						} else {
							echo "<h3>There are no records to show</h3>";
							}

						 // mysqli_close($conn);
				?>
            </table>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Customers</h6>
                
				<?php

					$sql = "SELECT *
					 FROM users
					 LEFT JOIN customer
					 ON users.id = customer.userid
					 WHERE users.level = 3
					 ORDER BY customer.name";

					 $customers = mysqli_query($connection, $sql);

					 if (mysqli_num_rows($customers) > 0) { 	?>
						<!-- Start table tag -->
						<table class="table1" border="1" cellspacing="0" cellpadding="15">

						<!-- Print table heading -->
						<tr class="row1">
						<td align="center"><strong>Name</strong></td>
						<td align="center"><strong>IC</strong></td>
						<td align="center"><strong>Email</strong></td>
						<td align="center"><strong>Address</strong></td>
						<td align="center"><strong>City</strong></td>
						<td align="center"><strong>Country</strong></td>
						<td align="center"><strong>Postal</strong></td>
						<td align="center"><strong>Username</strong></td>
						<td align="center"><strong>Password</strong></td>

						<td align="center"><strong>Update</strong></td>
						<td align="center"><strong>Delete</strong></td>

						</tr>

						<?php
							// output data of each row
							while($rows = mysqli_fetch_assoc($customers)) {
						?>

				<form action="update_customer_admin.php" method="post">
					<tr>
							<input name="cus_id" type="hidden" value="<?php echo $rows['id']; ?>">
                            <input name="userid" type="hidden" value="<?php echo $rows['userid']; ?>">
                        <td>
							<input size="12" type="text" name="name" value="<?php echo $rows['name']; ?>">
						</td>
						<td>
							<input size="12" type="text" name="cus_ic" value="<?php echo $rows['ic']; ?>">						
						</td>
						<td>
							<input size="13" type="text" name="email" value="<?php echo $rows['email']; ?>">						
						</td>
						<td>
							<input size="13" type="text" name="address" value="<?php echo $rows['address']; ?>">						
						</td>
						<td>
							<input size="12" type="text" name="city" value="<?php echo $rows['city']; ?>">					
						</td>
						<td>
							<input size="12" type="text" name="country" value="<?php echo $rows['country']; ?>">				
						</td>
						<td>
							<input size="12" type="text" name="postal" value="<?php echo $rows['postal']; ?>">					
						</td>
						<td>
							<input size="12" type="text" name="username" value="<?php echo $rows['username']; ?>">							
						</td>
						<td>
							<input size="12" type="text" name="password" value="<?php echo $rows['password']; ?>">
						</td>

						<?php $get_param = "?id=" . $rows['id'] . "&level=" . $rows['level']; ?>
						<td align="center"><input type="submit" class="button" name="submit" value="Update">  </td>
						<td align="center"> <button class ="del"><a href="delete_user.php<?php echo $get_param ?>">Delete</a> </td>
					</tr>
				</form>
					<?php }

					} else {
						echo "<h3>There are no records to show</h3>";
						}

					 // mysqli_close($conn);
				?>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer" style="background-color:black">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
     
        </div>
      </div>
    </div>
  </footer>
</body>
	</html>


<?php
// If the user is not correct level
} else if ($_SESSION["LEVEL"] != 3) {

  echo "<p>Wrong User Level! You are not authorized to view this page</p>";

  echo "<p><a href='main_page.php'>Back to main page</a></p>";
    }

  ?>

