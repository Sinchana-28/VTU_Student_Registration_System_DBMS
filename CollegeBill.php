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
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $amountPaid = isset($_POST['amountPaid']) ? floatval($_POST['amountPaid']) : 0.00;
    $pendingAmount = isset($_POST['pendingAmount']) ? floatval($_POST['pendingAmount']) : 0.00;
    $dateOfPayment = isset($_POST['dateOfPayment']) ? $_POST['dateOfPayment'] : '';

    // Prepare and bind the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO CollegeBill (AdharNumber, Status, AmountPaid, PendingAmount, DateOfPayment) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isdds", $adharNumber, $status, $amountPaid, $pendingAmount, $dateOfPayment);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully.";
        
        // Redirect to the next page
        header("Location: Accommodation.html");
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
