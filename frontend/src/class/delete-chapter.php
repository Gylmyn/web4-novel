<?php
include "./db-connection.php";

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    // Ambil novel_id dari chapter yang akan dihapus
    $sql = "SELECT novel_id FROM chapter WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $chapter = $result->fetch_assoc();
    $novel_id = $chapter['novel_id'];

    // Hapus chapter dari database
    $sql = "DELETE FROM chapter WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect kembali ke halaman detail novel
        header("Location:/web4/frontend/src/view/dashboard/detail-novel.php?id=$novel_id");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
