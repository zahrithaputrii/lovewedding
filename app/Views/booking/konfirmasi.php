<?= $this->include('templates/header') ?>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">

<style>
    .confirm-container {
        font-family: 'Montserrat', sans-serif !important;
    }
    .bg-soft-pink {
        background-color: #fff5f7;
    }
    .nowrap {
        white-space: nowrap;
    }
</style>

<div class="min-h-screen bg-soft-pink py-12 px-4 confirm-container">
    <div class="max-w-4xl mx-auto">
        <a href="javascript:history.back()" class="inline-flex items-center text-xs text-gray-400 hover:text-pink-500 mb-8 transition font-bold uppercase tracking-widest">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
        
        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-pink-100/30 border border-white overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-5">
                
                <div class="lg:col-span-3 p-8 md:p-12 border-b lg:border-b-0 lg:border-r border-gray-100">
                    <h2 class="text-2xl font-black text-gray-800 mb-8 italic tracking-tight">Konfirmasi Detail <span class="text-pink-500">Pesanan.</span></h2>
                    
                    <div class="space-y-10">
                        <div>
                            <h4 class="text-[10px] font-black text-pink-400 uppercase tracking-[0.3em] mb-5">Ringkasan Acara</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-gray-50 p-8 rounded-[2rem] border border-gray-100">
                                <div>
                                    <p class="text-[9px] text-gray-400 font-bold uppercase tracking-widest mb-1">Nama Pemesan</p>
                                    <p class="font-bold text-gray-800 text-sm"><?= esc($nama_client) ?></p>
                                </div>
                                <div>
                                    <p class="text-[9px] text-gray-400 font-bold uppercase tracking-widest mb-1">WhatsApp</p>
                                    <p class="font-bold text-gray-800 text-sm"><?= esc($whatsapp_client) ?></p>
                                </div>
                                <div>
                                    <p class="text-[9px] text-gray-400 font-bold uppercase tracking-widest mb-1">Tanggal Pernikahan</p>
                                    <p class="font-bold text-gray-800 text-sm"><?= date('d M Y', strtotime($tanggal_pernikahan)) ?></p>
                                </div>
                                <div>
                                    <p class="text-[9px] text-gray-400 font-bold uppercase tracking-widest mb-1">Estimasi Tamu</p>
                                    <p class="font-bold text-gray-800 text-sm"><?= esc($jumlah_tamu) ?> Pax</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-[10px] font-black text-pink-400 uppercase tracking-[0.3em] mb-5">Benefit Vendor</h4>
                            <div class="space-y-4">
                                <div class="flex items-start gap-4 bg-pink-50/50 p-5 rounded-2xl border border-pink-100/50">
                                    <i class="bi bi-patch-check-fill text-pink-500 text-xl"></i>
                                    <div>
                                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Layanan Utama</p>
                                        <p class="text-xs font-medium text-gray-600 leading-relaxed"><?= esc($vendor['layanan'] ?? 'Layanan konsultasi dan perencanaan pernikahan profesional.') ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 bg-gray-50/50 p-8 md:p-12 flex flex-col justify-between relative">
                    <div>
                        <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-8 text-center">Rincian Pembayaran</h4>
                        
                        <div class="space-y-5">
                            <div class="flex justify-between items-center text-xs">
                                <span class="text-gray-500 font-medium italic">Biaya Dasar Vendor</span>
                                <span class="text-gray-800 font-bold nowrap">Rp <?= number_format($harga_dasar, 0, ',', '.') ?></span>
                            </div>
                            
                            <?php 
                            $extra_pax = max(0, (int)$total_harga - (int)$harga_dasar);
                            if($extra_pax > 0): 
                            ?>
                            <div class="flex justify-between items-center text-xs">
                                <span class="text-pink-600 font-bold italic">Add-on Tamu (>100 Pax)</span>
                                <span class="text-pink-600 font-bold nowrap">+ Rp <?= number_format($extra_pax, 0, ',', '.') ?></span>
                            </div>
                            <?php endif; ?>

                            <div class="pt-8 mt-8 border-t-2 border-dashed border-gray-200">
                                <div class="flex flex-col items-center">
                                    <span class="font-black text-gray-400 text-[10px] uppercase tracking-[0.4em] mb-2">Total Bayar</span>
                                    <span class="text-4xl font-black text-pink-500 tracking-tighter nowrap">
                                        Rp <?= number_format($total_harga, 0, ',', '.') ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12">
                        <form action="/booking/create" method="post" id="formKonfirmasi" class="space-y-4">
                            <?= csrf_field() ?>
                            <?php foreach($_POST as $key => $value): ?>
                                <input type="hidden" name="<?= esc($key) ?>" value="<?= esc($value) ?>">
                            <?php endforeach; ?>

                            <button type="submit" class="w-full bg-pink-500 hover:bg-pink-600 text-white font-black py-5 rounded-[1.5rem] shadow-xl shadow-pink-200 transition duration-300 transform hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-3 tracking-widest text-[11px] uppercase">
                                <span>Bayar Sekarang</span>
                                <i class="bi bi-arrow-right text-lg"></i>
                            </button>
                            
                            <a href="javascript:history.back()" class="block text-center text-[10px] font-bold text-gray-400 hover:text-pink-500 uppercase tracking-widest transition">
                                Ubah Detail Pesanan
                            </a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        
        <p class="text-center text-[9px] text-gray-400 mt-10 leading-relaxed italic px-12 uppercase tracking-widest">
            *Mohon periksa kembali detail pesanan Anda. Dengan menekan tombol "Bayar Sekarang", Anda setuju untuk melanjutkan ke proses transaksi.
        </p>
    </div>
</div>

<?= $this->include('templates/footer') ?>
