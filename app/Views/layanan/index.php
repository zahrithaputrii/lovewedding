<?= $this->include('templates/header') ?>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&family=Arimo:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    body { font-family: 'Arimo', sans-serif; }
    .font-montserrat { font-family: 'Montserrat', sans-serif; }
</style>

<section class="bg-[#fff5f7] min-h-screen py-24 px-6">
    <div class="max-w-4xl mx-auto text-center mb-20">
        <span class="inline-block px-5 py-2 rounded-full bg-pink-100 text-pink-500 text-[10px] font-montserrat font-extrabold uppercase tracking-[0.4em] mb-6">
            Our Expertise
        </span>

        <h1 class="text-5xl md:text-6xl font-montserrat font-extrabold italic text-gray-800 mb-6 tracking-tight">
            Layanan <span class="text-pink-500 not-italic">Eksklusif</span> Kami
        </h1>

        <p class="text-gray-500 max-w-xl mx-auto">
            Kami hadir untuk memastikan setiap detail pernikahan Anda tertangani secara profesional.
        </p>
    </div>

    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

            <?php if (!empty($layanans)): ?>
                <?php foreach ($layanans as $l): ?>

                    <?php
                        $gambar = (!empty($l['gambar']) && file_exists(FCPATH . 'uploads/layanan/' . $l['gambar']))
                            ? base_url('uploads/layanan/' . $l['gambar'])
                            : 'https://placehold.co/600x400/ffeef2/ff4d6d?text=Layanan';
                    ?>

                    <div class="group bg-white rounded-[2.5rem] overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500">

                        <div class="h-72 overflow-hidden">
                            <img src="<?= $gambar ?>"
                                 alt="<?= esc($l['nama']) ?>"
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        </div>
                        
                        <div class="p-10">
                            <span class="block text-[10px] font-montserrat font-extrabold uppercase tracking-[0.3em] text-pink-400 mb-3">
                                <?= esc($l['awalan'] ?? 'Professional Service') ?>
                            </span>

                            <h2 class="text-2xl font-montserrat font-bold italic text-gray-800 mb-4 group-hover:text-pink-500 transition">
                                <?= esc($l['nama']) ?>
                            </h2>

                            <p class="text-sm text-gray-500 leading-relaxed mb-8 line-clamp-3">
                                <?= esc($l['deskripsi']) ?>
                            </p>

                            <a href="<?= base_url('layanan/detail/' . $l['id']) ?>"
                               class="inline-flex items-center gap-3 text-[10px] font-montserrat font-extrabold uppercase tracking-widest group-hover:text-pink-500">
                                Pelajari Selengkapnya
                                <span class="w-8 h-8 rounded-full border flex items-center justify-center group-hover:bg-pink-500 group-hover:text-white transition">
                                    <i class="bi bi-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>

                <?php endforeach ?>
            <?php else: ?>
                <div class="col-span-full text-center text-gray-400">
                    Belum ada layanan tersedia
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<?= $this->include('templates/footer') ?>
