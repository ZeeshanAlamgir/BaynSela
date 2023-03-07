<?php

namespace App\Services;

use App\Models\ProjectSection;
use Illuminate\Support\Str;

class ProjectSectionService
{
    public function updateProject($data)
    {
        $projectSection = (new ProjectSection())::find(1);
        $projectSection->page_id = 1;
        $projectSection->order = 1;
        $heading_en = $projectSection->fieldSingleValue('project_heading','en') ?? '';
        $heading_ar = $projectSection->fieldSingleValue('project_heading','ar') ?? '';
        $description_en = $projectSection->fieldSingleValue('project_description','en') ?? '';
        $description_ar = $projectSection->fieldSingleValue('project_description','ar') ?? '';
        
        $heading_en->update([
            'value'=>$data['heading_en']
        ]);
        $heading_ar->update([
            'value'=>$data['heading_ar']
        ]);
        $description_en->update([
            'value'=>$data['description_en']
        ]);
        $description_ar->update([
            'value'=>$data['description_ar']
        ]);
        $projectSection->slug = Str::slug($data['heading_en']);
        $projectSection->save();
        return redirect()->back()->withSuccess("Updated Successfully.");
    }
}
