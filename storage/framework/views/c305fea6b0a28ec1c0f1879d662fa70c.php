<div class="py-12 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="mb-8 flex justify-between items-end">
            <div>
                <h1 class="text-3xl font-bold text-slate-900 mb-2">Verifikasi Pembayaran</h1>
                <p class="text-slate-600 italic">Daftar bukti transfer yang perlu diperiksa dan disetujui.</p>
            </div>
            <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-wallet"></i>
                </div>
                <div>
                    <p class="text-xs text-slate-400 uppercase tracking-wider">Total Penjualan</p>
                    <p class="text-lg font-bold text-slate-900">Rp <?php echo e(number_format(\App\Models\Payment::where('status', 'approved')->sum('amount'), 0, ',', '.')); ?></p>
                </div>
            </div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('success')): ?>
            <div class="mb-6 p-4 bg-emerald-50 text-emerald-800 rounded-2xl border border-emerald-100 flex items-center gap-3">
                <i class="fa-solid fa-circle-check"></i>
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(session()->has('error')): ?>
            <div class="mb-6 p-4 bg-rose-50 text-rose-800 rounded-2xl border border-rose-100 flex items-center gap-3">
                <i class="fa-solid fa-circle-xmark"></i>
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-8 py-5 text-xs font-bold text-slate-400 uppercase tracking-wider">User</th>
                        <th class="px-8 py-5 text-xs font-bold text-slate-400 uppercase tracking-wider">Waktu</th>
                        <th class="px-8 py-5 text-xs font-bold text-slate-400 uppercase tracking-wider">Nominal</th>
                        <th class="px-8 py-5 text-xs font-bold text-slate-400 uppercase tracking-wider">Bukti</th>
                        <th class="px-8 py-5 text-xs font-bold text-slate-400 uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 bg-slate-200 rounded-full flex items-center justify-center font-bold text-slate-600">
                                        <?php echo e(substr($payment->user->name, 0, 1)); ?>

                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-900"><?php echo e($payment->user->name); ?></p>
                                        <p class="text-xs text-slate-500"><?php echo e($payment->user->email); ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-sm text-slate-600">
                                <?php echo e($payment->created_at->diffForHumans()); ?>

                            </td>
                            <td class="px-8 py-6 font-bold text-slate-900 font-mono">
                                Rp <?php echo e(number_format($payment->amount, 0, ',', '.')); ?>

                            </td>
                            <td class="px-8 py-6">
                                <button onclick="window.open('<?php echo e(Storage::url($payment->proof_path)); ?>', '_blank')" class="text-blue-600 hover:text-blue-800 text-sm font-bold flex items-center gap-2">
                                    <i class="fa-solid fa-image"></i> Lihat Bukti
                                </button>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex justify-end gap-2">
                                    <button wire:click="reject(<?php echo e($payment->id); ?>)" class="px-4 py-2 bg-rose-50 text-rose-600 rounded-xl text-xs font-bold hover:bg-rose-100 transition-colors">
                                        Tolak
                                    </button>
                                    <button wire:click="approve(<?php echo e($payment->id); ?>)" class="px-4 py-2 bg-emerald-50 text-emerald-600 rounded-xl text-xs font-bold hover:bg-emerald-100 transition-colors">
                                        Approve
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="px-8 py-12 text-center">
                                <div class="max-w-xs mx-auto text-slate-400">
                                    <i class="fa-solid fa-mug-hot text-4xl mb-4"></i>
                                    <p class="font-bold">Belum ada pembayaran pending.</p>
                                    <p class="text-xs mt-1">Santai dulu sejenak sambil menunggu orderan masuk.</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH C:\laravel\dirtech\resources\views/livewire/admin/payment-verification.blade.php ENDPATH**/ ?>