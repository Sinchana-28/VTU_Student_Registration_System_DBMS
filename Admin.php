<?php
session_start();

// Include database connection
$host = 'localhost';
$dbname = 'studentdb';
$username = 'root';
$password = 'sinchu_123';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hardcoded admin credentials (replace these with your actual credentials)
    $admin_username = "admin";
    $admin_password = "admin@123";

    // Retrieve username and password from the form
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Validate admin credentials
    if ($input_username === $admin_username && $input_password === $admin_password) {
        // Admin authenticated successfully, set session variables
        $_SESSION['admin_loggedin'] = true;
        
        // Redirect to admin panel or any other page after successful login
        header("Location: admin_view.php");
        exit;
    } else {
        // Invalid credentials, show error message
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('adminbg.jpeg'); /* Path to your background image */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 300px; /* Adjust according to your preference */
            padding: 20px;
            border: 2px solid #ccc; /* Rectangular outline */
            background-color: rgba(240, 240, 240, 0.8); /* Light grey background color */
            border-radius: 10px; /* Rounded corners for the container */
        }

        .form-group {
            margin-bottom: 15px; /* Spacing between form elements */
        }

        label {
            display: inline-block;
            width: 150px; /* Adjust label width as needed */
            font-size: 20px; /* Increase font size */
            color: #000; /* Text color */
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 160px); /* Adjust input width, accounting for label width and margin */
            padding: 12px; /* Padding for input fields */
            border: none; /* Remove default border */
            background-color: rgba(255, 255, 255, 0.9); /* White background color with transparency */
            font-size: 20px; /* Increase font size */
            border-radius: 5px; /* Rounded corners for input fields */
            color: #000; /* Text color */
            outline: none; /* Remove outline */
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border: 1px solid #4CAF50; /* Border color on focus */
            border-radius: 5px; /* Rounded corners on focus */
        }

        .login-button {
            width: 100%; /* Full width button */
            padding: 15px; /* Padding for button */
            background-color: #4CAF50; /* Button color */
            color: white; /* Text color */
            border: none;
            border-radius: 5px; /* Rounded corners for button */
            cursor: pointer;
            font-size: 20px; /* Increase font size */
        }

        .login-button:hover {
            background-color: #45a049; /* Darker button color on hover */
        }
    </style>
</head>
<body>
    <div class="container"> <!-- Container for alignment -->
        <h2>Admin Login</h2>
        <?php if(isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required><br>
            </div>
            <div class="form-group">
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br><br>
            </div>
            <input type="submit" value="Login" class="login-button">
        </form>
    </div>
</body>
</html>

