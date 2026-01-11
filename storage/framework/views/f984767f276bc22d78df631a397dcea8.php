<div x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-[100]">
    <div class="top-bar hidden md:block py-2 bg-slate-900 text-white text-xs border-b border-white/5">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <div class="top-contact flex items-center gap-6">
                <span class="flex items-center gap-2 opacity-80"><i class="fa-regular fa-envelope text-accent"></i> support@dirtech.web.id</span>
                <span class="flex items-center gap-2 opacity-80"><i class="fa-solid fa-phone text-accent"></i> +62 815-4110-8598</span>
            </div>
            <div class="top-socials flex gap-4">
                <a href="#" class="opacity-60 hover:opacity-100 transition-opacity" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="opacity-60 hover:opacity-100 transition-opacity" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" class="opacity-60 hover:opacity-100 transition-opacity" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="opacity-60 hover:opacity-100 transition-opacity" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar bg-white border-b border-slate-100 py-4 shadow-sm">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="/" class="brand text-2xl font-black text-slate-900 flex items-center gap-3 tracking-tighter">
                <span class="w-10 h-10 bg-primary text-white rounded-xl flex items-center justify-center shadow-lg shadow-primary/20"><i class="fa-solid fa-server"></i></span>
                DIRTECH
            </a>
            
            <div class="nav-links hidden lg:flex items-center gap-8">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request()->routeIs('member.*')): ?>
                    <a href="/" class="text-sm font-bold text-slate-600 hover:text-primary transition-colors">Beranda</a>
                    <a href="<?php echo e(route('member.dashboard')); ?>" class="text-sm font-bold <?php echo e(request()->routeIs('member.dashboard') ? 'text-accent' : 'text-slate-600 hover:text-primary'); ?> transition-colors">Dashboard</a>
                    <a href="<?php echo e(route('member.cv-editor')); ?>" class="text-sm font-bold <?php echo e(request()->routeIs('member.cv-editor') ? 'text-accent' : 'text-slate-600 hover:text-primary'); ?> transition-colors">Editor CV</a>
                    <a href="<?php echo e(route('member.cover-letter')); ?>" class="text-sm font-bold <?php echo e(request()->routeIs('member.cover-letter') ? 'text-accent' : 'text-slate-600 hover:text-primary'); ?> transition-colors">Surat Lamaran</a>
                    <a href="<?php echo e(route('member.profile')); ?>" class="text-sm font-bold <?php echo e(request()->routeIs('member.profile') ? 'text-accent' : 'text-slate-600 hover:text-primary'); ?> transition-colors">Pengaturan</a>
                <?php else: ?>
                    <a href="/" class="text-sm font-bold <?php echo e(request()->routeIs('home') ? 'text-accent' : 'text-slate-600 hover:text-primary'); ?> transition-colors">Beranda</a>
                    <div class="relative group">
                        <button class="flex items-center gap-1 text-sm font-bold <?php echo e(request()->routeIs('service.*') ? 'text-accent' : 'text-slate-600 hover:text-primary'); ?> transition-colors">
                            Layanan <i class="fa-solid fa-chevron-down text-[10px] opacity-50"></i>
                        </button>
                        <div class="absolute top-full left-0 w-64 bg-white border border-slate-100 shadow-2xl rounded-2xl py-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 mt-2">
                            <a href="/jasa/install-vps" class="block px-6 py-2.5 text-sm font-semibold hover:bg-slate-50 <?php echo e(request()->routeIs('service.vps') ? 'text-accent' : 'text-slate-700'); ?>">Jasa Install VPS</a>
                            <a href="/jasa/pembuatan-website" class="block px-6 py-2.5 text-sm font-semibold hover:bg-slate-50 <?php echo e(request()->routeIs('service.website') ? 'text-accent' : 'text-slate-700'); ?>">Pembuatan Website</a>
                            <a href="<?php echo e(route('service.migration')); ?>" class="block px-6 py-2.5 text-sm font-semibold hover:bg-slate-50 <?php echo e(request()->routeIs('service.migration') ? 'text-accent' : 'text-slate-700'); ?>">Migrasi Website</a>
                            <a href="<?php echo e(route('service.gmb')); ?>" class="block px-6 py-2.5 text-sm font-semibold hover:bg-slate-50 <?php echo e(request()->routeIs('service.gmb') ? 'text-accent' : 'text-slate-700'); ?>">Pembuatan Google Bisnis</a>
                            <a href="<?php echo e(route('service.cv')); ?>" class="block px-6 py-2.5 text-sm font-semibold hover:bg-slate-50 <?php echo e(request()->routeIs('service.cv') ? 'text-accent' : 'text-slate-700'); ?>">Jasa Bikin CV ATS</a>
                        </div>
                    </div>
                    <a href="#" class="text-sm font-bold text-slate-600 hover:text-primary transition-colors">Portofolio</a>
                    <a href="<?php echo e(route('blog')); ?>" class="text-sm font-bold <?php echo e(request()->routeIs('blog*') ? 'text-accent' : 'text-slate-600 hover:text-primary'); ?> transition-colors">Blog</a>
                    <a href="<?php echo e(route('contact')); ?>" class="text-sm font-bold <?php echo e(request()->routeIs('contact') ? 'text-accent' : 'text-slate-600 hover:text-primary'); ?> transition-colors">Kontak</a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="nav-actions flex items-center gap-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(auth()->user()->role === 'admin' ? route('admin.dashboard') : route('member.dashboard')); ?>" class="hidden md:flex px-6 py-3 bg-slate-900 text-white text-sm font-bold rounded-xl hover:bg-primary transition-all shadow-lg">Dashboard</a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="hidden md:flex text-sm font-bold text-slate-600 hover:text-primary transition-colors">Login</a>
                    <a href="<?php echo e(route('register')); ?>" class="hidden md:flex px-6 py-3 bg-primary text-white text-sm font-bold rounded-xl hover:bg-slate-800 transition-all shadow-lg shadow-primary/10">Daftar Akun</a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden w-11 h-11 flex items-center justify-center bg-slate-50 rounded-xl text-slate-600 hover:bg-slate-100 transition-colors" aria-label="Toggle mobile menu">
                    <i :class="mobileMenuOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars-staggered'" class="text-xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Drawer -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-full"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-full"
         class="lg:hidden absolute top-full left-0 w-full bg-white border-b border-slate-100 shadow-xl overflow-hidden" 
         style="display: none;">
        <div class="px-6 py-8 space-y-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request()->routeIs('member.*')): ?>
                <a href="/" class="block text-lg font-bold text-slate-900 border-b border-slate-50 pb-4">Beranda Utama</a>
                <a href="<?php echo e(route('member.dashboard')); ?>" class="block text-lg font-bold <?php echo e(request()->routeIs('member.dashboard') ? 'text-accent' : 'text-slate-900'); ?> border-b border-slate-50 pb-4">Dashboard</a>
                <a href="<?php echo e(route('member.cv-editor')); ?>" class="block text-lg font-bold <?php echo e(request()->routeIs('member.cv-editor') ? 'text-accent' : 'text-slate-900'); ?> border-b border-slate-50 pb-4">Editor CV ATS</a>
                <a href="<?php echo e(route('member.cover-letter')); ?>" class="block text-lg font-bold <?php echo e(request()->routeIs('member.cover-letter') ? 'text-accent' : 'text-slate-900'); ?> border-b border-slate-50 pb-4">Surat Lamaran</a>
                <a href="<?php echo e(route('member.profile')); ?>" class="block text-lg font-bold <?php echo e(request()->routeIs('member.profile') ? 'text-accent' : 'text-slate-900'); ?> border-b border-slate-50 pb-4">Pengaturan Profil</a>
            <?php else: ?>
                <a href="/" class="block text-lg font-bold text-slate-900 border-b border-slate-50 pb-4">Beranda</a>
                <div class="space-y-3 pt-2 border-b border-slate-50 pb-4">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Layanan Kami</p>
                    <a href="/jasa/install-vps" class="block text-sm font-semibold text-slate-600 hover:text-accent">Jasa Install VPS</a>
                    <a href="/jasa/pembuatan-website" class="block text-sm font-semibold text-slate-600 hover:text-accent">Pembuatan Website</a>
                    <a href="<?php echo e(route('service.migration')); ?>" class="block text-sm font-semibold text-slate-600 hover:text-accent">Migrasi Website</a>
                    <a href="<?php echo e(route('service.gmb')); ?>" class="block text-sm font-semibold text-slate-600 hover:text-accent">Pembuatan Google Bisnis</a>
                    <a href="<?php echo e(route('service.cv')); ?>" class="block text-sm font-semibold text-slate-600 hover:text-accent">Jasa Bikin CV ATS</a>
                </div>
                <a href="#" class="block text-lg font-bold text-slate-900 border-b border-slate-50 pb-4">Portofolio</a>
                <a href="<?php echo e(route('blog')); ?>" class="block text-lg font-bold text-slate-900 border-b border-slate-50 pb-4">Blog / Artikel</a>
                <a href="<?php echo e(route('contact')); ?>" class="block text-lg font-bold text-slate-900 border-b border-slate-50 pb-4">Kontak</a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="pt-6 space-y-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(auth()->user()->role === 'admin' ? route('admin.dashboard') : route('member.dashboard')); ?>" class="block w-full py-4 bg-slate-900 text-white text-center font-bold rounded-xl">Dashboard</a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="block w-full py-4 bg-slate-50 text-slate-600 text-center font-bold rounded-xl">Login</a>
                    <a href="<?php echo e(route('register')); ?>" class="block w-full py-4 bg-primary text-white text-center font-bold rounded-xl shadow-lg">Daftar Akun</a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laravel\dirtech\resources\views/components/header.blade.php ENDPATH**/ ?>