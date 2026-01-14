@props(['loading' => false, 'icon' => null, 'type' => 'button'])

<button {{ $attributes->merge(['type' => $type, 'class' => 'px-8 py-4 bg-slate-900 text-white font-bold rounded-2xl hover:bg-primary transition-all shadow-xl shadow-slate-200/50 active:scale-95 disabled:opacity-50 disabled:pointer-events-none flex items-center justify-center gap-2']) }}>
    @if($loading)
        <i class="fa-solid fa-spinner fa-spin"></i>
        <span>Memproses...</span>
    @else
        @if($icon)
            <i class="{{ $icon }}"></i>
        @endif
        {{ $slot }}
    @endif
</button>
