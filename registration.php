<?php

session_start();
header('location:login.php');

$conn = mysqli_connect('localhost','root');
if($conn){
	echo "Connection Successful";
}
else{
	echo "No Connection";
}

mysqli_select_db($conn, 'brs');

$email = $_POST['email'];
$uname = $_POST['username'];
$pass = $_POST['password'];

$q = "select * FROM login WHERE username = '$uname'";

$result = mysqli_query($conn, $q);

$num = mysqli_num_rows($result);
if($num == 1){
	$_SESSION['exist'] = "Username already exist!";
	header('location: signup.php');
}
else{
	$qu = "insert into login(username, password, email) values('$uname' , '$pass', '$email')";
	mysqli_query($conn, $qu);
}

?>