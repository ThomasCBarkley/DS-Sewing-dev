<url>@if (! empty($item->slug))  <loc>{{ route('posts.show', $item->slug) }}</loc> @endif  @if (! empty($item->updated_at)) <lastmod>{{ $item->updated_at->format(DateTime::ATOM) }}</lastmod>@endif @if (empty($item->updated_at) && empty($item->slug)) <loc>{{ $item['loc'] }}</loc>
  <lastmod>{{ now()->subWeeks(2)->format(DateTime::ATOM) }}</lastmod>@endif <changefreq>weekly</changefreq>
</url>