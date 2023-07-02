<?php
$servername = "127.0.0.1"; // Replace with your MySQL server name $username = "username"; // Replace with your MySQL username
$password = "abella"; // Replace with your MySQL password
$database = "humresource"; // Replace with your MySQL database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database 
$sql = "SELECT name, email, message FROM your_table"; 
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Retrieved Form Data</title>
    <style>
        /* Custom styling for the retrieved form data */ 
        body {
            font-family: Arial, sans-serif;
            margin: 0px;
            }

            h2 {
            color: #333;
            }

            .form-data {
            background-color: #f5f5f5; 
            padding: 10px; 
            margin-bottom: 20px; 
            border: 1px solid #ccc; 
            border-radius: 4px;
            }

            .form-data p{
            margin: 0;
            }

            hr {
            margin: 20px 0;
            border: 0;
            border-top: 1px solid #ccc;
            }

            .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #4c55af; 
            text-decoration: none; 
            border-radius: 4px;
            transition: background-color 0.3s ease;
            }

            .btn:hover {
            background-color: #45a049;
            } 
    </style>
</head>
<body>
    <h2>Retrieved Form Data</h2>

    <?php
    if ($result->num_rows) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='form-data'>"; 
            echo "<p><strong>Name:</strong> " .  $row["name"] . "</p>";
            echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
            echo "<p><strong>Message:</strong> " .  $row["message"] . "</p>";
            echo "</div>"; 
            echo "<hr>";
        }
    } else {
        echo "<p>No form data found.</p>";
    }

    // Close the connection
    $conn->close();
    ?>
    <a href="Abella_Activity8_BSCS1A(EntryForm).html" class="btn">New Entry</a>
</body>
</html>