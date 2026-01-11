@if(count($skills) > 0 && !empty($skills[0]))
    <div class="mb-6">
        @include('livewire.member.cv-templates.partials.section-title', ['title' => $labels['skills'], 'template' => $template, 'color' => $color ?? null])
        <p class="text-sm text-slate-700 leading-relaxed">{{ implode(', ', array_filter($skills)) }}</p>
    </div>
@endif
