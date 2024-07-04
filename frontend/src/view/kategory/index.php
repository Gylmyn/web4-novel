<?php
include "../../class/novels.php";
include "../../class/db-connection.php";

$db = new Database();
$conn = $db->getConnection();
$novels = getNovelsByGenres($conn);

// Inisialisasi array untuk menyimpan novel berdasarkan genre
$groupedNovels = array();
foreach ($novels as $novel) {
    $groupedNovels[$novel['genre']][] = $novel;
}

// Ambil genre untuk dropdown
$genres = getAllGenres($conn);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../style/output.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class="font-poppins bg-[#f6f3fd]">
    <?php include "../template/navbar.php"; ?>
    <div class="w-full mb-6 h-auto">
        <div class="flex flex-col bg-[#ffffff] border-2 m-12 h-full gap-6 pb-4">
            <div>
                <p class="text-center text-3xl font-bold pt-6 max-w-sm mx-auto">Temukan Novel dengan Gendre yang kamu suka</p>
            </div>
            <?php if (count($novels) > 0) : ?>
                <?php foreach ($groupedNovels as $genre => $novels) : ?>
                    <div class="py-6 px-12">
                        <button class="text-secondary border-2 border-secondary py-2 px-6"><?php echo htmlspecialchars($genre); ?></button>
                    </div>
                    <div class="grid lg:grid-cols-4 grid-cols-2 gap-4 justify-center">
                        <?php foreach ($novels as $novel) : ?>
                            <a href="../../view/novel-detail/index.php?id=<?php echo $novel['id']; ?>" class="card border-2 shadow mx-auto p-4 cursor-pointer transition duration-500 ease-in-out hover:bg-primary">
                                <img src="<?php echo htmlspecialchars($novel['cover']); ?>" alt="Cover" width="220">
                                <button class="text-white bg-secondary py-2 px-6 my-4 rounded"><?php echo htmlspecialchars($novel['genre']); ?></button>
                                <p class="font-bold"><?php echo htmlspecialchars($novel['title']); ?></p>
                                <p class="text-gray-500"><?php echo htmlspecialchars($novel['author']); ?></p>
                                <div class="rating lg:flex hidden justify-between mx-2 items-center pt-6">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                        </svg>
                                        <!-- Tambahkan lebih banyak SVG untuk bintang lainnya -->
                                    </div>
                                    <p>4.4</p>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Tidak ada novel yang ditemukan</p>
            <?php endif; ?>
            <?php $conn->close(); ?>
        </div>
    </div>
    <?php include "../template/footer.php"; ?>
</body>

</html>