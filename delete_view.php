<?php

    $host = 'localhost';
    $dbname = 'studentdb';
    $username = 'root';
    $password = 'sinchu_123';

    $con = mysqli_connect($host,$username,$password,$dbname);

    $deleteId = $_POST['deleteId'];
    $dqs = "DELETE FROM students WHERE AdharNumber = $deleteId";
    $dq = mysqli_query($con,$dqs);

    if($dq) {
        echo "<script>alert('Data deleted successfully')</script>";
        echo "<script>window.location.href = 'admin_view.php';</script>";
    } else {
        echo "<script>alert('Data didn't deleted')</script>";
    }


?>