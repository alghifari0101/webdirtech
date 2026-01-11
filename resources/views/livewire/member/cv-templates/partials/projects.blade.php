@if(count($projects) > 0)
    <div class="mb-6">
        @include('livewire.member.cv-templates.partials.section-title', ['title' => $labels['projects'] ?? 'Projects', 'template' => $template, 'color' => $color ?? null])
        @foreach($projects as $project)
            <div class="mb-4">
                <div class="flex justify-between items-baseline mb-1">
                    <h3 class="font-bold text-sm text-slate-900">{{ $project['name'] }}</h3>
                    <span class="text-sm font-bold text-slate-700">{{ $project['period'] }}</span>
                </div>
                @if(!empty($project['link']))
                    <div class="text-sm text-blue-600 mb-1">{{ $project['link'] }}</div>
                @endif
                <p class="text-sm mt-1 text-slate-700 leading-relaxed text-justify whitespace-pre-line">{{ $project['description'] }}</p>
            </div>
        @endforeach
    </div>
@endif
