<?php
// Check if the user is logged in, otherwise redirect to the login page
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Display the dashboard or home page
?>

<!DOCTYPE html>
<html>
<head>
    <title>Music Web Application - Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    </header>

    <main>
        <section class="dashboard-content">
            <!-- Display user-specific content or features -->
            <h2>Dashboard</h2>
            <p><h3>This is your dashboard.</h3></p>

            <!-- Example of using the CRUD functions for songs -->
            <?php
            include('songcrud.php');

            // Add a new song
            $newSongId = createSong('Song Title', 'Artist Name', 'Album Title', 'Genre');

            // Update a song
            updateSong($newSongId, 'New Song Title', 'New Artist Name', 'New Album Title', 'New Genre');

            // Get all songs
            $songs = getAllSongs();
            foreach ($songs as $song) {
                echo "<p>{$song['title']} by {$song['artist']} ---------- Genre: {$song['genre']}</p>";
            }   

            // Delete a song
            deleteSong($newSongId);
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Music Web Application. All rights reserved.</p>
    </footer>
</body>
</html>
