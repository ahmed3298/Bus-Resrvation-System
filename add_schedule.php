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
if(isset($_POST['save']))
{	 
	 $bus_id = $_POST['bus_id'];
	 $route = $_POST['route'];
	 $departure_date = $_POST['departure_date'];
	 $departure_time = $_POST['departure_time'];
	 $sql = "INSERT INTO schedules (bus_id, route, departure_date, departure_time)
	 VALUES ('$bus_id','$route','$departure_date','$departure_time')";
	 if (mysqli_query($link, $sql)) {
		 header('location: admin.php');
		echo "New Schedule Added Successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($link);
	 }
	 mysqli_close($link);
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Schedule</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<form method="post" class="frmd">
		<h3>Add New Schedule</h3><br><br>
		Bus ID:<br>
		<input type="number" name="bus_id"><br>
		Route:<br>
		<input type="text" name="route"><br>
		Departure Date:<br>
		<input type="date" name="departure_date"><br>
		Departure Time:<br>
		<input type="time" name="departure_time">
		<br><br>
		<input type="submit" class="btn btn-primary" name="save" value="Add">
	</form>
</body>
</html>


