<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search for Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        label {
            font-size: 20px;
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 300px;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button[type="submit"], button[type="button"] {
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s;
            margin-top: 20px;
        }
        button[type="submit"]:hover, button[type="button"]:hover {
            background-color: #45a049;
        }
        .student-details, .tenth-marks-details, .twelve-marks-details, .exam-results, .college-enrollment-details, .college-bill-details, .student-accommodation-details {
            margin: 20px auto;
            width: 60%;
            text-align: left;
        }
        .student-details table, .tenth-marks-details table, .twelve-marks-details table, .exam-results table, .college-enrollment-details table, .college-bill-details table, .student-accommodation-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .student-details th, .student-details td, .tenth-marks-details th, .tenth-marks-details td, 
        .twelve-marks-details th, .twelve-marks-details td, .exam-results th, .exam-results td,
        .college-enrollment-details th, .college-enrollment-details td, .college-bill-details th, .college-bill-details td, .student-accommodation-details th, .student-accommodation-details td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .student-details th, .tenth-marks-details th, .twelve-marks-details th, .exam-results th, .college-enrollment-details th, .college-bill-details th, .student-accommodation-details th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<?php
if(isset($_POST['search'])) {
    $host = 'localhost';
    $dbname = 'studentdb';
    $username = 'root';
    $password = 'sinchu_123';

    $con = mysqli_connect($host, $username, $password, $dbname);

    if(mysqli_connect_errno()) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }

    if(isset($_POST['viewId'])) {
        $viewId = $_POST['viewId'];
        
        // Retrieve student details
        $query_student = "SELECT * FROM students WHERE AdharNumber='$viewId'";
        $result_student = mysqli_query($con, $query_student);

        if(mysqli_num_rows($result_student) > 0) {
            $student = mysqli_fetch_assoc($result_student);
            ?>
            <h1>Personal Details</h1>
            <div class="student-details">
                <table>
                    <tr>
                        <th>Adhar Number</th>
                        <td><?= $student['AdharNumber'] ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><?= $student['Name'] ?></td>
                    </tr>
                    <tr>
                        <th>Father's Name</th>
                        <td><?= $student['FathersName'] ?></td>
                    </tr>
                    <tr>
                        <th>Mother's Name</th>
                        <td><?= $student['MothersName'] ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td><?= $student['DOB'] ?></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td><?= $student['Gender'] ?></td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td><?= $student['Category'] ?></td>
                    </tr>
                    <tr>
                        <th>Religion</th>
                        <td><?= $student['Religion'] ?></td>
                    </tr>
                    <tr>
                        <th>Caste</th>
                        <td><?= $student['Caste'] ?></td>
                    </tr>
                    <tr>
                        <th>Email ID</th>
                        <td><?= $student['EmailID'] ?></td>
                    </tr>
                    <tr>
                        <th>SSLC Studied State</th>
                        <td><?= $student['State'] ?></td>
                    </tr>    
                    <tr>
                        <th>SSLC Studied Place</th>
                        <td><?= $student['StudyPlace'] ?></td>
                    </tr>
                    <tr>
                        <th>SSLC Medium of Instruction</th>
                        <td><?= $student['Study10Medium'] ?></td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td><?= $student['PhoneNumber'] ?></td>
                    </tr>
                </table>
            </div>

            <?php
            // Retrieve tenth marks details
            $query_marks = "SELECT * FROM TenMarks WHERE AdharNumber='$viewId'";
            $result_marks = mysqli_query($con, $query_marks);

            if(mysqli_num_rows($result_marks) > 0) {
                $marks_data = mysqli_fetch_assoc($result_marks);
                ?>
                <h1>SSLC Marks Details</h1>
                <div class="tenth-marks-details">
                    <table>
                        <tr>
                            <th>Total Marks Obtained</th>
                            <td><?= $marks_data['TotalMarks'] ?></td>
                        </tr>
                        <tr>
                            <th>Maximum Marks</th>
                            <td><?= $marks_data['MaximumMarks'] ?></td>
                        </tr>
                        <tr>
                            <th>Percentage</th>
                            <td><?= $marks_data['Percentage'] ?></td>
                        </tr>
                    </table>
                </div>
            <?php
            } else {
                echo "<p>No tenth marks data available for this student.</p>";
            }
            // Retrieve twelve marks details
            $query_marks_twelve = "SELECT * FROM TwelveMarks WHERE AdharNumber='$viewId'";
            $result_marks_twelve = mysqli_query($con, $query_marks_twelve);

            if(mysqli_num_rows($result_marks_twelve) > 0) {
                $marks_data_twelve = mysqli_fetch_assoc($result_marks_twelve);
                ?>
                <h1>2nd PU Details</h1>
                <div class="twelve-marks-details">
                    <table>
                        <tr>
                            <th> 2nd PU Studied State</th>
                            <td><?= $marks_data_twelve['StudiedState'] ?></td>
                        </tr>
                        <tr>
                            <th>2nd PU College Name & Place</th>
                            <td><?= $marks_data_twelve['CollegeNamePlace'] ?></td>
                        </tr>
                        <tr>
                            <th>English</th>
                            <td><?= $marks_data_twelve['English'] ?></td>
                        </tr>
                        <tr>
                            <th>Language</th>
                            <td><?= $marks_data_twelve['Language'] ?></td>
                        </tr>
                        <tr>
                            <th>Physics</th>
                            <td><?= $marks_data_twelve['Physics'] ?></td>
                        </tr>
                        <tr>
                            <th>Chemistry</th>
                            <td><?= $marks_data_twelve['Chemistry'] ?></td>
                        </tr>
                        <tr>
                            <th>Mathematics</th>
                            <td><?= $marks_data_twelve['Mathematics'] ?></td>
                        </tr>
                        <tr>
                            <th>Biology</th>
                            <td><?= $marks_data_twelve['Biology'] ?></td>
                        </tr>
                        <tr>
                            <th>Computer Science</th>
                            <td><?= $marks_data_twelve['ComputerScience'] ?></td>
                        </tr>
                        <tr>
                            <th>Electronics</th>
                            <td><?= $marks_data_twelve['Electronics'] ?></td>
                        </tr>
                        <tr>
                            <th>Electrical</th>
                            <td><?= $marks_data_twelve['Electrical'] ?></td>
                        </tr>
                        <tr>
                            <th>Statistics</th>
                            <td><?= $marks_data_twelve['Statistics'] ?></td>
                        </tr>
                        <tr>
                            <th>Information Technology</th>
                            <td><?= $marks_data_twelve['InformationTechnology'] ?></td>
                        </tr>
                        <tr>
                            <th>Total Marks Obtained</th>
                            <td><?= $marks_data_twelve['TotalMarks'] ?></td>
                        </tr>
                        <tr>
                            <th>Maximum Marks</th>
                            <td><?= $marks_data_twelve['MaximumMarks'] ?></td>
                        </tr>
                        <tr>
                            <th>Percentage</th>
                            <td><?= $marks_data_twelve['Percentage'] ?></td>
                        </tr>
                    </table>
                </div>
            <?php
            } else {
                echo "<p>No twelve marks data available for this student.</p>";
            }

            // Retrieve exam results
            $query_results = "SELECT * FROM ExamResults WHERE AdharNumber='$viewId'";
            $result_results = mysqli_query($con, $query_results);

            if(mysqli_num_rows($result_results) > 0) {
                ?>
                <h1>Entrance Exam Details</h1>
                <div class="exam-results">
                    <table>
                        <?php
                        while($row = mysqli_fetch_assoc($result_results)) {
                            ?>
                            <tr>
                                <th>Entrance Exam Type</th>
                                <td><?= $row['ExamType'] ?></td>
                            </tr>
                            <tr>
                                <th>Rank Obtained</th>
                                <td><?= $row['ERank'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
                <?php
            } else {
                echo "<p>No exam results available for this student.</p>";
            }
            // Retrieve college enrollment details
            $query_enrollment = "SELECT * FROM CollegeEnrollment WHERE AdharNumber='$viewId'";
            $result_enrollment = mysqli_query($con, $query_enrollment);

            if(mysqli_num_rows($result_enrollment) > 0) {
                ?>
                <h1>Enrolled College Details</h1>
                <div class="college-enrollment-details">
                    <table>
                        <?php
                        while($row = mysqli_fetch_assoc($result_enrollment)) {
                            ?>
                            <tr>
                                <th>College Name</th>
                                <td><?= $row['CollegeName'] ?></td>
                            </tr>
                            <tr>
                                <th>College ID</th>
                                <td><?= $row['CollegeID'] ?></td>
                            </tr>
                            <tr>
                                <th>Course Name</th>
                                <td><?= $row['CourseName'] ?></td>
                            </tr>
                            <tr>
                                <th>Duration (Years)</th>
                                <td><?= $row['DurationInYears'] ?></td>
                            </tr>
                            <tr>
                                <th>Seat Type</th>
                                <td><?= $row['SeatType'] ?></td>
                            </tr>
                            <tr>
                                <th>Fees Amount</th>
                                <td><?= $row['Fees'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
        </table>
    </div>
    <?php
} else {
    echo "<p>No college enrollment details available for this student.</p>";
}

// Retrieve college bill details
$query_bill = "SELECT * FROM CollegeBill WHERE AdharNumber='$viewId'";
$result_bill = mysqli_query($con, $query_bill);

if(mysqli_num_rows($result_bill) > 0) {
    ?>
    <h1>Fees Payment Details</h1>
    <div class="college-bill-details">
        <table>
            <?php
            while($row = mysqli_fetch_assoc($result_bill)) {
                ?>
                <tr>
                    <th>Payment ID</th>
                    <td><?= $row['PaymentID'] ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><?= $row['Status'] ?></td>
                </tr>
                <tr>
                    <th>Amount Paid</th>
                    <td><?= $row['AmountPaid'] ?></td>
                </tr>
                <tr>
                    <th>Pending Amount</th>
                    <td><?= $row['PendingAmount'] ?></td>
                </tr>
                <tr>
                    <th>Date of Payment</th>
                    <td><?= $row['DateOfPayment'] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <?php
} else {
    echo "<p>No college bill details available for this student.</p>";
}

// Retrieve student accommodation details
$query_accommodation = "SELECT * FROM StudentAccommodation WHERE AdharNumber='$viewId'";
$result_accommodation = mysqli_query($con, $query_accommodation);

if(mysqli_num_rows($result_accommodation) > 0) {
    ?>
    <h1>Accommodation Details</h1>
    <div class="student-accommodation-details">
        <table>
            <?php
            while($row = mysqli_fetch_assoc($result_accommodation)) {
                ?>
                <tr>
                    <th>Accommodation Type</th>
                    <td><?= $row['AccommodationType'] ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?= $row['Address'] ?></td>
                </tr>
                <tr>
                    <th>Pincode</th>
                    <td><?= $row['Pincode'] ?></td>
                </tr>
                <tr>
                    <th>Guardian Phone Number</th>
                    <td><?= $row['GuardianPhone'] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <?php
} else {
    echo "<p>No student accommodation details available for this student.</p>";
}

            ?>
            <form action="update.php" method="get">
                <input type="hidden" name="editId" value="<?= $student['AdharNumber'] ?>">
                <button type="submit">Edit</button>
            </form>
            <form action="delete.php" method="get">
                <input type="hidden" name="deleteId" value="<?= $student['AdharNumber'] ?>">
                <button type="submit">Delete</button>
            </form>
            <?php
            } else {
                echo "<p>No student found with that Aadhar Number.</p>";
                ?>
                <form action="view.php" method="post">
                    <button type="submit">Search Again</button>
                </form>
                <?php
            }
        }
    } else {
    ?>
    <h1>Search for Student Details </h1>
    <form action="view.php" method="post">
        <label for="adharNumber">Enter Aadhar Number:</label>
        <input type="text" id="adharNumber" name="viewId" required><br>
        <button type="submit" name="search">Search</button>
        <a href="index.html"><button type="button">Back to Homepage</button></a>
    </form>
    <?php } ?>
</body>
</html>