<div x-data="{ 
    showUpgradeModal: false,
    activeSection: 'basic',
    step: @entangle('step')
}" 
     x-on:show-upgrade-modal.window="showUpgradeModal = true"
     class="py-12 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-6">
        <div class="max-w-[1600px] mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-start gap-10">
                <!-- Sidebar Navigasi -->
                <div class="w-full md:w-80 no-print">
                    <x-member.sidebar active="cv-editor" />
                </div>

                <!-- Main Content -->
                <div class="flex-1 min-w-0">
        <!-- Header & Stepper -->
        <div class="mb-10 text-center no-print">
            <h2 class="text-3xl font-outfit font-bold text-slate-800 mb-2">CV ATS Professional Editor</h2>
            <p class="text-slate-500 text-sm mb-8">Lengkapi data Anda dengan mudah dan pilih desain terbaik.</p>
            
            <div class="flex items-center justify-center gap-4 no-print">
                <div @click="$wire.setStep(1)" class="flex items-center gap-3 cursor-pointer group">
                    <div :class="step === 1 ? 'bg-primary text-white' : 'bg-white text-slate-400 border border-slate-200'" class="w-10 h-10 rounded-full flex items-center justify-center font-bold transition-all shadow-sm">1</div>
                    <span :class="step === 1 ? 'text-slate-800 font-bold' : 'text-slate-400 font-medium'" class="text-sm">Isi Data CV</span>
                </div>
                <div class="w-12 h-px bg-slate-200"></div>
                <div @click="$wire.setStep(2)" class="flex items-center gap-3 cursor-pointer group">
                    <div :class="step === 2 ? 'bg-primary text-white' : 'bg-white text-slate-400 border border-slate-200'" class="w-10 h-10 rounded-full flex items-center justify-center font-bold transition-all shadow-sm">2</div>
                    <span :class="step === 2 ? 'text-slate-800 font-bold' : 'text-slate-400 font-medium'" class="text-sm">Desain & Preview</span>
                </div>
            </div>
        </div>

        @php
            $cur = $labels;
        @endphp

        <div class="flex flex-col lg:flex-row gap-4 sm:gap-6 lg:gap-8 items-start">
            <!-- LEFT PANEL: FORMS/DESIGN -->
            <div class="w-full space-y-4 sm:space-y-6 lg:sticky lg:top-6 no-print" 
                 :class="step === 1 ? 'max-w-4xl mx-auto' : 'lg:w-[320px] lg:flex-none' + (step === 2 ? ' order-2 lg:order-1' : '')">
                
                @if (session()->has('message'))
                    <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 mb-6 rounded-r-xl no-print">
                        <p class="text-emerald-800 text-sm flex items-center gap-2">
                            <i class="fa-solid fa-circle-check"></i> {{ session('message') }}
                        </p>
                    </div>
                @endif

                <!-- STEP 1: FORM SECTIONS -->
                @include('livewire.member.cv-editor.steps.step-1')

                <!-- STEP 2: DESIGN PANEL -->
                @include('livewire.member.cv-editor.steps.step-2')
            </div>

            <!-- RIGHT PANEL: PREVIEW -->
            @include('livewire.member.cv-editor.partials.preview-panel')
        </div>

        @include('livewire.member.cv-editor-styles')
        @include('livewire.member.cv-editor-scripts')

        <!-- Upgrade Modal -->
        <div x-show="showUpgradeModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm no-print">
            <div @click.away="showUpgradeModal = false" class="bg-white rounded-3xl shadow-2xl overflow-hidden max-w-sm w-full transform transition-all border border-slate-100">
                <div class="relative h-32 bg-primary flex items-center justify-center overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-purple-800 opacity-90"></div>
                    <i class="fa-solid fa-crown text-white text-5xl relative z-10 shadow-sm"></i>
                </div>
                <div class="p-8 text-center text-slate-800">
                    <h3 class="text-2xl font-bold mb-2">Gunakan Fitur Premium</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-8">
                        Template <span class="text-slate-900 font-bold uppercase">{{ $data['template'] }}</span> adalah fitur premium. 
                        Aktifkan sekarang hanya dengan <strong>Rp 19.000</strong>!
                    </p>
                    <div class="space-y-3">
                        <a href="{{ route('member.payment') }}" class="w-full bg-primary text-white font-bold py-3 rounded-2xl flex items-center justify-center gap-2 shadow-lg shadow-blue-500/20">
                            <i class="fa-solid fa-credit-card"></i> Bayar Sekarang
                        </a>
                        <button @click="showUpgradeModal = false" class="text-xs font-bold text-slate-400 uppercase tracking-widest py-2">Nanti Saja</button>
                    </div>
                </div>
            </div>
        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
