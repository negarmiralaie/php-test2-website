<?php
    $serveName = "localhost";
    $username = "root";
    $password = "";
    $dbname = "course";

    // Create connection
    $conn = mysqli_connect($serveName, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // echo "Connection to db was successful!";

	return $conn;
?>