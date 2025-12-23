<div class="page-header min-h-screen flex items-center bg-slate-900 bg-[url('https://images.pexels.com/photos/1181467/pexels-photo-1181467.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')] bg-cover bg-center bg-blend-overlay py-12 px-6">
    <div class="container max-w-md mx-auto">
        <div class="login-card bg-white p-8 md:p-12 rounded-[2rem] shadow-2xl">
            <div class="text-center mb-10">
                <h2 class="text-slate-900 font-outfit font-black text-3xl md:text-4xl mb-3 tracking-tighter">Welcome Back</h2>
                <p class="text-slate-500 font-medium">Sign in to check your awesome dashboard</p>
            </div>

            <form wire:submit="login" class="space-y-6">
                <div>
                    <label class="block font-bold text-slate-700 mb-2 pl-1 text-sm">Email Address</label>
                    <input type="email" wire:model="form.email" 
                        class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all text-slate-900 font-medium placeholder:text-slate-400"
                        placeholder="name@company.com">
                    @error('form.email') <span class="text-rose-600 text-xs font-bold mt-2 block pl-1 italic">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block font-bold text-slate-700 mb-2 pl-1 text-sm">Password</label>
                    <input type="password" wire:model="form.password" 
                        class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all text-slate-900 font-medium placeholder:text-slate-400"
                        placeholder="••••••••">
                    @error('form.password') <span class="text-rose-600 text-xs font-bold mt-2 block pl-1 italic">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-between items-center px-1">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" wire:model="form.remember" class="w-5 h-5 rounded-lg border-slate-300 text-primary focus:ring-primary">
                        <span class="text-sm font-bold text-slate-500 group-hover:text-slate-700 transition-colors">Remember me</span>
                    </label>
                </div>

                <button type="submit" class="w-full py-4 bg-primary hover:bg-rose-700 text-white font-black rounded-2xl shadow-xl shadow-rose-200 transition-all flex items-center justify-center gap-3">
                    Sign In
                    <div wire:loading wire:target="login" class="w-5 h-5 border-2 border-white/30 border-t-white rounded-full animate-spin"></div>
                </button>
            </form>
        </div>
    </div>
</div>
