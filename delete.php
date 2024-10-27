<?php
$host = 'localhost';
$dbname = 'studentdb';
$username = 'root';
$password = 'sinchu_123';

$con = mysqli_connect($host, $username, $password, $dbname);

if(isset($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    
    // Delete the student record
    $delete_student_query = "DELETE FROM students WHERE AdharNumber='$deleteId'";
    
    // Delete the tenth marks record
    $delete_marks_query = "DELETE FROM TenMarks WHERE AdharNumber='$deleteId'";
    
    // Delete the twelve marks record
    $delete_marks_twelve_query = "DELETE FROM TwelveMarks WHERE AdharNumber='$deleteId'";
    
    // Delete the college enrollment record
    $delete_enrollment_query = "DELETE FROM CollegeEnrollment WHERE AdharNumber='$deleteId'";
    
    // Delete the student accommodation record
    $delete_accommodation_query = "DELETE FROM StudentAccommodation WHERE AdharNumber='$deleteId'";
    
    // Delete the college bill record
    $delete_bill_query = "DELETE FROM CollegeBill WHERE AdharNumber='$deleteId'";
    
    // Perform deletion of all records
    if(mysqli_query($con, $delete_student_query) && mysqli_query($con, $delete_marks_query) && mysqli_query($con, $delete_marks_twelve_query) && mysqli_query($con, $delete_enrollment_query) && mysqli_query($con, $delete_accommodation_query) && mysqli_query($con, $delete_bill_query)) {
        // Display confirmation message
        echo "<script>alert('Student record and associated data deleted successfully!');</script>";
    } else {
        // Display error message if deletion fails
        echo "<script>alert('Error: Unable to delete student record and associated data.');</script>";
    }
    
    // Redirect to view page
    echo "<script>window.location.href='view.php';</script>";
    exit;
}
?>
