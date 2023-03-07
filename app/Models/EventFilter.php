<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventFilter extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'filter_id',
        'filter_value_id'
    ];
}
