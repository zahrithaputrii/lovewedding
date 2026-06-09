<?= $this->include('templates/header') ?>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&family=Arimo:wght@400;500&display=swap" rel="stylesheet">

<style>
    body { font-family: 'Arimo', sans-serif; background-color: #fff5f7; }
    h2, h3, h4, span, button, a { font-family: 'Montserrat', sans-serif !important; }
    .font-black { font-weight: 900; }
</style>

<section class="max-w-7xl mx-auto px-4 py-8">

<h2 class="text-3xl font-bold text-center text-gray-800">Vendor Pernikahan</h2>
<p class="text-center text-gray-500 mt-2">Temukan vendor terbaik</p>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-10">

<?php foreach($vendor as $v): ?>
<div class="bg-white rounded-2xl shadow hover:shadow-xl overflow-hidden
            transform hover:-translate-y-2 transition">

    <img src="/images/<?= esc($v['foto']) ?>"
         class="w-full h-44 object-cover">

    <div class="p-5">
        <h3 class="font-semibold text-lg"><?= esc($v['nama']) ?></h3>
        <p class="text-sm text-gray-500"><?= esc($v['kategori']) ?></p>

        <p class="text-sm mt-2">
            ⭐ <?= esc($v['rating']) ?> (<?= esc($v['jumlah_review']) ?>)
        </p>
        <p class="text-sm">📍 <?= esc($v['lokasi']) ?></p>

        <div class="flex gap-3 mt-4">
            <a href="<?= base_url('vendor/detail/'.$v['id']) ?>"
               class="w-1/2 text-center py-2 border border-pink-500 text-pink-500 rounded-full
                      hover:bg-pink-500 hover:text-white transition">
               Detail
            </a>

            <a href="<?= base_url('booking/form/'.$v['id']) ?>"
               class="w-1/2 text-center py-2 bg-pink-500 text-white rounded-full
                      hover:bg-pink-600 transition active:scale-95">
               Booking
            </a>
        </div>
    </div>
</div>
<?php endforeach ?>

</div>
</section>

<?= $this->include('templates/footer') ?>
