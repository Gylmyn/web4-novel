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
    <title>Homepage</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="font-poppins">
    <?php include '../template/navbar.php' ?>

    <!-- hero section -->
    <div class=" w-full bg-[#f6f3fd] relative" style="height: calc(100vh - 80px);">
        <img src="../../assets/images/hero-cright.png" alt="err" width=350 class="absolute bottom-0 right-0 hidden md:flex">
        <img src="../../assets/images/hero-cleft.png" alt="err" width=400 class="absolute bottom-0 left-0 hidden md:flex">
        <div class="flex flex-col lg:flex-row lg:gap-40 justify-center items-center h-full lg:mx-auto mx-6 py-6 lg:py-0">
            <div>
                <img class="p-16 lg:p-0" src="../../assets/images/hero.png" alt="err" width=480>
            </div>
            <div>
                <p class="font-semibold lg:text-6xl text-3xl">Every Page</p>
                <span class="flex items-center gap-2 py-4">
                    <p class="font-semibold lg:text-6xl text-4xl  text-[#C0A61E]">Brings</p>
                    <p class="font-semibold lg:text-6xl text-4xl text-secondary">Magic</p>
                </span>
                <!-- <img src="../../assets/images/bring-magic.png" alt="err" class="py-2 /> -->
                <p class="max-w-md py-6">Queen Novel adalah website bagi pencinta sastra untuk menemukan kisah menarik, imajinatif, dan menginspirasi. Kami siap menemani waktu luang Anda!!</p>
                <button class="border-2 border-secondary py-2 w-1/2  font-bold rounded-md hover:bg-secondary hover:text-[#ffffff]">Mulai Baca</button>
            </div>
        </div>
    </div>
    <!-- end hero section -->
    <!-- Popular section -->
    <div class="w-full bg-[#ffffff] h-auto py-12">
        <div class="lg:mx-28">
            <h1 class="font-bold text-3xl py-14 pl-4">Novel Terpopuler🔥</h1>
            <div class="grid lg:grid-cols-4 grid-cols-2 gap-6 justify-center">
                <?php foreach ($groupedNovels as $genre => $novels) : ?>
                    <?php foreach ($novels as $novel) : ?>
                        <a href="../../view/novel-detail/index.php?id=<?php echo $novel['id']; ?>" class="card border-2 shadow mx-auto p-4 cursor-pointer transition duration-500 ease-in-out hover:bg-primary">
                            <img class="max-h-[260px]" src="<?php echo htmlspecialchars($novel['cover']); ?>" alt="Cover" width="220">
                            <button class="text-white bg-secondary py-2 px-6 my-4 rounded"><?php echo htmlspecialchars($novel['genre']); ?></button>
                            <p class="font-bold max-w-[200px]"><?php echo htmlspecialchars($novel['title']); ?></p>
                            <p class="text-gray-500"><?php echo htmlspecialchars($novel['author']); ?></p>
                           
                        </a>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- end Popular section -->

    <div id="default-carousel" class="relative my-6" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="overflow-hidden relative h-[500px] ">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="../../assets/images/c-bg.png" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                <div class="absolute top-1/2 left-1/2  text-white -translate-x-1/2 -translate-y-1/2 w-4/5">
                    <div class="flex gap-4">
                        <img src="../../assets/images/exam.png" width=200 alt="" class="border-2 border-white">
                        <span>
                            <p class="text-2xl font-bold">"</p>
                            <p class="text-2xl font-bold py-4">The Prince Of Bayu Wijaya</p>
                            <p class="text-sm ">Berada di bawah pengaruh obat, membuat Helen tak bisa mengendalikan dirinya. Hingga seorang pria bernama Louis terpaksa membantunya dengan cara menghabiskan malam bersama. Sejak kejadian itu, Helen selalu menuduh Louis telah memanfaatkan keadaan. Sementara Louis terus menggunjing Helen sebagai 'wanita murahan' karena ternyata wanita itu sudah tak perawan. Suatu ketika takdir kembali mempertemukan dan menyatukan mereka ke dalam ikatan perjodohan dan pernikahan. Namun, sayangnya pernikahan tersebut hanya akan berusia 2 tahun saja setelah Louis membuat kontrak kesepakatan. Dalam hubungan itu perlakuan buruk terus Louis hujamkan kepada Helen. Tapi, siapa sangka jika ternyata kebenaran masa lalu Helen membuat pria itu berubah drastis. Bahkan Louis rela melakukan apapun untuk membatalkan kontrak pernikahan mereka dan mendapatkan hati seorang Helen yang tak mudah jatuh cinta pada siapa pun. Lalu bisakah Helen menerima Louis setelah semua penderitaan yang telah ia alami selama ini</p>
                        </span>
                    </div>

                </div>
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="../../assets/images/c-bg.png" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                <div class="absolute top-1/2 left-1/2  text-white -translate-x-1/2 -translate-y-1/2 w-4/5">
                    <div class="flex gap-4">
                        <img src="../../assets/images/exam.png" width=200 alt="" class="border-2 border-white">
                        <span>
                            <p class="text-2xl font-bold">"</p>
                            <p class="text-2xl font-bold py-4">The Prince Of Bayu Wijaya</p>
                            <p class="text-sm ">Berada di bawah pengaruh obat, membuat Helen tak bisa mengendalikan dirinya. Hingga seorang pria bernama Louis terpaksa membantunya dengan cara menghabiskan malam bersama. Sejak kejadian itu, Helen selalu menuduh Louis telah memanfaatkan keadaan. Sementara Louis terus menggunjing Helen sebagai 'wanita murahan' karena ternyata wanita itu sudah tak perawan. Suatu ketika takdir kembali mempertemukan dan menyatukan mereka ke dalam ikatan perjodohan dan pernikahan. Namun, sayangnya pernikahan tersebut hanya akan berusia 2 tahun saja setelah Louis membuat kontrak kesepakatan. Dalam hubungan itu perlakuan buruk terus Louis hujamkan kepada Helen. Tapi, siapa sangka jika ternyata kebenaran masa lalu Helen membuat pria itu berubah drastis. Bahkan Louis rela melakukan apapun untuk membatalkan kontrak pernikahan mereka dan mendapatkan hati seorang Helen yang tak mudah jatuh cinta pada siapa pun. Lalu bisakah Helen menerima Louis setelah semua penderitaan yang telah ia alami selama ini</p>
                        </span>
                    </div>

                </div>
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="../../assets/images/c-bg.png" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                <div class="absolute top-1/2 left-1/2  text-white -translate-x-1/2 -translate-y-1/2 w-4/5">
                    <div class="flex gap-4">
                        <img src="../../assets/images/exam.png" width=200 alt="" class="border-2 border-white">
                        <span>
                            <p class="text-2xl font-bold">"</p>
                            <p class="text-2xl font-bold py-4">The Prince Of Bayu Wijaya</p>
                            <p class="text-sm ">Berada di bawah pengaruh obat, membuat Helen tak bisa mengendalikan dirinya. Hingga seorang pria bernama Louis terpaksa membantunya dengan cara menghabiskan malam bersama. Sejak kejadian itu, Helen selalu menuduh Louis telah memanfaatkan keadaan. Sementara Louis terus menggunjing Helen sebagai 'wanita murahan' karena ternyata wanita itu sudah tak perawan. Suatu ketika takdir kembali mempertemukan dan menyatukan mereka ke dalam ikatan perjodohan dan pernikahan. Namun, sayangnya pernikahan tersebut hanya akan berusia 2 tahun saja setelah Louis membuat kontrak kesepakatan. Dalam hubungan itu perlakuan buruk terus Louis hujamkan kepada Helen. Tapi, siapa sangka jika ternyata kebenaran masa lalu Helen membuat pria itu berubah drastis. Bahkan Louis rela melakukan apapun untuk membatalkan kontrak pernikahan mereka dan mendapatkan hati seorang Helen yang tak mudah jatuh cinta pada siapa pun. Lalu bisakah Helen menerima Louis setelah semua penderitaan yang telah ia alami selama ini</p>
                        </span>
                    </div>

                </div>
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span class="hidden">Previous</span>
            </span>
        </button>
        <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="hidden">Next</span>
            </span>
        </button>
    </div>

    <div class="my-32">
        <img src="../../assets/images/quote.png" class="mx-auto" width=980 alt="">
    </div>


    <div id="default-carousel" class="relative my-6" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="overflow-hidden relative h-[500px]">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="../../assets/images/model-1.png" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                <div class="absolute top-[60%] left-[60%]  text-white -translate-x-1/2 -translate-y-1/2 w-1/3">
                    <div class="flex gap-4">
                        <span>
                            <p class="text-2xl font-bold">"</p>
                            <p class="text-lg text-center py-4">Antarmuka website ini sangat user-friendly. Dari daftar buku hingga forum diskusi, semuanya mudah diakses dan digunakan. Membuat pengalaman membaca saya menjadi lebih kaya</p>
                            <p class="text-lg font-bold text-center">jessica_portis</p>
                        </span>
                    </div>

                </div>
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="../../assets/images/model-2.png" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                <div class="absolute top-[60%] left-[40%]  text-white -translate-x-1/2 -translate-y-1/2 w-1/3">
                    <div class="flex gap-4">
                        <span>
                            <p class="text-2xl font-bold">"</p>
                            <p class="text-lg text-center py-4">Saya sangat terkesan dengan komunitas yang ada di website ini. Diskusi tentang buku-buku favorit sangat aktif dan penuh dengan wawasan baru. Sungguh tempat yang luar biasa bagi pecinta novel!</p>
                            <p class="text-lg font-bold text-center ">_Angelsis</p>
                        </span>
                    </div>

                </div>
            </div>
            <!-- Item 3 -->
        </div>
        <!-- Slider indicators -->
        <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span class="hidden">Previous</span>
            </span>
        </button>
        <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="hidden">Next</span>
            </span>
        </button>
    </div>

    <div class="my-32">
        <div class="grid grid-cols-3 mx-16 gap-16">
            <div class="bg-primary p-6">
                <span class="flex items-center gap-4">
                    <img src="../../assets/images/ava.png" width=60 alt="lazy">
                    <p class="font-bold text-xl text-secondary">Zamri</p>
                </span>
                <span class="flex pl-6 gap-4">
                    <img src="../../assets/images/line.png" width=4 alt="lazy">
                    <p class=" text-sm text-secondary">Saya sangat terkesan dengan komunitas yang ada di website ini. Diskusi tentang buku-buku favorit sangat aktif dan penuh dengan wawasan baru. Sungguh tempat yang luar biasa bagi pecinta novel!</p>
                </span>
            </div>
            <div class="bg-primary  p-6">
                <span class="flex items-center gap-4">
                    <img src="../../assets/images/ava.png" width=60 alt="lazy">
                    <p class="font-bold text-xl text-secondary">Zamri</p>
                </span>
                <span class="flex pl-6 gap-4">
                    <img src="../../assets/images/line.png" width=4 alt="lazy">
                    <p class=" text-sm text-secondary">Saya sangat terkesan dengan komunitas yang ada di website ini. Diskusi tentang buku-buku favorit sangat aktif dan penuh dengan wawasan baru. Sungguh tempat yang luar biasa bagi pecinta novel!</p>
                </span>
            </div>
            <div class="bg-primary  p-6">
                <span class="flex items-center gap-4">
                    <img src="../../assets/images/ava.png" width=60 alt="lazy">
                    <p class="font-bold text-xl text-secondary">Zamri</p>
                </span>
                <span class="flex pl-6 gap-4">
                    <img src="../../assets/images/line.png" width=4 alt="lazy">
                    <p class=" text-sm text-secondary">Saya sangat terkesan dengan komunitas yang ada di website ini. Diskusi tentang buku-buku favorit sangat aktif dan penuh dengan wawasan baru. Sungguh tempat yang luar biasa bagi pecinta novel!</p>
                </span>
            </div>
            <div class="bg-primary  p-6">
                <span class="flex items-center gap-4">
                    <img src="../../assets/images/ava.png" width=60 alt="lazy">
                    <p class="font-bold text-xl text-secondary">Zamri</p>
                </span>
                <span class="flex pl-6 gap-4">
                    <img src="../../assets/images/line.png" width=4 alt="lazy">
                    <p class=" text-sm text-secondary">Saya sangat terkesan dengan komunitas yang ada di website ini. Diskusi tentang buku-buku favorit sangat aktif dan penuh dengan wawasan baru. Sungguh tempat yang luar biasa bagi pecinta novel!</p>
                </span>
            </div>
            <div class="bg-primary  p-6">
                <span class="flex items-center gap-4">
                    <img src="../../assets/images/ava.png" width=60 alt="lazy">
                    <p class="font-bold text-xl text-secondary">Zamri</p>
                </span>
                <span class="flex pl-6 gap-4">
                    <img src="../../assets/images/line.png" width=4 alt="lazy">
                    <p class=" text-sm text-secondary">Saya sangat terkesan dengan komunitas yang ada di website ini. Diskusi tentang buku-buku favorit sangat aktif dan penuh dengan wawasan baru. Sungguh tempat yang luar biasa bagi pecinta novel!</p>
                </span>
            </div>
            <div class="bg-primary  p-6">
                <span class="flex items-center gap-4">
                    <img src="../../assets/images/ava.png" width=60 alt="lazy">
                    <p class="font-bold text-xl text-secondary">Zamri</p>
                </span>
                <span class="flex pl-6 gap-4">
                    <img src="../../assets/images/line.png" width=4 alt="lazy">
                    <p class=" text-sm text-secondary">Saya sangat terkesan dengan komunitas yang ada di website ini. Diskusi tentang buku-buku favorit sangat aktif dan penuh dengan wawasan baru. Sungguh tempat yang luar biasa bagi pecinta novel!</p>
                </span>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
<?php include '../template/footer.php' ?>

</html>