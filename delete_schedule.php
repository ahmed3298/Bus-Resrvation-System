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
	mysqli_query($link,"DELETE FROM schedules WHERE schedule_id='" . $_POST['schedule_id'] . "'");
	header('location: admin.php');
	$message = "Schedule Deleted Successfully";
}
$result = mysqli_query($link,"SELECT * FROM schedules WHERE schedule_id='" . $_GET['schedule_id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
	<head>
		<title>Delete Schedule</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<form name="frmUser" method="post" class="frmd">
			<div><?php if(isset($message)) { echo $message; } ?></div>
			<h3>Schedule ID to delete: </h3><br><br>
			<input type="hidden" name="schedule_id"  value="<?php echo $row['schedule_id']; ?>">
			<input type="number" disabled="disabled" name="schedule_id"  value="<?php echo $row['schedule_id']; ?>">
			<br><br>
			<input type="submit" name="submit" value="Delete" class="btn btn-danger">
		</form>
	</body>
</html>
