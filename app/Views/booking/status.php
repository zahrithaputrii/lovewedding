<?= $this->include('templates/header') ?>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">

<style>
    .font-montserrat { font-family: 'Montserrat', sans-serif !important; }
    .bg-soft-pink { background-color: #fff5f7; }
    
    @keyframes subtle-float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }
    .animate-float {
        animation: subtle-float 3s ease-in-out infinite;
    }
</style>

<div class="min-h-screen bg-soft-pink flex items-center justify-center px-4 font-montserrat">
    <div class="max-w-md w-full bg-white rounded-[3rem] shadow-2xl shadow-pink-100/50 border border-white p-10 md:p-12 text-center relative overflow-hidden">
        
        <div class="absolute -top-10 -right-10 w-32 h-32 bg-pink-50 rounded-full blur-2xl"></div>

        <div class="mb-8 flex justify-center">
            <div class="w-24 h-24 bg-emerald-50 rounded-full flex items-center justify-center animate-float shadow-inner">
                <div class="w-16 h-16 bg-emerald-500 rounded-full flex items-center justify-center text-white shadow-lg shadow-emerald-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>
        </div>

        <span class="text-emerald-500 font-black uppercase tracking-[0.4em] text-[10px] mb-4 block">Reservation Confirmed</span>
        <h4 class="text-3xl font-black text-gray-900 mb-4 italic tracking-tighter">Yeay! Booking <span class="text-pink-500">Berhasil.</span></h4>
        <p class="text-gray-500 text-sm leading-relaxed mb-10 font-medium">
            Satu langkah lebih dekat menuju pernikahan impian Anda. Segera selesaikan pembayaran untuk mengamankan slot jadwal Anda.
        </p>

        <div class="flex flex-col gap-4">
            <a href="/booking/pembayaran/<?= $booking_id ?>" 
               class="w-full px-8 py-5 bg-pink-500 text-white font-black rounded-2xl shadow-xl shadow-pink-200 hover:bg-pink-600 transition duration-300 transform hover:-translate-y-1 text-xs uppercase tracking-widest flex items-center justify-center gap-2">
                <i class="bi bi-credit-card-2-back-fill text-lg"></i>
                Bayar Sekarang
            </a>
            
            <a href="/profil" 
               class="w-full px-8 py-5 border-2 border-gray-100 text-gray-400 font-bold rounded-2xl hover:bg-gray-50 transition duration-300 text-xs uppercase tracking-widest">
                Cek Riwayat Booking
            </a>
        </div>

        <div class="mt-12 pt-8 border-t border-gray-50">
            <p class="text-[10px] text-gray-400 font-medium uppercase tracking-widest italic leading-relaxed">
                Butuh bantuan koordinasi? <br>
                <a href="https://wa.me/628123456789" class="text-pink-500 underline font-black hover:text-pink-600 transition">Hubungi Wedding Assistant</a>
            </p>
        </div>
    </div>
</div>

<?= $this->include('templates/footer') ?>