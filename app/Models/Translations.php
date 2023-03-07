<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Translations extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'value',
        'field',
        'locale'
    ];

    public static function fieldSingleValue($field,$locale)
    {
        self::where('transable_type','App\Models\ProjectType')->where('field',$field)->where('locale',$locale)->get()->first();
    }
}
