<?php
// add_chapter.php
include "./db-connection.php";

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $novel_id = $_POST['novel_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO bab (novel_id, title, content) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $novel_id, $title, $content);

    if ($stmt->execute()) {
        header("Location:/web4/frontend/src/view/dashboard/detail-novel.php?id=$novel_id");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
