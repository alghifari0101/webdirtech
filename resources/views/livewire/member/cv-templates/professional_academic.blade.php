<!-- Template: Professional Academic (Olive Green) -->
<div class="overflow-hidden" 
     style="font-family: Arial, Helvetica, sans-serif; background-color: #5B8C31; color: #ffffff; margin-left: calc(-1 * var(--cv-pad-x)); margin-right: calc(-1 * var(--cv-pad-x)); margin-top: calc(-1 * var(--cv-pad-y)); padding: 10mm 15mm; margin-bottom: 25px; min-height: 45mm;">
    <div class="flex items-center gap-10">
        @if ($photo || $data['photo_path'])
        <div class="w-32 h-32 border-4 border-white overflow-hidden flex-shrink-0 bg-white shadow-lg rounded-sm">
            @if ($photo)
                <img src="{{ $photo->temporaryUrl() }}" class="w-full h-full object-cover">
            @else
                <img src="{{ asset('storage/' . $data['photo_path']) }}" class="w-full h-full object-cover">
            @endif
        </div>
        @endif

        <div class="flex-1">
            <h1 class="text-4xl font-bold mb-3 tracking-tight leading-none" style="color: #ffffff;">{{ $data['full_name'] ?: $labels['placeholder_name'] }}</h1>
            <div class="text-sm space-y-1 opacity-95">
                <p class="font-bold">{{ $data['email'] ?: $labels['placeholder_email'] }} | {{ $data['phone'] ?: $labels['placeholder_phone'] }}</p>
                <p>
                    @if(!empty($data['linkedin'])) {{ $data['linkedin'] }} @endif
                    @if(!empty($data['linkedin']) && !empty($data['website'])) | @endif
                    @if(!empty($data['website'])) {{ $data['website'] }} @endif
                </p>
                <p class="uppercase tracking-widest">{{ $data['location'] ?: ($data['language'] === 'en' ? 'City, Country' : 'Kota, Negara') }}</p>
            </div>
        </div>
    </div>
</div>

@if($data['summary'])
    <div class="mb-6">
        @include('livewire.member.cv-templates.partials.section-title', ['title' => $labels['summary'], 'template' => 'professional-academic', 'color' => '#5B8C31'])
        <p class="text-sm text-justify leading-relaxed">{{ $data['summary'] }}</p>
    </div>
@endif

@include('livewire.member.cv-templates.partials.education', ['education' => $data['education'], 'labels' => $labels, 'template' => 'professional-academic', 'color' => '#5B8C31'])
@include('livewire.member.cv-templates.partials.experience', ['experience' => $data['experience'], 'labels' => $labels, 'template' => 'professional-academic', 'color' => '#5B8C31'])
@include('livewire.member.cv-templates.partials.organization', ['organizations' => $data['organizations'], 'labels' => $labels, 'template' => 'professional-academic', 'color' => '#5B8C31'])
@include('livewire.member.cv-templates.partials.skills', ['skills' => $data['skills'], 'labels' => $labels, 'template' => 'professional-academic', 'color' => '#5B8C31'])
@include('livewire.member.cv-templates.partials.languages', ['languages' => $data['languages'], 'labels' => $labels, 'template' => 'professional-academic', 'color' => '#5B8C31'])
@include('livewire.member.cv-templates.partials.projects', ['projects' => $data['projects'], 'labels' => $labels, 'template' => 'professional-academic', 'color' => '#5B8C31'])
</div>
