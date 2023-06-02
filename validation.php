<?php

session_start();
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
$admin = $_POST['username'] = "admin";

$q = "select * FROM login WHERE username = '$uname' && password = '$pass'";
$adm = "select * FROM login where username = '$admin' && password = '$pass'";

$result = mysqli_query($conn, $q);
$admresult = mysqli_query($conn, $adm);

$num = mysqli_num_rows($result);
$num2 = mysqli_num_rows($admresult);
if($num2 == 1){
	$_SESSION['username'] = "admin";
	header('location: admin.php');
}
else if($num == 1){
	$_SESSION['username'] = $uname;
	header('location: home.php');
}
else{
	header('location: login.php');
}

?>