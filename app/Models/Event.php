<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'service_id',
        'location',
        'logo',
        'date_filter',
        'start_date',
        'end_date',
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

    public function images(){
        return $this->hasMany(EventImage::class)->orderBy('id', 'desc');
    }

    public function filters(){
        return $this->belongsToMany(Filter::class,'event_filters','event_id','filter_id');
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function numbers(){
        return $this->hasMany(EventNumber::class);
    }

    public function partnerships(){
        return $this->hasMany(EventPartnership::class);
    }

    public function maps(){
        return $this->belongsToMany(ImageMapLoad::class, 'image_maps', 'event_id', 'image_map_load_id');
    }
}
