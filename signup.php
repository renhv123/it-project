<?php
// Database connection parameters
$servername = "your_windows_server_ip";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input to prevent SQL injection
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $zipcode = $conn->real_escape_string($_POST['zipcode']);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, password, email, address, zipcode) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $password, $email, $address, $zipcode);

    // Execute statement
    if ($stmt->execute()) {
        // Redirect to a success page
        header("Location: success.php");
        exit();
    } else {
        // Handle error
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
}

$conn->close();
?>
