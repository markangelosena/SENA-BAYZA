<?php
// Database configuration
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = 'root';
$dbName = 'musics';

// Create a database connection
$connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Handle user login functionality
session_start();

// Redirect to the dashboard if the user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the username and password (add your own validation logic)

    // Check if the credentials are valid (dummy check for demonstration)
    if ($username == 'admin' && $password == 'password') {
        // Store the username in the session and redirect to the dashboard
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        // Invalid credentials, display an error message
        $errorMessage = 'Invalid username or password.';
    }
}

// Close the database connection
mysqli_close($connection);

?>