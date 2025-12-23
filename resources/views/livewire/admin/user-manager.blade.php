<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    @if (session()->has('message'))
        <div class="bg-emerald-50 border-emerald-500 text-emerald-900 px-6 py-4 border-b" role="alert">
            <p class="text-sm font-bold flex items-center gap-2">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('message') }}
            </p>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-rose-50 border-rose-500 text-rose-900 px-6 py-4 border-b" role="alert">
            <p class="text-sm font-bold flex items-center gap-2">
                <i class="fa-solid fa-circle-xmark"></i>
                {{ session('error') }}
            </p>
        </div>
    @endif

    <div class="p-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8">
            <div>
                <h3 class="text-xl font-outfit font-bold text-slate-800 tracking-tight">Manajemen User</h3>
                <p class="text-slate-500 text-sm mt-1">Kelola akun administrator dan staff yang memiliki akses ke dashboard.</p>
            </div>
            <button wire:click="create()" class="bg-primary hover:bg-rose-700 text-white font-bold py-2.5 px-6 rounded-xl shadow-lg shadow-rose-200 transition-all flex items-center gap-2">
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
                    class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 rounded-xl text-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" 
                    placeholder="Cari user (nama atau email)...">
            </div>
        </div>

        <div class="overflow-x-auto rounded-xl border border-slate-100">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50">
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-100">User</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-100">Role</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-100 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($users as $user)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center font-bold text-sm">
                                        {{ strtoupper(substr($user->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-800">{{ $user->name }}</div>
                                        <div class="text-xs text-slate-500">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold {{ $user->role === 'admin' ? 'bg-amber-100 text-amber-700' : 'bg-slate-100 text-slate-600' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center items-center gap-2">
                                    <button wire:click="edit({{ $user->id }})" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    @if($user->id !== auth()->id())
                                        <button wire:click="delete({{ $user->id }})" 
                                            onclick="confirm('Apakah Anda yakin ingin menghapus user ini?') || event.stopImmediatePropagation()"
                                            class="p-2 text-rose-600 hover:bg-rose-50 rounded-lg transition-colors" title="Hapus">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-10 text-center text-slate-400 italic">Data user tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>

    <!-- Modal -->
    @if($isOpen)
        <div class="fixed inset-0 z-[60] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-slate-900 bg-opacity-75 transition-opacity" aria-hidden="true" wire:click="closeModal"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-slate-200">
                    <form wire:submit.prevent="store">
                        <div class="bg-white px-8 pt-8 pb-6">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-xl font-outfit font-bold text-slate-800" id="modal-title">
                                    {{ $isEdit ? 'Update User' : 'Tambah User Baru' }}
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
                                    @error('form.name') <span class="text-rose-600 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Email</label>
                                    <input type="email" wire:model="form.email" 
                                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                        placeholder="nama@email.com">
                                    @error('form.email') <span class="text-rose-600 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Password {{ $isEdit ? '(Kosongkan jika tidak ingin diubah)' : '' }}</label>
                                    <input type="password" wire:model="form.password" 
                                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                        placeholder="Minimal 6 karakter">
                                    @error('form.password') <span class="text-rose-600 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Level / Role</label>
                                    <select wire:model="form.role" 
                                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all appearance-none">
                                        <option value="user">User / Staff</option>
                                        <option value="admin">Administrator</option>
                                    </select>
                                    @error('form.role') <span class="text-rose-600 text-xs mt-1 block font-medium">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="bg-slate-50 px-8 py-6 flex flex-row-reverse gap-3">
                            <button type="submit" 
                                class="inline-flex justify-center px-6 py-2.5 bg-primary text-white text-sm font-bold rounded-xl shadow-lg shadow-rose-200 hover:bg-rose-700 transition-all">
                                {{ $isEdit ? 'Update Akun' : 'Selesaikan & Buat' }}
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
    @endif
</div>
