<?php
include "./db-connection.php";

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre_id = $_POST['genre_id'];
    $cover = $_POST['cover'];

    // Handle file upload

    $sql = "INSERT INTO novel (cover, title, author, genre_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $cover, $title, $author, $genre_id);

    if ($stmt->execute()) {
        header('Location:/web4/frontend/src/view/dashboard/index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
