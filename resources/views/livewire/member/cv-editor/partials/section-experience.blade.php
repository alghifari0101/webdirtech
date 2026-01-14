<div class="bg-slate-50 rounded-2xl border border-slate-100 overflow-hidden">
    <div class="w-full px-6 py-4 flex items-center justify-between hover:bg-slate-100 transition-colors cursor-pointer group" @click="activeSection = activeSection === 'experience' ? '' : 'experience'">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-sm"><i class="fa-solid fa-briefcase"></i></div>
            <span class="font-bold text-slate-700">{{ $cur['experience'] }}</span>
            <span class="bg-blue-100 text-blue-600 text-[10px] px-2 py-0.5 rounded-full font-bold">{{ count($data['experience']) }}</span>
        </div>
        <div class="flex items-center gap-4">
            <div class="flex border rounded-lg overflow-hidden bg-white">
                <button type="button" wire:click.stop="moveSection('experience', 'up')" @if($loop->first) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 border-r text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-up text-[10px]"></i></button>
                <button type="button" wire:click.stop="moveSection('experience', 'down')" @if($loop->last) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-down text-[10px]"></i></button>
            </div>
            <i class="fa-solid fa-chevron-down text-slate-400 transition-transform" :class="activeSection === 'experience' ? 'rotate-180' : ''"></i>
        </div>
    </div>
    <div x-show="activeSection === 'experience'" x-collapse class="p-6 pt-0 space-y-6">
        <div class="flex justify-end pt-2">
            <button wire:click="addExperience" class="text-xs font-bold text-primary flex items-center gap-1"><i class="fa-solid fa-plus-circle"></i> Tambah Pengalaman</button>
        </div>
        @foreach($data['experience'] as $index => $exp)
            <div class="bg-white p-6 rounded-2xl border border-slate-200 relative group">
                <button wire:click="removeExperience({{ $index }})" class="absolute top-4 right-4 text-slate-400 hover:text-rose-500 transition-all"><i class="fa-solid fa-trash-can"></i></button>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <input type="text" wire:model.blur="data.experience.{{ $index }}.company" placeholder="Perusahaan" class="w-full px-4 py-2 bg-slate-50 border-none rounded-xl text-sm outline-none">
                    <input type="text" wire:model.blur="data.experience.{{ $index }}.position" placeholder="Posisi" class="w-full px-4 py-2 bg-slate-50 border-none rounded-xl text-sm outline-none">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" wire:model.blur="data.experience.{{ $index }}.period" placeholder="Jan 2020 - Des 2022" class="w-full px-4 py-2 bg-slate-50 border-none rounded-xl text-sm outline-none">
                    <input type="text" wire:model.blur="data.experience.{{ $index }}.location" placeholder="Lokasi" class="w-full px-4 py-2 bg-slate-50 border-none rounded-xl text-sm outline-none">
                </div>
                <div class="mt-4">
                    <div class="flex justify-end mb-1 gap-3">
                        <button type="button" @click="insertBullet($el.closest('.mt-4').querySelector('textarea'))" class="text-[9px] font-bold text-slate-400 hover:text-primary transition-colors flex items-center gap-1">
                            <i class="fa-solid fa-list-ul"></i> Bullet
                        </button>
                        <button wire:click="polishExperience({{ $index }})" wire:loading.attr="disabled" class="text-[9px] font-bold text-primary flex items-center gap-1">✨ Perbaiki dg AI</button>
                    </div>
                    <textarea wire:model.blur="data.experience.{{ $index }}.description" rows="3" placeholder="Tulis deskripsi pencapaian Anda..." class="w-full px-4 py-2 bg-slate-50 border-none rounded-xl text-sm outline-none"></textarea>
                </div>
            </div>
        @endforeach
    </div>
</div>
