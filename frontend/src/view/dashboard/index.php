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

<?php include '../template/dashboard-header.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Novel List</title>
    <style>
        table {
            width: 90%;
            border-collapse: collapse;
            margin: 20px;

            /* margin-right: 20px; */
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

        .genre-label {
            font-size: 1.5em;
        }
    </style>
</head>

<body>
    <div class="flex justify-between items-center py-6 px-12" >
        <h1 class="text-xl font-bold">Daftar Data Novel</h1>
        <a href="create-novel.php" class="text-white bg-secondary py-2 px-6 my-4 rounded">Tambah Novel</a>
    </div>
    <hr class="pb-4">
    <?php if (count($novels) > 0) : ?>
        <?php $counter = 1; // Inisialisasi variabel counter 
        ?>
        <?php foreach ($groupedNovels as $genre => $novels) : ?>
            <div class="pl-6">
                <button class="text-secondary border-2 border-secondary py-2 px-6" ><?php echo htmlspecialchars($genre); ?></button>
            </div>
            <table class="">
                <thead >
                    <tr class="bg-primary">
                        <th class="text-center">No</th>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($novels as $novel) : ?>
                        <tr class="">
                            <td class="text-center"><?php echo $counter++; ?></td>
                            <td><img src="<?php echo htmlspecialchars($novel["cover"]); ?>" alt="Cover" style="width: 100px;"></td>
                            <td class=""><?php echo htmlspecialchars($novel["title"]); ?></td>
                            <td class="max-w-sm"><?php echo htmlspecialchars($novel["author"]); ?></td>
                            <td><?php echo htmlspecialchars($novel["genre"]); ?></td>
                            <td class="text-center">
                                <a class="text-white m-2 p-2 rounded-lg" style="background-color: green;" href="detail-novel.php?id=<?php echo $novel['id']; ?>">Bab <i class="bi bi-book"></i></a>
                                <a class="text-white p-2 rounded-lg" style="background-color: cyan;" href="edit-novel.php?id=<?php echo $novel['id']; ?>"> <i class="bi bi-pencil-square"></i></a>             
                                <a class="text-white p-2 rounded-lg" style="background-color: red;" href="../../class/delete-novel.php?id=<?php echo $novel['id']; ?>"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Tidak ada novel yang ditemukan</p>
    <?php endif; ?>
    <?php $conn->close(); ?>
</body>

</html>