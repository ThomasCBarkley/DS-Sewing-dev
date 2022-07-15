<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'short_description',
        'body',
        'slug',
        'publish_at',
    ];

    public function scopePublished($query)
    {
        return $query->where('publish_at', '<', Carbon::now());
    }

    /**
     * Scope a query to search posts
     */
    public function scopeSearch(Builder $query, ?string $search)
    {
        if ($search) {
            return $query->where('title', 'LIKE', "%{$search}%");
        }
    }

}
