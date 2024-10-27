<?php

$host = 'localhost';
$dbname = 'studentdb';
$username = 'root';
$password = 'sinchu_123';

$con = mysqli_connect($host,$username,$password,$dbname);

$editId = $_POST['editId'];
$gqs = "select * from students where AdharNumber = $editId"; //GEt Query String
$gq = mysqli_query($con,$gqs);//get query
$e=mysqli_fetch_assoc($gq);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            width: 100%;
        }

        .form-group {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Update</h1>
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
        </tr>
        <form action="update_request.php" method="POST">
            <tr>
                <td><input type="text" name="name" value="<?php echo $e['Name'] ?>"></td>
                <td><input type="text" name="fathersName" value="<?php echo $e['FathersName'] ?>"></td>
                <td><input type="text" name="mothersName" value="<?php echo $e['MothersName'] ?>"></td>
                <td><input type="text" name="dob" value="<?php echo $e['DOB'] ?>"></td>
                <td class="form-group">
                    <select name="gender">
                        <option value="Male" <?php if ($e['Gender'] == 'Male') echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if ($e['Gender'] == 'Female') echo 'selected'; ?>>Female</option>
                        <option value="Other" <?php if ($e['Gender'] == 'Other') echo 'selected'; ?>>Other</option>
                    </select>
                </td>
                <td><input type="text" name="category" value="<?php echo $e['Category'] ?>"></td>
                <td><input type="text" name="religion" value="<?php echo $e['Religion'] ?>"></td>
                <td><input type="text" name="caste" value="<?php echo $e['Caste'] ?>"></td>
                <td><input type="text" name="email" value="<?php echo $e['EmailID'] ?>"></td>
                <td><input type="text" name="state" value="<?php echo $e['State'] ?>"></td>
                <td class="form-group">
                    <select name="studyPlace">
                        <option value="Urban" <?php if ($e['StudyPlace'] == 'Urban') echo 'selected'; ?>>Urban</option>
                        <option value="Rural" <?php if ($e['StudyPlace'] == 'Rural') echo 'selected'; ?>>Rural</option>
                    </select>
                </td>
                <td><input type="text" name="study10Medium" value="<?php echo $e['Study10Medium'] ?>"></td>
                <td><input type="text" name="adharNumber" value="<?php echo $e['AdharNumber'] ?>"></td>
                <td><input type="text" name="phone" value="<?php echo $e['PhoneNumber'] ?>"></td>
                <td class="form-group">
                    <input type="hidden" name="editId" value="<?php echo $editId ?>">
                    <input type="submit" value="Update" name="update">
                </td>
            </tr>
        </form>
    </table>
</body>
</html>
