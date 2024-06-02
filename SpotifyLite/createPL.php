<?php
$servername = "localhost";
$username = "root"; // your MySQL username
$password = ""; // your MySQL password
$dbname = "spotifylite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$title = $_POST['title'];
$username = $_POST['username'];
$thumbnail = $_POST['thumbnail'];
$description = $_POST['description'];
$otherpageurl = $_POST['otherpageurl'];

// Insert data into database
$sql = "INSERT INTO playlist (title, username, thumbnail, description, otherpageurl) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $title, $username, $thumbnail, $description, $otherpageurl);

if ($stmt->execute()) {
    echo "New record created successfully";
    // Redirect to the main page after successful upload
    header("Location: HomeAfter.php");
    exit(); // Make sure to exit after redirection
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
