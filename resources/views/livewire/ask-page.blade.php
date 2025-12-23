<div>
    <!-- Hero Section -->
    <section class="hero-section relative overflow-hidden border-b border-slate-100 bg-[#fafafa] py-16 lg:py-32">
        <!-- Subtle Decoration -->
        <div class="absolute -top-[10%] -left-[5%] w-[400px] h-[400px] bg-black/5 rounded-full blur-[80px] pointer-events-none opacity-20"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center max-w-[850px] mx-auto text-primary">
                <div class="font-extrabold text-accent uppercase tracking-[0.15em] text-[0.7rem] lg:text-[0.9rem] mb-6">Knowledge Base</div>
                <h1 class="font-outfit text-4xl md:text-6xl lg:text-[4.5rem] font-black mb-6 leading-[1.1] tracking-tighter">
                    Pusat Bantuan <br><span class="text-accent/80">& Tanya Jawab</span>
                </h1>
                <p class="text-lg lg:text-[1.35rem] text-slate-500 font-normal max-w-[650px] mx-auto mb-12 leading-relaxed">
                    Temukan jawaban instan untuk mengoptimalkan performa infrastruktur digital dan pertumbuhan bisnis Anda.
                </p>
                
                <!-- Premium Search Bar -->
                <div class="max-w-[650px] mx-auto relative px-4 md:px-0">
                    <div class="bg-white border border-slate-200 rounded-3xl p-2 md:p-3 flex items-center shadow-xl shadow-slate-200/50 transition-all focus-within:ring-4 focus-within:ring-primary/5 focus-within:border-primary/30">
                        <i class="fa-solid fa-magnifying-glass ml-4 md:ml-6 text-slate-400"></i>
                        <input type="text" wire:model="search" wire:keydown.enter="performSearch" 
                            placeholder="Ada yang bisa kami bantu?" 
                            class="flex-1 bg-transparent border-none text-slate-900 py-3 md:py-4 px-4 md:px-6 text-base md:text-xl outline-none font-sans placeholder:text-slate-400">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-12 md:py-24 bg-slate-50 min-h-[600px]">
        <div class="container">
            <div style="max-width: 1000px; margin: 0 auto;">
                <div class="faq-container">
                    @forelse($asks as $ask)
                        <div class="ask-card mb-8 bg-white rounded-3xl p-6 lg:p-10 border border-slate-100 shadow-sm">
                            <div class="flex flex-col md:flex-row gap-6 lg:gap-8 items-start">
                                <div class="flex-shrink-0 w-12 h-12 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center text-xl font-black shadow-inner">
                                    Q
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-outfit text-xl lg:text-2xl font-bold text-slate-800 mb-4 leading-snug">
                                        <a href="{{ route('ask.show', $ask->slug) }}" class="hover:text-accent transition-colors">
                                            {{ $ask->question }}
                                        </a>
                                    </h3>
                                    <div class="text-slate-500 leading-relaxed text-base lg:text-lg mb-6">
                                        {{ \Illuminate\Support\Str::limit($ask->answer, 180) }}
                                    </div>
                                    <div class="flex flex-wrap justify-between items-center gap-4 pt-4 border-t border-slate-50">
                                        <a href="{{ route('ask.show', $ask->slug) }}" class="text-accent font-bold text-sm lg:text-base flex items-center gap-2 hover:gap-4 transition-all">
                                            Baca Selengkapnya <i class="fa-solid fa-arrow-right text-xs transition-transform group-hover:translate-x-1"></i>
                                        </a>
                                        <span class="text-xs font-semibold text-slate-300 uppercase tracking-widest">
                                            <i class="fa-solid fa-eye mr-1 opacity-50"></i> {{ rand(100, 999) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center" style="padding: 120px 0; background: white; border-radius: 32px; border: 2px dashed #e2e8f0;">
                            <div style="font-size: 6rem; color: #f1f5f9; margin-bottom: 30px;">
                                <i class="fa-solid fa-cloud-moon"></i>
                            </div>
                            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.75rem; color: #64748b; font-weight: 700;">Hening Sekali...</h3>
                            <p style="color: #94a3b8; font-size: 1.1rem;">Pertanyaan yang Anda cari tidak ditemukan atau belum ada.</p>
                            @if($search)
                                <button wire:click="$set('search', '')" style="margin-top: 30px; background: #e11d48; color: white; border: none; padding: 12px 30px; border-radius: 14px; font-weight: 700; cursor: pointer; transition: all 0.2s ease;">
                                    Hapus Pencarian
                                </button>
                            @endif
                        </div>
                    @endforelse
                </div>
                
                <div class="mt-16 flex justify-center pagination-container">
                    {{ $asks->links('vendor.pagination.ask-custom') }}
                </div>
            </div>
        </div>

        <style>
            /* Hide 'Showing X to Y' metadata */
            .pagination-container nav > div:first-child { display: none !important; }
            .pagination-container nav p { display: none !important; }
            
            .pagination-container nav > div:last-child { 
                display: flex !important; 
                flex-wrap: wrap;
                gap: 8px;
                justify-content: center;
            }
            .pagination-container nav span[aria-current="page"] > span {
                background-color: #D31A1A !important;
                color: white !important;
                border-color: #D31A1A !important;
            }
            .pagination-container nav a, 
            .pagination-container nav span[aria-disabled="true"] > span,
            .pagination-container nav span[aria-current="page"] > span {
                width: 45px !important;
                height: 45px !important;
                display: flex !important;
                align-items: center;
                justify-content: center;
                border-radius: 12px !important;
                font-weight: 700 !important;
                font-size: 0.9rem !important;
                font-size: 0.9rem !important;
                border: 1px solid #e2e8f0 !important;
                background: white !important;
                color: #0f172a !important;
            }
            .pagination-container nav svg { width: 20px !important; height: 20px !important; }
        </style>
    </section>
</div>
