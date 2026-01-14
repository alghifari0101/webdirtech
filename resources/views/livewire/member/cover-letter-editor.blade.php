<div x-data="{ showUpgradeModal: false }" class="py-12 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-start gap-10">
                <!-- Sidebar Navigasi -->
                <div class="w-full md:w-80 no-print">
                    <x-member.sidebar active="cover-letter" />
                </div>

                <!-- Main Content -->
                <div class="flex-1 min-w-0">
                    <div class="flex flex-col xl:flex-row gap-8">
                        @include('livewire.member.cover-letter.partials.template-selector')
                        @include('livewire.member.cover-letter.partials.preview')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script shadow>
        function copyToClipboard() {
            const content = document.getElementById('letterContent').innerText;
            navigator.clipboard.writeText(content).then(() => {
                alert('Surat berhasil disalin ke clipboard!');
            });
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@400;600&display=swap');

        .font-serif {
            font-family: 'Crimson Pro', 'Times New Roman', serif;
        }

        @keyframes fade-in {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fade-in 0.5s ease-out forwards;
        }

        .letter-paper {
            background-image: 
                linear-gradient(rgba(226, 232, 240, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(226, 232, 240, 0.1) 1px, transparent 1px);
            background-size: 20px 20px;
        }

        @media print {
            body, html {
                background: white !important;
                margin: 0 !important;
                padding: 0 !important;
            }

            header, footer, nav, .no-print {
                display: none !important;
            }

            .container {
                max-width: none !important;
                width: 100% !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            .py-12 {
                padding: 0 !important;
            }

            .letter-container {
                box-shadow: none !important;
                border: none !important;
                width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                position: absolute !important;
                top: 0 !important;
                left: 0 !important;
            }

            .letter-paper {
                padding: 25mm !important; /* Standard letter margin */
                background: white !important;
                background-image: none !important;
            }

            .letter-inner {
                font-size: 11pt !important; /* Ideal for printed documents */
                line-height: 1.6 !important;
                color: #000 !important;
            }

            @page {
                size: A4;
                margin: 0;
            }
        }
    </style>

    <!-- Upgrade Modal -->
    <div x-show="showUpgradeModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm no-print"
         style="display: none;">
        <div @click.away="showUpgradeModal = false" class="bg-white rounded-3xl shadow-2xl overflow-hidden max-w-sm w-full transform transition-all">
            <div class="relative h-32 bg-indigo-600 flex items-center justify-center overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 to-purple-800 opacity-90"></div>
                <i class="fa-solid fa-gem text-5xl text-white/20 absolute -right-4 -bottom-4"></i>
                <i class="fa-solid fa-crown text-white text-5xl relative z-10 shadow-sm"></i>
            </div>
            <div class="p-8 text-center">
                <h3 class="text-2xl font-bold text-slate-900 mb-2">Simpan Surat Lamaran</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-8">
                    Fitur Download PDF Surat Lamaran adalah bagian dari paket <strong>Premium</strong>. Aktifkan sekarang hanya dengan Rp 19.000 per bulan!
                </p>
                <div class="space-y-3">
                    <a href="{{ route('member.payment') }}" class="w-full btn btn-primary py-3 rounded-xl flex items-center justify-center gap-2 shadow-lg shadow-blue-900/10">
                        <i class="fa-solid fa-credit-card"></i> Bayar Sekarang
                    </a>
                    <button @click="showUpgradeModal = false" class="text-sm font-bold text-slate-400 hover:text-slate-600 transition-colors uppercase tracking-widest px-8 py-2">
                        Nanti Saja
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
