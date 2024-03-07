<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Library extends Model implements Sitemapable
{
    use HasFactory;

    protected $fillable = [
        'nation',
        'city',
        'library',
        'lat',
        'lng',
        'quantity',
        'website',
        'copyright',
        'notes',
        'iiif',
        'is_free_cultural_works_license',
        'has_post',
        'post_url',
        'library_name_slug',
        'is_part_of_project_name',
        'is_part_of',
        'is_part_of_url',
        'is_disabled',
        'last_edited',
    ];

    public function toSitemapTag(): Url|string|array
    {
        return route('show_library', $this);
    }
}
