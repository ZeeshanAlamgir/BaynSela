<?php

namespace App\Observers;

use App\Models\ServiceSection;
use Illuminate\Support\Str;

class ServiceSectionSlugObserver
{
    public function creating(ServiceSection $serviceSection)
    {
        $serviceSection->slug = 'service-section';
    }   
}
