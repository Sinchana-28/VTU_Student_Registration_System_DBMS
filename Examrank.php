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
    $examType = isset($_POST['examType']) ? $_POST['examType'] : '';
    $eRank = isset($_POST['eRank']) ? intval($_POST['eRank']) : null;

    // Prepare and bind the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO ExamResults (AdharNumber, ExamType, ERank) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $adharNumber, $examType, $eRank);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully.";
        
        // Store AdharNumber in session variable
        $_SESSION['AdharNumber'] = $adharNumber;
        
        // Redirect to the next page
        header("Location: College.html");
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
