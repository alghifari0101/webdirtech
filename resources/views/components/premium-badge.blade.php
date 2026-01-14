@props(['dark' => false])

<div {{ $attributes->merge(['class' => 'px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest flex items-center gap-1.5 ' . ($dark ? 'bg-slate-800 text-amber-500 border border-slate-700' : 'bg-amber-500 text-white shadow-lg shadow-amber-500/20')]) }}>
    <i class="fa-solid fa-crown text-[8px]"></i>
    <span>Premium</span>
</div>
