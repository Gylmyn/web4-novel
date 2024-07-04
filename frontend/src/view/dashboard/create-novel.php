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

<body class="font-poppins h-screen bg-gray-100">
    <div class="flex justify-center items-center h-full">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold my-6 text-center">Tambah Novel</h2>
            <img src="../../assets/images/logo.png" alt="err" width=100 class="mx-auto">
            <form class="p-12"  action="../../class/add-novel.php" method="POST" enctype="multipart/form-data" class="">
                <div>
                    <label for="cover" class="block text-lg font-bold text-gray-700 py-2">Cover</label>
                    <input type="text" name="cover" id="cover" placeholder="Enter Novel Cover Link..."  class="mt-1 block w-full px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" required>
                </div>

                <div>
                    <label for="title" class="block text-lg font-bold text-gray-700 py-2 ">Title</label>
                    <input type="text" name="title" id="title"  placeholder="Enter Novel Title ..."  class="mt-1 block w-full px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" required>
                </div>

                <div>
                    <label for="author" class="block text-lg font-bold text-gray-700 py-2 ">Author</label>
                    <input type="text" name="author" id="author"  placeholder="Enter Novel Author..."  class="mt-1 block w-full px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" required>
                </div>

                <div>
                    <label for="genre" class="block text-lg font-bold text-gray-700 py-2 ">Genre</label>
                    <select name="genre_id" id="genre" class="mt-1 block w-full px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" required>
                        <?php foreach ($genres as $genre) : ?>
                            <option value="<?php echo $genre['id']; ?>"><?php echo $genre['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <input style="margin-top: 20px;" type="submit" value="Tambah Novel" class="w-full bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                </div>
            </form>
        </div>
    </div>
</body>

</html>