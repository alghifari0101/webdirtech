<div class="bg-white">
    {{-- Hero Section --}}
    <section class="relative pt-20 pb-16 lg:pt-32 lg:pb-32 overflow-hidden bg-slate-50">
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-5xl lg:text-7xl font-black text-primary leading-[1.1] mb-8 tracking-tighter">
                Mari Bicara Tentang <br><span class="text-accent italic">Solusi Digital Anda</span>
            </h1>
            <p class="text-xl text-slate-500 max-w-2xl mx-auto leading-relaxed">
                Punya pertanyaan atau proyek yang ingin didiskusikan? Tim kami siap memberikan konsultasi terbaik untuk kebutuhan infrastruktur dan kehadiran digital bisnis Anda.
            </p>
        </div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full -z-10 opacity-30">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-accent/10 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-primary/5 rounded-full blur-[120px]"></div>
        </div>
    </section>

    {{-- Contact Specs --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                {{-- Info Card 1 --}}
                <div class="p-10 rounded-[3rem] bg-slate-50 border border-slate-100 hover:shadow-2xl hover:shadow-primary/5 transition-all duration-500 group">
                    <div class="w-16 h-16 bg-accent text-white rounded-2xl flex items-center justify-center text-3xl mb-8 shadow-xl shadow-accent/20 group-hover:scale-110 transition-transform">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <h3 class="text-2xl font-black text-primary mb-4 tracking-tight">WhatsApp Support</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-8">Respon cepat untuk pertanyaan seputar layanan dan penawaran harga.</p>
                    <a href="https://wa.me/{{ config('contact.whatsapp') }}" class="inline-flex items-center gap-2 font-bold text-accent group-hover:gap-4 transition-all">
                        Chat via WhatsApp <i class="fa-solid fa-arrow-right text-sm"></i>
                    </a>
                </div>

                {{-- Info Card 2 --}}
                <div class="p-10 rounded-[3rem] bg-slate-50 border border-slate-100 hover:shadow-2xl hover:shadow-primary/5 transition-all duration-500 group">
                    <div class="w-16 h-16 bg-primary text-white rounded-2xl flex items-center justify-center text-3xl mb-8 shadow-xl shadow-primary/20 group-hover:scale-110 transition-transform">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <h3 class="text-2xl font-black text-primary mb-4 tracking-tight">Email Inquiry</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-8">Kirimkan detail kerjasama atau kendala teknis Anda melalui email kami.</p>
                    <a href="mailto:support@dirtech.web.id" class="inline-flex items-center gap-2 font-bold text-primary group-hover:gap-4 transition-all">
                        Kirim Email <i class="fa-solid fa-arrow-right text-sm"></i>
                    </a>
                </div>

                {{-- Info Card 3 --}}
                <div class="p-10 rounded-[3rem] bg-slate-50 border border-slate-100 hover:shadow-2xl hover:shadow-primary/5 transition-all duration-500 group">
                    <div class="w-16 h-16 bg-slate-900 text-white rounded-2xl flex items-center justify-center text-3xl mb-8 shadow-xl shadow-slate-900/20 group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <h3 class="text-2xl font-black text-primary mb-4 tracking-tight">Lokasi Kantor</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-8">Pekalongan, Jawa Tengah, Indonesia. Melayani klien dari seluruh Nusantara.</p>
                    <span class="inline-flex items-center gap-2 font-bold text-slate-400">
                        Visit our Office <i class="fa-solid fa-chevron-right text-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Form Section --}}
    <section class="py-24 bg-slate-50">
        <div class="container mx-auto px-6">
            <div class="bg-white rounded-[4rem] shadow-2xl overflow-hidden border border-slate-100">
                <div class="flex flex-wrap lg:flex-nowrap">
                    <div class="w-full lg:w-1/2 p-12 lg:p-24 bg-primary text-white relative">
                        <div class="relative z-10">
                            <h2 class="text-4xl lg:text-5xl font-black mb-8 tracking-tighter italic">Kirim Pesan Langsung</h2>
                            <p class="text-slate-400 text-lg mb-12 leading-relaxed">
                                Isi formulir di samping untuk mendapatkan estimasi biaya pengerjaan atau sekedar menyapa kami. Kami akan menghubungi Anda kembali dalam waktu maksimal 24 jam.
                            </p>
                            <div class="space-y-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-accent flex items-center justify-center text-white font-bold">1</div>
                                    <span class="text-sm font-bold opacity-80 uppercase tracking-widest">Konsultasi Kebutuhan</span>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-accent flex items-center justify-center text-white font-bold">2</div>
                                    <span class="text-sm font-bold opacity-80 uppercase tracking-widest">Penyusunan Strategi</span>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-accent flex items-center justify-center text-white font-bold">3</div>
                                    <span class="text-sm font-bold opacity-80 uppercase tracking-widest">Eksekusi Proyek</span>
                                </div>
                            </div>
                        </div>
                        <div class="absolute -bottom-20 -left-20 w-96 h-96 bg-accent/10 rounded-full blur-3xl"></div>
                    </div>
                    <div class="w-full lg:w-1/2 p-12 lg:p-24">
                        <form action="#" class="space-y-8">
                            <div>
                                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-3">Nama Lengkap</label>
                                <input type="text" placeholder="Contoh: Budi Santoso" class="w-full px-8 py-5 rounded-2xl bg-slate-50 border border-slate-100 focus:border-accent focus:ring-0 transition-all text-primary font-bold placeholder:text-slate-300">
                            </div>
                            <div>
                                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-3">Email Bisnis</label>
                                <input type="email" placeholder="budi@perusahaan.com" class="w-full px-8 py-5 rounded-2xl bg-slate-50 border border-slate-100 focus:border-accent focus:ring-0 transition-all text-primary font-bold placeholder:text-slate-300">
                            </div>
                            <div>
                                <label class="block text-xs font-black text-slate-400 uppercase tracking-widest mb-3">Pesan Anda</label>
                                <textarea placeholder="Ceritakan kebutuhan IT Anda..." rows="5" class="w-full px-8 py-5 rounded-2xl bg-slate-50 border border-slate-100 focus:border-accent focus:ring-0 transition-all text-primary font-bold placeholder:text-slate-300"></textarea>
                            </div>
                            <button type="button" class="w-full py-6 bg-primary text-white font-black rounded-2xl hover:bg-accent transition-all shadow-xl shadow-primary/20">
                                Kirim Pesan Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
