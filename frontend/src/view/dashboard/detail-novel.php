<?php
include "../../class/novels.php";
include "../../class/db-connection.php";

$db = new Database();
$conn = $db->getConnection();

$novel_id = $_GET['id'];
$novel = getNovelById($conn, $novel_id);
$chapters = getChaptersByNovelId($conn, $novel_id);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../style/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <title>Detail Novel</title>
    <style>
        table {
            width: 96%;
            border-collapse: collapse;
            margin-bottom: 20px;
            margin-left: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .chapter-title {
            font-size: 1.2em;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- detail_novel.php -->
    <?php if ($novel) : ?>
        <!-- Informasi novel -->
        <!-- Daftar chapters -->
        <div class="flex justify-between items-center py-6 px-12">
            <h1 class="text-xl font-bold">Daftar Data Novel</h1>
            <a href="create-bab.php?id=<?php echo $novel['id']; ?>" class="text-white bg-secondary py-2 px-6 my-4 rounded">Tambah Chapter</a>
        </div>
        <?php if (count($chapters) > 0) : ?>
            <!-- Tabel untuk menampilkan chapters -->
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($chapters as $chapter) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($chapter["id"]); ?></td>
                            <td><?php echo htmlspecialchars($chapter["title"]); ?></td>
                            <td><?php echo nl2br(htmlspecialchars($chapter["content"])); ?></td>
                            <td>
                                <a class="text-white p-2 rounded-lg" style="background-color: cyan;" href="edit-novel.php?id=<?php echo $novel['id']; ?>"> <i class="bi bi-pencil-square"></i></a>
                                <a class="text-white p-2 rounded-lg" style="background-color: red;" href="../../class/delete-chapter.php?id=<?php echo $chapter['id']; ?>"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No chapters found.</p>
        <?php endif; ?>
    <?php else : ?>
        <p>Novel not found.</p>
    <?php endif; ?>

</body>

</html>