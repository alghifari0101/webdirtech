<div class="bg-slate-50 rounded-2xl border border-slate-100 overflow-hidden">
    <div class="w-full px-6 py-4 flex items-center justify-between hover:bg-slate-100 transition-colors cursor-pointer group" @click="activeSection = activeSection === 'proj' ? '' : 'proj'">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-sm"><i class="fa-solid fa-code"></i></div>
            <span class="font-bold text-slate-700">{{ $cur['projects'] ?? 'Proyek' }}</span>
            <span class="bg-blue-100 text-blue-600 text-[10px] px-2 py-0.5 rounded-full font-bold">{{ count($data['projects']) }}</span>
        </div>
        <div class="flex items-center gap-4">
            <div class="flex border rounded-lg overflow-hidden bg-white">
                <button type="button" wire:click.stop="moveSection('projects', 'up')" @if($loop->first) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 border-r text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-up text-[10px]"></i></button>
                <button type="button" wire:click.stop="moveSection('projects', 'down')" @if($loop->last) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-down text-[10px]"></i></button>
            </div>
            <i class="fa-solid fa-chevron-down text-slate-400 transition-transform" :class="activeSection === 'proj' ? 'rotate-180' : ''"></i>
        </div>
    </div>
    <div x-show="activeSection === 'proj'" x-collapse class="p-6 pt-0 space-y-4">
        <div class="flex justify-end pt-2">
            <button wire:click="addProject" class="text-xs font-bold text-primary flex items-center gap-1"><i class="fa-solid fa-plus-circle"></i> Tambah</button>
        </div>
        @foreach($data['projects'] as $index => $proj)
            <div class="bg-white p-4 rounded-xl border border-slate-200 relative">
                <button wire:click="removeProject({{ $index }})" class="absolute top-4 right-4 text-slate-300 hover:text-rose-500"><i class="fa-solid fa-trash-can"></i></button>
                <div class="mb-3">
                    <input type="text" wire:model.blur="data.projects.{{ $index }}.name" placeholder="Nama Proyek" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                </div>
                <div class="mb-3">
                    <input type="text" wire:model.blur="data.projects.{{ $index }}.link" placeholder="Link Proyek (Opsional)" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                </div>
                <div class="flex justify-end mb-1">
                    <button type="button" @click="insertBullet($el.closest('.bg-white').querySelector('textarea'))" class="text-[9px] font-bold text-slate-400 hover:text-primary transition-colors flex items-center gap-1">
                        <i class="fa-solid fa-list-ul"></i> Bullet
                    </button>
                </div>
                <textarea wire:model.blur="data.projects.{{ $index }}.description" rows="2" placeholder="Deskripsi Singkat" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm"></textarea>
            </div>
        @endforeach
    </div>
</div>
