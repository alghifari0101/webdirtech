@if(count($experience) > 0)
    <div class="mb-4">
        @include('livewire.member.cv-templates.partials.section-title', ['title' => $labels['experience'], 'template' => $template, 'color' => $color ?? null])
        @foreach($experience as $exp)
            <div class="mb-3">
                <div class="flex justify-between items-baseline mb-1">
                    <h3 class="font-bold text-sm text-slate-900">{{ $exp['company'] }}</h3>
                    <span class="text-sm font-bold text-slate-700 whitespace-nowrap">{{ $exp['period'] }}</span>
                </div>
                <div class="flex justify-between items-baseline text-sm mb-1 gap-4">
                    <span class="text-slate-600 font-medium">{{ $exp['position'] }}</span>
                    <span class="text-slate-500 whitespace-nowrap text-right flex-1">{{ $exp['location'] ?? '' }}</span>
                </div>
                <p class="text-sm mt-1 text-slate-700 leading-relaxed text-justify whitespace-pre-line">{{ $exp['description'] }}</p>
            </div>
        @endforeach
    </div>
@else
    <div class="mb-6">
        @include('livewire.member.cv-templates.partials.section-title', ['title' => $labels['experience'], 'template' => $template, 'color' => $color ?? null])
        <p class="text-sm text-slate-400">{{ $labels['no_exp'] }}</p>
    </div>
@endif
