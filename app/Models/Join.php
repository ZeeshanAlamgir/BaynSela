<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Join extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'joins';
    protected $fillable=[
        'name',
        'email',
        'message',
        'service_id',
        'event_id'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class,'event_id','id');
    }

    public function multiValues() {
        return $this->morphMany(Translations::class, 'transable');
    }

    public function fieldAllValues($field) {
        return $this->morphMany(Translations::class, 'transable')->where('field', $field)->get();
    }

    public function fieldSingleValue($field, $locale) {
        return $this->morphMany(Translations::class, 'transable')->where('field', $field)->where('locale', $locale)->get()->first();
    }

}
