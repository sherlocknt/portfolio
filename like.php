<?php
// Connect to the database
$db = new mysqli('localhost', 'root', '', 'likee');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get the image ID from the POST request
$data = json_decode(file_get_contents("php://input"));
$imageId = $data->imageId;

// Update the likes in the database
$db->query("UPDATE images SET likes = likes + 1 WHERE id = $imageId");

// Get the updated likes count
$result = $db->query("SELECT likes FROM images WHERE id = $imageId");
$row = $result->fetch_assoc();
$likes = $row['likes'];

// Close the database connection
$db->close();

// Return the updated likes count as JSON
echo json_encode(["likes" => $likes]);
