<div class="py-12 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <div class="mb-10 flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-outfit font-extrabold text-slate-900">Pengaturan Profil</h1>
                    <p class="text-slate-500 mt-2">Kelola informasi akun dan keamanan Anda.</p>
                </div>
                <a href="<?php echo e(route('member.dashboard')); ?>" class="flex items-center gap-2 text-slate-500 hover:text-slate-800 font-bold transition-all text-sm">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
                </a>
            </div>

            <div class="grid grid-cols-1 gap-8">
                <!-- Informasi Dasar -->
                <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-10">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-primary/10 text-primary rounded-2xl flex items-center justify-center text-xl shadow-inner">
                            <i class="fa-solid fa-user-gear"></i>
                        </div>
                        <h2 class="text-xl font-bold text-slate-800">Informasi Dasar</h2>
                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('success')): ?>
                        <div class="mb-6 p-4 bg-emerald-50 text-emerald-800 rounded-2xl border border-emerald-100 flex items-center gap-3">
                            <i class="fa-solid fa-circle-check"></i>
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <form wire:submit="updateProfile" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 ml-1">Nama Lengkap</label>
                                <input type="text" wire:model="name" class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl text-slate-800 outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-xs text-rose-500 ml-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 ml-1">Email</label>
                                <input type="email" wire:model="email" class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl text-slate-800 outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-xs text-rose-500 ml-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 ml-1">Nomor WhatsApp / HP</label>
                                <input type="text" wire:model="phone" class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl text-slate-800 outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" placeholder="Contoh: 08123456789">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-xs text-rose-500 ml-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit" class="px-8 py-4 bg-slate-900 text-white font-bold rounded-2xl hover:bg-primary transition-all shadow-xl shadow-slate-200/50 active:scale-95">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Update Password -->
                <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-10">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center text-xl shadow-inner">
                            <i class="fa-solid fa-key"></i>
                        </div>
                        <h2 class="text-xl font-bold text-slate-800">Keamanan & Password</h2>
                    </div>

                    <?php if(session()->has('success_password')): ?>
                        <div class="mb-6 p-4 bg-emerald-50 text-emerald-800 rounded-2xl border border-emerald-100 flex items-center gap-3">
                            <i class="fa-solid fa-circle-check"></i>
                            <?php echo e(session('success_password')); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <form wire:submit="updatePassword" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 ml-1">Password Baru</label>
                                <input type="password" wire:model="password" class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl text-slate-800 outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" placeholder="Aturan min. 8 karakter">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-xs text-rose-500 ml-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 ml-1">Konfirmasi Password Baru</label>
                                <input type="password" wire:model="password_confirmation" class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl text-slate-800 outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                            </div>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit" class="px-8 py-4 bg-amber-500 text-white font-bold rounded-2xl hover:bg-amber-600 transition-all shadow-xl shadow-amber-100/50 active:scale-95">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laravel\dirtech\resources\views/livewire/member/profile.blade.php ENDPATH**/ ?>