<?php
session_start();
require("config.php");
if ($_SESSION["Login"] != "YES")
header("Location: login.php");
require("config.php");
?>

<html>
<head>
  <title>Manage Contact Forms</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="css/profile1.css" rel="stylesheet" />
<style>
	.table {
			width:100%;
			border:1px solid black;
		}
</style>
</head>

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
            <h1 class="display-2 text-white">Hello Admin</h1>
            <p class="text-white mt-0 mb-5">This is where you manage submitted contact forms and view its content accordingly. </p>
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
                  <h3 class="mb-0">Contact Form Details</h3>
                </div>
                </div>
            </div>
            <div class="card-body">
              <form>
                
                <?php

						$sql = "SELECT * FROM public
						ORDER BY public.id";

						$contact = mysqli_query($connection, $sql);

						if (mysqli_num_rows($contact) > 0) { 	?>

							<!-- Start table tag -->
							<table class="table" border="1"width="1200" border="1" cellspacing="0" cellpadding="15">

							<!-- Print table heading -->
							<tr class="row1">
							<td align="center"><strong>ID</strong></td>
							<td align="center"><strong>Name</strong></td>
							<td align="center"><strong>Phone</strong></td>
							<td align="center"><strong>Email</strong></td>
							<td align="center"><strong>DateTime</strong></td>
							<td align="center"><strong>Message</strong></td>
							<td align="center"><strong>Delete</strong></td>
							</tr>

							<?php
								// output data of each row
								while($rows = mysqli_fetch_assoc($contact)) {
							?>
							 <tr>
									<td align="center"><?php echo $rows['id']; ?></td>
									<td align="center"><?php echo $rows['name']; ?></td>
							  <td align="center"><?php echo $rows['number']; ?></td>
									<td align="center"><?php echo $rows['email']; ?></td>
							  <td align="center"><?php echo $rows['datetime']; ?></td>
							  <td align="center"><?php echo $rows['message']; ?></td>
									<?php $get_param = "?id=" . $rows['id']; ?>
									<td align="center"> <button class ="del"><a href="delete_contact.php<?php echo $get_param ?>">Delete</a> </td>
							</tr>

					<?php }
						
					}
					else 
					{
						echo "<h3>There are no records to show</h3>";
					}
					?>
					</table><br>
					</div>
					</body>
					</html>


					<?php
				?>
				
              </form>
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
if ($_SESSION["LEVEL"] != 1 && $_SESSION["LEVEL"] != 2) {

  echo "<p>Wrong User Level! You are not authorized to view this page</p>";

  echo "<p><a href='main_page.php'>Back to main page</a></p>";
}


  ?>


