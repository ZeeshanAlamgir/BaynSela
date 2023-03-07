<?php

namespace App\Observers;

use App\Models\GoalSection;
use Illuminate\Support\Str;

class GoalSectionSlugObserver
{
    public function creating(GoalSection $goalSection)
    {
        $goalSection->slug = Str::slug($goalSection->heading);
    }
}
