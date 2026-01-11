<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 italic">Manajemen <span class="text-blue-600 underline">Blog</span></h1>
            <p class="text-slate-500 text-sm">Tulis dan kelola artikel edukatif untuk SEO yang lebih baik.</p>
        </div>
        <button wire:click="create" class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold transition-all flex items-center justify-center gap-2 shadow-lg shadow-blue-500/20">
            <i class="fa-solid fa-plus text-xs"></i> Tulis Artikel
        </button>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-600 rounded-xl font-bold flex items-center gap-3">
            <i class="fa-solid fa-circle-check"></i> {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-6 p-4 bg-rose-50 border border-rose-100 text-rose-600 rounded-xl font-bold flex items-center gap-3">
            <i class="fa-solid fa-circle-exclamation"></i> {{ session('error') }}
        </div>
@endif

    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100 hidden md:table-row">
                    <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">Artikel</th>
                    <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">Kategori</th>
                    <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">Status</th>
                    <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">Tanggal</th>
                    <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($posts as $post)
                    <tr class="hover:bg-slate-50/50 transition-colors flex flex-col md:table-row p-4 md:p-0 border-b md:border-b-0 border-slate-100">
                        <td class="px-0 md:px-6 py-2 md:py-4">
                            <div class="flex items-center gap-4">
                                @if($post->featured_image)
                                    <img src="{{ storage_url($post->featured_image) }}" class="w-12 h-12 rounded-lg object-cover border border-slate-100">
                                @else
                                    <div class="w-12 h-12 rounded-lg bg-slate-100 flex items-center justify-center text-slate-300">
                                        <i class="fa-solid fa-image"></i>
                                    </div>
                                @endif
                                <div class="overflow-hidden">
                                    <div class="font-bold text-slate-900 leading-tight truncate">{{ $post->title }}</div>
                                    <div class="text-[10px] text-slate-400 font-medium truncate">/blog/{{ $post->slug }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-0 md:px-6 py-2 md:py-4">
                            <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-[10px] font-black uppercase">
                                {{ $post->category?->name ?? 'Uncategorized' }}
                            </span>
                        </td>
                        <td class="px-0 md:px-6 py-2 md:py-4">
                            @if($post->is_published)
                                <span class="text-emerald-500 font-bold text-xs flex items-center gap-1">
                                    <i class="fa-solid fa-circle text-[8px]"></i> Terbit
                                </span>
                            @else
                                <span class="text-slate-400 font-bold text-xs flex items-center gap-1">
                                    <i class="fa-solid fa-circle text-[8px]"></i> Draft
                                </span>
                            @endif
                        </td>
                        <td class="px-0 md:px-6 py-2 md:py-4 text-sm text-slate-500 font-medium">
                            {{ $post->created_at->format('d/m/Y') }}
                        </td>
                        <td class="px-0 md:px-6 py-4 md:py-4 text-left md:text-right mt-2 md:mt-0 border-t md:border-t-0 border-slate-50 pt-4 md:pt-4">
                            <div class="flex justify-start md:justify-end gap-2">
                                <button wire:click="edit({{ $post->id }})" class="p-3 text-slate-400 hover:text-blue-600 transition-colors">
                                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                                </button>
                                <button onclick="confirm('Hapus artikel ini?') || event.stopImmediatePropagation()" wire:click="delete({{ $post->id }})" class="p-3 text-slate-400 hover:text-rose-600 transition-colors">
                                    <i class="fa-solid fa-trash text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-400 italic">Belum ada artikel.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-4 border-t border-slate-50">
            {{ $posts->links() }}
        </div>
    </div>

    @if($isOpen)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm">
            <div class="bg-white w-full max-w-4xl rounded-3xl shadow-2xl overflow-hidden flex flex-col max-h-[90vh]">
                <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50">
                    <h2 class="text-xl font-bold text-slate-900 italic">
                        {{ $form->id ? 'Edit' : 'Tulis' }} <span class="text-blue-600 underlined">Artikel Blog</span>
                    </h2>
                    <button wire:click="closeModal" class="text-slate-400 hover:text-slate-600 transition-colors">
                        <i class="fa-solid fa-xmark text-xl"></i>
                    </button>
                </div>

                @if (session()->has('error') || $errors->any())
                    <div class="px-8 py-4 bg-rose-50 border-b border-rose-100">
                        @if (session()->has('error'))
                            <div class="text-rose-600 font-bold mb-2 flex items-center gap-2">
                                <i class="fa-solid fa-circle-exclamation"></i> {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <ul class="list-disc list-inside text-rose-600 text-xs font-bold space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endif
                
                <form wire:submit="store" class="p-8 overflow-y-auto space-y-6"
                      x-data="{ 
                          autoSlug: {{ $form->id ? 'false' : 'true' }},
                          slugify(text) {
                              return text.toLowerCase()
                                  .replace(/[^\w\s-]/g, '')
                                  .replace(/[\s_-]+/g, '-')
                                  .replace(/^-+|-+$/g, '');
                          }
                      }">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-xs font-black text-slate-500 uppercase tracking-widest">Judul Artikel</label>
                            <input type="text" wire:model="form.title" 
                                   @input="if(autoSlug) $wire.set('form.slug', slugify($event.target.value))"
                                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition-all font-bold text-slate-900" placeholder="Masukkan judul menarik...">
                            @error('form.title') <span class="text-rose-500 text-xs font-bold">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-black text-slate-500 uppercase tracking-widest">Slug (URL)</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm">/blog/</span>
                                <input type="text" wire:model="form.slug" 
                                       @input="autoSlug = false"
                                       class="w-full pl-16 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition-all font-medium text-slate-600" placeholder="slug-artikel">
                            </div>
                            @error('form.slug') <span class="text-rose-500 text-xs font-bold">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-black text-slate-500 uppercase tracking-widest">Kategori</label>
                            <select wire:model="form.category_id" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition-all font-bold text-slate-900">
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('form.category_id') <span class="text-rose-500 text-xs font-bold">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-black text-slate-500 uppercase tracking-widest">Ringkasan (Excerpt)</label>
                        <textarea wire:model="form.excerpt" rows="2" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition-all text-slate-600 leading-relaxed" placeholder="Tulis ringkasan singkat untuk hasil pencarian..."></textarea>
                        @error('form.excerpt') <span class="text-rose-500 text-xs font-bold">{{ $message }}</span> @enderror
                    </div>

                    <div class="space-y-2" wire:ignore
                         x-data="{ 
                            content: @entangle('form.content'),
                            quill: null,
                            init() {
                                if (this.quill) return;
                                
                                // Register ImageResize module
                                if (typeof ImageResize !== 'undefined' && !Quill.imports['modules/imageResize']) {
                                    Quill.register('modules/imageResize', ImageResize);
                                }
                                
                                this.quill = new Quill($refs.editor, {
                                    theme: 'snow',
                                    placeholder: 'Tulis konten lengkap artikel Anda di sini...',
                                    modules: {
                                        toolbar: [
                                            [{ 'header': [1, 2, 3, false] }],
                                            ['bold', 'italic', 'underline', 'strike'],
                                            ['link', 'blockquote', 'code-block', 'image'],
                                            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                                            ['clean']
                                        ],
                                        imageResize: {
                                            displaySize: true,
                                            modules: [ 'Resize', 'DisplaySize', 'Toolbar' ]
                                        }
                                    }
                                });

                                if (this.content) {
                                    this.quill.root.innerHTML = this.content;
                                }

                                this.quill.on('text-change', () => {
                                    this.content = this.quill.root.innerHTML;
                                });

                                // Custom Image Handler for Server-side Upload
                                this.quill.getModule('toolbar').addHandler('image', () => {
                                    const input = document.createElement('input');
                                    input.setAttribute('type', 'file');
                                    input.setAttribute('accept', 'image/*');
                                    input.click();

                                    input.onchange = async () => {
                                        const file = input.files[0];
                                        if (!file) return;

                                        const formData = new FormData();
                                        formData.append('image', file);
                                        formData.append('_token', '{{ csrf_token() }}');

                                        try {
                                            const response = await fetch('{{ route("admin.blog.upload-image") }}', {
                                                method: 'POST',
                                                body: formData
                                            });

                                            if (!response.ok) throw new Error('Upload failed');

                                            const result = await response.json();
                                            const range = this.quill.getSelection();
                                            this.quill.insertEmbed(range ? range.index : 0, 'image', result.url);
                                        } catch (error) {
                                            console.error('Error uploading image:', error);
                                            alert('Gagal mengunggah gambar. Silakan coba lagi.');
                                        }
                                    };
                                });

                                this.$watch('content', value => {
                                    if (value !== this.quill.root.innerHTML) {
                                        this.quill.root.innerHTML = value || '';
                                    }
                                });

                                window.addEventListener('content-reset', () => {
                                    this.quill.root.innerHTML = '';
                                });

                                window.addEventListener('post-edit', event => {
                                    this.quill.root.innerHTML = event.detail.content || '';
                                });
                            }
                         }">
                        <label class="text-xs font-black text-slate-500 uppercase tracking-widest">Isi Konten</label>
                        <div x-ref="editor" class="bg-slate-50 border border-slate-200 rounded-xl overflow-hidden min-h-[300px]" style="font-family: 'Inter', sans-serif;"></div>
                        @error('form.content') <span class="text-rose-500 text-xs font-bold">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-end">
                        <div class="space-y-4">
                            <label class="text-xs font-black text-slate-500 uppercase tracking-widest">Gambar Unggulan</label>
                            
                            <div class="flex items-start gap-4">
                                @if ($tempImage)
                                    <div class="w-32 h-32 rounded-xl overflow-hidden border-2 border-blue-600 shadow-lg relative bg-slate-100 flex-shrink-0">
                                        <img src="{{ $tempImage->temporaryUrl() }}" class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-blue-600/10 flex items-center justify-center">
                                            <i class="fa-solid fa-spinner fa-spin text-white"></i>
                                        </div>
                                    </div>
                                @elseif ($form->featured_image)
                                    <div class="w-32 h-32 rounded-xl overflow-hidden border border-slate-200 shadow-sm bg-slate-100 flex-shrink-0">
                                        <img src="{{ storage_url($form->featured_image) }}" class="w-full h-full object-cover">
                                    </div>
                                @else
                                    <div class="w-32 h-32 rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 flex items-center justify-center text-slate-300 flex-shrink-0">
                                        <i class="fa-solid fa-image text-3xl"></i>
                                    </div>
                                @endif

                                <div class="flex-1">
                                    <input type="file" wire:model="tempImage" id="tempImage" class="hidden">
                                    <label for="tempImage" class="cursor-pointer inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm font-bold text-slate-700 hover:bg-slate-50 shadow-sm transition-all">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                        {{ $form->featured_image ? 'Ganti Foto' : 'Pilih Foto' }}
                                    </label>
                                    <p class="mt-2 text-[10px] text-slate-400 font-medium">PNG, JPG atau WEBP (Maks. 2MB)</p>
                                    <div wire:loading wire:target="tempImage" class="mt-2 text-[10px] text-blue-600 font-bold">
                                        <i class="fa-solid fa-sync fa-spin"></i> Sedang mengunggah...
                                    </div>
                                </div>
                            </div>
                            @error('tempImage') <span class="text-rose-500 text-xs font-bold">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center gap-3 pb-3">
                            <input type="checkbox" wire:model="form.is_published" id="is_published" class="w-5 h-5 rounded border-slate-300 text-blue-600 focus:ring-blue-600 transition-all">
                            <label for="is_published" class="text-sm font-bold text-slate-700 cursor-pointer">Terbitkan Sekarang</label>
                        </div>
                    </div>

                    <div class="pt-4 flex justify-end gap-4">
                        <button type="button" wire:click="closeModal" class="px-6 py-3 font-bold text-slate-400 hover:text-slate-600 transition-colors">Batal</button>
                        <button type="submit" class="px-10 py-3 bg-blue-600 text-white font-bold rounded-xl shadow-lg shadow-blue-500/20 hover:bg-blue-700 transition-all">
                            <span wire:loading.remove>Simpan Artikel</span>
                            <span wire:loading>Memproses...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
