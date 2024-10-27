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
    $accommodationType = isset($_POST['accommodationType']) ? $_POST['accommodationType'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $pincode = isset($_POST['pincode']) ? intval($_POST['pincode']) : 0;
    $guardianPhone = isset($_POST['guardianPhone']) ? $_POST['guardianPhone'] : '';

    // Prepare and bind the SQL statement to insert data into StudentAccommodation table
    $stmt = $conn->prepare("INSERT INTO StudentAccommodation (AdharNumber, AccommodationType, Address, Pincode, GuardianPhone) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issii", $adharNumber, $accommodationType, $address, $pincode, $guardianPhone);

    // Execute the statement
    if ($stmt->execute()) {
        // Call the stored procedure to retrieve data after insertion
        //$call_stored_proc = "CALL getAccommodation()";
        //if ($conn->query($call_stored_proc) === TRUE) {
           echo "<script>alert('Data inserted successfully')</script>";
           echo "<script>window.location.href = 'index.html';</script>";
            //header("Location: index.html");
            exit();
        //} else {
           // echo "Error calling stored procedure: " . $conn->error;
       // }
    } else {
        echo "Error inserting data: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
