<?= $this->include('templates/header') ?>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700;900&family=Arimo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
 
    body {
        font-family: 'Arimo', sans-serif; 
    }

    h1, h2, h3, h4, span, button, a, .font-display {
        font-family: 'Montserrat', sans-serif !important; 
    }

    .font-black { font-weight: 900; }
    
    .text-outline {
        -webkit-text-stroke: 1px #ec4899;
        color: transparent;
    }
</style>

<div class="relative w-full h-[500px] flex items-center overflow-hidden" id="home">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=2070&auto=format&fit=crop" alt="Wedding Background" class="object-cover w-full h-full" />
        <div class="absolute inset-0 bg-gradient-to-r from-pink-50 via-pink-50/40 to-transparent"></div>
    </div>
    <div class="container mx-auto px-8 relative z-10">
        <div class="md:w-1/2" data-aos="fade-right">
            <span class="text-pink-500 font-black uppercase tracking-[0.3em] text-[10px] mb-4 block">Premium Wedding Planner</span>
            <h1 class="text-gray-900 font-black text-5xl md:text-7xl leading-[0.9] mb-6 italic tracking-tighter">
                Crafting Your <br><span class="text-pink-500">Perfect Day.</span>
            </h1>
            <p class="text-gray-600 text-lg mb-8 max-w-sm italic font-medium leading-relaxed">
                Kami mewujudkan visi pernikahan Anda menjadi kenyataan yang tak terlupakan dengan sentuhan elegan.
            </p>
            <a href="#contactUs" class="px-10 py-4 bg-pink-500 text-white font-black rounded-full hover:bg-pink-600 transition shadow-xl shadow-pink-200 uppercase text-xs tracking-widest">
                Start Planning
            </a>
        </div>
    </div>
</div>

<section class="py-20 bg-white" id="services">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl md:text-6xl font-black text-gray-900 tracking-tighter uppercase italic">
                Our <span class="text-pink-500">Services.</span>
            </h2>
            <p class="text-gray-400 font-bold text-xs uppercase tracking-widest mt-2 text-center leading-relaxed">
                Layanan kurasi terbaik untuk setiap detail pernikahan Anda
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="bg-white rounded-[3rem] shadow-xl shadow-pink-100/50 overflow-hidden border border-pink-50 group hover:bg-gray-900 transition-all duration-500" data-aos="fade-up">
                <img src="https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?auto=format&fit=crop&w=800" class="w-full h-64 object-cover">
                <div class="p-10 text-center">
                    <h3 class="text-2xl font-black text-gray-900 group-hover:text-white mb-4 italic">Photography</h3>
                    <p class="text-gray-500 group-hover:text-gray-400 text-sm leading-relaxed">
                        Menangkap setiap emosi dan momen sakral melalui lensa profesional dengan gaya sinematik yang abadi.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-[3rem] shadow-xl shadow-pink-100/50 overflow-hidden border border-pink-50 group hover:bg-gray-900 transition-all duration-500" data-aos="fade-up" data-aos-delay="100">
                <img src="https://images.unsplash.com/photo-1520854221256-17451cc331bf?q=80&w=2070&auto=format&fit=crop" class="w-full h-64 object-cover">
                <div class="p-10 text-center">
                    <h3 class="text-2xl font-black text-gray-900 group-hover:text-white mb-4 italic">Decoration</h3>
                    <p class="text-gray-500 group-hover:text-gray-400 text-sm leading-relaxed">
                        Mengubah ruang menjadi instalasi seni yang merefleksikan kepribadian dan cinta Anda secara eksklusif.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-[3rem] shadow-xl shadow-pink-100/50 overflow-hidden border border-pink-50 group hover:bg-gray-900 transition-all duration-500" data-aos="fade-up" data-aos-delay="200">
                <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?q=80&w=2069&auto=format&fit=crop" class="w-full h-64 object-cover">
                <div class="p-10 text-center">
                    <h3 class="text-2xl font-black text-gray-900 group-hover:text-white mb-4 italic">Wedding Planner</h3>
                    <p class="text-gray-500 group-hover:text-gray-400 text-sm leading-relaxed">
                        Manajemen presisi dari A-Z untuk memastikan hari bahagia Anda berjalan sempurna tanpa rasa khawatir.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-pink-50 py-24" id="aboutus">
    <div class="container mx-auto px-6 lg:px-20">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-16">
            <div data-aos="fade-right">
                <h4 class="text-pink-500 font-black uppercase tracking-[0.3em] text-[10px] mb-4 text-center md:text-left">Who We Are</h4>
                <h2 class="text-4xl md:text-6xl font-black text-gray-900 mb-8 italic tracking-tighter text-center md:text-left leading-none">We Believe in <span class="text-pink-500">Pure Magic.</span></h2>
                <p class="text-gray-600 text-lg leading-relaxed italic font-medium">
                    Love Wedding lahir dari keinginan untuk mendefinisikan kembali kemewahan dalam pernikahan. Kami menyediakan vendor-vendor top tier yang telah terverifikasi untuk memastikan setiap pernikahan memiliki cerita uniknya sendiri.
                </p>
                <div class="mt-8 flex justify-center md:justify-start gap-10">
                    <div><span class="block text-3xl font-black text-gray-900">250+</span><span class="text-[9px] font-black text-pink-500 uppercase">Weddings</span></div>
                    <div><span class="block text-3xl font-black text-gray-900">42+</span><span class="text-[9px] font-black text-pink-500 uppercase">Elite Vendors</span></div>
                </div>
            </div>
            <div class="relative" data-aos="zoom-in">
                <div class="absolute -top-10 -left-10 w-40 h-40 bg-pink-200 rounded-full blur-3xl opacity-50"></div>
                <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?q=80&w=2070&auto=format&fit=crop" class="object-cover rounded-[3rem] shadow-2xl relative z-10">
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-black text-gray-900 text-center mb-16 uppercase italic tracking-tighter" data-aos="fade-up">Why <span class="text-pink-500">Love Wedding?</span></h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-10">
            <div class="text-center group p-8 rounded-3xl hover:bg-pink-50 transition" data-aos="fade-up">
                <div class="w-20 h-20 bg-pink-100 rounded-2xl flex items-center justify-center text-pink-500 mx-auto mb-6 group-hover:bg-pink-500 group-hover:text-white transition">
                    <i class="bi bi-shield-check text-4xl"></i>
                </div>
                <h3 class="font-black text-gray-900 text-sm uppercase tracking-widest">Trusted Vendors</h3>
            </div>
            <div class="text-center group p-8 rounded-3xl hover:bg-pink-50 transition" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-20 bg-pink-100 rounded-2xl flex items-center justify-center text-pink-500 mx-auto mb-6 group-hover:bg-pink-500 group-hover:text-white transition">
                    <i class="bi bi-gem text-4xl"></i>
                </div>
                <h3 class="font-black text-gray-900 text-sm uppercase tracking-widest">Premium Quality</h3>
            </div>
            <div class="text-center group p-8 rounded-3xl hover:bg-pink-50 transition" data-aos="fade-up" data-aos-delay="200">
                <div class="w-20 h-20 bg-pink-100 rounded-2xl flex items-center justify-center text-pink-500 mx-auto mb-6 group-hover:bg-pink-500 group-hover:text-white transition">
                    <i class="bi bi-clock-history text-4xl"></i>
                </div>
                <h3 class="font-black text-gray-900 text-sm uppercase tracking-widest">Time Efficiency</h3>
            </div>
            <div class="text-center group p-8 rounded-3xl hover:bg-pink-50 transition" data-aos="fade-up" data-aos-delay="300">
                <div class="w-20 h-20 bg-pink-100 rounded-2xl flex items-center justify-center text-pink-500 mx-auto mb-6 group-hover:bg-pink-500 group-hover:text-white transition">
                    <i class="bi bi-stars text-4xl"></i>
                </div>
                <h3 class="font-black text-gray-900 text-sm uppercase tracking-widest">Expertise</h3>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-gray-950" id="gallery">
    <div class="text-center mb-16" data-aos="fade-down">
        <h2 class="text-4xl md:text-6xl font-black text-white tracking-tighter uppercase leading-none italic">
            Candid <br> <span class="text-pink-500 text-outline">Moments.</span>
        </h2>
    </div>

    <div class="columns-1 md:columns-4 gap-4 p-6 space-y-4" data-aos="fade-up">
        <img src="https://images.unsplash.com/photo-1510076857177-7470076d4098?q=80&w=1887&auto=format&fit=crop" class="rounded-[2rem] w-full hover:grayscale transition duration-500 shadow-2xl">
        <img src="https://images.unsplash.com/photo-1465495910483-0d7589f479c5?q=80&w=2070&auto=format&fit=crop" class="rounded-[2rem] w-full hover:grayscale transition duration-500 shadow-2xl">
        <img src="https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?q=80&w=2070&auto=format&fit=crop" class="rounded-[2rem] w-full hover:grayscale transition duration-500 shadow-2xl">
        <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=2070&auto=format&fit=crop" class="rounded-[2rem] w-full hover:grayscale transition duration-500 shadow-2xl">
    </div>
