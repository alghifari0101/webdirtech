<div class="<?php echo e(in_array($template, ['elegant', 'modern']) ? 'text-left' : 'text-center'); ?> <?php echo e($template === 'elegant' ? 'border-l-8 border-slate-900 pl-6' : ''); ?> <?php echo e($template === 'modern' ? 'border-b-2 border-blue-600 pb-4' : ''); ?> mb-8">
    <h1 class="text-3xl font-bold uppercase tracking-wide mb-2 <?php echo e($template === 'modern' ? 'text-blue-700' : ''); ?>">
        <?php echo e($data['full_name'] ?: $labels['placeholder_name']); ?>

    </h1>
    <p class="text-sm <?php echo e($template === 'modern' ? 'text-slate-600' : ''); ?>">
        <?php echo e($data['email'] ?: $labels['placeholder_email']); ?> | 
        <?php echo e($data['phone'] ?: $labels['placeholder_phone']); ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($data['linkedin'])): ?> | <?php echo e($data['linkedin']); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($data['website'])): ?> | <?php echo e($data['website']); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        | <?php echo e($data['location'] ?: ($data['language'] === 'en' ? 'City, Country' : 'Kota, Negara')); ?>

    </p>
</div>
<?php /**PATH C:\laravel\dirtech\resources\views/livewire/member/cv-templates/partials/header-info.blade.php ENDPATH**/ ?>