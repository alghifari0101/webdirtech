<div x-show="step === 1" class="space-y-8">
    <!-- Informasi Dasar -->
    @include('livewire.member.cv-editor.partials.section-basic-info')
        
    <!-- Dynamic Reorderable Sections -->
    <div class="space-y-4">
        @foreach($data['section_order'] as $secIndex => $section)
            @if($section === 'summary')
                @include('livewire.member.cv-editor.partials.section-summary')
            @endif

            @if($section === 'experience')
                @include('livewire.member.cv-editor.partials.section-experience')
            @endif

            @if($section === 'education')
                @include('livewire.member.cv-editor.partials.section-education')
            @endif

            @if($section === 'organizations')
                @include('livewire.member.cv-editor.partials.section-organizations')
            @endif

            @if($section === 'projects')
                @include('livewire.member.cv-editor.partials.section-projects')
            @endif

            @if($section === 'certifications')
                @include('livewire.member.cv-editor.partials.section-certifications')
            @endif

            @if($section === 'skills')
                @include('livewire.member.cv-editor.partials.section-skills')
            @endif

            @if($section === 'languages')
                @include('livewire.member.cv-editor.partials.section-languages')
            @endif
        @endforeach
    </div>

    <div class="mt-12 flex justify-between items-center bg-primary/5 p-6 rounded-3xl border border-primary/10">
         <button wire:click="save" class="bg-slate-800 text-white font-bold py-3 px-8 rounded-2xl hover:scale-105 transition-all text-sm">Simpan Progress</button>
         <button wire:click="nextStep" class="bg-primary text-white font-bold py-3 px-10 rounded-2xl shadow-xl shadow-primary/20 hover:scale-105 transition-all flex items-center gap-2 group">
            Lanjut ke Desain <i class="fa-solid fa-arrow-right transition-transform group-hover:translate-x-1"></i>
         </button>
    </div>
</div>
