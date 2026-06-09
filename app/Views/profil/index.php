<?= $this->include('templates/header') ?>

<div class="max-w-4xl mx-auto my-10 px-4">
    <div class="relative bg-gradient-to-r from-pink-400 to-rose-400 rounded-3xl p-6 md:p-10 shadow-xl overflow-hidden mb-8">
        <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute -left-5 -top-5 w-24 h-24 bg-pink-300/20 rounded-full blur-xl"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-center gap-8">
            <div class="relative group">
                <img src="/uploads/<?= esc($user['foto'] ?? 'default.jpg') ?>" 
                     class="w-32 h-32 md:w-40 md:h-40 rounded-full object-cover border-4 border-white shadow-2xl transition duration-500 group-hover:scale-105">
                <div class="absolute inset-0 rounded-full border-2 border-white/20 scale-110 animate-pulse"></div>
            </div>

            <div class="text-center md:text-left flex-1 text-white">
                <h2 class="text-3xl md:text-4xl font-black mb-2 tracking-tight">
                    <?= esc($user['nama_lengkap'] ?? 'User Name') ?>
                </h2>
                <div class="flex flex-wrap justify-center md:justify-start items-center gap-4 text-pink-50 font-medium">
                    <span class="flex items-center gap-2 bg-white/20 px-3 py-1 rounded-full text-sm backdrop-blur-sm">
                        💍 <?= esc($user['nama_pasangan'] ?? 'Pasangan') ?>
                    </span>
                    <span class="flex items-center gap-2 bg-white/20 px-3 py-1 rounded-full text-sm backdrop-blur-sm">
                        📅 <?= date('d M Y', strtotime($user['tanggal_pernikahan'] ?? 'now')) ?>
                    </span>
                </div>
                
                <a href="<?= base_url('profil/edit') ?>" 
                   class="mt-6 inline-flex items-center gap-2 px-6 py-2.5 bg-white text-pink-500 hover:bg-pink-50 rounded-xl font-bold shadow-lg transition transform hover:-translate-y-1 active:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    Edit Profil
                </a>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-2 mb-6 flex gap-2 w-fit mx-auto md:mx-0">
        <button class="nav-link-custom active" id="btn-info" onclick="switchTab('info')">Informasi Pribadi</button>
        <button class="nav-link-custom" id="btn-booking" onclick="switchTab('booking')">Riwayat Booking</button>
    </div>

    <div id="content-info" class="tab-pane-custom active animate-fadeIn">
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 md:p-10">
            <h5 class="text-xl font-bold text-gray-800 mb-8 flex items-center gap-3">
                <span class="w-1.5 h-6 bg-pink-500 rounded-full"></span>
                Detail Akun Anda
            </h5>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php
                    $info = [
                        "Nama Lengkap" => $user['nama_lengkap'] ?? '',
                        "Nama Pasangan" => $user['nama_pasangan'] ?? '',
                        "Email" => $user['email'] ?? '',
                        "Nomor Telepon" => $user['no_telepon'] ?? '',
                        "Lokasi" => $user['lokasi'] ?? '',
                        "Tanggal Pernikahan" => $user['tanggal_pernikahan'] ?? ''
                    ];
                    foreach($info as $label => $val):
                ?>
                <div class="group">
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2 ml-1"><?= $label ?></label>
                    <div class="w-full px-5 py-3.5 bg-gray-50 border border-gray-100 rounded-2xl text-gray-700 font-semibold group-hover:border-pink-200 transition">
                        <?= esc($val ?: '-') ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div id="content-booking" class="tab-pane-custom hidden animate-fadeIn">
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 md:p-10">
            <h5 class="text-xl font-bold text-gray-800 mb-8 flex items-center gap-3">
                <span class="w-1.5 h-6 bg-pink-500 rounded-full"></span>
                Daftar Pemesanan
            </h5>

            <?php if(empty($bookings)): ?>
                <div class="text-center py-10">
                    <p class="text-gray-400 italic">Belum ada riwayat booking.</p>
                </div>
            <?php else: ?>
                <div class="space-y-4">
                    <?php foreach($bookings as $b): ?>
                    <div class="flex flex-col md:flex-row md:items-center justify-between p-6 rounded-2xl bg-gray-50 border border-transparent hover:border-pink-200 hover:bg-white hover:shadow-md transition duration-300 gap-4">
                        <div>
                            <div class="text-lg font-bold text-gray-800 mb-1 italic">"<?= esc($b['pesan']) ?>"</div>
                            <div class="flex items-center gap-3 text-sm text-gray-500 font-medium">
                                <span class="bg-indigo-50 text-indigo-600 px-3 py-1 rounded-lg italic">📅 <?= date('d M Y', strtotime($b['tanggal_pernikahan'])) ?></span>
                                <span class="capitalize px-3 py-1 rounded-lg font-bold text-xs <?= $b['status'] == 'confirmed' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' ?>">
                                    ● <?= esc($b['status']) ?>
                                </span>
                            </div>
                        </div>
                        <a href="<?= base_url('profil/detail_booking/' . $b['id']) ?>" 
                           class="px-6 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl font-bold hover:bg-pink-500 hover:text-white hover:border-pink-500 transition shadow-sm text-center">
                            Detail Transaksi
                        </a>
                    </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>

<style>
    body { background-color: #fafafa; }
    
    .nav-link-custom {
        padding: 0.75rem 1.5rem;
        font-weight: 700;
        border-radius: 1.25rem;
        color: #9ca3af;
        transition: all 0.3s ease;
    }

    .nav-link-custom.active {
        background-color: white;
        color: #ec4899; /* pink-500 */
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn { animation: fadeIn 0.4s ease-out forwards; }
</style>

<script>
    function switchTab(tab) {
        document.getElementById('content-info').classList.add('hidden');
        document.getElementById('content-booking').classList.add('hidden');
        document.getElementById('btn-info').classList.remove('active');
        document.getElementById('btn-booking').classList.remove('active');
        document.getElementById('content-' + tab).classList.remove('hidden');
        document.getElementById('btn-' + tab).classList.add('active');
    }
</script>

<?= $this->include('templates/footer') ?>