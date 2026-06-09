<?= $this->include('templates/header') ?>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    body { font-family: 'Montserrat', sans-serif; background-color: #fff5f7; }
    
    .method-radio:checked + .method-card {
        border-color: #db2777 !important;
        background-color: #fdf2f8 !important;
        border-width: 2px;
    }

    .upload-area {
        border: 2px dashed #d1d5db;
        transition: all 0.3s ease;
    }
    .upload-area:hover {
        border-color: #f472b6;
        background-color: #fffbfe;
    }
</style>

<div class="min-h-screen py-12 px-4">
    <div class="max-w-2xl mx-auto">
        
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-1">Pembayaran Booking</h2>
            <p class="text-gray-500 text-sm">Amankan budget Anda dengan menyelesaikan pembayaran sekarang</p>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-xl overflow-hidden border border-white">
            
            <div class="bg-[#db2777] p-10 text-white text-center">
                <p class="text-pink-100 text-[10px] uppercase tracking-[0.3em] font-bold mb-2">TOTAL YANG HARUS DIBAYAR</p>
                <h3 class="text-5xl font-extrabold tracking-tighter">
                    Rp <?= number_format($booking['total_harga'], 0, ',', '.') ?>
                </h3>
            </div>

            <div class="p-8 md:p-12">
                <form action="<?= base_url('booking/proses-pembayaran') ?>" method="post" enctype="multipart/form-data" class="space-y-8">
                    <?= csrf_field() ?>
                    <input type="hidden" name="booking_id" value="<?= $booking['id'] ?>">

                    <div class="space-y-4">
                        <div class="flex items-center gap-2">
                            <div class="w-1.5 h-6 bg-[#db2777] rounded-full"></div>
                            <h4 class="text-gray-800 font-bold text-sm">Pilih Metode Pembayaran</h4>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <label class="cursor-pointer relative">
                                <input type="radio" name="metode" value="qris" class="hidden peer method-radio" required onclick="toggleMethod('qris')">
                                <div class="method-card p-6 rounded-2xl border border-gray-200 flex flex-col items-center justify-center gap-2 transition-all h-full">
                                    <i class="bi bi-qr-code-scan text-3xl text-gray-700"></i>
                                    <div class="text-center">
                                        <p class="text-xs font-extrabold text-gray-800 uppercase">QRIS</p>
                                        <p class="text-[9px] text-gray-400 font-medium italic">Scan & Pay</p>
                                    </div>
                                </div>
                            </label>

                            <label class="cursor-pointer relative">
                                <input type="radio" name="metode" value="bank" class="hidden peer method-radio" onclick="toggleMethod('bank')">
                                <div class="method-card p-6 rounded-2xl border border-gray-200 flex flex-col items-center justify-center gap-2 transition-all h-full">
                                    <i class="bi bi-credit-card-2-front text-3xl text-gray-700"></i>
                                    <div class="text-center">
                                        <p class="text-xs font-extrabold text-gray-800 uppercase">Transfer Bank</p>
                                        <p class="text-[9px] text-gray-400 font-medium italic">Tersedia rekening</p>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div id="sec_bank" class="hidden mt-4 space-y-3 bg-gray-50 p-6 rounded-2xl border border-gray-100">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">PILIH REKENING TUJUAN</p>
                        <select id="bank_selector" class="w-full p-3 rounded-xl border border-gray-200 text-sm font-bold text-gray-700 outline-none focus:ring-2 focus:ring-pink-500" onchange="showBankDetails(this.value)">
                            <option value="">-- Pilih Bank --</option>
                            <option value="bca">BCA</option>
                            <option value="mandiri">MANDIRI</option>
                        </select>
                        <div id="bank_info" class="hidden flex items-center justify-between p-4 bg-white rounded-xl border border-pink-100 mt-2">
                            <div>
                                <p id="bank_name" class="text-[9px] font-bold text-pink-500 uppercase"></p>
                                <p id="bank_acc" class="text-lg font-black text-gray-800 font-mono"></p>
                                <p class="text-[9px] text-gray-400 font-bold uppercase">A.N LOVE WEDDING ORGANIZER</p>
                            </div>
                            <button type="button" onclick="copyAcc()" class="bg-pink-600 text-white px-4 py-2 rounded-lg text-[10px] font-bold uppercase hover:bg-pink-700 transition-colors">Salin</button>
                        </div>
                    </div>

                    <div id="sec_qris" class="hidden mt-4 text-center p-6 bg-gray-50 rounded-2xl border border-gray-100">
                        <img src="<?= base_url('images/qris.jpg') ?>" class="w-40 mx-auto rounded-xl shadow-sm mb-2 border-2 border-white">
                        <p class="text-[9px] text-gray-400 font-bold uppercase">Silakan scan kode QRIS di atas</p>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center gap-2">
                            <div class="w-1.5 h-6 bg-[#db2777] rounded-full"></div>
                            <h4 class="text-gray-800 font-bold text-sm">Upload Bukti Pembayaran</h4>
                        </div>

                        <div class="relative">
                            <input type="file" name="bukti_pembayaran" id="bukti" required class="hidden" onchange="previewFile(event)">
                            <label for="bukti" class="upload-area flex flex-col items-center justify-center py-12 rounded-3xl cursor-pointer">
                                <div id="preview-icon">
                                    <i class="bi bi-upload text-3xl text-pink-400 mb-3"></i>
                                </div>
                                <p class="text-sm font-bold text-gray-600" id="file-label">Klik untuk unggah berkas</p>
                                <p class="text-[9px] text-gray-400 mt-1 uppercase">(Maksimal file size: 5mb)</p>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-[#db2777] hover:bg-[#be185d] text-white font-bold py-5 rounded-2xl shadow-lg shadow-pink-200 text-xs uppercase tracking-[0.2em] transition-all transform active:scale-95">
                        Konfirmasi Pembayaran
                    </button>
                    
                    <p class="text-center text-[9px] text-gray-400 italic">
                        Setelah pembayaran diverifikasi, pesanan <span class="text-pink-500 font-bold">mungkin</span> akan dikonfirmasi.
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const bankData = {
        'bca': { name: 'BANK BCA', acc: '1234 567 890' },
        'mandiri': { name: 'BANK MANDIRI', acc: '9000 0123 4567' }
    };

    function toggleMethod(type) {
        document.getElementById('sec_bank').classList.add('hidden');
        document.getElementById('sec_qris').classList.add('hidden');
        document.getElementById('sec_' + type).classList.remove('hidden');
    }

    function showBankDetails(val) {
        const info = document.getElementById('bank_info');
        if (val) {
            document.getElementById('bank_name').innerText = bankData[val].name;
            document.getElementById('bank_acc').innerText = bankData[val].acc;
            info.classList.remove('hidden');
        } else {
            info.classList.add('hidden');
        }
    }

    function copyAcc() {
        const text = document.getElementById('bank_acc').innerText;
        navigator.clipboard.writeText(text.replace(/\s/g, ''));
        alert('Nomor rekening disalin!');
    }

    function previewFile(e) {
        const label = document.getElementById('file-label');
        const icon = document.getElementById('preview-icon');
        if (e.target.files.length > 0) {
            label.innerText = "File Terpilih: " + e.target.files[0].name;
            label.classList.add('text-pink-600');
            icon.innerHTML = '<i class="bi bi-check-circle-fill text-3xl text-pink-500 mb-3"></i>';
        }
    }
</script>

<?= $this->include('templates/footer') ?>