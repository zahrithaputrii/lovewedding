<?= $this->include('templates/header') ?>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&family=Arimo:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    body { font-family: 'Arimo', sans-serif; background-color: #f8fafc; }
    h2, h3, h4, span, button, a { font-family: 'Montserrat', sans-serif !important; }
    
    .pink-theme { color: #ec4899; }
    .bg-pink-theme { background-color: #ec4899; }
    .bg-pink-hover:hover { background-color: #be185d; }
    .custom-list {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
    }
    .custom-list li {
        position: relative;
        padding-left: 1.5rem;
        margin-bottom: 0.75rem;
        color: #4b5563;
        line-height: 1.5;
    }
    .custom-list li::before {
        content: "•";
        position: absolute;
        left: 0;
        color: #ec4899;
        font-weight: bold;
        font-size: 1.2rem;
    }
</style>

<div class="max-w-4xl mx-auto my-10 px-4">
    <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">
        
        <div class="relative h-72 md:h-[450px]">
            <a href="<?= base_url('vendor') ?>" 
               class="absolute top-6 right-6 z-20 bg-white text-gray-800 w-12 h-12 rounded-full flex items-center justify-center transition duration-300 shadow-md hover:bg-gray-100">
                <i class="bi bi-x-lg"></i>
            </a>

            <img src="/images/<?= esc($vendor['foto']) ?>" alt="<?= esc($vendor['nama']) ?>" class="w-full h-full object-cover">
            
            <div class="absolute top-6 left-6">
                <span class="bg-white text-gray-800 px-6 py-2 rounded-full text-sm font-bold shadow-md">
                    <?= esc($vendor['kategori']) ?>
                </span>
            </div>
        </div>

        <div class="p-8 md:p-12">
            <div class="mb-10">
                <h2 class="text-4xl font-extrabold text-gray-900 mb-6"><?= esc($vendor['nama']) ?></h2>
                <div class="flex flex-wrap gap-6 text-gray-600">
                    <div class="flex items-center gap-2">
                        <span class="text-yellow-400">★</span>
                        <span class="font-bold text-gray-800"><?= esc($vendor['rating'] ?? '0.0') ?> (<?= esc($vendor['jumlah_review'] ?? '0') ?> reviews)</span>
                    </div>
                    <div class="flex items-center gap-2"><span>📍</span> <?= esc($vendor['lokasi']) ?></div>
                    <div class="flex items-center gap-2"><span>📞</span> <?= esc($vendor['no_telepon']) ?></div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center border-t border-b border-gray-100 py-8 mb-10">
                <div>
                    <p class="text-gray-500 text-sm mb-1">Harga Mulai Dari:</p>
                    <p class="text-3xl font-extrabold pink-theme">Rp <?= number_format($vendor['harga'], 0, ',', '.') ?></p>
                </div>
                <a href="<?= base_url('booking/form/'.$vendor['id']) ?>" class="mt-4 md:mt-0 bg-pink-theme text-white px-10 py-4 rounded-2xl font-bold bg-pink-hover transition shadow-xl">
                    Booking Now
                </a>
            </div>

            <div class="space-y-12">
                <section>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 inline-block border-b-4 border-pink-500 pb-1">Tentang Vendor</h3>
                    <p class="text-gray-600 leading-relaxed text-lg"><?= esc($vendor['deskripsi']) ?></p>
                </section>

                <div class="grid md:grid-cols-2 gap-12">
                    <section>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">Layanan</h4>
                        <ul class="custom-list">
                            <?php 
                            $layanan_items = explode(',', $vendor['layanan']);
                            foreach ($layanan_items as $item): if(trim($item) !== ""): ?>
                                <li><?= trim(esc($item)) ?></li>
                            <?php endif; endforeach; ?>
                        </ul>
                    </section>

                    <section>
                        <h4 class="text-xl font-bold text-gray-900 mb-4">Pengalaman</h4>
                        <p class="text-gray-600 leading-relaxed"><?= esc($vendor['pengalaman']) ?></p>
                    </section>
                </div>

                <section>
                    <h4 class="text-xl font-bold text-gray-900 mb-4">Mengapa Memilih Kami?</h4>
                    <ul class="custom-list">
                        <?php 
                        $alasan_items = explode(',', $vendor['alasan']);
                        foreach ($alasan_items as $item): if(trim($item) !== ""): ?>
                            <li><?= trim(esc($item)) ?></li>
                        <?php endif; endforeach; ?>
                    </ul>
                </section>

                <section>
                    <h4 class="text-xl font-bold text-gray-900 mb-4">Paket Tambahan Tersedia (Opsional)</h4>
                    <?php if(!empty($pakets)): ?>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <?php foreach($pakets as $p): ?>
                                <div class="flex flex-col p-5 bg-white border border-gray-100 shadow-sm rounded-2xl hover:border-pink-300 hover:shadow-md transition">
                                    <span class="font-bold text-gray-700 text-lg mb-1"><?= esc($p['nama_paket']) ?></span>
                                    <span class="font-bold text-pink-500">+ Rp <?= number_format($p['harga'], 0, ',', '.') ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-gray-500 italic bg-gray-50 p-4 rounded-xl border border-gray-100">
                            Vendor ini belum menambahkan paket layanan tambahan.
                        </p>
                    <?php endif; ?>
                </section>

                <?php if(!empty($vendor['catatan'])): ?>
                <section class="bg-yellow-50 p-8 rounded-2xl border-l-8 border-yellow-400">
                    <h4 class="text-sm font-bold text-gray-900 uppercase tracking-widest mb-3">CATATAN PENTING</h4>
                    <div class="text-gray-700 leading-relaxed"><?= nl2br(esc($vendor['catatan'])) ?></div>
                </section>
                <?php endif ?>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 mt-16">
                <a href="<?= base_url('booking/form/'.$vendor['id']) ?>" 
                   class="flex-1 text-center bg-pink-theme text-white py-4 rounded-2xl font-bold shadow-lg bg-pink-hover transition">
                    Booking Sekarang
                </a>
                <a href="https://wa.me/<?= esc($vendor['no_telepon']) ?>" target="_blank"
                   class="flex-1 text-center bg-[#00d95f] text-white py-4 rounded-2xl font-bold hover:bg-[#00c254] transition flex items-center justify-center gap-2 shadow-lg">
                    <i class="bi bi-whatsapp fs-5"></i>
                    Hubungi WhatsApp
                </a>
            </div>
        </div> 
    </div> 
</div>

<?= $this->include('templates/footer') ?>
