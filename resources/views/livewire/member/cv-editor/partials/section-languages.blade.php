<div class="bg-slate-50 rounded-2xl border border-slate-100 overflow-hidden">
    <div class="w-full px-6 py-4 flex items-center justify-between hover:bg-slate-100 transition-colors cursor-pointer group" @click="activeSection = activeSection === 'lang' ? '' : 'lang'">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-violet-100 text-violet-600 rounded-lg flex items-center justify-center text-sm"><i class="fa-solid fa-language"></i></div>
            <span class="font-bold text-slate-700">{{ $cur['languages'] }}</span>
        </div>
        <div class="flex items-center gap-4">
            <div class="flex border rounded-lg overflow-hidden bg-white">
                <button type="button" wire:click.stop="moveSection('languages', 'up')" @if($loop->first) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 border-r text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-up text-[10px]"></i></button>
                <button type="button" wire:click.stop="moveSection('languages', 'down')" @if($loop->last) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-down text-[10px]"></i></button>
            </div>
            <i class="fa-solid fa-chevron-down text-slate-400 transition-transform" :class="activeSection === 'lang' ? 'rotate-180' : ''"></i>
        </div>
    </div>
    <div x-show="activeSection === 'lang'" x-collapse class="p-6 pt-0 space-y-3">
        <div class="flex justify-end pt-2">
            <button wire:click="addLanguage" class="text-xs font-bold text-primary flex items-center gap-1"><i class="fa-solid fa-plus-circle"></i> Tambah</button>
        </div>
        @foreach($data['languages'] as $index => $lang)
            <div class="flex items-center gap-3 bg-white p-3 rounded-xl border border-slate-200">
                <input type="text" wire:model.blur="data.languages.{{ $index }}.name" placeholder="Bahasa" class="flex-1 bg-slate-50 border-none rounded-lg text-sm px-3 py-1.5">
                <input type="text" wire:model.blur="data.languages.{{ $index }}.level" placeholder="Level (Misal: Native/Pro)" class="flex-1 bg-slate-50 border-none rounded-lg text-sm px-3 py-1.5">
                <button wire:click="removeLanguage({{ $index }})" class="text-slate-300 hover:text-rose-500"><i class="fa-solid fa-trash-can"></i></button>
            </div>
        @endforeach
    </div>
</div>
