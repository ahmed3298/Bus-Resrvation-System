<?php
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "brs";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

	$uname = $_SESSION['username'];
$id = "select login_id from login where username='$uname'";
    // SQL query to fetch data
    $sql = "SELECT booking_id, passenger_name, route, departure_date, departure_time FROM bookings where user_id='$id'";
    $result = $conn->query($sql);

    $data = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    $conn->close();
    echo json_encode($data);
?>
