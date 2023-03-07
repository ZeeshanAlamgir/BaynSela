<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegisterProjectDuration extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'register_project_durations';
    protected $fillable = ['user_id','project_duration_id'];

    public function duration()
    {
        return $this->hasMany(Translations::class,'project_duration_id','id');
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
