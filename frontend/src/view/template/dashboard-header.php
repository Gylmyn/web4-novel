<?php
session_start();

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('location: ../homepage/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>
    <link href="../../style/output.css" rel="stylesheet">


    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.min.css"> -->

</head>

<body class="font-poppins">

        <div class="flex justify-between items-center py-4 px-12 bg-secondary">
            <span class="text-lg font-bold">Dashboard</span>
            <ul class="flex items-center">
                
                <li class="">
                    <form action="../template/dashboard-header.php" method="POST">
                        <button type="submit" name="logout" class="text-white border-2 border-primary py-2 px-6 rounded">logout</button>
                    </form>
                </li>
            </ul>
        </div>

    <main class="flex flex-nowrap " style="min-height: calc(100vh - 80px);">
        <div class="flex flex-col flex-shrink-0 text-white " style="width: 280px; background-color: #584881;">
            <a href="/" class="items-center px-6 pt-2 text-white text-decoration-none">
                <span class="block text-lg font-bold"><?= $_SESSION["username"] ?></span>
                <span class="">Administrator</span>
            </a>
            <hr class="my-4">
           
        </div>
        <div class="flex flex-col w-full">
        