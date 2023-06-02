<?php

session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
}


$servername='localhost';
$username='root';
$password='';
$dbname="brs";
$link=mysqli_connect($servername,$username,$password,"$dbname");
if(!$link){
	die('Could not connect to MySQL:'.mysql_error());
}
if(count($_POST)>0) {
	mysqli_query($link,"DELETE FROM bookings WHERE booking_id='" . $_POST['booking_id'] . "'");
	header('location: booking.php');
	$message = "Schedule Deleted Successfully";
}
$result = mysqli_query($link,"SELECT * FROM bookings WHERE booking_id='" . $_POST['booking_id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
	<head>
		<title>Cancel Booking</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<form name="frmUser" method="post" class="frmd">
			<div><?php if(isset($message)) { echo $message; } ?></div>
			<h3>Booking ID to delete: </h3><br>
			<input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
			<input type="number" name="booking_id"  value="<?php echo $row['booking_id']; ?>">
			<br><br>
			<input type="submit" name="submit" value="Submit" class="btn">
		</form>
	</body>
</html>