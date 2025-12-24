<article class="bg-white">

    {{-- Header Section --}}
    <header class="relative pt-6 pb-2 lg:pt-8 lg:pb-4 overflow-hidden bg-white border-b border-slate-50">
        <div class="container mx-auto px-6 relative z-10 text-center max-w-4xl">
            <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 text-blue-600 font-bold text-[9px] uppercase tracking-widest mb-2 hover:gap-4 transition-all">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Blog
            </a>
            <div class="flex items-center justify-center gap-3 mb-2">
                <span class="px-3 py-0.5 bg-blue-50 text-blue-600 rounded-full text-[8px] font-black uppercase tracking-wider">
                    {{ $post->category->name }}
                </span>
                <span class="text-slate-400 text-[9px] font-bold uppercase tracking-widest">
                    {{ $post->published_at->format('M d, Y') }}
                </span>
            </div>
            <h1 class="text-3xl lg:text-4xl font-black text-slate-900 tracking-tight leading-tight">
                {{ $post->title }}
            </h1>
        </div>
    </header>

    {{-- Content Section --}}
    <section class="py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                {{-- Main Content --}}
                <div class="lg:col-span-8">
                    @if($post->featured_image)
                        <div class="rounded-[2.5rem] overflow-hidden shadow-2xl shadow-blue-500/10 mb-12 relative z-20 max-h-[450px] aspect-video">
                            <img src="{{ storage_url($post->featured_image) }}" alt="{{ $post->title }}" title="{{ $post->title }}" loading="eager" class="w-full h-full object-cover">
                        </div>
                    @endif

                    @if(count($toc) > 0)
                        <div class="mb-12 p-8 bg-slate-50 rounded-[2rem] border border-slate-100">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white shadow-lg shadow-blue-500/20">
                                    <i class="fa-solid fa-list-ul"></i>
                                </div>
                                <h3 class="text-xl font-black text-slate-900 tracking-tight">Daftar Isi</h3>
                            </div>
                            <nav class="space-y-3">
                                @foreach($toc as $item)
                                    <a href="#{{ $item['id'] }}" 
                                       class="group flex items-start gap-3 text-slate-600 hover:text-blue-600 transition-colors font-medium {{ $item['level'] == 3 ? 'ml-8 text-sm' : 'text-base' }}">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-300 mt-2.5 group-hover:bg-blue-600 transition-colors flex-shrink-0"></span>
                                        {{ $item['text'] }}
                                    </a>
                                @endforeach
                            </nav>
                        </div>
                    @endif

                    <div class="prose prose-slate prose-lg lg:prose-xl max-w-none text-slate-600 leading-relaxed font-normal">
                        {!! $processedContent !!}
                    </div>

                    {{-- Author Box --}}
                    <div class="mt-16 p-8 bg-slate-50 rounded-[2rem] border border-slate-100 flex flex-col md:flex-row items-center gap-8 relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-blue-600/5 rounded-full -mr-16 -mt-16 transition-transform group-hover:scale-150 duration-700"></div>
                        
                        <div class="w-24 h-24 rounded-2xl bg-white p-4 shadow-sm border border-slate-100 flex-shrink-0 relative z-10">
                            <img src="{{ asset('img/favicon.svg') }}" alt="Dirtech Logo" class="w-full h-full object-contain">
                        </div>
                        
                        <div class="relative z-10 text-center md:text-left">
                            <div class="flex flex-col md:flex-row md:items-center gap-2 mb-2">
                                <h4 class="text-xl font-black text-slate-900 tracking-tight">Dirtech <span class="text-blue-600">Editorial Team</span></h4>
                                <span class="px-3 py-0.5 bg-blue-600 text-white rounded-full text-[8px] font-black uppercase tracking-wider self-center md:self-auto">Verified Expert</span>
                            </div>
                            <p class="text-slate-500 text-sm leading-relaxed mb-4">
                                Dirtech adalah partner teknologi terpercaya yang menghadirkan solusi digital inovatif mulai dari jasa pembuatan website premium, install VPS, migrasi website, hingga pembuatan Google Business Profile.
                            </p>
                            <div class="flex items-center justify-center md:justify-start gap-4">
                                <a href="{{ route('home') }}" class="text-slate-400 hover:text-blue-600 transition-colors text-sm font-bold flex items-center gap-1">
                                    <i class="fa-solid fa-earth-asia"></i> Website
                                </a>
                                <span class="w-1 h-1 bg-slate-200 rounded-full"></span>
                                <a href="https://wa.me/{{ config('contact.whatsapp') }}" class="text-slate-400 hover:text-emerald-500 transition-colors text-sm font-bold flex items-center gap-1">
                                    <i class="fa-brands fa-whatsapp"></i> Konsultasi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <aside class="lg:col-span-4 space-y-12">

                    {{-- Recent Posts --}}
                    <div>
                        <h3 class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-6 flex items-center gap-3">
                            Artikel Terbaru
                            <span class="flex-1 h-px bg-slate-100"></span>
                        </h3>
                        <div class="space-y-6">
                            @foreach($recentPosts as $rp)
                                <a href="{{ route('blog.show', $rp->slug) }}" class="group flex items-center gap-4">
                                    <div class="w-20 h-20 rounded-2xl overflow-hidden bg-slate-100 flex-shrink-0">
                                        @if($rp->featured_image)
                                            <img src="{{ storage_url($rp->featured_image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <i class="fa-solid fa-image text-slate-300"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-bold text-slate-900 group-hover:text-blue-600 transition-colors line-clamp-2 leading-snug mb-1">
                                            {{ $rp->title }}
                                        </h4>
                                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                                            {{ $rp->published_at->format('M d, Y') }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                </aside>
            </div>

            {{-- Post CTA --}}
            <div class="mt-24 p-8 lg:p-12 bg-slate-900 rounded-[3rem] relative overflow-hidden text-center lg:text-left flex flex-wrap lg:flex-nowrap items-center gap-10">
                <div class="absolute -top-1/2 -right-1/4 w-[400px] h-[400px] bg-blue-600/20 rounded-full blur-[100px] pointer-events-none"></div>
                <div class="relative z-10 flex-1">
                    <h3 class="text-3xl lg:text-4xl font-black text-white tracking-tight mb-4 leading-tight">Siap Mewujudkan <span class="text-blue-400">Transformasi Digital?</span></h3>
                    <p class="text-slate-400 text-lg font-medium leading-relaxed">
                        Dapatkan solusi teknologi kustom dari tim ahli Dirtech untuk mempercepat pertumbuhan bisnis Anda hari ini.
                    </p>
                </div>
                <div class="relative z-10">
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-4 px-10 py-5 bg-blue-600 text-white font-black rounded-2xl hover:bg-blue-700 transition-all shadow-xl shadow-blue-500/20 whitespace-nowrap">
                        Konsultasi Gratis
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Related Posts --}}
    @if($relatedPosts->count() > 0)
    <section class="py-24 bg-slate-50 border-t border-slate-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-black text-slate-900 tracking-tight mb-12 italic text-center underline decoration-blue-600/30 decoration-8 underline-offset-8">Wawasan Terkait Lainnya</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($relatedPosts as $rp)
                    <article class="bg-white p-2 rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition-all group">
                        <a href="{{ route('blog.show', $rp->slug) }}" class="block aspect-video rounded-2xl overflow-hidden mb-6">
                            @if($rp->featured_image)
                                <img src="{{ storage_url($rp->featured_image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-300">
                                    <i class="fa-solid fa-image text-2xl"></i>
                                </div>
                            @endif
                        </a>
                        <div class="px-4 pb-6">
                            <h4 class="text-lg font-black text-slate-900 leading-tight mb-2 group-hover:text-blue-600 transition-colors">
                                <a href="{{ route('blog.show', $rp->slug) }}">{{ $rp->title }}</a>
                            </h4>
                            <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest">{{ $rp->published_at->format('M d, Y') }}</div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</article>
