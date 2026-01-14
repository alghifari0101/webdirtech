<div class="bg-slate-50 rounded-2xl border border-slate-100 overflow-hidden group">
    <div class="px-6 py-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-sm"><i class="fa-solid fa-user-tie"></i></div>
            <span class="font-bold text-slate-700">{{ $cur['summary'] }}</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="flex border rounded-lg overflow-hidden bg-white">
                <button type="button" wire:click.stop="moveSection('summary', 'up')" @if($loop->first) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 border-r text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-up text-[10px]"></i></button>
                <button type="button" wire:click.stop="moveSection('summary', 'down')" @if($loop->last) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-down text-[10px]"></i></button>
            </div>
        </div>
    </div>
    <div class="px-6 pb-6 pt-0">
        <div class="flex justify-between items-center mb-2">
            <div class="flex gap-3 ml-auto">
                <button type="button" @click="insertBullet($refs.summaryArea)" class="text-[10px] font-bold text-slate-400 hover:text-primary transition-colors flex items-center gap-1">
                    <i class="fa-solid fa-list-ul"></i> Bullet
                </button>
                <button wire:click="polishSummary" wire:loading.attr="disabled" class="text-[10px] font-bold text-primary flex items-center gap-1">
                    <span wire:loading.remove wire:target="polishSummary">✨ AI Polish</span>
                    <span wire:loading wire:target="polishSummary"><i class="fa-solid fa-spinner fa-spin"></i></span>
                </button>
            </div>
        </div>
        <textarea x-ref="summaryArea" wire:model.blur="data.summary" rows="4" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-primary/20 outline-none transition-all text-slate-700" placeholder="Tuliskan ringkasan profesional Anda..."></textarea>
    </div>
</div>
