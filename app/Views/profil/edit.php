<?= $this->include('templates/header') ?>

<div class="min-h-screen bg-gray-50 py-12 px-4">
    <div class="max-w-2xl mx-auto">
        <a href="/profil" class="inline-flex items-center text-sm text-gray-500 hover:text-pink-500 mb-6 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Profil
        </a>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8 md:p-10">
                <h2 class="text-3xl font-black text-gray-900 text-center mb-8">Edit Profil</h2>

                <?php if(session()->getFlashdata('error')): ?>
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl text-sm italic">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form action="/profil/update" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <?= csrf_field() ?>

                    <div class="flex flex-col items-center mb-8">
                        <div class="relative group">
                            <img id="previewFoto" src="/uploads/<?= esc($user['foto'] ?? 'default.jpg') ?>" 
                                 class="w-32 h-32 rounded-full object-cover border-4 border-pink-100 shadow-md">
                            <label for="foto-upload" class="absolute bottom-0 right-0 bg-pink-500 text-white p-2 rounded-full shadow-lg cursor-pointer hover:bg-pink-600 transition transform hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </label>
                            <input id="foto-upload" type="file" name="foto" class="hidden" accept="image/*" onchange="previewImage(this)">
                        </div>
                        <p class="mt-3 text-xs font-bold text-gray-400 uppercase tracking-widest">Klik ikon untuk ganti foto</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" value="<?= esc($user['nama_lengkap']) ?>" required
                                   class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition duration-300 outline-none">
                        </div>

                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Nama Pasangan</label>
                            <input type="text" name="nama_pasangan" value="<?= esc($user['nama_pasangan']) ?>" required
                                   class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition duration-300 outline-none">
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Email Aktif</label>
                        <input type="email" name="email" value="<?= esc($user['email']) ?>" required
                               class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition duration-300 outline-none">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Nomor Telepon</label>
                            <input type="text" name="no_telepon" value="<?= esc($user['no_telepon']) ?>" required
                                   class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition duration-300 outline-none">
                        </div>

                        <div class="space-y-1">
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Tanggal Pernikahan</label>
                            <input type="date" name="tanggal_pernikahan" value="<?= esc($user['tanggal_pernikahan']) ?>" required
                                   class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition duration-300 outline-none">
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Domisili (Lokasi)</label>
                        <input type="text" name="lokasi" value="<?= esc($user['lokasi']) ?>" required
                               class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition duration-300 outline-none">
                    </div>

                    <div class="pt-6">
                        <button type="submit" class="w-full bg-pink-500 hover:bg-pink-600 text-white font-black py-4 rounded-2xl shadow-lg shadow-pink-100 transition duration-300 transform hover:-translate-y-1 active:scale-95">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewFoto').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?= $this->include('templates/footer') ?>