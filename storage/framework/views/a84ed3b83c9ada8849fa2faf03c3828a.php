<footer class="footer bg-[#020617] text-slate-400 py-20 relative overflow-hidden">
    
    <div class="absolute top-0 left-0 w-full h-full opacity-5 pointer-events-none">
        <?php if (isset($component)) { $__componentOriginalb9d51b42aeea464496200e7ff8533c14 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9d51b42aeea464496200e7ff8533c14 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dotted-map','data' => ['class' => 'w-full h-full object-cover']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dotted-map'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full h-full object-cover']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9d51b42aeea464496200e7ff8533c14)): ?>
<?php $attributes = $__attributesOriginalb9d51b42aeea464496200e7ff8533c14; ?>
<?php unset($__attributesOriginalb9d51b42aeea464496200e7ff8533c14); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9d51b42aeea464496200e7ff8533c14)): ?>
<?php $component = $__componentOriginalb9d51b42aeea464496200e7ff8533c14; ?>
<?php unset($__componentOriginalb9d51b42aeea464496200e7ff8533c14); ?>
<?php endif; ?>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-20 mb-16">
            
            <div class="space-y-6">
                <a href="/" class="text-2xl font-black text-white flex items-center gap-3 tracking-tighter">
                    <span class="w-10 h-10 bg-primary border border-white/10 text-white rounded-xl flex items-center justify-center shadow-xl"><i class="fa-solid fa-server"></i></span>
                    DIRTECH
                </a>
                <p class="text-sm leading-relaxed opacity-70">
                    Partner teknologi terpercaya untuk solusi VPS, Website, dan Digital Marketing bisnis Anda. Kami bantu Anda bertumbuh di era digital.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white/10 transition-colors"><i class="fa-brands fa-facebook-f text-sm"></i></a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white/10 transition-colors"><i class="fa-brands fa-instagram text-sm"></i></a>
                </div>
            </div>

            
            <div>
                <h4 class="text-white font-bold mb-8 uppercase tracking-widest text-xs">Layanan Kami</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="/layanan/install-vps" class="hover:text-white transition-colors">Jasa Install VPS</a></li>
                    <li><a href="/layanan/pembuatan-website" class="hover:text-white transition-colors">Pembuatan Website</a></li>
                    <li><a href="<?php echo e(route('service.migration')); ?>" class="hover:text-white transition-colors">Migrasi Website</a></li>
                    <li><a href="<?php echo e(route('service.gmb')); ?>" class="hover:text-white transition-colors">Pembuatan Google Bisnis</a></li>
                </ul>
            </div>

            
            <div>
                <h4 class="text-white font-bold mb-8 uppercase tracking-widest text-xs">Dukungan</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a></li>
                    <li><a href="<?php echo e(route('ask')); ?>" class="hover:text-white transition-colors">FAQ / Ask</a></li>
                    <li><a href="<?php echo e(route('contact')); ?>" class="hover:text-white transition-colors">Hubungi Kami</a></li>
                </ul>
            </div>

            
            <div>
                <h4 class="text-white font-bold mb-8 uppercase tracking-widest text-xs">Kontak</h4>
                <ul class="space-y-6 text-sm">
                    <li class="flex gap-4">
                        <i class="fa-solid fa-location-dot text-accent mt-1"></i>
                        <span><?php echo e(config('contact.address', 'Jakarta, Indonesia')); ?></span>
                    </li>
                    <li class="flex gap-4">
                        <i class="fa-solid fa-phone text-accent mt-1"></i>
                        <a href="https://wa.me/<?php echo e(config('contact.whatsapp')); ?>" class="hover:text-white transition-colors font-bold text-white">+<?php echo e(config('contact.whatsapp', '628123456789')); ?></a>
                    </li>
                    <li class="flex gap-4">
                        <i class="fa-solid fa-envelope text-accent mt-1"></i>
                        <a href="mailto:<?php echo e(config('contact.email')); ?>" class="hover:text-white transition-colors"><?php echo e(config('contact.email', 'support@dirtech.web.id')); ?></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="pt-8 border-t border-white/5 flex flex-wrap justify-between items-center gap-4 text-xs">
            <p>&copy; <?php echo e(date('Y')); ?> Dirtech Solutions. All rights reserved.</p>
            <div class="flex gap-6">
                <a href="#" class="hover:text-white transition-colors">Sitemap</a>
                <a href="#" class="hover:text-white transition-colors">Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH C:\laravel\dirtech\resources\views/components/footer.blade.php ENDPATH**/ ?>