<?php
session_start();

// Check if admin is not logged in, redirect to login page
if (!isset($_SESSION['admin_loggedin']) || $_SESSION['admin_loggedin'] !== true) {
    header("Location:admin_view.php");
    exit;
}

// Include database connection and other necessary code
$host = 'localhost';
$dbname = 'studentdb';
$username = 'root';
$password = 'sinchu_123';

$con = mysqli_connect($host,$username,$password,$dbname);
$rqs = "select * from students"; //Retrieve Query String
$rq = mysqli_query($con,$rqs); //Retrieve Query
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        
        h1 {
            margin-bottom: 20px;
        }
        
        form {
            display: inline-block;
            margin: 0;
        }
        
        .edit-btn, .delete-btn {
            border: none;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 5px;
        }
        
        .edit-btn {
            background-color: #4CAF50; /* Green */
            color: white;
        }
        
        .delete-btn {
            background-color: #f44336; /* Red */
            color: white;
        }
    </style>
</head>
<body>
<div style="text-align: right; padding: 10px;">
    <form action="logout.php" method="post">
        <!-- Increased size and changed color of the logout button -->
        <button type="submit" style="padding: 15px 30px; font-size: 20px; border: none; border-radius: 10px; background-color: #f44336; color: white; cursor: pointer;">Logout</button>
        </form>
    </div>
    <h1>ADMIN DASHBOARD</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Father's Name</th>
            <th>Mother's Name</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Category</th>
            <th>Religion</th>
            <th>Caste</th>
            <th>Email</th>
            <th>State</th>
            <th>Study Place</th>
            <th>10th Medium</th>
            <th>Adhaar Number</th>
            <th>Phone</th>
            <th>Action</th>
            <th>Action</th>
        </tr>
        <?php foreach($rq as $eachItem) { ?>
            <tr>
                <td><?=$eachItem['Name']?></td>
                <td><?=$eachItem['FathersName']?></td>
                <td><?=$eachItem['MothersName']?></td>
                <td><?=$eachItem['DOB']?></td>
                <td><?=$eachItem['Gender']?></td>
                <td><?=$eachItem['Category']?></td>
                <td><?=$eachItem['Religion']?></td>
                <td><?=$eachItem['Caste']?></td>
                <td><?=$eachItem['EmailID']?></td>
                <td><?=$eachItem['State']?></td>
                <td><?=$eachItem['StudyPlace']?></td>
                <td><?=$eachItem['Study10Medium']?></td>
                <td><?=$eachItem['AdharNumber']?></td>
                <td><?=$eachItem['PhoneNumber']?></td>
                <td>
                    <form action="update_view.php" method="post">
                        <input type="hidden" name="editId" value="<?=$eachItem['AdharNumber']?>">
                        <button type="submit" class="edit-btn">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="delete_view.php" method="post">
                        <input type="hidden" name="deleteId" value="<?=$eachItem['AdharNumber']?>">
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    <hr>
</body>
</html>
