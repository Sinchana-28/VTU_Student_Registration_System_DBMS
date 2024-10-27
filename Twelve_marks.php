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
    $studiedState = isset($_POST['studiedState']) ? htmlspecialchars($_POST['studiedState']) : '';
    $collegeNamePlace = isset($_POST['collegeNamePlace']) ? htmlspecialchars($_POST['collegeNamePlace']) : '';
    $english = isset($_POST['english']) ? intval($_POST['english']) : 0;
    $language = isset($_POST['language']) ? intval($_POST['language']) : 0;
    $physics = isset($_POST['physics']) ? intval($_POST['physics']) : 0;
    $chemistry = isset($_POST['chemistry']) ? intval($_POST['chemistry']) : 0;
    $mathematics = isset($_POST['mathematics']) ? intval($_POST['mathematics']) : 0;
    $biology = isset($_POST['biology']) ? intval($_POST['biology']) : 0;
    $computerScience = isset($_POST['computerScience']) ? intval($_POST['computerScience']) : 0;
    $electronics = isset($_POST['electronics']) ? intval($_POST['electronics']) : 0;
    $electrical = isset($_POST['electrical']) ? intval($_POST['electrical']) : 0;
    $statistics = isset($_POST['statistics']) ? intval($_POST['statistics']) : 0;
    $informationTechnology = isset($_POST['informationTechnology']) ? intval($_POST['informationTechnology']) : 0;
    $totalMarks = isset($_POST['totalMarks']) ? intval($_POST['totalMarks']) : 0;
    $maximumMarks = isset($_POST['maximumMarks']) ? intval($_POST['maximumMarks']) : 0;

    // Calculate percentage
    $percentage = ($maximumMarks != 0) ? round(($totalMarks / $maximumMarks) * 100, 2) : 0;

    // Retrieve AdharNumber from session
    if (isset($_SESSION['AdharNumber'])) {
        $adharNumber = $_SESSION['AdharNumber'];
        
        // Prepare and bind the SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO TwelveMarks (AdharNumber, StudiedState, CollegeNamePlace, English, Language, Physics, Chemistry, Mathematics, Biology, ComputerScience, Electronics, Electrical, Statistics, InformationTechnology, TotalMarks, MaximumMarks, Percentage) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssiiiiiiiiiiiii", $adharNumber, $studiedState, $collegeNamePlace, $english, $language, $physics, $chemistry, $mathematics, $biology, $computerScience, $electronics, $electrical, $statistics, $informationTechnology, $totalMarks, $maximumMarks, $percentage);

        // Execute the statement
        if ($stmt->execute()) {
            //echo "Data inserted successfully. Redirecting to next page...";
            header("Location: Examrank.html"); // Redirect to the next page
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "AdharNumber not found in session.";
    }
}

// Close connection
$conn->close();
?>
