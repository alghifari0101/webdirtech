<div class="" 
     style="font-family: Arial, Helvetica, sans-serif; background-color: #2E004B; color: #ffffff; margin-left: calc(-1 * var(--cv-pad-x)); margin-right: calc(-1 * var(--cv-pad-x)); margin-top: calc(-1 * var(--cv-pad-y)); padding: 10mm 15mm; margin-bottom: 25px; min-height: 45mm;">
    <div class="flex items-center justify-between gap-6">
        <div class="flex-1">
            <h1 class="text-4xl font-bold mb-3 tracking-tight leading-none" style="color: #ffffff;"><?php echo e($data['full_name'] ?: $labels['placeholder_name']); ?></h1>
            <div class="text-sm space-y-1 opacity-90">
                <p><?php echo e($data['email'] ?: $labels['placeholder_email']); ?> | <?php echo e($data['phone'] ?: $labels['placeholder_phone']); ?></p>
                <p>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($data['linkedin'])): ?> <?php echo e($data['linkedin']); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(!empty($data['linkedin']) && !empty($data['website'])): ?> | <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($data['website'])): ?> <?php echo e($data['website']); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </p>
                <p class="uppercase tracking-wider"><?php echo e($data['location'] ?: ($data['language'] === 'en' ? 'City, Country' : 'Kota, Negara')); ?></p>
            </div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($photo || $data['photo_path']): ?>
        <div class="w-32 h-32 border-4 border-white rounded-none shadow-xl overflow-hidden bg-white flex-shrink-0">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($photo): ?>
                <img src="<?php echo e($photo->temporaryUrl()); ?>" class="w-full h-full object-cover">
            <?php else: ?>
                <img src="<?php echo e(asset('storage/' . $data['photo_path'])); ?>" class="w-full h-full object-cover">
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($data['summary']): ?>
    <div class="mb-4">
        <?php echo $__env->make('livewire.member.cv-templates.partials.section-title', ['title' => $labels['summary'], 'template' => 'premium-ats', 'color' => '#2E004B'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <p class="text-sm text-slate-700 text-justify leading-relaxed"><?php echo e($data['summary']); ?></p>
    </div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php echo $__env->make('livewire.member.cv-templates.partials.education', ['education' => $data['education'], 'labels' => $labels, 'template' => 'premium-ats', 'color' => '#2E004B'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('livewire.member.cv-templates.partials.experience', ['experience' => $data['experience'], 'labels' => $labels, 'template' => 'premium-ats', 'color' => '#2E004B'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('livewire.member.cv-templates.partials.organization', ['organizations' => $data['organizations'], 'labels' => $labels, 'template' => 'premium-ats', 'color' => '#2E004B'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('livewire.member.cv-templates.partials.skills', ['skills' => $data['skills'], 'labels' => $labels, 'template' => 'premium-ats', 'color' => '#2E004B'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('livewire.member.cv-templates.partials.languages', ['languages' => $data['languages'], 'labels' => $labels, 'template' => 'premium-ats', 'color' => '#2E004B'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('livewire.member.cv-templates.partials.projects', ['projects' => $data['projects'], 'labels' => $labels, 'template' => 'premium-ats', 'color' => '#2E004B'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>
<?php /**PATH C:\laravel\dirtech\resources\views/livewire/member/cv-templates/premium_ats.blade.php ENDPATH**/ ?>