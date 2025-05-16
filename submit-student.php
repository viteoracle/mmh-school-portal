<?php
// Connect to MySQL
$conn = new mysqli("localhost", "root", "", "school_db"); // Change to your DB name

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture values from form
$name = $_POST['student_name'];
$class = $_POST['student_class'];
// Capture more fields as needed

// Insert into database
$sql = "INSERT INTO students (name, class) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name, $class); // Match to your columns and data types

if ($stmt->execute()) {
    echo "Student added successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>