<?= $this->include('templates/header') ?>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&family=Arimo:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    body { font-family: 'Arimo', sans-serif; }
    h1, h3, h4, .category-label { font-family: 'Montserrat', sans-serif; }
</style>

<section class="bg-[#fff6f8] py-24 px-6">
    <div class="max-w-[1400px] mx-auto">

        <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.1fr] gap-20 items-stretch">

            <div class="rounded-[40px] overflow-hidden shadow-[0_30px_80px_rgba(0,0,0,0.18)] bg-pink-100">
                <?php
                    $gambar = (!empty($layanan['gambar']) && file_exists(FCPATH . 'uploads/layanan/' . $layanan['gambar']))
                        ? base_url('uploads/layanan/' . $layanan['gambar'])
                        : 'https://placehold.co/800x800/ffeef2/ff4d6d?text=Layanan';
                ?>
                <img src="<?= $gambar ?>"
                     alt="<?= esc($layanan['nama']) ?>"
                     class="w-full h-full object-cover">
            </div>

            <div class="flex flex-col">

                <span class="category-label text-[11px] font-black uppercase tracking-[0.35em] text-pink-400 mb-4">
                    Exclusive Service
                </span>

                <h1 class="text-[32px] sm:text-[36px] xl:text-[40px]
                           font-black italic leading-tight text-gray-900 max-w-xl">
                    <?= esc($layanan['nama']) ?>
                </h1>

                <div class="w-12 h-[2px] bg-pink-400 my-6"></div>

                <div class="bg-white rounded-[28px] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.08)]">

                    <h3 class="text-[11px] font-bold uppercase tracking-widest text-gray-800 mb-4">
                        Keunggulan Paket
                    </h3>

  
                    <?php if (!empty($layanan['awalan'])): ?>
                        <p class="text-[12px] text-gray-500 italic mb-6 leading-relaxed">
                            <?= esc($layanan['awalan']) ?>
                        </p>
                    <?php endif; ?>

                    <ul class="space-y-4 text-sm text-gray-700">
                        <?php foreach (explode("\n", trim($layanan['deskripsi'])) as $item): ?>
                            <?php if (trim($item) !== ''): ?>
                                <li class="flex gap-3">
                                    <span class="text-pink-500 font-bold">✓</span>
                                    <span><?= esc($item) ?></span>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>

                    <div class="mt-8 bg-pink-50 rounded-2xl p-6">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-pink-400">
                            Investasi
                        </span>

                        <div class="text-xl font-black text-pink-600 mt-2">
                            Rp <?= number_format($layanan['harga'], 0, ',', '.') ?>
                        </div>

                        <p class="text-[11px] text-gray-400 italic mt-1">
                            *Harga dapat disesuaikan kebutuhan
                        </p>
                    </div>
                </div>

                <?php
                    $noWa = '6281234567890';

                    $pesan = urlencode(
                        "Halo, saya tertarik dengan layanan:\n\n".
                        "• ".$layanan['nama']."\n".
                        "• Harga mulai Rp ".number_format($layanan['harga'],0,',','.')."\n\n".
                        "Mohon info lebih lanjut. Terima kasih."
                    );
                ?>

                <div class="mt-10 flex flex-col sm:flex-row gap-4">

                    <a href="<?= base_url('layanan') ?>"
                       class="flex items-center justify-center gap-3 px-8 py-4 rounded-full
                              bg-white border border-pink-200
                              text-pink-500 text-xs font-black uppercase tracking-[0.3em]
                              hover:bg-pink-50 transition shadow-sm">
                        <i class="bi bi-arrow-left"></i>
                        Kembali
                    </a>

                    <a href="https://wa.me/<?= $noWa ?>?text=<?= $pesan ?>"
                       target="_blank"
                       class="flex items-center justify-center gap-3 px-8 py-4 rounded-full
                              bg-green-500 text-white
                              text-xs font-black uppercase tracking-[0.3em]
                              hover:bg-green-600 transition shadow-lg shadow-green-300/40">
                        <i class="bi bi-whatsapp text-lg"></i>
                        Hubungi WhatsApp
                    </a>

                </div>

            </div>
        </div>
    </div>
</section>

<?= $this->include('templates/footer') ?>
