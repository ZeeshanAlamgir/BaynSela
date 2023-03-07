<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'date_filter'
    ];

    public function multiValues() {
        return $this->morphMany(Translations::class, 'transable');
    }

    public function fieldAllValues($field) {
        return $this->morphMany(Translations::class, 'transable')->where('field', $field)->get();
    }

    public function fieldSingleValue($field, $locale) {
        return $this->morphMany(Translations::class, 'transable')->where('field', $field)->where('locale', $locale)->get()->first();
    }

    public function filters(){
        return $this->hasMany(Filter::class);
    }

    public function events(){
        return $this->hasMany(Event::class)->orderBy('id', 'desc');
    }
}
