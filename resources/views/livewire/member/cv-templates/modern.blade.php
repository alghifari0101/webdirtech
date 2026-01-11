<div style="font-family: Arial, Helvetica, sans-serif;">
@include('livewire.member.cv-templates.partials.header-info', ['template' => 'modern'])

@if($data['summary'])
    <div class="mb-6">
        @include('livewire.member.cv-templates.partials.section-title', ['title' => $labels['summary'], 'template' => 'modern'])
        <p class="text-sm text-justify">{{ $data['summary'] }}</p>
    </div>
@endif

@include('livewire.member.cv-templates.partials.experience', ['experience' => $data['experience'], 'labels' => $labels, 'template' => 'modern'])
@include('livewire.member.cv-templates.partials.education', ['education' => $data['education'], 'labels' => $labels, 'template' => 'modern'])
@include('livewire.member.cv-templates.partials.projects', ['projects' => $data['projects'], 'labels' => $labels, 'template' => 'modern'])
@include('livewire.member.cv-templates.partials.skills', ['skills' => $data['skills'], 'labels' => $labels, 'template' => 'modern'])
@include('livewire.member.cv-templates.partials.languages', ['languages' => $data['languages'], 'labels' => $labels, 'template' => 'modern'])
@include('livewire.member.cv-templates.partials.organization', ['organizations' => $data['organizations'], 'labels' => $labels, 'template' => 'modern'])
</div>
