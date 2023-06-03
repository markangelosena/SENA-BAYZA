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

// Function to create a new song
function createSong($title, $artist, $album, $genre) {
    global $connection;
    $query = "INSERT INTO song (title, artist, album, genre) VALUES ('$title', '$artist', '$album', '$genre')";
    mysqli_query($connection, $query);
    return mysqli_insert_id($connection);
}

// Function to retrieve all songs   
function getAllSongs() {
    global $connection;
    $query = "SELECT * FROM song";
    $result = mysqli_query($connection, $query);
    $songs = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $songs[] = $row;
    }
    return $songs;
}

// Function to update a song
function updateSong($id, $title, $artist, $album, $genre) {
    global $connection;
    $query = "UPDATE song SET title='$title', artist='$artist', album='$album', genre='$genre' WHERE id=$id";
    mysqli_query($connection, $query);
}

// Function to delete a song
function deleteSong($id) {
    global $connection;
    $query = "DELETE FROM song WHERE id=$id";
    mysqli_query($connection, $query);
}


?>
