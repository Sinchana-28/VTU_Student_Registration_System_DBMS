<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <script>
        // Function to display popup message and redirect to homepage after a delay
        function logoutMessage() {
            alert("Logged out from admin.");
            setTimeout(function() {
                window.location.href = "index.html"; // Redirect to homepage after 2 seconds
            }); // Adjust delay time in milliseconds (2000ms = 2 seconds)
        }

        // Call the function when the page loads
        window.onload = logoutMessage;
    </script>
</head>
</html>
