<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard - Dirtech' }}</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.svg') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/favicon.svg') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Outfit:wght@500;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Quill Rich Text Editor -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
    
    <!-- Tailwind CSS (via CDN for quick professional UI) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#e11d48',
                        secondary: '#1e293b',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        outfit: ['Outfit', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    @livewireStyles
    <style>
        [x-cloak] { display: none !important; }
        .sidebar-link.active {
            background-color: rgba(225, 29, 72, 0.1);
            border-right: 4px solid #e11d48;
            color: #e11d48;
        }
    </style>
</head>
<body class="bg-slate-50 font-sans text-[13px] text-slate-900 overflow-x-hidden" 
      x-data="{ sidebarOpen: true }">
    
    <!-- Sidebar -->
    <aside 
        class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl transition-transform duration-300 transform"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        :style="sidebarOpen ? 'transform: translateX(0)' : 'transform: translateX(-100%)'"
    >
        <div class="flex items-center h-20 px-6 bg-secondary text-white gap-4">
            <button @click="sidebarOpen = !sidebarOpen" class="text-white hover:text-rose-200 transition-colors">
                <i class="fa-solid fa-bars-staggered text-xl"></i>
            </button>
            <a href="/" class="flex items-center gap-2 font-outfit font-bold text-base tracking-wider">
                <i class="fa-solid fa-server text-primary"></i>
                DIRTECH <span class="text-xs font-normal opacity-70">ADMIN</span>
            </a>
        </div>

        <nav class="mt-2 px-2 space-y-0.5">
            <a href="{{ route('admin.dashboard') }}" 
               class="sidebar-link flex items-center gap-3 px-3 py-1 rounded-lg transition-all {{ request()->routeIs('admin.dashboard') ? 'active' : 'hover:bg-slate-100 text-slate-600' }}">
                <i class="fa-solid fa-gauge-high w-5"></i>
                <span class="font-medium">Dashboard</span>
            </a>
            
            <a href="{{ route('admin.posts') }}" 
               class="sidebar-link flex items-center gap-3 px-3 py-1 rounded-lg transition-all {{ request()->routeIs('admin.posts') ? 'active' : 'hover:bg-slate-100 text-slate-600' }}">
                <i class="fa-solid fa-newspaper w-5"></i>
                <span class="font-medium">Manajemen Blog</span>
            </a>
            
            <a href="{{ route('admin.categories') }}" 
               class="sidebar-link flex items-center gap-3 px-3 py-1 rounded-lg transition-all {{ request()->routeIs('admin.categories') ? 'active' : 'hover:bg-slate-100 text-slate-600' }}">
                <i class="fa-solid fa-layer-group w-5"></i>
                <span class="font-medium">Kategori Blog</span>
            </a>

            <div class="pt-1 pb-1 border-t border-slate-100">
                <span class="px-3 text-[10px] font-semibold text-slate-400 uppercase tracking-widest">Layanan</span>
            </div>
            
            <a href="#" class="sidebar-link flex items-center gap-3 px-3 py-1 rounded-lg transition-all hover:bg-slate-100 text-slate-600">
                <i class="fa-solid fa-terminal w-5"></i>
                <span class="font-medium">Jasa Install VPS</span>
            </a>
            
            <a href="#" class="sidebar-link flex items-center gap-3 px-3 py-1 rounded-lg transition-all hover:bg-slate-100 text-slate-600">
                <i class="fa-solid fa-code w-5"></i>
                <span class="font-medium">Pembuatan Website</span>
            </a>

            <div class="pt-1 pb-1 border-t border-slate-100">
                <span class="px-3 text-[10px] font-semibold text-slate-400 uppercase tracking-widest">Lainnya</span>
            </div>
            
            <a href="{{ route('admin.users') }}" 
               class="sidebar-link flex items-center gap-3 px-3 py-1 rounded-lg transition-all {{ request()->routeIs('admin.users') ? 'active' : 'hover:bg-slate-100 text-slate-600' }}">
                <i class="fa-solid fa-users w-5"></i>
                <span class="font-medium">Manajemen User</span>
            </a>

            <a href="{{ route('admin.payments') }}" 
               class="sidebar-link flex items-center gap-3 px-3 py-1 rounded-lg transition-all {{ request()->routeIs('admin.payments') ? 'active' : 'hover:bg-slate-100 text-slate-600' }}">
                <i class="fa-solid fa-file-invoice-dollar w-5"></i>
                <span class="font-medium">Verifikasi Pembayaran</span>
            </a>
            
            <a href="/" class="sidebar-link flex items-center gap-3 px-3 py-1 rounded-lg transition-all hover:bg-slate-100 text-slate-600">
                <i class="fa-solid fa-house w-5"></i>
                <span class="font-medium">Lihat Situs Utama</span>
            </a>

            <div class="pt-2 mt-2 border-t border-slate-100">
                <form method="POST" action="{{ route('logout') }}" id="logout-form" class="hidden">
                    @csrf
                </form>
                <a href="#" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="flex items-center gap-3 px-3 py-1 rounded-lg transition-all hover:bg-rose-50 text-rose-600 group">
                    <i class="fa-solid fa-right-from-bracket w-5 group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Keluar</span>
                </a>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <div 
        class="transition-all duration-300"
        :class="sidebarOpen ? 'lg:ml-64' : ''"
    >
        <!-- Top Header -->
        <header class="h-16 md:h-20 bg-white shadow-sm flex items-center justify-between px-4 md:px-8 sticky top-0 z-40">
            <div class="flex items-center gap-3 md:gap-4">
                <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-lg hover:bg-slate-100 text-slate-600 transition-colors"
                        :class="sidebarOpen ? 'lg:hidden' : ''">
                    <i class="fa-solid fa-bars-staggered text-lg"></i>
                </button>
                <h2 class="font-outfit font-bold text-base md:text-lg text-slate-800 truncate max-w-[150px] md:max-w-none">{{ $title ?? 'Dashboard' }}</h2>
            </div>

            <div class="flex items-center gap-3 md:gap-4">
                <div class="hidden sm:flex flex-col items-end">
                    <span class="text-sm font-bold text-slate-800">Admin</span>
                    <span class="text-[10px] font-black uppercase text-rose-500 tracking-widest">Master</span>
                </div>
                <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center text-white font-black shadow-lg shadow-rose-200">
                    AD
                </div>
                <div class="h-8 w-px bg-slate-100 mx-1 hidden md:block"></div>
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                        class="flex p-2.5 rounded-xl bg-slate-50 text-slate-400 hover:bg-rose-50 hover:text-rose-600 transition-all border border-slate-100 shadow-sm"
                        title="Keluar">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button>
            </div>
        </header>

        <!-- Content Area -->
        <main class="p-4 md:p-8">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts

    <style>
        /* CSS ini diletakkan di bawah untuk memastikan override semua style Quill */
        .ql-editor p, .ql-editor h1, .ql-editor h2, .ql-editor h3, .ql-editor ul, .ql-editor ol, .ql-editor li {
            margin: 0 !important;
            padding: 0 !important;
        }
        
        /* Memberikan celah sangat tipis antar paragraf */
        .ql-editor p:not(:last-child) {
            margin-bottom: 4px !important; 
        }

        .ql-editor {
            line-height: 1.4 !important;
            font-size: 15px !important;
        }

        .ql-editor a {
            color: #2563eb !important;
            text-decoration: underline !important;
            font-weight: 700 !important;
        }
        
        /* Mengurangi padding internal editor */
        .ql-container.ql-snow {
            border: 1px solid #e2e8f0 !important;
            border-radius: 0 0 12px 12px !important;
        }
        
        .ql-editor {
            padding: 10px 15px !important;
        }
    </style>
</body>
</html>
