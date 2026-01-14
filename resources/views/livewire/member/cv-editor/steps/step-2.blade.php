<div x-show="step === 2" class="space-y-6">
    <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl border border-slate-100 p-4 sm:p-6 lg:p-8">
            <h3 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-2">
                <i class="fa-solid fa-palette text-primary"></i> Pilih Desain CV
            </h3>
            
            <!-- Detailed Language Selector -->
            <div class="mb-8 p-4 bg-slate-50 rounded-2xl">
                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-3">Language & Content Style</label>
                <div class="grid grid-cols-2 gap-2">
                    <button wire:click="$set('data.language', 'id')" class="py-2 text-[10px] font-bold rounded-xl border transition-all {{ $data['language'] === 'id' ? 'bg-primary text-white border-primary shadow-lg shadow-primary/20' : 'bg-white text-slate-600 border-slate-200 hover:border-primary' }}">BHS. INDONESIA</button>
                    <button wire:click="$set('data.language', 'en')" class="py-2 text-[10px] font-bold rounded-xl border transition-all {{ $data['language'] === 'en' ? 'bg-primary text-white border-primary shadow-lg shadow-primary/20' : 'bg-white text-slate-600 border-slate-200 hover:border-primary' }}">ENGLISH (US)</button>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                @php
                    $templates = [
                        ['id' => 'cv_ats_001', 'name' => 'CV ATS 001', 'color' => 'blue-600', 'desc' => 'Professional Minimalist'],
                        ['id' => 'cv_ats_002', 'name' => 'CV ATS 002', 'color' => 'slate-900', 'desc' => 'Classic Serif'],
                        ['id' => 'cv_ats_003', 'name' => 'CV ATS 003', 'color' => 'emerald-700', 'desc' => 'Modern Bold'],
                        ['id' => 'cv_ats_004', 'name' => 'CV ATS 004', 'color' => 'slate-800', 'desc' => 'Compact Data-Driven'],
                    ];
                @endphp

                @foreach($templates as $tpl)
                    <button wire:click="$set('data.template', '{{ $tpl['id'] }}')" class="p-4 rounded-2xl border-2 transition-all flex flex-col items-start gap-1 group relative overflow-hidden {{ $data['template'] === $tpl['id'] ? 'border-primary bg-primary/5' : 'border-slate-50 hover:border-slate-200 bg-white' }}">
                        @if($data['template'] === $tpl['id']) <div class="absolute top-2 right-2 text-primary text-xs"><i class="fa-solid fa-circle-check"></i></div> @endif
                        <div class="text-[11px] font-black uppercase text-slate-800">{{ $tpl['name'] }}</div>
                        <div class="text-[9px] text-slate-400 font-medium">{{ $tpl['desc'] }}</div>
                    </button>
                @endforeach
            </div>

            <div class="mt-10 space-y-3">
                <button @click="if (!@js(auth()->user()->is_premium) && @js($data['template']) !== 'cv_ats_001') { showUpgradeModal = true } else { window.print() }" class="w-full bg-slate-800 text-white font-bold py-4 px-6 rounded-2xl flex items-center justify-center gap-2 shadow-xl shadow-slate-200 hover:scale-[1.02] transition-all">
                    <i class="fa-solid fa-file-pdf"></i> Download PDF CV
                </button>

                <button wire:click="downloadDocx" wire:loading.attr="disabled" class="w-full bg-white text-slate-800 border-2 border-slate-200 font-bold py-4 px-6 rounded-2xl flex items-center justify-center gap-2 hover:bg-slate-50 hover:border-slate-300 transition-all group">
                    <span wire:loading.remove wire:target="downloadDocx">
                        <i class="fa-solid fa-file-word text-blue-600 group-hover:scale-110 transition-transform"></i> Download Word (.docx)
                    </span>
                    <span wire:loading wire:target="downloadDocx">
                        <i class="fa-solid fa-spinner fa-spin"></i> Menghasilkan File...
                    </span>
                </button>

                <button wire:click="prevStep" class="w-full bg-white text-slate-500 font-bold py-3 px-6 rounded-2xl border border-slate-200 hover:bg-slate-50 transition-all text-xs uppercase tracking-widest">
                    <i class="fa-solid fa-arrow-left mr-1"></i> Edit Data Kembali
                </button>
            </div> <!-- Close mt-10 -->
    </div> <!-- Close Step 2 Inner -->
</div> <!-- Close Step 2 Wrapper -->
