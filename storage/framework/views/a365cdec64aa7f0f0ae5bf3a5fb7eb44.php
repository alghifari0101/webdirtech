<div x-data="{ showUpgradeModal: false }" class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Sidebar Templates -->
            <div class="w-full md:w-1/3 space-y-6 no-print">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                            <i class="fa-solid fa-layer-group text-primary"></i>
                            <?php echo e($language === 'id' ? 'Pilih Template' : 'Select Template'); ?>

                        </h2>
                        
                        <div class="flex bg-slate-100 p-1 rounded-lg">
                            <button wire:click="setLanguage('id')" class="px-3 py-1 rounded-md text-xs font-bold transition-all <?php echo e($language === 'id' ? 'bg-white text-primary shadow-sm' : 'text-slate-500 hover:text-slate-700'); ?>">
                                Indonesia
                            </button>
                            <button wire:click="setLanguage('en')" class="px-3 py-1 rounded-md text-xs font-bold transition-all <?php echo e($language === 'en' ? 'bg-white text-primary shadow-sm' : 'text-slate-500 hover:text-slate-700'); ?>">
                                English
                            </button>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button wire:click="selectTemplate('<?php echo e($template['id']); ?>')" 
                                class="w-full text-left p-4 rounded-xl border transition-all flex flex-col gap-1 <?php echo e($selectedTemplateId === $template['id'] ? 'border-primary bg-primary/5 shadow-md shadow-primary/5' : 'border-slate-100 hover:border-slate-200 hover:bg-slate-50'); ?>">
                                <div class="flex items-center justify-between">
                                    <span class="font-bold <?php echo e($selectedTemplateId === $template['id'] ? 'text-primary' : 'text-slate-800'); ?>">
                                        <?php echo e($template['title'][$language] ?? $template['title']['id']); ?>

                                    </span>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedTemplateId === $template['id']): ?>
                                        <i class="fa-solid fa-circle-check text-primary"></i>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                                <p class="text-[11px] text-slate-500 leading-relaxed italic">
                                    <?php echo e($template['description'][$language] ?? $template['description']['id']); ?>

                                </p>
                            </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                <div class="bg-amber-50 border border-amber-100 rounded-2xl p-6">
                    <h4 class="font-bold text-amber-900 mb-2 flex items-center gap-2 text-sm">
                        <i class="fa-solid fa-lightbulb"></i>
                        Tips Penggunaan
                    </h4>
                    <p class="text-amber-800 text-xs leading-relaxed">
                        Pilih template yang paling sesuai dengan kebutuhan Anda. Anda dapat menyalin teksnya dan menyesuaikan bagian di dalam kurung siku <strong>[...]</strong> sesuai dengan profil Anda.
                    </p>
                </div>
            </div>

            <!-- Preview Surat -->
            <div class="flex-1">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 min-h-[600px] flex flex-col overflow-hidden letter-container">
                    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center no-print">
                        <h3 class="font-bold text-slate-800 flex items-center gap-2 text-sm">
                            <i class="fa-solid fa-file-lines text-slate-400"></i>
                            Pratinjau Surat Lamaran
                        </h3>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($result): ?>
                            <div class="flex items-center gap-4">
                                <button onclick="copyToClipboard()" class="text-slate-600 hover:text-primary text-xs font-semibold flex items-center gap-1 transition-colors">
                                    <i class="fa-regular fa-copy"></i>
                                    Salin Teks
                                </button>
                                <button @click="if (!<?php echo \Illuminate\Support\Js::from(auth()->user()->is_premium)->toHtml() ?>) { showUpgradeModal = true } else { window.print() }" class="text-primary hover:text-primary-dark text-xs font-semibold flex items-center gap-1 transition-colors">
                                    <i class="fa-solid fa-file-pdf"></i>
                                    PDF
                                </button>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="flex-1 p-8 md:p-12 relative bg-white letter-paper">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($result): ?>
                            <?php
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
                            ?>
                            <div id="letterContent" class="max-w-none text-slate-900 font-serif leading-normal text-[15px] text-justify animate-fade-in letter-inner">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($header): ?>
                                    <div class="text-right mb-8">
                                        <?php echo nl2br(e($header)); ?>

                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php echo nl2br(e($body)); ?>

                            </div>
                        <?php else: ?>
                            <div class="h-full flex flex-col items-center justify-center text-center space-y-4 opacity-40 no-print">
                                <div class="w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center">
                                    <i class="fa-solid fa-feather-pointed text-4xl text-slate-400"></i>
                                </div>
                                <div>
                                    <p class="text-xl font-bold text-slate-900">Belum Ada Surat</p>
                                    <p class="text-slate-500 max-w-xs mx-auto">Isi data di samping dan klik tombol 'Hasilkan Surat' untuk mulai menulis.</p>
                                </div>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                    <a href="<?php echo e(route('member.payment')); ?>" class="w-full btn btn-primary py-3 rounded-xl flex items-center justify-center gap-2 shadow-lg shadow-blue-900/10">
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
<?php /**PATH C:\laravel\dirtech\resources\views/livewire/member/cover-letter-editor.blade.php ENDPATH**/ ?>