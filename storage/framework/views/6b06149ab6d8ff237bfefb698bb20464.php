<div class="py-12 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-4 max-w-4xl">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900 mb-2">Aktivasi Fitur Premium</h1>
            <p class="text-slate-600 italic">Buka akses semua template dan fitur download selama <strong>1 bulan</strong> hanya dengan Rp 19.000 saja.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Bank Info -->
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
                <h2 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-university text-primary"></i> Detail Rekening
                </h2>
                
                <div class="space-y-6">
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 border-dashed">
                        <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Bank BCA</p>
                        <p class="text-xl font-bold text-slate-900">123 456 7890</p>
                        <p class="text-sm text-slate-600">a.n. Dirtech Solution</p>
                    </div>

                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 border-dashed">
                        <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">DANA / LinkAja</p>
                        <p class="text-xl font-bold text-slate-900">0812 3456 7890</p>
                        <p class="text-sm text-slate-600">a.n. Dirtech Digital</p>
                    </div>

                    <div class="flex items-start gap-4 p-4 bg-blue-50 rounded-2xl">
                        <i class="fa-solid fa-circle-info text-blue-600 mt-1"></i>
                        <p class="text-sm text-blue-800 leading-relaxed">
                            <strong>Penting:</strong> Pastikan nominal transfer sesuai (Rp 19.000). Admin akan melakukan verifikasi maksimal 1x24 jam.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Status / Upload -->
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
                <h2 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-receipt text-primary"></i> Bukti Pembayaran
                </h2>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('success')): ?>
                    <div class="mb-6 p-4 bg-emerald-50 text-emerald-800 rounded-2xl border border-emerald-100 text-sm">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->is_premium): ?>
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                            <i class="fa-solid fa-check-double"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900">Premium Aktif!</h3>
                        <p class="text-slate-500 text-sm mt-2">Terima kasih, semua fitur premium sudah terbuka untuk Anda.</p>
                        <a href="<?php echo e(route('member.cv-editor')); ?>" class="btn btn-primary mt-6 w-full">Mulai Buat CV</a>
                    </div>
                <?php elseif($existingPayment && $existingPayment->status === 'pending'): ?>
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-amber-100 text-amber-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl animate-pulse">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900">Menunggu Verifikasi</h3>
                        <p class="text-slate-500 text-sm mt-2">Pihak Admin sedang memeriksa bukti transfer Anda. Mohon tunggu sebentar ya!</p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($existingPayment->proof_path): ?>
                            <div class="mt-6 border p-4 rounded-2xl bg-slate-50">
                                <img src="<?php echo e(Storage::url($existingPayment->proof_path)); ?>" alt="Bukti Transfer" class="max-h-40 mx-auto rounded-lg">
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php else: ?>
                    <form wire:submit.prevent="saveProof" class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Upload Bukti Transfer (JPG/PNG)</label>
                            <div class="relative group cursor-pointer">
                                <input type="file" wire:model="proof" class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer">
                                <div class="border-2 border-dashed border-slate-200 group-hover:border-primary transition-colors py-12 rounded-3xl text-center bg-slate-50">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($proof): ?>
                                        <i class="fa-solid fa-file-image text-4xl text-emerald-500 mb-2"></i>
                                        <p class="text-sm font-medium text-emerald-600"><?php echo e($proof->getClientOriginalName()); ?></p>
                                    <?php else: ?>
                                        <i class="fa-solid fa-cloud-arrow-up text-4xl text-slate-300 mb-2 group-hover:text-primary transition-colors"></i>
                                        <p class="text-sm font-medium text-slate-600">Klik atau drag gambar ke sini</p>
                                        <p class="text-xs text-slate-400 mt-1">Maksimal file 2MB</p>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['proof'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-rose-500 text-xs mt-1 block"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <button type="submit" wire:loading.attr="disabled" class="w-full btn btn-primary py-4 rounded-2xl text-lg font-bold shadow-lg shadow-blue-900/10">
                            <span wire:loading.remove>Konfirmasi Pembayaran</span>
                            <span wire:loading><i class="fa-solid fa-spinner fa-spin"></i> Memproses...</span>
                        </button>
                    </form>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laravel\dirtech\resources\views/livewire/member/payment.blade.php ENDPATH**/ ?>