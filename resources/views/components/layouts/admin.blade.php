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
<body class="bg-slate-50 font-sans text-slate-900" x-data="{ sidebarOpen: true }">
    
    <!-- Sidebar -->
    <aside 
        class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl transition-transform duration-300 transform"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >
        <div class="flex items-center justify-between h-20 px-6 bg-secondary text-white">
            <a href="/" class="flex items-center gap-2 font-outfit font-bold text-xl tracking-wider">
                <i class="fa-solid fa-server text-primary"></i>
                DIRTECH <span class="text-xs font-normal opacity-70">ADMIN</span>
            </a>
            <button @click="sidebarOpen = false" class="lg:hidden">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>

        <nav class="mt-6 px-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}" 
               class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.dashboard') ? 'active' : 'hover:bg-slate-100 text-slate-600' }}">
                <i class="fa-solid fa-gauge-high w-5"></i>
                <span class="font-medium">Dashboard</span>
            </a>
            
            <a href="{{ route('admin.asks') }}" 
               class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.asks') ? 'active' : 'hover:bg-slate-100 text-slate-600' }}">
                <i class="fa-solid fa-circle-question w-5"></i>
                <span class="font-medium">Tanya Jawab (Ask)</span>
            </a>

            <div class="pt-4 pb-2 border-t border-slate-100">
                <span class="px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Layanan</span>
            </div>
            
            <a href="#" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg transition-all hover:bg-slate-100 text-slate-600">
                <i class="fa-solid fa-terminal w-5"></i>
                <span class="font-medium">Jasa Install VPS</span>
            </a>
            
            <a href="#" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg transition-all hover:bg-slate-100 text-slate-600">
                <i class="fa-solid fa-code w-5"></i>
                <span class="font-medium">Pembuatan Website</span>
            </a>

            <div class="pt-4 pb-2 border-t border-slate-100">
                <span class="px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider">Lainnya</span>
            </div>
            
            <a href="{{ route('admin.users') }}" 
               class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.users') ? 'active' : 'hover:bg-slate-100 text-slate-600' }}">
                <i class="fa-solid fa-users w-5"></i>
                <span class="font-medium">Manajemen User</span>
            </a>
            
            <a href="/" class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-lg transition-all hover:bg-slate-100 text-slate-600">
                <i class="fa-solid fa-house w-5"></i>
                <span class="font-medium">Lihat Situs Utama</span>
            </a>

            <div class="pt-4 mt-4 border-t border-slate-100">
                <form method="POST" action="{{ route('logout') }}" id="logout-form" class="hidden">
                    @csrf
                </form>
                <a href="#" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all hover:bg-rose-50 text-rose-600 group">
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
        <header class="h-20 bg-white shadow-sm flex items-center justify-between px-8 sticky top-0 z-40">
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-md hover:bg-slate-100 text-slate-600">
                    <i class="fa-solid fa-bars-staggered text-xl"></i>
                </button>
                <h2 class="font-outfit font-bold text-xl text-slate-800">{{ $title ?? 'Dashboard' }}</h2>
            </div>

            <div class="flex items-center gap-6">
                <div class="hidden md:flex flex-col items-end">
                    <span class="text-sm font-bold text-slate-800">Admin Dirtech</span>
                    <span class="text-xs text-slate-500">Administrator</span>
                </div>
                <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white font-bold">
                    AD
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <main class="p-8">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
</body>
</html>
