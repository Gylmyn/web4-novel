<?php
include("../../data/index.php");

$sql = "SELECT * FROM user ";
$query = mysqli_query($db, $sql);

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_object($query)) {
        $data['status'] = 'ok';
        $data['result'][] = $row;
    }
} else {
    $data['status'] = '400';
    $data['result'][] = "Data belum ada";
}

print_r(json_encode($data));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <li><a href="../getData/index.php">getData</a></li>
        <li><a href="../insertData/index.php">insertData</a></li>

    </ul>
</body>

</html>