<?php
// Database configuration
$servername = "your_remote_server_ip";
$username = "your_database_username";
$password = "your_database_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$signup_username = mysqli_real_escape_string($conn, $_POST['signup_username']);
$signup_password = password_hash($_POST['signup_password'], PASSWORD_BCRYPT);
$signup_email = mysqli_real_escape_string($conn, $_POST['signup_email']);
$signup_address = mysqli_real_escape_string($conn, $_POST['signup_address']);
$signup_zipcode = mysqli_real_escape_string($conn, $_POST['signup_zipcode']);

// Insert data into database
$sql = "INSERT INTO users (username, password, email, address, zipcode) VALUES ('$signup_username', '$signup_password', '$signup_email', '$signup_address', '$signup_zipcode')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<?php
// Database configuration
$servername = "your_remote_server_ip";
$username = "your_database_username";
$password = "your_database_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$signup_username = mysqli_real_escape_string($conn, $_POST['signup_username']);
$signup_password = password_hash($_POST['signup_password'], PASSWORD_BCRYPT);
$signup_email = mysqli_real_escape_string($conn, $_POST['signup_email']);
$signup_address = mysqli_real_escape_string($conn, $_POST['signup_address']);
$signup_zipcode = mysqli_real_escape_string($conn, $_POST['signup_zipcode']);

// Insert data into database
$sql = "INSERT INTO users (username, password, email, address, zipcode) VALUES ('$signup_username', '$signup_password', '$signup_email', '$signup_address', '$signup_zipcode')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
