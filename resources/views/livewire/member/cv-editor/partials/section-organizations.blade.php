<div class="bg-slate-50 rounded-2xl border border-slate-100 overflow-hidden">
    <div class="w-full px-6 py-4 flex items-center justify-between hover:bg-slate-100 transition-colors cursor-pointer group" @click="activeSection = activeSection === 'org' ? '' : 'org'">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center text-sm"><i class="fa-solid fa-users-rectangle"></i></div>
            <span class="font-bold text-slate-700">{{ $cur['organization'] ?? 'Riwayat Organisasi' }}</span>
            <span class="bg-amber-100 text-amber-600 text-[10px] px-2 py-0.5 rounded-full font-bold">{{ count($data['organizations']) }}</span>
        </div>
        <div class="flex items-center gap-4">
            <div class="flex border rounded-lg overflow-hidden bg-white">
                <button type="button" wire:click.stop="moveSection('organizations', 'up')" @if($loop->first) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 border-r text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-up text-[10px]"></i></button>
                <button type="button" wire:click.stop="moveSection('organizations', 'down')" @if($loop->last) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-down text-[10px]"></i></button>
            </div>
            <i class="fa-solid fa-chevron-down text-slate-400 transition-transform" :class="activeSection === 'org' ? 'rotate-180' : ''"></i>
        </div>
    </div>
    <div x-show="activeSection === 'org'" x-collapse class="p-6 pt-0 space-y-4">
        <div class="flex justify-end pt-2">
            <button wire:click="addOrganization" class="text-xs font-bold text-primary flex items-center gap-1"><i class="fa-solid fa-plus-circle"></i> Tambah</button>
        </div>
        @foreach($data['organizations'] as $index => $org)
            <div class="bg-white p-4 rounded-xl border border-slate-200 relative">
                <button wire:click="removeOrganization({{ $index }})" class="absolute top-4 right-4 text-slate-300 hover:text-rose-500"><i class="fa-solid fa-trash-can"></i></button>
                <div class="grid grid-cols-2 gap-3 mb-3">
                    <input type="text" wire:model.blur="data.organizations.{{ $index }}.name" placeholder="Organisasi" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                    <input type="text" wire:model.blur="data.organizations.{{ $index }}.position" placeholder="Jabatan" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                </div>
                <input type="text" wire:model.blur="data.organizations.{{ $index }}.period" placeholder="Periode" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
            </div>
        @endforeach
    </div>
</div>
