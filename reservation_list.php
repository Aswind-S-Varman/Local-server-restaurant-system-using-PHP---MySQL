<?php
session_start();
require("config.php");
if ($_SESSION['Login'] != 'YES')
header("Location: index.php");

if ($_SESSION['LEVEL'] == 3) {
	echo '<script>alert("Forbidden Access.")</script>';
	header("Location: main_page.php");
}

require("config.php");
?>

<html>
<head>
<title>Manage Reservations</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="css/profile1.css" rel="stylesheet" />
<style>

  .table {
			width:100%;
			border:1px solid black;
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

</style>

<head>
<div>
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
            <p class="text-white mt-0 mb-5">This is where you manage the menu and update its content accordingly. </p>
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
                  <h3 class="mb-0">Customer's Reservation</h3>
                </div>
                </div>
            </div>
            <div class="card-body">
              <form>
                
                <?php

					$sql = "SELECT * FROM reservation
					LEFT JOIN customer
					ON customer.id = reservation.userid
					ORDER BY FIELD(status, NULL, 1, 0)";

				   $result = mysqli_query($connection, $sql);

				   if (mysqli_num_rows($result) > 0) { 	?>

				  <!-- Start table tag -->
				  <table class="table" width="1300" border="1" cellspacing="0" cellpadding="15">

				  <!-- Print table heading -->
				  <tr>
					<td align="center"><strong>Reservation ID</strong></td>
					<td align="center"><strong>Full Name</strong></td>
					<td align="center"><strong>User ID</strong></td>
					<td align="center"><strong>Date</strong></td>
					<td align="center"><strong>Time</strong></td>
					<td align="center"><strong>Approval Status</strong></td>
					<td align="center"><strong>Approve Reservation</strong></td>
					<td align="center"><strong>Reject Reservation</strong></td>
					<td align="center"><strong>Delete Reservation</strong></td>
				  </tr>

				  <?php
					// output data of each row
					while($rows = mysqli_fetch_assoc($result)) {
				  ?>
					<tr>
					  <td align="center"><?php echo $rows['reservationId']; ?></td>
					  <td align="center"><?php echo $rows['name']; ?></td>
					  <td align="center"><?php echo $rows['userid']; ?></td>
					  <td align="center"><?php echo $rows['date']; ?></td>
					  <td align="center"><?php echo $rows['time']; ?></td>
					  <?php if (is_null($rows['status'])) { ?>
					  <td align="center">Pending</td>
						  <td align="center"><button class = "main" > <a href="approve.php?id=<?php echo $rows['reservationId'] ?>">Approve</a></button> </td>
						  <td align="center"><button class ="out"> <a href="reject.php?id=<?php echo $rows['reservationId'] ?>">Reject</a></button></td>
						  <td align="center"><button class = "out" > <a href="delete_reservation.php?id=<?php echo $rows['reservationId'] ?>">Delete</a></button> </td>
					  <?php } 
					  else if ($rows['status'] == 1) { ?>
						<td align="center">Approved</td>
					  <?php } else { ?>
						<td align="center">Rejected</td>
					  <?php
					 } ?>

				  </tr>


				  <?php }

				  } else {
					echo "<h3>There are no records to show</h3>";
				  }
					 // mysqli_close($conn);
				   ?>
				
        </table>
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
