<?= $this->include('templates/header') ?>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">

<style>
    body, div, h2, h3, p, span, label, input, select, button {
        font-family: 'Montserrat', sans-serif !important;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn { animation: fadeIn 0.4s ease-out forwards; }

    .method-card input:checked + div {
        border-color: #db2777; 
        background-color: #fdf2f8; 
    }
</style>

<div class="min-h-screen bg-[#fff5f7] py-12 px-4">
    <div class="max-w-2xl mx-auto">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Detail Booking</h2>
            <p class="text-gray-600 font-medium text-sm">Pastikan detail berikut sudah benar sebelum melanjutkan pembayaran.</p>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-pink-100/30 border border-white overflow-hidden mb-8">
            <div class="p-8 md:p-10 space-y-4">
                <div class="flex justify-between">
                    <span class="font-bold text-gray-700">Nama Pemesan</span>
                    <span class="text-gray-500"><?= esc($booking['nama_pemesan']) ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="font-bold text-gray-700">Tanggal Acara</span>
                    <span class="text-gray-500"><?= esc($booking['tanggal_acara']) ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="font-bold text-gray-700">Jenis Paket</span>
                    <span class="text-gray-500"><?= esc($booking['paket']) ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="font-bold text-gray-700">Total Harga</span>
                    <span class="font-bold text-pink-600">Rp <?= number_format($booking['total_harga'], 0, ',', '.') ?></span>
                </div>

                <div class="mt-8">
                    <a href="/pembayaran/<?= $booking['id'] ?>" 
                       class="w-full block bg-pink-600 hover:bg-pink-700 text-white font-black py-5 rounded-2xl transition duration-300 transform hover:-translate-y-1 shadow-xl shadow-pink-100 text-xs uppercase tracking-widest text-center">
                        Lanjut ke Pembayaran
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center text-[9px] text-gray-400 uppercase tracking-widest font-medium">
            Pastikan semua informasi sudah benar sebelum konfirmasi pembayaran.
        </div>
    </div>
</div>

<?= $this->include('templates/footer') ?>
