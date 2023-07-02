<?php
$servername = "127.0.0.1"; // Replace with your MySQL server name =
$username = "Jonah"; // Replace with your MySQL username
$password = "abella"; // Replace with your MySQL password
$database = "humresource"; // Replace with your MySQL database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) { 
    die("Connection failed:".$conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email']; 
$message = $_POST['message'];

// Prepare the INSERT statement
$sql = "INSERT INTO your table (name, email, message) VALUES (?, ?, ?,)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

// Execute the statement
if ($stmt->execute()) {
    echo "Form data saved successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>