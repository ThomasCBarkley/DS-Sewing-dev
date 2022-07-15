<?= '<'.'?'.'xml version="1.0" encoding="UTF-8"?>'."\n"; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
    @foreach($data as $type)
        @foreach($type as $item)
            @include('sitemap.item')
        @endforeach
    @endforeach
</urlset>