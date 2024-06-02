<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../style/output.css" rel="stylesheet">
  <title>Homepage</title>
</head>

<body>
  <header class="bg-primary shadow-2xl">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8 py-4">
      <div class="flex">
        <div class="flex-1 md:flex md:items-center md:gap-12">
          <a class="block text-teal-600" href="#">
            <span class="sr-only">Home</span>
            <img src="../../assets/images/logo.png" alt="error" width=100>
          </a>
        </div>

        <div class="md:flex md:items-center md:gap-12">
          <nav aria-label="Global" class="hidden md:flex gap-14">
            <div class="flex justify-end shadow">
              <input type="search" placeholder="Search..." class="relative focus:outline-secondary focus:outline-2 py-2 outline-secondary outline outline-2 rounded-md px-4 w-96">
              <span class="absolute bg-secondary px-4 py-2 rounded-r-md text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                  <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                </svg>

              </span>
            </div>
            <ul class="flex items-center gap-6 text-base font-poppins font-semibold ">
              <li>
                <a class="text-black transition hover:text-gray-500/75 " href="#"> Home </a>
              </li>

              <li>
                <a class="text-black transition hover:text-gray-500/75" href="#"> Komunitas </a>
              </li>

              <li>
                <a class="text-black transition hover:text-gray-500/75" href="#"> Kategory </a>
              </li>
            </ul>

          </nav>

          <div class="flex items-center gap-4">
            <div class="sm:flex sm:gap-4">
              <a class="rounded-md bg-transparent font-poppins font-semibold px-8 py-2 text-md text-black shadow border-2 border-secondary" href="../auth/login/index.php">
                Login
              </a>

              <div class="block md:hidden">
                <button class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
  </header>
</body>

</html>