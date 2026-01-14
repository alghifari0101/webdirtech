<div class="bg-slate-50 rounded-2xl border border-slate-100 overflow-hidden">
    <div class="w-full px-6 py-4 flex items-center justify-between hover:bg-slate-100 transition-colors cursor-pointer group" @click="activeSection = activeSection === 'edu' ? '' : 'edu'">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center text-sm"><i class="fa-solid fa-graduation-cap"></i></div>
            <span class="font-bold text-slate-700">{{ $cur['education'] }}</span>
            <span class="bg-emerald-100 text-emerald-600 text-[10px] px-2 py-0.5 rounded-full font-bold">{{ count($data['education']) }}</span>
        </div>
        <div class="flex items-center gap-4">
            <div class="flex border rounded-lg overflow-hidden bg-white">
                <button type="button" wire:click.stop="moveSection('education', 'up')" @if($loop->first) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 border-r text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-up text-[10px]"></i></button>
                <button type="button" wire:click.stop="moveSection('education', 'down')" @if($loop->last) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-down text-[10px]"></i></button>
            </div>
            <i class="fa-solid fa-chevron-down text-slate-400 transition-transform" :class="activeSection === 'edu' ? 'rotate-180' : ''"></i>
        </div>
    </div>
    <div x-show="activeSection === 'edu'" x-collapse class="p-6 pt-0 space-y-4">
        <div class="flex justify-end pt-2">
            <button wire:click="addEducation" class="text-xs font-bold text-primary flex items-center gap-1"><i class="fa-solid fa-plus-circle"></i> Tambah</button>
        </div>
        @foreach($data['education'] as $index => $edu)
            <div class="bg-white p-4 rounded-xl border border-slate-200 relative">
                <button wire:click="removeEducation({{ $index }})" class="absolute top-4 right-4 text-slate-300 hover:text-rose-500"><i class="fa-solid fa-trash-can"></i></button>
                <div class="grid grid-cols-2 gap-3 mb-3">
                    <input type="text" wire:model.blur="data.education.{{ $index }}.school" placeholder="Sekolah/Univ" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                    <input type="text" wire:model.blur="data.education.{{ $index }}.degree" placeholder="Gelar/Jurusan" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <input type="text" wire:model.blur="data.education.{{ $index }}.period" placeholder="2016-2020" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                    <input type="text" wire:model.blur="data.education.{{ $index }}.location" placeholder="Lokasi" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                </div>
                <div class="mt-3">
                    <div class="flex justify-end mb-1">
                        <button type="button" @click="insertBullet($el.closest('.mt-3').querySelector('textarea'))" class="text-[9px] font-bold text-slate-400 hover:text-primary transition-colors flex items-center gap-1">
                            <i class="fa-solid fa-list-ul"></i> Bullet
                        </button>
                    </div>
                    <textarea wire:model.blur="data.education.{{ $index }}.description" rows="2" placeholder="Deskripsi/Pencapaian (Opsional)" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm"></textarea>
                </div>
            </div>
        @endforeach
    </div>
</div>
