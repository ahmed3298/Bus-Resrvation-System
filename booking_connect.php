<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brs";
$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$uname = $_SESSION['username'];
$u = "select login_id from login where username='$uname'";
$result = $conn->query($u);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row["login_id"];
} else {
    echo "Error: No user found with that username";
}
$name = $_POST['passenger_name'];
$email = $_POST['email'];
$mobile = $_POST['mobile_no'];
$route = $_POST['route'];
$departure_date = $_POST['departure_date'];
$departure_time = $_POST['departure_time'];
$result = $conn->query($u);

$qu = "insert into bookings(passenger_name, email, mobile_no, route, departure_date, departure_time, user_id) values('$name' , '$email' , '$mobile' , '$route' , '$departure_date' , '$departure_time' , '$id')";
mysqli_query($conn, $qu);
header('location: booking.php');
if(isset($_POST['submit'])){
	$q = mysqli_query($dbname,"SELECT booking_id, passenger_name, route, departure_date, departure_time FROM bookings WHERE user_id='$u'");
}
if(mysqli_num_rows($q)==0){
	echo "Sorry! No Booking Found";
}
else{
	header('location: booking.php');
}
?>