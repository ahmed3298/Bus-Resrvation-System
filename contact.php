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
		<link rel="stylesheet" href="indexstyle.css">
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
						<li><a href="#">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					</ul>
					<div class="nav-toggle">
						<div class="nav-toggle-bar"></div>
						<div class="nav-toggle-bar"></div>
						<div class="nav-toggle-bar"></div>
					</div>
				</div>
			</div>
		</nav>
			<div class="bg-box">
		<div class="conatiner-fluid">
			<div class="col-lg-1"></div>
			<div class="col-lg-4">
			  <h1>Welcome to the AA Express Bus Service</h1>
				
			  <p>
     			Safe, Affordable, Accessible
       			Founded in 2023, AA Express bus service is the largest provider of intercity and urban bus transportation, serving more than 15,000 destinations with 150,000 daily departures across Pakistan
			  </p>
			</div>
			<div class="col-lg-6 text-left"> 
				<center><img class="logoo" src="logo.png" width="19%" height="62" alt="logo"></center>
				<hr>
				
				<button class="btn btn-lg btn-info btn-block">Book Seat</button>
			</div>
			<div>
			
			</div>
			<div class="col-lg-1"></div>
		</div>
				</div>
	  </body>
	</html>
