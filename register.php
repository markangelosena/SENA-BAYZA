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

// Handle user registration functionality
session_start();

// Redirect to the dashboard if the user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

// Check if the registration form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the username and password (add your own validation logic)

    // Check if the username is already taken (dummy check for demonstration)
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $errorMessage = 'Username is already taken.';
    } else {
        // Create a new user
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        mysqli_query($connection, $query);

        // Store the username in the session and redirect to the dashboard
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    }
}

?>
