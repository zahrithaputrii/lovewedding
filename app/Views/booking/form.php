<?= $this->include('templates/header') ?>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">

<div class="min-h-screen bg-[#fff5f7] py-12 px-4" style="font-family: 'Montserrat', sans-serif;">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-3">Konfirmasi Detail Pesanan</h2>
            <div class="w-20 h-1 bg-pink-500 mx-auto mb-4 rounded-full"></div>
        </div>

        <form action="/booking/create" method="post" id="bookingForm" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <?= csrf_field() ?>
            
            <input type="hidden" name="total_harga" id="inputTotalPrice" value="<?= $vendor['harga'] ?>">
            <input type="hidden" name="layanan_id" value="<?= $vendor['layanan_id'] ?? '' ?>">

            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white p-8 rounded-[2rem] shadow-xl">
                    <h3 class="text-lg font-bold mb-6">Informasi Kontak</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Nama Lengkap</label>
                            <input type="text" name="nama_client" placeholder="Contoh: Siska Budiman" required class="w-full px-5 py-4 rounded-2xl bg-gray-50 border-0 focus:ring-2 focus:ring-pink-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Email Aktif</label>
                            <input type="email" name="email_client" placeholder="email@contoh.com" required class="w-full px-5 py-4 rounded-2xl bg-gray-50 border-0 focus:ring-2 focus:ring-pink-500">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Nomor WhatsApp</label>
                            <input type="text" name="whatsapp_client" placeholder="0812xxxx" required class="w-full px-5 py-4 rounded-2xl bg-gray-50 border-0 focus:ring-2 focus:ring-pink-500">
                        </div>
                    </div>

                    <h3 class="text-lg font-bold mt-10 mb-6">Detail Acara</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Vendor Terpilih</label>
                            <select name="vendor_id" id="vendorSelect" class="w-full px-5 py-4 rounded-2xl bg-gray-50 border-0">
                                <?php foreach ($vendors as $v): ?>
                                    <option value="<?= $v['id'] ?>" data-price="<?= $v['harga'] ?>" <?= ($v['id'] == $vendor['id']) ? 'selected' : '' ?>>
                                        <?= $v['nama'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Jumlah Tamu (Pax)</label>
                            <input type="number" name="jumlah_tamu" id="jumlahTamu" value="100" min="1" class="w-full px-5 py-4 rounded-2xl bg-gray-50 border-0">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Tanggal Pernikahan</label>
                            <input type="date" name="tanggal_pernikahan" required class="w-full px-5 py-4 rounded-2xl bg-gray-50 border-0">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Waktu Konsultasi</label>
                            <input type="time" name="waktu_konsultasi" required class="w-full px-5 py-4 rounded-2xl bg-gray-50 border-0">
                        </div>

                        <div class="md:col-span-2 mt-4">
                            <label class="block text-xs font-bold text-gray-400 uppercase mb-4">Pilih Paket Tambahan (Bisa lebih dari satu)</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <?php
                                if (empty($pakets)): ?>
                                    <p class="text-sm text-gray-500 italic md:col-span-2">Belum ada paket tambahan dari vendor ini.</p>
                                <?php else:
                                    foreach($pakets as $paket): ?>
                                    <label class="flex items-center p-4 border border-gray-100 rounded-2xl cursor-pointer hover:bg-pink-50 transition group">
                                        <input type="checkbox" name="paket[]" value="<?= esc($paket['nama_paket']) ?>" data-price="<?= esc($paket['harga']) ?>" class="paket-checkbox w-5 h-5 text-pink-500 border-gray-300 rounded focus:ring-pink-500">
                                        <div class="ml-3 flex flex-col">
                                            <span class="text-sm font-bold text-gray-700 group-hover:text-pink-600 transition"><?= esc($paket['nama_paket']) ?></span>
                                            <span class="text-xs text-pink-500 font-semibold">+ Rp <?= number_format($paket['harga'], 0, ',', '.') ?></span>
                                        </div>
                                    </label>
                                <?php endforeach;
                                endif; ?>
                            </div>
                        </div>
                        
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Pesan Tambahan (Opsional)</label>
                            <textarea name="pesan" rows="3" placeholder="Tuliskan permintaan khusus Anda..." class="w-full px-5 py-4 rounded-2xl bg-gray-50 border-0 focus:ring-2 focus:ring-pink-500"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-gray-900 rounded-[2.5rem] p-8 text-white sticky top-10">
                    <h3 class="font-bold text-lg mb-6 text-pink-400 italic">Ringkasan Biaya</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-400">Harga Dasar Vendor</span>
                            <span id="basePriceDisplay">Rp 0</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-400">Add-on Tamu (>100)</span>
                            <span id="extraPriceDisplay" class="text-pink-400">Rp 0</span>
                        </div>
                        <div class="flex justify-between text-sm border-t border-gray-800 pt-3">
                            <span class="text-gray-400">Total Paket Tambahan</span>
                            <span id="paketPriceDisplay" class="text-pink-400 font-bold">Rp 0</span>
                        </div>
                        <div class="pt-6 border-t border-gray-800">
                            <p class="text-[10px] uppercase tracking-widest text-gray-500 mb-1">Total Estimasi</p>
                            <span class="text-3xl font-black text-pink-500" id="totalPriceDisplay">Rp 0</span>
                        </div>
                    </div>
                    <button type="submit" class="w-full mt-10 bg-pink-500 hover:bg-pink-600 text-white font-bold py-5 rounded-2xl shadow-lg shadow-pink-900/20 transition-all transform active:scale-95 uppercase tracking-widest text-xs">
                        Konfirmasi & Buat Pesanan
                    </button>
                    <p class="text-[9px] text-gray-500 mt-4 text-center">Data akan disimpan secara permanen setelah Anda menekan tombol di atas.</p>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const vendorSelect = document.getElementById('vendorSelect');
    const jumlahTamuInput = document.getElementById('jumlahTamu');
    const inputTotalPrice = document.getElementById('inputTotalPrice');
    const basePriceDisplay = document.getElementById('basePriceDisplay');
    const extraPriceDisplay = document.getElementById('extraPriceDisplay');
    const paketPriceDisplay = document.getElementById('paketPriceDisplay');
    const totalPriceDisplay = document.getElementById('totalPriceDisplay');
    const paketCheckboxes = document.querySelectorAll('.paket-checkbox');

    function updatePrice() {
        const selectedOption = vendorSelect.options[vendorSelect.selectedIndex];
        const currentBasePrice = parseInt(selectedOption.getAttribute('data-price')) || 0;
        const pax = parseInt(jumlahTamuInput.value) || 0;
        
        let extra = (pax > 100) ? Math.ceil((pax - 100) / 100) * 100000 : 0;

        let totalPaket = 0;
        paketCheckboxes.forEach(cb => {
            if (cb.checked) {
                totalPaket += parseInt(cb.getAttribute('data-price')) || 0;
            }
        });

        const total = currentBasePrice + extra + totalPaket;
        
        basePriceDisplay.innerText = "Rp " + currentBasePrice.toLocaleString('id-ID');
        extraPriceDisplay.innerText = "Rp " + extra.toLocaleString('id-ID');
        paketPriceDisplay.innerText = "Rp " + totalPaket.toLocaleString('id-ID');
        totalPriceDisplay.innerText = "Rp " + total.toLocaleString('id-ID');
        inputTotalPrice.value = total;
    }

    vendorSelect.addEventListener('change', updatePrice);
    jumlahTamuInput.addEventListener('input', updatePrice);
    paketCheckboxes.forEach(cb => cb.addEventListener('change', updatePrice));
    updatePrice();
</script>

<?= $this->include('templates/footer') ?>