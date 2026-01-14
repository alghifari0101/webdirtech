<div class="flex-1 min-w-0">
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 min-h-[700px] flex flex-col overflow-hidden letter-container">
        <div class="px-8 py-5 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center no-print">
            <h3 class="font-bold text-slate-800 flex items-center gap-2 text-sm">
                <i class="fa-solid fa-file-lines text-primary"></i>
                Pratinjau Surat Lamaran
            </h3>
            @if($result)
                <div class="flex items-center gap-6">
                    <button onclick="copyToClipboard()" class="text-slate-600 hover:text-primary text-xs font-bold flex items-center gap-2 transition-colors">
                        <i class="fa-regular fa-copy"></i>
                        Salin Teks
                    </button>
                    <button @click="if (!@js(auth()->user()->is_premium)) { showUpgradeModal = true } else { window.print() }" class="bg-primary text-white text-[11px] px-4 py-2 rounded-lg font-bold flex items-center gap-2 transition-all hover:scale-105 active:scale-95 shadow-lg shadow-primary/20">
                        <i class="fa-solid fa-file-pdf"></i>
                        Download PDF
                    </button>
                </div>
            @endif
        </div>

        <div class="flex-1 p-8 md:p-16 relative bg-white letter-paper overflow-y-auto">
            @if($result)
                @php
                    $currentTemplate = collect($templates)->firstWhere('id', $selectedTemplateId);
                    $hasRightHeader = $currentTemplate['has_right_header'] ?? false;
                    
                    if ($hasRightHeader) {
                        // Split by the first double newline
                        $parts = explode("\r\n\r\n", $result, 2);
                        $header = $parts[0] ?? '';
                        $body = $parts[1] ?? '';
                    } else {
                        $header = null;
                        $body = $result;
                    }
                @endphp
                <div id="letterContent" class="max-w-none text-slate-900 font-serif leading-relaxed text-[15px] text-justify animate-fade-in letter-inner">
                    @if($header)
                        <div class="text-right mb-10">
                            {!! nl2br(e($header)) !!}
                        </div>
                    @endif
                    {!! nl2br(e($body)) !!}
                </div>
            @else
                <div class="h-full flex flex-col items-center justify-center text-center space-y-4 opacity-40 no-print py-20">
                    <div class="w-32 h-32 bg-slate-50 rounded-full flex items-center justify-center border-2 border-dashed border-slate-200">
                        <i class="fa-solid fa-feather-pointed text-5xl text-slate-300"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-slate-900">Belum Ada Surat</p>
                        <p class="text-slate-500 max-w-xs mx-auto mt-2">Pilih template dan biarkan AI membantu Anda menulis surat lamaran hari ini.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
