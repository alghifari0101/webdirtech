<div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl border border-slate-100 p-4 sm:p-6 lg:p-10">
     <h3 class="text-xl font-bold text-slate-800 mb-8 flex items-center gap-2">
        <i class="fa-solid fa-address-card text-primary"></i> Informasi Dasar
     </h3>
     
     <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-1 border-r border-slate-50 pr-6">
            <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-3">Foto Profil</label>
            <div class="relative group w-32 h-32 mx-auto lg:mx-0">
                <div class="w-full h-full rounded-2xl border-2 border-dashed border-slate-200 group-hover:border-primary transition-colors overflow-hidden flex items-center justify-center bg-slate-50">
                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}" class="w-full h-full object-cover">
                    @elseif($data['photo_path'])
                        <img src="{{ Storage::url($data['photo_path']) }}" class="w-full h-full object-cover">
                    @else
                        <i class="fa-solid fa-camera text-2xl text-slate-300 group-hover:text-primary transition-colors"></i>
                    @endif
                </div>
                <input type="file" wire:model="photo" class="absolute inset-0 opacity-0 cursor-pointer">
                <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-white rounded-lg shadow-md border border-slate-100 flex items-center justify-center text-primary text-xs group-hover:scale-110 transition-transform"><i class="fa-solid fa-pen"></i></div>
            </div>
            @error('photo') <span class="text-[10px] text-rose-500 mt-2 block">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-2 space-y-4">
            <div class="space-y-1">
                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Nama Lengkap</label>
                <input type="text" wire:model.blur="data.full_name" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-primary/20 outline-none transition-all text-slate-700">
                @error('data.full_name') <span class="text-[10px] text-rose-500">{{ $message }}</span> @enderror
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Email</label>
                    <input type="email" wire:model.blur="data.email" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-primary/20 outline-none transition-all text-slate-700">
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Nomor HP</label>
                    <input type="text" wire:model.blur="data.phone" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-primary/20 outline-none transition-all text-slate-700">
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Domisili</label>
                    <input type="text" wire:model.blur="data.location" placeholder="Jakarta, Indonesia" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-primary/20 outline-none transition-all text-slate-700">
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">LinkedIn URL</label>
                    <input type="text" wire:model.blur="data.linkedin" placeholder="linkedin.com/in/username" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-primary/20 outline-none transition-all text-slate-700">
                </div>
                <div class="space-y-1 lg:col-span-2">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Website / Portfolio</label>
                    <input type="text" wire:model.blur="data.website" placeholder="www.portfolio.com" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-primary/20 outline-none transition-all text-slate-700">
                </div>
             </div>
        </div>
     </div>
</div>
