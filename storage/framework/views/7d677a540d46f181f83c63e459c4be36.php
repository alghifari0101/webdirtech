<div style="font-family: Arial, Helvetica, sans-serif;">
<?php echo $__env->make('livewire.member.cv-templates.partials.header-info', ['template' => 'modern'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($data['summary']): ?>
    <div class="mb-6">
        <?php echo $__env->make('livewire.member.cv-templates.partials.section-title', ['title' => $labels['summary'], 'template' => 'modern'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <p class="text-sm text-justify"><?php echo e($data['summary']); ?></p>
    </div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php echo $__env->make('livewire.member.cv-templates.partials.experience', ['experience' => $data['experience'], 'labels' => $labels, 'template' => 'modern'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('livewire.member.cv-templates.partials.education', ['education' => $data['education'], 'labels' => $labels, 'template' => 'modern'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('livewire.member.cv-templates.partials.projects', ['projects' => $data['projects'], 'labels' => $labels, 'template' => 'modern'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('livewire.member.cv-templates.partials.skills', ['skills' => $data['skills'], 'labels' => $labels, 'template' => 'modern'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('livewire.member.cv-templates.partials.languages', ['languages' => $data['languages'], 'labels' => $labels, 'template' => 'modern'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('livewire.member.cv-templates.partials.organization', ['organizations' => $data['organizations'], 'labels' => $labels, 'template' => 'modern'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>
<?php /**PATH C:\laravel\dirtech\resources\views/livewire/member/cv-templates/modern.blade.php ENDPATH**/ ?>