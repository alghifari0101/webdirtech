@if(count($organizations) > 0)
    <div class="mb-4">
        @include('livewire.member.cv-templates.partials.section-title', ['title' => $labels['organization'] ?? 'Riwayat Organisasi', 'template' => $template, 'color' => $color ?? null])
        @foreach($organizations as $org)
            <div class="mb-3">
                <div class="flex justify-between items-baseline mb-1">
                    <h3 class="font-bold text-sm text-slate-900">{{ $org['name'] }}</h3>
                    <span class="text-sm font-bold text-slate-700 whitespace-nowrap">{{ $org['period'] }}</span>
                </div>
                <div class="flex justify-between items-baseline text-sm mb-1 gap-4">
                    <span class="text-slate-600 font-medium">{{ $org['position'] }}</span>
                    <span class="text-slate-500 whitespace-nowrap text-right flex-1">{{ $org['location'] ?? '' }}</span>
                </div>
                <p class="text-sm mt-1 text-slate-700 leading-relaxed text-justify whitespace-pre-line">{{ $org['description'] }}</p>
            </div>
        @endforeach
    </div>
@endif
