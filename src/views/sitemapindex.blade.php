<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($items as $item)
    <sitemap>
        <loc>{{ $item['loc'] }}</loc>
        @if ($item['lastmod'] !== null)
        <lastmod>{{ date('Y-m-d\TH:i:sP', strtotime($item['lastmod'])) }}</lastmod>
        @endif
    </sitemap>
@endforeach
</sitemapindex>
