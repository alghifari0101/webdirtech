<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($experience) > 0): ?>
    <div class="mb-4">
        <?php echo $__env->make('livewire.member.cv-templates.partials.section-title', ['title' => $labels['experience'], 'template' => $template, 'color' => $color ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $experience; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mb-3">
                <div class="flex justify-between items-baseline mb-1">
                    <h3 class="font-bold text-sm text-slate-900"><?php echo e($exp['company']); ?></h3>
                    <span class="text-sm font-bold text-slate-700 whitespace-nowrap"><?php echo e($exp['period']); ?></span>
                </div>
                <div class="flex justify-between items-baseline text-sm mb-1 gap-4">
                    <span class="text-slate-600 font-medium"><?php echo e($exp['position']); ?></span>
                    <span class="text-slate-500 whitespace-nowrap text-right flex-1"><?php echo e($exp['location'] ?? ''); ?></span>
                </div>
                <p class="text-sm mt-1 text-slate-700 leading-relaxed text-justify whitespace-pre-line"><?php echo e($exp['description']); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
<?php else: ?>
    <div class="mb-6">
        <?php echo $__env->make('livewire.member.cv-templates.partials.section-title', ['title' => $labels['experience'], 'template' => $template, 'color' => $color ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <p class="text-sm text-slate-400"><?php echo e($labels['no_exp']); ?></p>
    </div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH C:\laravel\dirtech\resources\views/livewire/member/cv-templates/partials/experience.blade.php ENDPATH**/ ?>