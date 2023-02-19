<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static truncate()
 * @method static updateOrCreate(array $array, array $array1)
 */
class BrokenLink extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table="broken_links";
}
