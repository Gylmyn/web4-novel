<?php
include "./db-connection.php";
include "./novels.php";

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre_id = $_POST['genre_id'];

    // Handle file upload
    $cover = $_POST['existing_cover'];
    if (isset($_FILES['cover']) && $_FILES['cover']['error'] == 0) {
        $cover = 'uploads/' . basename($_FILES['cover']['name']);
        move_uploaded_file($_FILES['cover']['tmp_name'], $cover);
    }

    $sql = "UPDATE novel SET cover=?, title=?, author=?, genre_id=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssii", $cover, $title, $author, $genre_id, $id);

    if ($stmt->execute()) {
        header('Location:test.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM novel WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $novel = $result->fetch_assoc();
}

$genres = getAllGenres($conn);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Novel</title>
</head>
<body>
    <h1>Edit Novel</h1>
    <form action="./edit-novel.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $novel['id']; ?>">
        <label for="cover">Cover:</label>
        <input type="file" name="cover" id="cover"><br>
        <img src="<?php echo $novel['cover']; ?>" alt="Cover" style="width: 100px;"><br>
        <input type="hidden" name="existing_cover" value="<?php echo $novel['cover']; ?>">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?php echo $novel['title']; ?>" required><br>
        <label for="author">Author:</label>
        <input type="text" name="author" id="author" value="<?php echo $novel['author']; ?>" required><br>
        <label for="genre">Genre:</label>
        <select name="genre_id" id="genre" required>
            <?php foreach ($genres as $genre): ?>
                <option value="<?php echo $genre['id']; ?>" <?php echo ($genre['id'] == $novel['genre_id']) ? 'selected' : ''; ?>><?php echo $genre['name']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" value="Update Novel">
    </form>
</body>
</html>
