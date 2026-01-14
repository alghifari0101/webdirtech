<div class="bg-slate-50 rounded-2xl border border-slate-100 overflow-hidden">
    <div class="w-full px-6 py-4 flex items-center justify-between hover:bg-slate-100 transition-colors cursor-pointer group" @click="activeSection = activeSection === 'skills' ? '' : 'skills'">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center text-sm"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
            <span class="font-bold text-slate-700">{{ $cur['skills'] }}</span>
            <span class="bg-indigo-100 text-indigo-600 text-[10px] px-2 py-0.5 rounded-full font-bold">{{ count($data['skills']) }}</span>
        </div>
        <div class="flex items-center gap-4">
            <div class="flex border rounded-lg overflow-hidden bg-white">
                <button type="button" wire:click.stop="moveSection('skills', 'up')" @if($loop->first) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 border-r text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-up text-[10px]"></i></button>
                <button type="button" wire:click.stop="moveSection('skills', 'down')" @if($loop->last) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-down text-[10px]"></i></button>
            </div>
            <i class="fa-solid fa-chevron-down text-slate-400 transition-transform" :class="activeSection === 'skills' ? 'rotate-180' : ''"></i>
        </div>
    </div>
    <div x-show="activeSection === 'skills'" x-collapse class="p-6 pt-0">
        <div class="flex justify-end pt-2 mb-4">
            <button wire:click="addSkill" class="text-xs font-bold text-primary flex items-center gap-1"><i class="fa-solid fa-plus-circle"></i> Tambah</button>
        </div>
        <div class="flex flex-wrap gap-2">
            @foreach($data['skills'] as $index => $skill)
                <div class="flex items-center gap-2 bg-white px-3 py-1.5 rounded-xl border border-slate-200">
                    <input type="text" wire:model.blur="data.skills.{{ $index }}" placeholder="Skill" class="bg-transparent border-none text-xs font-medium outline-none w-24">
                    <button wire:click="removeSkill({{ $index }})" class="text-slate-300 hover:text-rose-500"><i class="fa-solid fa-xmark"></i></button>
                </div>
            @endforeach
        </div>
    </div>
</div>
