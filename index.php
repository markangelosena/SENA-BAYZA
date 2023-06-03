<?php
// Check if the user is already logged in, redirect to the dashboard
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Music Web Application - Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <h1>Welcome to Music Web Application</h1>
    </header>

    <main>
        <section class="login-section">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <button type="submit">Login</button>
                <button type="close">Close</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Music Web Application. All rights reserved.</p>
    </footer>
</body>
</html>
