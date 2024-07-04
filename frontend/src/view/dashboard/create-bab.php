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

    <title>Document</title>
</head>
<body class="font-poppins h-screen bg-gray-100">
    <div class="flex justify-center items-center h-full">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold my-6 text-center">Tambah Chapter</h2>
            <img src="../../assets/images/logo.png" alt="err" width=100 class="mx-auto">
            <form class="p-12"  action="../../class/add-bab.php" method="POST">
            <input type="hidden" name="novel_id" value="<?php echo $novel_id; ?>">
                <div>
                    <label for="title" class="block text-lg font-bold text-gray-700 py-2 ">Title</label>
                    <input type="text" name="title" id="title"  placeholder="Enter Novel Title ..."  class="mt-1 block w-full px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" required>
                </div>

                <div>
                    <label for="content" class="block text-lg font-bold text-gray-700 py-2 ">Content</label>
                    <textarea class="w-full h-24 mt-1  px-4 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" name="content" id="content" required placeholder="Write a Chapter"></textarea>
                </div>


                <div>
                    <input style="margin-top: 20px;" type="submit" value="Tambah Novel" class="w-full bg-primary text-white py-2 px-4 rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                </div>
            </form>
        </div>
    </div>
</body>
<!-- 
<body>
<h2>Add New Chapter</h2>
    <form action="../../class/add-bab.php" method="POST">
        <input type="hidden" name="novel_id" value="<?php echo $novel_id; ?>">
        <label for="title">Chapter Title:</label>
        <input type="text" name="title" id="title" required><br>
        <label for="content">Chapter Content:</label><br>
        <textarea name="content" id="content" rows="5" cols="50" required></textarea>
        <input type="submit" value="Add Chapter">
    </form>

</body> -->
</html>