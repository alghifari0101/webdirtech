<div>
    <!-- Hero Section -->
    <section class="hero-section relative overflow-hidden border-b border-slate-100 bg-[#fafafa] py-16 lg:py-32">
        <!-- Subtle Decoration -->
        <div class="absolute -top-[10%] -left-[5%] w-[400px] h-[400px] bg-black/5 rounded-full blur-[80px] pointer-events-none opacity-20"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center max-w-[850px] mx-auto text-primary">
                <div class="font-extrabold text-accent uppercase tracking-[0.15em] text-[0.7rem] lg:text-[0.9rem] mb-6">Knowledge Base</div>
                <h1 class="font-outfit text-4xl md:text-6xl lg:text-[4.5rem] font-black mb-6 leading-[1.1] tracking-tighter">
                    Pusat Bantuan <br><span class="text-accent/80">& Tanya Jawab</span>
                </h1>
                <p class="text-lg lg:text-[1.35rem] text-slate-500 font-normal max-w-[650px] mx-auto mb-12 leading-relaxed">
                    Temukan jawaban instan untuk mengoptimalkan performa infrastruktur digital dan pertumbuhan bisnis Anda.
                </p>
                
                <!-- Premium Search Bar -->
                <div style="max-width: 650px; margin: 0 auto; position: relative;">
                    <div style="background: white; border: 1px solid #e2e8f0; border-radius: 24px; padding: 12px; display: flex; align-items: center; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05); transition: all 0.3s ease;">
                        <i class="fa-solid fa-magnifying-glass" style="margin-left: 20px; color: #94a3b8;"></i>
                        <input type="text" wire:model="search" wire:keydown.enter="performSearch" placeholder="Apa yang bisa kami bantu hari ini?" 
                            style="flex: 1; background: transparent; border: none; color: #1e293b; padding: 15px 20px; font-size: 1.2rem; outline: none; font-family: 'Inter', sans-serif;" class="search-input">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section style="padding: 100px 0; background-color: #f8fafc; min-height: 600px;">
        <div class="container">
            <div style="max-width: 1000px; margin: 0 auto;">
                <div class="faq-container">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $asks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ask): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="ask-card mb-8 bg-white rounded-3xl p-6 lg:p-10 border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300">
                            <div class="flex flex-col md:flex-row gap-6 lg:gap-8 items-start">
                                <div class="flex-shrink-0 w-12 h-12 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center text-xl font-black shadow-inner">
                                    Q
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-outfit text-xl lg:text-2xl font-bold text-slate-800 mb-4 leading-snug">
                                        <a href="<?php echo e(route('ask.show', $ask->slug)); ?>" class="hover:text-accent transition-colors">
                                            <?php echo e($ask->question); ?>

                                        </a>
                                    </h3>
                                    <div class="text-slate-500 leading-relaxed text-base lg:text-lg mb-6">
                                        <?php echo e(\Illuminate\Support\Str::limit($ask->answer, 180)); ?>

                                    </div>
                                    <div class="flex flex-wrap justify-between items-center gap-4 pt-4 border-t border-slate-50">
                                        <a href="<?php echo e(route('ask.show', $ask->slug)); ?>" class="text-accent font-bold text-sm lg:text-base flex items-center gap-2 hover:gap-4 transition-all">
                                            Baca Selengkapnya <i class="fa-solid fa-arrow-right text-xs transition-transform group-hover:translate-x-1"></i>
                                        </a>
                                        <span class="text-xs font-semibold text-slate-300 uppercase tracking-widest">
                                            <i class="fa-solid fa-eye mr-1 opacity-50"></i> <?php echo e(rand(100, 999)); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="text-center" style="padding: 120px 0; background: white; border-radius: 32px; border: 2px dashed #e2e8f0;">
                            <div style="font-size: 6rem; color: #f1f5f9; margin-bottom: 30px;">
                                <i class="fa-solid fa-cloud-moon"></i>
                            </div>
                            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.75rem; color: #64748b; font-weight: 700;">Hening Sekali...</h3>
                            <p style="color: #94a3b8; font-size: 1.1rem;">Pertanyaan yang Anda cari tidak ditemukan atau belum ada.</p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($search): ?>
                                <button wire:click="$set('search', '')" style="margin-top: 30px; background: #e11d48; color: white; border: none; padding: 12px 30px; border-radius: 14px; font-weight: 700; cursor: pointer; transition: all 0.2s ease;">
                                    Hapus Pencarian
                                </button>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                
                <div class="mt-16 flex justify-center pagination-container">
                    <?php echo e($asks->links('vendor.pagination.ask-custom')); ?>

                </div>
            </div>
        </div>

        <style>
            /* Hide 'Showing X to Y' metadata */
            .pagination-container nav > div:first-child { display: none !important; }
            .pagination-container nav p { display: none !important; }
            
            .pagination-container nav > div:last-child { 
                display: flex !important; 
                flex-wrap: wrap;
                gap: 8px;
                justify-content: center;
            }
            .pagination-container nav span[aria-current="page"] > span {
                background-color: #D31A1A !important;
                color: white !important;
                border-color: #D31A1A !important;
            }
            .pagination-container nav a, 
            .pagination-container nav span[aria-disabled="true"] > span,
            .pagination-container nav span[aria-current="page"] > span {
                width: 45px !important;
                height: 45px !important;
                display: flex !important;
                align-items: center;
                justify-content: center;
                border-radius: 12px !important;
                font-weight: 700 !important;
                font-size: 0.9rem !important;
                transition: all 0.3s ease !important;
                border: 1px solid #e2e8f0 !important;
                background: white !important;
                color: #0f172a !important;
            }
            .pagination-container nav a:hover {
                border-color: #D31A1A !important;
                color: #D31A1A !important;
                transform: translateY(-2px);
                box-shadow: 0 10px 15px -3px rgba(211, 26, 26, 0.1);
            }
            .pagination-container nav svg { width: 20px !important; height: 20px !important; }
        </style>
    </section>
</div>
<?php /**PATH C:\laravel\dirtech\resources\views/livewire/ask-page.blade.php ENDPATH**/ ?>