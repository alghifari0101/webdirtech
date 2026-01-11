<!-- Template 4: Creative Green (Perfect Reference Version) -->
<div class="overflow-hidden" 
     style="font-family: Arial, Helvetica, sans-serif; background-color: #6B8E23; color: #ffffff; margin-left: calc(-1 * var(--cv-pad-x)); margin-right: calc(-1 * var(--cv-pad-x)); margin-top: calc(-1 * var(--cv-pad-y)); padding: 12mm 15mm; margin-bottom: 25px;">
    <div class="flex items-center gap-10" style="color: #ffffff;">
        <!-- Photo Section -->
        <div class="w-40 h-40 border-[5px] border-white shadow-lg overflow-hidden flex-shrink-0 bg-white">
            @if ($photo)
                <img src="{{ $photo->temporaryUrl() }}" class="w-full h-full object-cover">
            @elseif ($data['photo_path'])
                <img src="{{ asset('storage/' . $data['photo_path']) }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex items-center justify-center bg-gray-50">
                    <i class="fa-solid fa-user text-5xl text-gray-200"></i>
                </div>
            @endif
        </div>

        <!-- Name & Contact Section -->
        <div class="flex-1" style="color: #ffffff;">
            <h1 class="text-5xl font-bold mb-4 tracking-tight leading-none" style="color: #ffffff !important;">{{ $data['full_name'] ?: $labels['placeholder_name'] }}</h1>
            <div class="text-[11px] space-y-1 opacity-95 leading-relaxed" style="color: #ffffff;">
                <p class="font-bold" style="color: #ffffff;">{{ $data['email'] ?: $labels['placeholder_email'] }} | {{ $data['phone'] ?: $labels['placeholder_phone'] }}</p>
                <p style="color: #ffffff;">
                    @if(!empty($data['linkedin'])) {{ $data['linkedin'] }} @endif
                    @if(!empty($data['linkedin']) && !empty($data['website'])) | @endif
                    @if(!empty($data['website'])) {{ $data['website'] }} @endif
                </p>
                <p class="font-bold uppercase tracking-wide" style="color: #ffffff;">{{ $data['location'] ?: ($data['language'] === 'en' ? 'City, Country' : 'Kota, Negara') }}</p>
            </div>
        </div>
    </div>
</div>

@if($data['summary'])
    <div class="mb-6">
        @include('livewire.member.cv-templates.partials.section-title', ['title' => $labels['summary'], 'template' => 'creative'])
        <p class="text-sm text-justify">{{ $data['summary'] }}</p>
    </div>
@endif

@include('livewire.member.cv-templates.partials.experience', ['experience' => $data['experience'], 'labels' => $labels, 'template' => 'creative'])
@include('livewire.member.cv-templates.partials.education', ['education' => $data['education'], 'labels' => $labels, 'template' => 'creative'])
@include('livewire.member.cv-templates.partials.projects', ['projects' => $data['projects'], 'labels' => $labels, 'template' => 'creative'])
@include('livewire.member.cv-templates.partials.skills', ['skills' => $data['skills'], 'labels' => $labels, 'template' => 'creative'])
@include('livewire.member.cv-templates.partials.languages', ['languages' => $data['languages'], 'labels' => $labels, 'template' => 'creative'])
@include('livewire.member.cv-templates.partials.organization', ['organizations' => $data['organizations'], 'labels' => $labels, 'template' => 'creative'])
</div>
