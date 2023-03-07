<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TermCondition extends Model
{
    use HasFactory, Softdeletes;

    protected $table = 'terms_and_conditions';
    protected $guarded = ['id'];

    public function multiValues() {
        return $this->morphMany(Translations::class, 'transable');
    }

    public function fieldAllValues($field) {
        return $this->morphMany(Translations::class, 'transable')->where('field', $field)->get();
    }

    public function fieldSingleValue($field, $locale) {
        return $this->morphMany(Translations::class, 'transable')->where('field', $field)->where('locale', $locale)->get()->first();
    }}
