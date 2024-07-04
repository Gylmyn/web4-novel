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
    <title><?php echo htmlspecialchars($novel['title']); ?> - Detail Novel</title>
</head>

<body class="font-poppins bg-[#f6f3fd]">
    <?php include '../template/navbar.php' ?>

    <!-- hero section -->
    <div class="w-full mb-6" style="height: calc(100vh - 80px);">
        <div class="flex justify-start bg-[#ffffff] border-2 m-12 h-full gap-6">
            <img class="w-[512px] p-12 h-full" src="<?php echo htmlspecialchars($novel['cover']); ?>" alt="<?php echo htmlspecialchars($novel['title']); ?>">
            <div class="right-content pt-12 mr-6">
                <p class="font-bold text-4xl"><?php echo htmlspecialchars($novel['title']); ?></p>
                <p class="text-gray-500"><?php echo htmlspecialchars($novel['author']); ?></p>
                <button class="text-white bg-secondary py-2 px-6 my-4 rounded"><?php echo htmlspecialchars($novel['genre']); ?></button>
                <hr class="solid w-full mx-auto">
                <p class="font-bold text-3xl py-4">Sinopsis</p>
                <p class="text-xs text-gray-500/75 text-justify pb-4"><?php echo htmlspecialchars($novel['sinopsis']); ?></p>
                <hr class="solid w-full mx-auto">
                <div class="chapter pt-2">
                    <p class="font-bold pb-4">Pilih Untuk Memulai</p>
                    <div class="chapter-list grid grid-cols-4 gap-6">
                        <?php foreach ($chapters as $chapter) : ?>
                            <a href="../../view/novel-read/index.php?chapter_id=<?php echo $chapter['id']; ?>" class="border-2 text-center rounded-md border-secondary px-8 py-1 hover:text-white hover:bg-secondary transition duration-500 ease-in-out"><?php echo htmlspecialchars($chapter['title']); ?></a>
                        <?php endforeach; ?>
                    </div>
                    <button class="rounded-md bg-secondary text-white px-8 py-2 mt-6 w-full">Mulai Baca</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end hero section -->

</body>
<?php include '../template/footer.php' ?>

</html>
