<?= $this->include('templates/header') ?>

<div class="max-w-2xl mx-auto my-12 px-4">
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        
        <div class="bg-gray-50 px-8 py-6 border-b border-gray-100">
            <h4 class="text-xl font-bold text-gray-900 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
              Ringkasan Booking <?= $booking['id'] ?>

            </h4>
        </div>

        <div class="p-8 space-y-6">
            <div class="grid grid-cols-1 gap-6">
                <div class="flex flex-col">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Vendor</span>
                    <span class="text-lg font-bold text-gray-800"><?= esc($booking['vendor_nama']) ?></span>
                </div>

                <div class="flex flex-col">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Tanggal Pernikahan</span>
                    <span class="text-gray-700 font-medium">
                        <?= date('d F Y', strtotime($booking['tanggal_pernikahan'])) ?>
                    </span>
                </div>

                <div class="flex flex-col">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Status Pembayaran</span>
                    <div>
                        <?php if (empty($booking['bukti_pembayaran'])): ?>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-yellow-50 text-yellow-600 border border-yellow-200">
                                <span class="w-2 h-2 bg-yellow-400 rounded-full mr-2 animate-pulse"></span>
                                Belum Bayar
                            </span>
                        <?php elseif ($booking['status'] == 'pending'): ?>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-600 border border-blue-200">
                                <span class="w-2 h-2 bg-blue-400 rounded-full mr-2"></span>
                                Menunggu Verifikasi Admin
                            </span>
                        <?php elseif ($booking['status'] == 'confirmed'): ?>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-50 text-green-600 border border-green-200">
                                <span class="w-2 h-2 bg-green-400 rounded-full mr-2"></span>
                                Booking Dikonfirmasi
                            </span>
                        <?php elseif ($booking['status'] == 'cancelled'): ?>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-50 text-red-600 border border-red-200">
                                <span class="w-2 h-2 bg-red-400 rounded-full mr-2"></span>
                                Booking Dibatalkan
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (!empty($booking['bukti_pembayaran'])): ?>
                <div class="flex flex-col">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Bukti Transfer</span>
                    <div class="w-32 h-44 rounded-xl overflow-hidden border-2 border-gray-100 shadow-sm bg-gray-50">
                        <img src="<?= base_url('images/bukti_pembayaran/' . $booking['bukti_pembayaran']) ?>"
                            class="w-full h-full object-cover shadow-inner">
                    </div>
                    <span class="text-xs text-gray-400 mt-1 italic"><?= esc($booking['metode_pembayaran']) ?></span>
                </div>
                <?php endif; ?>
            </div>

            <div class="bg-pink-50 rounded-2xl p-6 flex justify-between items-center border border-pink-100">
                <span class="text-pink-900 font-bold uppercase text-xs tracking-wider">Total Harga</span>
                <span class="text-2xl font-black text-pink-600">
                    Rp <?= number_format($booking['total_harga'], 0, ',', '.') ?>
                </span>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <a href="<?= base_url('profil') ?>" 
                    class="flex-1 text-center py-4 px-6 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-2xl transition duration-300">
                    Kembali
                </a>

                <?php if (empty($booking['bukti_pembayaran']) && $booking['status'] !== 'cancelled'): ?>
                    <a href="<?= base_url('booking/pembayaran/' . $booking['id']) ?>"
                        class="flex-1 text-center py-4 px-6 bg-pink-600 hover:bg-pink-700 text-white font-bold rounded-2xl shadow-lg shadow-pink-100 transition duration-300 transform hover:-translate-y-1 flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Bayar Sekarang
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->include('templates/footer') ?>