<div class="bg-white">
    {{-- Hero Section --}}
    <section class="relative pt-20 pb-16 lg:pt-32 lg:pb-32 overflow-hidden bg-white">
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-wrap lg:flex-nowrap items-center gap-16">
                <div class="w-full lg:w-3/5">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-100 mb-6">
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                        <span class="text-[10px] font-bold text-blue-600 uppercase tracking-widest">Google Business Creation</span>
                    </div>
                    <h1 class="text-4xl lg:text-8xl font-black text-slate-900 leading-[0.9] mb-8 tracking-tighter">
                        Daftarkan Bisnis <br><span class="text-blue-600 italic">di Google Maps</span>
                    </h1>
                    <p class="text-xl text-slate-600 mb-10 leading-relaxed max-w-2xl">
                        Mudahkan pelanggan menemukan lokasi fisik bisnis Anda. Kami melayani jasa **Pembuatan & Verifikasi** Google Business Profile (GMB) secara profesional, memastikan alamat Anda akurat di Maps dan siap menerima ulasan dari pelanggan.
                    </p>
                    <div class="flex flex-wrap gap-6 items-center">
                        <a href="https://wa.me/{{ config('contact.whatsapp') }}" class="px-10 py-5 bg-primary text-white font-bold rounded-2xl hover:bg-slate-800 transition-all shadow-2xl shadow-primary/20 flex items-center gap-3 group">
                             Buat Profil Sekarang
                            <i class="fa-solid fa-map-location-dot text-sm group-hover:scale-110 transition-transform"></i>
                        </a>
                        <div class="flex items-center gap-4">
                            <i class="fa-solid fa-shield-check text-emerald-500 text-2xl"></i>
                            <span class="text-sm font-bold text-slate-400 italic">Bantu proses verifikasi hingga tuntas</span>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-2/5 relative">
                    <div class="relative z-10 bg-slate-50 border border-slate-200 p-8 rounded-[3rem] shadow-xl">
                        <div class="absolute -top-6 -right-6 bg-white p-5 rounded-2xl shadow-2xl flex items-center gap-4 border border-blue-50">
                            <div class="w-12 h-12 bg-blue-600 text-white rounded-xl flex items-center justify-center text-xl shadow-lg shadow-blue-500/20">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <div>
                                <div class="text-xs text-slate-400 font-bold uppercase tracking-wider">Status Profil</div>
                                <div class="text-xl font-black text-slate-900">100% Aktif</div>
                            </div>
                        </div>
                        
                        <div class="space-y-8 mt-6">
                            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                                <h4 class="text-sm font-black text-slate-900 mb-4 tracking-tight">Kebutuhan Pendaftaran</h4>
                                <ul class="space-y-4">
                                    <li class="flex items-center gap-3 text-xs font-bold text-slate-500">
                                        <i class="fa-solid fa-circle-check text-emerald-500"></i> Alamat Lengkap & Koordinat
                                    </li>
                                    <li class="flex items-center gap-3 text-xs font-bold text-slate-500">
                                        <i class="fa-solid fa-circle-check text-emerald-500"></i> Nomor Telepon Bisnis
                                    </li>
                                    <li class="flex items-center gap-3 text-xs font-bold text-slate-500">
                                        <i class="fa-solid fa-circle-check text-emerald-500"></i> Foto Tempat & Produk
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="p-6 bg-blue-600 rounded-2xl text-white">
                                <div class="text-[10px] font-black uppercase tracking-widest opacity-60 mb-1">Target</div>
                                <div class="text-lg font-black leading-tight">Bisnis Muncul di Pencarian Sekitar</div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[110%] h-[110%] bg-blue-500/10 rounded-full blur-[100px]"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Value Section --}}
    <section class="py-24 bg-slate-50">
        <div class="container mx-auto px-6 text-center max-w-4xl">
            <span class="text-blue-600 font-black tracking-widest uppercase text-xs mb-4 block">Pentingnya Google Maps</span>
            <h2 class="text-4xl lg:text-5xl font-black text-slate-900 tracking-tighter mb-8 italic">Jika Tidak Ada di Maps, Bisnis Anda <span class="text-blue-600">Terlihat Tidak Ada.</span></h2>
            <p class="text-lg text-slate-500 leading-relaxed mb-12">
                Di era digital, orang mencari tempat makan, bengkel, atau jasa lainnya langsung lewat Google Maps. Profil Google Business yang lengkap bukan hanya soal lokasi, tapi soal **kepercayaan pelanggan**. Bisnis yang terverifikasi memiliki kemungkinan 70% lebih besar untuk dikunjungi secara fisik.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
                    <div class="text-3xl text-blue-600 font-black mb-2 leading-none">88%</div>
                    <div class="text-sm font-bold text-slate-900 mb-2">Pencarian Lokal</div>
                    <p class="text-[10px] text-slate-400 leading-relaxed uppercase tracking-wider font-bold">Konsumen mengunjungi toko dalam 24 jam setelah mencari lewat ponsel.</p>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
                    <div class="text-3xl text-emerald-500 font-black mb-2 leading-none">3x</div>
                    <div class="text-sm font-bold text-slate-900 mb-2">Lebih Terpercaya</div>
                    <p class="text-[10px] text-slate-400 leading-relaxed uppercase tracking-wider font-bold">Bisnis dengan profil lengkap dianggap lebih profesional oleh Google.</p>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
                    <div class="text-3xl text-rose-500 font-black mb-2 leading-none">Rank</div>
                    <div class="text-sm font-bold text-slate-900 mb-2">Maps Authority</div>
                    <p class="text-[10px] text-slate-400 leading-relaxed uppercase tracking-wider font-bold">Muncul di urutan atas Maps saat orang mencari kategori bisnis Anda.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Service Steps --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20">
                 <h2 class="text-4xl lg:text-6xl font-black text-slate-900 tracking-tighter">Proses Pembuatan Profil</h2>
                 <p class="text-slate-500 mt-4 text-lg">Kami mendampingi pendaftaran Anda dari awal hingga tayang di publik.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="p-8 bg-slate-50 rounded-[2rem] border border-slate-100">
                    <div class="text-4xl font-black text-slate-200 mb-6">01</div>
                    <h3 class="font-black text-slate-900 mb-3 text-lg">Pendaftaran Data</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Input data nama bisnis, alamat presisi di maps, dan kategori layanan yang sesuai.</p>
                </div>

                <div class="p-8 bg-slate-50 rounded-[2rem] border border-slate-100">
                    <div class="text-4xl font-black text-slate-200 mb-6">02</div>
                    <h3 class="font-black text-slate-900 mb-3 text-lg">Optimasi Aset</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Penyusunan deskripsi yang menjual dan upload foto-foto terbaik agar profil terlihat profesional.</p>
                </div>

                <div class="p-8 bg-slate-50 rounded-[2rem] border border-slate-100">
                    <div class="text-4xl font-black text-slate-200 mb-6">03</div>
                    <h3 class="font-black text-slate-900 mb-3 text-lg">Proses Verifikasi</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Membantu klaim kepemilikan dan verifikasi (lewat video/surat) hingga disetujui Google.</p>
                </div>

                <div class="p-8 bg-blue-600 rounded-[2rem] text-white">
                    <div class="text-4xl font-black opacity-30 mb-6">04</div>
                    <h3 class="font-black mb-3 text-lg">Publish & Live</h3>
                    <p class="opacity-80 text-sm leading-relaxed">Bisnis Anda resmi tampil di Google Maps dan siap ditemukan oleh ribuan calon pelanggan.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto space-y-10">
                <h2 class="text-4xl lg:text-7xl font-black text-slate-900 tracking-tighter">Bantu Orang Lain <br><span class="text-blue-600">Menemukan Jalan</span> Ke Bisnis Anda.</h2>
                <p class="text-slate-500 text-xl font-bold italic">Satu kali pendaftaran, manfaat selamanya.</p>
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="https://wa.me/{{ config('contact.whatsapp') }}" class="inline-flex items-center gap-4 px-12 py-5 bg-primary text-white font-black rounded-2xl hover:bg-slate-800 transition-all shadow-2xl">
                        Daftarkan Sekarang
                        <i class="fa-solid fa-chevron-right text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