</section>

<section class="bg-white py-24" id="contactUs">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 italic tracking-tighter mb-8 uppercase">Visit Our <span class="text-pink-500">Office.</span></h2>
                <div class="space-y-8">
                    <div>
                        <h3 class="text-[10px] font-black text-pink-500 uppercase tracking-widest mb-2">Office Address</h3>
                        <p class="text-xl font-bold text-gray-600">Sulis CAgtip </p>
                    </div>
                    <div class="flex items-center gap-6">
                        <div>
                            <h3 class="text-[10px] font-black text-pink-500 uppercase tracking-widest mb-2">Direct Contact</h3>
                            <a href="tel:+62812345678" class="text-2xl font-black text-gray-900">+62 800 1111 2222</a>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-[10px] font-black text-pink-500 uppercase tracking-widest mb-2">Business Hours</h3>
                        <p class="text-gray-600 font-bold">Monday - Sunday : 10am - 9pm</p>
                    </div>
                </div>
            </div>
            <div class="rounded-[3rem] overflow-hidden shadow-2xl border-4 border-pink-50" data-aos="fade-left">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.679050298206!2d109.01747617500426!3d-7.71754409230041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e651293a2007061%3A0xf2805342d2da3715!2sPoliteknik%20Negeri%20Cilacap!5e0!3m2!1sid!2sid!4v1767019730461!5m2!1sid!2sid" width="600" height="450" style="border: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<script>
    AOS.init({ once: true, duration: 1000 });

    document.getElementById("hamburger").onclick = function toggleMenu() {
        const navToggle = document.getElementsByClassName("toggle");
        for (let i = 0; i < navToggle.length; i++) {
          navToggle.item(i).classList.toggle("hidden");
        }
    };
</script>

<?= $this->include('templates/footer') ?>