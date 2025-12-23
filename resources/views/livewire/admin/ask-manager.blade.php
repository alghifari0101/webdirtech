<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    @if (session()->has('message'))
        <div class="bg-emerald-50 border-emerald-500 text-emerald-900 px-6 py-4 border-b" role="alert">
            <p class="text-sm font-bold flex items-center gap-2">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('message') }}
            </p>
        </div>
    @endif

    <div class="p-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8">
            <div>
                <h3 class="text-xl font-outfit font-bold text-slate-800 tracking-tight">Daftar Pertanyaan & Jawaban</h3>
                <p class="text-slate-500 text-sm mt-1">Kelola tanya jawab yang akan tampil di halaman utama dan halaman Ask.</p>
            </div>
            <button wire:click="create()" class="bg-primary hover:bg-rose-700 text-white font-bold py-2.5 px-6 rounded-xl shadow-lg shadow-rose-200 transition-all flex items-center gap-2">
                <i class="fa-solid fa-plus text-sm"></i>
                Tambah Tanya Jawab
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50 text-slate-600 text-sm uppercase tracking-wider font-bold">
                        <th class="px-6 py-4 w-16">No.</th>
                        <th class="px-6 py-4">Pertanyaan</th>
                        <th class="px-6 py-4">Jawaban</th>
                        <th class="px-6 py-4 w-40 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($asks as $ask)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-6 py-4 font-medium text-slate-400">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-slate-800 font-semibold">{{ $ask->question }}</td>
                            <td class="px-6 py-4 text-slate-600 leading-relaxed">{{ Str::limit($ask->answer, 120) }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button wire:click="edit({{ $ask->id }})" class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all shadow-sm">
                                        <i class="fa-solid fa-pen-to-square text-sm"></i>
                                    </button>
                                    <button wire:click="delete({{ $ask->id }})" class="w-9 h-9 flex items-center justify-center rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white transition-all shadow-sm">
                                        <i class="fa-solid fa-trash-can text-sm"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-slate-400 italic">Belum ada data tanya jawab. Klik tombol tambah untuk memulai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($isOpen)
        <div class="fixed inset-0 z-[60] overflow-y-auto" x-cloak>
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" wire:click="closeModal"></div>
                
                <div class="relative bg-white rounded-3xl shadow-2xl overflow-hidden w-full max-w-2xl transform transition-all border border-white">
                    <div class="bg-slate-50 px-8 py-6 border-b border-slate-100 flex justify-between items-center">
                        <h3 class="text-xl font-outfit font-bold text-slate-800">{{ $form->id ? 'Perbarui' : 'Tambah' }} Tanya Jawab</h3>
                        <button wire:click="closeModal" class="text-slate-400 hover:text-rose-600 transition-colors">
                            <i class="fa-solid fa-xmark text-xl"></i>
                        </button>
                    </div>

                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-slate-700 text-sm font-bold mb-2 ml-1" for="question">Pertanyaan</label>
                                <textarea id="question" wire:model="form.question" 
                                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-rose-500/10 focus:border-rose-500 transition-all text-slate-800 font-medium placeholder:text-slate-400"
                                    placeholder="Masukkan pertanyaan pelanggan..." rows="3"></textarea>
                                @error('form.question') <p class="mt-2 text-rose-500 text-xs font-bold pl-1 italic">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="block text-slate-700 text-sm font-bold mb-2 ml-1" for="answer">Jawaban</label>
                                <textarea id="answer" wire:model="form.answer" 
                                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-rose-500/10 focus:border-rose-500 transition-all text-slate-800 font-medium placeholder:text-slate-400"
                                    placeholder="Tuliskan jawaban lengkap di sini..." rows="8"></textarea>
                                @error('form.answer') <p class="mt-2 text-rose-500 text-xs font-bold pl-1 italic">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="px-8 py-6 bg-slate-50 border-t border-slate-100 flex justify-end gap-4">
                        <button wire:click="closeModal" class="px-6 py-2.5 rounded-xl font-bold text-slate-600 hover:bg-slate-200 transition-all">
                            Batal
                        </button>
                        <button wire:click.prevent="store" class="px-8 py-2.5 bg-primary hover:bg-rose-700 text-white font-bold rounded-xl shadow-lg shadow-rose-200 transition-all">
                            {{ $form->id ? 'Simpan Perubahan' : 'Tambahkan' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
