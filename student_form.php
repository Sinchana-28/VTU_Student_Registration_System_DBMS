<?php
session_start();
$host = 'localhost';
$dbname = 'studentdb';
$username = 'root';
$password = 'sinchu_123';

// Retrieve form data
$name = $_POST['name'];
$fathersName = $_POST['fathersName'];
$mothersName = $_POST['mothersName'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$category = $_POST['category'];
$religion = $_POST['religion'];
$caste = $_POST['caste'];
$emailID = $_POST['emailID'];
$state = $_POST['state'];
$studyPlace = $_POST['studyPlace'];
$study10Medium = $_POST['study10Medium'];
$adharNumber = $_POST['adharNumber'];
$phoneNumber = $_POST['phoneNumber'];

// Store Aadhar number in session
$_SESSION['AdharNumber'] = $adharNumber;

$con = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO students (AdharNumber, Name, FathersName, MothersName, DOB, Gender, Category, Religion, Caste, EmailID, State, StudyPlace, Study10Medium, PhoneNumber)
                    VALUES ('$adharNumber','$name','$fathersName','$mothersName','$dob','$gender','$category','$religion','$caste','$emailID','$state','$studyPlace','$study10Medium','$phoneNumber')";

if (mysqli_query($con, $sql)) {
    //echo "<script>alert('Data inserted successfully')</script>";
    echo "<script>window.location.href = 'TenthMarks.html';</script>";
} else {
    echo "<script>alert('Error: " . mysqli_error($con) . "')</script>";
}

mysqli_close($con);
?>
