<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $address = $_POST['address'];
    $zip_code = $_POST['zip_code'];

    $sql = "INSERT INTO users (username, password, email, address, zip_code) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $password, $email, $address, $zip_code);

    if ($stmt->execute()) {
        echo "Signup successful!";
        // Redirect to another page
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}
?>
