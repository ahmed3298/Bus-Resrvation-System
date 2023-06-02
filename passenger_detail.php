<?php

session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>AA Express</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="passenger_form.css">
  	</head>
	 	<body>
				<div class="upper-nav">
					<div style="display: inline; float: none"><a class="glyphicon glyphicon-earphone uan" href="#">UAN: 111-222-333</a></div>
					<div style="float: right; margin-right: 35%">
						<marquee>Launching our new buses soon!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New buses for Lahore to Sialkot</marquee>
					</div>
					<div></div>
				</div>
			
	  	<nav class="navbar" id="navbar">
		  	<div class="container-fluid">
				<img class="navbar-brand" src="logo.png" alt="logo" width="auto">
				<div id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="active"><a href="home.php">Home</a></li>
						<li><a href="booking.php">Bookings</a></li>
						<li><a href="#footer">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="bg-box">
		<div class="conatiner-fluid">
			<div class="col-lg-3"></div>
			<div class="col-lg-6 text-left"> 
				<center><img class="logoo" src="logo.png" width="19%" height="62" alt="logo"></center>
				<hr style="background-color: cadetblue; height: 2px">
				<form class="form" action="booking_connect.php" method="POST">
					<div id="form_cover" class="frmd" >
						<div>
							<label for="name">Passenger Name</label><br>
							<input type="text" name="passenger_name" placeholder="Enter Name" required>
						</div>
						<div>
							<label for="email">Email</label><br>
							<input type="email" name="email" placeholder="Enter Email" required>
						</div>
						<div>
							<label for="name">Phone Number</label><br>
							<input type="tel" name="mobile_no" placeholder="Enter Mobile Number" required>
						</div>
						<div>
							<label for="name">Select Route</label><br>
							<select name="route" class="dropdown" required>
								<option hidden="">Select Route</option>
								<option>LHR-ISL</option>
								<option>LHR-SKT</option>
								<option>LHR-GRW</option>
								<option>GRW-ISL</option>
								<option>SKT-GRW</option>
								<option>ISL-LHR</option>
								<option>ISL-SKT</option>
								<option>GRW-LHR</option>
								<option>LHR-RWP</option>
								<option>RWP-ISL</option>
							</select>
						</div>
						<div>
							<label for="name">Select Date</label><br>
							<input type="date" name="departure_date" required>
						</div>
						<div>
							<label for="name">Select Time</label><br>
							<input type="time" name="departure_time" required>
						</div>
						<br><br>
						<input type="submit" class="btn btn-primary" value="SAVE">
					</div>
				</form>
			<div class="col-lg-3"></div>
		</div>
		</div>
			</div>
	  </body>
	</html>
