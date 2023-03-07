<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StorySection extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'story_sections';
    protected $guarded = ['id'];

    public function multiValues()
    {
        return $this->morphMany(Translations::class, 'transable');
    }

    public function fieldAllValues($field)
    {
        return $this->morphMany(Translations::class, 'transable')->where('field', $field)->get();
    }

    public function fieldSingleValue($field, $locale)
    {
        return $this->morphMany(Translations::class, 'transable')->where('field', $field)->where('locale', $locale)->get()->first();
    }
}
