@if(($template ?? '') === 'modern')
    <h2 class="text-sm font-bold uppercase mb-4 pb-1 border-b-2 border-blue-600 text-blue-700 tracking-wider">
        {{ $title }}
    </h2>
@else
    <h2 class="text-base font-bold uppercase mb-4 px-4 py-2 inline-block w-full text-white" 
        style="background-color: {{ $color ?? '#222222' }}; border-bottom: 2pt solid {{ $color ?? '#222222' }};">
        {{ $title }}
    </h2>
@endif
