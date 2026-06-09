<?= $this->include('templates/header') ?>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">

<style>
    body, div, h2, h3, label, input, select, button, textarea {
        font-family: 'Montserrat', sans-serif !important;
    }

    .bg-soft-pink { background-color: #fff5f7; }

    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    .animate-fadeIn { animation: fadeIn 0.2s ease-out forwards; }
</style>

<div class="min-h-screen bg-soft-pink py-12 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-3 tracking-tight">Konfirmasi Detail Pesanan</h2>
            <div class="w-20 h-1 bg-pink-500 mx-auto mb-4 rounded-full"></div>
            <p class="text-gray-500 font-medium">
                Lengkapi detail untuk mendapatkan penawaran terbaik dari
                <span class="text-pink-500 font-bold"><?= esc($vendor['nama'] ?? '-') ?></span>
            </p>
        </div>

        <form action="/booking/konfirmasi" method="post" id="bookingForm" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <?= csrf_field() ?>
            <input type="hidden" name="total_harga" id="inputTotalPrice" value="<?= esc($vendor['harga'] ?? 0) ?>">

            <div class="lg:col-span-2 space-y-6">
               
                <div class="bg-white border border-gray-100 p-8 rounded-[2rem] shadow-xl shadow-pink-100/20">
                    <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
                        <span class="bg-pink-500 text-white w-8 h-8 flex items-center justify-center rounded-full mr-4 text-xs">1</span>
                        Informasi Kontak
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Nama Lengkap *</label>
                            <input type="text" name="nama_client" required class="w-full px-5 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:ring-2 focus:ring-pink-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Email *</label>
                            <input type="email" name="email_client" required class="w-full px-5 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:ring-2 focus:ring-pink-500 outline-none">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">WhatsApp / No. Telp *</label>
                            <input type="text" name="whatsapp_client" required class="w-full px-5 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:ring-2 focus:ring-pink-500 outline-none">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Alamat *</label>
                            <textarea name="alamat_client" rows="2" required class="w-full px-5 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:ring-2 focus:ring-pink-500 outline-none"></textarea>
                        </div>
                    </div>

                    <h3 class="text-lg font-bold text-gray-800 mt-10 mb-6 flex items-center">
                        <span class="bg-pink-500 text-white w-8 h-8 flex items-center justify-center rounded-full mr-4 text-xs">2</span>
                        Detail Acara & Layanan
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Pilih Vendor *</label>
                            <select name="vendor_id" id="vendorSelect" required class="w-full px-5 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:ring-2 focus:ring-pink-500 outline-none transition-all">
                                <?php foreach ($vendors as $v): ?>
                                    <option value="<?= esc($v['id']) ?>" data-price="<?= esc($v['harga']) ?>" <?= ($vendor && $v['id']==$vendor['id'])?'selected':'' ?>>
                                        <?= esc($v['nama']) ?> - Rp <?= number_format(esc($v['harga']),0,',','.') ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Jumlah Tamu (Pax) *</label>
                            <input type="number" name="jumlah_tamu" id="jumlahTamu" min="1" value="100" required class="w-full px-5 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:ring-2 focus:ring-pink-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Tanggal Acara *</label>
                            <input type="date" name="tanggal_pernikahan" required class="w-full px-5 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:ring-2 focus:ring-pink-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Waktu Konsultasi *</label>
                            <input type="time" name="waktu_konsultasi" required class="w-full px-5 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:ring-2 focus:ring-pink-500 outline-none">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Pesan Tambahan</label>
                            <textarea name="pesan" rows="3" class="w-full px-5 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:ring-2 focus:ring-pink-500 outline-none" placeholder="Catatan khusus untuk vendor..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-gray-900 rounded-[2.5rem] p-8 shadow-2xl text-white sticky top-10 border border-gray-800">
                    <h3 class="font-bold text-lg mb-6 border-b border-gray-800 pb-4 text-pink-400 italic">Ringkasan Biaya</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between">
                            <span class="text-gray-400 text-xs font-semibold uppercase tracking-widest">Harga Dasar</span>
                            <span id="basePriceDisplay" class="font-bold">Rp <?= number_format($vendor['harga'] ?? 0,0,',','.') ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400 text-xs font-semibold uppercase tracking-widest">Add-on Tamu</span>
                            <span id="extraPriceDisplay" class="text-pink-400 font-bold">Rp 0</span>
                        </div>
                        <div class="pt-6 border-t border-gray-800 mt-6">
                            <div class="flex justify-between flex-col">
                                <span class="text-gray-400 text-[10px] font-bold uppercase tracking-tighter mb-1">Total Estimasi</span>
                                <span id="totalPriceDisplay" class="text-3xl font-black text-pink-500 tracking-tighter">Rp <?= number_format($vendor['harga'] ?? 0,0,',','.') ?></span>
                            </div>
                        </div>
                        <button type="submit" class="w-full mt-10 bg-pink-500 hover:bg-pink-600 text-white font-bold py-5 rounded-[1.5rem] transition shadow-lg shadow-pink-900/40 uppercase tracking-widest text-xs">
                            Konfirmasi & Bayar
                        </button>
                    </div>
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
const totalPriceDisplay = document.getElementById('totalPriceDisplay');

function updatePrice() {
    const selectedOption = vendorSelect.options[vendorSelect.selectedIndex];
    const basePrice = parseInt(selectedOption.getAttribute('data-price')) || 0;
    const pax = Math.max(0, parseInt(jumlahTamuInput.value) || 0);

    let extra = 0;
    if(pax > 100) extra = Math.ceil((pax-100)/100)*100000;

    const total = basePrice + extra;

    basePriceDisplay.innerText = "Rp " + basePrice.toLocaleString('id-ID');
    extraPriceDisplay.innerText = "Rp " + extra.toLocaleString('id-ID');
    totalPriceDisplay.innerText = "Rp " + total.toLocaleString('id-ID');
    inputTotalPrice.value = total;
}

vendorSelect.addEventListener('change', updatePrice);
jumlahTamuInput.addEventListener('input', updatePrice);
updatePrice();
</script>

<?= $this->include('templates/footer') ?>
