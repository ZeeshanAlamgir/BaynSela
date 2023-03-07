<?php

namespace App\Services;

use App\Interface\ProjectDurationInterface;
use App\Models\RegisterProjectDuration;

class ProjectDurationService implements ProjectDurationInterface
{
    public function update($data)
    {
        $project_duration = (new RegisterProjectDuration())->first();
        $project_duration_heading_en = $project_duration->fieldSingleValue('project_duration_heading','en');
        $project_duration_heading_ar = $project_duration->fieldSingleValue('project_duration_heading','ar');
        $project_duration_heading_en->update([
            'value' => $data['heading_en']
        ]);
        $project_duration_heading_ar->update([
            'value' => $data['heading_ar']
        ]);
    }
}
