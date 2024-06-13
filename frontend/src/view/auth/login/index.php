<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../style/output.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="max-w-full h-screen flex font-poppins">
        <div class="h-full w-1/2 bg-secondary flex justify-center items-center">
            <img src="../../../assets/images/white-logo.png" alt="err" width=440>
        </div>
        <div class="h-full flex flex-col justify-center mx-auto">
            <p class="font-bold pb-20 text-center">Welkam to Mobile Legends</p>
            <div class="w-full bg-secondary px-4 py-2 flex gap-6 rounded font-semibold">
                <a href="#" class="bg-white text-secondary px-10 rounded">Login</a>
                <a href="../register/index.php" class="text-white px-10">Register</a>
            </div>
            <form action="" class="pt-6">
                <div class="flex flex-col pb-6">
                    <label class="font-semibold pb-3">Username</label>
                    <input placeholder="Enter Your Username" type="text" class="focus:outline-secondary focus:outline-2 outline-secondary outline py-2 rounded-md px-4">
                </div>
                <div class="flex flex-col">
                    <label class="font-semibold pb-3">Password</label>
                    <input placeholder="Enter Your Password" type="password" class="focus:outline-secondary focus:outline-2 outline-secondary outline py-2 rounded-md px-4">
                </div>
                <div class="flex items-center gap-2 pt-6">
                    <input type="checkbox" class="">
                    <label class="font-normal ">Remember Me</label>
                </div>

                <div class="flex items-center  pt-12">
                    <input type="submit" value="Login" class="bg-secondary w-full py-2 rounded-md font-bold text-white">
                </div>
            </form>
        </div>
    </div>
</body>

</html>