<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($items as $item)
    <url>
        <loc>{{ $item['loc'] }}</loc>
        @if ($item['priority'] !== null)
        <priority>{{ $item['priority'] }}</priority>
        @endif
        @if ($item['lastmod'] !== null)
        <lastmod>{{ date('Y-m-d\TH:i:sP', strtotime($item['lastmod'])) }}</lastmod>
        @endif
        @if ($item['changefreq'] !== null)
        <changefreq>{{ $item['changefreq'] }}</changefreq>
        @endif
    </url>
@endforeach
</urlset>
