<div class="w-full md:w-1/3 xl:w-[350px] space-y-6 no-print flex-shrink-0">
    <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-layer-group text-primary"></i>
                {{ $language === 'id' ? 'Pilih Template' : 'Select Template' }}
            </h2>
            
            <div class="flex bg-slate-100 p-1 rounded-lg">
                <button wire:click="setLanguage('id')" class="px-3 py-1 rounded-md text-[10px] font-bold transition-all {{ $language === 'id' ? 'bg-white text-primary shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                    ID
                </button>
                <button wire:click="setLanguage('en')" class="px-3 py-1 rounded-md text-[10px] font-bold transition-all {{ $language === 'en' ? 'bg-white text-primary shadow-sm' : 'text-slate-500 hover:text-slate-700' }}">
                    EN
                </button>
            </div>
        </div>

        <div class="space-y-3">
            @foreach($templates as $template)
                <button wire:click="selectTemplate('{{ $template['id'] }}')" 
                    class="w-full text-left p-4 rounded-xl border transition-all flex flex-col gap-1 {{ $selectedTemplateId === $template['id'] ? 'border-primary bg-primary/5 shadow-md shadow-primary/5' : 'border-slate-100 hover:border-slate-200 hover:bg-slate-50' }}">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-sm {{ $selectedTemplateId === $template['id'] ? 'text-primary' : 'text-slate-800' }}">
                            {{ $template['title'][$language] ?? $template['title']['id'] }}
                        </span>
                        @if($selectedTemplateId === $template['id'])
                            <i class="fa-solid fa-circle-check text-primary"></i>
                        @endif
                    </div>
                    <p class="text-[10px] text-slate-500 leading-relaxed italic">
                        {{ $template['description'][$language] ?? $template['description']['id'] }}
                    </p>
                </button>
            @endforeach
        </div>
    </div>

    <!-- AI Generator Section -->
    <div class="bg-indigo-50 border border-indigo-100 rounded-[2rem] p-6">
        <h4 class="font-bold text-indigo-900 mb-4 flex items-center gap-2 text-sm">
            <i class="fa-solid fa-wand-magic-sparkles text-indigo-600"></i>
            {{ $language === 'id' ? 'Tulis Pakai AI' : 'Write with AI' }}
        </h4>
        
        <div class="space-y-3">
            <div>
                <label class="block text-[10px] font-bold text-indigo-800 mb-1 uppercase tracking-wider ml-1">{{ $language === 'id' ? 'Nama Perusahaan' : 'Company Name' }}</label>
                <input type="text" wire:model="companyName" class="w-full text-xs rounded-xl border-indigo-200 focus:border-indigo-500 focus:ring-indigo-500 bg-white px-4 py-3" placeholder="Contoh: Google Indonesia">
                 @error('companyName') <span class="text-[10px] text-red-500 ml-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-[10px] font-bold text-indigo-800 mb-1 uppercase tracking-wider ml-1">{{ $language === 'id' ? 'Posisi yang Dilamar' : 'Target Position' }}</label>
                <input type="text" wire:model="jobPosition" class="w-full text-xs rounded-xl border-indigo-200 focus:border-indigo-500 focus:ring-indigo-500 bg-white px-4 py-3" placeholder="Contoh: Digital Marketing">
                @error('jobPosition') <span class="text-[10px] text-red-500 ml-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-[10px] font-bold text-indigo-800 mb-1 uppercase tracking-wider ml-1">{{ $language === 'id' ? 'Skill Kunci (Opsional)' : 'Key Skills (Optional)' }}</label>
                <input type="text" wire:model="keySkills" class="w-full text-xs rounded-xl border-indigo-200 focus:border-indigo-500 focus:ring-indigo-500 bg-white px-4 py-3" placeholder="Contoh: SEO, Copywriting, Ads">
            </div>

            <div>
                <label class="block text-[10px] font-bold text-indigo-800 mb-1 uppercase tracking-wider ml-1">{{ $language === 'id' ? 'Gaya Bahasa' : 'Tone' }}</label>
                <select wire:model="tone" class="w-full text-xs rounded-xl border-indigo-200 focus:border-indigo-500 focus:ring-indigo-500 bg-white px-4 py-3">
                    <option value="formal">Formal & Profesional</option>
                    <option value="creative">Kreatif & Antusias</option>
                    <option value="humble">Rendah Hati & Sopan</option>
                </select>
            </div>

            <button wire:click="generateWithAI" wire:loading.attr="disabled" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs py-4 rounded-xl shadow-lg shadow-indigo-200 flex items-center justify-center gap-2 mt-2 transition-all active:scale-95">
                <span wire:loading.remove wire:target="generateWithAI">
                    <i class="fa-solid fa-pen-nib"></i> {{ $language === 'id' ? 'Buatkan Surat' : 'Generate Letter' }}
                </span>
                <span wire:loading wire:target="generateWithAI" class="flex items-center gap-2">
                    <i class="fa-solid fa-spinner fa-spin"></i>
                    {{ $language === 'id' ? 'Sedang Menulis...' : 'Writing...' }}
                </span>
            </button>
        </div>
    </div>

    <div class="bg-amber-50 border border-amber-100 rounded-[2rem] p-6">
        <h4 class="font-bold text-amber-900 mb-2 flex items-center gap-2 text-sm">
            <i class="fa-solid fa-lightbulb"></i>
            Tips
        </h4>
        <p class="text-amber-800 text-[11px] leading-relaxed">
            Pilih template yang paling sesuai. Sesuaikan isi di dalam kurung siku <strong>[...]</strong> sesuai dengan profil Anda.
        </p>
    </div>
</div>
