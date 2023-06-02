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

$result = mysqli_query($link,"SELECT * FROM schedules");
?>
<!DOCTYPE html>
<html>
 <head>
   <title> Schedule data</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	 <link rel="stylesheet" href="style.css">
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table class="table table-responsive table-bordered">
	<thead>
		<tr class="info">
			<th>Schedule ID</th>
			<th>Bus ID</th>
			<th>Route</th>
			<th>Departure Date</th>
			<th>Departure Time</th>
			<th>Update</th>
			<th>Delete</th>
		  </tr>
	</thead>  
	
			<?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
	<tbody>
	  <tr class="active">
	    <td><?php echo $row["schedule_id"]; ?></td>
		<td><?php echo $row["bus_id"]; ?></td>
		<td><?php echo $row["route"]; ?></td>
		<td><?php echo $row["departure_date"]; ?></td>
		<td><?php echo $row["departure_time"]; ?></td>
		<td><a class="btn btn-warning" href="update_schedule.php?schedule_id=<?php echo $row["schedule_id"]; ?>">Update</a></td>
		<td><a class="btn btn-danger" href="delete_schedule.php?schedule_id=<?php echo $row["schedule_id"]; ?>">Delete</a></td>
      </tr>
	</tbody>
			<?php
			$i++;
			}
			?>
</table>
 <?php
}
else
{
    echo "No result found";
}
?>
 </body>
</html>
