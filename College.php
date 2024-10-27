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
    $collegeName = isset($_POST['collegeName']) ? $_POST['collegeName'] : '';
    $collegeID = isset($_POST['collegeID']) ? intval($_POST['collegeID']) : 0;
    $courseName = isset($_POST['courseName']) ? $_POST['courseName'] : '';
    $durationInYears = isset($_POST['durationInYears']) ? intval($_POST['durationInYears']) : 0;
    
    // Retrieve the selected Seat Type value
    $seatType = isset($_POST['seatType']) ? $_POST['seatType'] : '';

    $fees = isset($_POST['fees']) ? floatval($_POST['fees']) : 0.00;

    // Prepare and bind the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO CollegeEnrollment (AdharNumber, CollegeName, CollegeID, CourseName, DurationInYears, SeatType, Fees) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isisisd", $adharNumber, $collegeName, $collegeID, $courseName, $durationInYears, $seatType, $fees);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully.";
        
        // Redirect to the next page
        header("Location: CollegeBill.html");
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
