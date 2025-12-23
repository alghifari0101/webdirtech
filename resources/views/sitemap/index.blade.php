{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($staticRoutes as $route)
        <url>
            <loc>{{ route($route) }}</loc>
            <lastmod>{{ now()->tz('GMT')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    @foreach($asks as $ask)
        <url>
            <loc>{{ route('ask.show', $ask->slug) }}</loc>
            <lastmod>{{ $ask->updated_at->tz('GMT')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
</urlset>
