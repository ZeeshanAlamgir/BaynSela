<?php

namespace App\Observers;

use App\Models\BannerSection;
use Illuminate\Support\Str;

class BannerSectionSlugObserver
{
    public function creating(BannerSection $bannerSection)
    {
        $bannerSection->slug = Str::slug($bannerSection->heading);
    }
}
