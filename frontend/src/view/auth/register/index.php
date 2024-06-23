<?php
include "../../../data/index.php";

$register_message = "";


if (isset($_POST['register'])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($username) || empty($email) || empty($password)) {
        $register_message = "Username, Email, dan Password tidak boleh kosong";
    } else {
        try {
            $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
            if ($db->query($sql)) {
                $register_message = "Daftar Berhasil, Silahkan Login";
            } else {
                $register_message = "Daftar Gagal, Silahkan Ulangi";
            }
        } catch (mysqli_sql_exception $e) {
            $register_message = "Username Sudah Digunakan";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../style/output.css" rel="stylesheet">
    <title>Register</title>
</head>

<body>
    <div class="max-w-full h-screen flex font-poppins">
        <div class="h-full w-1/2 bg-secondary flex justify-center items-center">
            <img src="../../../assets/images/auth-logo.png" alt="err" width=440>
        </div>
        <div class="h-full flex flex-col justify-center mx-auto">
            <p class="font-bold pb-20 text-center">Welcome to QNov</p>
            <div class="w-full bg-secondary px-4 py-2 flex gap-6 rounded font-semibold">
                <a href="../login/index.php" class=" text-white px-10">Login</a>
                <a href="#" class="bg-white text-secondary px-10 rounded">Register</a>
            </div>
            <form action="../../../view/auth/register/index.php" class="pt-6" method="POST">
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <?= $register_message ?>
                </div>
                <div class="flex flex-col pb-6">
                    <label class="font-semibold pb-3">Username</label>
                    <input name="username" placeholder="Enter Your Username" type="text" class="focus:outline-secondary focus:outline-2 outline-secondary outline py-2 rounded-md px-4">
                </div>
                <div class="flex flex-col pb-6">
                    <label class="font-semibold pb-3">Email</label>
                    <input name="email" placeholder="Enter Your Email" type="email" class="focus:outline-secondary focus:outline-2 outline-secondary outline py-2 rounded-md px-4">
                </div>
                <div class="flex flex-col">
                    <label class="font-semibold pb-3">Password</label>
                    <input name="password" placeholder="Enter Your Password" type="password" class="focus:outline-secondary focus:outline-2 outline-secondary outline py-2 rounded-md px-4">
                </div>
                <div class="flex items-center gap-2 pt-6">
                    <input type="checkbox" class="">
                    <label class="font-normal ">Remember Me</label>
                </div>

                <div class="flex items-center  pt-12">
                    <input type="submit" value="Register" name="register" class="bg-secondary w-full py-2 rounded-md font-bold text-white">
                </div>
            </form>
        </div>
    </div>
</body>

</html>