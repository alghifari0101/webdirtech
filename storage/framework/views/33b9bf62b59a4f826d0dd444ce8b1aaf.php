<article class="bg-white">
    <style>
        /* Aggressive Image Alignment Fix */
        .prose img {
            max-width: 100%;
            height: auto;
        }
        
        /* Left Alignment */
        .prose img[style*="float: left"],
        .prose img[style*="float:left"] {
            float: left !important;
            margin-right: 1.5rem !important;
            margin-bottom: 1rem !important;
            margin-top: 0.5rem !important;
            display: block !important;
        }
        
        /* Right Alignment */
        .prose img[style*="float: right"],
        .prose img[style*="float:right"] {
            float: right !important;
            margin-left: 1.5rem !important;
            margin-bottom: 1rem !important;
            margin-top: 0.5rem !important;
            display: block !important;
        }
        
        /* Center Alignment */
        .prose img[style*="margin: auto"],
        .prose img[style*="margin:auto"],
        .prose img[style*="display: block"][style*="margin-left: auto"],
        .prose .ql-align-center img {
            display: block !important;
            margin-left: auto !important;
            margin-right: auto !important;
            float: none !important;
        }

        .prose .ql-align-center {
            text-align: center !important;
        }
        
        .prose .ql-align-right {
            text-align: right !important;
        }
    </style>
    
    <header class="relative pt-6 pb-2 lg:pt-8 lg:pb-4 overflow-hidden bg-white border-b border-slate-50">
        <div class="container mx-auto px-6 relative z-10 text-center max-w-4xl">
            <a href="<?php echo e(route('blog')); ?>" class="inline-flex items-center gap-2 text-blue-600 font-bold text-[9px] uppercase tracking-widest mb-2 hover:gap-4 transition-all">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Blog
            </a>
            <div class="flex items-center justify-center gap-3 mb-2">
                <span class="px-3 py-0.5 bg-blue-50 text-blue-600 rounded-full text-[8px] font-black uppercase tracking-wider">
                    <?php echo e($post->category->name); ?>

                </span>
                <span class="text-slate-400 text-[9px] font-bold uppercase tracking-widest">
                    <?php echo e($post->published_at->format('M d, Y')); ?>

                </span>
            </div>
            <h1 class="text-3xl lg:text-4xl font-black text-slate-900 tracking-tight leading-tight">
                <?php echo e($post->title); ?>

            </h1>
        </div>
    </header>

    
    <section class="py-12">
        <div class="container mx-auto px-6 max-w-4xl">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->featured_image): ?>
                <div class="rounded-[2.5rem] overflow-hidden shadow-2xl shadow-blue-500/10 mb-12 relative z-20 max-h-[450px] aspect-video mx-auto">
                    <img src="<?php echo e(storage_url($post->featured_image)); ?>" alt="<?php echo e($post->title); ?>" class="w-full h-full object-cover">
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <div class="prose prose-slate prose-lg lg:prose-xl max-w-none text-slate-600 leading-relaxed font-normal">
                <?php echo $post->content; ?>

            </div>

            
            <div class="mt-16 p-8 bg-slate-50 rounded-[2rem] border border-slate-100 flex flex-col md:flex-row items-center gap-8 relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-600/5 rounded-full -mr-16 -mt-16 transition-transform group-hover:scale-150 duration-700"></div>
                
                <div class="w-24 h-24 rounded-2xl bg-white p-4 shadow-sm border border-slate-100 flex-shrink-0 relative z-10">
                    <img src="<?php echo e(asset('img/favicon.svg')); ?>" alt="Dirtech Logo" class="w-full h-full object-contain">
                </div>
                
                <div class="relative z-10 text-center md:text-left">
                    <div class="flex flex-col md:flex-row md:items-center gap-2 mb-2">
                        <h4 class="text-xl font-black text-slate-900 tracking-tight">Dirtech <span class="text-blue-600">Editorial Team</span></h4>
                        <span class="px-3 py-0.5 bg-blue-600 text-white rounded-full text-[8px] font-black uppercase tracking-wider self-center md:self-auto">Verified Expert</span>
                    </div>
                    <p class="text-slate-500 text-sm leading-relaxed mb-4 max-w-2xl">
                        Dirtech adalah partner teknologi terpercaya yang menghadirkan solusi digital inovatif mulai dari jasa pembuatan website premium, install VPS, migrasi website, hingga pembuatan Google Business Profile untuk membantu bisnis Anda tumbuh lebih cepat.
                    </p>
                    <div class="flex items-center justify-center md:justify-start gap-4">
                        <a href="<?php echo e(route('home')); ?>" class="text-slate-400 hover:text-blue-600 transition-colors text-sm font-bold flex items-center gap-1">
                            <i class="fa-solid fa-earth-asia"></i> Website
                        </a>
                        <span class="w-1 h-1 bg-slate-200 rounded-full"></span>
                        <a href="https://wa.me/<?php echo e(config('contact.whatsapp')); ?>" class="text-slate-400 hover:text-emerald-500 transition-colors text-sm font-bold flex items-center gap-1">
                            <i class="fa-brands fa-whatsapp"></i> Konsultasi
                        </a>
                    </div>
                </div>
            </div>

            
            <div class="mt-24 p-8 lg:p-12 bg-slate-900 rounded-[3rem] relative overflow-hidden text-center lg:text-left flex flex-wrap lg:flex-nowrap items-center gap-10">
                <div class="absolute -top-1/2 -right-1/4 w-[400px] h-[400px] bg-blue-600/20 rounded-full blur-[100px] pointer-events-none"></div>
                <div class="relative z-10 flex-1">
                    <h3 class="text-3xl lg:text-4xl font-black text-white tracking-tight mb-4 leading-tight">Siap Mewujudkan <span class="text-blue-400">Transformasi Digital?</span></h3>
                    <p class="text-slate-400 text-lg font-medium leading-relaxed">
                        Dapatkan solusi teknologi kustom dari tim ahli Dirtech untuk mempercepat pertumbuhan bisnis Anda hari ini.
                    </p>
                </div>
                <div class="relative z-10">
                    <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center gap-4 px-10 py-5 bg-blue-600 text-white font-black rounded-2xl hover:bg-blue-700 transition-all shadow-xl shadow-blue-500/20 whitespace-nowrap">
                        Konsultasi Gratis
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($relatedPosts->count() > 0): ?>
    <section class="py-24 bg-slate-50 border-t border-slate-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-black text-slate-900 tracking-tight mb-12 italic text-center underline decoration-blue-600/30 decoration-8 underline-offset-8">Wawasan Terkait Lainnya</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="bg-white p-2 rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition-all group">
                        <a href="<?php echo e(route('blog.show', $rp->slug)); ?>" class="block aspect-video rounded-2xl overflow-hidden mb-6">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($rp->featured_image): ?>
                                <img src="<?php echo e(storage_url($rp->featured_image)); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <?php else: ?>
                                <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-300">
                                    <i class="fa-solid fa-image text-2xl"></i>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </a>
                        <div class="px-4 pb-6">
                            <h4 class="text-lg font-black text-slate-900 leading-tight mb-2 group-hover:text-blue-600 transition-colors">
                                <a href="<?php echo e(route('blog.show', $rp->slug)); ?>"><?php echo e($rp->title); ?></a>
                            </h4>
                            <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest"><?php echo e($rp->published_at->format('M d, Y')); ?></div>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</article>
<?php /**PATH C:\laravel\dirtech\resources\views/livewire/blog/detail.blade.php ENDPATH**/ ?>