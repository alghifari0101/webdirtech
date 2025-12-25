<div>
    
    <section class="relative py-24 lg:py-40 overflow-hidden bg-slate-900">
        <div class="absolute inset-0 bg-grid-white/[0.02] -z-10"></div>
        <div class="absolute -top-[10%] -left-[5%] w-[400px] h-[400px] bg-blue-600/20 rounded-full blur-[100px] pointer-events-none"></div>
        
        <div class="container mx-auto px-6 relative z-10 text-center">
            <span class="inline-block px-4 py-1.5 bg-blue-600/10 text-blue-400 rounded-full text-xs font-black uppercase tracking-widest mb-6 border border-blue-500/20">Learning Center</span>
            <h1 class="text-5xl lg:text-7xl font-black text-white tracking-tighter mb-8 leading-[0.9]">
                Insights & <span class="text-blue-500 italic">Digital Stories</span>
            </h1>
            <p class="text-lg lg:text-xl text-slate-300 max-w-2xl mx-auto mb-12 font-medium">
                Temukan panduan mendalam dan strategi taktis untuk mengakselerasi pertumbuhan bisnis Anda di era digital.
            </p>

            <div class="max-w-xl mx-auto relative group">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari topik yang Anda minati..." 
                    class="w-full bg-white/5 border border-white/10 text-white rounded-2xl px-6 py-4 outline-none focus:ring-4 focus:ring-blue-600/20 focus:border-blue-600/50 transition-all font-medium placeholder:text-slate-500 shadow-2xl">
                <i class="fa-solid fa-magnifying-glass absolute right-6 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-blue-500 transition-colors"></i>
            </div>
        </div>
    </section>

    
    <section class="py-24 bg-white min-h-[600px]">
        <div class="container mx-auto px-6">
            
            <div class="flex flex-wrap items-center justify-center gap-3 mb-16">
                <button wire:click="$set('category', null)" 
                    class="px-6 py-2.5 rounded-xl font-bold text-sm transition-all <?php echo e(is_null($category) ? 'bg-slate-900 text-white shadow-xl shadow-slate-900/20' : 'bg-slate-50 text-slate-500 hover:bg-slate-100'); ?>">
                    Semua Topik
                </button>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button wire:click="$set('category', '<?php echo e($cat->slug); ?>')" 
                        class="px-6 py-2.5 rounded-xl font-bold text-sm transition-all <?php echo e($category === $cat->slug ? 'bg-blue-600 text-white shadow-xl shadow-blue-500/20' : 'bg-slate-50 text-slate-500 hover:bg-slate-100'); ?>">
                        <?php echo e($cat->name); ?>

                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <article class="group relative flex flex-col bg-white rounded-3xl border border-slate-100 overflow-hidden transition-all duration-500 shadow-sm">
                        <a href="<?php echo e(route('blog.show', $post->slug)); ?>" class="block aspect-[16/10] overflow-hidden relative">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->featured_image): ?>
                                <img src="<?php echo e(storage_url($post->featured_image)); ?>" alt="<?php echo e($post->title); ?>" width="600" height="375" loading="lazy" class="w-full h-full object-cover transition-transform duration-700">
                            <?php else: ?>
                                <div class="w-full h-full bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center">
                                    <i class="fa-solid fa-image text-4xl text-slate-300"></i>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <div class="absolute top-4 left-4">
                                <span class="px-4 py-1.5 bg-white/90 backdrop-blur-md text-blue-600 rounded-full text-[10px] font-black uppercase tracking-wider shadow-sm">
                                    <?php echo e($post->category->name); ?>

                                </span>
                            </div>
                        </a>

                        <div class="p-8 flex-1 flex flex-col">
                            <div class="flex items-center gap-3 mb-4 text-xs font-bold text-slate-400">
                                <span><?php echo e($post->published_at->format('M d, Y')); ?></span>
                                <span class="w-1 h-1 rounded-full bg-slate-200"></span>
                                <span>10 Min Read</span>
                            </div>
                            <h3 class="text-2xl font-black text-slate-900 mb-4 leading-tight transition-colors">
                                <a href="<?php echo e(route('blog.show', $post->slug)); ?>"><?php echo e($post->title); ?></a>
                            </h3>
                            <p class="text-slate-500 text-sm leading-relaxed mb-8 line-clamp-3">
                                <?php echo e($post->excerpt ?: Str::limit(strip_tags($post->content), 120)); ?>

                            </p>
                            <div class="mt-auto pt-6 border-t border-slate-50">
                                <a href="<?php echo e(route('blog.show', $post->slug)); ?>" class="text-slate-900 font-black text-sm uppercase tracking-widest flex items-center gap-2 transition-all">
                                    Pelajari Selengkapnya <i class="fa-solid fa-arrow-right text-xs text-blue-600"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full py-24 text-center">
                        <div class="text-7xl mb-6 text-slate-100">
                            <i class="fa-solid fa-inbox"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-400 italic">Belum ada artikel di topik ini.</h3>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="mt-20">
                <?php echo e($posts->links()); ?>

            </div>
        </div>
    </section>
</div>
<?php /**PATH C:\laravel\dirtech\resources\views/livewire/blog/index.blade.php ENDPATH**/ ?>