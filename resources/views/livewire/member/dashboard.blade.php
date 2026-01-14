<div class="py-12 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-6">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-start gap-10">
                <!-- Sidebar Navigasi -->
                <div class="w-full md:w-80">
                    <x-member.sidebar active="dashboard" />
                </div>

                <!-- Main Content -->
                <div class="flex-1 space-y-8">
                    @if (session()->has('success'))
                        <div class="p-5 bg-emerald-50 text-emerald-800 rounded-2xl border border-emerald-100 flex items-center gap-4 animate-in slide-in-from-top duration-500">
                            <div class="w-10 h-10 bg-emerald-500 text-white rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>
                            <span class="text-sm font-medium">{{ session('success') }}</span>
                        </div>
                    @endif

                    <!-- Hero Welcome -->
                    <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-10 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 rounded-full -mr-32 -mt-32 blur-3xl"></div>
                        <div class="relative z-10">
                            <h2 class="text-3xl font-outfit font-extrabold text-slate-900 mb-4">Halo, {{ explode(' ', auth()->user()->name)[0] }}! 👋</h2>
                            <p class="text-slate-500 leading-relaxed text-sm max-w-xl">
                                Selamat datang kembali di panel kendali karir Anda. Sekarang adalah waktu yang tepat untuk memperbarui CV Anda agar tetap relevan dengan standar <span class="font-bold text-slate-800">ATS (Applicant Tracking System)</span> terbaru.
                            </p>
                            <div class="mt-8 flex gap-4">
                                <a href="{{ route('member.cv-editor') }}" class="px-8 py-3 bg-slate-900 text-white font-bold rounded-xl hover:bg-primary transition-all text-sm shadow-xl">
                                    Mulai Edit CV
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics / Status Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Membership Status -->
                        <div class="bg-white rounded-[2rem] p-8 border border-slate-100 shadow-xl shadow-slate-200/40 group hover:border-primary/20 transition-all">
                            <div class="flex items-center justify-between mb-6">
                                <div class="w-14 h-14 bg-{{ auth()->user()->is_premium ? 'amber' : 'emerald' }}-100 text-{{ auth()->user()->is_premium ? 'amber' : 'emerald' }}-600 rounded-2xl flex items-center justify-center text-2xl shadow-inner group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-{{ auth()->user()->is_premium ? 'crown' : 'shield-check' }}"></i>
                                </div>
                                <span class="px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-widest {{ auth()->user()->is_premium ? 'bg-amber-500 text-white' : 'bg-slate-100 text-slate-500' }}">
                                    {{ auth()->user()->is_premium ? 'Premium' : 'Reguler' }}
                                </span>
                            </div>
                            <h4 class="text-slate-900 font-bold mb-2">Status Akun</h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-4">
                                {{ auth()->user()->is_premium ? 'Anda memiliki akses tak terbatas ke semua template premium kami.' : 'Anda saat ini menggunakan akses gratis dengan beberapa batasan template.' }}
                            </p>
                            @if(auth()->user()->is_premium && auth()->user()->premium_until)
                                <div class="pt-4 border-t border-slate-50">
                                    <p class="text-[10px] text-amber-600 font-bold uppercase flex items-center gap-2">
                                        <i class="fa-solid fa-clock-rotate-left"></i> Aktif hingga: {{ auth()->user()->premium_until->translatedFormat('d F Y') }}
                                    </p>
                                </div>
                            @elseif(!auth()->user()->is_premium)
                                <a href="{{ route('member.payment') }}" class="text-sm font-bold text-primary hover:underline">Aktivasi Premium Sekarang &rarr;</a>
                            @endif
                        </div>

                        <!-- Content Stats -->
                        <div class="bg-white rounded-[2rem] p-8 border border-slate-100 shadow-xl shadow-slate-200/40 group hover:border-indigo/20 transition-all">
                            <div class="flex items-center justify-between mb-6">
                                <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center text-2xl shadow-inner group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-file-pdf"></i>
                                </div>
                                <div class="relative w-12 h-12 flex items-center justify-center">
                                    <svg class="absolute inset-0 w-full h-full -rotate-90">
                                        <circle cx="24" cy="24" r="20" fill="none" class="stroke-slate-100" stroke-width="4" />
                                        <circle cx="24" cy="24" r="20" fill="none" class="stroke-indigo-500" stroke-width="4" stroke-dasharray="125" stroke-dashoffset="30" />
                                    </svg>
                                    <span class="text-[10px] font-bold text-indigo-600">80%</span>
                                </div>
                            </div>
                            <h4 class="text-slate-900 font-bold mb-2">Kesiapan CV</h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-4">
                                CV Anda sudah terisi dan siap di-download dalam format PDF yang ATS Friendly.
                            </p>
                            <div class="pt-4 border-t border-slate-50">
                                <a href="{{ route('member.cv-editor') }}" class="text-sm font-bold text-indigo-600 hover:underline">Lihat Preview CV &rarr;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
