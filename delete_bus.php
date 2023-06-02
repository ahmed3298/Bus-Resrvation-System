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
	mysqli_query($link,"DELETE FROM buses WHERE bus_id='" . $_POST['bus_id'] . "'");
	header('location: admin.php');
	$message = "Schedule Deleted Successfully";
}
$result = mysqli_query($link,"SELECT * FROM buses WHERE bus_id='" . $_GET['bus_id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
	<head>
		<title>Delete Bus</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<form name="frmUser" method="post" class="frmd">
			<div><?php if(isset($message)) { echo $message; } ?></div>
			<h3>Bus ID to delete: </h3><br>
			<input type="hidden"  name="bus_id"  value="<?php echo $row['bus_id']; ?>">
			<input type="number" disabled="disabled" name="bus_id"  value="<?php echo $row['bus_id']; ?>">
			<br><br>
			<input type="submit" name="submit" value="Delete" class="btn btn-danger">
		</form>
	</body>
</html>
