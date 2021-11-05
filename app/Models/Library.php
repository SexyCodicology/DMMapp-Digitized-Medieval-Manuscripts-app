<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method paginate(int $int)
 */
class Library extends Model
{
    use HasFactory;
    //
    protected $guarded = [];
    
}
