<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageMap extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'event_id',
        'image_map_load_id'
    ];
}
