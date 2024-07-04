<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "qnov";

$db = mysqli_connect($hostname, $username, $password, $database_name);

if ($db->connect_error) {
    echo "koneksi gagal";
    die("eror");
}

