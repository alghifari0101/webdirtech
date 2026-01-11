@if(count($languages) > 0)
    <div class="mb-6">
        @include('livewire.member.cv-templates.partials.section-title', ['title' => $labels['languages'] ?? 'Languages', 'template' => $template, 'color' => $color ?? null])
        <div class="flex flex-wrap gap-x-4 gap-y-1">
            @foreach($languages as $lang)
                <div class="text-sm text-slate-700">
                    <span class="font-bold text-slate-900">{{ $lang['name'] }}</span>
                    @if(!empty($lang['level']))
                        <span class="text-slate-500">({{ $lang['level'] }})</span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endif
