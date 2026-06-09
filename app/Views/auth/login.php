<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Love Wedding</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&family=Arimo:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body { font-family: 'Arimo', sans-serif; }
        .font-montserrat { font-family: 'Montserrat', sans-serif; }
    </style>
</head>

<body class="bg-[#fff5f7] min-h-screen flex items-center justify-center p-6 relative overflow-hidden">

<div class="absolute -left-40 top-1/3 w-80 h-80 bg-pink-400/20 rounded-full blur-3xl"></div>
<div class="absolute -right-40 bottom-1/3 w-80 h-80 bg-purple-400/20 rounded-full blur-3xl"></div>

<div class="relative w-full max-w-5xl bg-white rounded-[32px] shadow-2xl overflow-hidden flex">

    <div class="hidden md:flex w-1/2 bg-gradient-to-br from-pink-500 to-purple-600 p-12 text-white flex-col justify-center">
        <div class="flex items-center gap-3 mb-8">
            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow">
                <i class="bi bi-heart-fill text-pink-500 text-xl"></i>
            </div>
            <span class="font-montserrat font-bold text-2xl">LoveWedding</span>
        </div>

        <h1 class="text-3xl font-montserrat font-extrabold italic leading-snug mb-4">
            Selamat Datang Kembali
        </h1>

        <p class="text-pink-100 text-sm mb-6">
            Masuk dan lanjutkan perjalanan menuju pernikahan impian Anda
            bersama kami.
        </p>

        <ul class="space-y-3 text-sm">
            <li class="flex items-center gap-3">
                <i class="bi bi-check-circle-fill text-pink-200"></i>
                Vendor terpercaya
            </li>
            <li class="flex items-center gap-3">
                <i class="bi bi-check-circle-fill text-pink-200"></i>
                Konsultasi gratis
            </li>
            <li class="flex items-center gap-3">
                <i class="bi bi-check-circle-fill text-pink-200"></i>
                Perencanaan mudah & cepat
            </li>
        </ul>
    </div>

    <div class="w-full md:w-1/2 p-12 flex flex-col justify-center">

        <h2 class="text-3xl font-montserrat font-extrabold text-gray-800 mb-2">
            Login
        </h2>
        <p class="text-gray-400 text-sm mb-8">
            Masuk ke akun Anda untuk melanjutkan
        </p>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="mb-4 text-sm bg-red-100 text-red-600 px-4 py-3 rounded-xl">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="mb-4 text-sm bg-green-100 text-green-600 px-4 py-3 rounded-xl">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/login/process') ?>" method="post" class="space-y-5">

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 ml-1">
                    Email
                </label>
                <input type="email" name="email" required
                    class="w-full px-4 py-4 bg-gray-50 border border-gray-200 rounded-2xl
                           focus:outline-none focus:ring-2 focus:ring-pink-400/30 transition">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 ml-1">
                    Password
                </label>
                <input type="password" name="password" required
                    class="w-full px-4 py-4 bg-gray-50 border border-gray-200 rounded-2xl
                           focus:outline-none focus:ring-2 focus:ring-pink-400/30 transition">
            </div>

            <button
                class="w-full bg-gradient-to-r from-pink-500 to-pink-700
                       hover:from-pink-600 hover:to-pink-800
                       text-white font-montserrat font-bold py-4 rounded-2xl
                       shadow-lg shadow-pink-200 transition">
                Login Sekarang
            </button>
        </form>

        <p class="text-center text-sm text-gray-500 mt-8">
            Belum punya akun?
            <a href="<?= base_url('/register') ?>" class="text-pink-600 font-bold hover:underline">
                Daftar Sekarang
            </a>
        </p>
    </div>
</div>

</body>
</html>
