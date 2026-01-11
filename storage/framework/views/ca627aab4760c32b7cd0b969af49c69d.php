<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($skills) > 0 && !empty($skills[0])): ?>
    <div class="mb-6">
        <?php echo $__env->make('livewire.member.cv-templates.partials.section-title', ['title' => $labels['skills'], 'template' => $template, 'color' => $color ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <p class="text-sm text-slate-700 leading-relaxed"><?php echo e(implode(', ', array_filter($skills))); ?></p>
    </div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH C:\laravel\dirtech\resources\views/livewire/member/cv-templates/partials/skills.blade.php ENDPATH**/ ?>