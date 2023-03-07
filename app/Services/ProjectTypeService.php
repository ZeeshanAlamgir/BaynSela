<?php

namespace App\Services;

use App\Interface\ProjectTypeInterface;
use App\Models\RegisterProjectType;

class ProjectTypeService implements ProjectTypeInterface
{
    public function update($data)
    {
        $project_type = (new RegisterProjectType())->first();
        $project_type_heading_en = $project_type->fieldSingleValue('project_type_heading','en');
        $project_type_heading_ar = $project_type->fieldSingleValue('project_type_heading','ar');
        $project_type_heading_en->update([
            'value' => $data['heading_en']
        ]);
        $project_type_heading_ar->update([
            'value' => $data['heading_ar']
        ]);
    }
}
