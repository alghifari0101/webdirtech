@if(count($education) > 0)
    <div class="mb-4">
        @include('livewire.member.cv-templates.partials.section-title', ['title' => $labels['education'], 'template' => $template, 'color' => $color ?? null])
        @foreach($education as $edu)
            <div class="mb-3">
                <div class="flex justify-between items-baseline mb-1">
                    <h3 class="font-bold text-sm text-slate-900">{{ $edu['school'] }}</h3>
                    <span class="text-sm font-bold text-slate-700 whitespace-nowrap">{{ $edu['period'] }}</span>
                </div>
                <div class="flex justify-between items-baseline text-sm mb-1 gap-4">
                    <span class="text-slate-600 font-medium">{{ $edu['degree'] }}</span>
                    <span class="text-slate-500 whitespace-nowrap text-right flex-1">{{ $edu['location'] ?? '' }}</span>
                </div>
                @if(!empty($edu['description']))
                    <p class="text-sm mt-1 text-slate-700 leading-relaxed text-justify whitespace-pre-line">{{ $edu['description'] }}</p>
                @endif
            </div>
        @endforeach
    </div>
@else
    <div class="mb-6">
        @include('livewire.member.cv-templates.partials.section-title', ['title' => $labels['education'], 'template' => $template, 'color' => $color ?? null])
        <p class="text-sm text-slate-400">{{ $labels['no_edu'] }}</p>
    </div>
@endif
