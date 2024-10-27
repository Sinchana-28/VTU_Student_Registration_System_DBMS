<?php
$host = 'localhost';
$dbname = 'studentdb';
$username = 'root';
$password = 'sinchu_123';

$con = mysqli_connect($host, $username, $password, $dbname);

if(isset($_GET['editId'])) {
    $editId = $_GET['editId'];
    
    // Retrieve student details
    $query_student = "SELECT * FROM students WHERE AdharNumber='$editId'";
    $result_student = mysqli_query($con, $query_student);
    $student = mysqli_fetch_assoc($result_student);

    // Retrieve tenth marks details
    $query_marks = "SELECT * FROM TenMarks WHERE AdharNumber='$editId'";
    $result_marks = mysqli_query($con, $query_marks);
    $marks_data = mysqli_fetch_assoc($result_marks);

    // Retrieve twelve marks details
    $query_marks_twelve = "SELECT * FROM TwelveMarks WHERE AdharNumber='$editId'";
    $result_marks_twelve = mysqli_query($con, $query_marks_twelve);
    $marks_data_twelve = mysqli_fetch_assoc($result_marks_twelve);
    
    // Retrieve college enrollment details
    $query_enrollment = "SELECT * FROM CollegeEnrollment WHERE AdharNumber='$editId'";
    $result_enrollment = mysqli_query($con, $query_enrollment);
    $enrollment_data = mysqli_fetch_assoc($result_enrollment);

    // Retrieve college bill details
    $query_bill = "SELECT * FROM CollegeBill WHERE AdharNumber='$editId'";
    $result_bill = mysqli_query($con, $query_bill);
    $bill_data = mysqli_fetch_assoc($result_bill);

    // Retrieve student accommodation details
    $query_accommodation = "SELECT * FROM StudentAccommodation WHERE AdharNumber='$editId'";
    $result_accommodation = mysqli_query($con, $query_accommodation);
    $accommodation_data = mysqli_fetch_assoc($result_accommodation);

    // Check if form is submitted for update, then update the student record
    if(isset($_POST['update'])) {
        // Update student details
        $name = $_POST['Name'];
        $fathersName = $_POST['FathersName'];
        $mothersName = $_POST['MothersName'];
        $dob = $_POST['DOB'];
        $category = $_POST['Category'];
        $religion = $_POST['Religion'];
        $caste = $_POST['Caste'];
        $email = $_POST['EmailID'];
        $state = $_POST['State'];
        $study10Medium = $_POST['Study10Medium'];
        $adharNumber = $_POST['AdharNumber'];
        $phone = $_POST['PhoneNumber'];
        $gender = $_POST['Gender'];
        $studyPlace = $_POST['StudyPlace'];
        
        $update_student_query ="UPDATE students SET Name='$name', FathersName='$fathersName', MothersName='$mothersName', DOB='$dob', Category='$category', Religion='$religion', Caste='$caste', EmailID='$email', State='$state', Study10Medium='$study10Medium', PhoneNumber='$phone', Gender='$gender', StudyPlace='$studyPlace' WHERE AdharNumber='$editId'";
        mysqli_query($con, $update_student_query);

        // Update tenth marks details
        $totalMarks = $_POST['TotalMarks'];
        $maximumMarks = $_POST['MaximumMarks'];
        $percentage = ($totalMarks / $maximumMarks) * 100; // Calculate percentage
        
        $update_marks_query ="UPDATE TenMarks SET TotalMarks='$totalMarks', MaximumMarks='$maximumMarks', Percentage='$percentage' WHERE AdharNumber='$editId'";
        mysqli_query($con, $update_marks_query);
            
       // Update twelve marks details
       $english = $_POST['English'];
       $language = $_POST['Language'];
       $physics = $_POST['Physics'];
       $chemistry = $_POST['Chemistry'];
       $mathematics = $_POST['Mathematics'];
       $biology = isset($_POST['Biology']) ? $_POST['Biology'] : 0; // Initialize to 0 if not set
       $computerScience = isset($_POST['ComputerScience']) ? $_POST['ComputerScience'] : 0; // Initialize to 0 if not set
       $electronics = isset($_POST['Electronics']) ? $_POST['Electronics'] : 0; // Initialize to 0 if not set
       $electrical = isset($_POST['Electrical']) ? $_POST['Electrical'] : 0; // Initialize to 0 if not set
       $statistics = isset($_POST['Statistics']) ? $_POST['Statistics'] : 0; // Initialize to 0 if not set
       $informationTechnology = isset($_POST['InformationTechnology']) ? $_POST['InformationTechnology'] : 0; // Initialize to 0 if not set

       // Calculate total marks for Twelve Marks
       $totalMarksTwelve = $english + $language + $physics + $chemistry + $mathematics + $biology + $computerScience + $electronics + $electrical + $statistics + $informationTechnology;

       // Calculate percentage for Twelve Marks
       $maximumMarksTwelve = 600; // Assuming maximum marks for twelve subjects is 600
       $percentageTwelve = ($totalMarksTwelve / $maximumMarksTwelve) * 100;

       // Update the TwelveMarks table
       $update_marks_query_twelve = "UPDATE TwelveMarks SET English='$english', Language='$language', Physics='$physics', Chemistry='$chemistry', Mathematics='$mathematics', Biology='$biology', ComputerScience='$computerScience', Electronics='$electronics', Electrical='$electrical', Statistics='$statistics', InformationTechnology='$informationTechnology', TotalMarks='$totalMarksTwelve', MaximumMarks='$maximumMarksTwelve', Percentage='$percentageTwelve' WHERE AdharNumber='$editId'";
       mysqli_query($con, $update_marks_query_twelve);

       // Update college enrollment details
        $college_name = $_POST['CollegeName'];
        $college_id = $_POST['CollegeID'];
        $course_name = $_POST['CourseName'];
        $duration_in_years = $_POST['DurationInYears'];
        $seat_type = $_POST['SeatType'];
        $fees = $_POST['Fees'];
    
        $update_enrollment_query = "UPDATE CollegeEnrollment 
                                SET CollegeName='$college_name', CollegeID='$college_id', CourseName='$course_name', 
                                    DurationInYears='$duration_in_years', SeatType='$seat_type', Fees='$fees' 
                                WHERE AdharNumber='$editId'";
        mysqli_query($con, $update_enrollment_query);

        // Update student accommodation details
        $accommodation_type = $_POST['AccommodationType'];
        $address = $_POST['Address'];
        $pincode = $_POST['Pincode'];
        $guardian_phone = $_POST['GuardianPhone'];
    
        $update_accommodation_query = "UPDATE StudentAccommodation 
                                    SET AccommodationType='$accommodation_type', Address='$address', 
                                        Pincode='$pincode', GuardianPhone='$guardian_phone' 
                                    WHERE AdharNumber='$editId'";
        mysqli_query($con, $update_accommodation_query);

        // Update college bill details
        $status = $_POST['Status'];
        $amount_paid = $_POST['AmountPaid'];
        $pending_amount = $_POST['PendingAmount'];
        $date_of_payment = $_POST['DateOfPayment'];
    
        $update_bill_query = "UPDATE CollegeBill 
                          SET Status='$status', AmountPaid='$amount_paid', 
                              PendingAmount='$pending_amount', DateOfPayment='$date_of_payment' 
                          WHERE AdharNumber='$editId'";
        mysqli_query($con, $update_bill_query);


        // Redirect to the view page after updating
        echo "<script>alert('Details updated successfully!');</script>";
        echo "<script>window.location='view.php';</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        h1, h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        label {
            font-size: 20px;
            display: inline-block;
            width: 200px; /* Adjust the width as needed */
            text-align: right; /* Align labels to the right */
            margin-right: 20px; /* Add some space between label and text box */
        }
        input[type="text"], input[type="date"], input[type="email"], select, input[type="number"] {
            width: 300px;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button[type="submit"] {
            padding: 15px 30px;
            font-size: 20px;
            cursor: pointer;
            border: none;
            border-radius: 10px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        form {
        margin: 0 auto;
        max-width: 800px;
        }
        h2 {
        margin-top: 40px;
        }
        input[type="hidden"] {
            display: none; /* Hide the hidden input field */
        }
        select {
        width: 324px; /* Adjusted width to match text input fields */
        }

    </style>
</head>
<body>
    <h1>Update Student Details</h1>
    <form action="" method="post">
        <input type="hidden" name="AdharNumber" value="<?= $student['AdharNumber'] ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="Name" value="<?= $student['Name'] ?>" required><br>
        <label for="fathersName">Father's Name:</label>
        <input type="text" id="fathersName" name="FathersName" value="<?= $student['FathersName'] ?>" required><br>
        <label for="mothersName">Mother's Name:</label>
        <input type="text" id="mothersName" name="MothersName" value="<?= $student['MothersName'] ?>" required><br>
        <label for="dateOfBirth">Date of Birth:</label>
        <input type="date" id="dob" name="DOB" value="<?= $student['DOB'] ?>" required><br>
        <label for="category">Category:</label>
        <input type="text" id="category" name="Category" value="<?= $student['Category'] ?>" required><br>
        <label for="religion">Religion:</label>
        <input type="text" id="religion" name="Religion" value="<?= $student['Religion'] ?>" required><br>
        <label for="caste">Caste:</label>
        <input type="text" id="caste" name="Caste" value="<?= $student['Caste'] ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="EmailID" value="<?= $student['EmailID'] ?>" required><br>
        <label for="state">State:</label>
        <input type="text" id="state" name="State" value="<?= $student['State'] ?>" required><br>
        <label for="tenthMedium">10th Medium:</label>
        <input type="text" id="tenthMedium" name="Study10Medium" value="<?= $student['Study10Medium'] ?>" required><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="PhoneNumber" value="<?= $student['PhoneNumber'] ?>" required><br>
        <label for="gender">Gender:</label>
        <select id="gender" name="Gender" required>
            <option value="male" <?= ($student['Gender'] == 'male') ? 'selected' : '' ?>>Male</option>
            <option value="female" <?= ($student['Gender'] == 'female') ? 'selected' : '' ?>>Female</option>
            <option value="other" <?= ($student['Gender'] == 'other') ? 'selected' : '' ?>>Other</option>
        </select><br>
        <label for="studyPlace">Study Place:</label>
        <select id="studyPlace" name="StudyPlace" required>
            <option value="urban" <?= ($student['StudyPlace'] == 'urban') ? 'selected' : '' ?>>Urban</option>
            <option value="rural" <?= ($student['StudyPlace'] == 'rural') ? 'selected' : '' ?>>Rural</option>
        </select><br>
        <h1>Update Tenth Marks Details</h1>
        <label for="totalMarks">Total Marks:</label>
        <input type="number" id="totalMarks" name="TotalMarks" value="<?= isset($marks_data['TotalMarks']) ? $marks_data['TotalMarks'] : '' ?>" required><br>
        <label for="maximumMarks">Maximum Marks:</label>
        <input type="number" id="maximumMarks" name="MaximumMarks" value="<?= isset($marks_data['MaximumMarks']) ? $marks_data['MaximumMarks'] : '' ?>" required><br>
        <label for="percentage">Percentage:</label>
        <input type="text" id="percentage" name="Percentage" value="<?= isset($marks_data['Percentage']) ? $marks_data['Percentage'] . '%' : '' ?>" readonly><br>
        <!-- Twelve Marks Details -->
        <h2>Update Twelve Marks Details</h2>
        <label for="english">English:</label>
        <input type="number" id="english" name="English" value="<?= $marks_data_twelve['English'] ?>" required><br>
        <label for="language">Language:</label>
        <input type="number" id="language" name="Language" value="<?= $marks_data_twelve['Language'] ?>" required><br>
        <label for="physics">Physics:</label>
        <input type="number" id="physics" name="Physics" value="<?= $marks_data_twelve['Physics'] ?>" required><br>
        <label for="chemistry">Chemistry:</label>
        <input type="number" id="chemistry" name="Chemistry" value="<?= $marks_data_twelve['Chemistry'] ?>" required><br>
        <label for="mathematics">Mathematics:</label>
        <input type="number" id="mathematics" name="Mathematics" value="<?= $marks_data_twelve['Mathematics'] ?>" required><br>
        <label for="biology">Biology:</label>
        <input type="number" id="biology" name="Biology" value="<?= $marks_data_twelve['Biology'] ?>"><br>
        <label for="computerScience">Computer Science:</label>
        <input type="number" id="computerScience" name="ComputerScience" value="<?= $marks_data_twelve['ComputerScience'] ?>"><br>
        <label for="electronics">Electronics:</label>
        <input type="number" id="electronics" name="Electronics" value="<?= $marks_data_twelve['Electronics'] ?>"><br>
        <label for="electrical">Electrical:</label>
        <input type="number" id="electrical" name="Electrical" value="<?= $marks_data_twelve['Electrical'] ?>"><br>
        <label for="statistics">Statistics:</label>
        <input type="number" id="statistics" name="Statistics" value="<?= $marks_data_twelve['Statistics'] ?>"><br>
        <label for="informationTechnology">Information Technology:</label>
        <input type="number" id="informationTechnology" name="InformationTechnology" value="<?= $marks_data_twelve['InformationTechnology'] ?>"><br>
        <label for="totalMarksTwelve">Total Marks:</label>
        <input type="number" id="totalMarksTwelve" name="TotalMarksTwelve" value="<?= isset($marks_data_twelve['TotalMarks']) ? $marks_data_twelve['TotalMarks'] : '' ?>" required><br>
        <label for="maximumMarksTwelve">Maximum Marks:</label>
        <input type="number" id="maximumMarksTwelve" name="MaximumMarksTwelve" value="600" readonly><br>
        <label for="percentageTwelve">Percentage:</label>
        <input type="text" id="percentageTwelve" name="PercentageTwelve" value="<?= isset($marks_data_twelve['Percentage']) ? $marks_data_twelve['Percentage'] . '%' : '' ?>" readonly><br>
        <!-- College Enrollment Details... -->
        <h2>Update College Details</h2>
        <label for="collegeName">College Name:</label>
        <input type="text" id="collegeName" name="CollegeName" value="<?= $enrollment_data['CollegeName'] ?>" required><br>
        <label for="collegeID">College ID:</label>
        <input type="number" id="collegeID" name="CollegeID" value="<?= $enrollment_data['CollegeID'] ?>" required><br>
        <label for="courseName">Course Name:</label>
        <input type="text" id="courseName" name="CourseName" value="<?= $enrollment_data['CourseName'] ?>" required><br>
        <label for="durationInYears">Duration (in years):</label>
        <input type="number" id="durationInYears" name="DurationInYears" value="<?= $enrollment_data['DurationInYears'] ?>" required><br>
        <label for="seatType">Seat Type:</label>
        <select id="seatType" name="SeatType" required>
            <option value="Management" <?= ($enrollment_data['SeatType'] == 'Management') ? 'selected' : '' ?>>Management</option>
            <option value="GovtAllotted" <?= ($enrollment_data['SeatType'] == 'GovtAllotted') ? 'selected' : '' ?>>Govt Allotted</option>
        </select><br>
        <label for="fees">Fees:</label>
        <input type="number" id="fees" name="Fees" value="<?= $enrollment_data['Fees'] ?>" required><br>

        <!-- Student Accommodation Details -->
        <h2>Student Accommodation Details</h2>
        <label for="accommodationType">Accommodation Type:</label>
        <select id="accommodationType" name="AccommodationType" required>
            <option value="Hostel" <?= ($accommodation_data['AccommodationType'] == 'Hostel') ? 'selected' : '' ?>>Hostel</option>
            <option value="PG" <?= ($accommodation_data['AccommodationType'] == 'PG') ? 'selected' : '' ?>>PG</option>
            <option value="Home" <?= ($accommodation_data['AccommodationType'] == 'Home') ? 'selected' : '' ?>>Home</option>
        </select><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="Address" value="<?= $accommodation_data['Address'] ?>" required><br>
        <label for="pincode">Pincode:</label>
        <input type="number" id="pincode" name="Pincode" value="<?= $accommodation_data['Pincode'] ?>" required><br>
        <label for="guardianPhone">Guardian Phone:</label>
        <input type="text" id="guardianPhone" name="GuardianPhone" value="<?= $accommodation_data['GuardianPhone'] ?>"><br>

        <!-- College Bill Details -->
        <h2>College Bill Details</h2>
        <label for="status">Status:</label>
        <select id="status" name="Status" required>
            <option value="Paid" <?= ($bill_data['Status'] == 'Paid') ? 'selected' : '' ?>>Paid</option>
            <option value="Pending" <?= ($bill_data['Status'] == 'Pending') ? 'selected' : '' ?>>Pending</option>
        </select><br>
        <label for="amountPaid">Amount Paid:</label>
        <input type="number" id="amountPaid" name="AmountPaid" value="<?= $bill_data['AmountPaid'] ?>" required><br>
        <label for="pendingAmount">Pending Amount:</label>
        <input type="number" id="pendingAmount" name="PendingAmount" value="<?= $bill_data['PendingAmount'] ?>" required><br>
        <label for="dateOfPayment">Date of Payment:</label>
        <input type="date" id="dateOfPayment" name="DateOfPayment" value="<?= $bill_data['DateOfPayment'] ?>"><br>

    
        <button type="submit" name="update">Save</button>
    </form>
</body>
<script>
    document.getElementById('totalMarks').addEventListener('input', calculatePercentage);

    function calculatePercentage() {
        let totalMarks = parseFloat(document.getElementById('totalMarks').value);
        let maximumMarks = parseFloat(document.getElementById('maximumMarks').value);

        if (totalMarks && maximumMarks) {
            let percentage = (totalMarks / maximumMarks) * 100;
            document.getElementById('percentage').value = percentage.toFixed(2) + '%';
        } else {
            document.getElementById('percentage').value = ''; // Clear the percentage field if total marks or maximum marks are not filled
        }
    }

    document.getElementById('totalMarksTwelve').addEventListener('input', calculatePercentageTwelve);
    document.getElementById('maximumMarksTwelve').addEventListener('input', calculatePercentageTwelve);

    function calculatePercentageTwelve() {
        let totalMarksTwelve = parseFloat(document.getElementById('totalMarksTwelve').value);
        let maximumMarksTwelve = parseFloat(document.getElementById('maximumMarksTwelve').value);

        if (totalMarksTwelve && maximumMarksTwelve) {
            let percentageTwelve = (totalMarksTwelve / maximumMarksTwelve) * 100;
            document.getElementById('percentageTwelve').value = percentageTwelve.toFixed(2) + '%';
        } else {
            document.getElementById('percentageTwelve').value = ''; // Clear the percentage field if total marks or maximum marks are not filled
        }
    }
</script>
</body>
</html>
