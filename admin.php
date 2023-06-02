<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="indexstyle.css">
<title>Admin</title>
</head>

<body>
	<nav class="navbar" id="navbar">
		  	<div class="container-fluid">
				<img class="navbar-brand" src="logo.png" alt="logo" width="auto">
				<div id="myNavbar">
					<ul class="nav navbar-nav">
						<li><a class="btn" href="add_bus.php">Add Bus</a></li>
						<li><a class="btn" href="add_schedule.php">Add Schedule</a></li>
					</ul>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"y></span> Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
	<center><h1 class="active"><span class="glyphicon glyphicon-user"></span>Hi Admin</h1></center>
	<div class="col-lg-6">
		<h1>Schedules</h1>
		<?php include 'retrieve_schedule.php'; ?>
	</div>
	<div class="col-lg-6">
		<h1>Buses</h1>
		<?php include 'retrieve_buses.php'; ?>
	</div>
</body>
</html>