<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

/**
 * @method paginate(int $int)
 * @method static findOrFail($id)
 * @method static inRandomOrder()
 * @method static where(string $string, $library_name_slug)
 */
class Library extends Model implements Sitemapable
{
    use HasFactory;
    //
    protected $guarded = [];

    public function toSitemapTag(): Url | string | array
    {
        return route('show_library', $this);
    }

}
