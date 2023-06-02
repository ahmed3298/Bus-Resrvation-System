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
	 $reg_no = $_POST['reg_no'];
	 $seats_capacity = $_POST['seats_capacity'];
	 $sql = "INSERT INTO buses ( reg_no, seats_capacity)
	 VALUES ('$reg_no','$seats_capacity')";
	 if (mysqli_query($link, $sql)) {
		 header('location: admin.php');
		echo "New Bus Added Successfully !";
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
<title>Add Bus</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<form method="post" class="frmd">
		<h3>Add New Bus</h3><br><br>
		Registration no.:<br>
		<input type="number" name="reg_no"><br>
		Seats Capacity:<br>
		<input type="number" name="seats_capacity"><br>
		<br>
		<input type="submit" class="btn btn-primary" name="save" value="Add">
	</form>
</body>
</html>


