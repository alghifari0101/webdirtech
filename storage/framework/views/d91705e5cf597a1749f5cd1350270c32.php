<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('message')): ?>
        <div class="bg-emerald-50 border-emerald-500 text-emerald-900 px-6 py-4 border-b" role="alert">
            <p class="text-sm font-bold flex items-center gap-2">
                <i class="fa-solid fa-circle-check"></i>
                <?php echo e(session('message')); ?>

            </p>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(session()->has('error')): ?>
        <div class="bg-rose-50 border-rose-500 text-rose-900 px-6 py-4 border-b" role="alert">
            <p class="text-sm font-bold flex items-center gap-2">
                <i class="fa-solid fa-circle-xmark"></i>
                <?php echo e(session('error')); ?>

            </p>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="p-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8">
            <div>
                <h3 class="text-xl font-outfit font-bold text-slate-800 tracking-tight">Manajemen User</h3>
                <p class="text-slate-500 text-sm mt-1">Kelola akun administrator dan staff yang memiliki akses ke dashboard.</p>
            </div>
            <button wire:click="create()" class="w-full md:w-auto bg-primary hover:bg-rose-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg shadow-rose-200 transition-all flex items-center justify-center gap-2">
                <i class="fa-solid fa-user-plus text-sm"></i>
                Tambah User
            </button>
        </div>

        <!-- Search -->
        <div class="mb-6 max-w-md">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input wire:model.live.debounce.300ms="search" type="text" 
                    class="block w-full pl-10 pr-3 py-3 border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" 
                    placeholder="Cari user (nama atau email)...">
            </div>
        </div>

        <div class="overflow-x-auto rounded-xl border border-slate-100">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 hidden md:table-row">
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-100">User</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-100">Role</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-100">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-100 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr wire:key="user-<?php echo e($user->id); ?>" class="hover:bg-slate-50 transition-colors flex flex-col md:table-row p-4 md:p-0 border-b md:border-b-0 border-slate-100">
                            <td class="px-0 md:px-6 py-2 md:py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center font-bold text-sm">
                                        <?php echo e(strtoupper(substr($user->name, 0, 2))); ?>

                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-800"><?php echo e($user->name); ?></div>
                                        <div class="text-xs text-slate-500"><?php echo e($user->email); ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-0 md:px-6 py-2 md:py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold <?php echo e($user->role === 'admin' ? 'bg-amber-100 text-amber-700' : ($user->role === 'member' ? 'bg-indigo-100 text-indigo-700' : 'bg-slate-100 text-slate-600')); ?>">
                                    <?php echo e(ucfirst($user->role)); ?>

                                </span>
                            </td>
                            <td class="px-0 md:px-6 py-2 md:py-4">
                                <button wire:click="toggleStatus(<?php echo e($user->id); ?>)" class="px-3 py-1 rounded-full text-xs font-bold transition-all <?php echo e($user->is_active ? 'bg-emerald-100 text-emerald-700 hover:bg-emerald-200' : 'bg-rose-100 text-rose-700 hover:bg-rose-200'); ?>">
                                    <?php echo e($user->is_active ? 'Aktif' : 'Pending/Nonaktif'); ?>

                                </button>
                            </td>
                            <td class="px-0 md:px-6 py-4 md:py-4 text-left md:text-center mt-2 md:mt-0 border-t md:border-t-0 border-slate-50 pt-4 md:pt-4">
                                <div class="flex justify-start md:justify-center items-center gap-2">
                                    <button wire:click="edit(<?php echo e($user->id); ?>)" class="p-3 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
                                        <i class="fa-solid fa-pen-to-square text-lg"></i>
                                    </button>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->id !== auth()->id()): ?>
                                        <button wire:click="delete(<?php echo e($user->id); ?>)" 
                                            onclick="confirm('Apakah Anda yakin ingin menghapus user ini?') || event.stopImmediatePropagation()"
                                            class="p-3 text-rose-600 hover:bg-rose-50 rounded-lg transition-colors" title="Hapus">
                                            <i class="fa-solid fa-trash-can text-lg"></i>
                                        </button>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3" class="px-6 py-10 text-center text-slate-400 italic">Data user tidak ditemukan.</td>
                        </tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <?php echo e($users->links()); ?>

        </div>
    </div>

    <!-- Modal -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isOpen): ?>
        <div class="fixed inset-0 z-[60] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-slate-900 bg-opacity-75 transition-opacity" aria-hidden="true" wire:click="closeModal"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-slate-200">
                    <form wire:submit.prevent="store">
                        <div class="bg-white px-8 pt-8 pb-6">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-xl font-outfit font-bold text-slate-800" id="modal-title">
                                    <?php echo e($isEdit ? 'Update User' : 'Tambah User Baru'); ?>

                                </h3>
                                <button type="button" wire:click="closeModal" class="text-slate-400 hover:text-slate-600">
                                    <i class="fa-solid fa-xmark text-lg"></i>
                                </button>
                            </div>

                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                                    <input type="text" wire:model="form.name" 
                                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                        placeholder="Masukkan nama lengkap">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['form.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-rose-600 text-xs mt-1 block font-medium"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Email</label>
                                    <input type="email" wire:model="form.email" 
                                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                        placeholder="nama@email.com">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['form.email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-rose-600 text-xs mt-1 block font-medium"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Password <?php echo e($isEdit ? '(Kosongkan jika tidak ingin diubah)' : ''); ?></label>
                                    <input type="password" wire:model="form.password" 
                                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                        placeholder="Minimal 6 karakter">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['form.password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-rose-600 text-xs mt-1 block font-medium"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Role / Akses</label>
                                    <select wire:model="form.role" 
                                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all appearance-none">
                                        <option value="member">Member (Layanan CV)</option>
                                        <option value="user">User / Staff</option>
                                        <option value="admin">Administrator</option>
                                    </select>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['form.role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-rose-600 text-xs mt-1 block font-medium"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                <div class="flex items-center gap-3 bg-slate-50 p-4 rounded-xl border border-slate-100">
                                    <div class="flex-1">
                                        <h4 class="text-sm font-bold text-slate-700">Status Aktivasi</h4>
                                        <p class="text-xs text-slate-500">Aktifkan untuk memberikan akses dashboard.</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" wire:model="form.is_active" class="sr-only peer">
                                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="bg-slate-50 px-8 py-6 flex flex-row-reverse gap-3">
                            <button type="submit" 
                                class="inline-flex justify-center px-6 py-2.5 bg-primary text-white text-sm font-bold rounded-xl shadow-lg shadow-rose-200 hover:bg-rose-700 transition-all">
                                <?php echo e($isEdit ? 'Update Akun' : 'Selesaikan & Buat'); ?>

                            </button>
                            <button type="button" wire:click="closeModal" 
                                class="inline-flex justify-center px-6 py-2.5 bg-white border border-slate-200 text-slate-700 text-sm font-bold rounded-xl hover:bg-slate-50 transition-all">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH C:\laravel\dirtech\resources\views/livewire/admin/user-manager.blade.php ENDPATH**/ ?>