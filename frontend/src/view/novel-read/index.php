<?php
include "../../class/novels.php";
include "../../class/db-connection.php";

$db = new Database();
$conn = $db->getConnection();

$chapter_id = $_GET['chapter_id'];
$chapter = getChapterById($conn, $chapter_id);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../style/output.css" rel="stylesheet">
    <title><?php echo htmlspecialchars($chapter['title']); ?> - Bacaan Bab</title>
</head>

<body class="font-poppins bg-[#f6f3fd]">
    <?php include '../template/navbar.php' ?>

    <!-- hero section -->
    <div class="w-full mb-6">
        <div class="p-9 mx-auto w-full">
            <p class="text-xl font-bold mx-auto text-center"><?php echo htmlspecialchars($chapter['title']); ?></p>
            <p class="max-w-lg text-justify mx-auto"><?php echo nl2br(htmlspecialchars($chapter['content'])); ?></p>
        </div>
    </div>
    <!-- end hero section -->

</body>
<?php include '../template/footer.php' ?>

</html>
