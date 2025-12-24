<div class="p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900 italic">Manajemen <span class="text-blue-600 underline">Kategori</span></h1>
        <p class="text-slate-500 text-sm">Kelola kategori untuk mengelompokkan artikel blog Anda.</p>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('message')): ?>
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-600 rounded-xl font-bold flex items-center gap-3">
            <i class="fa-solid fa-circle-check"></i> <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(session()->has('error')): ?>
        <div class="mb-6 p-4 bg-rose-50 border border-rose-100 text-rose-600 rounded-xl font-bold flex items-center gap-3">
            <i class="fa-solid fa-circle-xmark"></i> <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="md:col-span-1">
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                <h2 class="text-sm font-black text-slate-900 uppercase tracking-widest mb-4">
                    <?php echo e($editingId ? 'Edit' : 'Tambah'); ?> Kategori
                </h2>
                <form wire:submit="save" class="space-y-4">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Nama Kategori</label>
                        <input type="text" wire:model="name" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition-all font-bold text-slate-900" placeholder="Contoh: Digital Marketing">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-rose-500 text-xs font-bold"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div class="flex gap-3">
                        <button type="submit" class="flex-1 bg-blue-600 text-white font-bold py-3 rounded-xl shadow-lg shadow-blue-500/20 hover:bg-blue-700 transition-all">
                            <?php echo e($editingId ? 'Update' : 'Simpan'); ?>

                        </button>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($editingId): ?>
                            <button type="button" wire:click="$set('editingId', null); $set('name', '')" class="px-4 py-3 bg-slate-100 text-slate-500 font-bold rounded-xl">
                                Batal
                            </button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

        <div class="md:col-span-2">
            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">Nama Kategori</th>
                            <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">Slug</th>
                            <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest text-center">Artikel</th>
                            <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-slate-50/50 transition-colors pointer-events-none">
                                <td class="px-6 py-4 font-bold text-slate-900"><?php echo e($category->name); ?></td>
                                <td class="px-6 py-4 text-sm text-slate-400 font-mono"><?php echo e($category->slug); ?></td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-2 py-0.5 bg-slate-100 text-slate-600 rounded text-[10px] font-bold">
                                        <?php echo e($category->posts_count); ?>

                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right pointer-events-auto">
                                    <div class="flex justify-end gap-2">
                                        <button wire:click="edit(<?php echo e($category->id); ?>)" class="p-2 text-slate-400 hover:text-blue-600 transition-colors">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button onclick="confirm('Hapus kategori ini? Pekerjaan ini tidak bisa dibatalkan.') || event.stopImmediatePropagation()" wire:click="delete(<?php echo e($category->id); ?>)" class="p-2 text-slate-400 hover:text-rose-600 transition-colors">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-slate-400 italic font-medium">Belum ada kategori.</td>
                            </tr>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laravel\dirtech\resources\views/livewire/admin/category-manager.blade.php ENDPATH**/ ?>