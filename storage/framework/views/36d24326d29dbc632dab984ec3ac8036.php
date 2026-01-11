<div x-data="{ showUpgradeModal: false }" class="py-12 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Form Side -->
            <div class="w-full lg:w-1/2 space-y-6 no-print">
                <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 p-8">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="text-2xl font-outfit font-bold text-slate-800">CV ATS Editor</h2>
                            <p class="text-slate-500 text-sm">Lengkapi data Anda untuk generate CV otomatis.</p>
                        </div>
                        <button wire:click="save" class="bg-primary hover:bg-slate-800 text-white font-bold py-3 px-8 rounded-xl transition-all flex items-center gap-2">
                             <i class="fa-solid fa-cloud-arrow-up"></i> Simpan
                        </button>
                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('message')): ?>
                        <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 mb-6 rounded-r-xl">
                            <p class="text-emerald-800 text-sm flex items-center gap-2">
                                <i class="fa-solid fa-circle-check"></i> <?php echo e(session('message')); ?>

                            </p>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(session()->has('ai_success')): ?>
                        <div class="bg-violet-50 border-l-4 border-violet-500 p-4 mb-6 rounded-r-xl">
                            <p class="text-violet-800 text-sm flex items-center gap-2">
                                <i class="fa-solid fa-wand-magic-sparkles"></i> <?php echo e(session('ai_success')); ?>

                            </p>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(session()->has('ai_error')): ?>
                        <div class="bg-rose-50 border-l-4 border-rose-500 p-4 mb-6 rounded-r-xl">
                            <p class="text-rose-800 text-sm flex items-center gap-2">
                                <i class="fa-solid fa-circle-exclamation"></i> <?php echo e(session('ai_error')); ?>

                            </p>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php
                        $labels = [
                            'id' => [
                                'summary' => 'Ringkasan Profil',
                                'experience' => 'Pengalaman Kerja',
                                'education' => 'Pendidikan',
                                'skills' => 'Keahlian',
                                'projects' => 'Proyek Portofolio',
                                'languages' => 'Bahasa',
                                'placeholder_name' => 'Nama Anda',
                                'placeholder_email' => 'email@anda.com',
                                'placeholder_phone' => '08xxxxxx',
                                'no_exp' => 'Belum ada pengalaman yang diisi.',
                                'no_edu' => 'Belum ada pendidikan yang diisi.',
                                'no_projects' => 'Belum ada proyek yang diisi.',
                            ],
                            'en' => [
                                'summary' => 'Professional Summary',
                                'experience' => 'Work Experience',
                                'education' => 'Education',
                                'organization' => 'Organizational History',
                                'skills' => 'Skills',
                                'projects' => 'Key Projects',
                                'languages' => 'Languages',
                                'location' => 'Location',
                                'placeholder_name' => 'Your Name',
                                'placeholder_email' => 'email@example.com',
                                'placeholder_phone' => '+62xxxxxx',
                                'no_exp' => 'No experience added yet.',
                                'no_edu' => 'No education added yet.',
                                'no_org' => 'No organizational history added yet.',
                                'no_projects' => 'No projects added yet.',
                            ]
                        ];
                        $cur = $labels[$data['language']] ?? $labels['id'];
                    ?>

                    <!-- Customizations -->
                    <div class="gap-6 mb-10 p-6 bg-slate-50 rounded-2xl border border-slate-100 space-y-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 mb-4 uppercase tracking-wider">Pilih Template</label>
                            <div class="grid grid-cols-2 gap-3">
                                <!-- Basic -->
                                <button wire:click="$set('data.template', 'basic')" class="group relative p-1 rounded-xl border-2 transition-all overflow-hidden <?php echo e($data['template'] === 'basic' ? 'border-primary ring-2 ring-primary/20' : 'border-white hover:border-slate-300'); ?>">
                                    <div class="bg-white p-2 h-24 flex flex-col gap-1 shadow-sm">
                                        <div class="h-1.5 w-1/2 bg-slate-200 mx-auto rounded-full"></div>
                                        <div class="h-1 w-3/4 bg-slate-100 mx-auto rounded-full mb-1"></div>
                                        <div class="h-1 w-full bg-slate-50 rounded-full"></div>
                                        <div class="h-1 w-full bg-slate-50 rounded-full"></div>
                                    </div>
                                    <div class="py-1.5 text-[10px] font-bold uppercase tracking-wider bg-white border-t border-slate-100">Basic</div>
                                </button>

                                <!-- Modern -->
                                <button wire:click="$set('data.template', 'modern')" class="group relative p-1 rounded-xl border-2 transition-all overflow-hidden <?php echo e($data['template'] === 'modern' ? 'border-primary ring-2 ring-primary/20' : 'border-white hover:border-slate-300'); ?>">
                                    <div class="bg-white p-2 h-24 flex flex-col gap-1 shadow-sm">
                                        <div class="h-2 w-full bg-slate-50 rounded mb-1"></div>
                                        <div class="h-1.5 w-full bg-blue-50 border-l-4 border-blue-600"></div>
                                        <div class="h-1 w-full bg-slate-100 rounded-full"></div>
                                        <div class="h-1.5 w-full bg-blue-50 border-l-4 border-blue-600 mt-1"></div>
                                    </div>
                                    <div class="py-1.5 text-[10px] font-bold uppercase tracking-wider bg-white border-t border-slate-100 text-blue-600">Modern</div>
                                </button>

                                <!-- Elegant -->
                                <button wire:click="$set('data.template', 'elegant')" class="group relative p-1 rounded-xl border-2 transition-all overflow-hidden <?php echo e($data['template'] === 'elegant' ? 'border-primary ring-2 ring-primary/20' : 'border-white hover:border-slate-300'); ?>">
                                    <div class="bg-white p-2 h-24 flex gap-2 shadow-sm border-l-4 border-slate-800">
                                        <div class="flex-1 flex flex-col gap-1">
                                            <div class="h-1.5 w-2/3 bg-slate-200 mb-1"></div>
                                            <div class="h-1 w-full bg-slate-100 border-b border-slate-800"></div>
                                            <div class="h-1 w-full bg-slate-50 mt-1"></div>
                                        </div>
                                    </div>
                                    <div class="py-1.5 text-[10px] font-bold uppercase tracking-wider bg-white border-t border-slate-100 text-slate-800">Elegant</div>
                                </button>

                                <!-- Creative -->
                                <button wire:click="$set('data.template', 'creative')" class="group relative p-1 rounded-xl border-2 transition-all overflow-hidden <?php echo e($data['template'] === 'creative' ? 'border-emerald-600 ring-2 ring-emerald-600/20' : 'border-white hover:border-slate-300'); ?>">
                                    <div class="bg-white h-24 shadow-sm flex flex-col">
                                        <div class="bg-emerald-700 h-8 flex items-center px-1 gap-1">
                                            <div class="w-4 h-4 rounded-full bg-white/30 border border-white/40"></div>
                                            <div class="h-1.5 w-8 bg-white/50 rounded-full"></div>
                                        </div>
                                        <div class="p-2 flex flex-col gap-1 text-[8px]">
                                            <div class="h-1 w-full bg-emerald-50 border-b border-emerald-700"></div>
                                            <div class="h-1 w-full bg-slate-100 rounded-full"></div>
                                        </div>
                                    </div>
                                    <div class="py-1.5 text-[10px] font-bold uppercase tracking-wider bg-white border-t border-slate-100 text-emerald-700">Creative</div>
                                </button>

                                <!-- Premium ATS -->
                                <button wire:click="$set('data.template', 'premium_ats')" class="group relative p-1 rounded-xl border-2 transition-all overflow-hidden <?php echo e($data['template'] === 'premium_ats' ? 'border-[#2E004B] ring-2 ring-[#2E004B]/20' : 'border-white hover:border-slate-300'); ?>">
                                    <div class="bg-white h-24 shadow-sm flex flex-col">
                                        <div class="bg-[#2E004B] h-6 flex items-center px-1 gap-1">
                                            <div class="h-1 w-12 bg-white/40 rounded-full"></div>
                                        </div>
                                        <div class="p-2 flex flex-col gap-1 text-[8px]">
                                            <div class="h-1 w-full bg-[#2E004B]/10"></div>
                                            <div class="h-1 w-full bg-slate-100 rounded-full"></div>
                                        </div>
                                    </div>
                                    <div class="py-1.5 text-[10px] font-bold uppercase tracking-wider bg-white border-t border-slate-100 text-[#2E004B]">Premium</div>
                                </button>

                                <!-- Modern Soft -->
                                <button wire:click="$set('data.template', 'modern_soft')" class="group relative p-1 rounded-xl border-2 transition-all overflow-hidden <?php echo e($data['template'] === 'modern_soft' ? 'border-[#7C3AED] ring-2 ring-[#7C3AED]/20' : 'border-white hover:border-slate-300'); ?>">
                                    <div class="bg-white h-24 shadow-sm p-2 flex flex-col gap-2">
                                        <div class="flex items-center gap-2">
                                            <div class="w-4 h-4 rounded-full bg-[#7C3AED]/20"></div>
                                            <div class="h-1.5 w-full bg-[#7C3AED]/10 rounded-full"></div>
                                        </div>
                                        <div class="h-1 w-full bg-slate-100 rounded-full"></div>
                                    </div>
                                    <div class="py-1.5 text-[10px] font-bold uppercase tracking-wider bg-white border-t border-slate-100 text-[#7C3AED]">Soft</div>
                                </button>

                                <!-- Academic -->
                                <button wire:click="$set('data.template', 'professional_academic')" class="group relative p-1 rounded-xl border-2 transition-all overflow-hidden <?php echo e($data['template'] === 'professional_academic' ? 'border-[#5B8C31] ring-2 ring-[#5B8C31]/20' : 'border-white hover:border-slate-300'); ?>">
                                    <div class="bg-white h-24 shadow-sm flex flex-col p-2 gap-1">
                                        <div class="h-2 w-full bg-[#5B8C31] rounded-sm"></div>
                                        <div class="h-1 w-full bg-[#5B8C31]/10 mt-1"></div>
                                        <div class="h-1 w-full bg-slate-50 shadow-sm"></div>
                                    </div>
                                    <div class="py-1.5 text-[10px] font-bold uppercase tracking-wider bg-white border-t border-slate-100 text-[#5B8C31]">Academic</div>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 mb-2 uppercase tracking-wider">Bahasa CV</label>
                            <div class="grid grid-cols-2 gap-2">
                                <button wire:click="$set('data.language', 'id')" class="p-2 text-[10px] font-bold rounded-lg border transition-all <?php echo e($data['language'] === 'id' ? 'bg-primary text-white border-primary' : 'bg-white text-slate-600 border-slate-200 hover:border-primary'); ?>">
                                    INDONESIA
                                </button>
                                <button wire:click="$set('data.language', 'en')" class="p-2 text-[10px] font-bold rounded-lg border transition-all <?php echo e($data['language'] === 'en' ? 'bg-primary text-white border-primary' : 'bg-white text-slate-600 border-slate-200 hover:border-primary'); ?>">
                                    ENGLISH
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Photo Upload -->
                    <div class="mb-10 p-6 bg-slate-50 rounded-2xl border border-slate-100">
                        <label class="block text-xs font-bold text-slate-500 mb-4 uppercase tracking-wider">Foto Profil (Opsional - Untuk Template Creative)</label>
                        <div class="flex items-center gap-6">
                            <div class="w-20 h-20 rounded-2xl bg-white border border-slate-200 overflow-hidden shadow-inner flex items-center justify-center relative">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($photo): ?>
                                    <img src="<?php echo e($photo->temporaryUrl()); ?>" class="w-full h-full object-cover">
                                <?php elseif($data['photo_path']): ?>
                                    <img src="<?php echo e(asset('storage/' . $data['photo_path'])); ?>" class="w-full h-full object-cover">
                                <?php else: ?>
                                    <i class="fa-solid fa-camera text-slate-300 text-2xl"></i>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <div wire:loading wire:target="photo" class="absolute inset-0 bg-white/50 flex items-center justify-center">
                                    <i class="fa-solid fa-spinner fa-spin text-primary"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <input type="file" wire:model="photo" class="hidden" id="photo-upload" accept="image/*">
                                <label for="photo-upload" class="bg-white border border-slate-200 hover:border-primary text-slate-600 font-bold py-2 px-6 rounded-xl transition-all cursor-pointer text-sm inline-block shadow-sm">
                                    Pilih Foto
                                </label>
                                <p class="text-[10px] text-slate-400 mt-2">JPG/PNG, Max 1MB. Ukuran 1:1 direkomendasikan.</p>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-rose-500 text-[10px] block mt-1"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Basic Info -->
                    <div class="space-y-4 mb-10">
                        <h4 class="font-bold text-slate-700 flex items-center gap-2 uppercase tracking-wider text-xs">
                             <span class="w-6 h-6 bg-slate-100 rounded-lg flex items-center justify-center text-[10px]"><i class="fa-solid fa-user"></i></span>
                             Informasi Dasar
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1 uppercase">Nama Lengkap</label>
                                <input type="text" wire:model.live="data.full_name" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl focus:ring-2 focus:ring-primary/20 outline-none transition-all">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1 uppercase">Email</label>
                                <input type="email" wire:model.live="data.email" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl focus:ring-2 focus:ring-primary/20 outline-none transition-all">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1 uppercase">Nomor Telepon</label>
                                <input type="text" wire:model.live="data.phone" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl focus:ring-2 focus:ring-primary/20 outline-none transition-all">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1 uppercase">Lokasi (Cth: Jakarta)</label>
                                <input type="text" wire:model.live="data.location" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl focus:ring-2 focus:ring-primary/20 outline-none transition-all">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1 uppercase">LinkedIn URL</label>
                                <input type="text" wire:model.live="data.linkedin" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl focus:ring-2 focus:ring-primary/20 outline-none transition-all" placeholder="linkedin.com/in/username">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 mb-1 uppercase">Website / Portfolio</label>
                                <input type="text" wire:model.live="data.website" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl focus:ring-2 focus:ring-primary/20 outline-none transition-all" placeholder="www.yourportfolio.com">
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <label class="block text-xs font-bold text-slate-500 uppercase">Summary / Ringkasan Profil</label>
                                <button wire:click="polishSummary" wire:loading.attr="disabled" wire:target="polishSummary" class="text-xs font-bold text-primary hover:text-primary/80 transition-colors flex items-center gap-1 disabled:opacity-50">
                                    <span wire:loading.remove wire:target="polishSummary">✨ Perbaiki dg AI</span>
                                    <span wire:loading wire:target="polishSummary"><i class="fa-solid fa-spinner fa-spin"></i> Memproses...</span>
                                </button>
                            </div>
                            <textarea wire:model.live="data.summary" rows="4" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-xl focus:ring-2 focus:ring-primary/20 outline-none transition-all" placeholder="Tuliskan ringkasan profesional Anda..."></textarea>
                        </div>
                    </div>

                    <!-- Experience -->
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <h4 class="font-bold text-slate-700 flex items-center gap-2 uppercase tracking-wider text-xs">
                                <span class="w-6 h-6 bg-slate-100 rounded-lg flex items-center justify-center text-[10px]"><i class="fa-solid fa-briefcase"></i></span>
                                Pengalaman Kerja
                            </h4>
                            <button wire:click="addExperience" class="text-sm font-bold text-primary hover:text-slate-800 transition-colors flex items-center gap-1.5 py-2 px-3 rounded-lg hover:bg-primary/5">
                                <i class="fa-solid fa-plus-circle text-base"></i> Tambah
                            </button>
                        </div>
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $data['experience']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="p-6 bg-slate-50 rounded-2xl border border-slate-100 space-y-4 relative group transition-all hover:border-primary/20">
                                <button wire:click="removeExperience(<?php echo e($index); ?>)" class="absolute top-4 right-4 w-10 h-10 flex items-center justify-center text-slate-400 hover:text-rose-500 hover:bg-rose-50 rounded-xl md:opacity-0 md:group-hover:opacity-100 transition-all" title="Hapus">
                                    <i class="fa-solid fa-trash-can text-lg"></i>
                                </button>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-400 mb-1 uppercase tracking-tight">Nama Perusahaan</label>
                                        <input type="text" wire:model.live="data.experience.<?php echo e($index); ?>.company" placeholder="Contoh: PT. Maju Bersama" class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none focus:border-primary/50 transition-all">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-400 mb-1 uppercase tracking-tight">Posisi / Jabatan</label>
                                        <input type="text" wire:model.live="data.experience.<?php echo e($index); ?>.position" placeholder="Contoh: Senior Developer" class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none focus:border-primary/50 transition-all">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-400 mb-1 uppercase tracking-tight">Periode</label>
                                        <input type="text" wire:model.live="data.experience.<?php echo e($index); ?>.period" placeholder="Jan 2020 - Des 2022" class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none focus:border-primary/50 transition-all">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-400 mb-1 uppercase tracking-tight">Lokasi</label>
                                        <input type="text" wire:model.live="data.experience.<?php echo e($index); ?>.location" placeholder="Jakarta, Indonesia" class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none focus:border-primary/50 transition-all">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex justify-end mb-1">
                                        <button wire:click="polishExperience(<?php echo e($index); ?>)" wire:loading.attr="disabled" wire:target="polishExperience(<?php echo e($index); ?>)" class="text-[10px] font-bold text-primary hover:text-primary/80 transition-colors flex items-center gap-1 disabled:opacity-50">
                                            <span wire:loading.remove wire:target="polishExperience(<?php echo e($index); ?>)">✨ Perbaiki dg AI</span>
                                            <span wire:loading wire:target="polishExperience(<?php echo e($index); ?>)"><i class="fa-solid fa-spinner fa-spin"></i></span>
                                        </button>
                                    </div>
                                    <textarea wire:model.live="data.experience.<?php echo e($index); ?>.description" rows="3" placeholder="Deskripsi pekerjaan & pencapaian..." class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none"></textarea>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <!-- Organizations -->
                    <div class="space-y-4 mt-10">
                        <div class="flex justify-between items-center">
                            <h4 class="font-bold text-slate-700 flex items-center gap-2 uppercase tracking-wider text-xs">
                                <span class="w-6 h-6 bg-slate-100 rounded-lg flex items-center justify-center text-[10px]"><i class="fa-solid fa-users-rectangle"></i></span>
                                Riwayat Organisasi
                            </h4>
                            <button wire:click="addOrganization" class="text-sm font-bold text-primary hover:text-slate-800 transition-colors flex items-center gap-1.5 py-2 px-3 rounded-lg hover:bg-primary/5">
                                <i class="fa-solid fa-plus-circle text-base"></i> Tambah
                            </button>
                        </div>
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $data['organizations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $org): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="p-6 bg-slate-50 rounded-2xl border border-slate-100 space-y-4 relative group transition-all hover:border-primary/20">
                                <button wire:click="removeOrganization(<?php echo e($index); ?>)" class="absolute top-4 right-4 w-10 h-10 flex items-center justify-center text-slate-400 hover:text-rose-500 hover:bg-rose-50 rounded-xl md:opacity-0 md:group-hover:opacity-100 transition-all" title="Hapus">
                                    <i class="fa-solid fa-trash-can text-lg"></i>
                                </button>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-400 mb-1 uppercase tracking-tight">Nama Organisasi</label>
                                        <input type="text" wire:model.live="data.organizations.<?php echo e($index); ?>.name" placeholder="Nama Organisasi" class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none focus:border-primary/50 transition-all">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-400 mb-1 uppercase tracking-tight">Posisi</label>
                                        <input type="text" wire:model.live="data.organizations.<?php echo e($index); ?>.position" placeholder="Contoh: Ketua" class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none focus:border-primary/50 transition-all">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-400 mb-1 uppercase tracking-tight">Periode</label>
                                        <input type="text" wire:model.live="data.organizations.<?php echo e($index); ?>.period" placeholder="2020 - 2021" class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none focus:border-primary/50 transition-all">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-400 mb-1 uppercase tracking-tight">Lokasi</label>
                                        <input type="text" wire:model.live="data.organizations.<?php echo e($index); ?>.location" placeholder="Jakarta" class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none focus:border-primary/50 transition-all">
                                    </div>
                                </div>
                                <textarea wire:model.live="data.organizations.<?php echo e($index); ?>.description" rows="2" placeholder="Deskripsi peran..." class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none"></textarea>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <!-- Education -->
                    <div class="space-y-4 mt-10">
                        <div class="flex justify-between items-center">
                            <h4 class="font-bold text-slate-700 flex items-center gap-2 uppercase tracking-wider text-xs">
                                <span class="w-6 h-6 bg-slate-100 rounded-lg flex items-center justify-center text-[10px]"><i class="fa-solid fa-graduation-cap"></i></span>
                                Pendidikan
                            </h4>
                            <button wire:click="addEducation" class="text-sm font-bold text-primary hover:text-slate-800 transition-colors flex items-center gap-1.5 py-2 px-3 rounded-lg hover:bg-primary/5">
                                <i class="fa-solid fa-plus-circle text-base"></i> Tambah
                            </button>
                        </div>
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $data['education']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="p-6 bg-slate-50 rounded-2xl border border-slate-100 space-y-4 relative group transition-all hover:border-primary/20">
                                <button wire:click="removeEducation(<?php echo e($index); ?>)" class="absolute top-4 right-4 w-10 h-10 flex items-center justify-center text-slate-400 hover:text-rose-500 hover:bg-rose-50 rounded-xl md:opacity-0 md:group-hover:opacity-100 transition-all" title="Hapus">
                                    <i class="fa-solid fa-trash-can text-lg"></i>
                                </button>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-400 mb-1 uppercase tracking-tight">Nama Instansi</label>
                                        <input type="text" wire:model.live="data.education.<?php echo e($index); ?>.school" placeholder="Nama Sekolah/Univ" class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none focus:border-primary/50 transition-all">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-400 mb-1 uppercase tracking-tight">Gelar / Jurusan</label>
                                        <input type="text" wire:model.live="data.education.<?php echo e($index); ?>.degree" placeholder="Contoh: S1 Informatika" class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none focus:border-primary/50 transition-all">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-400 mb-1 uppercase tracking-tight">Periode</label>
                                        <input type="text" wire:model.live="data.education.<?php echo e($index); ?>.period" placeholder="2016 - 2020" class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none focus:border-primary/50 transition-all">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-400 mb-1 uppercase tracking-tight">Lokasi</label>
                                        <input type="text" wire:model.live="data.education.<?php echo e($index); ?>.location" placeholder="Jakarta" class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none focus:border-primary/50 transition-all">
                                    </div>
                                </div>
                                <textarea wire:model.live="data.education.<?php echo e($index); ?>.description" rows="2" placeholder="Detail pendidikan/IPK dsb..." class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none"></textarea>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <!-- Projects -->
                    <div class="space-y-4 mt-10">
                        <div class="flex justify-between items-center">
                            <h4 class="font-bold text-slate-700 flex items-center gap-2 uppercase tracking-wider text-xs">
                                <span class="w-6 h-6 bg-slate-100 rounded-lg flex items-center justify-center text-[10px]"><i class="fa-solid fa-diagram-project"></i></span>
                                Proyek Portofolio
                            </h4>
                            <button wire:click="addProject" class="text-sm font-bold text-primary hover:text-slate-800 transition-colors flex items-center gap-1.5 py-2 px-3 rounded-lg hover:bg-primary/5">
                                <i class="fa-solid fa-plus-circle text-base"></i> Tambah
                            </button>
                        </div>
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $data['projects']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="p-6 bg-slate-50 rounded-2xl border border-slate-100 space-y-4 relative group transition-all hover:border-primary/20">
                                <button wire:click="removeProject(<?php echo e($index); ?>)" class="absolute top-4 right-4 w-10 h-10 flex items-center justify-center text-slate-400 hover:text-rose-500 hover:bg-rose-50 rounded-xl md:opacity-0 md:group-hover:opacity-100 transition-all" title="Hapus">
                                    <i class="fa-solid fa-trash-can text-lg"></i>
                                </button>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <input type="text" wire:model.live="data.projects.<?php echo e($index); ?>.name" placeholder="Nama Proyek" class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none">
                                    <input type="text" wire:model.live="data.projects.<?php echo e($index); ?>.period" placeholder="Periode" class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none">
                                </div>
                                <input type="text" wire:model.live="data.projects.<?php echo e($index); ?>.link" placeholder="Link / URL Proyek" class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none">
                                <textarea wire:model.live="data.projects.<?php echo e($index); ?>.description" rows="3" placeholder="Jelaskan peran Anda & hasil..." class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm outline-none"></textarea>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <!-- Skills -->
                    <div class="space-y-4 mt-10">
                        <div class="flex justify-between items-center">
                            <h4 class="font-bold text-slate-700 flex items-center gap-2 uppercase tracking-wider text-xs">
                                <span class="w-6 h-6 bg-slate-100 rounded-lg flex items-center justify-center text-[10px]"><i class="fa-solid fa-screwdriver-wrench"></i></span>
                                Keahlian / Skills
                            </h4>
                            <button wire:click="addSkill" class="text-sm font-bold text-primary hover:text-slate-800 transition-colors flex items-center gap-1.5 py-2 px-3 rounded-lg hover:bg-primary/5">
                                <i class="fa-solid fa-plus-circle text-base"></i> Tambah
                            </button>
                        </div>
                        
                        <div class="flex flex-wrap gap-3">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $data['skills']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-xl border border-slate-200 shadow-sm group">
                                    <input type="text" wire:model.live="data.skills.<?php echo e($index); ?>" placeholder="Keahlian" class="bg-transparent border-none outline-none text-sm w-32 focus:ring-0 p-0">
                                    <button wire:click="removeSkill(<?php echo e($index); ?>)" class="text-slate-300 hover:text-rose-500 transition-colors">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </button>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    <!-- Languages -->
                    <div class="space-y-4 mt-10">
                        <div class="flex justify-between items-center">
                            <h4 class="font-bold text-slate-700 flex items-center gap-2 uppercase tracking-wider text-xs">
                                <span class="w-6 h-6 bg-slate-100 rounded-lg flex items-center justify-center text-[10px]"><i class="fa-solid fa-language"></i></span>
                                Bahasa
                            </h4>
                            <button wire:click="addLanguage" class="text-sm font-bold text-primary hover:text-slate-800 transition-colors flex items-center gap-1.5 py-2 px-3 rounded-lg hover:bg-primary/5">
                                <i class="fa-solid fa-plus-circle text-base"></i> Tambah
                            </button>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $data['languages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 flex gap-3 relative group transition-all hover:border-primary/20">
                                    <button wire:click="removeLanguage(<?php echo e($index); ?>)" class="absolute -top-2 -right-2 w-7 h-7 bg-rose-500 text-white rounded-lg flex items-center justify-center md:opacity-0 md:group-hover:opacity-100 transition-all shadow-lg">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                    <input type="text" wire:model.live="data.languages.<?php echo e($index); ?>.name" placeholder="Bahasa" class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-sm outline-none">
                                    <input type="text" wire:model.live="data.languages.<?php echo e($index); ?>.level" placeholder="Level" class="w-24 px-3 py-2 border border-slate-200 rounded-lg text-sm outline-none">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-12 flex flex-col items-center gap-4 border-t border-slate-100 pt-8">
                        <button wire:click="save" class="w-full bg-primary hover:bg-slate-800 text-white font-bold py-4 px-10 rounded-2xl transition-all flex items-center justify-center gap-2 shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98]">
                             <i class="fa-solid fa-floppy-disk text-lg"></i> Simpan Perubahan
                        </button>
                        <a href="<?php echo e(route('member.dashboard')); ?>" class="text-slate-400 hover:text-slate-600 font-bold transition-all text-xs uppercase tracking-widest py-2">
                            <i class="fa-solid fa-arrow-left mr-1"></i> Kembali ke Dashboard
                        </a>
                    </div>
                </div>
            </div>

            <!-- Preview Side -->
            <div class="w-full lg:w-1/2">
                <div class="sticky top-24">
                    <div class="bg-white shadow-xl shadow-slate-200/50 border border-slate-100 cv-container-neutral">
                        <div class="bg-slate-800 p-4 flex flex-wrap gap-4 justify-between items-center no-print">
                            <span class="text-white text-xs font-bold tracking-widest uppercase opacity-60">Live Preview (ATS Friendly)</span>
                            <div class="flex items-center gap-3">
                                <button @click="if (!<?php echo \Illuminate\Support\Js::from(auth()->user()->is_premium)->toHtml() ?> && <?php echo \Illuminate\Support\Js::from($data['template'])->toHtml() ?> !== 'basic') { showUpgradeModal = true } else { window.print() }" class="text-white hover:text-accent transition-colors text-sm font-bold flex items-center gap-2 bg-slate-700/50 px-4 py-2 rounded-xl border border-white/10 shadow-lg" title="Sangat disarankan untuk ATS">
                                    <i class="fa-solid fa-file-pdf"></i> Cetak / PDF (Recommended)
                                </button>
                            </div>
                        </div>
                        <div class="px-[var(--cv-pad-x)] py-[var(--cv-pad-y)] min-h-[800px] text-slate-900 leading-relaxed bg-white transition-all duration-300" 
                             style="font-family: Arial, Helvetica, sans-serif; --cv-pad-x: 15mm; --cv-pad-y: 10mm;" 
                             id="cv-preview">
                            <?php echo $__env->make("livewire.member.cv-templates.{$data['template']}", [
                                'data' => $data,
                                'labels' => $cur,
                                'photo' => $photo
                            ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>
                    
                    <div class="mt-6 bg-amber-50 border border-amber-100 rounded-2xl p-6 no-print">
                        <p class="text-amber-800 text-sm italic">
                            <strong>Note:</strong> Template Creative (Hijau) menggunakan foto dan elemen visual. Jika target perusahaan Anda menggunakan sistem ATS ketat, disarankan menggunakan template <strong>BASIC</strong>.
                        </p>
                    </div>
                </div>
            </div>
            
            <?php echo $__env->make('livewire.member.cv-editor-styles', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('livewire.member.cv-editor-scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <!-- Upgrade Modal -->
            <div x-show="showUpgradeModal" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm no-print"
                 style="display: none;">
                <div @click.away="showUpgradeModal = false" class="bg-white rounded-3xl shadow-2xl overflow-hidden max-w-sm w-full transform transition-all">
                    <div class="relative h-32 bg-primary flex items-center justify-center overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-purple-800 opacity-90"></div>
                        <i class="fa-solid fa-gem text-5xl text-white/20 absolute -right-4 -bottom-4"></i>
                        <i class="fa-solid fa-crown text-white text-5xl relative z-10 shadow-sm"></i>
                    </div>
                    <div class="p-8 text-center">
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">Gunakan Fitur Premium</h3>
                        <p class="text-slate-500 text-sm leading-relaxed mb-8">
                            Template <span class="text-slate-900 font-bold uppercase"><?php echo e($data['template']); ?></span> adalah fitur premium. Aktifkan sekarang hanya dengan <strong>Rp 19.000</strong> untuk langganan 1 bulan!
                        </p>
                        <div class="space-y-3">
                            <a href="<?php echo e(route('member.payment')); ?>" class="w-full btn btn-primary py-3 rounded-xl flex items-center justify-center gap-2 shadow-lg shadow-blue-900/10">
                                <i class="fa-solid fa-credit-card"></i> Bayar Sekarang
                            </a>
                            <button @click="showUpgradeModal = false" class="text-sm font-bold text-slate-400 hover:text-slate-600 transition-colors uppercase tracking-widest px-8 py-2">
                                Nanti Saja
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laravel\dirtech\resources\views/livewire/member/cv-editor.blade.php ENDPATH**/ ?>