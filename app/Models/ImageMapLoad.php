<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageMapLoad extends Model
{
    use HasFactory;

    protected $fillable = [
        'script',
        'map_id',
        'map_name',
    ];

}
