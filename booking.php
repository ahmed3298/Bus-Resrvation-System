<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brs";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error());
}

if(!isset($_SESSION['username'])){
    die("Error: Session variable not set.");
}

$uname = $_SESSION['username'];

$id_result = mysqli_query($conn, "select login_id from login where username='$uname'");

if (!$id_result) {
    die("Error: " . mysqli_error($conn));
}

$id = mysqli_fetch_assoc($id_result);
if(empty($id)){
    die("Error: id variable is empty.");
}

$q = "select * from bookings where user_id=".$id['login_id'];
$q_result = mysqli_query($conn, $q);

if (!$q_result) {
    die("Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>AA Express</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTDNEpUTHQoQUJMHLrErGJyHg89uy71MyuHQvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="indexstyle.css">
  	</head>
	 	<body>
				<div class="upper-nav">
					<div style="display: inline; float: none"><a class="glyphicon glyphicon-earphone uan" href="#">UAN: 111-222-333</a></div>
					<div style="float: right; margin-right: 35%">
						<marquee>Launching our new buses soon!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New buses for Lahore to Sialkot</marquee>
					</div>
				</div>
			
	  	<nav class="navbar" id="navbar">
		  	<div class="container-fluid">
				<img class="navbar-brand" src="logo.png" alt="logo" width="auto">
				<div id="myNavbar">
					<ul class="nav navbar-nav">
						<li><a href="home.php">Home</a></li>
						<li><a href="#">Bookings</a></li>
						<li><a href="#footer">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right nav_list">
						<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"y></span> Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
			<div class="bg-box">
		<div class="conatiner-fluid">
			<div class="col-lg-1"></div>
			<div class="col-lg-9">
				<h1>Welcome to the AA Express Bus Service</h1><br>
				<?php
				if (mysqli_num_rows($q_result) > 0) {

    while($row = mysqli_fetch_assoc($q_result)) {
		echo '<div class="card card_bg">';
		echo '<img src="bus.png" class="card-img-top" alt="bus" style="width: inherit;">';
		echo '<div class="card-body">';
		echo '<ul class="list-unstyled">';
		echo '<li class="card-title" style="font-weight: 800">Booking ID: '.$row["booking_id"].'</li>';
		echo '<li>Name: '. $row["passenger_name"].'</li>';
		echo '<li>Route: '. $row["route"].'</li>';
		echo '<li>Date: '. $row["departure_date"].'</li>';
		echo '<li>Time: '. $row["departure_time"].'</li><br>';
		echo '<a href="cancel_booking.php" class="btn btn-primary"">Cancel <span class="glyphicon glyphicon-trash"></span></a>';
		echo '</div>';
		echo '</div>';
		echo '<span class="col-lg-1">';
    }
} else {
    echo "No bookings found.";
}
?>
				
			</div>

			
		</div>
				</div>
			<?php include 'footer.php'; ?>
	  </body>
	</html>
