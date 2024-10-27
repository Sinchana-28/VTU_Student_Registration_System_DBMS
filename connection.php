<?php
// Database configuration
$host = 'localhost';  // Replace with your actual database host
$dbname = 'studentdb'; // Replace with your actual database name
$username = 'root';  // Replace with your actual database username
$password = 'sinchu_123';  // Replace with your actual database password

// Create a PDO instance
try {
    $con = mysqli_connect($host,$username,$password,$dbname);
    // if($con){
    //     echo "connection success";
    // }
} catch (err) {
    die("Connection failed: " . $e->getMessage());
}
?>