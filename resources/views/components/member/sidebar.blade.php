@props(['active' => 'dashboard'])

<div class="bg-white rounded-[2.5rem] shadow-2xl shadow-slate-200/60 border border-slate-100 overflow-hidden sticky top-8 no-print">
    <!-- User Profile Header -->
    <div class="bg-slate-900 p-8 text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary to-slate-800 opacity-20"></div>
        <div class="relative z-10 flex flex-col items-center">
            <div class="w-20 h-20 bg-white/10 backdrop-blur-md text-white rounded-[1.5rem] flex items-center justify-center text-3xl font-black shadow-xl mb-4 border border-white/20">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>
            <h3 class="text-white font-outfit font-bold text-lg leading-tight">{{ auth()->user()->name }}</h3>
            <p class="text-slate-400 text-[10px] uppercase tracking-widest font-bold mt-1">{{ auth()->user()->is_premium ? 'Premium Member' : 'Reguler Member' }}</p>
        </div>
    </div>

    <!-- Menu Section -->
    <div class="p-8 space-y-2">
        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-4">Navigasi Utama</p>
        
        <a href="{{ route('member.dashboard') }}" class="flex items-center gap-4 px-6 py-4 rounded-2xl transition-all group {{ $active === 'dashboard' ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'text-slate-600 hover:bg-slate-50 hover:text-primary' }}">
            <i class="fa-solid fa-house {{ $active === 'dashboard' ? '' : 'group-hover:scale-110' }} transition-transform"></i>
            <span class="text-sm font-bold">Dashboard Kelola</span>
        </a>

        <a href="{{ route('member.cv-editor') }}" class="flex items-center gap-4 px-6 py-4 rounded-2xl transition-all group {{ $active === 'cv-editor' ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'text-slate-600 hover:bg-slate-50 hover:text-primary' }}">
            <i class="fa-solid fa-file-pen {{ $active === 'cv-editor' ? '' : 'group-hover:scale-110' }} transition-transform"></i>
            <span class="text-sm font-bold">Edit CV ATS</span>
        </a>
        
        <a href="{{ route('member.cover-letter') }}" class="flex items-center gap-4 px-6 py-4 rounded-2xl transition-all group {{ $active === 'cover-letter' ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'text-slate-600 hover:bg-slate-50 hover:text-primary' }}">
            <i class="fa-solid fa-file-invoice {{ $active === 'cover-letter' ? '' : 'group-hover:scale-110' }} transition-transform"></i>
            <span class="text-sm font-bold">Surat Lamaran</span>
        </a>

        <a href="{{ route('member.ats-checker') }}" class="flex items-center gap-4 px-6 py-4 rounded-2xl transition-all group {{ $active === 'ats-checker' ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'text-slate-600 hover:bg-slate-50 hover:text-primary' }}">
            <i class="fa-solid fa-magnifying-glass-chart {{ $active === 'ats-checker' ? '' : 'group-hover:scale-110' }} transition-transform"></i>
            <span class="text-sm font-bold">Cek ATS CV</span>
        </a>

        <a href="{{ route('member.profile') }}" class="flex items-center gap-4 px-6 py-4 rounded-2xl transition-all group {{ $active === 'profile' ? 'bg-primary text-white shadow-lg shadow-primary/20' : 'text-slate-600 hover:bg-slate-50 hover:text-primary' }}">
            <i class="fa-solid fa-user-gear {{ $active === 'profile' ? '' : 'group-hover:scale-110' }} transition-transform"></i>
            <span class="text-sm font-bold">Pengaturan Profil</span>
        </a>

        @if(!auth()->user()->is_premium)
            <a href="{{ route('member.payment') }}" class="flex items-center gap-4 px-6 py-4 rounded-2xl transition-all group {{ $active === 'payment' ? 'bg-amber-500 text-white shadow-lg shadow-amber-500/20' : 'text-amber-600 hover:bg-amber-50' }}">
                <i class="fa-solid fa-gem {{ $active === 'payment' ? '' : 'group-hover:scale-110' }} transition-transform"></i>
                <span class="text-sm font-bold">Upgrade Premium</span>
            </a>
        @endif

        <div class="pt-6 mt-6 border-t border-slate-100">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-4 px-6 py-4 rounded-2xl text-slate-400 hover:text-rose-600 hover:bg-rose-50 font-bold transition-all w-full text-left group">
                    <i class="fa-solid fa-right-from-bracket group-hover:translate-x-1 transition-transform"></i>
                    <span class="text-sm">Keluar Akun</span>
                </button>
            </form>
        </div>
    </div>
</div>
