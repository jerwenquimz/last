<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "user_info";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$first_name = $_POST['firstName'];
$middle_name = $_POST['middleName'];
$last_name = $_POST['lastName'];
$age = $_POST['age'];
$address = $_POST['address'];

// Insert data into the database
$sql = "INSERT INTO users (first_name, middle_name, last_name, age, address)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssds", $first_name, $middle_name, $last_name, $age, $address);

if ($stmt->execute()) {
    echo "Data successfully inserted!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
