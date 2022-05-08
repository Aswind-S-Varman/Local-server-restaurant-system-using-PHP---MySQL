<?php
session_start();

if ($_SESSION['Login'] != 'YES')
header("Location: index.php");

require("config.php");
?>

<html>
	<head><title>Updating User Data</title><head>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="css/profile.css" rel="stylesheet" />

<style>

</style>

<body>
  <?php
              require ("config.php"); 
              $ID = $_GET['id'];
              
              $sql = "SELECT *
              FROM users
              LEFT JOIN customer
              ON users.id = customer.userid
              WHERE users.id = '$ID'";

              $result = mysqli_query($connection, $sql);
              $rows=mysqli_fetch_assoc($result);
  ?>
  <div class="main-content" style="background-color:black">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <!-- Form -->
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <div class="media-body ml-2 d-none d-lg-block">
                </div>
              </div>
            </a>
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
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(landing.jpg); background-size: cover; background-position: center top; background-attachment: fixed;">
      <!-- Mask -->
      
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white" style="text-shadow: 10px">Hello <?php echo $rows['username']; ?></h1>
            <p class="text-white mt-0 mb-5" style="text-shadow: 10px">This is your profile page. You can see the all your details and your reservations with us.</p>
            </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow" style="border-radius:0rem">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="https://moonvillageassociation.org/wp-content/uploads/2018/06/default-profile-picture1.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                <?php echo $rows['name']; ?>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $rows['city'] ?> , <?php echo $rows['country']; ?>
                </div>
                  
                </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow" style="border-radius:0rem">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
               
              </div>
            </div>


            <div class="card-body">
            <?php
              require ("config.php"); 
              $ID = $_GET['id'];
              
              $sql = "SELECT *
              FROM users
              LEFT JOIN customer
              ON users.id = customer.userid
              WHERE users.id = '$ID'";

              $result = mysqli_query($connection, $sql);
              $rows=mysqli_fetch_assoc($result);
            ?>

              <form action="update_customer.php" method="post">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                       <input name="cus_id" type="hidden" value="<?php echo $rows['id']; ?>">
                       <input name="userid" type="hidden" value="<?php echo $ID; ?>">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" name ="username" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="<?php echo $rows['username']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Password</label>
                        <input type="text"  name ="password" id="input-password" class="form-control form-control-alternative" placeholder="Password" value="<?php echo $rows['password']; ?>">
                      </div>
                    </div>
          
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email"  name ="email" id="input-email" class="form-control form-control-alternative" placeholder="Email" value="<?php echo $rows['email']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Full name</label>
                        <input type="text" id="input-first-name" name = "name" class="form-control form-control-alternative" placeholder="Full name" value="<?php echo $rows['name']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">IC</label>
                        <input type="text" id="input-last-name" name = "cus_ic" class="form-control form-control-alternative" placeholder="IC" value="<?php echo $rows['ic']; ?>">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" name = "address"  type="text" class="form-control form-control-alternative" placeholder="Address" value="<?php echo $rows['address']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city"  name = "city" class="form-control form-control-alternative" placeholder="City" value="<?php echo $rows['city']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country"  name = "country" class="form-control form-control-alternative" placeholder="Country" value="<?php echo $rows['country']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="number" id="input-postal-code"  name = "postal" class="form-control form-control-alternative" placeholder="Postal Code" value="<?php echo $rows['postal']; ?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-5 text-right">
                      <input type ="submit" value = "Save Changes" class="btn btn-sm btn-primary">
                </div>
              </form>
               <hr class="my-4">
                     <!-- Description -->
				            <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Reservation Status</label><br>
                           <h2>List of Applications</h2><br>
                              <?php

                              $user_id = $_SESSION["ID"];
                              $sql = "SELECT * FROM reservation
                                INNER JOIN customer
                                ON reservation.userid = customer.id
                                INNER JOIN users
                                ON users.id = customer.userid
                                WHERE users.id = '$user_id'
                                ORDER BY FIELD(status, NULL, 1, 0)";

                              $result = mysqli_query($connection, $sql);

                              if (mysqli_num_rows($result) > 0) { 	?>

                              <!-- Start table tag -->
                              <table width="1100" border="1" cellspacing="0" cellpadding="3">

                              <!-- Print table heading -->
                              <tr>
                                <td align="center"><strong>Date</strong></td>
                                <td align="center"><strong>Requested time</strong></td>
                                <td align="center"><strong>Approval Status</strong></td>  
                              </tr>

                              <?php
                                // output data of each row
                                while($rows = mysqli_fetch_assoc($result)) {
                              ?>
                                <tr>
                                  <td align="center"><?php echo $rows['date']; ?></td>
                                  <td align="center"><?php echo $rows['time']; ?></td>
                                  <?php if (is_null($rows['status'])) { ?>
                                    <td align="center">Pending</td>
                                  <?php } else if ($rows['status'] == 1) { ?>
                                    <td align="center">Approved</td>
                                  <?php } else { ?>
                                    <td align="center">Rejected</td>
                                  <?php } ?>
                              </tr>

                              <?php }

                              } else {
                                echo "<p>You haven't submitted any applications yet.</p>";
                              }
                              ?>

                            </table>
                      </div>
                    </div>
                    <form action="reservation_form.php" method="post">
                    <div class="col-5 text-right">
                      <input type ="submit" value = "Submit New Application" class="btn btn-sm btn-primary">
                </div>
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
      </div>
    </div>
  </footer>
</body>
</html>