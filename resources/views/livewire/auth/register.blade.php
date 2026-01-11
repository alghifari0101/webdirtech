<div class="py-20 bg-slate-50 min-h-screen flex items-center">
    <div class="container mx-auto px-6">
        <div class="max-w-md mx-auto">
            <div class="bg-white rounded-3xl shadow-2xl shadow-slate-200/50 border border-slate-100 overflow-hidden transform transition-all">
                <div class="p-8 md:p-12">
                    <div class="text-center mb-10">
                        <div class="w-16 h-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center text-2xl mx-auto mb-4">
                            <i class="fa-solid fa-user-plus"></i>
                        </div>
                        <h2 class="text-2xl font-outfit font-bold text-slate-800">Buat Akun Baru</h2>
                        <p class="text-slate-500 text-sm mt-2">Daftar untuk mulai membuat CV ATS profesional.</p>
                    </div>

                    <form wire:submit.prevent="register" class="space-y-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wider">Nama Lengkap</label>
                            <input type="text" wire:model="form.name" class="w-full px-4 py-4 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 outline-none transition-all placeholder-slate-400" placeholder="Masukkan nama lengkap">
                            @error('form.name') <span class="text-rose-500 text-[10px] font-bold mt-1 uppercase tracking-tight">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wider">Email</label>
                            <input type="email" wire:model="form.email" class="w-full px-4 py-4 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 outline-none transition-all placeholder-slate-400" placeholder="nama@email.com">
                            @error('form.email') <span class="text-rose-500 text-[10px] font-bold mt-1 uppercase tracking-tight">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wider">Nomor WhatsApp / HP</label>
                            <input type="text" wire:model="form.phone" class="w-full px-4 py-4 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 outline-none transition-all placeholder-slate-400" placeholder="Contoh: 08123456789">
                            @error('form.phone') <span class="text-rose-500 text-[10px] font-bold mt-1 uppercase tracking-tight">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wider">Password</label>
                            <input type="password" wire:model="form.password" class="w-full px-4 py-4 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 outline-none transition-all placeholder-slate-400" placeholder="Minimal 8 karakter">
                            @error('form.password') <span class="text-rose-500 text-[10px] font-bold mt-1 uppercase tracking-tight">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wider">Konfirmasi Password</label>
                            <input type="password" wire:model="form.password_confirmation" class="w-full px-4 py-4 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary/20 outline-none transition-all placeholder-slate-400" placeholder="Ulangi password">
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full py-4 bg-primary text-white font-bold rounded-xl shadow-lg shadow-primary/20 hover:bg-slate-800 transition-all flex items-center justify-center gap-2">
                                Daftar Sekarang <i class="fa-solid fa-arrow-right-long"></i>
                            </button>
                        </div>
                    </form>

                    <div class="mt-8 pt-8 border-t border-slate-100 text-center">
                        <p class="text-slate-500 text-sm">
                            Sudah punya akun? 
                            <a href="{{ route('login') }}" class="text-primary font-bold hover:underline">Login disini</a>
                        </p>
                    </div>
                </div>
                <div class="bg-amber-50 p-6 border-t border-amber-100">
                    <p class="text-[10px] text-amber-800 font-bold uppercase tracking-widest text-center leading-relaxed">
                        <i class="fa-solid fa-circle-info mr-1"></i> Setelah mendaftar, akun Anda perlu diaktifkan oleh Admin secara manual setelah pembayaran dikonfirmasi.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
