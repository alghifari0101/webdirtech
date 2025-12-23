<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dirtech - Solusi Digital Terpadu' }}</title>
    <meta name="description" content="{{ $description ?? 'Partner teknologi terpercaya untuk solusi VPS, Website, dan Digital Marketing bisnis Anda.' }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'Dirtech - Solusi Digital Terpadu' }}">
    <meta property="og:description" content="{{ $description ?? 'Partner teknologi terpercaya untuk solusi VPS, Website, dan Digital Marketing bisnis Anda.' }}">
    <meta property="og:image" content="{{ asset($ogImage ?? 'img/og-dirtech.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $title ?? 'Dirtech - Solusi Digital Terpadu' }}">
    <meta property="twitter:description" content="{{ $description ?? 'Partner teknologi terpercaya untuk solusi VPS, Website, dan Digital Marketing bisnis Anda.' }}">
    <meta property="twitter:image" content="{{ asset($ogImage ?? 'img/og-dirtech.png') }}">

    @if(isset($paginator))
        @if($paginator->previousPageUrl())
            <link rel="prev" href="{{ $paginator->previousPageUrl() }}">
        @endif
        @if($paginator->nextPageUrl())
            <link rel="next" href="{{ $paginator->nextPageUrl() }}">
        @endif
    @endif
    <link rel="canonical" href="{{ url()->current() }}">


    <!-- LD+JSON Schema -->
    <script type="application/ld+json">
    {!! json_encode([
        '@@context' => 'https://schema.org',
        '@@type' => 'Organization',
        'name' => 'Dirtech Solutions',
        'url' => url('/'),
        'logo' => asset('img/logo-dirtech.png'),
        'sameAs' => [
            'https://wa.me/' . config('contact.whatsapp')
        ],
        'contactPoint' => [
            '@@type' => 'ContactPoint',
            'telephone' => '+' . config('contact.whatsapp'),
            'contactType' => 'customer service',
            'areaServed' => 'ID',
            'availableLanguage' => 'Indonesian'
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
    
    @if(isset($schema))
    <script type="application/ld+json">
    {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
    @endif
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Outfit:wght@500;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0f172a',
                        accent: '#D31A1A',
                    }
                }
            }
        }
    </script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/dirtech.css') }}">
    
    @livewireStyles
</head>
<body>
    <x-header />
    
    <main>
        {{ $slot }}
    </main>

    <x-footer />

    @livewireScripts
</body>
</html>
