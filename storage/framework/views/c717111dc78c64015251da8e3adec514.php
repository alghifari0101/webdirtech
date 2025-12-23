<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($paginator->hasPages()): ?>
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center">
        <ul class="flex flex-wrap gap-2">
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($paginator->onFirstPage()): ?>
                <li class="page-item disabled" aria-disabled="true">
                    <span class="w-[45px] h-[45px] flex items-center justify-center rounded-xl bg-slate-50 text-slate-300 border border-slate-100 font-bold">
                        <i class="fa-solid fa-chevron-left"></i>
                    </span>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <?php
                        $prevPage = $paginator->currentPage() - 1;
                        $searchTerm = request()->route('search');
                        $url = $searchTerm 
                            ? ($prevPage == 1 ? route('ask.search', $searchTerm) : route('ask.search.page', [$searchTerm, $prevPage]))
                            : ($prevPage == 1 ? route('ask') : route('ask.page', $prevPage));
                    ?>
                    <a href="<?php echo e($url); ?>" 
                       class="w-[45px] h-[45px] flex items-center justify-center rounded-xl bg-white text-slate-900 border border-slate-100 font-bold hover:border-accent hover:text-accent transition-all">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>
                </li>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(is_string($element)): ?>
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="w-[45px] h-[45px] flex items-center justify-center rounded-xl bg-slate-50 text-slate-300 font-bold"><?php echo e($element); ?></span>
                    </li>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(is_array($element)): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $searchTerm = request()->route('search');
                            $pageUrl = $searchTerm
                                ? ($page == 1 ? route('ask.search', $searchTerm) : route('ask.search.page', [$searchTerm, $page]))
                                : ($page == 1 ? route('ask') : route('ask.page', $page));
                        ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($page == $paginator->currentPage()): ?>
                            <li class="page-item active" aria-current="page">
                                <span class="w-[45px] h-[45px] flex items-center justify-center rounded-xl bg-accent text-white border border-accent font-bold">
                                    <?php echo e($page); ?>

                                </span>
                            </li>
                        <?php else: ?>
                            <li class="page-item">
                                <a href="<?php echo e($pageUrl); ?>" 
                                   class="w-[45px] h-[45px] flex items-center justify-center rounded-xl bg-white text-slate-900 border border-slate-100 font-bold">
                                    <?php echo e($page); ?>

                                </a>
                            </li>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($paginator->hasMorePages()): ?>
                <li class="page-item">
                    <?php
                        $nextPage = $paginator->currentPage() + 1;
                        $searchTerm = request()->route('search');
                        $nextUrl = $searchTerm 
                            ? route('ask.search.page', [$searchTerm, $nextPage])
                            : route('ask.page', $nextPage);
                    ?>
                    <a href="<?php echo e($nextUrl); ?>" 
                       class="w-[45px] h-[45px] flex items-center justify-center rounded-xl bg-white text-slate-900 border border-slate-100 font-bold hover:border-accent hover:text-accent transition-all">
                        <i class="fa-solid fa-chevron-right"></i>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item disabled" aria-disabled="true">
                    <span class="w-[45px] h-[45px] flex items-center justify-center rounded-xl bg-slate-50 text-slate-300 border border-slate-100 font-bold">
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>
                </li>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </ul>
    </nav>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH C:\laravel\dirtech\resources\views/vendor/pagination/ask-custom.blade.php ENDPATH**/ ?>