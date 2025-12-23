<div>
    <!-- Hero Section -->
    <section class="hero-section py-20 lg:py-32 bg-gradient-to-br from-rose-500 to-rose-700 relative overflow-hidden">
        <div class="absolute -top-[20%] -left-[10%] w-[500px] h-[500px] bg-white/5 rounded-full blur-[100px] pointer-events-none"></div>
        
        <div class="container relative z-10 px-6">
            <div class="text-center max-w-3xl mx-auto text-white">
                <div class="inline-flex items-center gap-2.5 bg-white text-rose-600 px-5 py-2.5 rounded-full text-xs font-extrabold mb-8 uppercase tracking-widest shadow-xl">
                    <i class="fa-solid fa-circle-question"></i> Detail Jawaban
                </div>
                <h1 class="font-outfit text-4xl md:text-6xl font-black mb-6 leading-tight tracking-tight">Pahami Lebih Dalam</h1>
                
                <div class="flex items-center justify-center gap-4 text-base md:text-lg opacity-90">
                    <a href="{{ route('ask') }}" class="text-white no-underline border-b border-white/30 hover:border-white transition-colors">Pusat Bantuan</a>
                    <span class="opacity-50">/</span>
                    <span class="font-semibold">Detail</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Question Content -->
    <section class="py-12 md:py-24 bg-slate-50">
        <div class="container px-6">
            <div class="max-w-4xl mx-auto">
                <div class="ask-card bg-white rounded-[2rem] md:rounded-[3rem] shadow-xl shadow-slate-200/50 overflow-hidden border border-slate-100">
                    <div class="p-8 md:p-16">
                        <div class="flex flex-col md:flex-row gap-6 md:gap-10 items-start mb-12">
                             <div class="flex-shrink-0 w-16 h-16 bg-rose-600 rounded-2xl flex items-center justify-center text-white text-2xl shadow-lg shadow-rose-500/30">
                                <i class="fa-solid fa-quote-left"></i>
                            </div>
                            <div>
                                <h1 class="font-outfit text-2xl md:text-4xl font-black text-slate-900 mb-0 leading-tight">
                                    {{ $ask->question }}
                                </h1>
                                <p class="mt-4 text-slate-400 font-medium text-sm">Diterbitkan {{ $ask->created_at->format('d M Y') }}</p>
                            </div>
                        </div>

                        <div class="h-px bg-gradient-to-r from-slate-100 to-transparent mb-12"></div>

                        <div class="pl-0 md:pl-24 answer-wrapper">
                            <h3 class="font-outfit text-xl md:text-2xl font-bold text-slate-800 mb-6 flex items-center gap-4">
                                <span class="inline-block w-8 h-1 bg-rose-600 rounded-full"></span> Jawaban Kami
                            </h3>
                            <div class="text-slate-600 leading-relaxed text-lg md:text-xl font-normal">
                                {!! nl2br(e($ask->answer)) !!}
                            </div>
                            
                            <div class="mt-12 flex items-center gap-5 p-6 bg-slate-50 rounded-2xl border border-slate-100">
                                <div class="w-12 h-12 rounded-full bg-slate-200 flex items-center justify-center text-slate-500">
                                    <i class="fa-solid fa-user-check"></i>
                                </div>
                                <div class="block">
                                    <p class="m-0 text-sm font-bold text-slate-900 uppercase tracking-tight">Tim Teknis Dirtech</p>
                                    <p class="m-0 text-xs text-slate-400">Terakhir diperbarui {{ $ask->updated_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="px-8 md:px-16 py-8 bg-slate-900 flex flex-col md:flex-row justify-between items-center gap-6">
                        <a href="{{ route('ask') }}" class="text-white/70 no-underline font-bold flex items-center gap-3 hover:text-white transition-colors">
                            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
                        </a>
                        <div class="flex gap-4 w-full md:w-auto">
                            <button onclick="navigator.clipboard.writeText(window.location.href); alert('Link berhasil disalin!')" class="flex-1 md:flex-none border border-white/20 bg-transparent text-white px-8 py-3 rounded-xl font-bold hover:bg-white/5 transition-all flex items-center justify-center gap-3">
                                <i class="fa-solid fa-share-nodes"></i> Bagikan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
