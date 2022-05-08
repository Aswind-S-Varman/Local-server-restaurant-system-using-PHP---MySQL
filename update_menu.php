<?php
session_start();

require("config.php");
?>
<html>
<head>
<title>Manage Menu</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="css/profile1.css" rel="stylesheet" />
<style>
		.table {
			width:100%;
      border-collapse: collapse;
			border: 5px solid black;
		}

    th {
  background-color: #04AA6D;
  color: white;
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
            <h1 class="display-2 text-white" style="text-shadow: 10px">Hello Admin</h1>
            <p class="text-white mt-0 mb-5" style="text-shadow: 10px">This is where you manage the menu and update its content accordingly. </p>
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
              <form>
                <h6 class="heading-small text-muted mb-4">Pizza</h6>
                
				<?php
					$sql = "SELECT * FROM pizza ORDER BY id" ;
					$pizza =  mysqli_query($connection, $sql);

				   if (mysqli_num_rows($pizza) > 0) { 	?>
					<!-- Start table tag -->
					<table class="table" border="1"width="1200" border="1" cellspacing="2" cellpadding="15">

					<!-- Print table heading -->
					<tr class="row1">
					<td align="center"><strong>Name</strong></td>
					<td align="center"><strong>Description</strong></td>
					<td align="center"><strong>Price</strong></td>
					<td align="center"><strong>Update</strong></td>
					<td align="center"><strong>Delete</strong></td>
					</tr>

					<?php
					  // output data of each row
					  while($rows = mysqli_fetch_assoc($pizza)) {
					?>
					
						<form action="update_pizza.php" method="post">
									 <tr>
										<input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
										<td>
											<input type="text" name="name" value="<?php echo $rows['name']; ?>">
										</td>
										<td> 
											<input type="text" name="description" size = "60" value="<?php echo $rows['description']; ?>"> 
										</td>
										<td> <input type="text" name="price" value="<?php echo $rows['price']; ?>"> 
										</td>

										<td colspan="1"> <input type="submit" class="button" name="submit" value="Update"> 
										</td>
										<?php $get_param = "?id=" . $rows['id'] ?>
										<td align="center"> <a href="delete_pizza.php<?php echo $get_param ?>">Delete</a> </td>
									</tr>
						 </form>

						 <?php }
						}
						else 
						{
							echo "<h3>There are no records to show</h3>";
						}   ?>
					  </table>
					  <br><br>
					  <a href="new_menu_pizza.php">Click here to add new pizza record</a> <br><br>
				
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Salads</h6>
                
				<?php
					$sql = "SELECT * FROM salads ORDER BY id" ;
					$salads =  mysqli_query($connection, $sql);

				   if (mysqli_num_rows($salads) > 0) { 	?>
					<!-- Start table tag -->
						<table class="table" border="1"width="1200" border="1" cellspacing="2" cellpadding="15">

					<!-- Print table heading -->
					<tr class="row1">
					<td align="center"><strong>Name</strong></td>
					<td align="center"><strong>Description</strong></td>
					<td align="center"><strong>Price</strong></td>
					<td align="center"><strong>Update</strong></td>
					<td align="center"><strong>Delete</strong></td>
					</tr>

					<?php
					  // output data of each row
					  while($rows = mysqli_fetch_assoc($salads)) {
					?>
					
						<form action="update_salads.php" method="post">
									 <tr>
											<input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
										<td>
											<input type="text" name="name" value="<?php echo $rows['name']; ?>">
										</td>
										<td> 
											<input type="text" name="description" size = "60" value="<?php echo $rows['description']; ?>"> 
										</td>
										<td> <input type="text" name="price" value="<?php echo $rows['price']; ?>"> 
										</td>

										<td colspan="1"> <input type="submit" class="button" name="submit" value="Update"> 
										</td>
										<?php $get_param = "?id=" . $rows['id'] ?>
										<td align="center"> <a href="delete_salads.php<?php echo $get_param ?>">Delete</a> </td>
									</tr>
						 </form>

						 <?php }
						}
						else 
						{
							echo "<h3>There are no records to show</h3>";
						}   ?>
					  </table>
					  <br><br>
					  <a href="new_menu_salads.php">Click here to add new salads record</a> <br><br>
				
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Starter</h6>
                
				<?php
					$sql = "SELECT * FROM starter ORDER BY id" ;
					$starter =  mysqli_query($connection, $sql);

				   if (mysqli_num_rows($starter) > 0) { 	?>
					<!-- Start table tag -->
						<table class="table" border="1"width="1200" border="1" cellspacing="2" cellpadding="15">

					<!-- Print table heading -->
					<tr class="row1">
					<td align="center"><strong>Name</strong></td>
					<td align="center"><strong>Description</strong></td>
					<td align="center"><strong>Price</strong></td>
					<td align="center"><strong>Update</strong></td>
					<td align="center"><strong>Delete</strong></td>
					</tr>

					<?php
					  // output data of each row
					  while($rows = mysqli_fetch_assoc($starter)) {
					?>
					
						<form action="update_starter.php" method="post">
									 <tr>
											<input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
										<td>
											<input type="text" name="name" value="<?php echo $rows['name']; ?>">
										</td>
										<td> 
											<input type="text" name="description" size = "60" value="<?php echo $rows['description']; ?>"> 
										</td>
										<td> <input type="text" name="price" value="<?php echo $rows['price']; ?>"> 
										</td>

										<td colspan="1"> <input type="submit" class="button" name="submit" value="Update"> 
										</td>
										<?php $get_param = "?id=" . $rows['id'] ?>
										<td align="center"> <a href="delete_starter.php<?php echo $get_param ?>">Delete</a> </td>
									</tr>
						 </form>

						 <?php }
						}
						else 
						{
							echo "<h3>There are no records to show</h3>";
						}   ?>
					  </table>
					  <br><br>
					  <a href="new_menu_starter.php">Click here to add new starter record</a> <br><br>
				
				
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