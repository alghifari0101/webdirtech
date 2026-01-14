<div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-8">
    <div class="flex items-center justify-between mb-8">
        <h3 class="text-xl font-bold text-slate-800 flex items-center gap-3">
            <div class="w-10 h-10 bg-amber-50 text-amber-500 rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-certificate"></i>
            </div>
            Sertifikasi
        </h3>
        <button wire:click="addCertification" class="text-primary text-sm font-bold flex items-center gap-2 hover:bg-primary/5 px-4 py-2 rounded-xl transition-all">
            <i class="fa-solid fa-plus-circle"></i> Tambah
        </button>
    </div>

    <div class="space-y-6">
        @foreach($data['certifications'] as $index => $cert)
            <div class="p-6 bg-slate-50/50 rounded-2xl border border-dashed border-slate-200 relative group transition-all hover:border-primary/30">
                <button wire:click="removeCertification({{ $index }})" class="absolute -top-3 -right-3 w-8 h-8 bg-white text-slate-400 hover:text-red-500 rounded-full shadow-sm border border-slate-100 opacity-0 group-hover:opacity-100 transition-all flex items-center justify-center">
                    <i class="fa-solid fa-trash-can text-xs"></i>
                </button>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Nama Sertifikasi</label>
                        <input type="text" wire:model="data.certifications.{{ $index }}.name" class="w-full rounded-xl border-slate-200 focus:border-primary focus:ring-primary bg-white px-4 py-3" placeholder="Contoh: AWS Certified Solutions Architect">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Penerbit</label>
                        <input type="text" wire:model="data.certifications.{{ $index }}.issuer" class="w-full rounded-xl border-slate-200 focus:border-primary focus:ring-primary bg-white px-4 py-3" placeholder="Contoh: Amazon Web Services">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1">Waktu Perolehan</label>
                        <input type="text" wire:model="data.certifications.{{ $index }}.date" class="w-full rounded-xl border-slate-200 focus:border-primary focus:ring-primary bg-white px-4 py-3" placeholder="Contoh: Jan 2023 atau 2023 - 2026">
                    </div>
                    <div class="md:col-span-2">
                        <div class="flex items-center justify-between mb-2 ml-1">
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest">Deskripsi (Opsional)</label>
                            <button wire:click="polishCertification({{ $index }})" wire:loading.attr="disabled" class="text-[10px] font-bold text-indigo-600 hover:text-indigo-700 flex items-center gap-1 uppercase tracking-tighter bg-indigo-50 px-2 py-1 rounded-lg transition-all animate-pulse-slow">
                                <i class="fa-solid fa-wand-magic-sparkles"></i> Perbaiki Teks
                            </button>
                        </div>
                        <textarea wire:model="data.certifications.{{ $index }}.description" rows="3" class="w-full rounded-xl border-slate-200 focus:border-primary focus:ring-primary bg-white px-4 py-3" placeholder="Jelaskan detail sertifikasi atau keterampilan yang divalidasi..."></textarea>
                    </div>
                </div>
            </div>
        @endforeach

        @if(empty($data['certifications']))
            <div class="text-center py-10 bg-slate-50 rounded-2xl border border-dashed border-slate-200">
                <i class="fa-solid fa-award text-4xl text-slate-200 mb-3"></i>
                <p class="text-slate-400 text-sm">Belum ada sertifikasi yang ditambahkan.</p>
            </div>
        @endif
    </div>
</div>
