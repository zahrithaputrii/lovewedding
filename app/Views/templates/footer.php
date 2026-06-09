<footer class="bg-[#0f172a] text-gray-200 px-6 py-20 relative overflow-hidden mt-20">
    <div class="absolute inset-0 flex justify-center items-center pointer-events-none">
        <div class="w-[500px] h-[500px] rounded-full bg-pink-600 opacity-[0.03] blur-3xl animate-blob-slow"></div>
        <div class="w-[400px] h-[400px] rounded-full bg-rose-500 opacity-[0.03] blur-3xl animate-blob-reverse ml-40"></div>
    </div>

    <div class="max-w-7xl mx-auto relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            
            <div class="space-y-6">
                <h2 class="text-2xl font-black tracking-tighter text-white uppercase italic">
                    Love<span class="text-pink-500">Wedding</span>
                </h2>
                <p class="text-sm leading-relaxed text-gray-400 font-medium">
                    Mewujudkan pernikahan impian dengan kurasi vendor terbaik dan perencanaan yang presisi sejak tahun 2015.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-pink-500 hover:text-white transition-all duration-300">
                        <i class="bi bi-instagram text-lg"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-pink-500 hover:text-white transition-all duration-300">
                        <i class="bi bi-tiktok text-lg"></i>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="text-white font-black mb-7 uppercase tracking-[0.2em] text-[11px]">Menu Utama</h3>
                <ul class="space-y-4 text-sm text-gray-400 font-medium">
                    <li><a href="<?= base_url('vendor') ?>" class="hover:text-pink-500 transition-colors flex items-center"><i class="bi bi-chevron-right text-[10px] mr-2"></i> Cari Vendor</a></li>
                    <li><a href="<?= base_url('layanan') ?>" class="hover:text-pink-500 transition-colors flex items-center"><i class="bi bi-chevron-right text-[10px] mr-2"></i> Layanan Unggulan</a></li>
                    <li><a href="#" class="hover:text-pink-500 transition-colors flex items-center"><i class="bi bi-chevron-right text-[10px] mr-2"></i> Tentang Kami</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white font-black mb-7 uppercase tracking-[0.2em] text-[11px]">Hubungi Kami</h3>
                <div class="space-y-5 text-sm text-gray-400 font-medium">
                    <div class="flex items-start space-x-3">
                        <i class="bi bi-geo-alt text-pink-500 text-lg"></i>
                        <span class="leading-relaxed">Jalan Soetomo No. 39, Cilacap, Jawa Tengah</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="bi bi-envelope text-pink-500 text-lg"></i>
                        <span>hello@lovewedding.com</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="bi bi-whatsapp text-pink-500 text-lg"></i>
                        <span>+62 800 1111 2222</span>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-white font-black mb-7 uppercase tracking-[0.2em] text-[11px]">Jam Operasional</h3>
                <div class="bg-gray-800/50 p-5 rounded-2xl border border-gray-700/50">
                    <ul class="space-y-3 text-[12px] text-gray-400">
                        <li class="flex justify-between"><span>Senin - Jumat</span> <span class="text-white font-bold">09:00 - 17:00</span></li>
                        <li class="flex justify-between"><span>Sabtu</span> <span class="text-white font-bold">09:00 - 15:00</span></li>
                        <li class="flex justify-between"><span>Minggu</span> <span class="text-pink-500 font-bold italic">By Appointment</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-20 pt-8 border-t border-gray-800/60 flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest text-center md:text-left">
                &copy; 2025 Love Wedding Organizer. Crafted with <i class="bi bi-heart-fill text-pink-600 mx-1"></i>
            </p>
            <div class="flex space-x-8 text-[10px] font-bold uppercase tracking-widest">
                <a href="#" class="text-gray-500 hover:text-white transition">Privacy Policy</a>
                <a href="#" class="text-gray-500 hover:text-white transition">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>