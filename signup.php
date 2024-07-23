<?php
// Database configuration
$servername = "192.168.1.10";
$username = "Administrator";
$password = "Secret55";
$dbname = "user_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$signup_username = $_POST['signup_username'];
$signup_password = ($_POST['signup_password'], PASSWORD_BCRYPT);
$signup_email = $_POST['signup_email'];
$signup_address = $_POST['signup_address'];
$signup_zipcode =  $_POST['signup_zipcode'];

// Insert data into database
$sql = "INSERT INTO users (username, password, email, address, zipcode) VALUES ('$signup_username', '$signup_password', '$signup_email', '$signup_address', '$signup_zipcode')";

if ($conn->query($sql) === TRUE) {
    echo "registration successful"; // Redirect to success page
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
