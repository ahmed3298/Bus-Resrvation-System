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
mysqli_query($link,"UPDATE schedules set schedule_id='" . $_POST['schedule_id'] . "', bus_id='" . $_POST['bus_id'] . "', route='" . $_POST['route'] . "', departure_date='" . $_POST['departure_date'] . "' ,departure_time='" . $_POST['departure_time'] . "' WHERE schedule_id='" . $_POST['schedule_id'] . "'");
header('location: admin.php');
$message = "Schedule Updated Successfully";
}
$result = mysqli_query($link,"SELECT * FROM schedules WHERE schedule_id='" . $_GET['schedule_id'] . "'");
$row= mysqli_fetch_array($result);
$schedule_id = isset($_POST['schedule_id']) ? $_POST['schedule_id'] : (isset($row['schedule_id']) ? $row['schedule_id'] : '');
$departure_time = isset($_POST['departure_time']) ? $_POST['departure_time'] : (isset($row['departure_time']) ? $row['departure_time'] : '');
?>
<html>
<head>
<title>Update Schedule</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<form name="frmUser" method="post" class="frmd">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
	<h3>Update Schedule</h3>
</div>
Schedule ID: <br>
<input type="hidden" name="schedule_id"  value="<?php echo $schedule_id; ?>">
<input type="number" disabled="disabled" name="schedule_id"  value="<?php echo $schedule_id; ?>">
<br>
Bus ID: <br>
<input type="number" name="bus_id" value="<?php echo $row['bus_id']; ?>">
<br>
Route :<br>
<input type="text" name="route" value="<?php echo $row['route']; ?>">
<br>
Departure Date:<br>
<input type="date" name="departure_date" value="<?php echo $row['departure_date']; ?>">
<br>
Departure Time:<br>
<input type="time" name="departure_time" value="<?php echo $departure_time; ?>">
<br><br>
<input type="submit" name="submit" value="Update" class="btn btn-warning">

</form>
</body>
</html>
