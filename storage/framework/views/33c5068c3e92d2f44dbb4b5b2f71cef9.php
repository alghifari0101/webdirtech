<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($template ?? '') === 'modern'): ?>
    <h2 class="text-sm font-bold uppercase mb-4 pb-1 border-b-2 border-blue-600 text-blue-700 tracking-wider">
        <?php echo e($title); ?>

    </h2>
<?php else: ?>
    <h2 class="text-base font-bold uppercase mb-4 px-4 py-2 inline-block w-full text-white" 
        style="background-color: <?php echo e($color ?? '#222222'); ?>; border-bottom: 2pt solid <?php echo e($color ?? '#222222'); ?>;">
        <?php echo e($title); ?>

    </h2>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH C:\laravel\dirtech\resources\views/livewire/member/cv-templates/partials/section-title.blade.php ENDPATH**/ ?>