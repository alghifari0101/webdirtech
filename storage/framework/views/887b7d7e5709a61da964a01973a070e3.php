<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($projects) > 0): ?>
    <div class="mb-6">
        <?php echo $__env->make('livewire.member.cv-templates.partials.section-title', ['title' => $labels['projects'] ?? 'Projects', 'template' => $template, 'color' => $color ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mb-4">
                <div class="flex justify-between items-baseline mb-1">
                    <h3 class="font-bold text-sm text-slate-900"><?php echo e($project['name']); ?></h3>
                    <span class="text-sm font-bold text-slate-700"><?php echo e($project['period']); ?></span>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($project['link'])): ?>
                    <div class="text-sm text-blue-600 mb-1"><?php echo e($project['link']); ?></div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <p class="text-sm mt-1 text-slate-700 leading-relaxed text-justify whitespace-pre-line"><?php echo e($project['description']); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH C:\laravel\dirtech\resources\views/livewire/member/cv-templates/partials/projects.blade.php ENDPATH**/ ?>