<div>
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Stat Card 1 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-5">
            <div class="w-12 h-12 rounded-xl bg-rose-100 text-rose-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-newspaper"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500">Artikel Blog</p>
                <h3 class="text-2xl font-bold text-slate-800"><?php echo e($stats['total_posts']); ?></h3>
            </div>
        </div>

        <!-- Stat Card 2 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-5">
            <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-terminal"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500">Install VPS</p>
                <h3 class="text-2xl font-bold text-slate-800"><?php echo e($stats['vps_requests']); ?></h3>
            </div>
        </div>

        <!-- Stat Card 3 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-5">
            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-globe"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500">Proyek Web</p>
                <h3 class="text-2xl font-bold text-slate-800"><?php echo e($stats['website_projects']); ?></h3>
            </div>
        </div>

        <!-- Stat Card 4 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-5">
            <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-users"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500">Klien Aktif</p>
                <h3 class="text-2xl font-bold text-slate-800"><?php echo e($stats['active_clients']); ?></h3>
            </div>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Ask Table -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 flex justify-between items-center">
                <h3 class="font-outfit font-bold text-lg text-slate-800">Artikel Blog Terbaru</h3>
                <a href="<?php echo e(route('admin.posts')); ?>" class="text-primary text-sm font-semibold hover:underline">Lihat Semua</a>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $recent_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="flex items-start gap-4 p-3 rounded-lg hover:bg-slate-50 transition-colors border-l-4 border-rose-500">
                            <div class="flex-1">
                                <h4 class="font-bold text-slate-800 line-clamp-1"><?php echo e($post->title); ?></h4>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2"><?php echo e(Str::limit(strip_tags($post->content), 100)); ?></p>
                            </div>
                            <span class="text-xs text-slate-400 whitespace-nowrap"><?php echo e($post->created_at->diffForHumans()); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-center text-slate-400 py-4 italic">Belum ada artikel blog.</p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>

        <!-- System Updates / Info -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100">
                <h3 class="font-outfit font-bold text-lg text-slate-800">Informasi Sistem</h3>
            </div>
            <div class="p-6">
                <div class="space-y-6">
                    <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
                        <div class="flex items-center gap-3 mb-2">
                            <i class="fa-solid fa-circle-info text-blue-500"></i>
                            <h4 class="font-bold text-slate-800">Selamat Datang di Administrator Dirtech</h4>
                        </div>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Gunakan panel ini untuk mengelola konten website, memantau permintaan layanan, dan melihat statistik performa bisnis secara terpadu.
                        </p>
                    </div>

                    <div class="flex items-center gap-4 text-sm text-slate-600">
                        <div class="flex-1 p-4 bg-rose-50 rounded-xl border border-rose-100">
                            <p class="font-bold text-rose-800 mb-1">Status Server</p>
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span class="text-emerald-700 font-medium">Optimal</span>
                            </div>
                        </div>
                        <div class="flex-1 p-4 bg-blue-50 rounded-xl border border-blue-100">
                            <p class="font-bold text-blue-800 mb-1">Backup Terakhir</p>
                            <p class="text-blue-700 font-medium">2 jam yang lalu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laravel\dirtech\resources\views/livewire/admin/dashboard.blade.php ENDPATH**/ ?>