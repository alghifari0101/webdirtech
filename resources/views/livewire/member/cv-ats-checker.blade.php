<div class="py-12 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-start gap-10">
                <!-- Sidebar Navigasi -->
                <div class="w-full md:w-80">
                    <x-member.sidebar active="ats-checker" />
                </div>

                <!-- Main Content -->
                <div class="flex-1 min-w-0">
                    <div class="mb-8">
                        <h1 class="text-3xl font-outfit font-extrabold text-slate-900">CV ATS Checker</h1>
                        <p class="mt-2 text-sm text-slate-500">
                            Analisis seberapa optimal CV Anda terhadap deskripsi pekerjaan tertentu menggunakan AI Gemini.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-8 lg:grid-cols-12">
                        <!-- Input Form Section -->
                        <div class="lg:col-span-4">
                            <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <form wire:submit.prevent="analyze" class="space-y-6">
                                    <!-- File Upload -->
                                    <div>
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload CV (PDF/Docx)</label>
                                        <div 
                                            x-data="{ isDragging: false }" 
                                            @dragover.prevent="isDragging = true" 
                                            @dragleave.prevent="isDragging = false" 
                                            @drop.prevent="isDragging = false; @this.upload('cvFile', $event.dataTransfer.files[0])"
                                            class="relative flex flex-col items-center justify-center w-full p-6 border-2 border-dashed rounded-xl transition-all duration-200"
                                            :class="isDragging ? 'border-indigo-500 bg-indigo-50 dark:bg-indigo-900/10' : 'border-gray-300 dark:border-gray-600 hover:border-indigo-400 dark:hover:border-indigo-500'"
                                        >
                                            @if ($cvFile)
                                                <div class="flex flex-col items-center text-center">
                                                    <div class="p-3 mb-3 bg-indigo-100 rounded-full dark:bg-indigo-900/30">
                                                        <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                        </svg>
                                                    </div>
                                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $cvFile->getClientOriginalName() }}</p>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ number_format($cvFile->getSize() / 1024, 0) }} KB</p>
                                                    <button type="button" wire:click="$set('cvFile', null)" class="mt-3 text-xs font-semibold text-red-600 hover:text-red-700 dark:text-red-400">Ganti File</button>
                                                </div>
                                            @else
                                                <div class="flex flex-col items-center text-center">
                                                    <div class="p-3 mb-3 bg-gray-100 rounded-full dark:bg-gray-700/50">
                                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                        </svg>
                                                    </div>
                                                    <p class="text-sm text-gray-700 dark:text-gray-300">
                                                        <span class="font-semibold text-indigo-600 dark:text-indigo-400">Klik untuk upload</span> atau drag & drop
                                                    </p>
                                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">PDF atau DOCX (Maks. 2MB)</p>
                                                </div>
                                                <input type="file" wire:model="cvFile" class="absolute inset-0 opacity-0 cursor-pointer">
                                            @endif
                                        </div>
                                        @error('cvFile') <p class="mt-2 text-xs text-red-600">{{ $message }}</p> @enderror
                                    </div>

                                    <!-- Job Description -->
                                    <div>
                                        <label for="jd" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Pekerjaan</label>
                                        <textarea 
                                            id="jd" 
                                            wire:model="jobDescription" 
                                            rows="8" 
                                            class="block w-full px-4 py-3 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                            placeholder="Tempel (paste) informasi lowongan kerja atau job description di sini..."
                                        ></textarea>
                                        @error('jobDescription') <p class="mt-2 text-xs text-red-600">{{ $message }}</p> @enderror
                                    </div>

                                    <!-- Submit Button -->
                                    <button 
                                        type="submit" 
                                        wire:loading.attr="disabled"
                                        class="w-full flex justify-center items-center px-6 py-3.5 text-base font-semibold text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 shadow-md shadow-indigo-200 dark:shadow-none"
                                    >
                                        <span wire:loading.remove wire:target="analyze">Analisis Sekarang</span>
                                        <span wire:loading wire:target="analyze" class="flex items-center">
                                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                            Sedang Menganalisis...
                                        </span>
                                    </button>
                                    
                                    @if($errorMessage)
                                        <div class="p-4 mt-4 text-sm text-red-800 bg-red-50 rounded-xl dark:bg-red-900/20 dark:text-red-400 border border-red-100 dark:border-red-800/50">
                                            {{ $errorMessage }}
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>

                        <!-- Result Section -->
                        <div class="lg:col-span-8">
                            @if($analysisResult)
                                <div class="space-y-6 animate-fade-in">
                                    <!-- Score Card -->
                                    <div class="p-8 bg-white border border-gray-200 rounded-2xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                        <div class="flex flex-col items-center justify-between gap-6 md:flex-row">
                                            <div class="text-center md:text-left">
                                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Hasil Analisis ATS</h3>
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Skor kecocokan CV Anda dengan deskripsi pekerjaan.</p>
                                                <div class="mt-4 flex items-center gap-2">
                                                    <span @class([
                                                        'px-3 py-1 text-xs font-bold rounded-full uppercase tracking-wider',
                                                        'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400' => $analysisResult['score'] < 50,
                                                        'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400' => $analysisResult['score'] >= 50 && $analysisResult['score'] < 80,
                                                        'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' => $analysisResult['score'] >= 80,
                                                    ])>
                                                        {{ $analysisResult['match_status'] }} Match
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="relative flex items-center justify-center">
                                                <svg class="w-32 h-32 transform -rotate-90">
                                                    <circle cx="64" cy="64" r="56" stroke="currentColor" stroke-width="8" fill="transparent" class="text-gray-100 dark:text-gray-700" />
                                                    <circle cx="64" cy="64" r="56" stroke="currentColor" stroke-width="8" fill="transparent" 
                                                        stroke-dasharray="351.85" 
                                                        stroke-dashoffset="{{ 351.85 * (1 - $analysisResult['score'] / 100) }}" 
                                                        stroke-linecap="round"
                                                        @class([
                                                            'transition-all duration-1000 ease-out',
                                                            'text-red-500' => $analysisResult['score'] < 50,
                                                            'text-yellow-500' => $analysisResult['score'] >= 50 && $analysisResult['score'] < 80,
                                                            'text-green-500' => $analysisResult['score'] >= 80,
                                                        ]) 
                                                    />
                                                </svg>
                                                <span class="absolute text-3xl font-bold text-gray-900 dark:text-white">{{ $analysisResult['score'] }}<span class="text-base font-normal text-gray-500">%</span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Keywords & Strengths -->
                                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                        <!-- Missing Keywords -->
                                        <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                            <h4 class="mb-4 text-sm font-bold text-gray-900 uppercase tracking-widest flex items-center gap-2 dark:text-white">
                                                <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                                Keyword Hilang
                                            </h4>
                                            <div class="flex flex-wrap gap-2">
                                                @forelse($analysisResult['missing_keywords'] ?? [] as $keyword)
                                                    <span class="px-3 py-1 text-xs font-medium text-red-700 bg-red-50 border border-red-100 rounded-lg dark:bg-red-900/10 dark:text-red-400 dark:border-red-800/50">
                                                        {{ $keyword }}
                                                    </span>
                                                @empty
                                                    <p class="text-sm text-gray-500 italic">Tidak ada keyword krusial yang hilang.</p>
                                                @endforelse
                                            </div>
                                        </div>

                                        <!-- Strengths -->
                                        <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                            <h4 class="mb-4 text-sm font-bold text-gray-900 uppercase tracking-widest flex items-center gap-2 dark:text-white">
                                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                                Kelebihan CV
                                            </h4>
                                            <ul class="space-y-2">
                                                @foreach($analysisResult['strengths'] ?? [] as $strength)
                                                    <li class="flex items-start gap-3 text-sm text-gray-600 dark:text-gray-400">
                                                        <svg class="w-4 h-4 mt-0.5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                        {{ $strength }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Recommendations -->
                                    <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                        <h4 class="mb-4 text-sm font-bold text-gray-900 uppercase tracking-widest flex items-center gap-2 dark:text-white">
                                            <svg class="w-4 h-4 text-indigo-500" fill="currentColor" viewBox="0 0 20 20"><path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1a1 1 0 112 0v1a1 1 0 11-2 0zM13.333 16.444l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zM15 11l.556 4.444H4.444L5 11h10z"></path></svg>
                                            Saran Perbaikan
                                        </h4>
                                        <div class="space-y-4">
                                            @foreach($analysisResult['recommendations'] ?? [] as $rec)
                                                <div class="p-4 bg-indigo-50/50 rounded-xl border border-indigo-100 dark:bg-indigo-900/10 dark:border-indigo-800/50">
                                                    <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">{{ $rec }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Format Feedback -->
                                    @if($analysisResult['format_feedback'] ?? null)
                                        <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                            <h4 class="mb-4 text-sm font-bold text-gray-900 uppercase tracking-widest flex items-center gap-2 dark:text-white">
                                                <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                                Feedback Format & Struktur
                                            </h4>
                                            <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">{{ $analysisResult['format_feedback'] }}</p>
                                        </div>
                                    @endif

                                    <!-- Action Button -->
                                    <div class="flex justify-end">
                                        <button type="button" wire:click="resetForm" class="text-sm font-semibold text-gray-600 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 transition-colors">
                                            Analisis CV Lain
                                        </button>
                                    </div>
                                </div>
                            @else
                                <!-- Empty State -->
                                <div class="flex flex-col items-center justify-center p-12 bg-white border border-gray-200 border-dashed rounded-2xl dark:bg-gray-800/50 dark:border-gray-700 h-full min-h-[400px]">
                                    <div class="p-4 mb-4 bg-indigo-50 rounded-full dark:bg-indigo-900/20">
                                        <svg class="w-12 h-12 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Belum ada analisis</h3>
                                    <p class="max-w-xs mt-2 text-sm text-center text-gray-500 dark:text-gray-400">
                                        Isi form di sebelah kiri untuk mulai menganalisis CV Anda terhadap lowongan pekerjaan impian.
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
