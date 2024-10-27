<?php
session_start(); // Start the session

// Database connection parameters
$host = 'localhost';
$dbname = 'studentdb';
$username = 'root';
$password = 'sinchu_123';

// Establish connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $adharNumber = isset($_SESSION['AdharNumber']) ? $_SESSION['AdharNumber'] : 0;
    $totalMarks = isset($_POST['totalMarks']) ? intval($_POST['totalMarks']) : 0;
    $maximumMarks = isset($_POST['maximumMarks']) ? intval($_POST['maximumMarks']) : 0;
    $percentage = ($maximumMarks != 0) ? round(($totalMarks / $maximumMarks) * 100, 2) : 0;

    // Prepare and bind the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO TenMarks (AdharNumber, TotalMarks, MaximumMarks, Percentage) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiid", $adharNumber, $totalMarks, $maximumMarks, $percentage);

    // Execute the statement
    if ($stmt->execute()) {
        //echo "Data inserted successfully."; // Display success message
        echo "<script>window.location.href = 'Twelve_marks.html';</script>"; // Redirect after displaying message
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
