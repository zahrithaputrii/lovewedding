<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&family=Arimo:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

<style>
    body { font-family: 'Arimo', sans-serif; }
    h1, h2, h3, .font-montserrat, .nav-link, .brand-text { font-family: 'Montserrat', sans-serif !important; }
    
    /* Animasi Dropdown Smooth */
    .dropdown-animate {
        animation: fadeInScale 0.2s ease-out forwards;
    }
    @keyframes fadeInScale {
        from { opacity: 0; transform: scale(0.95) translateY(-10px); }
        to { opacity: 1; transform: scale(1) translateY(0); }
    }

    .nav-active {
        color: #ec4899 !important; /* Pink-500 */
        position: relative;
    }
    .nav-active::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 12px;
        right: 12px;
        height: 2px;
        background-color: #ec4899;
        border-radius: 10px;
    }
</style>

<nav class="bg-white/80 backdrop-blur-md border-b border-gray-100 fixed w-full z-[100] top-0 start-0 shadow-sm">
    <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto p-4">
        
        <a href="<?= base_url() ?>" class="flex items-center space-x-2 group">
            <div class="bg-pink-500 p-2 rounded-xl group-hover:rotate-6 transition-transform shadow-lg shadow-pink-200">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
            </div>
            <span class="brand-text self-center text-xl font-black tracking-tighter text-gray-900">
                Love<span class="text-pink-500">Wedding</span>
            </span>
        </a>

        <div class="flex items-center md:order-2 space-x-3 relative">
            <?php if(session()->get('logged_in')): ?>
                <button type="button" class="flex items-center space-x-3 p-1 pr-4 rounded-full hover:bg-gray-100 transition" id="user-menu-button" data-dropdown-toggle="user-dropdown">
                    <div class="hidden md:block text-left leading-tight">
                        <p class="text-[10px] font-black text-gray-900 uppercase tracking-wide"><?= session()->get('nama') ?></p>
                        <p class="text-[9px] text-pink-500 font-bold uppercase tracking-widest">Client Account</p>
                    </div>
                    <i class="bi bi-chevron-down text-[10px] text-gray-400"></i>
                </button>

                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-2xl shadow-2xl border border-gray-100 w-56 dropdown-animate" id="user-dropdown">
                    <div class="px-5 py-4 bg-gray-50/50 rounded-t-2xl border-b border-gray-100">
                        <span class="block text-[9px] font-black text-gray-400 uppercase tracking-[0.2em] mb-1">Signed in as</span>
                        <span class="block text-xs font-bold text-gray-900 truncate"><?= session()->get('email') ?></span>
                    </div>
                    <ul class="py-2 px-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="<?= base_url('profil') ?>" class="flex items-center gap-3 px-4 py-3 text-[11px] font-bold text-gray-700 hover:bg-pink-50 hover:text-pink-600 rounded-xl transition font-montserrat uppercase tracking-wider">
                                <i class="bi bi-person-circle text-lg"></i>
                                My Profile
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('logout') ?>" class="flex items-center gap-3 px-4 py-3 text-[11px] font-bold text-red-500 hover:bg-red-50 rounded-xl transition mt-1 pt-3 border-t border-gray-50 font-montserrat uppercase tracking-wider">
                                <i class="bi bi-box-arrow-right text-lg"></i>
                                Sign out
                            </a>
                        </li>
                    </ul>
                </div>
            <?php else: ?>
                <a href="<?= base_url('login') ?>" class="bg-pink-500 hover:bg-pink-600 text-white px-7 py-2.5 rounded-xl font-bold text-[11px] uppercase tracking-widest transition shadow-lg shadow-pink-200 font-montserrat">
                    Login
                </a>
            <?php endif; ?>

            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-xl md:hidden hover:bg-gray-100 focus:outline-none transition border border-gray-100">
                <i class="bi bi-list text-2xl"></i>
            </button>
        </div>

        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="flex flex-col font-bold p-4 md:p-0 mt-4 border border-gray-100 rounded-2xl bg-gray-50 md:space-x-4 md:flex-row md:mt-0 md:border-0 md:bg-white uppercase tracking-[0.25em] text-[10px]">
                <li>
                    <a href="<?= base_url() ?>" class="nav-link block py-2 px-4 <?= (uri_string() == '') ? 'nav-active' : 'text-gray-400 hover:text-pink-500' ?> transition">Home</a>
                </li>
                <li>
                    <a href="<?= base_url('layanan') ?>" class="nav-link block py-2 px-4 <?= (uri_string() == 'layanan') ? 'nav-active' : 'text-gray-400 hover:text-pink-500' ?> transition">Layanan</a>
                </li>
                <li>
                    <a href="<?= base_url('vendor') ?>" class="nav-link block py-2 px-4 <?= (uri_string() == 'vendor') ? 'nav-active' : 'text-gray-400 hover:text-pink-500' ?> transition">Vendor</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="h-20"></div>