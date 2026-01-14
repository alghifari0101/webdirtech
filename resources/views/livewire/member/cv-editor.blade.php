<div x-data="{ 
    showUpgradeModal: false,
    activeSection: 'basic',
    step: @entangle('step')
}" class="py-6 sm:py-8 lg:py-12 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-4 sm:px-6 max-w-7xl">
        <!-- Header & Stepper -->
        <div class="mb-10 text-center no-print">
            <h2 class="text-3xl font-outfit font-bold text-slate-800 mb-2">CV ATS Professional Editor</h2>
            <p class="text-slate-500 text-sm mb-8">Lengkapi data Anda dengan mudah dan pilih desain terbaik.</p>
            
            <div class="flex items-center justify-center gap-4 no-print">
                <div @click="$wire.setStep(1)" class="flex items-center gap-3 cursor-pointer group">
                    <div :class="step === 1 ? 'bg-primary text-white' : 'bg-white text-slate-400 border border-slate-200'" class="w-10 h-10 rounded-full flex items-center justify-center font-bold transition-all shadow-sm">1</div>
                    <span :class="step === 1 ? 'text-slate-800 font-bold' : 'text-slate-400 font-medium'" class="text-sm">Isi Data CV</span>
                </div>
                <div class="w-12 h-px bg-slate-200"></div>
                <div @click="$wire.setStep(2)" class="flex items-center gap-3 cursor-pointer group">
                    <div :class="step === 2 ? 'bg-primary text-white' : 'bg-white text-slate-400 border border-slate-200'" class="w-10 h-10 rounded-full flex items-center justify-center font-bold transition-all shadow-sm">2</div>
                    <span :class="step === 2 ? 'text-slate-800 font-bold' : 'text-slate-400 font-medium'" class="text-sm">Desain & Preview</span>
                </div>
            </div>
        </div>

        @php
            $labels = [
                'id' => [
                    'summary' => 'Ringkasan Profil',
                    'experience' => 'Pengalaman Kerja',
                    'education' => 'Pendidikan',
                    'organization' => 'Riwayat Organisasi',
                    'skills' => 'Keahlian',
                    'projects' => 'Proyek Portofolio',
                    'languages' => 'Bahasa',
                    'contact' => 'Kontak',
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
                    'contact' => 'Contact',
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
        @endphp

        <div class="flex flex-col lg:flex-row gap-4 sm:gap-6 lg:gap-8 items-start">
            <!-- LEFT PANEL: FORMS -->
            <div class="w-full space-y-4 sm:space-y-6 lg:sticky lg:top-6 no-print" 
                 :class="step === 1 ? 'max-w-4xl mx-auto' : 'lg:w-[320px] lg:flex-none' + (step === 2 ? ' order-2 lg:order-1' : '')">
                <div x-show="step === 1" class="space-y-6">
                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 p-4 sm:p-6 lg:p-8">
                    @if (session()->has('message'))
                        <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 mb-6 rounded-r-xl">
                            <p class="text-emerald-800 text-sm flex items-center gap-2">
                                <i class="fa-solid fa-circle-check"></i> {{ session('message') }}
                            </p>
                        </div>
                    @endif

                    <!-- Section: Basic Info -->
                    <div class="border-b border-slate-100 pb-8 mb-8">
                         <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center"><i class="fa-solid fa-user"></i></div>
                            <h3 class="text-xl font-bold text-slate-800">Informasi Dasar</h3>
                         </div>
                         
                         <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-1">
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Nama Lengkap</label>
                                <input type="text" wire:model.blur="data.full_name" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-primary/20 outline-none transition-all text-slate-700">
                            </div>
                            <div class="space-y-1">
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Email Utama</label>
                                <input type="email" wire:model.blur="data.email" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-primary/20 outline-none transition-all text-slate-700">
                            </div>
                            <div class="space-y-1">
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Nomor Telepon</label>
                                <input type="text" wire:model.blur="data.phone" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-primary/20 outline-none transition-all text-slate-700">
                            </div>
                            <div class="space-y-1">
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Domisili</label>
                                <input type="text" wire:model.blur="data.location" placeholder="Jakarta, Indonesia" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-primary/20 outline-none transition-all text-slate-700">
                            </div>
                            <div class="space-y-1">
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">LinkedIn URL</label>
                                <input type="text" wire:model.blur="data.linkedin" placeholder="linkedin.com/in/username" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-primary/20 outline-none transition-all text-slate-700">
                            </div>
                            <div class="space-y-1">
                                <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">Website / Portfolio</label>
                                <input type="text" wire:model.blur="data.website" placeholder="www.portfolio.com" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-primary/20 outline-none transition-all text-slate-700">
                            </div>
                         </div>
                     </div>
                         
                    <!-- Dynamic Reorderable Sections -->
                    <div class="space-y-4">
                        @foreach($data['section_order'] as $secIndex => $section)
                            @if($section === 'summary')
                                <!-- Summary -->
                                <div class="bg-slate-50 rounded-2xl border border-slate-100 overflow-hidden group">
                                    <div class="px-6 py-4 flex items-center justify-between">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-sm"><i class="fa-solid fa-user-tie"></i></div>
                                            <span class="font-bold text-slate-700">{{ $cur['summary'] }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <div class="flex border rounded-lg overflow-hidden bg-white">
                                                <button type="button" wire:click.stop="moveSection('summary', 'up')" @if($loop->first) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 border-r text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-up text-[10px]"></i></button>
                                                <button type="button" wire:click.stop="moveSection('summary', 'down')" @if($loop->last) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-down text-[10px]"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-6 pb-6 pt-0">
                                        <div class="flex justify-between items-center mb-2">
                                            <div class="flex gap-3 ml-auto">
                                                <button type="button" @click="insertBullet($refs.summaryArea)" class="text-[10px] font-bold text-slate-400 hover:text-primary transition-colors flex items-center gap-1">
                                                    <i class="fa-solid fa-list-ul"></i> Bullet
                                                </button>
                                                <button wire:click="polishSummary" wire:loading.attr="disabled" class="text-[10px] font-bold text-primary flex items-center gap-1">
                                                    <span wire:loading.remove wire:target="polishSummary">✨ AI Polish</span>
                                                    <span wire:loading wire:target="polishSummary"><i class="fa-solid fa-spinner fa-spin"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                        <textarea x-ref="summaryArea" wire:model.blur="data.summary" rows="4" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-primary/20 outline-none transition-all text-slate-700" placeholder="Tuliskan ringkasan profesional Anda..."></textarea>
                                    </div>
                                </div>
                            @endif

                            @if($section === 'experience')
                                <!-- Experience -->
                                <div class="bg-slate-50 rounded-2xl border border-slate-100 overflow-hidden">
                                    <div class="w-full px-6 py-4 flex items-center justify-between hover:bg-slate-100 transition-colors cursor-pointer group" @click="activeSection = activeSection === 'experience' ? '' : 'experience'">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-sm"><i class="fa-solid fa-briefcase"></i></div>
                                            <span class="font-bold text-slate-700">{{ $cur['experience'] }}</span>
                                            <span class="bg-blue-100 text-blue-600 text-[10px] px-2 py-0.5 rounded-full font-bold">{{ count($data['experience']) }}</span>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class="flex border rounded-lg overflow-hidden bg-white">
                                                <button type="button" wire:click.stop="moveSection('experience', 'up')" @if($loop->first) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 border-r text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-up text-[10px]"></i></button>
                                                <button type="button" wire:click.stop="moveSection('experience', 'down')" @if($loop->last) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-down text-[10px]"></i></button>
                                            </div>
                                            <i class="fa-solid fa-chevron-down text-slate-400 transition-transform" :class="activeSection === 'experience' ? 'rotate-180' : ''"></i>
                                        </div>
                                    </div>
                                    <div x-show="activeSection === 'experience'" x-collapse class="p-6 pt-0 space-y-6">
                                        <div class="flex justify-end pt-2">
                                            <button wire:click="addExperience" class="text-xs font-bold text-primary flex items-center gap-1"><i class="fa-solid fa-plus-circle"></i> Tambah Pengalaman</button>
                                        </div>
                                        @foreach($data['experience'] as $index => $exp)
                                            <div class="bg-white p-6 rounded-2xl border border-slate-200 relative group">
                                                <button wire:click="removeExperience({{ $index }})" class="absolute top-4 right-4 text-slate-400 hover:text-rose-500 transition-all"><i class="fa-solid fa-trash-can"></i></button>
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                                    <input type="text" wire:model.blur="data.experience.{{ $index }}.company" placeholder="Perusahaan" class="w-full px-4 py-2 bg-slate-50 border-none rounded-xl text-sm outline-none">
                                                    <input type="text" wire:model.blur="data.experience.{{ $index }}.position" placeholder="Posisi" class="w-full px-4 py-2 bg-slate-50 border-none rounded-xl text-sm outline-none">
                                                </div>
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <input type="text" wire:model.blur="data.experience.{{ $index }}.period" placeholder="Jan 2020 - Des 2022" class="w-full px-4 py-2 bg-slate-50 border-none rounded-xl text-sm outline-none">
                                                    <input type="text" wire:model.blur="data.experience.{{ $index }}.location" placeholder="Lokasi" class="w-full px-4 py-2 bg-slate-50 border-none rounded-xl text-sm outline-none">
                                                </div>
                                                <div class="mt-4">
                                                    <div class="flex justify-end mb-1 gap-3">
                                                        <button type="button" @click="insertBullet($el.closest('.mt-4').querySelector('textarea'))" class="text-[9px] font-bold text-slate-400 hover:text-primary transition-colors flex items-center gap-1">
                                                            <i class="fa-solid fa-list-ul"></i> Bullet
                                                        </button>
                                                        <button wire:click="polishExperience({{ $index }})" wire:loading.attr="disabled" class="text-[9px] font-bold text-primary flex items-center gap-1">✨ Perbaiki dg AI</button>
                                                    </div>
                                                    <textarea wire:model.blur="data.experience.{{ $index }}.description" rows="3" placeholder="Tulis deskripsi pencapaian Anda..." class="w-full px-4 py-2 bg-slate-50 border-none rounded-xl text-sm outline-none"></textarea>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if($section === 'education')
                                <!-- Education -->
                                <div class="bg-slate-50 rounded-2xl border border-slate-100 overflow-hidden">
                                    <div class="w-full px-6 py-4 flex items-center justify-between hover:bg-slate-100 transition-colors cursor-pointer group" @click="activeSection = activeSection === 'edu' ? '' : 'edu'">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center text-sm"><i class="fa-solid fa-graduation-cap"></i></div>
                                            <span class="font-bold text-slate-700">{{ $cur['education'] }}</span>
                                            <span class="bg-emerald-100 text-emerald-600 text-[10px] px-2 py-0.5 rounded-full font-bold">{{ count($data['education']) }}</span>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class="flex border rounded-lg overflow-hidden bg-white">
                                                <button type="button" wire:click.stop="moveSection('education', 'up')" @if($loop->first) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 border-r text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-up text-[10px]"></i></button>
                                                <button type="button" wire:click.stop="moveSection('education', 'down')" @if($loop->last) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-down text-[10px]"></i></button>
                                            </div>
                                            <i class="fa-solid fa-chevron-down text-slate-400 transition-transform" :class="activeSection === 'edu' ? 'rotate-180' : ''"></i>
                                        </div>
                                    </div>
                                    <div x-show="activeSection === 'edu'" x-collapse class="p-6 pt-0 space-y-4">
                                        <div class="flex justify-end pt-2">
                                            <button wire:click="addEducation" class="text-xs font-bold text-primary flex items-center gap-1"><i class="fa-solid fa-plus-circle"></i> Tambah</button>
                                        </div>
                                        @foreach($data['education'] as $index => $edu)
                                            <div class="bg-white p-4 rounded-xl border border-slate-200 relative">
                                                <button wire:click="removeEducation({{ $index }})" class="absolute top-4 right-4 text-slate-300 hover:text-rose-500"><i class="fa-solid fa-trash-can"></i></button>
                                                <div class="grid grid-cols-2 gap-3 mb-3">
                                                    <input type="text" wire:model.blur="data.education.{{ $index }}.school" placeholder="Sekolah/Univ" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                                                    <input type="text" wire:model.blur="data.education.{{ $index }}.degree" placeholder="Gelar/Jurusan" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                                                </div>
                                                <div class="grid grid-cols-2 gap-3">
                                                    <input type="text" wire:model.blur="data.education.{{ $index }}.period" placeholder="2016-2020" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                                                    <input type="text" wire:model.blur="data.education.{{ $index }}.location" placeholder="Lokasi" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                                                </div>
                                                <div class="mt-3">
                                                    <div class="flex justify-end mb-1">
                                                        <button type="button" @click="insertBullet($el.closest('.mt-3').querySelector('textarea'))" class="text-[9px] font-bold text-slate-400 hover:text-primary transition-colors flex items-center gap-1">
                                                            <i class="fa-solid fa-list-ul"></i> Bullet
                                                        </button>
                                                    </div>
                                                    <textarea wire:model.blur="data.education.{{ $index }}.description" rows="2" placeholder="Deskripsi/Pencapaian (Opsional)" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm"></textarea>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if($section === 'organizations')
                                <!-- Organizations -->
                                <div class="bg-slate-50 rounded-2xl border border-slate-100 overflow-hidden">
                                    <div class="w-full px-6 py-4 flex items-center justify-between hover:bg-slate-100 transition-colors cursor-pointer group" @click="activeSection = activeSection === 'org' ? '' : 'org'">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center text-sm"><i class="fa-solid fa-users-rectangle"></i></div>
                                            <span class="font-bold text-slate-700">{{ $cur['organization'] ?? 'Riwayat Organisasi' }}</span>
                                            <span class="bg-amber-100 text-amber-600 text-[10px] px-2 py-0.5 rounded-full font-bold">{{ count($data['organizations']) }}</span>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class="flex border rounded-lg overflow-hidden bg-white">
                                                <button type="button" wire:click.stop="moveSection('organizations', 'up')" @if($loop->first) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 border-r text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-up text-[10px]"></i></button>
                                                <button type="button" wire:click.stop="moveSection('organizations', 'down')" @if($loop->last) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-down text-[10px]"></i></button>
                                            </div>
                                            <i class="fa-solid fa-chevron-down text-slate-400 transition-transform" :class="activeSection === 'org' ? 'rotate-180' : ''"></i>
                                        </div>
                                    </div>
                                    <div x-show="activeSection === 'org'" x-collapse class="p-6 pt-0 space-y-4">
                                        <div class="flex justify-end pt-2">
                                            <button wire:click="addOrganization" class="text-xs font-bold text-primary flex items-center gap-1"><i class="fa-solid fa-plus-circle"></i> Tambah</button>
                                        </div>
                                        @foreach($data['organizations'] as $index => $org)
                                            <div class="bg-white p-4 rounded-xl border border-slate-200 relative">
                                                <button wire:click="removeOrganization({{ $index }})" class="absolute top-4 right-4 text-slate-300 hover:text-rose-500"><i class="fa-solid fa-trash-can"></i></button>
                                                <div class="grid grid-cols-2 gap-3 mb-3">
                                                    <input type="text" wire:model.blur="data.organizations.{{ $index }}.name" placeholder="Organisasi" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                                                    <input type="text" wire:model.blur="data.organizations.{{ $index }}.position" placeholder="Jabatan" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                                                </div>
                                                <input type="text" wire:model.blur="data.organizations.{{ $index }}.period" placeholder="Periode" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if($section === 'projects')
                                <!-- Projects -->
                                <div class="bg-slate-50 rounded-2xl border border-slate-100 overflow-hidden">
                                    <div class="w-full px-6 py-4 flex items-center justify-between hover:bg-slate-100 transition-colors cursor-pointer group" @click="activeSection = activeSection === 'proj' ? '' : 'proj'">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center text-sm"><i class="fa-solid fa-code"></i></div>
                                            <span class="font-bold text-slate-700">{{ $cur['projects'] ?? 'Proyek' }}</span>
                                            <span class="bg-blue-100 text-blue-600 text-[10px] px-2 py-0.5 rounded-full font-bold">{{ count($data['projects']) }}</span>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class="flex border rounded-lg overflow-hidden bg-white">
                                                <button type="button" wire:click.stop="moveSection('projects', 'up')" @if($loop->first) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 border-r text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-up text-[10px]"></i></button>
                                                <button type="button" wire:click.stop="moveSection('projects', 'down')" @if($loop->last) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-down text-[10px]"></i></button>
                                            </div>
                                            <i class="fa-solid fa-chevron-down text-slate-400 transition-transform" :class="activeSection === 'proj' ? 'rotate-180' : ''"></i>
                                        </div>
                                    </div>
                                    <div x-show="activeSection === 'proj'" x-collapse class="p-6 pt-0 space-y-4">
                                        <div class="flex justify-end pt-2">
                                            <button wire:click="addProject" class="text-xs font-bold text-primary flex items-center gap-1"><i class="fa-solid fa-plus-circle"></i> Tambah</button>
                                        </div>
                                        @foreach($data['projects'] as $index => $proj)
                                            <div class="bg-white p-4 rounded-xl border border-slate-200 relative">
                                                <button wire:click="removeProject({{ $index }})" class="absolute top-4 right-4 text-slate-300 hover:text-rose-500"><i class="fa-solid fa-trash-can"></i></button>
                                                <div class="mb-3">
                                                    <input type="text" wire:model.blur="data.projects.{{ $index }}.name" placeholder="Nama Proyek" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" wire:model.blur="data.projects.{{ $index }}.link" placeholder="Link Proyek (Opsional)" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                                                </div>
                                                <div class="flex justify-end mb-1">
                                                    <button type="button" @click="insertBullet($el.closest('.bg-white').querySelector('textarea'))" class="text-[9px] font-bold text-slate-400 hover:text-primary transition-colors flex items-center gap-1">
                                                        <i class="fa-solid fa-list-ul"></i> Bullet
                                                    </button>
                                                </div>
                                                <textarea wire:model.blur="data.projects.{{ $index }}.description" rows="2" placeholder="Deskripsi Singkat" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm"></textarea>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if($section === 'certifications')
                                <!-- Certifications & Training -->
                                <div class="bg-slate-50 rounded-2xl border border-slate-100 overflow-hidden">
                                    <div class="w-full px-6 py-4 flex items-center justify-between hover:bg-slate-100 transition-colors cursor-pointer group" @click="activeSection = activeSection === 'cert' ? '' : 'cert'">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-rose-100 text-rose-600 rounded-lg flex items-center justify-center text-sm"><i class="fa-solid fa-certificate"></i></div>
                                            <span class="font-bold text-slate-700">Sertifikasi & Pelatihan</span>
                                            <span class="bg-rose-100 text-rose-600 text-[10px] px-2 py-0.5 rounded-full font-bold">{{ count($data['certifications']) }}</span>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class="flex border rounded-lg overflow-hidden bg-white">
                                                <button type="button" wire:click.stop="moveSection('certifications', 'up')" @if($loop->first) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 border-r text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-up text-[10px]"></i></button>
                                                <button type="button" wire:click.stop="moveSection('certifications', 'down')" @if($loop->last) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-down text-[10px]"></i></button>
                                            </div>
                                            <i class="fa-solid fa-chevron-down text-slate-400 transition-transform" :class="activeSection === 'cert' ? 'rotate-180' : ''"></i>
                                        </div>
                                    </div>
                                    <div x-show="activeSection === 'cert'" x-collapse class="p-6 pt-0 space-y-4">
                                        <div class="flex justify-end pt-2">
                                            <button wire:click="addCertification" class="text-xs font-bold text-primary flex items-center gap-1"><i class="fa-solid fa-plus-circle"></i> Tambah</button>
                                        </div>
                                        @foreach($data['certifications'] as $index => $cert)
                                            <div class="bg-white p-4 rounded-xl border border-slate-200 relative">
                                                <button wire:click="removeCertification({{ $index }})" class="absolute top-4 right-4 text-slate-300 hover:text-rose-500"><i class="fa-solid fa-trash-can"></i></button>
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
                                                    <input type="text" wire:model.blur="data.certifications.{{ $index }}.name" placeholder="Nama Sertifikat/Pelatihan" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                                                    <input type="text" wire:model.blur="data.certifications.{{ $index }}.issuer" placeholder="Lembaga Penerbit" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                                                </div>
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
                                                    <input type="text" wire:model.blur="data.certifications.{{ $index }}.date" placeholder="Waktu (Misal: 2023)" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                                                    <input type="text" wire:model.blur="data.certifications.{{ $index }}.link" placeholder="Link Sertifikat (Opsional)" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm">
                                                </div>
                                                <div class="flex justify-end mb-1 gap-2">
                                                    <button type="button" @click="insertBullet($el.closest('.bg-white').querySelector('textarea'))" class="text-[9px] font-bold text-slate-400 hover:text-primary transition-colors flex items-center gap-1">
                                                        <i class="fa-solid fa-list-ul"></i> Bullet
                                                    </button>
                                                    <button wire:click="polishCertification({{ $index }})" wire:loading.attr="disabled" class="text-[9px] font-bold text-primary flex items-center gap-1">✨ AI Polish</button>
                                                </div>
                                                <textarea wire:model.blur="data.certifications.{{ $index }}.description" rows="2" placeholder="Detail Pencapaian (Opsional)" class="w-full px-3 py-2 bg-slate-50 border-none rounded-lg text-sm"></textarea>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if($section === 'skills')
                                <!-- Skills -->
                                <div class="bg-slate-50 rounded-2xl border border-slate-100 overflow-hidden">
                                    <div class="w-full px-6 py-4 flex items-center justify-between hover:bg-slate-100 transition-colors cursor-pointer group" @click="activeSection = activeSection === 'skills' ? '' : 'skills'">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center text-sm"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                                            <span class="font-bold text-slate-700">{{ $cur['skills'] }}</span>
                                            <span class="bg-indigo-100 text-indigo-600 text-[10px] px-2 py-0.5 rounded-full font-bold">{{ count($data['skills']) }}</span>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class="flex border rounded-lg overflow-hidden bg-white">
                                                <button type="button" wire:click.stop="moveSection('skills', 'up')" @if($loop->first) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 border-r text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-up text-[10px]"></i></button>
                                                <button type="button" wire:click.stop="moveSection('skills', 'down')" @if($loop->last) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-down text-[10px]"></i></button>
                                            </div>
                                            <i class="fa-solid fa-chevron-down text-slate-400 transition-transform" :class="activeSection === 'skills' ? 'rotate-180' : ''"></i>
                                        </div>
                                    </div>
                                    <div x-show="activeSection === 'skills'" x-collapse class="p-6 pt-0">
                                        <div class="flex justify-end pt-2 mb-4">
                                            <button wire:click="addSkill" class="text-xs font-bold text-primary flex items-center gap-1"><i class="fa-solid fa-plus-circle"></i> Tambah</button>
                                        </div>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($data['skills'] as $index => $skill)
                                                <div class="flex items-center gap-2 bg-white px-3 py-1.5 rounded-xl border border-slate-200">
                                                    <input type="text" wire:model.blur="data.skills.{{ $index }}" placeholder="Skill" class="bg-transparent border-none text-xs font-medium outline-none w-24">
                                                    <button wire:click="removeSkill({{ $index }})" class="text-slate-300 hover:text-rose-500"><i class="fa-solid fa-xmark"></i></button>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($section === 'languages')
                                <!-- Languages -->
                                <div class="bg-slate-50 rounded-2xl border border-slate-100 overflow-hidden">
                                    <div class="w-full px-6 py-4 flex items-center justify-between hover:bg-slate-100 transition-colors cursor-pointer group" @click="activeSection = activeSection === 'lang' ? '' : 'lang'">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-violet-100 text-violet-600 rounded-lg flex items-center justify-center text-sm"><i class="fa-solid fa-language"></i></div>
                                            <span class="font-bold text-slate-700">{{ $cur['languages'] }}</span>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <div class="flex border rounded-lg overflow-hidden bg-white">
                                                <button type="button" wire:click.stop="moveSection('languages', 'up')" @if($loop->first) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 border-r text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-up text-[10px]"></i></button>
                                                <button type="button" wire:click.stop="moveSection('languages', 'down')" @if($loop->last) disabled class="opacity-30 p-1 px-2 text-slate-400" @else class="p-1 px-2 hover:bg-slate-50 text-slate-400 hover:text-primary transition-all" @endif><i class="fa-solid fa-chevron-down text-[10px]"></i></button>
                                            </div>
                                            <i class="fa-solid fa-chevron-down text-slate-400 transition-transform" :class="activeSection === 'lang' ? 'rotate-180' : ''"></i>
                                        </div>
                                    </div>
                                    <div x-show="activeSection === 'lang'" x-collapse class="p-6 pt-0 space-y-3">
                                        <div class="flex justify-end pt-2">
                                            <button wire:click="addLanguage" class="text-xs font-bold text-primary flex items-center gap-1"><i class="fa-solid fa-plus-circle"></i> Tambah</button>
                                        </div>
                                        @foreach($data['languages'] as $index => $lang)
                                            <div class="flex items-center gap-3 bg-white p-3 rounded-xl border border-slate-200">
                                                <input type="text" wire:model.blur="data.languages.{{ $index }}.name" placeholder="Bahasa" class="flex-1 bg-slate-50 border-none rounded-lg text-sm px-3 py-1.5">
                                                <input type="text" wire:model.blur="data.languages.{{ $index }}.level" placeholder="Level (Misal: Native/Pro)" class="flex-1 bg-slate-50 border-none rounded-lg text-sm px-3 py-1.5">
                                                <button wire:click="removeLanguage({{ $index }})" class="text-slate-300 hover:text-rose-500"><i class="fa-solid fa-trash-can"></i></button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="mt-12 flex justify-between items-center bg-primary/5 p-6 rounded-3xl border border-primary/10">
                         <button wire:click="save" class="bg-slate-800 text-white font-bold py-3 px-8 rounded-2xl hover:scale-105 transition-all text-sm">Simpan Progress</button>
                         <button wire:click="nextStep" class="bg-primary text-white font-bold py-3 px-10 rounded-2xl shadow-xl shadow-primary/20 hover:scale-105 transition-all flex items-center gap-2 group">
                            Lanjut ke Desain <i class="fa-solid fa-arrow-right transition-transform group-hover:translate-x-1"></i>
                         </button>
                    </div> <!-- Close mt-12 -->
                </div> <!-- Close Inner bg-white -->
                </div> <!-- Close Step 1 Wrapper -->

                <!-- STEP 2: DESIGN PANEL -->
                <div x-show="step === 2" class="space-y-6">
                    <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl border border-slate-100 p-4 sm:p-6 lg:p-8">
                            <h3 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-2">
                                <i class="fa-solid fa-palette text-primary"></i> Pilih Desain CV
                            </h3>
                            
                            <!-- Detailed Language Selector -->
                            <div class="mb-8 p-4 bg-slate-50 rounded-2xl">
                                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-3">Language & Content Style</label>
                                <div class="grid grid-cols-2 gap-2">
                                    <button wire:click="$set('data.language', 'id')" class="py-2 text-[10px] font-bold rounded-xl border transition-all {{ $data['language'] === 'id' ? 'bg-primary text-white border-primary shadow-lg shadow-primary/20' : 'bg-white text-slate-600 border-slate-200 hover:border-primary' }}">BHS. INDONESIA</button>
                                    <button wire:click="$set('data.language', 'en')" class="py-2 text-[10px] font-bold rounded-xl border transition-all {{ $data['language'] === 'en' ? 'bg-primary text-white border-primary shadow-lg shadow-primary/20' : 'bg-white text-slate-600 border-slate-200 hover:border-primary' }}">ENGLISH (US)</button>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                @php
                                    $templates = [
                                        ['id' => 'cv_ats_001', 'name' => 'CV ATS 001', 'color' => 'blue-600', 'desc' => 'Professional Minimalist'],
                                        ['id' => 'cv_ats_002', 'name' => 'CV ATS 002', 'color' => 'slate-900', 'desc' => 'Classic Serif'],
                                        ['id' => 'cv_ats_003', 'name' => 'CV ATS 003', 'color' => 'emerald-700', 'desc' => 'Modern Bold'],
                                        ['id' => 'cv_ats_004', 'name' => 'CV ATS 004', 'color' => 'slate-800', 'desc' => 'Compact Data-Driven'],
                                    ];
                                @endphp

                                @foreach($templates as $tpl)
                                    <button wire:click="$set('data.template', '{{ $tpl['id'] }}')" class="p-4 rounded-2xl border-2 transition-all flex flex-col items-start gap-1 group relative overflow-hidden {{ $data['template'] === $tpl['id'] ? 'border-primary bg-primary/5' : 'border-slate-50 hover:border-slate-200 bg-white' }}">
                                        @if($data['template'] === $tpl['id']) <div class="absolute top-2 right-2 text-primary text-xs"><i class="fa-solid fa-circle-check"></i></div> @endif
                                        <div class="text-[11px] font-black uppercase text-slate-800">{{ $tpl['name'] }}</div>
                                        <div class="text-[9px] text-slate-400 font-medium">{{ $tpl['desc'] }}</div>
                                    </button>
                                @endforeach
                            </div>

                            <div class="mt-10 space-y-3">
                                <button @click="if (!@js(auth()->user()->is_premium) && @js($data['template']) !== 'cv_ats_001') { showUpgradeModal = true } else { window.print() }" class="w-full bg-slate-800 text-white font-bold py-4 px-6 rounded-2xl flex items-center justify-center gap-2 shadow-xl shadow-slate-200 hover:scale-[1.02] transition-all">
                                    <i class="fa-solid fa-file-pdf"></i> Download PDF CV
                                </button>
                                <button wire:click="prevStep" class="w-full bg-white text-slate-500 font-bold py-3 px-6 rounded-2xl border border-slate-200 hover:bg-slate-50 transition-all text-xs uppercase tracking-widest">
                                    <i class="fa-solid fa-arrow-left mr-1"></i> Edit Data Kembali
                                </button>
                            </div> <!-- Close mt-10 -->
                    </div> <!-- Close Step 2 Inner -->
                </div> <!-- Close Step 2 Wrapper -->
            </div> <!-- Close Left Panel -->

            <!-- RIGHT PANEL: PREVIEW -->
            @if($step === 2)
            <div class="w-full lg:flex-1 min-w-0 lg:sticky lg:top-8 order-1 lg:order-2">
                 <div class="bg-white rounded-2xl sm:rounded-3xl shadow-2xl border border-slate-200/60 overflow-hidden relative cv-wrapper">
                    <div class="bg-slate-50 border-b border-slate-100 p-3 sm:p-4 flex justify-between items-center no-print">
                        <div class="flex items-center gap-2 text-slate-400 font-bold text-[10px] uppercase tracking-widest">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Live Render
                        </div>
                        @if(!auth()->user()->is_premium && $data['template'] !== 'cv_ats_001')
                            <div class="text-[10px] font-bold text-rose-500 flex items-center gap-1 uppercase tracking-wider bg-rose-50 px-2 sm:px-3 py-1 rounded-full border border-rose-100 italic">
                                <i class="fa-solid fa-crown text-[8px]"></i> Premium
                            </div>
                        @endif
                    </div>
                    <div class="cv-scale-wrapper">
                        <div class="px-[var(--cv-pad-x)] mx-auto min-h-[297mm] w-[210mm] text-slate-900 leading-relaxed bg-white shadow-2xl transition-all duration-300" 
                             style="font-family: Arial, Helvetica, sans-serif; --cv-pad-x: 15mm; --cv-pad-y: 15mm; padding-top: var(--cv-pad-y); padding-bottom: var(--cv-pad-y);" 
                             id="cv-preview">
                              <table class="w-full border-separate" style="border-spacing: 0;">
                                 <thead>
                                     <tr>
                                         <td class="print-page-spacer">
                                             <div style="height: 15mm;">&nbsp;</div>
                                         </td>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr>
                                         <td class="p-0">
                                             @include('livewire.member.cv-templates.' . $data['template'], [
                                                 'data' => $data,
                                                 'labels' => $cur,
                                                 'photo' => $photo
                                             ])
                                         </td>
                                     </tr>
                                 </tbody>
                                 <tfoot>
                                     <tr>
                                         <td class="print-page-spacer">
                                             <div style="height: 15mm;">&nbsp;</div>
                                         </td>
                                     </tr>
                                 </tfoot>
                              </table>
                        </div>
                    </div>
                 </div>
            </div>
            @endif
        </div>


        @include('livewire.member.cv-editor-styles')
        @include('livewire.member.cv-editor-scripts')

        <!-- Upgrade Modal -->
        <div x-show="showUpgradeModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm no-print">
            <div @click.away="showUpgradeModal = false" class="bg-white rounded-3xl shadow-2xl overflow-hidden max-w-sm w-full transform transition-all border border-slate-100">
                <div class="relative h-32 bg-primary flex items-center justify-center overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-purple-800 opacity-90"></div>
                    <i class="fa-solid fa-crown text-white text-5xl relative z-10 shadow-sm"></i>
                </div>
                <div class="p-8 text-center text-slate-800">
                    <h3 class="text-2xl font-bold mb-2">Gunakan Fitur Premium</h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-8">
                        Template <span class="text-slate-900 font-bold uppercase">{{ $data['template'] }}</span> adalah fitur premium. 
                        Aktifkan sekarang hanya dengan <strong>Rp 19.000</strong>!
                    </p>
                    <div class="space-y-3">
                        <a href="{{ route('member.payment') }}" class="w-full bg-primary text-white font-bold py-3 rounded-2xl flex items-center justify-center gap-2 shadow-lg shadow-blue-500/20">
                            <i class="fa-solid fa-credit-card"></i> Bayar Sekarang
                        </a>
                        <button @click="showUpgradeModal = false" class="text-xs font-bold text-slate-400 uppercase tracking-widest py-2">Nanti Saja</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
